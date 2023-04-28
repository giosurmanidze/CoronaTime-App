<?php

namespace Tests\Feature;

use App\Models\User;
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

    public function test_user_can_confirm_email()
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
    
        $response = $this->get(route('confirm-account', $user->id));
    
        $this->assertNotNull($user->fresh()->email_verified_at);
        $response->assertViewIs('email.activated-account');
    }
    
    
    
    
}
