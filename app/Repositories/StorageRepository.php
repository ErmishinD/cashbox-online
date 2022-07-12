<?php

namespace App\Repositories;

use App\Models\Cashbox;
use App\Models\ProductConsumption;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\Shop;
use App\Models\Storage;
use App\Models\Transfer;
use App\Models\WriteOff;
use App\Services\ProductPurchaseService;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class StorageRepository.
 */
class StorageRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Storage::class;
    }

    public function getWithProductTypes(int $id)
    {
        $storage = $this->model->find($id);

        $product_types = ProductType::query()
            ->with(['media', 'main_measure_type'])
            ->withSum(['product_purchases' => function ($query) use ($id) {
                $query->where('storage_id', $id);
            }], 'current_quantity')
            ->orderByDesc('product_purchases_sum_current_quantity')
            ->get();

        $storage->product_types = $product_types;
        return $storage;
    }

    public function deleteById($id): bool
    {
        $product_purchases = ProductPurchase::where('storage_id', $id)->where('current_quantity', '>', 0)->count();
        if ($product_purchases > 0) {
            return false;
        }
        return parent::deleteById($id);
    }

    public function getForSelect($company_id)
    {
        $shops_with_storages = Shop::select('id', 'company_id', 'name')
            ->with(['storages' => function ($query) {
                $query->select('id', 'name', 'shop_id');
            }])
            ->where('company_id', $company_id)
            ->get();
        return $shops_with_storages;
    }

    public function write_off($data)
    {
        $product_purchases = ProductPurchase::query()
            ->where('storage_id', $data['storage_id'])
            ->where('current_quantity', '>', 0)
            ->orderBy('created_at')
            ->get();

        $write_offs = collect();
        $parent_id = null;
        DB::transaction(function () use ($write_offs, $data, $product_purchases, $parent_id) {
            $used_purchases = ProductPurchaseService::subtract_product_types($product_purchases, $data);

            foreach ($data['product_types'] as $product_type) {
                if ($write_offs->isNotEmpty()) {
                    $parent_id = $write_offs->first()->id;
                }
                $write_off = WriteOff::create([
                    'company_id' => $data['company_id'],
                    'storage_id' => $data['storage_id'],
                    'user_id' => $data['user_id'],
                    'product_type_id' => $product_type['id'],
                    'quantity' => $product_type['quantity'],
                    'parent_id' => $parent_id,
                ]);

                $write_off->product_consumptions = collect();
                foreach ($used_purchases[$product_type['id']] as $purchase) {
                    $product_consumption = ProductConsumption::create([
                        'company_id' => $data['company_id'],
                        'product_purchase_id' => $purchase['id'],
                        'consumable_type' => WriteOff::class,
                        'consumable_id' => $write_off->id,
                        'quantity' => $purchase['quantity'],
                        'cost' => $purchase['cost'],
                        'income' => 0,
                        'profit' => -$purchase['cost'],
                    ]);
                    $write_off->product_consumptions->push($product_consumption);
                }

                $write_offs->push($write_off);
            }
        });
        return $write_offs;
    }

    public function transfer($data)
    {
        $product_purchases = ProductPurchase::query()
            ->where('storage_id', $data['from_storage_id'])
            ->where('current_quantity', '>', 0)
            ->orderBy('created_at')
            ->get();

        $transfers = collect();
        $transfer_parent_id = null;
        $new_purchases = collect();
        $purchase_parent_id = null;

        DB::transaction(function () use ($new_purchases, $transfers, $data, $product_purchases, $transfer_parent_id, $purchase_parent_id) {
            $used_purchases = ProductPurchaseService::subtract_product_types($product_purchases, $data);

            foreach ($data['product_types'] as $product_type) {
                if ($transfers->isNotEmpty()) {
                    $transfer_parent_id = $transfers->first()->id;
                }
                if ($new_purchases->isNotEmpty()) {
                    $purchase_parent_id = $new_purchases->first()->id;
                }

                $current_used_purchases = collect($used_purchases[$product_type['id']]);

                if ($current_used_purchases->unique('expiration_date')->count() > 1) {
                    foreach ($current_used_purchases as $current_used_purchase) {
                        if ($transfers->isNotEmpty()) {
                            $transfer_parent_id = $transfers->first()->id;
                        }
                        if ($new_purchases->isNotEmpty()) {
                            $purchase_parent_id = $new_purchases->first()->id;
                        }

                        $product_purchase = ProductPurchase::create([
                            'company_id' => $data['company_id'],
                            'storage_id' => $data['to_storage_id'],
                            'product_type_id' => $product_type['id'],
                            'quantity' => $current_used_purchase['quantity'],
                            'current_quantity' => $current_used_purchase['quantity'],
                            'cost' => $current_used_purchase['cost'],
                            'current_cost' => $current_used_purchase['cost'],
                            'expiration_date' => $current_used_purchases['expiration_date'],
                            'user_id' => $data['transferred_by'],
                            'parent_id' => $purchase_parent_id,
                            'counterparty_id' => $current_used_purchase['counterparty_id'],
                        ]);
                        $new_purchases->push($product_purchase);

                        $transfer = Transfer::create([
                            'company_id' => $data['company_id'],
                            'from_storage_id' => $data['from_storage_id'],
                            'to_storage_id' => $data['to_storage_id'],
                            'transferred_by' => $data['transferred_by'],
                            'product_purchase_id' => $product_purchase->id,
                            'parent_id' => $transfer_parent_id,
                        ]);

                        $product_consumption = ProductConsumption::create([
                            'company_id' => $data['company_id'],
                            'product_purchase_id' => $current_used_purchase['id'],
                            'consumable_type' => Transfer::class,
                            'consumable_id' => $transfer->id,
                            'quantity' => $current_used_purchase['quantity'],
                            'cost' => 0,
                            'income' => 0,
                            'profit' => 0,
                        ]);

                        $transfer->product_consumptions = collect([$product_consumption]);

                        $transfers->push($transfer);
                    }
                } else {
                    $cost = round($current_used_purchases->sum('cost'), 2);
                    $product_purchase = ProductPurchase::create([
                        'company_id' => $data['company_id'],
                        'storage_id' => $data['to_storage_id'],
                        'product_type_id' => $product_type['id'],
                        'quantity' => $product_type['quantity'],
                        'current_quantity' => $product_type['quantity'],
                        'cost' => $cost,
                        'current_cost' => $cost,
                        'expiration_date' => $current_used_purchases->unique('expiration_date')->first()['expiration_date'],
                        'user_id' => $data['transferred_by'],
                        'parent_id' => $purchase_parent_id,
                        'counterparty_id' => $current_used_purchases->unique('counterparty_id')->first()['counterparty_id'],
                    ]);
                    $new_purchases->push($product_purchase);

                    $transfer = Transfer::create([
                        'company_id' => $data['company_id'],
                        'from_storage_id' => $data['from_storage_id'],
                        'to_storage_id' => $data['to_storage_id'],
                        'transferred_by' => $data['transferred_by'],
                        'product_purchase_id' => $product_purchase->id,
                        'parent_id' => $transfer_parent_id,
                        'data' => $used_purchases[$product_type['id']]
                    ]);

                    $transfer->product_consumptions = collect();

                    foreach ($current_used_purchases as $current_used_purchase) {
                        $product_consumption = ProductConsumption::create([
                            'company_id' => $data['company_id'],
                            'product_purchase_id' => $current_used_purchase['id'],
                            'consumable_type' => Transfer::class,
                            'consumable_id' => $transfer->id,
                            'quantity' => $current_used_purchase['quantity'],
                            'cost' => 0,
                            'income' => 0,
                            'profit' => 0,
                        ]);
                        $transfer->product_consumptions->push($product_consumption);
                    }

                    $transfers->push($transfer);
                }
            }
        });

        return $transfers;
    }
}
