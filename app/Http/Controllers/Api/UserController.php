<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\CreateRequest;
use App\Http\Requests\Api\User\UpdateRequest;
use App\Http\Resources\Api\User\DefaultResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $user;

    public function __construct()
    {
        $this->user = app(UserRepository::class);
    }

    public function index(): JsonResponse
    {
        $this->authorize('User_access');

        $users = $this->user->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($users)]);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $this->authorize('User_create');

        $data = $request->validated();
        $user = $this->user->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($user)]);
    }

    public function show(User $user): JsonResponse
    {
        $this->authorize('User_show');

        return response()->json(['success' => true, 'data' => new DefaultResource($user)]);
    }

    public function update(UpdateRequest $request, User $user): JsonResponse
    {
        $this->authorize('User_edit');

        $data = $request->validated();
        $user->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($user)]);
    }

    public function destroy(User $user): JsonResponse
    {
        $this->authorize('User_delete');

        $user->delete();
        return response()->json(['success' => true]);
    }
}
