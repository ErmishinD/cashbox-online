<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashboxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('shop_id')->constrained('shops');
            $table->enum('resource', ['_in', '_out'])->default('_in');
            $table->enum('type', ['_cash', '_card'])->default('_cash');
            $table->foreignId('sell_product_id')->nullable()->constrained('sell_products');
            $table->unsignedDecimal('amount');
            $table->text('description')->nullable();
            $table->foreignId('operator_id')->constrained('users');
            $table->dateTime('collected_at')->nullable();
            $table->foreignId('collector_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('cashboxes');
    }
}
