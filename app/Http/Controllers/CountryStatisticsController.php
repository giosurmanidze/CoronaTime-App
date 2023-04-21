<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Illuminate\Http\Request;

class CountryStatisticsController extends Controller
{
    public function getAllStatistics()
    {
        $data = Statistics::all();

        return view('components.country-statistics', ['data' => $data]);
    }
    
    public function searchCountry(Request $request, $language)
    {
        $query = $request->input('query');
        $data = Statistics::all();
        $results = [];

        foreach ($data as $d) {
            $countryName = json_decode($d->name, true)[$language];
            if (stripos($countryName, $query) === 0) {
                $results[] = $d;
            }
        }

        return view('components.country-statistics', ['data' => $results, 'query' => $query]);
    }
}
