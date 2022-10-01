<?php

namespace Database\Seeders;

use App\Models\Cashbox;
use App\Models\Category;
use App\Models\Company;
use App\Models\Counterparty;
use App\Models\ExternalSale;
use App\Models\MeasureType;
use App\Models\ProductConsumption;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\SellProduct;
use App\Models\SellProductGroup;
use App\Models\Shop;
use App\Models\Storage;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Services\ProductPurchaseService;
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
        $faker = \Faker\Factory::create();

        $data = [
            'companies' => [
                [
                    'name' => '#main_stretch',
                    'shops' => [
                        [
                            'name' => 'Гоголя',
                            'storages' => [
                                ['name' => 'Склад Гоголя']
                            ],
                        ],
                        [
                            'name' => 'Чаривная',
                            'storages' => [
                                ['name' => 'Склад Чаривная']
                            ],
                        ],
                        [
                            'name' => 'Бородинский',
                            'storages' => [
                                ['name' => 'Склад Бородинский']
                            ],
                        ],
                        [
                            'name' => 'Маяковского',
                            'storages' => [
                                ['name' => 'Склад Маяковского']
                            ],
                        ],
                    ],
                    'measure_types' => [
                        [
                            'base_measure_type_id' => 1,
                            'name' => 'л',
                            'description' => 'литры',
                            'quantity' => 1000,
                            'is_common' => true,
                        ],
                        [
                            'base_measure_type_id' => 2,
                            'name' => 'кг',
                            'description' => 'киллограммы',
                            'quantity' => 1000,
                            'is_common' => true,
                        ],
                        [
                            'base_measure_type_id' => 3,
                            'name' => 'шт',
                            'description' => 'штуки',
                            'quantity' => 1,
                            'is_common' => true,
                        ]
                    ],
                    'product_types' => [
                        [
                            'name' => 'Сахар',
                            'type' => '_imperishable',
                            'photo' => storage_path('dummy_images/sugar.jpg'),
                            'base_measure_type_id' => 2,
                            'main_measure_type_id' => 2,
                        ],
                        [
                            'name' => 'Молоко',
                            'type' => '_perishable',
                            'photo' => storage_path('dummy_images/milk.jpeg'),
                            'base_measure_type_id' => 1,
                            'main_measure_type_id' => 1,
                        ],
                        [
                            'name' => 'Кофе',
                            'type' => '_imperishable',
                            'photo' => storage_path('dummy_images/coffee.jpeg'),
                            'base_measure_type_id' => 2,
                            'main_measure_type_id' => 2,
                        ],
                        [
                            'name' => 'Стаканчик',
                            'type' => '_imperishable',
                            'photo' => storage_path('dummy_images/cup.jpg'),
                            'base_measure_type_id' => 3,
                            'main_measure_type_id' => 3,
                        ],
                        [
                            'name' => 'Вода',
                            'type' => '_imperishable',
                            'photo' => storage_path('dummy_images/water.png'),
                            'base_measure_type_id' => 1,
                            'main_measure_type_id' => 1,
                        ],
                        [
                            'name' => 'Сникерс',
                            'type' => '_imperishable',
                            'photo' => storage_path('dummy_images/snickers.png'),
                            'base_measure_type_id' => 3,
                            'main_measure_type_id' => 3,
                        ],
                        [
                            'name' => 'Твикс',
                            'type' => '_imperishable',
                            'photo' => storage_path('dummy_images/twix.jpg'),
                            'base_measure_type_id' => 3,
                            'main_measure_type_id' => 3,
                        ],
                        [
                            'name' => 'Баунти',
                            'type' => '_imperishable',
                            'photo' => storage_path('dummy_images/bounty.jpg'),
                            'base_measure_type_id' => 3,
                            'main_measure_type_id' => 3,
                        ],
                    ],
                    'sell_products' => [
                        [
                            'name' => "Cappuccino",
                            'photo' => storage_path('dummy_images/cappuccino.jpg'),
                            'price' => 55,
                            'has_discount' => false,
                            'consists_of_product_types' => [
                                ['product_type_id' => 3, 'quantity' => 25],  // coffee
                                ['product_type_id' => 5, 'quantity' => 300],  // water
                                ['product_type_id' => 4, 'quantity' => 1],  // cup
                                ['product_type_id' => 1, 'quantity' => 15],  // sugar
                            ]
                        ],
                        [
                            'name' => "Americano",
                            'photo' => storage_path('dummy_images/americano.jpg'),
                            'price' => 48.5,
                            'has_discount' => false,
                            'consists_of_product_types' => [
                                ['product_type_id' => 3, 'quantity' => 50],  // coffee
                                ['product_type_id' => 5, 'quantity' => 100],  // water
                                ['product_type_id' => 4, 'quantity' => 1],  // cup
                            ]
                        ],
                        [
                            'name' => "Latte",
                            'photo' => storage_path('dummy_images/latte.jpg'),
                            'price' => 73.75,
                            'has_discount' => false,
                            'consists_of_product_types' => [
                                ['product_type_id' => 3, 'quantity' => 50],  // coffee
                                ['product_type_id' => 5, 'quantity' => 200],  // water
                                ['product_type_id' => 4, 'quantity' => 1],  // cup
                                ['product_type_id' => 1, 'quantity' => 20],  // sugar
                                ['product_type_id' => 2, 'quantity' => 100],  // milk
                            ]
                        ],
                        [
                            'name' => "Snickers",
                            'photo' => storage_path('dummy_images/snickers.png'),
                            'price' => 20,
                            'has_discount' => false,
                            'consists_of_product_types' => [
                                ['product_type_id' => 6, 'quantity' => 1],  // snickers
                            ]
                        ],
                        [
                            'name' => "Twix",
                            'photo' => storage_path('dummy_images/twix.jpg'),
                            'price' => 18,
                            'has_discount' => false,
                            'consists_of_product_types' => [
                                ['product_type_id' => 7, 'quantity' => 1],  // twix
                            ]
                        ],
                        [
                            'name' => "Bounty",
                            'photo' => storage_path('dummy_images/bounty.jpg'),
                            'price' => 33.33,
                            'has_discount' => false,
                            'consists_of_product_types' => [
                                ['product_type_id' => 8, 'quantity' => 1],  // bounty
                            ]
                        ],

                    ],
                    'sell_product_groups' => [
                        [
                            'name' => "Набор батончиков",
                            'photo' => storage_path('dummy_images/bars_collection.jpg'),
                            'has_discount' => false,
                            'consists_of_sell_products' => [
                                ['sell_product_id' => 4, 'price' => 15],  // snickers
                                ['sell_product_id' => 5, 'price' => 18],  // twix
                            ]
                        ],
                    ]
                ],
                [
                    'name' => 'АТБ',
                    'shops' => [
                        [
                            'name' => 'Черное',
                            'storages' => [
                                ['name' => 'Склад черного атб']
                            ],
                        ],
                        [
                            'name' => 'Белое',
                            'storages' => [
                                ['name' => 'Склад белого магазина']
                            ],
                        ],
                        [
                            'name' => 'Зеленое',
                            'storages' => [
                                ['name' => 'Склад зеленого атб']
                            ],
                        ],
                    ],
                ],
                [
                    'name' => 'Ашан',
                    'shops' => [
                        [
                            'name' => 'Первый',
                            'storages' => [
                                ['name' => 'Склад первого ашана']
                            ],
                        ],
                        [
                            'name' => 'Второй',
                            'storages' => [
                                ['name' => 'Склад второго ашана']
                            ],
                        ],
                    ],
                ]
            ],
        ];

        $companies = collect();
        $shops = collect();
        $measure_types = collect();
        $product_types = collect();
        $sell_products = collect();
        $counterparties = collect();
        foreach ($data['companies'] as $company_data) {
            $company = Company::factory()->create(['name' => $company_data['name']]);
            $counterparty = Counterparty::factory()->create(['name' => $company->name, 'company_id' => $company->id]);
            $counterparties->push($counterparty);
            foreach ($company_data['shops'] as $shop_data) {
                $shop = Shop::factory()->create(['name' => $shop_data['name'], 'company_id' => $company->id]);
                foreach ($shop_data['storages'] as $storage_data) {
                    $storage = Storage::factory()->create([
                        'shop_id' => $shop->id, 'name' => $storage_data['name'], 'company_id' => $company->id
                    ]);
                    $shop->storages = collect([$storage]);
                }
                $shops->push($shop);
            }

            if (!empty($company_data['measure_types'])) {
                foreach ($company_data['measure_types'] as $measure_type_data) {
                    $measure_type = MeasureType::factory()->create(array_merge($measure_type_data, ['company_id' => $company->id]));
                    $measure_types->push($measure_type);
                }
            }

            if (!empty($company_data['product_types'])) {
                foreach ($company_data['product_types'] as $product_type_data) {
                    $photo_url = $product_type_data['photo'];
                    unset($product_type_data['photo']);

                    $product_type = ProductType::factory()->create(array_merge($product_type_data, ['company_id' => $company->id]));
                    $product_types->push($product_type);

                    $product_type->addMedia($photo_url)->preservingOriginal()->toMediaCollection('photo');
                }
            }

            if (!empty($company_data['sell_products'])) {
                foreach ($company_data['sell_products'] as $sell_product_data) {
                    $photo_url = $sell_product_data['photo'];
                    unset($sell_product_data['photo']);

                    $consists_of_product_types = $sell_product_data['consists_of_product_types'];
                    unset($sell_product_data['consists_of_product_types']);

                    $sell_product = SellProduct::factory()->create(array_merge($sell_product_data, ['company_id' => $company->id]));
                    foreach ($consists_of_product_types as $product_type_data) {
                        $sell_product->product_types()->attach(
                            $product_type_data['product_type_id'],
                            ['quantity' => $product_type_data['quantity']]
                        );
                    }
                    $sell_products->push($sell_product);

                    $sell_product->addMedia($photo_url)->preservingOriginal()->toMediaCollection('photo');
                }
            }

            if (!empty($company_data['sell_product_groups'])) {
                foreach ($company_data['sell_product_groups'] as $sell_product_group_data) {
                    $photo_url = $sell_product_group_data['photo'];
                    unset($sell_product_group_data['photo']);

                    $consists_of_sell_products = $sell_product_group_data['consists_of_sell_products'];
                    unset($sell_product_group_data['consists_of_sell_products']);

                    $sell_product_group = SellProductGroup::factory()->create(array_merge($sell_product_group_data, ['company_id' => $company->id]));
                    foreach ($consists_of_sell_products as $sell_product_data) {
                        $sell_product_group->sell_products()->attach(
                            $sell_product_data['sell_product_id'],
                            ['price' => $sell_product_data['price']]
                        );
                    }

                    $sell_product_group->addMedia($photo_url)->preservingOriginal()->toMediaCollection('photo');
                }
            }

            $companies->push($company);
        }

        // create roles and categories
        $role_repository = app(RoleRepository::class);
        foreach ($companies as $company) {
            $role_repository->createDefaultCompanyRoles($company->id);
            Category::factory()->count(5)->create(['company_id' => $company->id]);
        }

        // create users
        $directors = collect();
        $accountants = collect();
        $analysts = collect();
        $salesmen = collect();
        foreach ($companies as $company) {
            $director = User::factory()->create(['company_id' => $company->id]);
            $director->assignRole('director.' . $company->id);
            $directors->push($director);

            $accountant = User::factory()->create(['company_id' => $company->id]);
            $accountant->assignRole('accountant.' . $company->id);
            $accountants->push($accountant);

            $analyst = User::factory()->create(['company_id' => $company->id]);
            $analyst->assignRole('analyst.' . $company->id);
            $analysts->push($analyst);

            foreach ($company->shops as $item) {
                $salesman = User::factory()->create(['company_id' => $company->id]);
                $salesman->assignRole('salesman.' . $company->id);
                $salesmen->push($salesman);
            }
        }

        // create measure types
        foreach ($companies as $company) {
            MeasureType::factory()->count(10)->create(['company_id' => $company->id]);
        }

        // создать продукты
        $product_types = ProductType::factory()->count(300)->create();

        // к каждому продукту добавить подходящие единицы измерения
        $all_measure_types = MeasureType::all();
        foreach ($product_types as $product_type) {
            $allowed_measure_types = $all_measure_types
                ->where('base_measure_type_id', $product_type->base_measure_type_id)
                ->where('company_id', $product_type->company_id)->pluck('id');
            $product_type->measure_types()->attach($allowed_measure_types);
        }

        // создать продукты для продажи
        $sell_products = SellProduct::factory()->count(50)->create();
        foreach ($sell_products as $sell_product) {
            $allowed_product_types = $product_types->where('company_id', $sell_product->company_id)->pluck('id');
            if ($allowed_product_types->isNotEmpty()) {
                for ($i = 0; $i <= random_int(1, 5); $i++) {
                    $sell_product->product_types()->attach(
                        $allowed_product_types->random(),
                        ['quantity' => random_int(100, 1000)]
                    );
                }
            }
        }

        // создать группы товаров для продажи
