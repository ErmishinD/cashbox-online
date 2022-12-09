<?php

namespace App\Http\Resources\Api\ExternalSale;

use App\Http\Resources\Api\SellProduct\IndexResource as SellProductResource;
use App\Http\Resources\Api\Shop\DefaultResource as ShopResource;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'shop' => ShopResource::make($this->shop),
            'amount' => $this->amount,
            'sell_product' => SellProductResource::make($this->sell_product),
            'payment_type' => $this->payment_type,
            'description' => $this->description,
            'confirmed_at' => optional($this->confirmed_at)->format('Y-m-d H:i'),
        ];
    }
}