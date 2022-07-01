<?php

namespace App\Http\Controllers\Api;

use App\Events\MoneyCollected;
use App\Events\OrderSold;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cashbox\CollectPaymentsRequest;
use App\Http\Requests\Api\Cashbox\CreateRequest;
use App\Http\Requests\Api\Cashbox\MassCreateRequest;
use App\Http\Requests\Api\Cashbox\PaymentsFromHistoryRequest;
use App\Http\Requests\Api\Cashbox\UpdateRequest;
use App\Http\Resources\Api\Cashbox\DefaultResource;
use App\Http\Resources\Api\Cashbox\HistoryCollection;
use App\Http\Resources\Api\Cashbox\IndexResource;
use App\Http\Resources\Api\Cashbox\BalanceResource;
use App\Http\Resources\Api\Cashbox\ShowCollection;
use App\Models\Cashbox;
use App\Repositories\CashboxRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @authenticated
 * @group Cashbox management
 */
class CashboxController extends Controller
{
    /**
     * @var CashboxRepository
     */
    private $cashbox;

    public function __construct()
    {
        $this->cashbox = app(CashboxRepository::class);
    }

    public function index(): JsonResponse
    {
        $this->authorize('Cashbox_access');

        $payments = $this->cashbox->get_not_collected();
        return response()->json([
            'success' => true,
            'data' => IndexResource::collection($payments),
            'balance' => new BalanceResource($payments),
        ]);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $this->authorize('Cashbox_create');

        $data = $request->validated();
        $payment = $this->cashbox->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($payment)], 201);
    }

    public function mass_store(MassCreateRequest $request): JsonResponse
    {
        $this->authorize('Cashbox_create');

        $data = $request->validated();
        $payments = $this->cashbox->mass_create($data);

        OrderSold::dispatch($payments, Auth::user());

        return response()->json(['success' => true, 'data' => DefaultResource::collection($payments)], 201);
    }

    public function show(Cashbox $cashbox): JsonResponse
    {
        $this->authorize('Cashbox_show');

        $cashbox->load(['sell_product', 'operator', 'collector', 'shop', 'payments.sell_product']);

        $all_payments = collect();
        $all_payments->push($cashbox);
        if ($cashbox->payments->isNotEmpty()) {
            $all_payments = $all_payments->concat($cashbox->payments);
        }

        return response()->json(['success' => true, 'data' => new ShowCollection($all_payments)]);
    }

    public function update(UpdateRequest $request, int $id): JsonResponse
    {
        $this->authorize('Cashbox_edit');

        $data = $request->validated();
        $payment = $this->cashbox->getById($id);
        $payment->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($payment)], 202);
    }

    public function destroy(Cashbox $cashbox): JsonResponse
    {
        $this->authorize('Cashbox_delete');

        $cashbox->load(['product_consumptions.product_purchase']);

        DB::transaction(function () use ($cashbox) {
            // before deleting payment - restore product types in storage
            foreach ($cashbox->product_consumptions as $product_consumption) {
                $product_consumption->product_purchase->current_quantity += $product_consumption->quantity;
                $product_consumption->product_purchase->current_cost += $product_consumption->cost;
                $product_consumption->product_purchase->save();
            }

            $cashbox->product_consumptions()->delete();
            $cashbox->delete();
        });

        return response()->json(['success' => true], 202);
    }

    public function get_current_balance(): JsonResponse
    {
        $this->authorize('Cashbox_access');

        $payments = $this->cashbox->get_for_balance();
        return response()->json(['success' => true, 'data' => new BalanceResource($payments)]);
    }

    public function collect_payments(CollectPaymentsRequest $request): JsonResponse
    {
        $this->authorize('Cashbox_collect');

        $payment_ids = $request->validated()['ids'];
        $this->cashbox->collect_payments($payment_ids);

        MoneyCollected::dispatch($payment_ids, Auth::user());

        return response()->json(['success' => true]);
    }

    public function get_collection_history(): JsonResponse
    {
        $this->authorize('Cashbox_history');

        $payments = $this->cashbox->get_collection_history();
        return response()->json(['success' => true, 'data' => new HistoryCollection($payments)]);
    }

    public function get_payments_from_history(PaymentsFromHistoryRequest $request): JsonResponse
    {
        $this->authorize('Cashbox_history');

        $collected_at = $request->validated()['collected_at'];
        $payments = $this->cashbox->get_payments_from_history($collected_at);
        return response()->json(['success' => true, 'data' => IndexResource::collection($payments)]);
    }
}
