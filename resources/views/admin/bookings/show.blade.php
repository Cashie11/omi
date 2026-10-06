@extends('layouts.admin')

@section('title', 'View Booking')

@section('content')

    <div class="page-head">
        <h1>Booking Request</h1>
        <a class="btn btn-brown" href="{{ route('admin.bookings.index') }}">Back</a>
    </div>

    <div class="panel">
        <p style="margin-bottom: 1.5rem;">
            <strong>Name:</strong> {{ $booking->name }}<br>
            <strong>Email:</strong> <a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a><br>
            @if ($booking->phone)
                <strong>Phone:</strong> {{ $booking->phone }}<br>
            @endif
            <strong>Service:</strong> {{ $booking->service ?: 'Not specified' }}<br>
            <strong>Preferred date:</strong> {{ $booking->preferred_date->format('d M Y') }}<br>
            <strong>Received:</strong> {{ $booking->created_at->format('d M Y, H:i') }}
        </p>

        <h2>Message</h2>
        <p style="white-space: pre-line;">{{ $booking->message ?: 'No additional message.' }}</p>
    </div>

    <div class="list-actions">
        <a class="btn btn-green" href="mailto:{{ $booking->email }}">Reply by Email</a>
        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" onsubmit="return confirm('Delete this booking request?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Request</button>
        </form>
    </div>

@endsection
