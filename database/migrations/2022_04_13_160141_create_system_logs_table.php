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
        Schema::create('system_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable()->constrained();
            $table->string('action');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('loggable_type')->nullable();
            $table->unsignedBigInteger('loggable_id')->nullable();
            $table->timestamps();
        });

        // create permission
        \Spatie\Permission\Models\Permission::create(['name' => 'Audit_access']);

        // add this permission to director's roles
        $companyIds = \App\Models\Company::pluck('id');
        foreach ($companyIds as $companyId) {
            $role = \App\Models\Role::where('company_id', $companyId)->first();
            $role->givePermissionTo('Audit_access');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_logs');
    }
};
