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
        $tables_with_photo_field = ['product_types', 'sell_products', 'sell_product_groups'];
        foreach ($tables_with_photo_field as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('photo');
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
