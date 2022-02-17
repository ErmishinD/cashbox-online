<?php

namespace App\Http\Resources\Api\ProductPurchase;

use Illuminate\Http\Resources\Json\JsonResource;

class DashboardCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $result = collect();
        foreach ($this->resource as $product_id => $product_purchases) {
            $result->put(strval($product_id), collect([
                'id' => $product_id,
                'name' => $product_purchases->first()->product_type->name
            ]));
            $main_to_base = $product_purchases->first()->product_type->main_measure_type->quantity;
            $result[strval($product_id)]['current_quantity_in_main_measure_type'] = $product_purchases->sum('current_quantity') / $main_to_base;
            $result[strval($product_id)]['current_quantity'] = $product_purchases->sum('current_quantity');
            $result[strval($product_id)]['main_to_base_equivalent'] = $main_to_base;
        }
        return $result->toArray();
    }
}
