<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WalletStockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->resource->stockName(),
            'average_price'=> $this->resource->averagePrice(),
            'quantity'=> $this->resource->quantity(),
            'profit_per_share'=> $this->resource->profitPerShare(),

        ];

    }
}
