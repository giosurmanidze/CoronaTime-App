<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatisticsByCountryTest extends TestCase
{
   use RefreshDatabase;

    public function test_statistics_by_country_is_accesible()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $response = $this->actingAs($user)->get(route('search-country'));

        $response->assertSuccessful();
        $response->assertViewIs("components.country-statistics");
    }
}
