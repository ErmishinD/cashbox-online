<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SellProductProductGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_product_product_group', function (Blueprint $table) {
            $table->foreignId('sell_product_group_id')->constrained('sell_product_groups')->onDelete('cascade');
            $table->foreignId('sell_product_id')->constrained('sell_products')->onDelete('cascade');
            $table->decimal('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_product_product_group');
    }
}
