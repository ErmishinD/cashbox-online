<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CounterParty\CreateRequest;
use App\Http\Requests\Api\CounterParty\UpdateRequest;
use App\Http\Requests\Api\CounterParty\DateRangeRequest;
use App\Http\Resources\Api\Counterparty\DefaultResource;
use App\Http\Resources\Api\Counterparty\ShowResource;
use App\Models\Cashbox;
use App\Models\Counterparty;
use App\Models\ProductPurchase;
use App\Models\Transfer;
use App\Models\WriteOff;

/**
 * @authenticated
 * @group Counterparty management
 */
class CounterpartyController extends Controller
{
    public function index()
    {
        $this->authorize('Counterparty_access');

        $counterparties = Counterparty::all();
        return DefaultResource::collection($counterparties);
    }

    public function store(CreateRequest $request)
    {
        $this->authorize('Counterparty_create');

        $data = $request->validated();
        $counterparty = Counterparty::create($data);
        return DefaultResource::make($counterparty);
    }

    public function show($id, DateRangeRequest $request)
    {
        $this->authorize('Counterparty_show');

        $data = $request->validated();

        $productPurchaseIds = ProductPurchase::query()
            ->whereBetween('created_at', [$data['start_date'], $data['end_date']])
            ->when($request->storage_id, function ($query) use ($request) {
                $query->where('storage_id', $request->storage_id);
            })
            ->when($request->product_type_name, function ($query) use ($request) {
                $query->whereHas('product_type', fn($q) => $q->where('name', 'like', '%'.$request->product_type_name.'%'));
            })
            ->pluck('id');

        $counterparty = Counterparty::query()
            ->withSum(['product_purchases' => function($query) use ($productPurchaseIds) {
                $query->whereIn('product_purchases.id', $productPurchaseIds);
            }], 'cost')
            ->withSum(['product_purchases' => function ($query) use ($productPurchaseIds) {
                $query->whereIn('product_purchases.id', $productPurchaseIds);
            }], 'current_cost')
            ->withSum(['product_consumptions as cashbox_consumptions_sum_cost' => function ($query) use ($productPurchaseIds) {
                $query->where('consumable_type', Cashbox::class)
                        ->whereIn('product_purchases.id', $productPurchaseIds);
            }], 'cost')
            ->withSum(['product_consumptions as cashbox_consumptions_sum_income' => function ($query) use ($productPurchaseIds) {
                $query->where('consumable_type', Cashbox::class)
                    ->whereIn('product_purchases.id', $productPurchaseIds);
            }], 'income')
            ->withSum(['product_consumptions as cashbox_consumptions_sum_profit' => function ($query) use ($productPurchaseIds) {
                $query->where('consumable_type', Cashbox::class)
                    ->whereIn('product_purchases.id', $productPurchaseIds);
            }], 'profit')
            ->withSum(['product_consumptions as write_off_consumptions_sum_cost' => function ($query) use ($productPurchaseIds) {
                $query->where('consumable_type', WriteOff::class)
                    ->whereIn('product_purchases.id', $productPurchaseIds);
            }], 'cost')
            ->withSum(['product_consumptions as transfer_consumptions_sum_cost' => function ($query) use ($productPurchaseIds) {
                $query->where('consumable_type', Transfer::class)
                    ->whereIn('product_purchases.id', $productPurchaseIds);
            }], 'cost')
            ->find($id);

        return ShowResource::make($counterparty);
    }

    public function update(UpdateRequest $request, Counterparty $counterparty)
    {
        $this->authorize('Counterparty_edit');

        $data = $request->validated();
        $counterparty->update($data);
        return DefaultResource::make($counterparty);
    }

    public function destroy(Counterparty $counterparty)
    {
        $this->authorize('Counterparty_delete');
        $counterparty->delete();
        return response()->noContent();
    }
}
