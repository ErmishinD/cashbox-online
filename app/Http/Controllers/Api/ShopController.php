<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GetByCompanyRequest;
use App\Http\Requests\Api\Shop\CreateRequest;
use App\Http\Requests\Api\Shop\UpdateRequest;
use App\Http\Resources\Api\Shop\DefaultResource;
use App\Http\Resources\Api\Shop\ForSelectResource;
use App\Http\Resources\Api\Shop\ShowResource;
use App\Models\Shop;
use App\Repositories\ShopRepository;
use Illuminate\Http\JsonResponse;

class ShopController extends Controller
{
    /**
     * @var ShopRepository
     */
    private $shop;

    public function __construct()
    {
        $this->shop = app(ShopRepository::class);
    }

    public function index(): JsonResponse
    {
        $this->authorize('Shop_access');

        $shops = $this->shop->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($shops)]);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $this->authorize('Shop_create');

        $data = $request->validated();
        $shop = $this->shop->create($data);
        return response()->json(['success' => true, 'data' => new ShowResource($shop)]);
    }

    public function show(Shop $shop): JsonResponse
    {
        $this->authorize('Shop_show');

        return response()->json(['success' => true, 'data' => new ShowResource($shop)]);
    }

    public function update(UpdateRequest $request, Shop $shop): JsonResponse
    {
        $this->authorize('Shop_edit');

        $data = $request->validated();
        $shop = $this->shop->update($shop, $data);
        return response()->json(['success' => true, 'data' => new ShowResource($shop)]);
    }

    public function destroy(Shop $shop): JsonResponse
    {
        $this->authorize('Shop_delete');

        $shop->delete();
        return response()->json(['success' => true]);
    }

    public function getByCompany(GetByCompanyRequest $request): JsonResponse
    {
        $data = $request->validated();
        $company_id = $data['company_id'];
        $shops = $this->shop->getForSelect($company_id);
        return response()->json(['success' => true, 'data' => ForSelectResource::collection($shops)]);
    }
}
