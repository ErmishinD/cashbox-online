<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        \Spatie\Permission\Models\Permission::create([
            'name' => 'Cashbox_viewOnlyMySales'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Spatie\Permission\Models\Permission::findByName('Cashbox_viewOnlyMySales')->delete();
    }
};
