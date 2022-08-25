<?php

namespace App\Http\Resources\Api\Cashbox;

use App\Models\Cashbox;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProfitByShopCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $result = [];

        foreach ($this->collection as $shop_id => $shop_data) {
            $in = $shop_data->where('transaction_type', Cashbox::TRANSACTION_TYPES['in'])->first();
            $out = $shop_data->where('transaction_type', Cashbox::TRANSACTION_TYPES['out'])->first();
            $result[] = [
                'id' => $shop_id,
                'name' => optional($in)->shop->name,
                'sum_amount' => optional($in)->sum_amount ?? 0,
                'sum_self_cost' => optional($in)->sum_self_cost ?? 0,
                'sum_profit' => (optional($in)->sum_profit ?? 0) - (optional($out)->sum_amount ?? 0),
                'sum_amount_card' => optional($in)->sum_amount_card ?? 0,
                'sum_amount_cash' => optional($in)->sum_amount_cash ?? 0,
                'sum_out_amount' => optional($out)->sum_amount ?? 0,
                'sum_out_amount_card' => optional($out)->sum_amount_card ?? 0,
                'sum_out_amount_cash' => optional($out)->sum_amount_cash ?? 0,
            ];
        }

        return $result;
    }
}
