<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Services\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request,BookingService $bookingService)
    {
        return $bookingService->getUserBookings($request->user());
    }

    public function store(StoreBookingRequest $request,BookingService $bookingService)
    {
        return $bookingService->createBooking($request->user(), $request->validated());
    }

    public function allBookings(BookingService $bookingService)
    {
        return $bookingService->getAllBookings();
    }
}
