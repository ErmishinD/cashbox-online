<?php

namespace App\Http\Controllers\Api;

use App\Filters\CashboxFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PaginateRequest;
use App\Http\Requests\Api\Report\DateRangeRequest;
use App\Http\Resources\Api\Report\CashboxTransactionResource;
use App\Http\Resources\Api\Report\PopularSellProductcsCollection;
use App\Http\Resources\Api\Report\ProductPurchaseRecommendationResource;
use App\Http\Resources\Api\Report\ProfitByCategoryCollection;
use App\Http\Resources\Api\Report\ProfitByDayCollection;
use App\Http\Resources\Api\Report\ProfitByShopResource;
use App\Http\Resources\Api\Report\WarningThresholdByStoragesResource;
use App\Http\Resources\Api\Report\WarningThresholdInStorageResource;
use App\Models\Cashbox;
use App\Models\Category;
use App\Models\ProductConsumption;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\SellProduct;
use App\Models\Storage;
use App\Models\WriteOff;
use App\Services\ProductTypeService;
use Illuminate\Support\Facades\DB;

/**
 * @authenticated
 * @group Report endpoints
 */
class ReportController extends Controller
{
    public function getWarningThresholdByStorages()
    {
        $this->authorize('Report_warningThreshold');

        $purchases_by_storage = ProductPurchase::query()
            ->groupBy('storage_id', 'product_type_id')
            ->join('product_types', 'product_types.id', '=', 'product_purchases.product_type_id')
            ->selectRaw('*, sum(current_quantity) as product_purchases_sum_current_quantity')
            ->havingRaw('product_purchases_sum_current_quantity < product_types.warning_threshold')
            ->get()
            ->groupBy('storage_id');

        $storages = Storage::all();
        foreach ($storages as $storage) {
            $storage->below_threshold_count = $purchases_by_storage->keys()->contains($storage->id)
                ? $purchases_by_storage[strval($storage->id)]->count()
                : 0;
        }
        return WarningThresholdByStoragesResource::collection($storages);
    }

    public function getWarningThresholdInStorage($storage_id)
    {
        $this->authorize('Report_warningThreshold');

        $product_types = ProductType::query()
            ->with(['main_measure_type', 'measure_types', 'media'])
            ->withSum(['product_purchases' => function ($query) use ($storage_id) {
                $query
                    ->where('storage_id', $storage_id)
                    ->where(function ($q) {
                        $q->whereNull('expiration_date')
                            ->orWhere('expiration_date', '>', now());
                    });
            }], 'current_quantity')
            ->havingRaw('((product_purchases_sum_current_quantity - product_types.warning_threshold) is NULL) OR (product_purchases_sum_current_quantity - product_types.warning_threshold) < 0')
            ->orderByRaw('(product_purchases_sum_current_quantity * 100 / product_types.warning_threshold) DESC')
            ->get()
            ->each(function ($product_type) {
                $product_type = ProductTypeService::prepare_measure_types($product_type);
            });
        return WarningThresholdInStorageResource::collection($product_types);
    }

    public function getProfit(DateRangeRequest $request)
    {
        $this->authorize('Report_profit');

        $data = $request->validated();

        $transactions = Cashbox::query()
            ->groupBy('shop_id')
            ->with('shop')
            ->select([
                'shop_id',
                DB::raw('sum(amount) as sum_amount'),
                DB::raw('sum(self_cost) as sum_self_cost'),
                DB::raw('sum(profit) as sum_profit'),
                DB::raw('sum(case when payment_type="' . Cashbox::PAYMENT_TYPES['cash'] . '" then amount else 0 end) as sum_amount_cash'),
                DB::raw('sum(case when payment_type="' . Cashbox::PAYMENT_TYPES['card'] . '" then amount else 0 end) as sum_amount_card'),
            ])
            ->when($request->shop_id, function ($query) use ($request) {
                $query->where('shop_id', $request->shop_id);
            })
            ->whereBetween('created_at', [$data['start_date'], $data['end_date']])
            ->where('transaction_type', Cashbox::TRANSACTION_TYPES['in'])
            ->get();

        return response()->json([
            'data' => ProfitByShopResource::collection($transactions),
            'sum_data' => [
                'sum_amount' => round($transactions->sum('sum_amount'), 2),
                'sum_self_cost' => round($transactions->sum('sum_self_cost'), 2),
                'sum_profit' => round($transactions->sum('sum_profit'), 2),
            ]
        ]);
    }

    public function getProfitByDay(DateRangeRequest $request)
    {
        $this->authorize('Report_profit');
        $data = $request->validated();

        $transactions = Cashbox::query()
            ->groupByRaw('date(created_at)')
            ->selectRaw('date(created_at) as date, sum(amount) as sum_amount, sum(self_cost) as sum_self_cost, sum(profit) as sum_profit')
            ->when($request->shop_id, function ($query) use ($request) {
                $query->where('shop_id', $request->shop_id);
            })
            ->whereBetween('created_at', [$data['start_date'], $data['end_date']])
            ->where('transaction_type', Cashbox::TRANSACTION_TYPES['in'])
            ->get();

        return ProfitByDayCollection::make($transactions)->dateRange([$data['start_date'], $data['end_date']]);
    }

