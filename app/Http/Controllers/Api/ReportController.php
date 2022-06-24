<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Report\DateRangeRequest;
use App\Http\Resources\Api\Report\ProfitByShopResource;
use App\Http\Resources\Api\Report\WarningThresholdByStoragesResource;
use App\Http\Resources\Api\Report\WarningThresholdInStorageResource;
use App\Models\Cashbox;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\Storage;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getWarningThresholdByStorages()
    {
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
        $product_types = ProductType::query()
            ->with('main_measure_type')
            ->withSum(['product_purchases' => function ($query) use ($storage_id) {
                $query
                    ->where('storage_id', $storage_id)
                    ->where(function ($q) {
                        $q->whereNull('expiration_date')
                            ->orWhere('expiration_date', '>', now());
                    });
            }], 'current_quantity')
            ->havingRaw('((product_purchases_sum_current_quantity - product_types.warning_threshold) is NULL) OR (product_purchases_sum_current_quantity - product_types.warning_threshold) < 0')
            ->orderByRaw('(product_purchases_sum_current_quantity - product_types.warning_threshold) ASC')
            ->get();
        return WarningThresholdInStorageResource::collection($product_types);
    }

    public function getProfit(DateRangeRequest $request)
    {
        $data = $request->validated();

        $transactions = Cashbox::query()
            ->groupBy('shop_id')
            ->with('shop')
            ->selectRaw('shop_id, sum(amount) as sum_amount, sum(self_cost) as sum_self_cost, sum(profit) as sum_profit')
            ->whereBetween('created_at', [$data['start_date'], $data['end_date']])
            ->where('transaction_type', Cashbox::TRANSACTION_TYPES['in'])
            ->get();

        return response()->json([
            'data' => ProfitByShopResource::collection($transactions),
            'sum_data' => [
                'sum_amount' => $transactions->sum('sum_amount'),
                'sum_self_cost' => $transactions->sum('sum_self_cost'),
                'sum_profit' => $transactions->sum('sum_profit'),
            ]
        ]);
    }
}
