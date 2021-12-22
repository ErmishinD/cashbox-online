<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Shop\CreateRequest;
use App\Http\Requests\Api\Shop\UpdateRequest;
use App\Http\Resources\Api\Shop\DefaultResource;
use App\Repositories\ShopRepository;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $shops = $this->shop->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($shops)]);
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
        $shop = $this->shop->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($shop)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $shop = $this->shop->getById($id);
        return response()->json(['success' => true, 'data' => new DefaultResource($shop)]);
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
        $shop = $this->shop->getById($id);
        $shop->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($shop)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $shop = $this->shop->getById($id);
        if ($shop) {
            $shop->delete();
        }
        return response()->json(['success' => true]);
    }
}
