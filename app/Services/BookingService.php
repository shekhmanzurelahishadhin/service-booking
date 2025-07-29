<?php


namespace App\Services;


use App\Models\Booking;
use App\Models\User;

class BookingService
{
    public function getUserBookings(User $user)
    {
        return $user->bookings()->with('service')->get();
    }

    public function createBooking(User $user, array $data)
    {
        return Booking::create([
            'user_id' => $user->id,
            'service_id' => $data['service_id'],
            'booking_date' => $data['booking_date'],
            'status' => 'pending',
        ]);
    }

    public function getAllBookings()
    {
        return Booking::with(['user', 'service'])->get();
    }
}
