<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\MeasureType;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\SellProduct;
use App\Models\SellProductGroup;
use App\Models\Shop;
use App\Models\Storage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BaseMeasureTypeSeeder::class,
            RolesPermissionsSeeder::class,
        ]);

        if (getenv('APP_ENV') == 'local') {
            $this->call([
                AdminDevSeeder::class,
                DummyDataSeeder::class,
            ]);
        }

    }
}
