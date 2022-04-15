<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_purchases', function (Blueprint $table) {
            $table->unsignedDecimal('current_cost')->after('cost')->default(0);
        });

        $purchases = \App\Models\ProductPurchase::all();
        foreach ($purchases as $purchase) {
            $current_cost = ($purchase->cost / $purchase->quantity) * $purchase->current_quantity;
            $purchase->update(['current_cost' => round($current_cost, 2)]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_purchases', function (Blueprint $table) {
            $table->dropColumn('current_cost');
        });
    }
};
