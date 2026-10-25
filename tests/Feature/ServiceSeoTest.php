<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeoController;
use App\Models\Generalsetting;
use App\Models\Service;
use App\Support\ServiceSeo;
use App\Support\ServiceSeoValidation;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ServiceSeoTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $compiled = sys_get_temp_dir().'/cangrows-service-seo-tests';
        if (! is_dir($compiled)) {
            mkdir($compiled, 0777, true);
        }
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:', 'app.url' => 'https://example.test', 'view.compiled' => $compiled]);
        // The application registers Blade directives while booting, resolving the compiler early.
        // Recreate the compiler/engine after changing its path; never read tracked production caches.
        $this->app->forgetInstance('blade.compiler');
        \Illuminate\Support\Facades\Blade::clearResolvedInstance('blade.compiler');
        app('view.engine.resolver')->forget('blade');
        DB::purge('sqlite');
        app()->instance('request', Request::create('/admin/services'));
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            foreach (['ar', 'en', 'fr'] as $locale) {
                foreach (['title', 'details', 'short_details', 'meta_title', 'meta_details', 'slug'] as $field) {
                    $table->text($field.'_'.$locale)->nullable();
                }
            }
            $table->text('photo')->nullable();
            $table->timestamps();
        });
        (require base_path('database/migrations/2026_10_25_000001_add_service_social_metadata.php'))->up();
        Schema::create('generalsettings', function (Blueprint $table) {
            $table->id();
            $table->boolean('lang_arabic')->default(true);
            $table->boolean('lang_english')->default(true);
        });
        DB::table('generalsettings')->insert(['id' => 1]);
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('sign');
            $table->string('name');
            $table->string('language')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('rtl')->default(false);
            $table->boolean('is_default')->default(true);
        });
        DB::table('languages')->insert(['sign' => 'ar', 'name' => 'Arabic']);
        DB::table('languages')->insert(['sign' => 'en', 'name' => 'English', 'is_default' => false]);
        // Render only the requested view data, without the unrelated global database composer.
        app('events')->forget('composing: *');
        Schema::create('pagesettings', fn (Blueprint $table) => $table->id());
        Schema::create('socialsettings', function (Blueprint $table) {
            $table->id();
            foreach (['f_status', 'ystatus', 't_status', 'd_status'] as $flag) {
                $table->boolean($flag)->default(false);
            }
        });
        DB::table('socialsettings')->insert(['id' => 1]);
    }

    private function service(array $values = []): Service
    {
        return Service::create($values + ['title_ar' => 'خدمة العين', 'title_en' => 'Eye care', 'slug_ar' => 'eye-care-ar', 'slug_en' => 'eye-care', 'details_ar' => '<p>وصف <b>الخدمة</b></p>', 'is_published' => true]);
    }

    public function test_admin_create_update_and_persistence_preserve_omitted_metadata(): void
    {
        $controller = new ServiceController;
        $response = $controller->store(Request::create('/admin/services/create', 'POST', ['slug_ar' => 'first', 'meta_title_ar' => 'SEO title', 'meta_details_ar' => 'SEO description', 'og_title_ar' => 'Social title']));
        $this->assertSame(200, $response->status());
        $service = Service::firstOrFail();
        $this->assertSame('SEO title', $service->meta_title_ar);
        $controller->update(Request::create('/admin/services/update/'.$service->id, 'POST', ['meta_details_ar' => 'Updated description']), $service->id);
        $this->assertSame('Updated description', $service->fresh()->meta_details_ar);
        $this->assertSame('SEO title', $service->fresh()->meta_title_ar);
        $this->assertSame('first', $service->fresh()->slug_ar);
    }

    public function test_metadata_fallbacks_and_localization(): void
    {
        $service = $this->service();
        $gs = new Generalsetting(['title_ar' => 'العيادة', 'title_en' => 'Clinic']);
        $seo = ServiceSeo::metadata($service, $gs, 'ar');
        $this->assertSame('خدمة العين - العيادة', $seo['title']);
        $this->assertSame('وصف الخدمة', $seo['description']);
        $this->assertSame('https://example.test/services/eye-care-ar', $seo['url']);
        $this->assertSame('https://example.test/en/services/eye-care', ServiceSeo::url($service, 'en'));
        $other = $this->service(['slug_ar' => 'second', 'meta_title_ar' => 'Second title', 'meta_details_ar' => 'Second description']);
        $this->assertSame('Second title', ServiceSeo::metadata($other, $gs, 'ar')['title']);
    }

    public function test_rendered_metadata_is_unique_escaped_and_has_valid_json(): void
    {
        $service = $this->service(['meta_title_ar' => 'Care " & <script>alert(1)</script>', 'meta_details_ar' => 'A " description', 'og_image' => 'social.jpg']);
        $html = view('front.partials.service-seo', ['service' => $service, 'gs' => new Generalsetting(['title_ar' => 'Clinic']), 'sign' => 'ar'])->render();
        $dom = new \DOMDocument;
        @$dom->loadHTML('<html><head>'.$html.'</head></html>');
        $xpath = new \DOMXPath($dom);
        foreach (['//title', '//meta[@name="description"]', '//link[@rel="canonical"]', '//meta[@property="og:title"]', '//meta[@property="og:url"]', '//meta[@property="og:image"]', '//meta[@name="twitter:card"]', '//meta[@name="twitter:image"]'] as $query) {
            $this->assertSame(1, $xpath->query($query)->length, $query);
        }
        $this->assertStringNotContainsString('<script>alert', $html);
        $json = json_decode($xpath->query('//script')->item(0)->textContent, true, 512, JSON_THROW_ON_ERROR);
        $this->assertSame('Service', $json['@type']);
        $this->assertStringContainsString('&quot;', $html);
    }

    public function test_publication_scope_and_sitemap_are_fresh(): void
    {
        $public = $this->service();
        $private = $this->service(['slug_ar' => 'private', 'slug_en' => 'private-en', 'is_published' => false]);
        app()->instance('request', Request::create('/services'));
        $this->assertSame(1, Service::count());
        $this->assertNull(Service::forPublicSlug('private', 'ar'));
        $controller = new SeoController;
        $response = $controller->sitemap();
        $this->assertStringContainsString('application/xml', $response->headers->get('Content-Type'));
        $xml = simplexml_load_string($response->getContent());
        $this->assertNotFalse($xml);
        $this->assertStringContainsString(ServiceSeo::url($public, 'ar'), $response->getContent());
        $this->assertStringNotContainsString('/services/private', $response->getContent());
        $this->assertStringNotContainsString('/services/implantation-icl', $response->getContent());
        $this->assertStringContainsString('/en/about-doctor', $response->getContent());
        app()->instance('request', Request::create('/admin/services'));
        $public->update(['is_published' => false]);
        $this->assertStringNotContainsString('/services/eye-care', $controller->sitemap()->getContent());
        $this->assertSame(2, Service::count());
    }

    public function test_slug_history_and_existing_route_redirect(): void
    {
        $service = $this->service();
        $service->update(['slug_ar' => 'new-url']);
        app()->instance('request', Request::create('/services/eye-care-ar'));
        $this->assertSame($service->id, Service::forPublicSlug('eye-care-ar', 'ar')->id);
        $response = (new HomeController)->singleService(request(), 'eye-care-ar');
        $this->assertSame(301, $response->status());
        $this->assertStringEndsWith('/services/new-url', $response->getTargetUrl());
        $this->assertSame('single-service.index', app('router')->getRoutes()->match(Request::create('/services/new-url'))->getName());
        $this->assertSame('single-service.indexen', app('router')->getRoutes()->match(Request::create('/en/services/eye-care'))->getName());
    }

    public function test_invalid_metadata_and_duplicate_slugs_are_rejected(): void
    {
        $this->service();
        $request = Request::create('/admin/services', 'POST', ['slug_ar' => 'eye-care-ar', 'og_title_ar' => ['bad'], 'is_published' => 'invalid']);
        $validator = Validator::make($request->all(), ServiceSeoValidation::rules($request));
        $this->assertTrue($validator->fails());
        foreach (['slug_ar', 'og_title_ar', 'is_published'] as $field) {
            $this->assertTrue($validator->errors()->has($field));
        }
    }

    public function test_robots_and_admin_auth_middleware_remain_present(): void
    {
        $response = (new SeoController)->robots();
        $this->assertStringContainsString('text/plain', $response->headers->get('Content-Type'));
        $this->assertStringContainsString('Sitemap: https://example.test/sitemap.xml', $response->getContent());
        $this->assertStringNotContainsString('Disallow: /services', $response->getContent());
        $route = app('router')->getRoutes()->getByName('admin-services-store');
        $this->assertContains('auth.admin', $route->gatherMiddleware());
        $this->assertContains('permissions:services', $route->gatherMiddleware());
    }

    public function test_complete_public_html_and_unpublished_http_restriction(): void
    {
        $public = $this->service(['photo' => 'eye.jpg', 'meta_title_ar' => 'Individual SEO title', 'meta_details_ar' => 'Individual description']);
        $this->service(['slug_ar' => 'hidden', 'is_published' => false]);
        $gs = new Generalsetting(['title_ar' => 'Clinic', 'title_en' => 'Clinic', 'phones' => '0123456789', 'emails' => 'test@example.test', 'addresses_ar' => '[]', 'addresses_en' => '[]']);
        view()->share(['gs' => $gs, 'services' => collect([$public]), 'servicesWithoutCats' => collect([$public]), 'categories' => collect(), 'languages' => collect()]);
        $response = $this->get('https://example.test/services/eye-care-ar?tracking=test');
        $response->assertOk()->assertSee('Individual SEO title')->assertSee('Individual description')->assertSee('وصف');
        $dom = new \DOMDocument;
        @$dom->loadHTML($response->getContent());
        $xpath = new \DOMXPath($dom);
        foreach (['//head/title', '//head/meta[@name="description"]', '//head/link[@rel="canonical"]', '//head/meta[@property="og:image"]', '//h1'] as $query) {
            $this->assertSame(1, $xpath->query($query)->length, $query);
        }
        $this->assertSame('https://example.test/services/eye-care-ar', $xpath->query('//link[@rel="canonical"]')->item(0)->getAttribute('href'));
        $this->assertSame(0, $xpath->query('//meta[contains(@content,"noindex")]')->length);
        $this->get('https://example.test/services/hidden')->assertNotFound();
        $this->get('https://example.test/en/services/eye-care')->assertOk()->assertSee('Eye care - Clinic');
        // Laravel's HTTP test helper trims trailing slashes before sending the request.
        $slashResponse = (new HomeController)->singleService(Request::create('https://example.test/services/eye-care-ar/'), 'eye-care-ar');
        $this->assertSame(301, $slashResponse->status());
        $this->assertSame('https://example.test/services/eye-care-ar', $slashResponse->getTargetUrl());
        $this->get('https://www.example.test/services/eye-care-ar')->assertRedirect('https://example.test/services/eye-care-ar')->assertStatus(301);
        $this->get('https://example.test/sitemap.xml')->assertOk()->assertHeader('Content-Type', 'application/xml; charset=UTF-8');
        $this->get('https://example.test/robots.txt')->assertOk();
    }

    public function test_http_admin_guest_denied_and_authorized_save(): void
    {
        $this->post('https://example.test/admin/services/create', ['slug_ar' => 'guest'])->assertRedirect(route('admin.login'));
        $this->assertSame(0, Service::withoutGlobalScopes()->count());
        $admin = new \App\Models\Admin(['role_id' => 0]);
        $admin->id = 1;
        $this->actingAs($admin, 'admin')->post('https://example.test/admin/services/create', ['slug_ar' => 'authorized', 'meta_title_ar' => 'Saved via HTTP'])->assertOk();
        $this->assertSame('Saved via HTTP', Service::withoutGlobalScopes()->firstOrFail()->meta_title_ar);
    }

    public function test_admin_without_services_permission_cannot_save(): void
    {
        $admin = new \App\Models\Admin(['role_id' => 2]);
        $admin->id = 2;
        $role = new \App\Models\Role;
        $role->section = 'blogs';
        $admin->setRelation('role', $role);
        $this->actingAs($admin, 'admin')->post('https://example.test/admin/services/create', ['slug_ar' => 'forbidden'])->assertRedirect(route('admin.dashboard'));
        $this->assertSame(0, Service::withoutGlobalScopes()->count());
    }

    public function test_og_upload_persists_and_empty_upload_preserves_it(): void
    {
        $file = \Illuminate\Http\UploadedFile::fake()->image('social.png');
        $request = Request::create('/admin/services/create', 'POST', ['slug_ar' => 'with-image'], [], ['og_image' => $file]);
        (new ServiceController)->store($request);
        $service = Service::firstOrFail();
        $path = public_path('assets/images/services/'.$service->og_image);
        try {
            $this->assertFileExists($path);
            (new ServiceController)->update(Request::create('/admin/services/update/'.$service->id, 'POST', ['meta_title_ar' => 'Updated']), $service->id);
            $this->assertSame($service->og_image, $service->fresh()->og_image);
            $this->assertStringEndsWith('.png', ServiceSeo::metadata($service, new Generalsetting, 'ar')['image']);
        } finally {
            if (is_file($path)) {
                unlink($path);
            }
        }
    }

    public function test_array_slug_is_validation_error_and_missing_slug_cannot_create(): void
    {
        foreach ([['slug_ar' => ['bad']], []] as $input) {
            $request = Request::create('/admin/services/create', 'POST', $input);
            $rules = ServiceSeoValidation::rules($request);
            $this->assertTrue(Validator::make($request->all(), $rules)->fails());
        }
    }

    public function test_blog_head_branch_is_preserved_even_with_service_loop_variable(): void
    {
        $route = app('router')->getRoutes()->getByName('single-blog.index');
        $request = Request::create('/article');
        $request->setRouteResolver(fn () => $route);
        app()->instance('request', $request);
        $head = explode('</head>', file_get_contents(resource_path('views/layouts/front.blade.php')))[0];
        $html = \Illuminate\Support\Facades\Blade::render($head, ['gs' => new Generalsetting(['title_ar' => 'Clinic']), 'service' => $this->service(), 'sign' => 'ar', 'blog' => new \App\Models\Blog(['title_ar' => 'Article', 'meta_title_ar' => 'Article SEO', 'meta_details_ar' => 'Article description'])]);
        $this->assertStringContainsString('<title>Article SEO</title>', $html);
        $this->assertStringContainsString('Article description', $html);
        $this->assertStringNotContainsString('"@type":"Service"', $html);
    }
}
