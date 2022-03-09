<?php

namespace App\Http\Resources\Api\Cashbox;

use App\Http\Resources\Api\ProductPurchase\InCashboxResource as ProductPurchaseResource;
use App\Http\Resources\Api\SellProduct\InCashboxResource as SellProductResource;
use App\Http\Resources\Api\Shop\DefaultResource as ShopResource;
use App\Http\Resources\Api\User\DefaultResource as UserResource;
use App\Models\Cashbox;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var Cashbox $this */
        return [
            'id' => $this->id,
            'shop' => new ShopResource($this->shop),
            'amount' => $this->amount,
            'payment_type' => $this->payment_type,
            'transaction_type' => $this->transaction_type,
            'sell_product' => $this->sell_product_id ? new SellProductResource($this->sell_product) : null,
            'product_purchase' => $this->product_purchase_id ? new ProductPurchaseResource($this->product_purchase) : null,
            'data' => $this->data,
            'operator' => new UserResource($this->operator),
            'description' => $this->description,
            'created_at' => $this->created_at->format('Y-m-d H:i')
        ];
    }
}
