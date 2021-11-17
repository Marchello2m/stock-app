<?php

namespace App\Http\Controllers;

use App\Repositories\Stock\StocksRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class StocksController extends Controller
{

    private StocksRepository $stocksRepository;

    public function __construct(StocksRepository $stocksRepository)
    {
        $this->stocksRepository = $stocksRepository;
    }


    public function search(Request $request)
    {
        $companyName = strtolower($request->get('query'));
        $cacheKey = 'companies.search' . Str::snake($companyName);

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $companies = Http::get('https://finnhub.io/api/v1/search?q=' . $companyName . '&token=' . env('FINNHUB_API_KEY'));

        Cache::put($cacheKey, $companies->json('result'), now()->addMinute());

        return $companies->json('result');
    }


    public function view(string $symbol)
    {
        $company = $this->stocksRepository->getCompanyBySymbol($symbol);
      //  $quotes = $this->stocksRepository->getQuote($company);
        $quotes=null;

        return view('stocks.show', ['company' => $company, 'quotes' => $quotes]);

    }
}
