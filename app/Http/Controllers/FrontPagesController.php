<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use App\Models\Generalsetting;
use App\Models\Language;
use App\Models\Page;
use App\Models\SiteGlobal;
use App\Models\SiteGlobalSetting;
use App\Models\Socialsetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class FrontPagesController extends Controller
{
    /**
     * GET /sitemap.xml
     *
     * Emits one <url> entry per (published page × language). Stateless —
     * intentionally lives outside the IpLocation/FrontLanguages middleware
     * group so crawlers don't trigger session writes or geo-IP lookups.
     */
    public function sitemap()
    {
        $pages     = Page::where('is_published', true)->orderBy('sort_order')->get();
        $languages = Language::orderBy('id')->get();

        $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($languages as $language) {
            foreach ($pages as $page) {
                $loc = $page->slug === 'home'
                    ? url($language->sign)
                    : url($language->sign . '/' . $page->slug);

                $xml .= "  <url>\n";
                $xml .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
                if ($page->updated_at) {
                    $xml .= "    <lastmod>" . $page->updated_at->toIso8601String() . "</lastmod>\n";
                }
                $xml .= "  </url>\n";
            }
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }

    /**
     * POST /{lang}/contact
     *
     * Validates and stores a contact form submission. Always redirects back
     * to the contact page (preserving locale) with a flash message.
     */
    public function submitContact(Request $request, $lang)
    {
        $this->syncLocale($lang);

        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:255'],
            'phone'   => ['required', 'string', 'max:50'],
            'email'   => ['nullable', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:5000'],
        ]);

        $language = Language::where('sign', session('sign', $lang))->first();

        ContactSubmission::create([
            'name'        => $validated['name'],
            'phone'       => $validated['phone'],
            'email'       => $validated['email']   ?? null,
            'subject'     => $validated['subject'] ?? null,
            'message'     => $validated['message'] ?? null,
            'language_id' => $language?->id,
            'page_slug'   => 'contact',
            'ip'          => $request->ip(),
            'user_agent'  => substr((string) $request->userAgent(), 0, 1000),
        ]);

        // Flash a boolean — the message text itself is editable from the
        // admin Pages screen as the contact page's `form_success_message` key.
        return redirect()
            ->route('front.bekdash.page', ['lang' => $lang, 'slug' => 'contact'])
            ->with('contact_success', true);
    }

    /**
     * Renders a dynamic Page.
     *
     *   /{lang}            -> show($lang)            -> slug = home
     *   /{lang}/{slug}     -> show($lang, $slug)     -> dynamic
     */
    public function show($lang, $slug = null)
    {
        $this->syncLocale($lang);

        $slug = $slug !== null && $slug !== '' ? $slug : 'home';

        // Cache the Page query (with translations + images) for 10 minutes,
        // keyed by slug + lang. Admin\PageController::update() invalidates
        // these keys after a save so edits surface immediately.
        $cacheKey = 'pages.show.' . $slug . '.' . $lang;
        $page = Cache::remember(
            $cacheKey,
            now()->addMinutes(10),
            fn () => Page::with(['translations', 'images'])
                ->where('slug', $slug)
                ->where('is_published', true)
                ->firstOrFail()
        );

        return view($page->template, [
            'page'      => $page,
            'globals'   => $this->siteGlobals(),
            'languages' => Language::orderBy('id')->get(),
        ]);
    }

    // ----- private helpers -------------------------------------------------

    /**
     * Site-wide chrome (header, menu, footer, social) shared by every page.
     * Will move to a view-composer in a later step.
     */
    private function siteGlobals(): SiteGlobal
    {
        $globals = new SiteGlobal();

        $sign = session('sign', 'ar');

        // ----- chrome strings (DB-backed, admin-editable) -----------------
        // Cached for 10 minutes per language; Admin\SiteGlobalSettingController
        // forgets the key on save so edits surface immediately.
        $chrome = Cache::remember(
            'site_globals.' . $sign,
            now()->addMinutes(10),
            function () use ($sign) {
                $language = Language::where('sign', $sign)->first();
                if (! $language) {
                    return [];
                }
                $row = SiteGlobalSetting::where('language_id', $language->id)->first();

                return is_array($row?->content_json) ? $row->content_json : [];
            }
        );

        // Literal defaults — last-resort fallback when a language row is
        // missing or a key wasn't seeded yet. Kept in code so the front never
        // renders an empty string for a known key.
        $defaults = [
            'site_title'       => 'بيون بكداش',
            'site_description' => 'بيون بكداش - أفضل بوظة سورية',
            'logo_alt'         => 'شعار بابل',
            'nav_lang_label'   => 'اللغة',
            'menu_home'        => 'الرئيسية',
            'menu_story'       => 'قصة بيون بكداش',
            'menu_goals'       => 'أهداف بيون بكداش',
            'menu_policy'      => 'مبادئ بيون بكداش',
            'menu_express'     => 'اكسبرس بيون بكداش',
            'menu_luxury'      => 'لاكشري بيون بكداش',
            'menu_contact'     => 'تواصل معنا',
            'contact_title'    => 'تواصل معنا',
            'contact_address'  => 'مصر القاهرة مدينه العبور',
            'contact_phone_1'  => '01270297000',
            'contact_phone_2'  => '01070297000',
            'contact_cta'      => 'تواصل معنا',
        ];

        // Generalsetting still wins for site_title when its per-language column
        // has a value, since admins may have already configured it there.
        $gs              = Generalsetting::first();
        $titleColumn     = 'title_' . $sign;
        $gsTitle         = $gs?->{$titleColumn};

        // Merge order: defaults < DB chrome < Generalsetting title override.
        // array_filter drops empty/null so they don't clobber the layer below.
        $merged = array_merge(
            $defaults,
            array_filter($chrome, fn ($v) => $v !== null && $v !== ''),
            $gsTitle ? ['site_title' => $gsTitle] : [],
        );

        // ----- social links (separate Socialsetting row) ------------------
        // Empty strings, not '#', so the bekdash views can hide unset icons
        // via a simple truthy check.
        $social   = Socialsetting::first();
        $whatsapp = $social?->whatsapp ?: '';
        if ($whatsapp !== '' && !preg_match('#^https?://#i', $whatsapp)) {
            // Bare number like "201270297000" or "+20 127 029 7000" → wa.me/<digits>
            $whatsapp = 'https://wa.me/' . preg_replace('/\D/', '', $whatsapp);
        }

        $globals->content = $merged + [
            'social_facebook_url'  => $social?->facebook  ?: '',
            'social_instagram_url' => $social?->instagram ?: '',
            'social_x_url'         => $social?->x_url     ?: '',
            'social_linkedin_url'  => $social?->linkedin  ?: '',
            'social_whatsapp_url'  => $whatsapp,
            'social_snapchat_url'  => $social?->snapchat  ?: '',
            'social_tiktok_url'    => $social?->tiktok    ?: '',
            'social_phone_url'     => $social?->phone     ?: '',
        ];

        return $globals;
    }

    /**
     * The existing FrontLanguages middleware syncs session from session/default,
     * not from the URL segment, so direct visits to /ar could otherwise render
     * in the previously-cached locale. Mirror HomeController::langSign() behavior
     * here so the URL is authoritative for this controller.
     */
    private function syncLocale(?string $sign): ?Language
    {
        $language = $sign
            ? Language::where('sign', $sign)->first()
            : null;

        $language = $language ?: Language::where('is_default', 1)->first();

        if ($language) {
            session([
                'front_language'           => $language->name,
                'front_language_photo'     => $language->photo,
                'front_language_duraction' => $language->rtl == 1 ? 'rtl' : 'ltr',
                'sign'                     => $language->sign,
            ]);
            App::setLocale($language->name);
        }

        return $language;
    }
}
