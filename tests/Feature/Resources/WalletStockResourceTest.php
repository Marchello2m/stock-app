<?php

namespace Tests\Feature\Resources;

use App\Http\Resources\WalletStockResource;
use App\Models\Stock;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WalletStockResourceTest extends TestCase
{
 use RefreshDatabase;
 public function it_properly_bilds_a_resource()
 {
     $user=factory(User::class)->create();
     $stocks =factory(Stock::class)->create([
         'ticker'=>'AAPL',
         'market'=>'NASDAQ',
         'current_price'=>12,
     ]);
     $wallet = factory(Wallet::class)->create([
         'name'=>'Long Term Wallet',
         'user_id'=>$user,
     ]);
     $walletStock=$wallet->addStocks($stocks);
     $firstBuyOperation =$walletStock->buy(10,6);


  $expectedData=[
      'name'=>'AAPL',
      'average_price'=>12,
      'quantity'=>10,
      'profit'=>60,
      'profit_per_share'=>6
  ];
$resource =WalletStockResource::make($walletStock);
$this->assertEquals($expectedData,$resource->resolve());
 }
}
