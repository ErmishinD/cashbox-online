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

Route::get('test', function () {
    $storages = \App\Models\Storage::get();
    foreach ($storages as $storage) {
        dump($storage->name);
        $product_types_query = \App\Models\ProductType::query()
            ->with(['media', 'main_measure_type'])
            ->withSum(['product_purchases' => function ($query) use ($storage) {
                $query
                    ->where('storage_id', $storage->id)
                    ->where(function ($q) {
                        $q->whereNull('expiration_date')
                            ->orWhere('expiration_date', '>', now());
                    });
            }], 'current_quantity')
            ->havingRaw('((product_purchases_sum_current_quantity - product_types.warning_threshold) is NULL) OR (product_purchases_sum_current_quantity - product_types.warning_threshold) < 0')
            ->orderByRaw('(product_purchases_sum_current_quantity - product_types.warning_threshold) ASC')
            ->get()
            ->dump();
    }
});

Route::get('test-2', function () {
    $transactions = \App\Models\Cashbox::query()
        ->with('sell_product')
        ->notCollected()
        ->get()
        ->each(function ($transaction) {
            $self_cost = 0;
            foreach (json_decode($transaction->data, true) as $product_type_id => $data) {
                foreach ($data as $purchase) {
                    $self_cost += $purchase['cost'];
                }
            }
            $transaction->self_cost = $self_cost;
            $transaction->profit = $transaction->amount - $self_cost;
        })
        ->sortByDesc('self_cost');
    dd($transactions->first());
});

require __DIR__ . '/admin.php';

Route::get('login-from-mains', [UserController::class, 'authorizeMainsUser']);

Route::get('/', function () {
    return redirect(url('login'));
});

require __DIR__ . '/auth.php';

Route::get('/{vue_capture?}', function () {
    return view('dashboard');
})->where('vue_capture', '[\/\w\.-]*')->middleware(['auth'])->name('dashboard');
