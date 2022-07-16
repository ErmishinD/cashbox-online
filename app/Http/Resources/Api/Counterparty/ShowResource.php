<?php

namespace App\Http\Resources\Api\Counterparty;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
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
            'purchase_sum_cost' => $this->product_purchases_sum_cost - $this->transfer_consumptions_sum_cost ?? '0.00',
            'purchase_sum_current_cost' => $this->product_purchases_sum_current_cost ?? '0.00',
            'cashbox_consumptions_sum_cost' => $this->cashbox_consumptions_sum_cost ?? '0.00',
            'cashbox_consumptions_sum_income' => $this->cashbox_consumptions_sum_income ?? '0.00',
            'cashbox_consumptions_sum_profit' => $this->cashbox_consumptions_sum_profit ?? '0.00',
            'write_off_consumptions_sum_cost' => $this->write_off_consumptions_sum_cost ?? '0.00',
            'transfer_consumptions_sum_cost' => $this->transfer_consumptions_sum_cost ?? '0.00',
        ];
    }
}
