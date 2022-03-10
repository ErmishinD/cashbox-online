<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cashbox\CollectPaymentsRequest;
use App\Http\Requests\Api\Cashbox\CreateRequest;
use App\Http\Requests\Api\Cashbox\MassCreateRequest;
use App\Http\Requests\Api\Cashbox\PaymentsFromHistoryRequest;
use App\Http\Requests\Api\Cashbox\UpdateRequest;
use App\Http\Resources\Api\Cashbox\DefaultResource;
use App\Http\Resources\Api\Cashbox\HistoryCollection;
use App\Http\Resources\Api\Cashbox\IndexResource;
use App\Http\Resources\Cashbox\BalanceResource;
use App\Repositories\CashboxRepository;
use Illuminate\Http\JsonResponse;

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

    public function index(): JsonResponse
    {
        $payments = $this->cashbox->get_not_collected();
        return response()->json([
            'success' => true,
            'data' => IndexResource::collection($payments),
            'balance' => new BalanceResource($payments),
        ]);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $data = $request->validated();
        $payment = $this->cashbox->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($payment)]);
    }

    public function mass_store(MassCreateRequest $request): JsonResponse
    {
        $data = $request->validated();
        $payments = $this->cashbox->mass_create($data);
        return response()->json(['success' => true, 'data' => DefaultResource::collection($payments)]);
    }

    public function show(int $id): JsonResponse
    {
        $payment = $this->cashbox->getById($id);
        return response()->json(['success' => true, 'data' => new DefaultResource($payment)]);
    }

    public function update(UpdateRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();
        $payment = $this->cashbox->getById($id);
        $payment->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($payment)]);
    }

    public function destroy(int $id): JsonResponse
    {
        $is_deleted = $this->cashbox->deleteById($id);
        return response()->json(['success' => $is_deleted]);
    }

    public function get_current_balance(): JsonResponse
    {
        $payments = $this->cashbox->get_for_balance();
        return response()->json(['success' => true, 'data' => new BalanceResource($payments)]);
    }

    public function collect_payments(CollectPaymentsRequest $request): JsonResponse
    {
        $payment_ids = $request->validated()['ids'];
        $this->cashbox->collect_payments($payment_ids);
        return response()->json(['success' => true]);
    }

    public function get_collection_history(): JsonResponse
    {
        $payments = $this->cashbox->get_collection_history();
        return response()->json(['success' => true, 'data' => new HistoryCollection($payments)]);
    }

    public function get_payments_from_history(PaymentsFromHistoryRequest $request): JsonResponse
    {
        $collected_at = $request->validated()['collected_at'];
        $payments = $this->cashbox->get_payments_from_history($collected_at);
        return response()->json(['success' => true, 'data' => IndexResource::collection($payments)]);
    }
}
