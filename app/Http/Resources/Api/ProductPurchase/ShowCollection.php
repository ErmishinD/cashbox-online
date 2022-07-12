<?php

namespace App\Http\Resources\Api\ProductPurchase;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ShowCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $first_purchase = $this->collection->first();
        $result = [
            'storage' => [
                'id' => $first_purchase->storage->id,
                'name' => $first_purchase->storage->name,
            ],
            'all_amount' => round($this->collection->sum('cost'), 2),
            'created_at' => $first_purchase->created_at->format('Y-m-d H:i'),
            'user' => [
                'id' => $first_purchase->user->id,
                'name' => $first_purchase->user->name,
            ],
            'counterparty' => [
                'id' => $first_purchase->counterparty->id,
                'name' => $first_purchase->counterparty->name,
            ],
        ];
        foreach ($this->collection as $purchase) {
            $result['product_types'][] = [
                'product_purchase_id' => $purchase->id,
                'id' => $purchase->product_type->id,
                'name' => $purchase->product_type->name,
                'amount' => $purchase->cost,
                'expiration_date' => $purchase->expiration_date ? $purchase->expiration_date->format('Y-m-d') : null,
                'quantity' => $purchase->quantity,
                'current_quantity' => $purchase->current_quantity,
                'main_measure_type' => [
                    'id' => $purchase->product_type->main_measure_type->id,
                    'name' => $purchase->product_type->main_measure_type->name,
                    'quantity' => $purchase->product_type->main_measure_type->quantity
                ]
            ];
        }
        return $result;
    }
}
