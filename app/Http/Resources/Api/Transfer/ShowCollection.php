<?php

namespace App\Http\Resources\Api\Transfer;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ShowCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $first_transfer = $this->collection->first();

        $result = [
            'from_storage' => [
                'id' => $first_transfer->from_storage_id,
                'name' => $first_transfer->from_storage->name
            ],
            'to_storage' => [
                'id' => $first_transfer->to_storage_id,
                'name' => $first_transfer->to_storage->name
            ],
            'transferred_by' => [
                'id' => $first_transfer->transferred_by,
                'name' => $first_transfer->transferred_by_user->name
            ],
            'created_at' => $first_transfer->created_at->format('Y-m-d H:i'),
        ];
        $all_amount = 0;
        foreach ($this->collection as $transfer) {
            $transfer_data = collect($transfer->data);
            $transfer_amount = $transfer_data->sum('cost');
            $all_amount += $transfer_amount;

            $result['product_purchases'][] = [
                'id' => $transfer->product_purchase_id,
                'quantity' => $transfer->product_purchase->quantity,
                'product_type' => [
                    'id' => $transfer->product_purchase->product_type->id,
                    'name' => $transfer->product_purchase->product_type->name,
                    'main_measure_type' => [
                        'id' => $transfer->product_purchase->product_type->main_measure_type->id,
                        'name' => $transfer->product_purchase->product_type->main_measure_type->name,
                        'quantity' => $transfer->product_purchase->product_type->main_measure_type->quantity
                    ]
                ],
                'amount' => $transfer_amount,
            ];
        }
        $request['all_amount'] = $all_amount;
        return $result;
    }
}
