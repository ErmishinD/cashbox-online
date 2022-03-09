<?php

namespace App\Http\Controllers\Api;

use App\Filters\CashboxFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cashbox\CreateRequest;
use App\Http\Requests\Api\Cashbox\MassCreateRequest;
use App\Http\Requests\Api\Cashbox\UpdateRequest;
use App\Http\Requests\Api\PaginateRequest;
use App\Http\Resources\Api\Cashbox\DefaultResource;
use App\Http\Resources\Api\Cashbox\IndexResource;
use App\Http\Resources\Cashbox\BalanceResource;
use App\Repositories\CashboxRepository;

class CashboxController extends Controller
{
    /**
     * @var CashboxRepository
     */
    private $cashbox;

    public function __construct()
    {
        $this->cashbox = app(CashboxRepository::class);
        $this->middleware(['auth']);
        $this->middleware(['can:Cashbox_access'])->only(['index']);
        $this->middleware(['can:Cashbox_create'])->only(['store']);
        $this->middleware(['can:Cashbox_show'])->only(['show']);
        $this->middleware(['can:Cashbox_edit'])->only(['update']);
        $this->middleware(['can:Cashbox_delete'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $payments = $this->cashbox->get_not_collected();
        return response()->json([
            'success' => true,
            'data' => IndexResource::collection($payments),
            'balance' => new BalanceResource($payments),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $payment = $this->cashbox->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($payment)]);
    }

    public function mass_store(MassCreateRequest $request)
    {
        $data = $request->validated();
        $payments = $this->cashbox->mass_create($data);
        return response()->json(['success' => true, 'data' => DefaultResource::collection($payments)]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $payment = $this->cashbox->getById($id);
        return response()->json(['success' => true, 'data' => new DefaultResource($payment)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $payment = $this->cashbox->getById($id);
        $payment->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($payment)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $payment = $this->cashbox->getById($id);
        if ($payment) {
            $payment->delete();
        }
        return response()->json(['success' => true]);
    }

    public function get_current_balance()
    {
        $payments = $this->cashbox->get_for_balance();
        return response()->json(['success' => true, 'data' => new BalanceResource($payments)]);
    }
}
