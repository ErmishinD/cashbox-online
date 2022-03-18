<?php

namespace Tests\Feature\Api;

use App\Models\Company;
use App\Models\User;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    private $base_route = '/api/permissions/';
    private $table = 'permissions';

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

        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');
        $this->admin->company_id = $company->id;
    }

    public function test_admin_can_get_permissions()
    {
        $response = $this->actingAs($this->admin)->get($this->base_route);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'Role' => [
                        ['ability' => 'access'],
                        ['ability' => 'create'],
                        ['ability' => 'show'],
                        ['ability' => 'edit'],
                        ['ability' => 'delete'],
                    ]
                ]
            ]);
    }
}
