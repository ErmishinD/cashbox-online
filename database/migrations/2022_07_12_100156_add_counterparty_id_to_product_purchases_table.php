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
        Schema::table('product_purchases', function (Blueprint $table) {
            $table->foreignId('counterparty_id')->nullable()->constrained()->nullOnDelete();
        });

        $companies = \App\Models\Company::all();
        $counterparty = \App\Models\Counterparty::all();
        foreach ($companies as $company) {
            \App\Models\ProductPurchase::where('company_id', $company->id)
                ->update([
                    'counterparty_id' => $counterparty->where('company_id', $company->id)->first()->id
                ]);
        }

        Schema::table('product_purchases', function (Blueprint $table) {
            $table->dropForeign(['counterparty_id']);
        });

        Schema::table('product_purchases', function (Blueprint $table) {
            $table->unsignedBigInteger('counterparty_id')->nullable(false)->change();
            $table->foreign('counterparty_id')->references('id')->on('counterparties')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_purchases', function (Blueprint $table) {
            $table->dropForeign(['counterparty_id']);
            $table->dropColumn('counterparty_id');
        });
    }
};
