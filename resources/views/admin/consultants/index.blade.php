@extends('layouts.admin')

@section('title', 'Consultants')

@section('content')

    <div class="page-head">
        <h1>Consultants</h1>
        <a class="btn btn-green" href="{{ route('admin.consultants.create') }}">Add Consultant</a>
    </div>

    @if ($consultants->isEmpty())
        <div class="panel">
            <div class="empty">
                <p>No consultants yet.</p>
                <a class="btn btn-green" href="{{ route('admin.consultants.create') }}">Add Consultant</a>
            </div>
        </div>
    @else
        <div class="panel">
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consultants as $consultant)
                        <tr>
                            <td><img src="{{ $consultant->photoUrl() }}" alt="" class="thumb"></td>
                            <td>{{ $consultant->name }}</td>
                            <td>
                                <div class="list-actions">
                                    <a class="btn btn-sm btn-brown" href="{{ route('admin.consultants.edit', $consultant) }}">Edit</a>
                                    <form action="{{ route('admin.consultants.destroy', $consultant) }}" method="POST" onsubmit="return confirm('Remove this consultant?');">
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
