<?php

namespace App\Http\Controllers\Api;

use App\Filters\ProductPurchaseFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PaginateRequest;
use App\Http\Requests\Api\ProductPurchase\CreateRequest;
use App\Http\Requests\Api\ProductPurchase\DashboardRequest;
use App\Http\Requests\Api\ProductPurchase\MassCreateRequest;
use App\Http\Requests\Api\ProductPurchase\UpdateRequest;
use App\Http\Resources\Api\ProductPurchase\DashboardCollection;
use App\Http\Resources\Api\ProductPurchase\DefaultResource;
use App\Http\Resources\Api\ProductPurchase\ShowCollection;
use App\Http\Resources\Api\ProductPurchase\WithProductTypeResource;
use App\Models\ProductPurchase;
use App\Repositories\ProductPurchaseRepository;
use Illuminate\Http\JsonResponse;

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
        return response()->json(['success' => true, 'data' => DefaultResource::collection($product_purchases)], 201);
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

        $data = $request->validated();
        $product_purchase->update($data);

        $product_purchase->load('user');

        return response()->json(['success' => true, 'data' => new DefaultResource($product_purchase)], 202);
    }

    public function destroy(ProductPurchase $product_purchase): JsonResponse
    {
        $this->authorize('ProductPurchase_delete');

        if ($product_purchase->quantity == $product_purchase->current_quantity) {
            $product_purchase->delete();
            return response()->json(['success' => true], 202);
        }
        return response()->json([
            'success' => false, 'message' => 'Someone has already used products from this purchase!'
        ], 409);
    }

    public function get_for_dashboard(DashboardRequest $request): JsonResponse
    {
        $data = $request->validated();
        $product_purchases_by_product_type = $this->product_purchase->getForDashboard($data['shop_id']);
        return response()->json(['success' => true, 'data' => new DashboardCollection($product_purchases_by_product_type)]);
    }
}
