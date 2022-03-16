<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MeasureType\CreateRequest;
use App\Http\Requests\Api\MeasureType\GetByBaseMeasureTypeRequest;
use App\Http\Requests\Api\MeasureType\UpdateRequest;
use App\Http\Resources\Api\MeasureType\DefaultResource;
use App\Models\MeasureType;
use App\Repositories\MeasureTypeRepository;
use Illuminate\Http\JsonResponse;

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

    public function index(): JsonResponse
    {
        $this->authorize('MeasureType_access');

        $measure_types = $this->measure_type->get_for_index();
        return response()->json([
            'success' => true, 'data' => DefaultResource::collection($measure_types)
        ]);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $this->authorize('MeasureType_create');

        $data = $request->validated();
        $measure_type = $this->measure_type->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($measure_type)]);
    }

    public function show(MeasureType $measure_type): JsonResponse
    {
        $this->authorize('MeasureType_show');

        return response()->json(['success' => true, 'data' => new DefaultResource($measure_type)]);
    }

    public function update(UpdateRequest $request, MeasureType $measure_type): JsonResponse
    {
        $this->authorize('MeasureType_edit');

        $data = $request->validated();
        $measure_type->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($measure_type)]);
    }

    public function destroy(MeasureType $measure_type): JsonResponse
    {
        $this->authorize('MeasureType_delete');

        $measure_type->delete();
        return response()->json(['success' => true]);
    }

    public function getByBaseMeasureType(GetByBaseMeasureTypeRequest $request)
    {
        $base_measure_type_id = $request->validated()['base_measure_type_id'];
        $measure_types = $this->measure_type->get_by_base_measure_type($base_measure_type_id);
        return response()->json(['success' => true, 'data' => DefaultResource::collection($measure_types)]);
    }
}
