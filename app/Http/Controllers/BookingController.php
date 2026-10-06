<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Mail\BookingNotificationMail;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function index(): View
    {
        $services = Service::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('booking', compact('services'));
    }

    public function store(StoreBookingRequest $request): RedirectResponse
    {
        // Honeypot field: real visitors never fill this hidden field.
        if ($request->filled('website')) {
            return back()->with('success', 'Thank you. Your booking request has been received.');
        }

        // The form is filled in too quickly to be human.
        $formTime = trim((string) $request->input('form_time', ''));
        if ($formTime !== '' && (int) $formTime < 3) {
            return back()->with('success', 'Thank you. Your booking request has been received.');
        }

        $booking = Booking::create($request->validated());

        $this->sendNotification($booking);

        return back()->with('success', 'Thank you. Your booking request has been received. We will contact you to confirm.');
    }

    private function sendNotification(Booking $booking): void
    {
        $recipients = array_values(array_filter([
            setting('contact_email_primary'),
            setting('contact_email_secondary'),
        ]));

        if ($recipients === []) {
            $recipients = ['AdeOdo@omisewatemple.com', 'Osungbemi@omisewatemple.com'];
        }

        try {
            Mail::to($recipients)->send(new BookingNotificationMail($booking));
        } catch (\Throwable $e) {
            Log::error('Booking mail could not be sent: '.$e->getMessage());
        }
    }
}
