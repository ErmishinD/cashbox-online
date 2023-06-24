<?php

use App\Http\Controllers\Api\BaseMeasureTypeController;
use App\Http\Controllers\Api\CashboxController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CounterpartyController;
use App\Http\Controllers\Api\ExternalSaleController;
use App\Http\Controllers\Api\FileUploadController;
use App\Http\Controllers\Api\GetForSelectController;
use App\Http\Controllers\Api\MeasureTypeController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ProductConsumptionController;
use App\Http\Controllers\Api\ProductPurchaseController;
use App\Http\Controllers\Api\ProductTypeController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\SellableController;
use App\Http\Controllers\Api\SellProductController;
use App\Http\Controllers\Api\SellProductGroupController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\StorageController;
use App\Http\Controllers\Api\SystemLogController;
use App\Http\Controllers\Api\TransferController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WriteOffController;
use App\Http\Middleware\VerifyExternalRequest;
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


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('get_for_select', GetForSelectController::class);

    Route::post('change_shop', [UserController::class, 'changeShop']);

    Route::post('file_upload', [FileUploadController::class, 'store']);

    /*
     * Company
     */
    Route::apiResource('companies', CompanyController::class)->only(['show', 'update']);

    /*
     * Shop
     */
    Route::prefix('shops')->group(function () {
        Route::post('get_by_company', [ShopController::class, 'getByCompany']);
    });
    Route::apiResource('shops', ShopController::class);

    /*
     * Storage
     */
    Route::prefix('storages')->group(function () {
        Route::post('get_for_purchase', [StorageController::class, 'getByCompany']);
        Route::post('get_balance', [StorageController::class, 'getBalance']);
        Route::post('write_off', [StorageController::class, 'write_off']);
        Route::post('transfer', [StorageController::class, 'transfer']);
    });
    Route::apiResource('storages', StorageController::class);

    /*
     * BaseMeasureType
     */
    Route::apiResource('base_measure_types', BaseMeasureTypeController::class);

    /*
     * MeasureType
     */
    Route::prefix('measure_types')->group(function () {
        Route::post('get_by_base_measure_type', [MeasureTypeController::class, 'getByBaseMeasureType']);
        Route::get('get_grouped_by_base', [MeasureTypeController::class, 'getGroupedByBaseMeasureType']);
    });
    Route::apiResource('measure_types', MeasureTypeController::class);

    /*
     * User
     */
    Route::apiResource('users', UserController::class);

    /*
     * Category
     */
    Route::prefix('categories')->group(function () {
       Route::get('get_for_select', [CategoryController::class, 'get_for_select']);
    });
    Route::apiResource('categories', CategoryController::class);

    /*
     * ProductType
     */
    Route::prefix('product_types')->group(function () {
        Route::post('get_paginated', [ProductTypeController::class, 'get_paginated']);
        Route::post('get_for_purchase', [ProductTypeController::class, 'getForPurchase']);
        Route::get('get_types', [ProductTypeController::class, 'getTypesForSelect']);
        Route::get('get_for_select', [ProductTypeController::class, 'getForSelectForSellProduct']);
        Route::get('get_short_info/{product_type}', [ProductTypeController::class, 'getShortInfo']);
        Route::post('get_current_quantity', [ProductTypeController::class, 'getCurrentQuantity']);
        Route::get('{id}/get_storages_quantity', [ProductTypeController::class, 'getQuantityGroupedByStorage']);
    });
    Route::apiResource('product_types', ProductTypeController::class);

    /*
     * ProductPurchase
     */
    Route::prefix('product_purchases')->group(function () {
        Route::post('mass_create', [ProductPurchaseController::class, 'mass_store']);
        Route::post('get_paginated', [ProductPurchaseController::class, 'get_paginated']);
        Route::get('{product_purchase}/get_for_edit', [ProductPurchaseController::class, 'edit']);
    });
    Route::apiResource('product_purchases', ProductPurchaseController::class);

    /*
     * Sellable (SellableProduct and SellableProductGroup)
     */
    Route::prefix('sellable')->group(function () {
        Route::post('get_paginated', [SellableController::class, 'get_paginated']);
    });

    /*
     * SellProduct
     */
    Route::prefix('sell_products')->group(function () {
        Route::post('get_paginated', [SellProductController::class, 'get_paginated']);
    });
    Route::apiResource('sell_products', SellProductController::class);

    /*
     * SellProductGroup
     */
    Route::apiResource('sell_product_groups', SellProductGroupController::class);

    /*
     * Cashbox
     */
    Route::prefix('cashbox')->group(function () {
        Route::post('mass_create', [CashboxController::class, 'mass_store']);
        Route::get('get_current_balance', [CashboxController::class, 'get_current_balance']);
        Route::post('collect', [CashboxController::class, 'collect_payments']);
        Route::get('collection_history', [CashboxController::class, 'get_collection_history']);
        Route::post('payments_from_history', [CashboxController::class, 'get_payments_from_history']);
    });
    Route::apiResource('cashbox', CashboxController::class);

    /*
     * External Sales
     */
    Route::post('external_sales/get_paginated', [ExternalSaleController::class, 'get_paginated']);
    Route::post('external_sales/get_paginated/history', [ExternalSaleController::class, 'get_history_paginated']);
    Route::delete('external_sales/{externalSale}', [ExternalSaleController::class, 'destroy']);
    Route::post('external_sales/{externalSale}/restore', [ExternalSaleController::class, 'restore']);

    /*
     * Transfer
     */
    Route::prefix('transfers')->group(function () {
        Route::post('get_paginated', [TransferController::class, 'get_paginated']);
        Route::get('/{transfer}', [TransferController::class, 'show']);
    });

    /*
     * Permission
     */
    Route::get('permissions', [PermissionController::class, 'index']);

    /*
     * Role
     */
    Route::apiResource('roles', RoleController::class);

    /*
     * SystemLog
     */
    Route::post('system_logs/get_paginated', [SystemLogController::class, 'get_paginated']);

    /*
     * WriteOff
     */
    Route::prefix('write_offs')->group(function () {
        Route::post('get_paginated', [WriteOffController::class, 'get_paginated']);
        Route::get('/{write_off}', [WriteOffController::class, 'show']);
        Route::delete('/{write_off}', [WriteOffController::class, 'destroy']);
    });

    /*
     * ProductConsumption
     */
    Route::prefix('product_consumptions')->group(function () {
        Route::post('get_paginated', [ProductConsumptionController::class, 'get_paginated']);
    });

    /*
     * Counterparty
     */
    Route::apiResource('counterparties', CounterpartyController::class);

    /*
     * Report
     */
    Route::prefix('reports')->group(function () {
        Route::get('warning_threshold', [ReportController::class, 'getWarningThresholdByStorages']);
        Route::get('warning_threshold/{storage_id}', [ReportController::class, 'getWarningThresholdInStorage']);

        Route::get('purchase_recommendations', [ReportController::class, 'getProductPurchaseRecommendations']);

        Route::get('profit', [ReportController::class, 'getProfit']);
        Route::get('profit_by_day', [ReportController::class, 'getProfitByDay']);
        Route::get('profit_by_category', [ReportController::class, 'getProfitByCategory']);

        Route::post('get_paginated_transactions', [ReportController::class, 'getPaginatedTransactions']);

        Route::get('popular_sell_products', [ReportController::class, 'getPopularSellProducts']);

        Route::get('product_consumptions_by_category/{product_type_id}', [ReportController::class, 'getConsumptionsByCategory']);

        Route::get('product_types_statistic', [ReportController::class, 'statsByProductType']);
    });
});

Route::prefix('external')->middleware(VerifyExternalRequest::class)->group(function () {
    Route::post('sale', [ExternalSaleController::class, 'store']);
    Route::delete('sale/{externalSale}', [ExternalSaleController::class, 'instantDelete']);
});