    public function getProfitByCategory(DateRangeRequest $request)
    {
        $this->authorize('Report_profit');
        $data = $request->validated();

        $categories = Category::get();

        $transactions = Cashbox::query()
            ->join('sell_products', 'cashboxes.sell_product_id', '=', 'sell_products.id')
            ->groupByRaw('sell_products.category_id')
            ->selectRaw('date(cashboxes.created_at) as date, sell_products.category_id, sum(amount) as sum_amount, sum(self_cost) as sum_self_cost, sum(profit) as sum_profit')
            ->when($request->shop_id, function ($query) use ($request) {
                $query->where('shop_id', $request->shop_id);
            })
            ->whereBetween('cashboxes.created_at', [$data['start_date'], $data['end_date']])
            ->where('transaction_type', Cashbox::TRANSACTION_TYPES['in'])
            ->get();

        return ProfitByCategoryCollection::make($transactions)->categories($categories);
    }

    public function getPaginatedTransactions(DateRangeRequest $dateRangeRequest, PaginateRequest $paginateRequest, CashboxFilter $filters)
    {
        $this->authorize('Report_profit');
        $report_filter_data = $dateRangeRequest->validated();
        $paginate_data = $paginateRequest->validated();

        $transactions = Cashbox::query()
            ->with(['sell_product', 'operator', 'collector', 'sell_product'])
            ->when($dateRangeRequest->shop_id, function ($query) use ($dateRangeRequest) {
                $query->where('shop_id', $dateRangeRequest->shop_id);
            })
            ->whereBetween('cashboxes.created_at', [$report_filter_data['start_date'], $report_filter_data['end_date']])
            ->where('transaction_type', Cashbox::TRANSACTION_TYPES['in'])
            ->filter($filters)
            ->paginate($paginate_data['per_page'], ['*'], 'page', $paginate_data['page']);

        return response()->json([
            'pagination' => [
                'data' => CashboxTransactionResource::collection($transactions),
                'current_page' => $transactions->currentPage(),
                'last_page' => $transactions->lastPage(),
                'per_page' => $transactions->perPage(),
                'total' => $transactions->total(),
            ]
        ]);
    }

    public function getPopularSellProducts(DateRangeRequest $request)
    {
        $this->authorize('Report_profit');
        $data = $request->validated();

        $sell_products = SellProduct::query()
            ->select(['id', 'name'])
            ->withCount(['cashbox' => function ($query) use ($data) {
                $query
                    ->when(!empty($data['shop_id']), function ($query) use ($data) {
                        $query->where('shop_id', $data['shop_id']);
                    })
                    ->whereBetween('created_at', [$data['start_date'], $data['end_date']]);
            }])
            ->orderByDesc('cashbox_count')
            ->get();
        return PopularSellProductcsCollection::make($sell_products);
    }

    public function getProductPurchaseRecommendations(DateRangeRequest $request)
    {
        $this->authorize('Report_purchaseRecommendations');
        $data = $request->validated();

        $product_types = ProductType::query()
            ->with(['main_measure_type', 'measure_types', 'media'])
            ->withSum(['product_consumptions as consumption_cashbox_sum_quantity' => function ($query) use ($data) {
                $query
                    ->where('consumable_type', Cashbox::class)
                    ->when(!empty($data['shop_id']), function ($query) use ($data) {
                        $query
                            ->join('storages', 'storages.id', '=', 'product_purchases.storage_id')
                            ->join('shops', 'shops.id', '=', 'storages.shop_id')
                            ->where('shops.id', $data['shop_id']);
                    })
                    ->whereBetween('product_consumptions.created_at', [$data['start_date'], $data['end_date']]);
            }], 'quantity')
            ->withSum(['product_consumptions as consumption_cashbox_sum_cost' => function ($query) use ($data) {
                $query
                    ->where('consumable_type', Cashbox::class)
                    ->when(!empty($data['shop_id']), function ($query) use ($data) {
                        $query
                            ->join('storages', 'storages.id', '=', 'product_purchases.storage_id')
                            ->join('shops', 'shops.id', '=', 'storages.shop_id')
                            ->where('shops.id', $data['shop_id']);
                    })
                    ->whereBetween('product_consumptions.created_at', [$data['start_date'], $data['end_date']]);
            }], 'cost')
            ->withSum(['product_consumptions as consumption_write_off_sum_quantity' => function ($query) use ($data) {
                $query
                    ->where('consumable_type', WriteOff::class)
                    ->when(!empty($data['shop_id']), function ($query) use ($data) {
                        $query
                            ->join('storages', 'storages.id', '=', 'product_purchases.storage_id')
                            ->join('shops', 'shops.id', '=', 'storages.shop_id')
                            ->where('shops.id', $data['shop_id']);
                    })
                    ->whereBetween('product_consumptions.created_at', [$data['start_date'], $data['end_date']]);
            }], 'quantity')
            ->withSum(['product_consumptions as consumption_write_off_sum_cost' => function ($query) use ($data) {
                $query
                    ->where('consumable_type', WriteOff::class)
                    ->when(!empty($data['shop_id']), function ($query) use ($data) {
                        $query
                            ->join('storages', 'storages.id', '=', 'product_purchases.storage_id')
                            ->join('shops', 'shops.id', '=', 'storages.shop_id')
                            ->where('shops.id', $data['shop_id']);
                    })
                    ->whereBetween('product_consumptions.created_at', [$data['start_date'], $data['end_date']]);
            }], 'cost')
            ->orderByDesc('consumption_cashbox_sum_cost')
            ->get()
            ->each(function ($product_type) {
                $product_type = ProductTypeService::prepare_measure_types($product_type);
            });

        return ProductPurchaseRecommendationResource::collection($product_types);
    }
}
