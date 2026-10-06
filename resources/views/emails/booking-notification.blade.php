A new booking request was received from the Omisewa Temple website.

Name: {{ $booking->name }}
Phone: {{ $booking->phone ?: 'Not provided' }}
Email: {{ $booking->email }}
Service: {{ $booking->service ?: 'Not specified' }}
Preferred date: {{ $booking->preferred_date->format('d M Y') }}

Message:
{{ $booking->message ?: 'No additional message' }}
