<?php

namespace App\Repositories;

use App\Models\Cashbox;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\Shop;
use App\Models\Storage;
use App\Services\EnumDbCol;
use App\Services\ProductPurchaseService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class CashboxRepository.
 */
class CashboxRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Cashbox::class;
    }

    public function mass_create(array $data): \Illuminate\Support\Collection
    {
        $payments = collect();
        $parent_id = null;

        $storage_ids = Storage::select('id', 'shop_id')->where('shop_id', $data['shop_id'])->pluck('id');
        $product_purchases = ProductPurchase::query()
            ->whereIn('storage_id', $storage_ids)
            ->where('current_quantity', '>', 0)
            ->where(function ($q) {
                $q->whereNull('expiration_date')
                    ->orWhere('expiration_date', '>', now(new \DateTimeZone('Europe/Kiev')));
            })
            ->orderBy('created_at')
            ->get();

        DB::transaction(function () use ($product_purchases, $payments, $data, $parent_id) {
            foreach ($data['sell_products'] as $sell_product) {
                if ($payments->isNotEmpty()) {
                    $parent_id = $payments->first()->id;
                }
                $data['sell_product_id'] = $sell_product['sell_product_id'];
                $data['amount'] = $sell_product['amount'];
                $data['parent_id'] = $parent_id;

                $used_purchases = ProductPurchaseService::subtract_product_types($product_purchases, $sell_product);

                $data['self_cost'] = 0;

                foreach ($used_purchases as $product_type_id => $purchases) {
                    foreach ($purchases as $purchase) {
                        $data['self_cost'] += $purchase['cost'];
                    }
                }

                $data['profit'] = $data['amount'] - $data['self_cost'];

                $data['data'] = json_encode($used_purchases);
                $payment = $this->model->create($data);
                $payments->push($payment);
            }
        });

        return $payments;
    }

    public function get_not_collected(): Collection
    {
        $cashbox_transactions = $this->model
            ->select([
                'id', 'shop_id', 'sell_product_id', 'transaction_type', 'payment_type', 'amount',
                'description', 'operator_id', 'collected_at', 'collector_id', 'parent_id', 'company_id', 'created_at'
            ])
            ->with([
                'sell_product' => function ($query) {
                    $query->withTrashed();
                },
                'operator' => function ($query) {
                    $query->withTrashed();
                },
                'shop' => function ($query) {
                    $query->withTrashed();
                }
            ])
            ->notCollected()
            ->orderByDesc('created_at')
            ->get();
        return $cashbox_transactions;
    }

    public function get_for_balance(): Collection
    {
        return $this->model
            ->select('transaction_type', 'payment_type', 'amount')
            ->notCollected()
            ->get();
    }

    public function collect_payments(array $ids)
    {
        $collected_time = now();
        $this->model
            ->whereIn('id', $ids)
            ->update([
                'collector_id' => Auth::user()->id, 'collected_at' => $collected_time
            ]);
    }

    public function get_collection_history(): Collection
    {
        return $this->model
            ->with(['collector' => function ($query) {
                $query->withTrashed();
            }])
            ->collected()
            ->get()
            ->each(function ($payment) {
                $payment->collected_at_string = $payment->collected_at->format('Y-m-d H:i:s');
            })
            ->groupBy('collected_at_string');
    }

    public function get_payments_from_history($collected_at): Collection
    {
        return $this->model
            ->with([
                'sell_product' => function ($query) {
                    $query->withTrashed();
                },
                'operator' => function ($query) {
                    $query->withTrashed();
                },
                'shop' => function ($query) {
                    $query->withTrashed();
                }
            ])
            ->collected($collected_at)
            ->get();
    }

    public function deleteById($id): bool
    {
        $payment = $this->model->find($id);

        if (is_null($payment))
            return false;

        return $payment->delete();
    }
}
