<?php

namespace App\Http\Controllers\Api;

use App\Events\ShopCreated;
use App\Events\ShopDeleted;
use App\Events\ShopEdited;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GetByCompanyRequest;
use App\Http\Requests\Api\Shop\CreateRequest;
use App\Http\Requests\Api\Shop\UpdateRequest;
use App\Http\Resources\Api\Shop\DefaultResource;
use App\Http\Resources\Api\Shop\ForSelectResource;
use App\Http\Resources\Api\Shop\ShowResource;
use App\Models\Shop;
use App\Repositories\ShopRepository;
use App\Services\ShopService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

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

        ShopCreated::dispatch($shop, Auth::user());

        return response()->json(['success' => true, 'data' => new ShowResource($shop)], 201);
    }

    public function show(Shop $shop): JsonResponse
    {
        $this->authorize('Shop_show');

        $shop->load('storages');

        return response()->json(['success' => true, 'data' => new ShowResource($shop)]);
    }

    public function update(UpdateRequest $request, Shop $shop): JsonResponse
    {
        $this->authorize('Shop_edit');

        $data = $request->validated();
        $shop = $this->shop->update($shop, $data);

        ShopEdited::dispatch($shop, Auth::user());

        return response()->json(['success' => true, 'data' => new ShowResource($shop)], 202);
    }

    public function destroy(Shop $shop): JsonResponse
    {
        $this->authorize('Shop_delete');

        $shop->load('storages');

        if (!ShopService::has_products_in_storages($shop)) {
            $shop->delete();

            ShopDeleted::dispatch($shop, Auth::user());

            return response()->json(['success' => true], 202);
        }
        return response()->json(['success' => false, 'message' => 'There are products in this shop!'], 409);
    }

    public function getByCompany(GetByCompanyRequest $request): JsonResponse
    {
        $data = $request->validated();
        $company_id = $data['company_id'];
        $shops = $this->shop->getForSelect($company_id);
        return response()->json(['success' => true, 'data' => ForSelectResource::collection($shops)]);
    }
}
