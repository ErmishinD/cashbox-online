<?php

namespace App\Http\Controllers\Api;

use App\Filters\ProductTypeFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PaginateRequest;
use App\Http\Requests\Api\ProductType\CreateRequest;
use App\Http\Requests\Api\ProductType\RemoveMeasureTypesRequest;
use App\Http\Requests\Api\ProductType\UpdateRequest;
use App\Http\Resources\Api\ProductType\DefaultResource;
use App\Http\Resources\Api\ProductType\SelectForSellProductResource;
use App\Http\Resources\Api\ProductType\ShortInfoResource;
use App\Http\Resources\Api\ProductType\ShowResource;
use App\Http\Resources\Api\ProductType\WithMeasureTypesResource;
use App\Models\ProductType;
use App\Repositories\ProductTypeRepository;
use App\Services\ProductTypeService;
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

        $product_type->load([
            'measure_types', 'sell_products', 'media', 'main_measure_type', 'base_measure_type', 'category'
        ]);

        return response()->json(['success' => true, 'data' => new ShowResource($product_type)], 201);
    }

    public function show(ProductType $product_type): JsonResponse
    {
        $this->authorize('ProductType_create');

        $product_type->load([
            'measure_types', 'sell_products', 'media', 'main_measure_type', 'base_measure_type', 'category'
        ]);
        return response()->json(['success' => true, 'data' => new ShowResource($product_type)]);
    }

    public function update(UpdateRequest $request, ProductType $product_type): JsonResponse
    {
        $this->authorize('ProductType_edit');

        $data = $request->validated();

        $product_type = $this->product_type->update($product_type, $data);

        $product_type->load([
            'measure_types', 'sell_products', 'media', 'main_measure_type', 'base_measure_type', 'category'
        ]);

        return response()->json(['success' => true, 'data' => new ShowResource($product_type)], 202);
    }

    public function destroy(ProductType $product_type): JsonResponse
    {
        $this->authorize('ProductType_delete');

        if (!ProductTypeService::is_part_of_sell_products($product_type)) {
            $product_type->delete();
            return response()->json(['success' => true], 202);
        }
        return response()->json(['success' => false, 'message' => 'This product type is a part of sell products!'], 409);
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

    public function getForSelectForSellProduct(): JsonResponse
    {
        $product_types = $this->product_type->getForSelectForSellProduct();
        return response()->json([
            'success' => true,
            'data' => SelectForSellProductResource::collection($product_types)
        ]);
    }

    public function getShortInfo(ProductType $product_type): JsonResponse
    {
        $product_type->load('media', 'base_measure_type', 'main_measure_type');
        $product_type = ProductTypeService::prepare_measure_types($product_type);
        return response()->json(['success' => true, 'data' => new WithMeasureTypesResource($product_type)]);
    }
}
