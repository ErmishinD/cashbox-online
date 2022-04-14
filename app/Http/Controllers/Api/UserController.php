<?php

namespace App\Http\Controllers\Api;

use App\Events\UserChangedShop;
use App\Events\UserCreated;
use App\Events\UserDeleted;
use App\Events\UserEdited;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\ChangeShopRequest;
use App\Http\Requests\Api\User\CreateRequest;
use App\Http\Requests\Api\User\UpdateRequest;
use App\Http\Resources\Api\User\DefaultResource;
use App\Http\Resources\Api\User\EmployeeResource;
use App\Models\Shop;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $users = $this->user->getWithRoles();
        return response()->json(['success' => true, 'data' => EmployeeResource::collection($users)]);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $this->authorize('User_create');

        $data = $request->validated();
        $user = $this->user->create($data);

        if (!Auth::user()->hasRole('Super Admin')) {
            UserCreated::dispatch($user, Auth::user());
        }

        return response()->json(['success' => true, 'data' => new EmployeeResource($user)]);
    }

    public function show(User $user): JsonResponse
    {
        $this->authorize('User_show');

        return response()->json(['success' => true, 'data' => new EmployeeResource($user)]);
    }

    public function update(UpdateRequest $request, User $user): JsonResponse
    {
        $this->authorize('User_edit');

        $data = $request->validated();
        $user = $this->user->update($user, $data);

        if (!Auth::user()->hasRole('Super Admin')) {
            UserEdited::dispatch($user, Auth::user());
        }

        return response()->json(['success' => true, 'data' => new EmployeeResource($user)]);
    }

    public function destroy(User $user): JsonResponse
    {
        $this->authorize('User_delete');

        $user->delete();

        if (!Auth::user()->hasRole('Super Admin')) {
            UserDeleted::dispatch($user, Auth::user());
        }

        return response()->json(['success' => true]);
    }

    public function changeShop(ChangeShopRequest $request): JsonResponse
    {
        $shop_id = $request->validated()['shop_id'];
        session()->put('shop_id', $shop_id);

        UserChangedShop::dispatch(Shop::find($shop_id), Auth::user());

        return response()->json(['success' => true]);
    }

    public function authorizeMainsUser(Request $request)
    {
        $data = decrypt($request->data);
        $user = User::firstOrCreate(
            ['username' => $data['username'], 'email' => $data['email']],
            ['company_id' => 1, 'password' => $data['password'], 'name' => $data['name']]
        );
        $user->assignRole(3);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
