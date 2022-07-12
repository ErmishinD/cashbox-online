<?php

namespace App\Http\Controllers\Api;

use App\Filters\ProductConsumptionFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PaginateRequest;
use App\Http\Resources\Api\ProductConsumption\PaginateResource;
use App\Models\Cashbox;
use App\Models\ProductConsumption;
use App\Models\Transfer;
use App\Models\WriteOff;
use Illuminate\Http\JsonResponse;

/**
 * @authenticated
 * @group ProductConsumption management
 */
class ProductConsumptionController extends Controller
{
    public function get_paginated(PaginateRequest $request, ProductConsumptionFilter $filters): JsonResponse
    {
        $paginate_data = $request->validated();
        $product_consumptions = ProductConsumption::query()
            ->with(['consumable' => function ($query) {
                $query->morphWith([
                    Cashbox::class => ['sell_product', 'shop', 'operator'],
                    Transfer::class => ['from_storage', 'to_storage', 'transferred_by_user', 'product_type.main_measure_type'],
                    WriteOff::class => ['storage', 'user', 'product_type.main_measure_type']
                ]);
            }])
            ->filter($filters)
            ->paginate($paginate_data['per_page'], ['*'], 'consumption-page', $paginate_data['page']);

        return response()->json([
            'success' => true,
            'pagination' => [
                'data' => PaginateResource::collection($product_consumptions),
                'current_page' => $product_consumptions->currentPage(),
                'last_page' => $product_consumptions->lastPage(),
                'per_page' => $product_consumptions->perPage(),
                'total' => $product_consumptions->total(),
            ]
        ]);
    }
}
