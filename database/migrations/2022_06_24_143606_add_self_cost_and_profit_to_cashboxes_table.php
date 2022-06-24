<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cashboxes', function (Blueprint $table) {
            $table->unsignedDecimal('self_cost')->default(0);
            $table->Decimal('profit')->default(0);
        });

        $transactions = \App\Models\Cashbox::withoutGlobalScopes()->get();
        foreach ($transactions as $transaction) {
            $self_cost = 0;
            if ($transaction->data) {
                foreach (json_decode($transaction->data, true) as $product_type_id => $data) {
                    foreach ($data as $purchase) {
                        $self_cost += $purchase['cost'];
                    }
                }
            }
            $transaction->self_cost = $self_cost;
            $transaction->profit = $transaction->amount - $self_cost;
            $transaction->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cashboxes', function (Blueprint $table) {
            //
        });
    }
};
