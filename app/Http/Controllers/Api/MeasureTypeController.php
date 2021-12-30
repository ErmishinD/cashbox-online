<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MeasureType\CreateRequest;
use App\Http\Requests\Api\MeasureType\UpdateRequest;
use App\Http\Resources\Api\MeasureType\DefaultResource;
use App\Repositories\MeasureTypeRepository;

class MeasureTypeController extends Controller
{
    /**
     * @var MeasureTypeRepository
     */
    private $measure_type;

    public function __construct()
    {
        $this->measure_type = app(MeasureTypeRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $measure_types = $this->measure_type->all();
        return response()->json([
            'success' => true, 'data' => DefaultResource::collection($measure_types)
        ]);
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
        $measure_type = $this->measure_type->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($measure_type)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $base_measure_type = $this->measure_type->getById($id);
        return response()->json(['success' => true, 'data' => new DefaultResource($base_measure_type)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $measure_type = $this->measure_type->getById($id);
        $measure_type->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($measure_type)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $measure_type = $this->measure_type->getById($id);
        if ($measure_type) {
            $measure_type->delete();
        }
        return response()->json(['success' => true]);
    }
}
