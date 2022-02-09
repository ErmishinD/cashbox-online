<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Storage\CreateRequest;
use App\Http\Requests\Api\Storage\UpdateRequest;
use App\Http\Resources\Api\Storage\DefaultResource;
use App\Http\Resources\Api\Storage\ShowResource;
use App\Repositories\StorageRepository;

class StorageController extends Controller
{
    /**
     * @var StorageRepository
     */
    private $storage;

    public function __construct()
    {
        $this->storage = app(StorageRepository::class);
        $this->middleware(['auth:sanctum']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $this->middleware(['can:Storage_access']);

        $storages = $this->storage->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($storages)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRequest $request)
    {
        $this->middleware(['can:Storage_create']);

        $data = $request->validated();
        $storage = $this->storage->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($storage)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $this->middleware(['can:Storage_show']);

        $storage = $this->storage->getForShow($id);
        return response()->json(['success' => true, 'data' => new ShowResource($storage)]);
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
        $this->middleware(['can:Storage_edit']);

        $data = $request->validated();
        $storage = $this->storage->getById($id);
        $storage->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($storage)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->middleware(['can:Storage_delete']);

        $storage = $this->storage->getById($id);
        if ($storage) {
            $storage->delete();
        }
        return response()->json(['success' => true]);
    }
}
