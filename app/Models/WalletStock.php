<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class WalletStock extends Model
{
    protected $fillable=[
        'wallet_id',
        'stock_id'
    ];
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
    public function operations()
    {
        return $this->hasMany(Operations::class);
    }
    public function buy(int $amount,int $price):Operations
    {
          return $this->operations()->create([
               'type'=>Operations::Buy,
              'quantity'=>$amount,
              'price'=>$price,
              'user_id'=>$this->wallet->user_id,
              redirect('/stocks.show')
          ]);

    }
    public function stockName()
    {
        return $this->stock->ticker;
    }
    public function averagePricePerShare():float
    {
        $numberOfStocks = $this->quantity();
        if($numberOfStocks===0){
            return 0;
        }
        $totalBought = $this->totalBought();
        return number_format( $totalBought / $numberOfStocks,2);
    }
    public function quantity():int
    {
        return $this->operations()->buy()->sum('quantity') - $this->operations()->sell()->sum('quantity');
    }
    public function totalBought():int
    {
      return  $this->operations()
            ->buy()
            ->get()
            ->reduce(function ($carry ,$operation){
                return $carry + ($operation->price * $operation->quantity);
            },0);
    }
    public function profitPerShare()
    {
        if ($this->quantity()==0)
        {
            return 0;
        }
        return ($this->stock->current_price - $this->averagePricePerShare());
    }


    public function profit()
    {
          return $this->profitPerShare() * $this->quantity();


    }

}
