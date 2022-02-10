<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\MeasureType;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\Role;
use App\Models\SellProduct;
use App\Models\SellProductGroup;
use App\Models\Shop;
use App\Models\Storage;
use App\Models\User;
use App\Repositories\RoleRepository;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // создать три компании
        $companies = Company::factory()
            ->count(3)
            ->create();

        // создать 7 магазнов, случайно распределенных по созданным компаниям
        //      при этом каждому магазину создать 1 склад
        $shops = Shop::factory()->count(7)
            ->has(Storage::factory()->count(1))
            ->create();

        // всем компаниям создать еденицы измерения "кг" и "л"
        foreach ($companies as $company) {
            MeasureType::create([
                'base_measure_type_id' => 1,
                'name' => 'л',
                'description' => 'литры',
                'quantity' => 1000,
                'company_id' => $company->id,
                'is_common' => true,
            ]);
            MeasureType::create([
                'base_measure_type_id' => 2,
                'name' => 'кг',
                'description' => 'киллограммы',
                'quantity' => 1000,
                'company_id' => $company->id,
                'is_common' => true,
            ]);
        }

        // одной компании создать единицы измерения "бутылка молока" и "пачка кофе"
        $random_company = $companies->random(1)->first();
        MeasureType::create([
            'base_measure_type_id' => 1,
            'name' => 'Бутылка молока',
            'description' => 'Бутылка молока 1,5л',
            'quantity' => 15000,
            'company_id' => $random_company->id,
            'is_common' => false,
        ]);
        MeasureType::create([
            'base_measure_type_id' => 2,
            'name' => 'Пачка кофе',
            'description' => 'Пачка кофе 3кг',
            'quantity' => 3000,
            'company_id' => $random_company->id,
            'is_common' => false,
        ]);
        MeasureType::create([
            'base_measure_type_id' => 3,
            'name' => 'Пачка стаканчиков',
            'description' => 'Пачка стаканчиков (500 шт)',
            'quantity' => 500,
            'company_id' => $random_company->id,
            'is_common' => false,
        ]);


        // создать продукты
        $product_types = ProductType::factory()->count(50)->create();

        // к каждому продукту добавить подходящие единицы измерения
        $all_measure_types = MeasureType::all();
        foreach ($product_types as $product_type) {
            $allowed_measure_types = $all_measure_types
                ->where('base_measure_type_id', $product_type->base_measure_type_id)
                ->where('company_id', $product_type->company_id)->pluck('id');
            $product_type->measure_types()->attach($allowed_measure_types);
        }

        // создать продукты для продажи
        $sell_products = SellProduct::factory()->count(40)->create();
        foreach ($sell_products as $sell_product) {
            $allowed_product_types = $product_types->where('company_id', $sell_product->company_id)->pluck('id');
            $sell_product->product_types()->attach(
                $allowed_product_types->random(),
                ['quantity' => random_int(100, 1000)]
            );
        }

        // добавить "составные" товары (для уже созданных товаров для продажи)
        $random_sell_products = $sell_products->random(5);
        foreach ($random_sell_products as $sell_product) {
            $allowed_product_types = $product_types->where('company_id', $sell_product->company_id)->pluck('id');
            $sell_product->product_types()->attach(
                $allowed_product_types->random(),
                ['quantity' => random_int(100, 1000)]
            );
        }

        // создать группы товаров для продажи
        $sell_groups = SellProductGroup::factory()->count(5)->create();
        foreach ($sell_groups as $sell_group) {
            $allowed_sell_products = $sell_products->where('company_id', $sell_group->company_id)->pluck('id');
            $products_amount = random_int(2, 5);
            for ($i=1; $i<=$products_amount; $i++) {
                $sell_group->products()->attach(
                    $allowed_sell_products->random(),
                    ['quantity' => random_int(100, 1000)]
                );
            }
        }

        // создание "закупок товаров"
        $random_shops = $shops->random(5);
        foreach ($random_shops as $shop) {
            $company_id = $shop->company_id;
            foreach ($shop->storages as $storage) {
                $allowed_product_types = $product_types->where('company_id', $company_id);
                for ($product_count = 0; $product_count < random_int(3, 30); $product_count++) {
                    $product_type = $allowed_product_types->random();
                    $allowed_measure_types = $all_measure_types
                        ->where('base_measure_type_id', $product_type->base_measure_type_id)
                        ->where('company_id', $product_type->company_id)->pluck('id');
                    $quantity = random_int(1, 1000);
                    $expiration_date = null;
                    if ($product_type->type == '_perishable') {
                        $from = strtotime('last monday');
                        $to = strtotime('next month');
                        $expiration_date = date('Y-m-d H:i', mt_rand($from, $to));
                    }

                    if ($allowed_measure_types->isEmpty()) {
                        $new_measure_type = MeasureType::factory()->create([
                            'base_measure_type_id' => $product_type->base_measure_type_id,
                            'company_id' => $random_company->id,
                            'is_common' => false,
                        ]);
                        $measure_type_id = $new_measure_type->id;
                    }
                    else {
                        $measure_type_id = $allowed_measure_types->random();
                    }
                    for ($i=0; $i < random_int(1, 5); $i++) {
                        ProductPurchase::create([
                            'storage_id' => $storage->id,
                            'product_type_id' => $product_type->id,
                            'measure_type_id' => $measure_type_id,
                            'quantity' => $quantity,
                            'current_quantity' => random_int(0, $quantity),
                            'cost' => random_int(100, 10000),
                            'expiration_date' => $expiration_date,
                        ]);
                    }
                }
            }
        }

        // create roles
        $role_repository = app(RoleRepository::class);
        foreach ($companies as $company) {
            $role_repository->createDefaultCompanyRoles($company->id);
        }

        // create users
        foreach ($companies as $company) {
            $director = User::factory()->create(['company_id' => $company->id]);
            $director->assignRole('director.'.$company->id);

            $accountant = User::factory()->create(['company_id' => $company->id]);
            $accountant->assignRole('accountant.' . $company->id);

            $analyst = User::factory()->create(['company_id' => $company->id]);
            $analyst->assignRole('analyst.' . $company->id);

            foreach ($company->shops as $item) {
                $salesman = User::factory()->create(['company_id' => $company->id]);
                $salesman->assignRole('salesman.' . $company->id);
            }
        }
    }
}
