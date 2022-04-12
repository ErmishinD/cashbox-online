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
            $table->foreignId('user_id')->default(1)->constrained();
        });

        $companyIds = \App\Models\Company::pluck('id');
        foreach ($companyIds as $companyId) {
            $director = \App\Models\User::where('company_id', $companyId)->first();
            \App\Models\ProductPurchase::where('company_id', $companyId)->update(['user_id' => $director->id]);
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
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id']);
        });
    }
};
