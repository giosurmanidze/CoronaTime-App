<?php

namespace Tests\Feature;

use App\Models\Statistics;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScopeFilterTest extends TestCase
{
    use RefreshDatabase;

    public function test_sort_ascending_by_cases()
    {
        Statistics::factory()->create([
            'name' => '{"en": "Test Country 1"}',
            'confirmed' => 20
        ]);
        $result = Statistics::query()
        ->filterAndSort(null, null, 'cases', 'ascending', null)
        ->get();

    $this->assertEquals([20], $result->pluck('confirmed')->toArray());
    }
    
    
    public function test_sort_descending_by_cases()
    {
        Statistics::factory()->create([
            'name' => '{"en": "Test Country 1"}',
            'confirmed' => 20
        ]);
        Statistics::factory()->create([
            'name' => '{"en": "Test Country 2"}',
            'confirmed' => 10
        ]);
        $result = Statistics::query()
            ->filterAndSort(null, null, 'cases', 'descending', null)
            ->get();
    
        $this->assertEquals([20, 10], $result->pluck('confirmed')->toArray());
    }


    public function test_sort_ascending_by_deaths()
    {
        Statistics::factory()->create([
            'name' => '{"en": "Test Country 1"}',
            'deaths' => 20
        ]);
        $result = Statistics::query()
        ->filterAndSort(null, null, 'deaths', 'ascending', null)
        ->get();

    $this->assertEquals([20], $result->pluck('deaths')->toArray());
    }

    public function test_sort_descending_by_deaths()
    {
        Statistics::factory()->create([
            'name' => '{"en": "Test Country 1"}',
            'deaths' => 20
        ]);
        $result = Statistics::query()
            ->filterAndSort(null, null, 'deaths', 'descending', null)
            ->get();
    
        $this->assertEquals([20], $result->pluck('deaths')->toArray());
    }


    public function test_search_country_by_name()
    {
        $search = 'Sudan';
        Statistics::factory()->create([
            'name' => '{"en": "Sudan Test"}'
        ]);
        $result = Statistics::query()
            ->filterAndSort($search, null, null, null, null)
            ->get();
    
        $this->assertTrue($result->count() > 0);
        $this->assertTrue(
            $result->pluck('name')->contains(
                fn ($name) => str_contains(strtolower($name), strtolower($search))
            )
        );
    }

    public function test_search_country_by_name_in_ka_language()
    {
        $search = 'საქართველო';
        app()->setLocale('ka');
        Statistics::factory()->create([
            'name' => '{"en": "Georgia", "ka": "საქართველო"}'
        ]);
        $result = Statistics::query()
            ->filterAndSort($search, null, null, null, 'ka')
            ->get();
    
        $this->assertTrue($result->count() > 0);
        $this->assertTrue(
            $result->pluck('name')->contains(
                fn ($name) => str_contains(strtolower($name), strtolower($search))
            )
        );
    }

}
