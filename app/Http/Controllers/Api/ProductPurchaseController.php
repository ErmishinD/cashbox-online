<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductPurchase\CreateRequest;
use App\Http\Requests\Api\ProductPurchase\UpdateRequest;
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
//        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $this->middleware(['can:ProductPurchase_access']);

        $product_purchases = $this->product_purchase->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($product_purchases)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRequest $request)
    {
        $this->middleware(['can:ProductPurchase_create']);

        $data = $request->validated();
        $product_purchase = $this->product_purchase->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($product_purchase)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $this->middleware(['can:ProductPurchase_show']);

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
        $this->middleware(['can:ProductPurchase_edit']);

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
        $this->middleware(['can:ProductPurchase_delete']);

        $product_purchase = $this->product_purchase->getById($id);
        if ($product_purchase) {
            $product_purchase->delete();
        }
        return response()->json(['success' => true]);
    }
}
