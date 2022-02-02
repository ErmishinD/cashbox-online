<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends BaseController
{
    public function loginAs($id) {
        $user = User::find($id);
        Auth::login($user);
        return redirect('/dashboard');
    }
}
