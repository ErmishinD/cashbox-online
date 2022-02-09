<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SellProductGroup\CreateRequest;
use App\Http\Requests\Api\SellProductGroup\UpdateRequest;
use App\Http\Resources\Api\SellProductGroup\DefaultResource;
use App\Repositories\SellProductGroupRepository;

class SellProductGroupController extends Controller
{
    /**
     * @var SellProductGroupRepository
     */
    private $sell_product_group;

    public function __construct()
    {
        $this->sell_product_group = app(SellProductGroupRepository::class);
//        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $this->middleware(['can:SellProductGroup_access']);

        $sell_product_groups = $this->sell_product_group->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($sell_product_groups)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRequest $request)
    {
        $this->middleware(['can:SellProductGroup_create']);

        $data = $request->validated();
        $sell_product_group = $this->sell_product_group->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($sell_product_group)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $this->middleware(['can:SellProductGroup_show']);

        $sell_product_group = $this->sell_product_group->getById($id);
        return response()->json(['success' => true, 'data' => new DefaultResource($sell_product_group)]);
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
        $this->middleware(['can:SellProductGroup_edit']);

        $data = $request->validated();
        $sell_product_group = $this->sell_product_group->getById($id);
        $sell_product_group->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($sell_product_group)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->middleware(['can:SellProductGroup_delete']);

        $sell_product_group = $this->sell_product_group->getById($id);
        if ($sell_product_group) {
            $sell_product_group->delete();
        }
        return response()->json(['success' => true]);
    }
}
