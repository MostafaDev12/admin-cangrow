<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\BeforeAfter;
use App\Models\Form;
use App\Models\Lead;
use App\Models\MapSetting;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class WebsiteContentAdminTest extends TestCase
{
    use DatabaseTransactions;

    protected function admin(): Admin
    {
        // id=1 / role_id=0 bypasses the permission checks.
        return Admin::first();
    }

    /** @test */
    public function admin_can_create_a_testimonial()
    {
        $res = $this->actingAs($this->admin(), 'admin')->post(route('admin-testimonials-store'), [
            'name'          => 'QA Reviewer',
            'rating'        => 5,
            'review_ar'     => 'تجربة ممتازة',
            'location'      => 'القاهرة',
            'display_order' => 1,
            'active'        => 1,
        ]);

        $res->assertStatus(200);
        $this->assertDatabaseHas('testimonials', ['name' => 'QA Reviewer', 'rating' => 5, 'active' => 1]);
    }

    /** @test */
    public function testimonial_requires_name_and_rating()
    {
        $res = $this->actingAs($this->admin(), 'admin')->postJson(route('admin-testimonials-store'), [
            'name' => '',
        ]);
        $res->assertJsonStructure(['errors']);
    }

    /** @test */
    public function admin_can_add_a_form_field()
    {
        $form = Form::byKey('contact_page');

        $res = $this->actingAs($this->admin(), 'admin')->post(route('admin-forms-field-store', $form->id), [
            'name'          => 'company',
            'type'          => 'text',
            'label_ar'      => 'الشركة',
            'visible'       => 1,
            'required'      => 0,
            'display_order' => 9,
        ]);

        $res->assertStatus(200);
        $this->assertDatabaseHas('form_fields', ['form_id' => $form->id, 'name' => 'company', 'type' => 'text']);
    }

    /** @test */
    public function form_field_rejects_invalid_key()
    {
        $form = Form::byKey('contact_page');
        $res = $this->actingAs($this->admin(), 'admin')->postJson(route('admin-forms-field-store', $form->id), [
            'name' => 'bad key!',
            'type' => 'text',
        ]);
        $res->assertJsonStructure(['errors']);
    }

    /** @test */
    public function admin_can_update_lead_status_and_notes()
    {
        $lead = Lead::create(['form_key' => 'contact_page', 'name' => 'X', 'status' => 'new']);

        $res = $this->actingAs($this->admin(), 'admin')->post(route('admin-leads-update', $lead->id), [
            'status'      => 'contacted',
            'admin_notes' => 'Called the customer',
        ]);

        $res->assertStatus(200);
        $this->assertDatabaseHas('leads', ['id' => $lead->id, 'status' => 'contacted', 'admin_notes' => 'Called the customer']);
    }

    /** @test */
    public function map_update_validates_google_maps_url()
    {
        $bad = $this->actingAs($this->admin(), 'admin')->postJson(route('admin-maps-update', 'contact_page'), [
            'embed_url' => 'https://maps.example.com/embed',
        ]);
        $bad->assertJsonStructure(['errors']);

        $ok = $this->actingAs($this->admin(), 'admin')->post(route('admin-maps-update', 'contact_page'), [
            'embed_url' => 'https://www.google.com/maps?q=cairo&output=embed',
            'enabled'   => 1,
        ]);
        $ok->assertStatus(200);
        $this->assertSame('https://www.google.com/maps?q=cairo&output=embed', MapSetting::byKey('contact_page')->embed_url);
    }

    /** @test */
    public function service_video_validates_youtube_url()
    {
        $service = Service::first();

        $bad = $this->actingAs($this->admin(), 'admin')->postJson(route('admin-service-video-update', $service->id), [
            'youtube_video_url' => 'https://example.com/not-youtube',
        ]);
        $bad->assertJsonStructure(['errors']);

        $ok = $this->actingAs($this->admin(), 'admin')->post(route('admin-service-video-update', $service->id), [
            'youtube_video_url' => 'https://youtu.be/dQw4w9WgXcQ',
            'video_enabled'     => 1,
        ]);
        $ok->assertStatus(200);
        $this->assertSame('https://youtu.be/dQw4w9WgXcQ', Service::find($service->id)->youtube_video_url);
    }

    /** @test */
    public function admin_can_create_before_after_case_with_images()
    {
        if (! function_exists('imagecreatetruecolor')) {
            $this->markTestSkipped('GD extension not available for fake image generation.');
        }

        $service = Service::first();

        $res = $this->actingAs($this->admin(), 'admin')->post(route('admin-before-after-store'), [
            'service_id'    => $service->id,
            'before_photo'  => UploadedFile::fake()->image('before.jpg', 600, 500),
            'after_photo'   => UploadedFile::fake()->image('after.jpg', 600, 500),
            'title_ar'      => 'حالة اختبار',
            'active'        => 1,
            'display_order' => 0,
        ]);

        $res->assertStatus(200);
        $case = BeforeAfter::where('service_id', $service->id)->where('title_ar', 'حالة اختبار')->first();
        $this->assertNotNull($case);

        // Clean up the physical files written to public/.
        foreach ([$case->rawBefore(), $case->rawAfter()] as $file) {
            $path = public_path('assets/images/services/before-after/' . $file);
            if ($file && is_file($path)) {
                @unlink($path);
            }
        }
    }

    /** @test */
    public function before_after_requires_images_on_create()
    {
        $service = Service::first();
        $res = $this->actingAs($this->admin(), 'admin')->postJson(route('admin-before-after-store'), [
            'service_id' => $service->id,
        ]);
        $res->assertJsonStructure(['errors']);
    }
}
