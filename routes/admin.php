<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware('is_admin')->group(function () {
    Route::get('/login-as/{user}', [AdminController::class, 'loginAs']);

    Route::apiResource('companies', CompanyController::class);
});

