<?php

namespace App\Http\Resources\Api\Report;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ConsumptionByCategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $sum_quantity = $this->collection->sum('quantity_sum');
        $categories = $this->collection->pluck('category_name')->toArray();
        $values = [];
        foreach ($this->collection->pluck('quantity_sum') as $sum) {
            $values[] = round($sum / $sum_quantity * 100, 2);
        }
        return [
            'categories_list' => $categories,
            'values_list' => $values,
        ];
    }
}
