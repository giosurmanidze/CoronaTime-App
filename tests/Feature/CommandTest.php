<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Console\Commands\FetchCountryStatistics;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CommandTest extends TestCase
{

    use  RefreshDatabase;

    public function it_updates_statistics_for_each_country()
    {
        Http::fake([
            'https://devtest.ge/countries' => Http::response([
                ['code' => 'US', 'name' => 'United States'],
                ['code' => 'CA', 'name' => 'Canada'],
            ]),
            'https://devtest.ge/get-country-statistics?code=US' => Http::response([
                'confirmed' => 100,
                'recovered' => 50,
                'deaths' => 10,
            ]),
            'https://devtest.ge/get-country-statistics?code=CA' => Http::response([
                'confirmed' => 200,
                'recovered' => 100,
                'deaths' => 20,
            ]),
        ]);

        $this->artisan(FetchCountryStatistics::class);

        $this->assertDatabaseHas('statistics', [
            'code' => 'US',
            'name' => json_encode(['en' => 'United States']),
            'confirmed' => 100,
            'recovered' => 50,
            'deaths' => 10,
        ]);

        $this->assertDatabaseHas('statistics', [
            'code' => 'CA',
            'name' => json_encode(['en' => 'Canada']),
            'confirmed' => 200,
            'recovered' => 100,
            'deaths' => 20,
        ]);
    }

}
