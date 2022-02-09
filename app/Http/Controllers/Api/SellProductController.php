<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SellProduct\CreateRequest;
use App\Http\Requests\Api\SellProduct\UpdateRequest;
use App\Http\Resources\Api\SellProduct\DefaultResource;
use App\Http\Resources\Api\SellProduct\ShowResource;
use App\Repositories\SellProductRepository;

class SellProductController extends Controller
{
    /**
     * @var SellProductRepository
     */
    private $sell_product;

    public function __construct()
    {
        $this->sell_product = app(SellProductRepository::class);
        $this->middleware(['auth']);
        $this->middleware(['can:SellProduct_access'])->only(['index']);
        $this->middleware(['can:SellProduct_create'])->only(['store']);
        $this->middleware(['can:SellProduct_show'])->only(['show']);
        $this->middleware(['can:SellProduct_edit'])->only(['update']);
        $this->middleware(['can:SellProduct_delete'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sell_products = $this->sell_product->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($sell_products)]);
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
        $sell_product = $this->sell_product->create($data);
        return response()->json(['success' => true, 'data' => new ShowResource($sell_product)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $sell_product = $this->sell_product->getById($id);
        return response()->json(['success' => true, 'data' => new ShowResource($sell_product)]);
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
        $sell_product = $this->sell_product->getById($id);
        $sell_product->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($sell_product)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $sell_product = $this->sell_product->getById($id);
        if ($sell_product) {
            $sell_product->delete();
        }
        return response()->json(['success' => true]);
    }
}
