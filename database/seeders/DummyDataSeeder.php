<?php

namespace Database\Seeders;

use App\Models\Cashbox;
use App\Models\Category;
use App\Models\Company;
use App\Models\MeasureType;
use App\Models\ProductPurchase;
use App\Models\ProductType;
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
                            'photo' => 'https://storage1a.censor.net/images/1/2/1/d/121d635e26009e78d7df3a9a4f676731/original.jpg',
                            'base_measure_type_id' => 2,
                            'main_measure_type_id' => 2,
                        ],
                        [
                            'name' => 'Молоко',
                            'type' => '_perishable',
                            'photo' => 'https://storage1a.censor.net/images/1/2/1/d/121d635e26009e78d7df3a9a4f676731/original.jpg',
                            'base_measure_type_id' => 1,
                            'main_measure_type_id' => 1,
                        ],
                        [
                            'name' => 'Кофе',
                            'type' => '_imperishable',
                            'photo' => 'https://espanarusa.com/files/autoupload/60/18/10/24zaxfgo453484.jpeg',
                            'base_measure_type_id' => 2,
                            'main_measure_type_id' => 2,
                        ],
                        [
                            'name' => 'Стаканчик',
                            'type' => '_imperishable',
                            'photo' => 'https://png.pngtree.com/element_our/20200609/ourlarge/pngtree-coffee-paper-cup-image_2233052.jpg',
                            'base_measure_type_id' => 3,
                            'main_measure_type_id' => 3,
                        ],
                        [
                            'name' => 'Вода',
                            'type' => '_imperishable',
                            'photo' => 'https://examsbook.co.in/img/post/large/0lBTMirror-and-Water-Image-Questions.jpg',
                            'base_measure_type_id' => 1,
                            'main_measure_type_id' => 1,
                        ],
                        [
                            'name' => 'Сникерс',
                            'type' => '_imperishable',
                            'photo' => 'https://www.papulya.com/wp-content/uploads/2020/11/shokoladnyy-batonchik-snickers-50-g.png',
                            'base_measure_type_id' => 3,
                            'main_measure_type_id' => 3,
                        ],
                        [
                            'name' => 'Твикс',
                            'type' => '_imperishable',
                            'photo' => 'https://i.imgur.com/9mCKTf0.jpg',
                            'base_measure_type_id' => 3,
                            'main_measure_type_id' => 3,
                        ],
                        [
                            'name' => 'Баунти',
                            'type' => '_imperishable',
                            'photo' => 'https://cigarelka.com.ua/image/catalog/aroma/destilla/ds-baunty.jpg',
                            'base_measure_type_id' => 3,
                            'main_measure_type_id' => 3,
                        ],
                    ],
                    'sell_products' => [
                        [
                            'name' => "Cappuccino",
                            'photo' => 'https://coffeeatthree.com/wp-content/uploads/cappuccino-1a.jpg',
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
                            'photo' => 'https://chay-kava.com/uploads/posts/2021-03/1614596676_kofe-amerikano-v-domashnix-usoviyax-768x512.jpg',
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
                            'photo' => 'https://westcupgroup.com/wp-content/uploads/2020/06/5148178-1.jpg',
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
                            'photo' => 'https://storage1a.censor.net/images/1/2/1/d/121d635e26009e78d7df3a9a4f676731/original.jpg',
                            'price' => 20,
                            'has_discount' => false,
                            'consists_of_product_types' => [
                                ['product_type_id' => 6, 'quantity' => 1],  // snickers
                            ]
                        ],
                        [
                            'name' => "Twix",
                            'photo' => 'https://aquamarket.ua/80089-large_default/twix-50-g-batonchik-tviks.jpg',
                            'price' => 18,
                            'has_discount' => false,
                            'consists_of_product_types' => [
                                ['product_type_id' => 7, 'quantity' => 1],  // twix
                            ]
                        ],
                        [
                            'name' => "Bounty",
                            'photo' => 'https://st.depositphotos.com/2121815/4881/i/600/depositphotos_48816961-stock-photo-bounty-coconut-chocolate-bar-isolated.jpg',
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
                            'photo' => 'https://images.ua.prom.st/3235065367_w640_h640_konfety-mars-snickers.jpg',
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
        foreach ($data['companies'] as $company_data) {
            $company = Company::factory()->create(['name' => $company_data['name']]);
            foreach ($company_data['shops'] as $shop_data) {
                $shop = Shop::factory()->create(['name' => $shop_data['name'], 'company_id' => $company->id]);
                foreach ($shop_data['storages'] as $storage_data) {
                    $storage = Storage::factory()->create(['shop_id' => $shop->id, 'name' => $storage_data['name']]);
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

                    $product_type->addMediaFromUrl($photo_url)->toMediaCollection('photo');
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

                    $sell_product->addMediaFromUrl($photo_url)->toMediaCollection('photo');
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

                    $sell_product_group->addMediaFromUrl($photo_url)->toMediaCollection('photo');
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
        $product_types = ProductType::factory()->count(1000)->create();

        // к каждому продукту добавить подходящие единицы измерения
        $all_measure_types = MeasureType::all();
        foreach ($product_types as $product_type) {
            $allowed_measure_types = $all_measure_types
                ->where('base_measure_type_id', $product_type->base_measure_type_id)
                ->where('company_id', $product_type->company_id)->pluck('id');
            $product_type->measure_types()->attach($allowed_measure_types);
        }

        // создать продукты для продажи
        $sell_products = SellProduct::factory()->count(300)->create();
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
        $sell_groups = SellProductGroup::factory()->count(100)->create();
        foreach ($sell_groups as $sell_group) {
            $allowed_sell_products = $sell_products->where('company_id', $sell_group->company_id)->pluck('id');
            if ($allowed_sell_products->isNotEmpty()) {
                $products_amount = random_int(2, 5);
                for ($i = 1; $i <= $products_amount; $i++) {
                    $sell_group->sell_products()->attach(
                        $allowed_sell_products->random(),
                        ['price' => random_int(10, 1000)]
                    );
                }
            }

        }

        // создание "закупок товаров"
        foreach ($shops as $shop) {
            $company_id = $shop->company_id;
            $director = $directors->where('company_id', $company_id)->first();
            foreach ($shop->storages as $storage) {
                $allowed_product_types = $product_types->where('company_id', $company_id);
                for ($product_count = 0; $product_count < random_int(20, 100); $product_count++) {
                    if ($allowed_product_types->isNotEmpty()) {
                        $product_type = $allowed_product_types->random();
                        $quantity = random_int(1, 1000);
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
                                'current_quantity' => random_int(0, $quantity),
                                'cost' => random_int(100, 10000),
                                'expiration_date' => $expiration_date,
                                'user_id' => $director->id
                            ]);

                            // create record in cashbox
                            Cashbox::factory()->create([
                                'company_id' => $company_id,
                                'shop_id' => $shop->id,
                                'product_purchase_id' => $product_purchase->id,
                                'sell_product_id' => null,
                                'transaction_type' => Cashbox::TRANSACTION_TYPES['out'],
                                'payment_type' => $faker->randomElement(Cashbox::PAYMENT_TYPES),
                                'amount' => $product_purchase->cost,
                                'operator_id' => $director->id,
                                'collected_at' => null,
                                'collector_id' => null,
                            ]);
                        }
                    }
                }
            }

            // создать продажи
            $operators = $salesmen->where('company_id', $company_id);

            $allowed_sell_products = $sell_products->where('company_id', $company_id);
            $sell_products_were_sold = $allowed_sell_products->random(ceil($allowed_sell_products->count() / 3));
            foreach ($sell_products_were_sold as $sell_product) {
                Cashbox::factory()->create([
                    'company_id' => $company_id,
                    'shop_id' => $shop->id,
                    'sell_product_id' => $sell_product->id,
                    'transaction_type' => Cashbox::TRANSACTION_TYPES['in'],
                    'payment_type' => $faker->randomElement(Cashbox::PAYMENT_TYPES),
                    'operator_id' => $operators->where('company_id', $company_id)->random()->id,
                    'collected_at' => null,
                    'collector_id' => null,
                ]);
            }
        }
    }
}
