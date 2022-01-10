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

/*
 * Company
 */
Route::apiResource('companies', CompanyController::class);

/*
 * Shop
 */
Route::apiResource('shops', ShopController::class);

/*
 * Storage
 */
Route::apiResource('storages', StorageController::class);

/*
 * BaseMeasureType
 */
Route::apiResource('base_measure_types', BaseMeasureTypeController::class);

/*
 * MeasureType
 */
Route::apiResource('measure_types', MeasureTypeController::class);

/*
 * User
 */
Route::apiResource('users', UserController::class);

/*
 * ProductType
 */
Route::prefix('product_types')->group(function() {
    Route::post('remove_measure_types', [ProductTypeController::class, 'remove_measure_types']);
});
Route::apiResource('product_types', ProductTypeController::class);

/*
 * ProductPurchase
 */
Route::apiResource('product_purchases', ProductPurchaseController::class);

/*
 * SellProduct
 */
Route::apiResource('sell_products', SellProductController::class);

/*
 * SellProductGroup
 */
Route::apiResource('sell_product_groups', SellProductGroupController::class);

/*
 * Cashbox
 */
Route::apiResource('cashbox', CashboxController::class);

/*
 * Transfer
 */
Route::apiResource('transfers', TransferController::class);

