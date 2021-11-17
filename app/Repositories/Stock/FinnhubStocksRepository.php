<?php

namespace App\Repositories\Stock;

use App\Models\Company;
use App\Models\Quote;
use Finnhub\Api\DefaultApi;
use Illuminate\Support\Facades\Cache;


class FinnhubStocksRepository implements StocksRepository
{
    private DefaultApi $apiClient;

    public function __construct(DefaultApi $apiClient)
    {
        $this->apiClient = $apiClient;
    }


    public function getCompanyBySymbol(string $symbol):Company
    {
        $symbol = strtoupper($symbol);
        $cacheKey = 'companies.view.' . $symbol;


        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }
        $responseData =$this->apiClient->companyProfile2($symbol);
        $company = new Company(
            $responseData['name'],
            $symbol,
            $responseData['logo']

        );


        Cache::put($cacheKey, $company, now()->addMinute());

        return $company;
    }

    public function getQuote(Company $company): Quote
    {
       $responseData=$this->apiClient->quote($company->getSymbol());

       return new Quote(
           $responseData['o'],
           $responseData['pc'],
           $responseData['c']
       );
    }
}
