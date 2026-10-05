@extends('layouts.admin')

@section('title', 'Messages')

@section('content')

    <div class="page-head">
        <h1>Messages</h1>
    </div>

    @if ($messages->isEmpty())
        <div class="panel">
            <div class="empty">
                <p>No messages yet. Messages from the contact form will appear here.</p>
            </div>
        </div>
    @else
        <div class="panel">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Received</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td>
                            <td>{{ $message->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                @if ($message->isRead())
                                    <span class="badge badge-read">Read</span>
                                @else
                                    <span class="badge badge-new">New</span>
                                @endif
                            </td>
                            <td>
                                <div class="list-actions">
                                    <a class="btn btn-sm btn-green" href="{{ route('admin.messages.show', $message) }}">View</a>
                                    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?');">
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
