<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login-as/{user}', [\App\Http\Controllers\Admin\AdminController::class, 'loginAs']);

require __DIR__.'/auth.php';

Route::view('/{any?}', 'dashboard')
    ->name('dashboard')
    ->where('any', '.*');
