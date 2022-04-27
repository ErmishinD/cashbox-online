<?php

namespace App\Http\Resources\Api\ProductType;

use App\Http\Resources\Api\MeasureType\ByProductTypeResource;
use App\Models\ProductType;
use Illuminate\Http\Resources\Json\JsonResource;

class DashboardResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var ProductType $this */
        $result = [
            'id' => $this->id,
            'name' => $this->name,
            'main_to_base_equivalent' => $this->main_measure_type->quantity,
            'current_quantity' => $this->product_purchases_sum_current_quantity,
            'current_quantity_in_main_measure_type' => $this->product_purchases_sum_current_quantity / $this->main_measure_type->quantity,
        ];

        if ($request->get('with_expired')) {
            $result += [
                'expired_current_quantity' => $this->product_purchases_expired_sum_current_quantity ?? null,
                'expired_current_quantity_in_main_measure_type' => $this->product_purchases_expired_sum_current_quantity / $this->main_measure_type->quantity,
            ];
        }

        return $result;
    }
}
