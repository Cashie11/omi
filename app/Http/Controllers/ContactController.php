<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use App\Http\Requests\StoreMessageRequest;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact');
    }

    public function store(StoreMessageRequest $request): RedirectResponse
    {
        // Honeypot field: real visitors never fill this hidden field.
        if ($request->filled('website')) {
            return back()->with('success', 'Thank you. Your message has been sent.');
        }

        // The form is filled in too quickly to be human. An empty value
        // (scripting disabled) is allowed so genuine visitors are not blocked.
        $formTime = trim((string) $request->input('form_time', ''));
        if ($formTime !== '' && (int) $formTime < 3) {
            return back()->with('success', 'Thank you. Your message has been sent.');
        }

        $message = Message::create($request->validated());

        $this->sendNotification($message);

        return back()->with('success', 'Thank you. Your message has been sent. We will be in touch soon.');
    }

    private function sendNotification(Message $message): void
    {
        $recipients = array_values(array_filter([
            setting('contact_email_primary'),
            setting('contact_email_secondary'),
        ]));

        if ($recipients === []) {
            $recipients = ['AdeOdo@omisewatemple.com', 'Osungbemi@omisewatemple.com'];
        }

        try {
            Mail::to($recipients)->send(new ContactMessageMail($message));
        } catch (\Throwable $e) {
            Log::error('Contact form mail could not be sent: '.$e->getMessage());
        }
    }
}
