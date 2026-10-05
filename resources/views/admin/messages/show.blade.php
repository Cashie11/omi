@extends('layouts.admin')

@section('title', 'View Message')

@section('content')

    <div class="page-head">
        <h1>Message</h1>
        <a class="btn btn-brown" href="{{ route('admin.messages.index') }}">Back to Messages</a>
    </div>

    <div class="panel">
        <p style="margin-bottom: 1.5rem;">
            <strong>From:</strong> {{ $message->name }}<br>
            <strong>Email:</strong> <a href="mailto:{{ $message->email }}">{{ $message->email }}</a><br>
            @if ($message->phone)
                <strong>Phone:</strong> {{ $message->phone }}<br>
            @endif
            <strong>Received:</strong> {{ $message->created_at->format('d M Y, H:i') }}
        </p>

        <h2>Message</h2>
        <p style="white-space: pre-line;">{{ $message->message }}</p>
    </div>

    <div class="list-actions">
        <a class="btn btn-green" href="mailto:{{ $message->email }}">Reply by Email</a>
        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Message</button>
        </form>
    </div>

@endsection
