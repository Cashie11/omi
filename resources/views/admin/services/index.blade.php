@extends('layouts.admin')

@section('title', 'Services')

@section('content')

    <div class="page-head">
        <h1>Services</h1>
        <a class="btn btn-green" href="{{ route('admin.services.create') }}">Add Service</a>
    </div>

    @if ($services->isEmpty())
        <div class="panel">
            <div class="empty">
                <p>No services yet.</p>
                <a class="btn btn-green" href="{{ route('admin.services.create') }}">Add Service</a>
            </div>
        </div>
    @else
        <div class="panel">
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Duration</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td data-label="Title">{{ $service->title }}</td>
                            <td data-label="Duration">{{ $service->duration ?: 'Not set' }}</td>
                            <td data-label="Actions">
                                <div class="list-actions">
                                    <a class="btn btn-sm btn-brown" href="{{ route('admin.services.edit', $service) }}">Edit</a>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Remove this service?');">
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
