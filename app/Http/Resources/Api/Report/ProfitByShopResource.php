<?php

namespace App\Http\Resources\Api\Report;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfitByShopResource extends JsonResource
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
            'id' => $this->shop_id,
            'name' => $this->shop->name,
            'sum_amount' => $this->sum_amount,
            'sum_self_cost' => $this->sum_self_cost,
            'sum_profit' => $this->sum_profit,
        ];
    }
}
