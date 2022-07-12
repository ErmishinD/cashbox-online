<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CounterParty\CreateRequest;
use App\Http\Requests\Api\CounterParty\UpdateRequest;
use App\Http\Resources\Api\Counterparty\DefaultResource;
use App\Models\Counterparty;

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

    public function show(Counterparty $counterparty)
    {
        $this->authorize('Counterparty_show');

        return DefaultResource::make($counterparty);
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
