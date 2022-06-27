<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SellProductGroup\CreateRequest;
use App\Http\Requests\Api\SellProductGroup\UpdateRequest;
use App\Http\Resources\Api\SellProductGroup\DefaultResource;
use App\Models\SellProductGroup;
use App\Repositories\SellProductGroupRepository;
use App\Services\UploadFileService;
use Illuminate\Http\JsonResponse;

/**
 * @authenticated
 * @group Sell Product Group management
 */
class SellProductGroupController extends Controller
{
    /**
     * @var SellProductGroupRepository
     */
    private $sell_product_group;

    public function __construct()
    {
        $this->sell_product_group = app(SellProductGroupRepository::class);
    }

    public function index(): JsonResponse
    {
        $this->authorize('SellProductGroup_access');

        $sell_product_groups = $this->sell_product_group->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($sell_product_groups)]);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $this->authorize('SellProductGroup_create');

        $data = $request->validated();

        $sell_product_group = $this->sell_product_group->create($data);

        return response()->json(['success' => true, 'data' => new DefaultResource($sell_product_group)]);
    }

    public function show(SellProductGroup $sell_product_group): JsonResponse
    {
        $this->authorize('SellProductGroup_show');

        return response()->json(['success' => true, 'data' => new DefaultResource($sell_product_group)]);
    }

    public function update(UpdateRequest $request, SellProductGroup $sell_product_group): JsonResponse
    {
        $this->authorize('SellProductGroup_edit');

        $data = $request->validated();

        $sell_product_group->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($sell_product_group)]);
    }

    public function destroy(SellProductGroup $sell_product_group): JsonResponse
    {
        $this->authorize('SellProductGroup_delete');

        $sell_product_group->delete();
        return response()->json(['success' => true]);
    }
}
