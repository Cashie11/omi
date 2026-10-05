A new message was received from the Omisewa Temple website.

Name: {{ $contact->name }}
Phone: {{ $contact->phone ?: 'Not provided' }}
Email: {{ $contact->email }}

Message:
{{ $contact->message }}
