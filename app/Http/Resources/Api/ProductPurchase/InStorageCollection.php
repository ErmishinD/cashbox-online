<?php

namespace App\Http\Resources\Api\ProductPurchase;

use App\Http\Resources\Api\MeasureType\DefaultResource as MeasureTypeResource;
use App\Http\Resources\Api\ProductType\DefaultResource as ProductTypeResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InStorageCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $result = collect();
        foreach ($this->collection as $product_id => $product_purchases) {
            $result->put(strval($product_id), collect([
                'product_type' => new ProductTypeResource($product_purchases->first()->product_type),
                'measure_type' => new MeasureTypeResource($product_purchases->first()->product_type->main_measure_type),
                'data' => collect(),
            ]));
            foreach ($product_purchases as $product_purchase) {
                $current_quantity_in_base_measure_type = $product_purchase->current_quantity * $product_purchase->measure_type->quantity;
                $current_quantity_in_main_measure_type = round($current_quantity_in_base_measure_type / $product_purchase->product_type->main_measure_type->quantity, 2);
                $result[strval($product_id)]['data']->push(
                    collect([
                        'id' => $product_purchase->id,
                        'product_type_id' => $product_purchase->product_type_id,
                        'measure_type_id' => $product_purchase->measure_type_id,
                        'quantity' => $product_purchase->quantity,
                        'current_quantity' => $product_purchase->current_quantity,
                        'cost' => $product_purchase->cost,
                        'expiration_date' => $product_purchase->expiration_date,
                        'current_quantity_in_main_measure_type' => $current_quantity_in_main_measure_type,
                    ])
                );
            }
            $result[strval($product_id)]['current_quantity'] = $result[strval($product_id)]['data']->sum('current_quantity_in_main_measure_type');
        }
        return $result->toArray();
    }
}
