<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAs(User $user)
    {
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
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
