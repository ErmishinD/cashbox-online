<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAs(User $user)
    {
        Auth::login($user);

        return redirect('/dashboard');
    }
}
