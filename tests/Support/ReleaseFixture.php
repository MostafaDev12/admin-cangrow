<?php

namespace Tests\Support;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ReleaseFixture
{
    public static function load(): void
    {
        // Only a newly created disposable SQLite database is accepted. Never the application DB.
        if (DB::connection()->getDriverName() !== 'sqlite' || Schema::hasTable('services')) {
            throw new \RuntimeException('Release fixture requires an empty disposable SQLite database.');
        }
        $tables = json_decode(file_get_contents(__DIR__.'/../Fixtures/legacy-columns.json'), true, 512, JSON_THROW_ON_ERROR);
        foreach ($tables as $name => $columns) {
            Schema::create($name, function (Blueprint $table) use ($columns) {
                foreach ($columns as $column) {
                    if ($column === 'id') {
                        $table->increments('id');
                    } else {
                        // Column names mirror the supplied legacy dump; this is not MySQL type validation.
                        $table->text($column)->nullable()->default('');
                    }
                }
            });
        }
        DB::table('services')->insert([
            'id' => 1, 'title_ar' => 'خدمة اختبار', 'title_en' => 'Release service',
            'slug_ar' => 'خدمة-اختبار', 'slug_en' => 'release-service',
            'details_ar' => '<h2>تفاصيل الخدمة</h2><p>محتوى اختبار ظاهر.</p>',
            'details_en' => '<h2>Service details</h2><p>Visible test content.</p>',
            'category_id' => 1, 'photo' => 'release-fixture.png',
            'created_at' => '2026-10-25 00:00:00', 'updated_at' => '2026-10-25 00:00:00',
        ]);
        (require base_path('database/migrations/2026_10_25_000001_add_service_social_metadata.php'))->up();
        DB::table('services')->insert([
            'id' => 2, 'title_ar' => 'خدمة مخصصة', 'title_en' => 'Custom service',
            'slug_ar' => 'custom-ar', 'slug_en' => 'custom-en', 'category_id' => 1,
            'meta_title_ar' => 'عنوان SEO مخصص', 'meta_title_en' => 'Custom SEO title',
            'meta_details_ar' => 'وصف SEO مخصص', 'meta_details_en' => 'Custom SEO description',
            'photo' => 'release-fixture.png', 'created_at' => '2026-10-25 00:00:00', 'updated_at' => '2026-10-25 00:00:00',
        ]);
        DB::table('services')->insert([
            'id' => 3, 'title_ar' => 'خدمة مخفية', 'title_en' => 'Hidden service',
            'slug_ar' => 'hidden-ar', 'slug_en' => 'hidden-en', 'category_id' => 1,
            'is_published' => false, 'photo' => 'release-fixture.png',
        ]);
        DB::table('service_slug_redirects')->insert(['service_id' => 2, 'locale' => 'en', 'slug' => 'old-custom']);
        DB::table('generalsettings')->insert([
            'id' => 1, 'title_ar' => 'عيادة الاختبار', 'title_en' => 'Test clinic',
            'lang_arabic' => 1, 'lang_english' => 1, 'lang_france' => 0,
            'phones' => '01000000000', 'emails' => 'test@example.test',
            'addresses_ar' => '[]', 'addresses_en' => '[]', 'addresses_fr' => '[]',
            'is_capcha' => 0,
        ]);
        DB::table('pagesettings')->insert(['id' => 1]);
        DB::table('socialsettings')->insert(['id' => 1, 'f_status' => 0, 'ystatus' => 0, 't_status' => 0, 'd_status' => 0]);
        DB::table('languages')->insert([
            ['id' => 1, 'language' => 'العربية', 'name' => 'Arabic', 'sign' => 'ar', 'rtl' => 1, 'is_default' => 1],
            ['id' => 2, 'language' => 'English', 'name' => 'English', 'sign' => 'en', 'rtl' => 0, 'is_default' => 0],
        ]);
        DB::table('categories')->insert(['id' => 1, 'title_ar' => 'تصنيف اختبار', 'title_en' => 'Test category', 'slug_ar' => 'category-ar', 'slug_en' => 'category-en', 'photo' => 'release-fixture.png']);
        DB::table('sliders')->insert(['id' => 1, 'title_ar' => 'مرحبا', 'title_en' => 'Welcome']);
        DB::table('blogs')->insert([
            'id' => 1, 'title_ar' => 'مقال اختبار', 'title_en' => 'Test article',
            'meta_title_ar' => 'عنوان المقال', 'meta_title_en' => 'Article SEO title',
            'meta_details_ar' => 'وصف المقال', 'meta_details_en' => 'Article SEO description',
            'slug_ar' => 'article-ar', 'slug_en' => 'article-en',
            'details_ar' => '<h2>محتوى المقال</h2><p>نص اختبار.</p>',
            'photo' => 'release-fixture.png', 'created_at' => '2026-10-25 00:00:00',
            'updated_at' => '2026-10-25 00:00:00', 'blog_date' => '2026-10-25',
        ]);
        DB::table('admins')->insert(['id' => 1, 'name' => 'Release QA', 'email' => 'qa@example.test', 'password' => password_hash('disposable-test-password', PASSWORD_BCRYPT), 'role_id' => 0, 'status' => 1]);
    }
}
