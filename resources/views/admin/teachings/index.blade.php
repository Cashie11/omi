@extends('layouts.admin')

@section('title', 'Teachings & Wisdom')

@section('content')

    <div class="page-head">
        <h1>Teachings &amp; Wisdom</h1>
        <a class="btn btn-green" href="{{ route('admin.teachings.create') }}">Add Topic</a>
    </div>

    @if ($topics->isEmpty())
        <div class="panel">
            <div class="empty">
                <p>No topics yet.</p>
                <a class="btn btn-green" href="{{ route('admin.teachings.create') }}">Add Topic</a>
            </div>
        </div>
    @else
        <div class="panel">
            <table>
                <thead>
                    <tr>
                        <th>Topic</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topics as $topic)
                        <tr>
                            <td data-label="Topic">{{ $topic->title }}</td>
                            <td data-label="Actions">
                                <div class="list-actions">
                                    <a class="btn btn-sm btn-brown" href="{{ route('admin.teachings.edit', $topic) }}">Edit</a>
                                    <form action="{{ route('admin.teachings.destroy', $topic) }}" method="POST" onsubmit="return confirm('Remove this topic?');">
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
