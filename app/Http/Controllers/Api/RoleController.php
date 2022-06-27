<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Role\CreateRequest;
use App\Http\Requests\Api\Role\UpdateRequest;
use App\Http\Resources\Api\Role\DefaultResource;
use App\Http\Resources\Api\Role\IndexResource;
use App\Models\Role;
use App\Repositories\RoleRepository;
use Illuminate\Http\JsonResponse;

/**
 * @authenticated
 * @group Role management
 */
class RoleController extends Controller
{
    private $role;

    public function __construct()
    {
        $this->role = app(RoleRepository::class);
    }

    public function index(): JsonResponse
    {
        $this->authorize('Role_access');

        $roles = $this->role->getWithUsersCount();
        return response()->json(['success' => true, 'data' => IndexResource::collection($roles)]);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $this->authorize('Role_create');

        $data = $request->validated();
        $role = $this->role->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($role)], 201);
    }

    public function show(Role $role): JsonResponse
    {
        $this->authorize('Role_show');

        $role->load(['permissions' => function ($query) {
            $query->select('id');
        }]);
        return response()->json(['success' => true, 'data' => new DefaultResource($role)]);
    }

    public function update(UpdateRequest $request, Role $role): JsonResponse
    {
        $this->authorize('Role_edit');

        $data = $request->validated();
        $role = $this->role->update($role, $data);
        return response()->json(['success' => true, 'data' => new DefaultResource($role)], 202);
    }

    public function destroy(Role $role): JsonResponse
    {
        $this->authorize('Role_delete');

        if ($role->users->isEmpty()) {
            $role->delete();
            return response()->json(['success' => true], 202);
        }

        return response()->json(['success' => false, 'message' => 'Role has at least one user'], 409);
    }
}
