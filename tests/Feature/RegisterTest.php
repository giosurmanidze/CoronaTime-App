<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_page_is_accessible(){
       
        $response = $this->get(route('register'));
        $response->assertSuccessful();

        $response->assertViewIs("sessions.sign-up");
    }


    public function test_register_post_request() {
        $userData = [
            'name' => 'giorgi',
            'email' => 'giorgi@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];
    
        $response = $this->post(route("register"), $userData);
        $response->assertStatus(302);

    
        $this->assertDatabaseHas('users', [
            'name' => 'giorgi',
            'email' => 'giorgi@example.com',
        ]);
    }
}
