<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CounterParty\CreateRequest;
use App\Http\Requests\Api\CounterParty\UpdateRequest;
use App\Http\Resources\Api\Counterparty\DefaultResource;
use App\Http\Resources\Api\Counterparty\ShowResource;
use App\Models\Cashbox;
use App\Models\Counterparty;
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

    public function show($id)
    {
        $this->authorize('Counterparty_show');

        $counterparty = Counterparty::query()
            ->withSum('product_purchases', 'cost')
            ->withSum('product_purchases', 'current_cost')
            ->withSum(['product_consumptions as cashbox_consumptions_sum_cost' => function ($query) {
                $query->where('consumable_type', Cashbox::class);
            }], 'cost')
            ->withSum(['product_consumptions as cashbox_consumptions_sum_income' => function ($query) {
                $query->where('consumable_type', Cashbox::class);
            }], 'income')
            ->withSum(['product_consumptions as cashbox_consumptions_sum_profit' => function ($query) {
                $query->where('consumable_type', Cashbox::class);
            }], 'profit')
            ->withSum(['product_consumptions as write_off_consumptions_sum_cost' => function ($query) {
                $query->where('consumable_type', WriteOff::class);
            }], 'cost')
            ->withSum(['product_consumptions as transfer_consumptions_sum_cost' => function ($query) {
                $query->where('consumable_type', Transfer::class);
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
