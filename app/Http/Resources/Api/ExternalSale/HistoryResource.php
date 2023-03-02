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
        $sell_products = [];
        if ($this->cashbox_payments->isNotEmpty()) {
            foreach ($this->cashbox_payments as $payment) {
                $sell_products[] = [
                    'id' => $payment->sell_product->id,
                    'name' => $payment->sell_product->name,
                ];
            }
        }
        return [
            'id' => $this->id,
            'shop' => ShopResource::make($this->shop),
            'amount' => $this->amount,
            'sell_product' => $sell_products,
            'payment_type' => $this->payment_type,
            'description' => $this->description,
            'created_at' => $this->created_at->format('Y-m-d H:i'),
            'confirmed_at' => optional($this->confirmed_at)->format('Y-m-d H:i'),
            'deleted_at' => optional($this->deleted_at)->format('Y-m-d H:i'),
        ];
    }
}
