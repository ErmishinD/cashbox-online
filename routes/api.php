<?php

use App\Http\Controllers\Api\BaseMeasureTypeController;
use App\Http\Controllers\Api\CashboxController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\MeasureTypeController;
use App\Http\Controllers\Api\ProductPurchaseController;
use App\Http\Controllers\Api\ProductTypeController;
use App\Http\Controllers\Api\SellProductController;
use App\Http\Controllers\Api\SellProductGroupController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\StorageController;
use App\Http\Controllers\Api\TransferController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'companies' => CompanyController::class,
    'shops' => ShopController::class,
    'storages' => StorageController::class,
    'base_measure_types' => BaseMeasureTypeController::class,
    'measure_types' => MeasureTypeController::class,
    'users' => UserController::class,
    'product_types' => ProductTypeController::class,
    'product_purchases' => ProductPurchaseController::class,
    'sell_products' => SellProductController::class,
    'sell_product_groups' => SellProductGroupController::class,
    'cashboxes' => CashboxController::class,
    'transfers' => TransferController::class,
]);
