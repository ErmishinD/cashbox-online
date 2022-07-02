<?php

namespace App\Http\Resources\Api\Report;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductPurchaseRecommendationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'main_measure_type' => [
                'id' => $this->main_measure_type->id,
                'name' => $this->main_measure_type->name,
                'quantity' => $this->main_measure_type->quantity,
            ],
            'cashbox_sum_quantity' => $this->consumption_cashbox_sum_quantity ?? 0,
            'cashbox_sum_cost' => $this->consumption_cashbox_sum_cost ?? 0,
            'write_off_sum_quantity' => $this->consumption_write_off_sum_quantity ?? 0,
            'write_off_sum_cost' => $this->consumption_write_off_sum_cost ?? 0,
        ];
    }
}
