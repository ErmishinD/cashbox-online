<?php

use App\Http\Controllers\Api\UserController;
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

require __DIR__ . '/admin.php';

Route::get('login-from-mains', [UserController::class, 'authorizeMainsUser']);

Route::get('/', function () {
    return redirect(url('login'));
});

require __DIR__ . '/auth.php';

Route::get('/{vue_capture?}', function () {
    return view('dashboard');
})->where('vue_capture', '[\/\w\.-]*')->middleware(['auth'])->name('dashboard');
