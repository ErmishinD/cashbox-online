<?php

namespace App\Http\Resources\Api\WriteOff;

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
        $first_write_off = $this->collection->first();

        $result = [
            'storage' => [
                'id' => $first_write_off->storage_id,
                'name' => $first_write_off->storage->name
            ],
            'user' => [
                'id' => $first_write_off->user_id,
                'name' => $first_write_off->user->name
            ],
            'created_at' => $first_write_off->created_at->format('Y-m-d H:i'),
        ];
        $all_amount = 0;
        foreach ($this->collection as $write_off) {
            $write_off_data = collect($write_off->data);
            $write_off_amount = $write_off_data->sum('cost');
            $all_amount += $write_off_amount;

            $result['product_types'][] = [
                'id' => $write_off->product_type_id,
                'name' => $write_off->product_type->name,
                'main_measure_type' => [
                    'id' => $write_off->product_type->main_measure_type_id,
                    'name' => $write_off->product_type->main_measure_type->name,
                    'quantity' => $write_off->product_type->main_measure_type->quantity
                ],
                'amount' => $write_off_amount,
            ];
        }
        $request['all_amount'] = $all_amount;
        return $result;
    }
}
