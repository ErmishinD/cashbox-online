<?php

namespace App\Http\Controllers\Api;

use App\Filters\WriteOffFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PaginateRequest;
use App\Http\Resources\Api\WriteOff\IndexResource;
use App\Http\Resources\Api\WriteOff\ShowCollection;
use App\Models\WriteOff;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WriteOffController extends Controller
{
    public function get_paginated(PaginateRequest $request, WriteOffFilter $filters): JsonResponse
    {
        $this->authorize('WriteOff_access');

        $paginate_data = $request->validated();
        $write_offs = WriteOff::query()
            ->with([
                'storage' => function ($query) {
                    $query->withTrashed();
                },
                'user' => function ($query) {
                    $query->withTrashed();
                },
                'product_type' => function ($query) {
                    $query->with(['main_measure_type'])->withTrashed();
                }
            ])
            ->filter($filters)
            ->paginate($paginate_data['per_page'], ['*'], 'page', $paginate_data['page']);

        return response()->json([
            'success' => true,
            'pagination' => [
                'data' => IndexResource::collection($write_offs),
                'current_page' => $write_offs->currentPage(),
                'last_page' => $write_offs->lastPage(),
                'per_page' => $write_offs->perPage(),
                'total' => $write_offs->total(),
            ]
        ]);
    }

    public function show(WriteOff $write_off)
    {
        $this->authorize('WriteOff_show');

        $write_off->load([
            'storage' => function ($query) {
                $query->withTrashed();
            },
            'user' => function ($query) {
                $query->withTrashed();
            },
            'product_type' => function ($query) {
                $query->with(['main_measure_type'])->withTrashed();
            },
            'write_offs' => function ($query) {
                $query->with(['product_type' => function ($q) {
                    $q->with('main_measure_type')->withTrashed();
                }]);
            }
        ]);

        $all_write_offs = collect([$write_off]);
        if ($write_off->write_offs->isNotEmpty()) {
            $all_write_offs = $all_write_offs->concat($write_off->write_offs);
        }

        return new ShowCollection($all_write_offs);
    }
}
