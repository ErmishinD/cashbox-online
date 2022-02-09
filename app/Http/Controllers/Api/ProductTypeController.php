<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductType\CreateRequest;
use App\Http\Requests\Api\ProductType\RemoveMeasureTypesRequest;
use App\Http\Requests\Api\ProductType\UpdateRequest;
use App\Http\Resources\Api\ProductType\DefaultResource;
use App\Http\Resources\Api\ProductType\ShowResource;
use App\Repositories\ProductTypeRepository;

class ProductTypeController extends Controller
{
    /**
     * @var ProductTypeRepository
     */
    private $product_type;

    public function __construct()
    {
        $this->product_type = app(ProductTypeRepository::class);
//        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $this->middleware(['can:ProductType_access']);

        $product_types = $this->product_type->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($product_types)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRequest $request)
    {
        $this->middleware(['can:ProductType_create']);

        $data = $request->validated();
        $product_type = $this->product_type->create($data);
        return response()->json(['success' => true, 'data' => new ShowResource($product_type)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $this->middleware(['can:ProductType_show']);

        $product_type = $this->product_type->getWithMeasureTypes($id);
        return response()->json(['success' => true, 'data' => new ShowResource($product_type)]);
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
        $this->middleware(['can:ProductType_edit']);

        $data = $request->validated();
        $product_type = $this->product_type->update($id, $data);
        return response()->json(['success' => true, 'data' => new ShowResource($product_type)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->middleware(['can:ProductType_delete']);

        $product_type = $this->product_type->getById($id);
        if ($product_type) {
            $product_type->delete();
        }
        return response()->json(['success' => true]);
    }

    public function remove_measure_types(RemoveMeasureTypesRequest $request) {
        $this->middleware(['can:ProductType_edit']);

        $data = $request->validated();
        $this->product_type->remove_measure_types($data);
        return response()->json(['success' => true]);
    }
}
