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
                'data' => DefaultResource::collection($product_purchases),
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

        return response()->json(['success' => true, 'data' => new DefaultResource($product_purchase)]);
    }

    public function update(UpdateRequest $request, ProductPurchase $product_purchase): JsonResponse
    {
        $this->authorize('ProductPurchase_edit');

        $data = $request->validated();
        $product_purchase->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($product_purchase)], 202);
    }

    public function destroy(ProductPurchase $product_purchase): JsonResponse
    {
        $this->authorize('ProductPurchase_delete');

        $product_purchase->delete();
        return response()->json(['success' => true], 202);
    }

    public function get_for_dashboard(DashboardRequest $request): JsonResponse
    {
        $data = $request->validated();
        $product_purchases_by_product_type = $this->product_purchase->getForDashboard($data['shop_id']);
        return response()->json(['success' => true, 'data' => new DashboardCollection($product_purchases_by_product_type)]);
    }
}
