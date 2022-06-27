<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BaseMeasureType\CreateRequest;
use App\Http\Requests\Api\BaseMeasureType\UpdateRequest;
use App\Http\Resources\Api\BaseMeasureType\DefaultResource;
use App\Repositories\BaseMeasureTypeRepository;

/**
 * @authenticated
 * @group Base Measure Type management
 */
class BaseMeasureTypeController extends Controller
{
    /**
     * @var BaseMeasureTypeRepository
     */
    private $base_measure;

    public function __construct()
    {
        $this->base_measure = app(BaseMeasureTypeRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $base_measure_types = $this->base_measure->all();
        return response()->json([
            'success' => true, 'data' => DefaultResource::collection($base_measure_types)
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
        $base_measure_type = $this->base_measure->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($base_measure_type)]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $base_measure_type = $this->base_measure->getById($id);
        return response()->json(['success' => true, 'data' => new DefaultResource($base_measure_type)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $base_measure_type = $this->base_measure->getById($id);
        $base_measure_type->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($base_measure_type)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $base_measure_type = $this->base_measure->getById($id);
        if ($base_measure_type) {
            $base_measure_type->delete();
        }
        return response()->json(['success' => true]);
    }
}
