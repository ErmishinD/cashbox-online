<?php

namespace App\Http\Resources\Api\Storage;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BalanceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $result = [
            'all_balance' => round($this->collection->sum('product_purchases_sum_current_cost'), 2)
        ];

        foreach ($this->collection as $storage) {
            $result['storages'][] = [
                'id' => $storage->id,
                'name' => $storage->name,
                'balance' => $storage->product_purchases_sum_current_cost
            ];
        }
        return $result;
    }
}
