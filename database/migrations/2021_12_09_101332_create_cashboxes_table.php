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
            $table->enum('resource', ['_product', '_group'])->default('_product');
            $table->unsignedBigInteger('resource_id')->nullable();
            $table->enum('transaction_type', ['_in', '_out'])->default('_in');
            $table->enum('payment_type', ['_cash', '_card'])->default('_cash');
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
