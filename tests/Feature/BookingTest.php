<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_booking()
    {
        $user = User::factory()->create();
        $service = Service::factory()->create();

        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/bookings', [
            'service_id' => $service->id,
            'booking_date' => now()->addDay()->format('Y-m-d H:i:s'),
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'user_id',
                'service_id',
                'booking_date',
                'status'
            ]);
    }

    public function test_user_can_view_their_bookings()
    {
        $user = User::factory()->create();
        $service = Service::factory()->create();

        $booking = Booking::factory()->create([
            'user_id' => $user->id,
            'service_id' => $service->id
        ]);

        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/bookings');

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment([
                'id' => $booking->id,
                'status' => 'pending'
            ]);
    }

    public function test_admin_can_view_all_bookings()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $service = Service::factory()->create();

        Booking::factory()->count(3)->create([
            'service_id' => $service->id
        ]);

        $token = $admin->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/admin/bookings');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }
}
