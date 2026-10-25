<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ReleaseRegressionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        if (DB::connection()->getDriverName() !== 'sqlite' || ! str_contains(config('database.connections.sqlite.database'), 'cangrows-release-')) {
            $this->markTestSkipped('Requires phpunit.release.xml and its disposable fixture.');
        }
        DB::beginTransaction();
    }

    protected function tearDown(): void
    {
        if (isset($this->app) && $this->app && DB::connection()->transactionLevel() > 0) {
            DB::rollBack();
        }
        parent::tearDown();
    }

    public function test_real_composers_home_articles_categories_and_service_heads(): void
    {
        foreach (['/' => 'عيادة الاختبار', '/en' => 'Test clinic', '/article-ar' => 'عنوان المقال', '/en/article-en' => 'Article SEO title', '/services-category/category-ar' => 'تصنيف اختبار', '/en/services-category/category-en' => 'Test category', '/services/'.rawurlencode('خدمة-اختبار') => 'خدمة اختبار - عيادة الاختبار', '/en/services/release-service' => 'Release service - Test clinic', '/services/custom-ar' => 'عنوان SEO مخصص', '/en/services/custom-en' => 'Custom SEO title'] as $path => $title) {
            $response = $this->get('https://example.test'.$path);
            $response->assertOk()->assertSee($title);
            $dom = new \DOMDocument;
            @$dom->loadHTML($response->getContent());
            $xpath = new \DOMXPath($dom);
            $this->assertSame(1, $xpath->query('//head/title')->length, $path);
            $this->assertSame(1, $xpath->query('//head/link[@rel="canonical"]')->length, $path);
            if (str_starts_with($path, '/services/') || str_starts_with($path, '/en/services/')) {
                foreach (['//head/meta[@name="description"]', '//head/meta[@property="og:title"]', '//head/meta[@property="og:image"]', '//head/meta[@name="twitter:card"]', '//h1'] as $query) {
                    $this->assertSame(1, $xpath->query($query)->length, $path.' '.$query);
                }
            }
        }
        $this->get('https://example.test/services/hidden-ar')->assertNotFound();
        $this->get('https://example.test/en/services/hidden-en')->assertNotFound();
        $this->get('https://example.test/en/services/old-custom')->assertStatus(301)->assertRedirect('https://example.test/en/services/custom-en');
        $this->get('https://example.test/services')->assertOk()->assertSee('/services/custom-ar', false)->assertDontSee('/services/hidden-ar', false);
    }

    public function test_api_contract_and_category_relation_exclude_drafts_but_admin_sees_them(): void
    {
        $response = $this->withHeader('Accept-Language', 'en')->get('https://example.test/api/services');
        $response->assertOk()->assertJsonPath('status', true)->assertJsonCount(2, 'data')->assertJsonStructure(['data' => [['id', 'title', 'details', 'meta_title', 'meta_details', 'slug', 'tags', 'photo']]]);
        $this->get('https://example.test/api/single-service/hidden-en')->assertOk()->assertJsonPath('data', []);
        $this->get('https://example.test/api/single-service/release-service')->assertOk()->assertJsonPath('data.slug', 'release-service');
        $this->get('https://example.test/api/single-category/category-en')->assertOk()->assertJsonCount(2, 'data.products');
        app()->instance('request', Request::create('/services'));
        $this->assertSame(2, Category::firstOrFail()->services()->count());
        app()->instance('request', Request::create('/admin/services'));
        $this->assertSame(3, Category::firstOrFail()->services()->count());
        $this->assertSame(3, Service::count());
    }

    public function test_real_admin_forms_and_update_show_saved_multilingual_metadata(): void
    {
        $this->actingAs(Admin::findOrFail(1), 'admin');
        $this->get('https://example.test/admin/services/create')->assertOk()->assertSee('name="og_image"', false);
        $this->get('https://example.test/admin/services/edit/3')->assertOk()->assertSee('hidden-ar');
        $this->post('https://example.test/admin/services/update/2', ['meta_title_ar' => 'عنوان جديد', 'og_title_en' => 'Saved social title', 'slug_en' => 'changed-custom'])->assertOk()->assertJsonMissing(['errors']);
        $this->get('https://example.test/admin/services/edit/2')->assertOk()->assertSee('عنوان جديد')->assertSee('Saved social title');
        $this->assertDatabaseHas('service_slug_redirects', ['service_id' => 2, 'locale' => 'en', 'slug' => 'custom-en']);
        $this->get('https://example.test/en/services/custom-en')->assertStatus(301)->assertRedirect('https://example.test/en/services/changed-custom');
    }

    public function test_migration_round_trip_on_disposable_legacy_rows(): void
    {
        $migration = require base_path('database/migrations/2026_10_25_000001_add_service_social_metadata.php');
        $before = DB::table('services')->get(['id', 'title_ar', 'slug_ar'])->toJson();
        $migration->down();
        $this->assertFalse(Schema::hasColumn('services', 'og_image'));
        $this->assertFalse(Schema::hasTable('service_slug_redirects'));
        $this->assertSame($before, DB::table('services')->get(['id', 'title_ar', 'slug_ar'])->toJson());
        $migration->up();
        $this->assertSame(3, DB::table('services')->where('is_published', true)->count());
        $this->assertSame($before, DB::table('services')->get(['id', 'title_ar', 'slug_ar'])->toJson());
        DB::table('services')->where('id', 1)->update(['og_title_ar' => 'حفظ', 'og_image' => 'fixture.png']);
        $this->assertDatabaseHas('services', ['id' => 1, 'og_title_ar' => 'حفظ', 'og_image' => 'fixture.png']);
        $columns = Schema::getColumnListing('services');
        $this->assertSame(count($columns), count(array_unique($columns)));
        $this->assertCount(2, DB::select("PRAGMA index_list('service_slug_redirects')"));
    }

    public function test_http_redirect_host_query_and_deleted_history_do_not_loop(): void
    {
        $this->get('http://example.test/en/services/custom-en')->assertStatus(301)->assertRedirect('https://example.test/en/services/custom-en');
        $this->get('https://www.example.test/en/services/custom-en')->assertStatus(301)->assertRedirect('https://example.test/en/services/custom-en');
        $this->get('https://example.test/en/services/custom-en?utm_source=test')->assertOk()->assertSee('href="https://example.test/en/services/custom-en"', false);
        DB::table('services')->where('id', 2)->delete();
        $this->get('https://example.test/en/services/old-custom')->assertNotFound();
        $response = $this->get('https://example.test/sitemap.xml')->assertOk();
        $this->assertNotFalse(simplexml_load_string($response->getContent()));
        $response->assertDontSee('/services/custom-en', false)->assertDontSee('/services/hidden-en', false);
        $this->get('https://example.test/robots.txt')->assertOk()->assertHeader('Content-Type', 'text/plain; charset=UTF-8');
    }

    public function test_local_http_canonical_and_production_https_policy_are_consistent(): void
    {
        config(['app.url' => 'http://example.test']);
        $this->get('http://example.test/en/services/custom-en')->assertOk()->assertSee('href="http://example.test/en/services/custom-en"', false);
        // Simulate the environment flag; no production connection or configuration is used.
        $this->app->instance('env', 'production');
        $this->get('http://example.test/en/services/custom-en')->assertStatus(301)->assertRedirect('https://example.test/en/services/custom-en');
        $this->get('https://example.test/en/services/custom-en')->assertOk()->assertSee('href="https://example.test/en/services/custom-en"', false);
    }

    public function test_numeric_zero_slug_history_is_kept(): void
    {
        app()->instance('request', Request::create('/admin/services'));
        $service = Service::findOrFail(2);
        $service->update(['slug_en' => '0']);
        $service->update(['slug_en' => 'after-zero']);
        $this->assertDatabaseHas('service_slug_redirects', ['service_id' => 2, 'locale' => 'en', 'slug' => '0']);
        $this->get('https://example.test/en/services/0')->assertStatus(301)->assertRedirect('https://example.test/en/services/after-zero');
    }

    public function test_regular_service_photo_upload_uses_public_directory(): void
    {
        $this->actingAs(Admin::findOrFail(1), 'admin');
        $this->post('https://example.test/admin/services/update/2', ['photo' => \Illuminate\Http\UploadedFile::fake()->image('normal.png')])->assertOk();
        $filename = DB::table('services')->where('id', 2)->value('photo');
        try {
            $this->assertFileExists(public_path('assets/images/services/'.$filename));
            $this->assertMatchesRegularExpression('/^[a-f0-9-]+\.png$/', $filename);
        } finally {
            if (is_file(public_path('assets/images/services/'.$filename))) {
                unlink(public_path('assets/images/services/'.$filename));
            }
        }
    }

    public function test_sitemap_matches_actual_public_routes_when_language_navigation_is_disabled(): void
    {
        DB::table('generalsettings')->where('id', 1)->update(['lang_english' => 0]);
        $this->get('https://example.test/en/services/custom-en')->assertOk();
        $this->get('https://example.test/sitemap.xml')->assertOk()->assertSee('https://example.test/en/services/custom-en', false);
    }
}
