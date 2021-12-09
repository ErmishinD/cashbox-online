<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasureTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measure_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_measure_type_id')->constrained('base_measure_types');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('quantity')->default(1);
            $table->foreignId('company_id')->constrained('companies');
            $table->boolean('is_common')->default(false);
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
        Schema::dropIfExists('measure_types');
    }
}
