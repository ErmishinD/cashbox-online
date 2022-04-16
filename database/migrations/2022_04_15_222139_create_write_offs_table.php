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
        Schema::create('write_offs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('storage_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('product_type_id')->constrained();
            $table->unsignedBigInteger('quantity');
            $table->foreignId('parent_id')->nullable()->references('id')->on('write_offs');
            $table->json('data')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // create permission
        \Spatie\Permission\Models\Permission::create(['name' => 'WriteOff_access']);

        // add this permission to director's roles
        $companyIds = \App\Models\Company::pluck('id');
        foreach ($companyIds as $companyId) {
            $role = \App\Models\Role::where('company_id', $companyId)->first();
            $role->givePermissionTo('WriteOff_access');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('write_offs');
    }
};
