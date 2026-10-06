@extends('layouts.admin')

@section('title', 'Bookings')

@section('content')

    <div class="page-head">
        <h1>Booking Requests</h1>
    </div>

    @if ($bookings->isEmpty())
        <div class="panel">
            <div class="empty">
                <p>No booking requests yet. Requests from the booking page will appear here.</p>
            </div>
        </div>
    @else
        <div class="panel">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Service</th>
                        <th>Preferred date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td data-label="Name">{{ $booking->name }}</td>
                            <td data-label="Service">{{ $booking->service ?: 'Not specified' }}</td>
                            <td data-label="Date">{{ $booking->preferred_date->format('d M Y') }}</td>
                            <td data-label="Status">
                                @if ($booking->isRead())
                                    <span class="badge badge-read">Read</span>
                                @else
                                    <span class="badge badge-new">New</span>
                                @endif
                            </td>
                            <td data-label="Actions">
                                <div class="list-actions">
                                    <a class="btn btn-sm btn-green" href="{{ route('admin.bookings.show', $booking) }}">View</a>
                                    <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" onsubmit="return confirm('Delete this booking request?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
