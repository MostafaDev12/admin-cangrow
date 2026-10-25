<?php

namespace Tests\Feature;

use Tests\Support\ProjectDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        ProjectDatabase::create();
        $response = $this->withSession(['ip_address' => '127.0.0.1'])->get('https://example.test/');

        $response->assertStatus(200);
    }
}
