<?php

namespace App\Http\Controllers\Api;

use App\Events\StorageCreated;
use App\Events\StorageDeleted;
use App\Events\StorageEdited;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GetByCompanyRequest;
use App\Http\Requests\Api\Storage\CreateRequest;
use App\Http\Requests\Api\Storage\UpdateRequest;
use App\Http\Resources\Api\Shop\WithStoragesResource;
use App\Http\Resources\Api\Storage\DefaultResource;
use App\Http\Resources\Api\Storage\ShowResource;
use App\Models\ProductPurchase;
use App\Models\Storage;
use App\Repositories\StorageRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class StorageController extends Controller
{
    /**
     * @var StorageRepository
     */
    private $storage;

    public function __construct()
    {
        $this->storage = app(StorageRepository::class);
    }

    public function index(): JsonResponse
    {
        $this->authorize('Storage_access');

        $storages = $this->storage->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($storages)]);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $this->authorize('Storage_create');

        $data = $request->validated();
        $storage = $this->storage->create($data);

        StorageCreated::dispatch($storage, Auth::user());

        return response()->json(['success' => true, 'data' => new DefaultResource($storage)], 201);
    }

    public function show(int $id): JsonResponse
    {
        $this->authorize('Storage_show');

        $storage = $this->storage->getWithProductTypes($id);
        return response()->json(['success' => true, 'data' => new ShowResource($storage)]);
    }

    public function update(UpdateRequest $request, Storage $storage): JsonResponse
    {
        $this->authorize('Storage_edit');

        $data = $request->validated();
        $storage->update($data);

        StorageEdited::dispatch($storage, Auth::user());

        return response()->json(['success' => true, 'data' => new DefaultResource($storage)], 202);
    }

    public function destroy(Storage $storage): JsonResponse
    {
        $this->authorize('Storage_delete');

        $product_purchases = ProductPurchase::where('storage_id', $storage->id)->where('current_quantity', '>', 0)->count();
        if ($product_purchases > 0) {
            return response()->json(['success' => false, 'message' => 'There are products in storage'], 409);
        }

        $storage->delete();

        StorageDeleted::dispatch($storage, Auth::user());

        return response()->json(['success' => true], 202);
    }

    public function getByCompany(GetByCompanyRequest $request): JsonResponse
    {
        $data = $request->validated();
        $company_id = $data['company_id'];
        $shops_with_storages = $this->storage->getForSelect($company_id);
        return response()->json(['success' => true, 'data' => WithStoragesResource::collection($shops_with_storages)]);
    }
}
