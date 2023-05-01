<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\Response;

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

    public function test_valid_login_credentials()
    {
        $user = User::factory()->create([
            'email' => 'valid@example.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => now(),
        ]);

        $response = $this->post('/login', [
            'username' => 'valid@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route("landing-worldwide"));
        $this->assertAuthenticatedAs($user);
    }


    public function test_invalid_login_credentials()
    {
        $response = $this->post('/login', [
            'username' => 'invalid@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors('username');
    }
    
    public function test_login_with_remember_cookie()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password123'),
            'email_verified_at' => now(),
        ]);
    
        $response = $this->post(route('login'), [
            'username' => $user->email,
            'password' => 'password123',
            'remember' => true,
        ]);
    
        $response->assertStatus(302);
        $response->assertRedirect('/landing-worldwide');
        $response->assertCookie('remember_token', $user->email);
        $response->assertCookie('remember_token_password', 'password123');
    }
    
    public function test_login_with_unverified_email()
    {
        $password = 'password';
        $user = User::factory()->create([
            'password' => bcrypt($password),
            'email_verified_at' => null,
        ]);
    
        $response = $this->post(route('login'), [
            'username' => $user->email,
            'password' => $password,
        ]);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors('username');
        $this->assertGuest();
    }


    public function test_invalid_login_invalid_email_format()
    {
        $response = $this->post('/login', [
            'username' => 'invalid_email',
            'password' => 'password123',
        ]);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors('username');
        $this->assertGuest();
    }

}
