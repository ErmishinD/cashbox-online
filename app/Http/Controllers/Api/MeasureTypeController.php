<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MeasureType\CreateRequest;
use App\Http\Requests\Api\MeasureType\GetByBaseMeasureTypeRequest;
use App\Http\Requests\Api\MeasureType\UpdateRequest;
use App\Http\Resources\Api\MeasureType\ByBaseMeasureTypeCollection;
use App\Http\Resources\Api\MeasureType\DefaultResource;
use App\Http\Resources\Api\MeasureType\IndexResource;
use App\Models\MeasureType;
use App\Repositories\MeasureTypeRepository;
use App\Services\MeasureTypeService;
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
            'success' => true, 'data' => IndexResource::collection($measure_types)
        ]);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $this->authorize('MeasureType_create');

        $data = $request->validated();
        $measure_type = $this->measure_type->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($measure_type)], 201);
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
        return response()->json(['success' => true, 'data' => new DefaultResource($measure_type)], 202);
    }

    public function destroy(MeasureType $measure_type): JsonResponse
    {
        $this->authorize('MeasureType_delete');
        if (!MeasureTypeService::is_main_for_any_product_type($measure_type)) {
            $measure_type->delete();
            return response()->json(['success' => true], 202);
        }
        return response()->json([
            'success' => false, 'message' => 'This measure type is main for at least one product type!'
        ], 409);
    }

    public function getByBaseMeasureType(GetByBaseMeasureTypeRequest $request): JsonResponse
    {
        $base_measure_type_id = $request->validated()['base_measure_type_id'];
        $measure_types = $this->measure_type->get_by_base_measure_type($base_measure_type_id);
        return response()->json(['success' => true, 'data' => DefaultResource::collection($measure_types)]);
    }

    public function getGroupedByBaseMeasureType(): JsonResponse
    {
        $measure_types = $this->measure_type->get_grouped_by_base_measure_type();
        return response()->json([
            'success' => true,
            'data' => new ByBaseMeasureTypeCollection($measure_types)
        ]);
    }
}
