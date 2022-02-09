<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Shop\CreateRequest;
use App\Http\Requests\Api\Shop\GetByCompanyRequest;
use App\Http\Requests\Api\Shop\UpdateRequest;
use App\Http\Resources\Api\Shop\DefaultResource;
use App\Http\Resources\Api\Shop\ForSelectResource;
use App\Http\Resources\Api\Shop\ShowResource;
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
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $this->middleware(['can:Shop_access']);

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
        $this->middleware(['can:Shop_create']);

        $data = $request->validated();
        $shop = $this->shop->create($data);
        return response()->json(['success' => true, 'data' => new ShowResource($shop)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $this->middleware(['can:Shop_show']);

        $shop = $this->shop->getForShow($id);
        return response()->json(['success' => true, 'data' => new ShowResource($shop)]);
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
        $this->middleware(['can:Shop_edit']);

        $data = $request->validated();
        $shop = $this->shop->update($id, $data);
        return response()->json(['success' => true, 'data' => new ShowResource($shop)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->middleware(['can:Shop_delete']);

        $shop = $this->shop->getById($id);
        if ($shop) {
            $shop->delete();
        }
        return response()->json(['success' => true]);
    }

    public function getByCompany(GetByCompanyRequest $request)
    {
        $data = $request->validated();
        $company_id = $data['company_id'];
        $shops = $this->shop->getForSelect($company_id);
        return response()->json(['success' => true, 'data' => ForSelectResource::collection($shops)]);
    }
}
