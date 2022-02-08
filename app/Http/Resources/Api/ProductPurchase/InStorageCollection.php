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
                'current_quantity' => $product_purchases->sum('current_quantity'), 'data' => collect()
            ]));
            foreach ($product_purchases as $product_purchase) {
                $result[strval($product_id)]['data']->push(
                    [
                        'id' => $product_purchase->id,
                        'product_type_id' => $product_purchase->product_type_id,
                        'measure_type_id' => $product_purchase->measure_type_id,
                        'quantity' => $product_purchase->quantity,
                        'current_quantity' => $product_purchase->current_quantity,
                        'cost' => $product_purchase->cost,
                        'expiration_date' => $product_purchase->expiration_date,
                        'product_type' => new ProductTypeResource($product_purchase->product_type),
                        'measure_type' => new MeasureTypeResource($product_purchase->measure_type)
                    ]
                );
            }
        }
        return $result->toArray();
    }
}
