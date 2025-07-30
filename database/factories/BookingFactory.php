<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'service_id' => \App\Models\Service::factory(),
            'booking_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'status' => 'pending',
        ];
    }
}
