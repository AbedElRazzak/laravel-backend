<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BloombergCurrencyPriceController extends Controller
{
    public function getData()
    {

        // Create a new Guzzle HTTP client instance
        $client = new \GuzzleHttp\Client();

        try {
            // Make a GET request to Bloomberg API
            $response = $client->request('GET', 'https://bb-finance.p.rapidapi.com/market/get-cross-currencies?id=aed%2Caud%2Cbrl%2Ccad%2Cchf%2Ccnh%2Ccny%2Ccop%2Cczk%2Cdkk%2Ceur%2Cgbp%2Chkd%2Chuf%2Cidr%2Cils%2Cinr%2Cjpy%2Ckrw%2Cmyr%2Cnok%2Cnzd%2Cphp%2Cpln%2Crub%2Csek%2Csgd%2Cthb%2Ctry%2Ctwd%2Cusd%2Czar', [
                'headers' => [
                    'X-RapidAPI-Host' => 'bb-finance.p.rapidapi.com',
                    'X-RapidAPI-Key' => 'c36c56039fmshd620998fee18507p1e34f8jsnf419c71462f0',
                ],
            ]);

            // Parse and process the response
            $data = json_decode($response->getBody(), true);

            $arr = [];
        
            foreach ($data['result'] as $curr) {
                $arr[] = [
                    'symbol' => isset($curr['symbol']) ? $curr['symbol'] : 'null',
                    'netChange' => isset($curr['netChange']) ? $curr['netChange'] : 'null',
                ];
            }

            // Return the response
            return response()->json($arr);
        } catch (\Exception $e) {
            // Handle any errors
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
