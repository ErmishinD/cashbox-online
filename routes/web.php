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


Route::get('/', function () {
    return redirect(url('login'));
});

Route::get('/login-as/{user}', [\App\Http\Controllers\Admin\AdminController::class, 'loginAs']);

require __DIR__ . '/auth.php';

Route::get('/{vue_capture?}', function () {
    return view('dashboard');
})->where('vue_capture', '[\/\w\.-]*')->middleware(['auth'])->name('dashboard');
