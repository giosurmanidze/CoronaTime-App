<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function getCountryStatistics()
    {
        $client = new Client();
    
        $response2 = $client->get('https://devtest.ge/countries', [
            'headers' => [
                'accept' => 'application/json',
            ],
        ]);
    
        $data2 = json_decode($response2->getBody(), true);
    
        $totalDeaths = 0;
        $totalRecoveries = 0;
        $totalConfirmed = 0;
    
        foreach ($data2 as $countryData2) {
            $code = $countryData2['code'];
            $name = json_encode($countryData2['name']); 
    
            $response1 = $client->post('https://devtest.ge/get-country-statistics', [
                'headers' => [
                    'accept' => 'application/json',
                ],
                'form_params' => [
                    'code' => $code,
                ],
            ]);
    
            $data1 = json_decode($response1->getBody(), true);
    
            $totalDeaths += $data1['deaths'];
            $totalRecoveries += $data1['recovered'];
            $totalConfirmed += $data1['confirmed'];
    
            Statistics::updateOrCreate(['code' => $code], [
                'name' => $name, 
                'code' => $code,
                'confirmed' => $data1['confirmed'],
                'recovered' => $data1['recovered'],
                'deaths' => $data1['deaths'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        Statistics::updateOrCreate( [
            'name' => json_encode([
                'ka' => 'მსოფლიოს მასშტაბით',
                'en' => 'Worldwide',
            ]), 
            'code'=>'Ww',
            'deaths' => $totalDeaths,
            'recovered' => $totalRecoveries,
            'confirmed' => $totalConfirmed,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
