<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Booking $booking)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New booking request from the Omisewa Temple website',
            replyTo: [$this->booking->email => $this->booking->name],
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'emails.booking-notification',
            with: ['booking' => $this->booking],
        );
    }
}
