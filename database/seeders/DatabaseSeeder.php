<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Statistics;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Statistics::factory()->count(50)->create();

        $faker = Faker::create();
        Statistics::factory()->create([
            'name' => json_encode([
                'en' => 'Worldwide',
                'ka' => 'მსოფლიოს მასშტაბით',
            ]),
            'code' => 'WW',
            'confirmed' => Statistics::sum('confirmed'),
            'recovered' => Statistics::sum('recovered'),
            'deaths' => Statistics::sum('deaths'), 
            'created_at' => $faker->dateTimeThisMonth(),
            'updated_at' => $faker->dateTimeThisMonth(),
        ]);

    }
}
