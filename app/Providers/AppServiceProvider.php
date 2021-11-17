<?php

namespace App\Providers;

use App\Repositories\Stock\FinnhubStocksRepository;
use App\Repositories\Stock\StocksRepository;
use Finnhub\Api\DefaultApi;
use Finnhub\Configuration;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
$this->app->bind(StocksRepository::class, function (){

    $config = Configuration::getDefaultConfiguration()->setApiKey('token', 'YOUR API KEY');
    $client = new DefaultApi(
        new Client(),
        $config
    );
    return new FinnhubStocksRepository(env('FINNHUB_API_KEY'));
});
    }

    public function boot()
    {
        //
    }
}
