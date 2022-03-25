<?php

namespace Tests\Feature\Api;

use App\Models\Company;
use App\Models\SellProduct;
use App\Models\SellProductGroup;
use App\Models\User;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SellProductGroupControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/sell_product_groups/';
    private $table = 'sell_product_groups';
    /**
     * @var User
     */
    private $admin;

    public function setUp(): void
    {
        parent::setUp();
        Company::factory()->create();

        $this->seed(RolesPermissionsSeeder::class);
        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');
    }

    public function test_admin_can_get_all_sell_product_groups()
    {
        SellProductGroup::factory(5)->create();

        $response = $this->actingAs($this->admin)->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(5, $response['data']);
    }

    public function test_admin_can_create_sell_product_group()
    {
        $company = Company::inRandomOrder()->first();
        $sell_product = SellProduct::factory()->create(['company_id' => $company->id]);
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'company_id' => $company->id,
            'name' => 'Sell Product Group 1',
            'has_discount' => false,
            'sell_products' => [
                ['sell_product_id' => $sell_product->id, 'price' => 100]
            ]
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'company_id' => $company->id,
                    'name' => 'Sell Product Group 1',
                    'has_discount' => false,
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'company_id' => $company->id,
            'name' => 'Sell Product Group 1',
            'has_discount' => false,
        ]);
    }

    public function test_admin_can_get_sell_product_group()
    {
        $sell_product_group = SellProductGroup::factory()->create(['name' => 'Sell Product Group 2']);
        $response = $this->actingAs($this->admin)->get($this->base_route . $sell_product_group->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'Sell Product Group 2']
            ]);
    }

    public function test_admin_can_edit_sell_product_group()
    {
        $sell_product_group = SellProductGroup::factory()->create(['name' => 'Sell Product Group 3']);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route . $sell_product_group->id, [
            'name' => 'My new Sell Product Group 3'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'My new Sell Product Group 3']
            ]);
        $this->assertDatabaseHas($this->table, ['name' => 'My new Sell Product Group 3']);
    }

    public function test_admin_can_delete_sell_product_group()
    {
        $sell_product_group = SellProductGroup::factory()->create();
        $response = $this->actingAs($this->admin)->deleteJson($this->base_route . $sell_product_group->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertSoftDeleted($this->table, ['id' => $sell_product_group->id]);
    }
}
