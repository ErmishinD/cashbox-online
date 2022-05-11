<?php

namespace App\Http\Controllers\Api;

use App\Events\ProductPurchaseDeleted;
use App\Events\ProductPurchaseEdited;
use App\Events\ProductPurchaseMade;
use App\Filters\ProductPurchaseFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PaginateRequest;
use App\Http\Requests\Api\ProductPurchase\CreateRequest;
use App\Http\Requests\Api\ProductPurchase\MassCreateRequest;
use App\Http\Requests\Api\ProductPurchase\UpdateRequest;
use App\Http\Resources\Api\ProductPurchase\DefaultResource;
use App\Http\Resources\Api\ProductPurchase\ShowCollection;
use App\Http\Resources\Api\ProductPurchase\ShowResource;
use App\Http\Resources\Api\ProductPurchase\WithProductTypeResource;
use App\Models\ProductPurchase;
use App\Models\Storage;
use App\Repositories\ProductPurchaseRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ProductPurchaseController extends Controller
{
    /**
     * @var ProductPurchaseRepository
     */
    private $product_purchase;

    public function __construct()
    {
        $this->product_purchase = app(ProductPurchaseRepository::class);
    }

    public function index(): JsonResponse
    {
        $this->authorize('ProductPurchase_access');

        $product_purchases = $this->product_purchase->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($product_purchases)]);
    }

    public function get_paginated(PaginateRequest $request, ProductPurchaseFilter $filters): JsonResponse
    {
        $this->authorize('ProductPurchase_access');

        $paginate_data = $request->validated();
        $product_purchases = $this->product_purchase->get_paginated($paginate_data, $filters);

        return response()->json([
            'success' => true,
            'pagination' => [
                'data' => WithProductTypeResource::collection($product_purchases),
                'current_page' => $product_purchases->currentPage(),
                'last_page' => $product_purchases->lastPage(),
                'per_page' => $product_purchases->perPage(),
                'total' => $product_purchases->total(),
            ]
        ]);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $this->authorize('ProductPurchase_create');

        $data = $request->validated();
        $product_purchase = $this->product_purchase->create($data);

        $product_purchase->load('user');

        return response()->json(['success' => true, 'data' => new DefaultResource($product_purchase)], 201);
    }

    public function mass_store(MassCreateRequest $request): JsonResponse
    {
        $this->authorize('ProductPurchase_create');

        $data = $request->validated();
        $product_purchases = $this->product_purchase->mass_create($data);

        ProductPurchaseMade::dispatch($product_purchases, Auth::user());

        return response()->json(['success' => true, 'data' => DefaultResource::collection($product_purchases)], 201);
    }

    public function edit(ProductPurchase $product_purchase): JsonResponse
    {
        $storages = Storage::select('id', 'name')->get();

        $product_purchase->load([
            'user', 'storage', 'product_type.main_measure_type', 'product_purchases.product_type.main_measure_type'
        ]);
        return response()->json([
            'success' => true,
            'data' => new ShowResource($product_purchase),
            'storages' => \App\Http\Resources\Api\Storage\DefaultResource::collection($storages)
        ]);
    }

    public function show(ProductPurchase $product_purchase): JsonResponse
    {
        $this->authorize('ProductPurchase_show');

        $product_purchase->load([
            'user', 'storage', 'product_type.main_measure_type', 'product_purchases.product_type.main_measure_type'
        ]);

        $all_product_purchases = collect();
        $all_product_purchases->push($product_purchase);
        if ($product_purchase->product_purchases->isNotEmpty()) {
            $all_product_purchases = $all_product_purchases->concat($product_purchase->product_purchases);
        }

        return response()->json(['success' => true, 'data' => new ShowCollection($all_product_purchases)]);
    }

    public function update(UpdateRequest $request, ProductPurchase $product_purchase): JsonResponse
    {
        $this->authorize('ProductPurchase_edit');

        if ($product_purchase->quantity != $product_purchase->current_quantity) {
            return response()->json([
                'success' => false, 'message' => 'Someone has already used products from this purchase!'
            ], 409);
        }

        $data = $request->validated();
        $product_purchase->update($data);

        ProductPurchaseEdited::dispatch($product_purchase, Auth::user());

        $product_purchase->load('user');

        return response()->json(['success' => true, 'data' => new DefaultResource($product_purchase)], 202);
    }

    public function destroy(ProductPurchase $product_purchase): JsonResponse
    {
        $this->authorize('ProductPurchase_delete');

        if ($product_purchase->quantity == $product_purchase->current_quantity) {
            $product_purchase->delete();
            ProductPurchaseDeleted::dispatch($product_purchase, Auth::user());
            return response()->json(['success' => true], 202);
        }
        return response()->json([
            'success' => false, 'message' => 'Someone has already used products from this purchase!'
        ], 409);
    }
}
