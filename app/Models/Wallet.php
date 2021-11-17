<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable=[
        'name'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function stocks()
    {
        return $this->hasMany(WalletStock::class);
    }
    public function addStock(Stock $stock)
    {
        return $this->stocks()->create([
'stock_id'=>$stock->id
        ]);
    }

}
