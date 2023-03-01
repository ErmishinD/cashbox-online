<?php

namespace App\Http\Resources\Api\ExternalSale;

use App\Http\Resources\Api\Shop\DefaultResource as ShopResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
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
            'id' => $this->id,
            'shop' => ShopResource::make($this->shop),
            'amount' => $this->amount,
            'sell_product' => [
                'id' => $this->sell_product->id,
                'photo' => $this->sell_product->media->where('collection_name', 'photo')->isNotEmpty() ? $this->sell_product->media->where('collection_name', 'photo')->first()->getUrl() : asset('images/default_card_img.png'),
                'name' => $this->sell_product->name,
            ],
            'payment_type' => $this->payment_type,
            'description' => $this->description,
            'created_at' => $this->created_at->format('Y-m-d H:i'),
            'confirmed_at' => optional($this->confirmed_at)->format('Y-m-d H:i'),
            'deleted_at' => optional($this->deleted_at)->format('Y-m-d H:i'),
        ];
    }
}
