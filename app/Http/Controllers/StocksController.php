<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Resources\WalletStockResource;
use App\Models\Company;
use App\Models\Operations;
use App\Models\Stock;
use App\Models\Wallet;
use App\Repositories\Stock\StocksRepository;
use Finnhub\Api\DefaultApi;
use Finnhub\Configuration;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\View\View;


class StocksController extends Controller
{

    private StocksRepository $stocksRepository;

    public function __construct(StocksRepository $stocksRepository)
    {
        $this->stocksRepository = $stocksRepository;
    }

    public function index(): view
    {

        return view('stocks/stocks');
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




        return view('stocks/companies',['companies' => $companies]);
    }
    public function showCompanies(Request $request)
    {
        $request->validate(['min:1']);
        $config = Configuration::getDefaultConfiguration()->setApiKey('token', 'c6cf01iad3i95gi9b7a0');
        $client = new DefaultApi(
            new Client(),
            $config
        );

        $data = $client->symbolSearch($request->company)->getResult();
        $companies = [];
        foreach($data as $company)
        {
            $companies[] = new Company( $company->getDescription(), $company->getSymbol(), $company->getType() );
        }

        return view('stocks/stocks',['companies' => $companies]);

    }
    public function show(Wallet $wallet, $walletStockId)
    {
        $walletStock= $wallet->stocks()->findOrFail($walletStockId);
        return WalletStockResource::make($walletStock);

    }


    public function view(string $symbol)
    {
        $company = $this->stocksRepository->getCompanyBySymbol($symbol);
        $quote =$this->stocksRepository->getQuote($company);

        return view('stocks.show', [
            'company' => $company,
            'quote' => $quote

        ]);

    }

}
