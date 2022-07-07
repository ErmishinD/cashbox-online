<?php

namespace App\Http\Resources\Api\Cashbox;

use App\Http\Resources\Api\User\DefaultResource as UserResource;
use App\Models\Cashbox;
use Illuminate\Http\Resources\Json\ResourceCollection;

class HistoryCollection extends ResourceCollection
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
        foreach ($this->collection as $collected_at => $data) {
            $unique_shop_ids = $data->pluck('shop_id')->unique();
            $shop = $unique_shop_ids->count() == 1 ? $data->first()->shop : null;

            $unique_operator_ids = $data->pluck('operator_id')->unique();
            $operator = $unique_operator_ids->count() == 1 ? $data->first()->operator : null;

            $result->push(array(
                'collected_at' => $collected_at,
                'amount' => round(
                    $data->where('transaction_type', Cashbox::TRANSACTION_TYPES['in'])->sum('amount') - $data->where('transaction_type', Cashbox::TRANSACTION_TYPES['out'])->sum('amount'),
                    2),
                'collector' => new UserResource($data->first()->collector),
                'shop' => $shop ? ['id' => $shop->id, 'name' => $shop->name] : null,
                'operator' => $operator ? ['id' => $operator->id, 'name' => $operator->name] : null,
            ));
        }
        return $result->toArray();
    }
}
