<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\CreateRequest;
use App\Http\Requests\Api\User\UpdateRequest;
use App\Http\Resources\Api\User\DefaultResource;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $user;

    public function __construct()
    {
        $this->user = app(UserRepository::class);
        $this->middleware(['auth:sanctum']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $this->middleware(['can:User_access']);

        $users = $this->user->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($users)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRequest $request)
    {
        $this->middleware(['can:User_create']);

        $data = $request->validated();
        $user = $this->user->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($user)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $this->middleware(['can:User_show']);

        $user = $this->user->getById($id);
        return response()->json(['success' => true, 'data' => new DefaultResource($user)]);
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
        $this->middleware(['can:User_edit']);

        $data = $request->validated();
        $user = $this->user->getById($id);
        $user->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($user)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->middleware(['can:User_delete']);

        $user = $this->user->getById($id);
        if ($user) {
            $user->delete();
        }
        return response()->json(['success' => true]);
    }
}
