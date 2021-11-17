<?php

namespace App\Repositories\Stock;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class FinnhubStocksRepository implements StocksRepository
{
private string $apiKey;

private const  API_URL = 'https://finnhub.io/api/v1/';

public function __construct(string $apiKey)
{
    $this->apiKey = $apiKey;
}


    public function getCompanyBySymbol(string $symbol)
    {
        $symbol = strtoupper($symbol);
        $cacheKey = 'companies.view.' . $symbol;


        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }
        $company = Http::get(self::API_URL.'stock/profile2?symbol='. $symbol . '&token=' . $this->apiKey);

        Cache::put($cacheKey, $company->json(), now()->addMinute());
var_dump($company);die;
        return $company;
    }
}
