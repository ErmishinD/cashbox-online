<?php

namespace App\Http\Controllers\Api;

use App\Filters\ProductTypeFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductType\CreateRequest;
use App\Http\Requests\Api\ProductType\RemoveMeasureTypesRequest;
use App\Http\Requests\Api\ProductType\UpdateRequest;
use App\Http\Resources\Api\ProductType\DefaultResource;
use App\Http\Resources\Api\ProductType\ShowResource;
use App\Models\ProductType;
use App\Repositories\ProductTypeRepository;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * @var ProductTypeRepository
     */
    private $product_type;

    public function __construct()
    {
        $this->product_type = app(ProductTypeRepository::class);
        $this->middleware(['auth']);
        $this->middleware(['can:ProductType_access'])->only(['index']);
        $this->middleware(['can:ProductType_create'])->only(['store']);
        $this->middleware(['can:ProductType_show'])->only(['show']);
        $this->middleware(['can:ProductType_edit'])->only(['update', 'remove_measure_types']);
        $this->middleware(['can:ProductType_delete'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return response()->json(['success' => false, 'message' => 'method is deprecated']);
    }

    public function get_paginated(Request $request, ProductTypeFilter $filters)
    {
        $per_page = $request->get('perPage') ?? 10;
        $page = $request->get('page') ?? 1;
        $product_types = ProductType::filter($filters)->paginate($per_page, ['*'], 'page', $page);

        return response()->json([
            'success' => true,
            'data' => $product_types,
            'pagination' => [
                'data' => DefaultResource::collection($product_types),
                'current_page' => $product_types->currentPage(),
                'last_page' => $product_types->lastPage(),
                'per_page' => $product_types->perPage(),
                'total' => $product_types->total(),
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
        $product_type = $this->product_type->getForShow($id);
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
        $product_type = $this->product_type->getById($id);
        if ($product_type) {
            $product_type->delete();
        }
        return response()->json(['success' => true]);
    }

    public function remove_measure_types(RemoveMeasureTypesRequest $request) {
        $data = $request->validated();
        $this->product_type->remove_measure_types($data);
        return response()->json(['success' => true]);
    }
}
