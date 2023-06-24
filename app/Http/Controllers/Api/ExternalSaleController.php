<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ExternalSale\CreateRequest;
use App\Http\Requests\Api\ExternalSale\GetPaginatedRequest;
use App\Http\Requests\Api\PaginateRequest;
use App\Http\Resources\Api\ExternalSale\HistoryResource;
use App\Http\Resources\Api\ExternalSale\IndexResource;
use App\Models\ExternalSale;
use App\Models\SellProduct;
use Illuminate\Support\Facades\DB;

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
                $query->withTrashed()->with([
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
            ->orderByDesc('id')
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
        $data = $request->validated();
        $sell_product = SellProduct::query()
            ->select(
                'id',
                DB::raw('ABS(price - '.$data['amount'].') as amount_delta'),
            )
            ->orderBy('amount_delta')
            ->first();

        $data['sell_product_id'] = $sell_product->id;
        $externalSale = ExternalSale::firstOrCreate(
            ['description' => $data['description']],
            $data
        );
        return response()->json(['data' => ['id' => $externalSale->id]]);
    }

    public function destroy(ExternalSale $externalSale)
    {
        $this->authorize('ExternalSale_access');

        $externalSale->delete();
        return response()->noContent();
    }
    
    public function restore($externalSale)
    {
        $this->authorize('ExternalSale_access');

        $external_sale = ExternalSale::onlyTrashed()->find($externalSale)->restore();
        return response()->noContent();
    }

    public function get_history_paginated(PaginateRequest $paginateRequest)
    {
        $this->authorize('ExternalSale_access');

        $paginate_data = $paginateRequest->validated();

        $external_sales = ExternalSale::query()
            ->withTrashed()
            ->with(['shop', 'cashbox_payments.sell_product'])
            ->where(function($query) {
                $query->whereNotNull('confirmed_at')->orWhereNotNull('deleted_at');
            })
            ->orderByDesc('id')
            ->paginate($paginate_data['per_page'], ['*'], 'page', $paginate_data['page']);

        return response()->json([
            'success' => true,
            'pagination' => [
                'data' => HistoryResource::collection($external_sales),
                'current_page' => $external_sales->currentPage(),
                'last_page' => $external_sales->lastPage(),
                'per_page' => $external_sales->perPage(),
                'total' => $external_sales->total(),
            ]
        ]);
    }

    function instantDelete(ExternalSale $externalSale) {
        $externalSale->forceDelete();
        return response()->noContent();
    }
}
