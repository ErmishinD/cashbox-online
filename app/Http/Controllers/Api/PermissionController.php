<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Permission\IndexCollection;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Permission;

/**
 * @authenticated
 * @group Permission management
 */
class PermissionController extends Controller
{
    public function index(): JsonResponse
    {
        $permissions = Permission::select('id', 'name')->orderBy('id')->get();
        return response()->json([
            'success' => true, 'data' => new IndexCollection($permissions)
        ]);
    }

}
