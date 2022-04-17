<?php

namespace App\Http\Controllers\Api;

use App\Filters\TransferFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PaginateRequest;
use App\Http\Resources\Api\Transfer\DefaultResource;
use App\Http\Resources\Api\Transfer\IndexResource;
use App\Http\Resources\Api\Transfer\ShowCollection;
use App\Models\Transfer;

class TransferController extends Controller
{
    public function get_paginated(PaginateRequest $request, TransferFilter $filters)
    {
        $this->authorize('Transfer_access');

        $paginate_data = $request->validated();
        $transfers = Transfer::query()
            ->with(['from_storage', 'to_storage', 'product_purchase.product_type.main_measure_type', 'transferred_by_user'])
            ->filter($filters)
            ->paginate($paginate_data['per_page'], ['*'], 'page', $paginate_data['page']);

        return response()->json([
            'success' => true,
            'pagination' => [
                'data' => IndexResource::collection($transfers),
                'current_page' => $transfers->currentPage(),
                'last_page' => $transfers->lastPage(),
                'per_page' => $transfers->perPage(),
                'total' => $transfers->total(),
            ]
        ]);

    }

    public function show(Transfer $transfer)
    {
        $this->authorize('Transfer_show');

        $transfer->load([
            'from_storage', 'to_storage', 'product_purchase.product_type.main_measure_type',
            'transferred_by_user', 'transfers.product_purchase.product_type.main_measure_type'
        ]);

        $all_transfers = collect([$transfer]);
        if ($transfer->transfers->isNotEmpty()) {
            $all_transfers = $all_transfers->concat($transfer->transfers);
        }

        return new ShowCollection($all_transfers);
    }
}
