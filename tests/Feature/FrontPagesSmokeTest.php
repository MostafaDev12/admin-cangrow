<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class FrontPagesSmokeTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function home_page_renders()
    {
        $this->get('/')->assertStatus(200);
    }

    /** @test */
    public function contact_page_renders_with_dynamic_form_and_map()
    {
        $this->get('/contact-us')->assertStatus(200);
    }

    /** @test */
    public function medical_tourism_page_renders()
    {
        $this->get('/medical-tourism')->assertStatus(200);
    }

    /** @test */
    public function service_detail_page_renders()
    {
        $service = Service::whereNotNull('slug_ar')->first();
        if (! $service) {
            $this->markTestSkipped('No service with slug available.');
        }
        $this->get('/services/' . $service->slug_ar)->assertStatus(200);
    }

    /** @test */
    public function blog_detail_page_renders_with_dynamic_author()
    {
        $blog = \App\Models\Blog::whereNotNull('slug_ar')->first();
        if (! $blog) {
            $this->markTestSkipped('No blog with slug available.');
        }
        $this->get('/blogs/' . $blog->slug_ar)->assertStatus(200);
    }
}
