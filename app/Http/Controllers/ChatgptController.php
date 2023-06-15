<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatgptController extends Controller
{
    public function store(Request $request, $prompt)
    {
        

        $client = new \GuzzleHttp\Client();
        try {

            $response = $client->request('POST', 'https://openai80.p.rapidapi.com/chat/completions', [
                'json' => [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => "give summary about ( $prompt ), without mentioning you're a language model, write professonally like in the new york times.",
                        ],
                    ],
                ],
                'headers' => [
                    'X-RapidAPI-Host' => 'openai80.p.rapidapi.com',
                    'X-RapidAPI-Key' => 'c36c56039fmshd620998fee18507p1e34f8jsnf419c71462f0',
                    'content-type' => 'application/json',
                ],
            ]);
            
            return $response->getBody();

        } catch (\Exception $e) {

            return "error";

        }

    }
}