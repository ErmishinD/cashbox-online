<?php

namespace App\Http\Controllers\Api;

use App\Filters\ProductTypeFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PaginateRequest;
use App\Http\Requests\Api\ProductType\CreateRequest;
use App\Http\Requests\Api\ProductType\RemoveMeasureTypesRequest;
use App\Http\Requests\Api\ProductType\UpdateRequest;
use App\Http\Resources\Api\ProductType\DefaultResource;
use App\Http\Resources\Api\ProductType\ShowResource;
use App\Http\Resources\Api\ProductType\WithMeasureTypesResource;
use App\Models\ProductType;
use App\Repositories\ProductTypeRepository;
use Illuminate\Http\JsonResponse;

class ProductTypeController extends Controller
{
    /**
     * @var ProductTypeRepository
     */
    private $product_type;

    public function __construct()
    {
        $this->product_type = app(ProductTypeRepository::class);
    }

    public function index(): JsonResponse
    {
        $this->authorize('ProductType_access');

        return response()->json(['success' => false, 'message' => 'method is deprecated']);
    }

    public function get_paginated(PaginateRequest $request, ProductTypeFilter $filters): JsonResponse
    {
        $this->authorize('ProductType_access');

        $paginate_data = $request->validated();
        $product_types = $this->product_type->get_paginated($paginate_data, $filters);

        return response()->json([
            'success' => true,
            'pagination' => [
                'data' => DefaultResource::collection($product_types),
                'current_page' => $product_types->currentPage(),
                'last_page' => $product_types->lastPage(),
                'per_page' => $product_types->perPage(),
                'total' => $product_types->total(),
            ]
        ]);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $this->authorize('ProductType_create');

        $data = $request->validated();

        $product_type = $this->product_type->create($data);

        return response()->json(['success' => true, 'data' => new ShowResource($product_type)]);
    }

    public function show(ProductType $product_type): JsonResponse
    {
        $this->authorize('ProductType_create');

        $product_type->load(['measure_types', 'sell_products', 'media']);
        return response()->json(['success' => true, 'data' => new ShowResource($product_type)]);
    }

    public function update(UpdateRequest $request, ProductType $product_type): JsonResponse
    {
        $this->authorize('ProductType_edit');

        $data = $request->validated();

        $product_type = $this->product_type->update($product_type, $data);

        return response()->json(['success' => true, 'data' => new ShowResource($product_type)]);
    }

    public function destroy(ProductType $product_type): JsonResponse
    {
        $this->authorize('ProductType_delete');

        $product_type->delete();
        return response()->json(['success' => true]);
    }

    public function remove_measure_types(RemoveMeasureTypesRequest $request): JsonResponse
    {
        $this->authorize('ProductType_edit');

        $data = $request->validated();
        $this->product_type->remove_measure_types($data);
        return response()->json(['success' => true]);
    }

    public function getForPurchase(PaginateRequest $request, ProductTypeFilter $filters): JsonResponse
    {
        $paginate_data = $request->validated();
        $product_types = $this->product_type->getForSelect($filters);

        $product_types = $product_types->paginate($paginate_data['per_page'], $paginate_data['page']);

        return response()->json([
            'success' => true,
            'pagination' => [
                'data' => WithMeasureTypesResource::collection($product_types->items()),
                'current_page' => $product_types->currentPage(),
                'last_page' => $product_types->lastPage(),
                'per_page' => $product_types->perPage(),
                'total' => $product_types->total(),
            ]
        ]);
    }

    public function getTypesForSelect(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => array_values(ProductType::TYPES)
        ]);
    }

    public function getForSellProduct(): JsonResponse
    {
        $product_types = $this->product_type->getForSelect();
        return response()->json([
            'success' => true,
            'data' => WithMeasureTypesResource::collection($product_types)
        ]);
    }
}
