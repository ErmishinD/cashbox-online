<?php

namespace App\Repositories;

use App\Models\Cashbox;
use App\Models\ProductPurchase;
use App\Models\Shop;
use App\Models\Storage;
use App\Services\EnumDbCol;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
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
            ->orderBy('created_at')
            ->get();

        foreach ($data['sell_products'] as $sell_product) {
            if ($payments->isNotEmpty()) {
                $parent_id = $payments->first()->id;
            }
            $data['sell_product_id'] = $sell_product['sell_product_id'];
            $data['amount'] = $sell_product['amount'];
            $data['data'] = json_encode($sell_product['product_types']);
            $data['parent_id'] = $parent_id;
            $payment = $this->model->create($data);
            $payments->push($payment);

            // отнять нужное кол-во продуктов со склада
            foreach ($sell_product['product_types'] as $product_type) {
                foreach ($product_purchases->where('product_type_id', $product_type['id']) as $product_purchase) {
                    if ($product_purchase->current_quantity >= $product_type['quantity']) {
                        $product_purchase->current_quantity = $product_purchase->current_quantity - $product_type['quantity'];
                        $product_purchase->save();
                        break;
                    }

                    $product_type['quantity'] = $product_type['quantity'] - $product_purchase->current_quantity;
                    $product_purchase->current_quantity = 0;
                    $product_purchase->save();
                }
            }
        }

        return $payments;
    }

    public function get_not_collected(): Collection
    {
        $cashbox_transactions = $this->model
            ->select([
                'shop_id', 'sell_product_id', 'product_purchase_id', 'transaction_type', 'payment_type', 'amount',
                'description', 'operator_id', 'collected_at', 'collector_id', 'parent_id', 'company_id', 'created_at'
            ])
            ->with([
                'sell_product' => function ($query) {
                    $query->withTrashed();
                },
                'product_purchase' => function ($query) {
                    $query->with(['product_type' => function ($q) {
                        $q->withTrashed();
                    }]);
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
            ->groupBy('collected_at');
    }

    public function get_payments_from_history($collected_at): Collection
    {
        return $this->model
            ->with([
                'sell_product' => function ($query) {
                    $query->withTrashed();
                },
                'product_purchase' => function ($query) {
                    $query->with(['product_type' => function ($q) {
                        $q->withTrashed();
                    }]);
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
