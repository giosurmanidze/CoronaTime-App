<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_worldwide_is_accesible()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $response = $this->actingAs($user)->get(route("landing-worldwide"));

        $response->assertSuccessful();
        $response->assertViewIs("components.landing-worldwide");
    }
}
