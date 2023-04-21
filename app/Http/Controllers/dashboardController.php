<?php

namespace App\Http\Controllers;

use App\Models\Statistics;

class dashboardController extends Controller
{
    public function getWorldwideStatistics()
    {
        $worldwideStatistics = Statistics::where('code', 'Ww')->first();
        return view('components.landing-worldwide', ['worldwideStatistics' => $worldwideStatistics]);
    }
}
