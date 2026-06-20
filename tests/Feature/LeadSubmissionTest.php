<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LeadSubmissionTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_stores_a_contact_lead_from_the_unified_endpoint()
    {
        $payload = [
            'form_key' => 'contact_page',
            'name'     => 'Test Visitor',
            'email'    => 'visitor@example.com',
            'phone'    => '01000000000',
            'message'  => 'Hello from the test suite',
        ];

        $response = $this->post('/lead-submit', $payload);
        $response->assertStatus(302); // redirects back with flash

        $this->assertDatabaseHas('leads', [
            'form_key' => 'contact_page',
            'name'     => 'Test Visitor',
            'email'    => 'visitor@example.com',
            'status'   => 'new',
        ]);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        $response = $this->post('/lead-submit', [
            'form_key' => 'contact_page',
            // missing required name / email / message
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'message']);
    }

    /** @test */
    public function it_returns_json_for_ajax_submissions_and_captures_payload()
    {
        $response = $this->postJson('/lead-submit', [
            'form_key'   => 'medical_tourism',
            'name'       => 'Ajax User',
            'phone'      => '01122223333',
            'country'    => 'Egypt',
            'treatment'  => 'Implants',
            'custom_ref' => 'ABC123', // unknown field -> payload
        ]);

        $response->assertStatus(200);

        $lead = Lead::where('form_key', 'medical_tourism')->where('name', 'Ajax User')->first();
        $this->assertNotNull($lead);
        $this->assertSame('Egypt', $lead->country);
        $this->assertSame('Implants', $lead->treatment);
        $this->assertEquals('ABC123', $lead->payload['custom_ref'] ?? null);
    }
}
