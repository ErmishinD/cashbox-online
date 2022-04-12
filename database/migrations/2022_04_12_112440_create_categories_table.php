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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('company_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });

        // create permissions
        $permissions = ['Category_access', 'Category_create', 'Category_show', 'Category_edit', 'Category_delete'];
        foreach ($permissions as $permission) {
            if (!\Spatie\Permission\Models\Permission::where('name', $permission)->first()) {
                \Spatie\Permission\Models\Permission::create(['name' => $permission]);
            }
        }

        // add these permissions to director's roles
        $companyIds = \App\Models\Company::pluck('id');
        foreach ($companyIds as $companyId) {
            $role = \App\Models\Role::where('company_id', $companyId)->first();
            $role->givePermissionTo($permissions);
        }


    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        \Spatie\Permission\Models\Permission::destroy([
            'Category_access', 'Category_create', 'Category_show', 'Category_edit', 'Category_delete'
        ]);
    }
};
