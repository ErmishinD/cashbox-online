<?php

namespace App\Http\Resources\Api\Cashbox;

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
        $first_payment = $this->collection->first();

        $result = [
            'shop' => [
                'id' => $first_payment->shop_id,
                'name' => $first_payment->shop->name
            ],
            'all_amount' => round($this->collection->sum('amount'), 2),
            'transaction_type' => $first_payment->transaction_type,
            'payment_type' => $first_payment->payment_type,
            'operator' => [
                'id' => $first_payment->operator->id,
                'name' => $first_payment->operator->name
            ],
            'created_at' => $first_payment->created_at->format('Y-m-d H:i'),
            'collected_at' => optional($first_payment->collected_at)->format('Y-m-d H:i:s'),
            'collector' => $first_payment->collector_id
                ? ['id' => $first_payment->collector_id, 'name' => $first_payment->collector->name]
                : null,
        ];
        foreach ($this->collection as $payment) {
            $result['sell_products'][] = [
                'id' => $payment->sell_product_id,
                'name' => $payment->sell_product->name,
                'amount' => $payment->amount,
            ];
        }
        return $result;
    }
}
