<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Illuminate\View\View;

class CountryStatisticsController extends Controller
{
    public function searchCountry($language): View
    {

        $search = request('search');
        $sort = request('sort');
        $sortByCases = request('sort_by_cases'); 
        $sortByDeaths= request('sort_by_deaths'); 
        $sortByReceovered= request('sort_by_recovered'); 
    
        $data = Statistics::filterAndSort($search, $language, $sort, $sortByCases, $sortByDeaths, $sortByReceovered)->get(); 
    
        return view('components.country-statistics', ['data' => $data]);
    }
    
    
 
}
