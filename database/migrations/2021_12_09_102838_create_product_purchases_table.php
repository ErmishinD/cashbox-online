<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('storage_id')->constrained('storages');
            $table->foreignId('product_type_id')->constrained('product_types');
            $table->foreignId('measure_type_id')->constrained('measure_types');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('current_quantity');
            $table->unsignedDecimal('cost');
            $table->dateTime('expiration_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_purchases');
    }
}
