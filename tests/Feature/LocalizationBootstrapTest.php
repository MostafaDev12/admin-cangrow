<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider;
use Tests\TestCase;

class LocalizationBootstrapTest extends TestCase
{
    public function test_real_provider_facade_and_registered_middleware_resolve(): void
    {
        $this->assertTrue($this->app->providerIsLoaded(LaravelLocalizationServiceProvider::class));
        $this->assertInstanceOf(\Mcamara\LaravelLocalization\LaravelLocalization::class, $this->app->make('laravellocalization'));
        $this->assertArrayHasKey('ar', LaravelLocalization::getSupportedLocales());
        $this->assertArrayHasKey('en', LaravelLocalization::getSupportedLocales());
        foreach (['localize', 'localizationRedirect', 'localeSessionRedirect', 'localeCookieRedirect', 'localeViewPath'] as $alias) {
            $this->assertTrue(class_exists(Route::getMiddleware()[$alias]));
        }
        $this->assertSame('/service/{slug}', '/'.Route::getRoutes()->getByName('single-service.index')->uri());
        $this->assertSame('sqlite', config('database.default'));
        $this->assertSame(':memory:', DB::connection()->getDatabaseName());
    }

    public function test_seo_migration_preserves_real_legacy_service_schema_and_data(): void
    {
        foreach (glob(database_path('migrations/*services_table.php')) as $path) {
            (require $path)->up();
        }
        DB::table('services')->insert([
            'id' => 123, 'title_ar' => 'خدمة قديمة', 'slug_en' => 'Legacy-Service',
            'slug_ar' => 'خدمة-قديمة', 'meta_title_fr' => 'Titre existant',
        ]);
        $before = (array) DB::table('services')->find(123);
        $migration = require database_path('migrations/2026_10_25_000000_add_service_seo.php');
        $migration->up();
        $migration->up();
        $after = (array) DB::table('services')->find(123);
        foreach ($before as $field => $value) {
            $this->assertSame($value, $after[$field], $field);
        }
        $this->assertEquals(1, $after['is_published']);
        $this->assertTrue(Schema::hasColumns('services', ['category_id', 'subcategory_id', 'parent_id', 'short_details_ar', 'og_title_fr', 'og_description_ar', 'og_image']));
        $this->assertTrue(Schema::hasTable('service_slug_histories'));
    }
}
