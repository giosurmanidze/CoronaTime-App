<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function getWorldwideStatistics(): View
    {
        $worldwideStatistics = Statistics::where('code', 'Ww')->first();
        return view('components.landing-worldwide', ['worldwideStatistics' => $worldwideStatistics]);
    }
}
