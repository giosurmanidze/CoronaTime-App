<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{

    use RefreshDatabase;

    public function test_login_page_is_accessible()
    {
        $response = $this->get(route("login"));
        $response->assertSuccessful();

        $response->assertViewIs("sessions.login");
    }

    public function test_login_post_request() {
        $userData = [
            'name' => 'giorgi',
            'email' => 'giorgi@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertStatus(302);

        $this->assertDatabaseHas('users', [
            'name' => 'giorgi',
            'email' => 'giorgi@example.com',
        ]);
    }

}
