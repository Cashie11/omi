<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookingAdminController extends Controller
{
    public function index(): View
    {
        $bookings = Booking::query()->latest()->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking): View
    {
        $booking->markAsRead();

        return view('admin.bookings.show', compact('booking'));
    }

    public function destroy(Booking $booking): RedirectResponse
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking request deleted.');
    }
}
