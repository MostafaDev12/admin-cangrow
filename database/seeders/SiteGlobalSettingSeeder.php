<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\SiteGlobalSetting;
use Illuminate\Database\Seeder;

/**
 * Seed the chrome strings (nav, footer, contact labels) that previously lived
 * as literals in FrontPagesController::siteGlobals().
 *
 * Idempotent — safe to re-run via:
 *   php artisan db:seed --class=SiteGlobalSettingSeeder
 *
 * Existing rows ARE overwritten on re-run; admin edits will be lost. Run only
 * for initial setup or after adding new keys via code.
 */
class SiteGlobalSettingSeeder extends Seeder
{
    public function run(): void
    {
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

        foreach (Language::all() as $language) {
            SiteGlobalSetting::updateOrCreate(
                ['language_id' => $language->id],
                ['content_json' => $defaults],
            );
        }
    }
}
