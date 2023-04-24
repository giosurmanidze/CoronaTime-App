<?php

namespace Database\Seeders;

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
    }
}
