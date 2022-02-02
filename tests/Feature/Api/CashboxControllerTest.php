<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Cashbox;
use App\Models\Company;
use App\Models\ProductType;
use App\Models\SellProduct;
use App\Models\SellProductGroup;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CashboxControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/cashbox/';
    private $table = 'cashboxes';

    private $operator;
    private $collector;

    public function setUp(): void
    {
        parent::setUp();
        $company = Company::factory()->create();
        BaseMeasureType::create(['type' => '_volume', 'name' => 'мл']);
        BaseMeasureType::create(['type' => '_weight', 'name' => 'г']);
        Shop::factory()->create(['company_id' => $company->id]);
        ProductType::factory(10)->create();
        SellProduct::factory(4)->create();
        SellProductGroup::factory(6)->create();
        $this->operator = User::factory()->create();
        $this->collector = User::factory()->create();
    }

    public function test_can_get_all_cashbox_transactions() {
        Cashbox::factory(5)->create();

        $response = $this->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(5, $response['data']);
    }

    public function test_can_create_cashbox_out_transaction() {
        $shop = Shop::factory()->create();
        $response = $this->postJson($this->base_route, [
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

    public function test_can_create_cashbox_in_transaction() {
        $shop = Shop::factory()->create();
        $product = ProductType::factory()->create();
        $response = $this->postJson($this->base_route, [
            'shop_id' => $shop->id,
            'transaction_type' => '_in',
            'resource' => '_product',
            'resource_id' => $product->id,
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
                    'resource' => '_product',
                    'resource_id' => $product->id,
                    'payment_type' => '_cash',
                    'amount' => 200,
                    'operator_id' => $this->operator->id,
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'shop_id' => $shop->id,
            'transaction_type' => '_in',
            'resource' => '_product',
            'resource_id' => $product->id,
            'payment_type' => '_cash',
            'amount' => 200,
            'operator_id' => $this->operator->id,
        ]);
    }

    public function test_can_get_cashbox_transaction() {
        $cashbox = Cashbox::factory()->create(['transaction_type' => '_out', 'amount' => 111, 'description' => 'my description']);
        $response = $this->get($this->base_route.$cashbox->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['transaction_type' => '_out', 'amount' => 111, 'description' => 'my description']
            ]);
    }

    public function test_can_edit_cashbox_transaction() {
        $cashbox = Cashbox::factory()->create(['transaction_type' => '_out', 'amount' => 333.33]);
        $response = $this->patchJson($this->base_route.$cashbox->id, [
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

    public function test_can_delete_cashbox_transaction() {
        $cashbox = Cashbox::factory()->create();
        $response = $this->deleteJson($this->base_route.$cashbox->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertDatabaseMissing($this->table, ['id' => $cashbox->id]);
    }
}