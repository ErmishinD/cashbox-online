<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ExternalSale\CreateRequest;
use App\Http\Requests\Api\ExternalSale\GetPaginatedRequest;
use App\Http\Requests\Api\ExternalSale\UpdateRequest;
use App\Http\Requests\Api\PaginateRequest;
use App\Http\Requests\TenantRequest;
use App\Http\Resources\Api\ExternalSale\IndexResource;
use App\Models\ExternalSale;
use Illuminate\Http\Request;

/**
 * @authenticated
 * @group External Sale management
 */
class ExternalSaleController extends Controller
{
    public function get_paginated(PaginateRequest $paginateRequest, GetPaginatedRequest $request)
    {
        $this->authorize('ExternalSale_access');

        $paginate_data = $paginateRequest->validated();

        $external_sales = ExternalSale::query()
            ->with(['shop', 'sell_product' => function ($query) {
                $query->with([
                    'media',
                    'category' => function ($query) {
                        $query->withTrashed();
                    },
                    'product_types' => function ($query) {
                        $query->with(['main_measure_type', 'measure_types',
                            'product_purchases' => function ($q) {
                                $q->where('current_quantity', '>', 0)
                                    ->orderBy('id')
                                    ->take(1);
                            }]);
                    }
                ]);
            }])
            ->whereNull('confirmed_at')
            ->where('shop_id', $request->shop_id)
            ->paginate($paginate_data['per_page'], ['*'], 'page', $paginate_data['page']);

        return response()->json([
            'success' => true,
            'pagination' => [
                'data' => IndexResource::collection($external_sales),
                'current_page' => $external_sales->currentPage(),
                'last_page' => $external_sales->lastPage(),
                'per_page' => $external_sales->perPage(),
                'total' => $external_sales->total(),
            ]
        ]);
    }

    public function store(CreateRequest $request)
    {
        ExternalSale::create($request->validated());
        return response()->noContent();
    }

    public function confirm(ExternalSale $externalSale)
    {
        $this->authorize('ExternalSale_access');

        $externalSale->update(['confirmed_at' => now()]);
        return response()->noContent();
    }

    public function destroy(ExternalSale $externalSale)
    {
        $this->authorize('ExternalSale_access');

        $externalSale->delete();
        return response()->noContent();
    }
}
