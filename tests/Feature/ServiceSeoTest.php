<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Service;
use App\Support\ServiceSeo;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Bootstrap\RegisterProviders;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ServiceSeoTest extends TestCase
{
    public function createApplication()
    {
        $app = require __DIR__.'/../../bootstrap/app.php';
        $app->beforeBootstrapping(RegisterProviders::class, function ($app) {
            $app['config']->set('database.default', 'sqlite');
            $app['config']->set('database.connections.sqlite.database', ':memory:');
            $app['config']->set('service_seo.origin', 'https://example.test');
            $app['config']->set('app.key', 'base64:'.base64_encode(str_repeat('a', 32)));
        });
        $app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware([
            \App\Http\Middleware\IpLocation::class,
            \App\Http\Middleware\FrontLanguages::class,
            \App\Http\Middleware\HTTPSConnection::class,
        ]);
        // Avoid unrelated global database-backed site settings in focused views.
        $this->app['events']->forget('composing: *');
        $this->app['view']->getFinder()->prependLocation(__DIR__.'/../fixtures/views');
        foreach (glob(database_path('migrations/*services_table.php')) as $migration) {
            (require $migration)->up();
        }
        (require database_path('migrations/2026_10_25_000000_add_service_seo.php'))->up();
    }

    private function service(array $attributes = []): Service
    {
        return Service::withoutGlobalScopes()->create($attributes + [
            'title_ar' => 'خدمة الأسنان', 'title_en' => 'Dental care', 'title_fr' => 'Soins dentaires',
            'slug_ar' => 'الأسنان', 'slug_en' => 'dental-care', 'slug_fr' => 'soins',
            'details_en' => '<p>Service description</p>', 'photo' => 'service.jpg',
        ]);
    }

    private function admin(): void
    {
        $this->actingAs((new Admin)->forceFill(['id' => 1, 'role_id' => 0]), 'admin');
    }

    public function test_admin_create_update_and_multilingual_metadata_persistence(): void
    {
        $this->admin();
        $payload = ['slug_ar' => 'خدمة', 'slug_en' => 'care', 'slug_fr' => 'soin', 'title_en' => 'Care', 'is_published' => 1];
        foreach (['ar', 'en', 'fr'] as $locale) {
            $payload['meta_title_'.$locale] = 'Meta '.$locale;
            $payload['meta_details_'.$locale] = 'Description '.$locale;
            $payload['og_title_'.$locale] = 'Social '.$locale;
            $payload['og_description_'.$locale] = 'Social description '.$locale;
        }
        $this->post('/admin/services/create', $payload)->assertOk()->assertJsonMissing(['errors']);
        $service = Service::withoutGlobalScopes()->firstOrFail();
        foreach ($payload as $field => $value) {
            $this->assertEquals($value, $service->$field);
        }
        $this->post('/admin/services/update/'.$service->id, ['slug_en' => 'new-care', 'og_title_en' => 'Updated'])->assertOk()->assertJsonMissing(['errors']);
        $this->assertSame('Updated', $service->fresh()->og_title_en);
        $this->assertSame('خدمة', $service->fresh()->getRawOriginal('slug_ar'));
        $this->assertDatabaseHas('service_slug_histories', ['slug' => 'care', 'service_id' => $service->id]);
    }

    public function test_public_metadata_language_canonical_and_json_ld_are_safe(): void
    {
        $service = $this->service(['meta_title_fr' => 'Titre <b>SEO</b>', 'og_title_fr' => '"</script><script>alert(1)</script>']);
        $response = $this->get('/service/soins?tracking=1')->assertOk();
        $response->assertSee('<title>Titre SEO</title>', false)->assertSee('https://example.test/service/soins', false);
        $html = $response->getContent();
        $this->assertSame(1, substr_count($html, '<title>'));
        $this->assertSame(1, substr_count($html, 'rel="canonical"'));
        $this->assertSame(1, substr_count($html, 'property="og:image"'));
        $this->assertStringContainsString('name="twitter:card"', $html);
        preg_match('#<script type="application/ld\+json">(.*?)</script>#s', $html, $matches);
        $json = json_decode($matches[1], true, 512, JSON_THROW_ON_ERROR);
        $this->assertSame('Service', $json['@type']);
        $this->assertSame('fr', $json['inLanguage']);
        $this->assertSame('Soins dentaires', $json['name']);
        $this->assertStringNotContainsString('<script>alert', $html);
        $this->assertStringNotContainsString('tracking', $json['url']);
    }

    public function test_fallbacks_and_internal_slug_fallback(): void
    {
        $service = $this->service(['slug_fr' => null, 'title_fr' => null]);
        $seo = ServiceSeo::metadata($service, 'fr');
        $this->assertSame('Dental care', $seo['title']);
        $this->assertSame('Service description', $seo['description']);
        $this->assertSame('dental-care', $service->slug_fr);
        $this->assertSame($seo['title'], $seo['og_title']);
        $service->meta_title_en = 'English metadata';
        $this->assertSame('خدمة الأسنان', ServiceSeo::metadata($service, 'ar')['title']);
    }

    public function test_drafts_and_unknown_services_are_not_public_and_sitemap_is_dynamic(): void
    {
        $this->service();
        $draft = $this->service(['is_published' => false, 'slug_ar' => 'مسودة', 'slug_en' => 'draft', 'slug_fr' => null]);
        $this->get('/service/draft')->assertNotFound();
        $this->get('/service/missing')->assertNotFound();
        $xml = $this->get('/sitemap-services.xml')->assertOk()->streamedContent();
        $this->assertNotFalse(simplexml_load_string($xml));
        $this->assertStringContainsString('/service/dental-care', $xml);
        $this->assertStringNotContainsString('/service/draft', $xml);
        $this->assertSame(1, Service::count());
        $this->assertStringContainsString('sitemap-services.xml', file_get_contents(public_path('robots.txt')));
    }

    public function test_historical_redirects_follow_latest_slug_and_hide_drafts(): void
    {
        $service = $this->service();
        $service->update(['slug_en' => 'new-care']);
        $service->update(['slug_en' => 'latest-care']);
        $this->get('/service/dental-care')->assertStatus(301)->assertRedirect('https://example.test/service/latest-care');
        $this->get('/service/new-care')->assertStatus(301)->assertRedirect('https://example.test/service/latest-care');
        $this->get('/en/service/dental-care')->assertStatus(301)->assertRedirect('https://example.test/service/latest-care');
        $this->get('/service/latest-care')->assertOk();
        $service->update(['is_published' => false]);
        $this->get('/service/dental-care')->assertNotFound();
        $this->get('/service/latest-care')->assertNotFound();
        $this->get('/en/service/dental-care')->assertNotFound();
    }

    public function test_admin_authorization_and_invalid_inputs(): void
    {
        $this->post('/admin/services/create', ['slug_en' => 'new'])->assertRedirect(route('admin.login'));
        $this->admin();
        $this->service();
        foreach ([['slug_en' => 'dental-care'], ['slug_en' => '../bad'], ['slug_en' => 'good', 'is_published' => 9], ['slug_en' => 'good', 'og_image' => UploadedFile::fake()->create('bad.svg', 1, 'image/svg+xml')]] as $payload) {
            $this->post('/admin/services/create', $payload)->assertOk()->assertJsonStructure(['errors']);
        }
        $this->assertSame(1, Service::withoutGlobalScopes()->count());
    }

    public function test_migration_preserves_records_and_is_repeatable(): void
    {
        $service = $this->service();
        $migration = require database_path('migrations/2026_10_25_000000_add_service_seo.php');
        $migration->up();
        $migration->down();
        $this->assertDatabaseHas('services', ['id' => $service->id, 'slug_en' => 'dental-care', 'is_published' => true]);
    }

    public function test_real_service_template_has_one_set_of_metadata_and_working_language_link(): void
    {
        $this->app['view']->getFinder()->setPaths([resource_path('views')]);
        $this->app['view']->getFinder()->flush();
        Schema::create('pagesettings', fn (Blueprint $table) => $table->increments('id'));
        Schema::create('socialsettings', function (Blueprint $table) {
            $table->increments('id');
            foreach (['d_status', 'f_status', 'ystatus', 't_status'] as $column) {
                $table->boolean($column)->default(false);
            }
        });
        \Illuminate\Support\Facades\DB::table('socialsettings')->insert(['id' => 1]);
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_id');
            $table->text('photo')->nullable();
        });
        $this->service();
        $gs = (object) [
            'phones' => '123', 'emails' => 'test@example.test', 'addresses_en' => '[]',
            'title_en' => 'Clinic', 'logo_en' => '/logo.png', 'favicon' => '/favicon.ico',
            'website_title' => 'Clinic',
        ];
        $this->app['view']->share(['gs' => $gs, 'services' => Service::all(), 'locations' => collect(), 'categories' => collect(), 'parentservices' => collect()]);
        $html = $this->get('/service/dental-care')->assertOk()->getContent();
        foreach (['<title>', 'rel="canonical"', 'name="description"', 'property="og:title"', 'property="og:image"', '<h1 '] as $tag) {
            $this->assertSame(1, substr_count($html, $tag), $tag);
        }
        $this->assertStringContainsString('/service/'.rawurlencode('الأسنان'), $html);
    }

    public function test_og_upload_and_draft_admin_edit_values(): void
    {
        $this->admin();
        $temp = sys_get_temp_dir().'/service-seo-test-'.\Illuminate\Support\Str::uuid();
        $this->app->usePublicPath($temp);
        try {
            $this->post('/admin/services/create', [
                'slug_en' => 'upload', 'is_published' => 0,
                'og_title_fr' => 'Titre existant',
                'og_image' => UploadedFile::fake()->image('social.png', 1200, 630),
            ])->assertOk()->assertJsonMissing(['errors']);
            $service = Service::withoutGlobalScopes()->firstOrFail();
            $this->assertFileExists($temp.'/assets/images/services/'.$service->og_image);
            $image = $service->og_image;
            $this->post('/admin/services/update/'.$service->id, ['og_title_en' => 'Updated'])->assertOk()->assertJsonMissing(['errors']);
            $service->refresh();
            $this->assertSame($image, $service->og_image);
            $this->assertFalse($service->is_published);
            $html = view('admin.services.seo', ['data' => $service])->render();
            $this->assertStringContainsString('Titre existant', $html);
            $this->assertStringContainsString('value="0" selected', $html);
        } finally {
            \Illuminate\Support\Facades\File::deleteDirectory($temp);
        }
    }

    public function test_service_permissions_reject_admin_without_services_access(): void
    {
        $admin = (new Admin)->forceFill(['id' => 2, 'role_id' => 2]);
        $admin->setRelation('role', (new \App\Models\Role)->forceFill(['section' => 'blogs']));
        $this->actingAs($admin, 'admin');
        $this->post('/admin/services/create', ['slug_en' => 'denied'])->assertRedirect(route('admin.dashboard'));
        $this->assertSame(0, Service::withoutGlobalScopes()->count());
    }

    public function test_production_origin_redirects_once_to_https_canonical_domain(): void
    {
        $this->service();
        $this->app->instance('env', 'production');
        config(['service_seo.origin' => 'http://example.test']);
        $this->get('https://other.test/service/dental-care')->assertStatus(301)->assertRedirect('https://example.test/service/dental-care');
        $this->get('https://example.test/service/dental-care')->assertOk();
    }
}
