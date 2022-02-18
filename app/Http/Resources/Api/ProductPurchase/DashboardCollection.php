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

        foreach ($this->empty_product_types as $empty_product_type) {
            $result->put(strval($empty_product_type->id), collect([
                'id' => $empty_product_type->id,
                'name' => $empty_product_type->name,
                'current_quantity_in_main_measure_type' => 0,
                'current_quantity' => 0,
                'main_to_base_equivalent' => $empty_product_type->main_measure_type->quantity
            ]));
        }
        return $result->toArray();
    }
}
