<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = User::where('is_admin', false)->first(); // use any customer
        $services = Service::all();

        foreach ($services as $service) {
            Booking::create([
                'user_id' => $customer->id,
                'service_id' => $service->id,
                'booking_date' => now()->addDays(rand(1, 7))->toDateString(),
                'status' => 'pending',
            ]);
        }
    }
}
