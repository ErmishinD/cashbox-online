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
            foreach ($product_purchases as $product_purchase) {
                $current_quantity_in_base_measure_type = $product_purchase->current_quantity * $product_purchase->measure_type->quantity;
                $current_quantity_in_main_measure_type = round($current_quantity_in_base_measure_type / $product_purchase->product_type->main_measure_type->quantity, 2);

                $product_purchase->current_quantity_in_main_measure_type = $current_quantity_in_main_measure_type;
            }
            $result[strval($product_id)]['current_quantity_in_main_measure_type'] = $product_purchases->sum('current_quantity_in_main_measure_type');
            $result[strval($product_id)]['current_quantity'] = $product_purchases->sum('current_quantity');
            $result[strval($product_id)]['main_to_base_equivalent'] = $product_purchases->first()->measure_type->quantity;
        }
        return $result->toArray();
    }
}
