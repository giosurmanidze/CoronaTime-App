<?php

namespace Database\Factories;

use App\Models\Statistics;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class StatisticsFactory extends Factory
{

    public function definition()
    {
        $faker = Faker::create();
        $faker_GE = Faker::create('ka_GE');

        return [
            'name' => json_encode([
                'en' => $faker->country,
                'ka' => $faker_GE->country,
            ]),
            'code' => $faker->unique()->countryCode,
            'confirmed' => $faker->numberBetween(100, 1000),
            'recovered' => $faker->numberBetween(50, 500),
            'deaths' => $faker->numberBetween(0, 100),
            'created_at' => $this->faker->dateTimeThisMonth(),
            'updated_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
