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
use App\Repositories\ProductPurchaseRepository;

class ProductPurchaseController extends Controller
{
    /**
     * @var ProductPurchaseRepository
     */
    private $product_purchase;

    public function __construct()
    {
        $this->product_purchase = app(ProductPurchaseRepository::class);
        $this->middleware(['auth']);
        $this->middleware(['can:ProductPurchase_access'])->only(['index', 'get_paginated']);
        $this->middleware(['can:ProductPurchase_create'])->only(['store']);
        $this->middleware(['can:ProductPurchase_show'])->only(['show']);
        $this->middleware(['can:ProductPurchase_edit'])->only(['update']);
        $this->middleware(['can:ProductPurchase_delete'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $product_purchases = $this->product_purchase->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($product_purchases)]);
    }

    public function get_paginated(PaginateRequest $request, ProductPurchaseFilter $filters)
    {
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

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $product_purchase = $this->product_purchase->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($product_purchase)]);
    }

    public function mass_store(MassCreateRequest $request)
    {
        $data = $request->validated();
        $product_purchases = $this->product_purchase->mass_create($data);
        return response()->json(['success' => true, 'data' => DefaultResource::collection($product_purchases)]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $product_purchase = $this->product_purchase->getById($id);
        return response()->json(['success' => true, 'data' => new DefaultResource($product_purchase)]);
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
        $product_purchase = $this->product_purchase->getById($id);
        $product_purchase->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($product_purchase)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $product_purchase = $this->product_purchase->getById($id);
        if ($product_purchase) {
            $product_purchase->delete();
        }
        return response()->json(['success' => true]);
    }

    public function get_for_dashboard(DashboardRequest $request)
    {
        $data = $request->validated();
        $product_purchases_by_product_type = $this->product_purchase->getForDashboard($data['shop_id']);
        return response()->json(['success' => true, 'data' => new DashboardCollection($product_purchases_by_product_type)]);
    }
}