//        $sell_groups = SellProductGroup::factory()->count(100)->create();
//        foreach ($sell_groups as $sell_group) {
//            $allowed_sell_products = $sell_products->where('company_id', $sell_group->company_id)->pluck('id');
//            if ($allowed_sell_products->isNotEmpty()) {
//                $products_amount = random_int(2, 5);
//                for ($i = 1; $i <= $products_amount; $i++) {
//                    $sell_group->sell_products()->attach(
//                        $allowed_sell_products->random(),
//                        ['price' => random_int(10, 1000)]
//                    );
//                }
//            }
//        }

        // создание "закупок товаров"
        $product_purchases = collect();
        foreach ($shops as $shop) {
            $company_id = $shop->company_id;
            $director = $directors->where('company_id', $company_id)->first();
            foreach ($shop->storages as $storage) {
                $allowed_product_types = $product_types->where('company_id', $company_id);
                for ($product_count = 0; $product_count < random_int(20, 100); $product_count++) {
                    if ($allowed_product_types->isNotEmpty()) {
                        $product_type = $allowed_product_types->random();
                        $quantity = random_int(1, 1000);
                        $current_quantity = random_int(0, $quantity);
                        $cost = random_int(100, 10000);
                        $current_cost = round($cost / $quantity * $current_quantity, 2);
                        $expiration_date = null;

                        if ($product_type->type == '_perishable') {
                            $from = strtotime('last monday');
                            $to = strtotime('next year');
                            $expiration_date = date('Y-m-d H:i', mt_rand($from, $to));
                        }
                        for ($i = 0; $i < random_int(1, 5); $i++) {
                            $product_purchase = ProductPurchase::create([
                                'company_id' => $company_id,
                                'storage_id' => $storage->id,
                                'product_type_id' => $product_type->id,
                                'quantity' => $quantity,
                                'current_quantity' => $current_quantity,
                                'cost' => $cost,
                                'current_cost' => $current_cost,
                                'expiration_date' => $expiration_date,
                                'user_id' => $director->id,
                                'counterparty_id' => $counterparties->where('company_id', $company_id)->first()->id,
                            ]);
                            $product_purchases->push($product_purchase);
                        }
                    }
                }
            }

            // создать продажи
            $operators = $salesmen->where('company_id', $company_id);

            $allowed_sell_products = $sell_products->where('company_id', $company_id);
            $sell_products_were_sold = $allowed_sell_products->random(ceil($allowed_sell_products->count() / 3));
            $sell_products_were_sold->load(['product_types']);
            foreach ($sell_products_were_sold as $sell_product) {
                $data = [
                    'company_id' => $company_id,
                    'shop_id' => $shop->id,
                    'sell_product_id' => $sell_product->id,
                    'amount' => $sell_product->price,
                    'transaction_type' => Cashbox::TRANSACTION_TYPES['in'],
                    'payment_type' => $faker->randomElement(Cashbox::PAYMENT_TYPES),
                    'operator_id' => $operators->where('company_id', $company_id)->random()->id,
                    'collected_at' => null,
                    'collector_id' => null,
                ];
                $compound = ['product_types' => []];
                foreach ($sell_product->product_types as $product_type) {
                    $compound['product_types'][] = ['id' => $product_type->id, 'quantity' => $product_type->pivot->quantity];
                }
                $used_purchases = ProductPurchaseService::subtract_product_types($product_purchases->where('company_id', $company_id), $compound);

                $data['self_cost'] = 0;

                foreach ($used_purchases as $product_type_id => $purchases) {
                    foreach ($purchases as $purchase) {
                        $data['self_cost'] += $purchase['cost'];
                    }
                }

                $data['profit'] = $data['amount'] - $data['self_cost'];

                $data['data'] = json_encode($used_purchases);
                $payment = Cashbox::factory()->create($data);

                foreach ($used_purchases as $product_type_id => $purchases) {
                    foreach ($purchases as $purchase) {
                        $cost = $payment->self_cost == 0 ? 1 : $payment->self_cost;
                        $percent = $purchase['cost'] / $cost;
                        ProductConsumption::create([
                            'company_id' => $data['company_id'],
                            'product_purchase_id' => $purchase['id'],
                            'consumable_type' => Cashbox::class,
                            'consumable_id' => $payment->id,
                            'quantity' => $purchase['quantity'],
                            'cost' => $purchase['cost'],
                            'income' => $payment->amount * $percent,
                            'profit' => $payment->profit * $percent,
                        ]);
                    }
                }
            }

            // создать внешние продажи (которые надо подтвердить)
            ExternalSale::factory()->count(20)->create(['company_id' => $company_id]);
        }
    }
}
