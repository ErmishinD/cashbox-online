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
        Schema::table('sell_products', function (Blueprint $table) {
            $table->unsignedBigInteger('position')->nullable();
        });

        $companies = \App\Models\Company::all();
        $sell_products = \App\Models\SellProduct::orderByDesc('id')->get();

        foreach ($companies as $company) {
            $i = 1;
            foreach ($sell_products->where('company_id', $company->id) as $sell_product) {
                $sell_product->position = $i;
                $sell_product->saveQuietly();
                $i++;
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sell_products', function (Blueprint $table) {
            $table->dropColumn('position');
        });
    }
};
