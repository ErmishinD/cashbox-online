<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Cashbox;
use App\Models\Company;
use App\Models\MeasureType;
use App\Models\ProductType;
use App\Models\SellProduct;
use App\Models\SellProductGroup;
use App\Models\Shop;
use App\Models\User;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CashboxControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $base_route = '/api/cashbox/';
    private $table = 'cashboxes';

    private $operator;
    private $collector;

    /**
     * @var User
     */
    private $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->setUpFaker();

        $this->seed(RolesPermissionsSeeder::class);
        $company = Company::factory()->create();

        $this->base_measure_type_volume = BaseMeasureType::create(['type' => '_volume', 'name' => 'мл']);
        $this->base_measure_type_weight = BaseMeasureType::create(['type' => '_weight', 'name' => 'г']);
        $this->base_measure_type_quantity = BaseMeasureType::create(['type' => '_quantity', 'name' => 'шт']);

        Company::factory()->create();

        MeasureType::factory()->create([
            'base_measure_type_id' => $this->base_measure_type_volume->id,
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->randomElement([10, 100, 1000, 10000]),
            'company_id' => Company::inRandomOrder()->get()->first()->id,
            'is_common' => $this->faker->boolean(35),
        ]);
        MeasureType::factory()->create([
            'base_measure_type_id' => $this->base_measure_type_weight->id,
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->randomElement([10, 100, 1000, 10000]),
            'company_id' => Company::inRandomOrder()->get()->first()->id,
            'is_common' => $this->faker->boolean(35),
        ]);
        MeasureType::factory()->create([
            'base_measure_type_id' => $this->base_measure_type_quantity->id,
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->randomElement([10, 100, 1000, 10000]),
            'company_id' => Company::inRandomOrder()->get()->first()->id,
            'is_common' => $this->faker->boolean(35),
        ]);

        Shop::factory()->create(['company_id' => $company->id]);
        ProductType::factory(10)->create();
        SellProduct::factory(4)->create();
        SellProductGroup::factory(6)->create();
        $this->operator = User::factory()->create();
        $this->collector = User::factory()->create();

        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');
    }

    public function test_admin_can_get_all_cashbox_transactions() {
        Cashbox::factory(5)->create();

        $response = $this->actingAs($this->admin)->getJson($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(5, $response['data']);
    }

    public function test_admin_can_create_cashbox_out_transaction() {
        $shop = Shop::factory()->create();
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'shop_id' => $shop->id,
            'transaction_type' => '_out',
            'payment_type' => '_cash',
            'amount' => 100,
            'description' => 'some description',
            'operator_id' => $this->operator->id,
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'shop_id' => $shop->id,
                    'transaction_type' => '_out',
                    'payment_type' => '_cash',
                    'amount' => 100,
                    'description' => 'some description',
                    'operator_id' => $this->operator->id,
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'shop_id' => $shop->id,
            'transaction_type' => '_out',
            'payment_type' => '_cash',
            'amount' => 100,
            'description' => 'some description',
            'operator_id' => $this->operator->id,
        ]);
    }

    public function test_admin_can_create_cashbox_in_transaction() {
        $shop = Shop::factory()->create();
        $sell_product = SellProduct::factory()->create();
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'shop_id' => $shop->id,
            'transaction_type' => '_in',
            'sellable_type' => 'App\\Models\\SellProduct',
            'sellable_id' => $sell_product->id,
            'payment_type' => '_cash',
            'amount' => 200,
            'operator_id' => $this->operator->id,
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'shop_id' => $shop->id,
                    'transaction_type' => '_in',
                    'sellable_type' => 'App\\Models\\SellProduct',
                    'sellable_id' => $sell_product->id,
                    'payment_type' => '_cash',
                    'amount' => 200,
                    'operator_id' => $this->operator->id,
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'shop_id' => $shop->id,
            'transaction_type' => '_in',
            'sellable_type' => 'App\\Models\\SellProduct',
            'sellable_id' => $sell_product->id,
            'payment_type' => '_cash',
            'amount' => 200,
            'operator_id' => $this->operator->id,
        ]);
    }

    public function test_admin_can_get_cashbox_transaction() {
        $cashbox = Cashbox::factory()->create(['transaction_type' => '_out', 'amount' => 111, 'description' => 'my description']);
        $response = $this->actingAs($this->admin)->get($this->base_route.$cashbox->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['transaction_type' => '_out', 'amount' => 111, 'description' => 'my description']
            ]);
    }

    public function test_admin_can_edit_cashbox_transaction() {
        $cashbox = Cashbox::factory()->create(['transaction_type' => '_out', 'amount' => 333.33]);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route.$cashbox->id, [
            'amount' => 666.66
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['transaction_type' => '_out', 'amount' => 666.66]
            ]);
        $this->assertDatabaseHas($this->table, ['transaction_type' => '_out', 'amount' => 666.66]);
    }

    public function test_admin_can_delete_cashbox_transaction() {
        $cashbox = Cashbox::factory()->create();
        $response = $this->actingAs($this->admin)->deleteJson($this->base_route.$cashbox->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertDatabaseMissing($this->table, ['id' => $cashbox->id]);
    }
}
