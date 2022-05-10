<?php

namespace App\Http\Controllers\Api;

use App\Filters\SystemLogFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PaginateRequest;
use App\Http\Resources\Api\SystemLog\DefaultResource;
use App\Models\SystemLog;

class SystemLogController extends Controller
{
    public function get_paginated(PaginateRequest $request, SystemLogFilter $filters)
    {
        $this->authorize('Audit_access');

        $paginate_data = $request->validated();
        $system_logs = SystemLog::query()
            ->with(['loggable', 'user'])
            ->orderByDesc('created_at')
            ->filter($filters)
            ->paginate($paginate_data['per_page'], ['*'], 'page', $paginate_data['page']);

        return response()->json([
            'success' => true,
            'pagination' => [
                'data' => DefaultResource::collection($system_logs),
                'current_page' => $system_logs->currentPage(),
                'last_page' => $system_logs->lastPage(),
                'per_page' => $system_logs->perPage(),
                'total' => $system_logs->total(),
            ]
        ]);
    }
}
