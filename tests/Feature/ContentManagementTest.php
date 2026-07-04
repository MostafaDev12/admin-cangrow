<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Service;
use App\Models\SiteStat;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ContentManagementTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        // The IpLocation middleware on front routes reads the superglobal directly,
        // which is not populated when running through the CLI test runner.
        $_SERVER['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    }

    private function admin(): Admin
    {
        return Admin::findOrFail(1);
    }

    /**
     * The app's HTTPSConnection middleware redirects every non-secure request,
     * so all test requests must use an https URL explicitly.
     */
    public function get($uri, array $headers = [])
    {
        return parent::get('https://localhost' . $uri, $headers);
    }

    public function post($uri, array $data = [], array $headers = [])
    {
        return parent::post('https://localhost' . $uri, $data, $headers);
    }

    /* -------------------- Front pages render the dynamic content -------------------- */

    public function test_homepage_renders_dynamic_content(): void
    {
        $response = $this->get('/ar');

        $response->assertStatus(200);
        // Hero stat (site_stats)
        $response->assertSee('جودة مضمونة');
        // Category grid card (categories)
        $response->assertSee('خزانات المياه');
        // Flip card (features)
        $response->assertSee('فريق العمل');
        // Certificates image (certificates table)
        $response->assertSee('cert-1.png');
        // Clients logo (partners table)
        $response->assertSee('steel.webp');
    }

    public function test_services_page_lists_active_categories(): void
    {
        $response = $this->get('/ar/services');

        $response->assertStatus(200);
        foreach (Category::where('is_active', 1)->get() as $category) {
            $response->assertSee($category->title_ar);
        }
    }

    public function test_category_page_lists_its_products(): void
    {
        $response = $this->get('/ar/services-category/' . rawurlencode('خزانات-المياه'));

        $response->assertStatus(200);
        $response->assertSee('خزانات مياه أفقية');
        $response->assertSee('خزانات استانلس ستيل');
    }

    public function test_product_detail_page_renders_from_database(): void
    {
        $response = $this->get('/ar/service/' . rawurlencode('خزانات-مياه-أفقية'));

        $response->assertStatus(200);
        $response->assertSee('خزانات مياه أفقية');
        $response->assertDontSee('لا توجد بيانات لعرضها');
    }

    public function test_unknown_category_slug_shows_empty_state(): void
    {
        $response = $this->get('/ar/services-category/unknown-slug-xyz');

        $response->assertStatus(200);
        $response->assertSee('لا توجد بيانات لعرضها');
    }

    public function test_about_page_renders_dynamic_stats_and_values(): void
    {
        $response = $this->get('/ar/about-us');

        $response->assertStatus(200);
        $response->assertSee('رضا العملاء');   // about_page stat
        $response->assertSee('جودة مضمونة');    // about value card
        $response->assertSee('خامات عالية الجودة'); // checklist item
    }

    /* -------------------- Dashboard edits reflect on the frontend -------------------- */

    public function test_stat_edit_reflects_on_homepage(): void
    {
        SiteStat::where('section', 'home_hero')->where('title_ar', 'عميل راضٍ')->update(['value' => '9999+']);

        $this->get('/ar')->assertSee('9999+');
    }

    public function test_deactivated_category_disappears_from_frontend(): void
    {
        Category::where('slug_ar', 'مستلزمات-المرور')->update(['is_active' => 0]);

        $this->get('/ar/services')->assertDontSee('مستلزمات المرور');
    }

    public function test_deactivated_product_returns_404(): void
    {
        Service::where('slug_ar', 'كرفانات')->update(['is_active' => 0]);

        $this->get('/ar/service/' . rawurlencode('كرفانات'))->assertStatus(404);
    }

    public function test_deactivated_category_direct_url_shows_empty_state(): void
    {
        Category::where('slug_ar', 'مستلزمات-المرور')->update(['is_active' => 0]);

        $response = $this->get('/ar/services-category/' . rawurlencode('مستلزمات-المرور'));

        $response->assertStatus(200);
        $response->assertSee('لا توجد بيانات لعرضها');
        $response->assertDontSee('حواجز مرورية'); // its products are not listed
    }

    /* -------------------- Security: no sensitive settings in public HTML -------------------- */

    public function test_public_pages_do_not_expose_sensitive_settings(): void
    {
        $gs = \App\Models\Generalsetting::findOrFail(1);

        foreach (['/ar', '/ar/about-us', '/ar/services'] as $uri) {
            $html = $this->get($uri)->assertStatus(200)->getContent();

            $this->assertStringNotContainsString('smtp_host', $html, "smtp_host key leaked on {$uri}");
            $this->assertStringNotContainsString('smtp_user', $html, "smtp_user key leaked on {$uri}");
            $this->assertStringNotContainsString('smtp_pass', $html, "smtp_pass key leaked on {$uri}");
            $this->assertStringNotContainsString('from_email', $html, "from_email key leaked on {$uri}");

            if (!empty($gs->getRawOriginal('smtp_pass'))) {
                $this->assertStringNotContainsString($gs->getRawOriginal('smtp_pass'), $html, "smtp password value leaked on {$uri}");
            }
            if (!empty($gs->getRawOriginal('smtp_user'))) {
                $this->assertStringNotContainsString($gs->getRawOriginal('smtp_user'), $html, "smtp username value leaked on {$uri}");
            }
        }
    }

    public function test_frontend_safe_settings_object_still_provides_public_fields(): void
    {
        $html = $this->get('/ar')->assertStatus(200)->getContent();

        // The trimmed `var gs` object keeps the public display fields the frontend relies on.
        $this->assertStringContainsString('"phones"', $html);
        $this->assertStringContainsString('"logo_ar"', $html);
        $this->assertStringContainsString('"addresses_ar"', $html);
    }

    /* -------------------- Authorization -------------------- */

    public function test_guest_cannot_access_content_admin_pages(): void
    {
        $this->get('/admin/site_stats')->assertRedirect(route('admin.login'));
        $this->get('/admin/features')->assertRedirect(route('admin.login'));
        $this->get('/admin/service_sections')->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_open_new_content_admin_pages(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin, 'admin')->get('/admin/site_stats')->assertStatus(200);
        $this->actingAs($admin, 'admin')->get('/admin/features')->assertStatus(200);
        $this->actingAs($admin, 'admin')->get('/admin/service_sections')->assertStatus(200);
        $this->actingAs($admin, 'admin')->get('/admin/page-settings/home_page')->assertStatus(200);
        $this->actingAs($admin, 'admin')->get('/admin/page-settings/about_page')->assertStatus(200);
        $this->actingAs($admin, 'admin')->get('/admin/general-settings/site_extras')->assertStatus(200);
    }

    /* -------------------- New admin CRUD works -------------------- */

    public function test_admin_can_create_update_and_delete_a_site_stat(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin, 'admin')->post('/admin/site_stats/create', [
            'section'    => 'home_hero',
            'icon'       => 'fas fa-star',
            'value'      => '55+',
            'title_ar'   => 'اختبار إحصائية',
            'title_en'   => 'Test stat',
            'sort_order' => 9,
            'is_active'  => 1,
        ])->assertStatus(200);

        $stat = SiteStat::where('title_ar', 'اختبار إحصائية')->first();
        $this->assertNotNull($stat);

        $this->actingAs($admin, 'admin')->post('/admin/site_stats/update/' . $stat->id, [
            'section'    => 'home_hero',
            'value'      => '66+',
            'title_ar'   => 'اختبار إحصائية',
            'sort_order' => 9,
            'is_active'  => 0,
        ])->assertStatus(200);

        $this->assertEquals('66+', $stat->fresh()->value);
        $this->assertEquals(0, $stat->fresh()->is_active);

        $this->actingAs($admin, 'admin')->get('/admin/site_stats/delete/' . $stat->id)->assertStatus(200);
        $this->assertNull(SiteStat::find($stat->id));
    }

    public function test_admin_can_create_a_feature_card(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin, 'admin')->post('/admin/features/create', [
            'section'    => 'about_checklist',
            'title_ar'   => 'ميزة اختبارية',
            'title_en'   => 'Test feature',
            'sort_order' => 9,
            'is_active'  => 1,
        ])->assertStatus(200);

        $this->assertNotNull(Feature::where('title_ar', 'ميزة اختبارية')->first());

        // And it shows up on the about page immediately
        $this->get('/ar/about-us')->assertSee('ميزة اختبارية');
    }

    public function test_admin_can_add_a_product_section_and_it_renders(): void
    {
        $admin = $this->admin();
        $service = Service::where('slug_ar', 'خزانات-مياه-أفقية')->firstOrFail();

        $this->actingAs($admin, 'admin')->post('/admin/service_sections/create', [
            'service_id' => $service->id,
            'title_ar'   => 'قسم تفاصيل اختباري',
            'details_ar' => 'نص تفاصيل القسم',
            'sort_order' => 1,
            'is_active'  => 1,
        ])->assertStatus(200);

        $this->get('/ar/service/' . rawurlencode('خزانات-مياه-أفقية'))
            ->assertSee('قسم تفاصيل اختباري');
    }

    public function test_extended_admin_modules_still_work(): void
    {
        $admin = $this->admin();

        foreach (['slider', 'partners', 'certificates', 'categories', 'services'] as $module) {
            $this->actingAs($admin, 'admin')->get('/admin/' . $module)->assertStatus(200);
            $this->actingAs($admin, 'admin')->get('/admin/' . $module . '/datatables')->assertStatus(200);
            $this->actingAs($admin, 'admin')->get('/admin/' . $module . '/create')->assertStatus(200);
        }

        $category = Category::where('slug_ar', 'خزانات-المياه')->firstOrFail();
        $this->actingAs($admin, 'admin')->get('/admin/categories/edit/' . $category->id)->assertStatus(200);

        $service = Service::where('slug_ar', 'خزانات-مياه-أفقية')->firstOrFail();
        $this->actingAs($admin, 'admin')->get('/admin/services/edit/' . $service->id)->assertStatus(200);
    }

    public function test_admin_can_reorder_categories(): void
    {
        $admin = $this->admin();
        $category = Category::where('slug_ar', 'خزانات-المياه')->firstOrFail();

        // Post the full slug set like the real admin form does — the controller
        // unconditionally rewrites all slug columns from the request.
        $this->actingAs($admin, 'admin')->post('/admin/categories/update/' . $category->id, [
            'title_ar'   => $category->title_ar,
            'title_en'   => $category->title_en,
            'slug_ar'    => $category->slug_ar,
            'slug_en'    => $category->slug_en,
            'slug_fr'    => $category->slug_fr,
            'sort_order' => 99,
            'is_active'  => 1,
        ])->assertStatus(200);

        $this->assertEquals(99, $category->fresh()->sort_order);
        // Last in the ordered listing now
        $ordered = Category::where('is_active', 1)->orderBy('sort_order')->orderBy('id')->pluck('slug_ar');
        $this->assertEquals('خزانات-المياه', $ordered->last());
    }
}
