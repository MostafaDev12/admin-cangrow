<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Service;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Tests\Support\ProjectDatabase;
use Tests\TestCase;

class ApplicationRegressionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        ProjectDatabase::create();
        config(['app.url' => 'https://example.test', 'service_seo.origin' => 'https://example.test']);
        $this->withSession(['ip_address' => '127.0.0.1']);
        Http::preventStrayRequests();
    }

    public function test_services_listing_with_real_middleware_and_views(): void
    {
        $this->get('https://example.test/services')->assertOk();
    }

    public function test_services_in_all_three_languages_use_real_bootstrap_and_views(): void
    {
        Service::withoutGlobalScopes()->create([
            'title_ar' => 'خدمة عربية', 'title_en' => 'English service', 'title_fr' => 'Service français',
            'slug_ar' => 'خدمة-عربية', 'slug_en' => 'english-service', 'slug_fr' => 'service-francais',
            'photo' => 'qa-service.png',
        ]);
        foreach (['خدمة-عربية' => 'ar', 'english-service' => 'en', 'service-francais' => 'fr'] as $slug => $locale) {
            $html = $this->get('https://example.test/service/'.$slug)->assertOk()->getContent();
            $this->assertStringContainsString('<html lang="'.$locale.'"', $html);
            foreach (['<title>', 'rel="canonical"', 'name="description"', 'property="og:title"', 'property="og:image"', '<h1 '] as $tag) {
                $this->assertSame(1, substr_count($html, $tag), $locale.' '.$tag);
            }
        }
    }

    public function test_admin_dashboard_requires_authentication(): void
    {
        $this->get('https://example.test/admin')->assertRedirect(route('admin.login'));
    }

    public function test_authenticated_admin_dashboard_with_real_view(): void
    {
        $admin = (new Admin)->forceFill(['id' => 1, 'role_id' => 0, 'name' => 'QA Admin', 'email' => 'qa@example.test', 'photo' => '']);
        $this->actingAs($admin, 'admin')->get('https://example.test/admin')->assertOk();
    }

    public function test_existing_language_switch_route_and_front_language_session(): void
    {
        $this->withSession(['front_language' => 'ar', 'sign' => 'ar']);
        $this->get('https://example.test/service/unknown')->assertNotFound();
        $this->assertSame('ar', app()->getLocale());
        $this->from('https://example.test/services')->get('https://example.test/index/fr')
            ->assertRedirect('https://example.test/services')->assertSessionHas('lang', 'fr');
        // Record whether the existing switching endpoint changes the session
        // key consumed by FrontLanguages on the next request.
        $this->get('https://example.test/service/unknown')->assertNotFound();
        $this->assertSame('fr', app()->getLocale(), 'Language switch must persist into FrontLanguages.');
    }

    public function test_https_redirect_finishes_and_service_sitemap_excludes_drafts(): void
    {
        $published = Service::withoutGlobalScopes()->create(['title_en' => 'Published', 'slug_en' => 'published']);
        Service::withoutGlobalScopes()->create(['title_en' => 'Draft', 'slug_en' => 'draft', 'is_published' => false]);
        $this->get('http://example.test/service/published')->assertRedirect('https://example.test/service/published');
        $this->get('https://example.test/service/published')->assertOk();
        $published->update(['slug_en' => 'updated']);
        $this->get('https://example.test/service/published')->assertStatus(301)->assertRedirect('https://example.test/service/updated');
        $this->get('https://example.test/service/updated')->assertOk();
        $this->get('https://example.test/service/draft')->assertNotFound();
        $xml = $this->get('https://example.test/sitemap-services.xml')->assertOk()->streamedContent();
        $this->assertNotFalse(simplexml_load_string($xml));
        $this->assertStringContainsString('/service/updated', $xml);
        $this->assertStringNotContainsString('/service/draft', $xml);
        $this->assertStringNotContainsString('/service/published', $xml);
    }

    public function test_registered_controller_actions_exist(): void
    {
        $missing = [];
        foreach (Route::getRoutes() as $route) {
            $action = $route->getActionName();
            if ($action === 'Closure' || ! str_contains($action, '@')) {
                continue;
            }
            [$class, $method] = explode('@', $action, 2);
            if (! class_exists($class) || ! method_exists($class, $method)) {
                $missing[] = $route->uri().' -> '.$action;
            }
        }
        $this->assertSame([], $missing, 'Existing routes with missing controller actions');
    }

    public function test_public_service_api_and_static_crawler_files(): void
    {
        Service::withoutGlobalScopes()->create(['title_en' => 'Published service', 'slug_en' => 'api-published', 'photo' => 'qa.png']);
        Service::withoutGlobalScopes()->create(['title_en' => 'Draft service', 'slug_en' => 'api-draft', 'is_published' => false]);
        $this->withHeader('Accept-Language', 'en')->get('https://example.test/api/services')
            ->assertOk()->assertJsonCount(1, 'data')->assertJsonPath('data.0.slug', 'api-published');
        $this->get('https://example.test/api/single-service/api-draft')->assertOk()->assertJsonPath('data', []);
        $robots = file_get_contents(public_path('robots.txt'));
        $this->assertStringContainsString('Sitemap: https://innovadentalclinics.com/sitemap-services.xml', $robots);
        $this->assertDoesNotMatchRegularExpression('#Disallow:\s*/service#', $robots);
        $this->assertNotFalse(simplexml_load_file(public_path('sitemap.xml')));
    }
}
