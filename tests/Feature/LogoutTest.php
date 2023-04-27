<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_logout_post_request()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route("logout"));

        $response->assertRedirect(route("login"));
        $this->assertFalse(auth()->check());
    }
}
