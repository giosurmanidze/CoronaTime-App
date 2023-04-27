<?php

namespace Tests\Feature;

use App\Mail\CustomResetEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
        use RefreshDatabase;
        use DatabaseMigrations;
    
        public function test_email_form_for_forgot_password_is_accessible()
        {
            $response = $this->get(route('forgot-password'));
            $response->assertSuccessful();
            $response->assertViewIs('components.reset-password');
        }
    
        public function test_reset_link_status_message_in_page()
        {
            $response = $this->get(route('reset-status'));
            $response->assertSuccessful();
            $response->assertViewIs('email.reset-link-status');
        }
    
        public function test_send_reset_link_email_with_invalid_email()
        {
            Mail::fake();
            $response = $this->post(route('password.email'), ['email' => 'invalid-email']);
            $response->assertSessionHasErrors('email');
            Mail::assertNotSent(CustomResetEmail::class);
        }
    
        public function test_send_reset_link_email_with_non_existing_email()
        {
            Mail::fake();
            $response = $this->post(route('password.email'), ['email' => 'non-existing-email@example.com']);
            $response->assertSessionHasErrors('email');
            Mail::assertNotSent(CustomResetEmail::class);
        }
        
        public function test_token_is_created_successfully()
        {
            $user = User::factory()->create();
            $this->post(route('password.email'), ['email' => $user->email]);
            $token = app('auth.password.broker')->getRepository()->exists(
                $user,
                app('auth.password.broker')->getRepository()->create($user)
            );
        
            $this->assertTrue($token);
        }
        
        public function test_email_is_sent_when_user_requests_password_reset()
        {
            Mail::fake();
        
            $user = User::factory()->create();
            $this->post(route('password.email'), ['email' => $user->email]);
        
            Mail::assertSent(CustomResetEmail::class);
        }        
}
