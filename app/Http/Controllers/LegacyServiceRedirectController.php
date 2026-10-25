<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Support\ServiceSeo;
use Illuminate\Support\Facades\DB;

class LegacyServiceRedirectController extends Controller
{
    public function __invoke(string $locale, string $slug)
    {
        // These language-prefixed service paths are present in the existing sitemap.
        $service = Service::where('is_published', true)->where(function ($query) use ($slug) {
            foreach (config('service_seo.locales') as $language) {
                $query->orWhere('slug_'.$language, $slug);
            }
        })->first();
        if (! $service) {
            $history = DB::table('service_slug_histories')->where('slug', $slug)->first();
            $service = $history ? Service::where('is_published', true)->find($history->service_id) : null;
        }
        abort_unless($service, 404);
        $target = $service->getAttribute('slug_'.$locale);
        abort_if(blank($target), 404);

        return redirect()->to(ServiceSeo::url($target), 301);
    }
}
