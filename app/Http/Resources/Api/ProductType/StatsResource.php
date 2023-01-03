<?php

namespace App\Http\Resources\Api\ProductType;

use Illuminate\Http\Resources\Json\JsonResource;

class StatsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'product_purchases' => [
                'count' => $this->product_purchases_count ?? 0.0,
                'sum_quantity' => ($this->product_purchases_sum_quantity ?? 0.0) / $this->main_measure_type->quantity . ' ' . $this->main_measure_type->name,
                'sum_current_quantity' => ($this->product_purchases_sum_current_quantity ?? 0.0) / $this->main_measure_type->quantity . ' ' . $this->main_measure_type->name,
                'sum_cost' => $this->product_purchases_sum_cost ?? 0.0,
                'sum_current_cost' => $this->product_purchases_sum_current_cost ?? 0.0,
            ],
            'sales' => [
                'count' => $this->product_consumptions_count_sales ?? 0.0,
                'sum_quantity' => ($this->product_consumptions_sum_quantity_sales ?? 0.0) / $this->main_measure_type->quantity . ' ' . $this->main_measure_type->name,
                'sum_income' => $this->product_consumptions_sum_income_sales ?? 0.0,
                'sum_cost' => $this->product_consumptions_sum_cost_sales ?? 0.0,
                'sum_profit' => $this->product_consumptions_sum_profit_sales ?? 0.0,
            ],
            'write_offs' => [
                'count' => $this->product_consumptions_count_write_offs ?? 0.0,
                'sum_quantity' => ($this->product_consumptions_sum_quantity_write_offs ?? 0.0) / $this->main_measure_type->quantity . ' ' . $this->main_measure_type->name,
                'sum_income' => $this->product_consumptions_sum_income_write_offs ?? 0.0,
                'sum_cost' => $this->product_consumptions_sum_cost_write_offs ?? 0.0,
                'sum_profit' => $this->product_consumptions_sum_profit_write_offs ?? 0.0,
            ]
        ];
    }
}
