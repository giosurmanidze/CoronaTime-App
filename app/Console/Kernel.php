<?php

namespace App\Console;

use App\Console\Commands\FetchCountryStatistics;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command(FetchCountryStatistics::class)->daily();
    }

    /**
     * Register the commands for the application.
     */

    protected $commands = [
        \App\Console\Commands\FetchCountryStatistics::class,
    ];

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');


        require base_path('routes/console.php');
    }
}
