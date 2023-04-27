<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class user_register_post_data_route extends TestCase
{
    use RefreshDatabase;
    public function user_register_post_request_route()
    {
        $userData = [
            'name' => 'giorgi',
            'email' => 'example@gmail.com',
            'password' => 'password123',
        ];

        $response = $this->post(route('register', [$userData]));

        $response->assertStatus(302);

        $this->assertDatabaseHas('users', [
            'name' => 'giorgi',
            'email' => 'example@gmail.com',
        ]);

        $response->assertRedirect('/'); 

        
    }
}
