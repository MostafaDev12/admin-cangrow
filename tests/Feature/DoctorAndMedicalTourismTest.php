<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\Doctor;
use App\Models\MedicalTourismBlock;
use App\Models\MedicalTourismSetting;
use App\Models\Service;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DoctorAndMedicalTourismTest extends TestCase
{
    use DatabaseTransactions;

    protected function admin(): Admin
    {
        return Admin::first();
    }

    /** @test */
    public function admin_can_create_a_doctor()
    {
        $res = $this->actingAs($this->admin(), 'admin')->post(route('admin-doctors-store'), [
            'name_ar'  => 'دكتور تجريبي',
            'title_ar' => 'استشاري',
            'active'   => 1,
        ]);
        $res->assertStatus(200);
        $this->assertDatabaseHas('doctors', ['name_ar' => 'دكتور تجريبي', 'active' => 1]);
    }

    /** @test */
    public function blog_requires_an_author_doctor()
    {
        $res = $this->actingAs($this->admin(), 'admin')->postJson(route('admin-blogs-store'), [
            'title_ar' => 'مقال بدون كاتب',
        ]);
        $res->assertJsonStructure(['errors']);
    }

    /** @test */
    public function blog_can_be_assigned_a_doctor_and_exposes_the_relationship()
    {
        $doctor = Doctor::create(['name_ar' => 'كاتب المقال', 'title_ar' => 'استشاري', 'active' => 1]);

        $res = $this->actingAs($this->admin(), 'admin')->post(route('admin-blogs-store'), [
            'title_ar'  => 'مقال باختبار الكاتب',
            'slug_ar'   => 'test-author-article',
            'doctor_id' => $doctor->id,
        ]);
        $res->assertStatus(200);

        $blog = Blog::where('doctor_id', $doctor->id)->where('title_ar', 'مقال باختبار الكاتب')->first();
        $this->assertNotNull($blog);
        $this->assertSame('كاتب المقال', $blog->doctor->name_ar);
    }

    /** @test */
    public function admin_can_create_a_medical_tourism_faq_block()
    {
        $res = $this->actingAs($this->admin(), 'admin')->post(route('admin-mt-blocks-store', 'faq'), [
            'title_ar'      => 'سؤال جديد؟',
            'description_ar'=> 'إجابة السؤال.',
            'active'        => 1,
            'display_order' => 1,
        ]);
        $res->assertStatus(200);
        $this->assertDatabaseHas('medical_tourism_blocks', ['type' => 'faq', 'title_ar' => 'سؤال جديد؟']);
    }

    /** @test */
    public function medical_tourism_block_rejects_invalid_type()
    {
        $this->actingAs($this->admin(), 'admin')
            ->post(route('admin-mt-blocks-store', 'invalid'), ['title_ar' => 'x'])
            ->assertStatus(404);
    }

    /** @test */
    public function admin_can_update_medical_tourism_settings()
    {
        $res = $this->actingAs($this->admin(), 'admin')->post(route('admin-mt-settings-update'), [
            'hero_heading_ar' => 'عنوان جديد',
            'enabled'         => 1,
        ]);
        $res->assertStatus(200);
        $this->assertSame('عنوان جديد', MedicalTourismSetting::current()->hero_heading_ar);
    }

    /** @test */
    public function admin_can_set_featured_services_for_medical_tourism()
    {
        $service = Service::first();

        $res = $this->actingAs($this->admin(), 'admin')->post(route('admin-mt-featured-update'), [
            'services' => [$service->id],
        ]);
        $res->assertStatus(200);
        $this->assertSame(1, (int) Service::find($service->id)->mt_featured);
    }

    /** @test */
    public function medical_tourism_lead_is_stored_with_country_and_treatment()
    {
        $res = $this->postJson('/lead-submit', [
            'form_key'  => 'medical_tourism',
            'name'      => 'International Patient',
            'phone'     => '00123456789',
            'country'   => 'Saudi Arabia',
            'treatment' => 'Hollywood Smile',
        ]);
        $res->assertStatus(200);
        $this->assertDatabaseHas('leads', [
            'form_key'  => 'medical_tourism',
            'name'      => 'International Patient',
            'country'   => 'Saudi Arabia',
            'treatment' => 'Hollywood Smile',
        ]);
    }

    /** @test */
    public function medical_tourism_page_renders_with_dynamic_content()
    {
        $this->get('/medical-tourism')->assertStatus(200);
    }
}
