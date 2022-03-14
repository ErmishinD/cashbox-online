<?php

namespace App\Http\Controllers\Api;

use App\Filters\SellProductFilter;
use App\Filters\SellProductGroupFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PaginateRequest;
use App\Http\Resources\Api\Sellable\DashboardResource;
use App\Models\SellProduct;
use App\Models\SellProductGroup;
use Illuminate\Http\JsonResponse;

class SellableController extends Controller
{
    public function get_paginated(
        PaginateRequest $request,
        SellProductFilter $product_filters,
        SellProductGroupFilter $group_filters
    ): JsonResponse
    {
        $paginate_data = $request->validated();

        $sell_products = SellProduct::with(['product_types.main_measure_type'])->filter($product_filters)->get();
        $sell_product_groups = SellProductGroup::with(['products.product_types.main_measure_type'])->filter($group_filters)->get();

        $sellable = $sell_product_groups->concat($sell_products);
        $sellable = $sellable->paginate($paginate_data['per_page'], $paginate_data['page']);

        return response()->json([
            'success' => true,
            'pagination' => [
                'data' => DashboardResource::collection($sellable->items()),
                'current_page' => $sellable->currentPage(),
                'last_page' => $sellable->lastPage(),
                'per_page' => $sellable->perPage(),
                'total' => $sellable->total(),
            ]
        ]);
    }
}
