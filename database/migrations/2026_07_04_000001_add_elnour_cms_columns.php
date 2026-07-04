<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // ---- categories: icon + card description + ordering/visibility ----
        Schema::table('categories', function (Blueprint $table) {
            foreach ([
                'icon',
                'short_details_ar',
                'short_details_en',
                'short_details_fr',
            ] as $column) {
                if (!Schema::hasColumn('categories', $column)) {
                    $table->text($column)->nullable();
                }
            }
            if (!Schema::hasColumn('categories', 'sort_order')) {
                $table->integer('sort_order')->default(0);
            }
            if (!Schema::hasColumn('categories', 'home_sort_order')) {
                $table->integer('home_sort_order')->default(0);
            }
            if (!Schema::hasColumn('categories', 'is_active')) {
                $table->tinyInteger('is_active')->default(1);
            }
        });

        // ---- services / sliders / partners / certificates: ordering/visibility ----
        foreach (['services', 'sliders', 'partners', 'certificates'] as $tableName) {
            Schema::table($tableName, function (Blueprint $table) use ($tableName) {
                if (!Schema::hasColumn($tableName, 'sort_order')) {
                    $table->integer('sort_order')->default(0);
                }
                if (!Schema::hasColumn($tableName, 'is_active')) {
                    $table->tinyInteger('is_active')->default(1);
                }
            });
        }

        // ---- generalsettings: header/footer/contact extras ----
        Schema::table('generalsettings', function (Blueprint $table) {
            foreach ([
                'catalog_file',
                'catalog_file_mobile',
                'catalog_label_ar',
                'catalog_label_en',
                'catalog_label_short_ar',
                'catalog_label_short_en',
                'analytics_id',
                'google_verification',
                'working_days_ar',
                'working_days_en',
                'working_hours_ar',
                'working_hours_en',
                'map_link',
                'copyright_ar',
                'copyright_en',
            ] as $column) {
                if (!Schema::hasColumn('generalsettings', $column)) {
                    $table->text($column)->nullable();
                }
            }
        });

        // ---- pagesettings: home page + about page section copy ----
        Schema::table('pagesettings', function (Blueprint $table) {
            foreach ([
                // Home hero
                'home_hero_title_ar',
                'home_hero_title_en',
                'home_hero_image',
                'home_hero_image_mobile',
                'home_hero_cta_text_ar',
                'home_hero_cta_text_en',
                'home_hero_cta_link',
                // Home about preview
                'home_about_badge_ar',
                'home_about_badge_en',
                'home_about_image',
                'home_about_cta_text_ar',
                'home_about_cta_text_en',
                // Home flip-cards section header
                'home_cards_title_ar',
                'home_cards_title_en',
                'home_cards_details_ar',
                'home_cards_details_en',
                'home_cards_cta_text_ar',
                'home_cards_cta_text_en',
                // Home clients section header
                'home_clients_badge_ar',
                'home_clients_badge_en',
                'home_clients_title_ar',
                'home_clients_title_en',
                'home_clients_details_ar',
                'home_clients_details_en',
                // Home products/categories section header
                'home_products_badge_ar',
                'home_products_badge_en',
                'home_products_title_ar',
                'home_products_title_en',
                'home_products_details_ar',
                'home_products_details_en',
                'home_products_cta_text_ar',
                'home_products_cta_text_en',
                // Home certificates section (blade already references these)
                'certificates_title_ar',
                'certificates_title_en',
                'certificates_subtitle_ar',
                'certificates_subtitle_en',
                'certificates_description_ar',
                'certificates_description_en',
                // Home contact section header
                'home_contact_badge_ar',
                'home_contact_badge_en',
                'home_contact_title_ar',
                'home_contact_title_en',
                'home_contact_details_ar',
                'home_contact_details_en',
                // About page hero
                'about_hero_badge_ar',
                'about_hero_badge_en',
                'about_hero_title_ar',
                'about_hero_title_en',
                'about_hero_details_ar',
                'about_hero_details_en',
                'about_hero_image',
                // About page content
                'about_side_image',
                'about_badge_ar',
                'about_badge_en',
                'about_features_title_ar',
                'about_features_title_en',
                'mission_title_ar',
                'mission_title_en',
                'mission_details_ar',
                'mission_details_en',
            ] as $column) {
                if (!Schema::hasColumn('pagesettings', $column)) {
                    $table->text($column)->nullable();
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Intentionally left non-destructive: columns are additive and hold live content.
    }
};
