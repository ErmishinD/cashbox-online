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
            $result->put(date('Y-m-d H:i:s', strtotime($collected_at)), [
                'collected_at' => $collected_at,
                'amount' => round(
                    $data->where('transaction_type', Cashbox::TRANSACTION_TYPES['in'])->sum('amount') - $data->where('transaction_type', Cashbox::TRANSACTION_TYPES['out'])->sum('amount'),
                    2),
                'collector' => new UserResource($data->first()->collector),
            ]);
        }
        return $result->toArray();
    }
}
