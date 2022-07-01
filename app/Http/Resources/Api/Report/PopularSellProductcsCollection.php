<?php

namespace App\Http\Resources\Api\Report;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PopularSellProductcsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'sell_products_list' => $this->collection->pluck('name')->toArray(),
            'count_list' => $this->collection->pluck('cashbox_count')->toArray()
        ];
    }
}
