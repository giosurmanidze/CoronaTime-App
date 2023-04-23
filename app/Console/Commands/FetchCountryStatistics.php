<?php

namespace App\Console\Commands;

use App\Models\Statistics;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

class FetchCountryStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches country statistics from an API and updates the database.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new Client();
    
        $response2 = $client->get('https://devtest.ge/countries', [
            'headers' => [
                'accept' => 'application/json',
            ],
        ]);
    
        $data2 = json_decode($response2->getBody(), true);
    
    
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
    

            $totalDeaths = Statistics::sum('deaths');
            $totalRecoveries = Statistics::sum('recovered');
            $totalConfirmed = Statistics::sum('confirmed');
    
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
