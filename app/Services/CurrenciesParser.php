<?php


namespace App\Services;


use App\Models\Currency;
use Illuminate\Support\Facades\Http;

class CurrenciesParser
{
    public function __invoke()
    {
        $response = Http::get('https://nationalbank.kz/rss/rates_all.xml');
        if($response->successful()){
            $xml = simplexml_load_string($response->body());
            $json = json_encode($xml);
            $array =  json_decode($json, true);
            foreach ($array['channel']['item'] as $currency){
                $found = Currency::all()->firstWhere('code', $currency['title']);
                if($found!=null){
                    $found->update(['value' => ($currency['description'] / $currency['quant'])]);
                }
            }
        }
    }
}
