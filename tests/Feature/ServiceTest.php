<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create(['is_admin' => true]);
        $this->user = User::factory()->create(['is_admin' => false]);
    }

    public function test_get_all_services()
    {
        Service::factory()->count(3)->create(['status' => true]);

        $response = $this->actingAs($this->user)
            ->getJson('/api/services');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function test_admin_can_create_service()
    {
        $token = $this->admin->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/services', [
            'name' => 'Test Service',
            'description' => 'Test Description',
            'price' => 100.00,
            'status' => true,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'name' => 'Test Service'
            ]);
    }

    public function test_admin_can_update_service()
    {
        $service = Service::factory()->create();
        $token = $this->admin->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->putJson('/api/services/' . $service->id, [
            'name' => 'Updated Service',
            'description' => $service->description,
            'price' => $service->price,
            'status' => $service->status,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'name' => 'Updated Service'
            ]);
    }

    public function test_admin_can_delete_service()
    {
        $service = Service::factory()->create();
        $token = $this->admin->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->deleteJson('/api/services/' . $service->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('services', ['id' => $service->id]);
    }
}
