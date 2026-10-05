<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Message $contact)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New message from the Omisewa Temple website',
            replyTo: [$this->contact->email => $this->contact->name],
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'emails.contact-message',
            with: ['contact' => $this->contact],
        );
    }
}
