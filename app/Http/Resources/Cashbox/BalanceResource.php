<?php

namespace App\Http\Resources\Cashbox;

use Illuminate\Http\Resources\Json\JsonResource;

class BalanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $payments = $this->resource;
        $in_card = round($payments->where('transaction_type', '_in')->where('payment_type', '_card')->sum('amount'), 2);
        $in_cash = round($payments->where('transaction_type', '_in')->where('payment_type', '_cash')->sum('amount'), 2);
        $out_card = round($payments->where('transaction_type', '_out')->where('payment_type', '_card')->sum('amount'), 2);
        $out_cash = round($payments->where('transaction_type', '_out')->where('payment_type', '_cash')->sum('amount'), 2);
        return [
            'in' => [
                'sum' => $in_card + $in_cash,
                'card' => $in_card,
                'cash' => $in_cash,
            ],
            'out' => [
                'sum' => $out_card + $out_cash,
                'card' => $out_card,
                'cash' => $out_cash,
            ],
            'all' => [
                'sum' => ($in_card + $in_cash) - ($out_card + $out_cash),
                'card' => $in_card - $out_card,
                'cash' => $in_cash - $out_cash,
            ],
        ];
    }
}
