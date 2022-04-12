<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Category;
use App\Models\Company;
use App\Models\ProductType;
use App\Models\SellProduct;
use App\Models\User;
use App\Repositories\RoleRepository;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    private $base_route = '/api/categories/';
    private $table = 'categories';

    /**
     * @var User
     */
    private $admin;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesPermissionsSeeder::class);

        $company = Company::factory()->create();

        $role_repository = app(RoleRepository::class);
        $role_repository->createDefaultCompanyRoles($company->id);

        BaseMeasureType::create(['type' => '_volume', 'name' => 'мл']);

        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');
        $this->admin->company_id = $company->id;
        $this->admin->save();
    }

    public function test_admin_can_get_all_categories()
    {
        Category::factory()->count(5)->create(['company_id' => $this->admin->company_id]);

        $response = $this->actingAs($this->admin)->get($this->base_route);
        $response->assertStatus(200)->assertJsonCount(5, 'data');
    }

    public function test_admin_can_get_all_categories_with_counts()
    {
        $category = Category::factory()->create(['company_id' => $this->admin->company_id]);
        ProductType::factory()->count(3)->create(['company_id' => $this->admin->company_id, 'category_id' => $category->id]);
        SellProduct::factory()->count(6)->create(['company_id' => $this->admin->company_id, 'category_id' => $category->id]);

        $response = $this->actingAs($this->admin)->get($this->base_route);
        $response->assertStatus(200)->assertJson([
            'data' => [
                [
                    'id' => $category->id,
                    'name' => $category->name,
                    'product_types_count' => 3,
                    'sell_products_count' => 6,
                ]
            ]
        ]);
    }

    public function test_admin_can_create_category()
    {
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'name' => 'Some category name',
        ]);
        $response
            ->assertStatus(201)
            ->assertJson([
                'data' => [
                    'name' => 'Some category name',
                ]
            ]);
    }

    public function test_admin_can_edit_category()
    {
        $category = Category::factory()->create(['company_id' => $this->admin->company_id]);

        $response = $this->actingAs($this->admin)->putJson($this->base_route . $category->id, [
            'name' => 'New category name',
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name' => 'New category name',
                ]
            ]);
    }

    public function test_admin_can_show_category()
    {
        $category = Category::factory()->create(['company_id' => $this->admin->company_id]);

        $response = $this->actingAs($this->admin)->get($this->base_route . $category->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $category->id,
                    'name' => $category->name,
                ]
            ]);
    }

    public function test_admin_can_delete_category()
    {
        $category = Category::factory()->create(['company_id' => $this->admin->company_id]);

        $response = $this->actingAs($this->admin)->delete($this->base_route . $category->id);
        $response->assertNoContent();
        $this->assertSoftDeleted($this->table, ['name' => $category->name, 'company_id' => $this->admin->company_id]);
    }

    public function test_admin_can_get_for_select()
    {
        Category::factory()->count(7)->create(['company_id' => $this->admin->company_id]);

        $response = $this->actingAs($this->admin)->get($this->base_route . 'get_for_select');

        $response->assertStatus(200)->assertJsonCount(7, 'data');

    }
}
