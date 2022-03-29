<?php

namespace App\Http\Controllers\Api;

use App\Filters\SellProductFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PaginateRequest;
use App\Http\Requests\Api\SellProduct\CreateRequest;
use App\Http\Requests\Api\SellProduct\RemoveProductTypesRequest;
use App\Http\Requests\Api\SellProduct\UpdateRequest;
use App\Http\Resources\Api\SellProduct\EditResource;
use App\Http\Resources\Api\SellProduct\IndexResource;
use App\Http\Resources\Api\SellProduct\ShowResource;
use App\Models\SellProduct;
use App\Repositories\SellProductRepository;
use App\Services\ProductTypeService;
use App\Services\UploadFileService;
use Illuminate\Http\JsonResponse;

class SellProductController extends Controller
{
    /**
     * @var SellProductRepository
     */
    private $sell_product;

    public function __construct()
    {
        $this->sell_product = app(SellProductRepository::class);
    }

    public function index(): JsonResponse
    {
        $this->authorize('SellProduct_access');

        $sell_products = $this->sell_product->all();
        return response()->json(['success' => true, 'data' => IndexResource::collection($sell_products)]);
    }

    public function get_paginated(PaginateRequest $request, SellProductFilter $filters): JsonResponse
    {
        $this->authorize('SellProduct_access');

        $paginate_data = $request->validated();
        $sell_products = $this->sell_product->get_paginated($paginate_data, $filters);

        return response()->json([
            'success' => true,
            'pagination' => [
                'data' => IndexResource::collection($sell_products),
                'current_page' => $sell_products->currentPage(),
                'last_page' => $sell_products->lastPage(),
                'per_page' => $sell_products->perPage(),
                'total' => $sell_products->total(),
            ]
        ]);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $this->authorize('SellProduct_create');

        $data = $request->validated();

        $sell_product = $this->sell_product->create($data);

        return response()->json(['success' => true, 'data' => new ShowResource($sell_product)]);
    }

    public function show(SellProduct $sell_product): JsonResponse
    {
        $this->authorize('SellProduct_show');

        $sell_product->load(['media', 'product_types' => function($query) {
            $query->with(['main_measure_type', 'measure_types', 'base_measure_types']);
        }]);
        foreach ($sell_product->product_types as $product_type) {
            $product_type = ProductTypeService::prepare_measure_types($product_type);
        }
        return response()->json(['success' => true, 'data' => new ShowResource($sell_product)]);
    }

    public function update(UpdateRequest $request, SellProduct $sell_product): JsonResponse
    {
        $this->authorize('SellProduct_edit');

        $data = $request->validated();

        $sell_product = $this->sell_product->update($sell_product, $data);
        return response()->json(['success' => true, 'data' => new EditResource($sell_product)]);
    }

    public function destroy(SellProduct $sell_product): JsonResponse
    {
        $this->authorize('SellProduct_delete');

        $sell_product->delete();
        return response()->json(['success' => true]);
    }

    public function remove_product_types(RemoveProductTypesRequest $request): JsonResponse
    {
        $this->authorize('SellProduct_edit');

        $data = $request->validated();
        $this->sell_product->remove_product_types($data);
        return response()->json(['success' => true]);
    }
}
