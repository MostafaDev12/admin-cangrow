<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * The application redirects every non-secure request to HTTPS and the
     * root URL to the default front language, so the homepage is asserted
     * through its language-prefixed URL.
     *
     * @return void
     */
    public function test_example()
    {
        $_SERVER['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';

        $response = $this->get('https://localhost/ar');

        $response->assertStatus(200);
    }
}
