@extends('layouts.admin')

@section('title', 'Gallery')

@section('content')

    <div class="page-head">
        <h1>Gallery</h1>
        <a class="btn btn-green" href="{{ route('admin.gallery.create') }}">Upload Image</a>
    </div>

    @if ($images->isEmpty())
        <div class="panel">
            <div class="empty">
                <p>No images yet.</p>
                <a class="btn btn-green" href="{{ route('admin.gallery.create') }}">Upload Image</a>
            </div>
        </div>
    @else
        <div class="panel">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Caption</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $image)
                        <tr>
                            <td data-label="Image"><img src="{{ $image->url() }}" alt="{{ $image->caption ?: 'Image' }}" class="thumb"></td>
                            <td data-label="Caption">{{ $image->caption ?: 'No caption' }}</td>
                            <td data-label="Actions">
                                <div class="list-actions">
                                    <a class="btn btn-sm btn-brown" href="{{ route('admin.gallery.edit', $image) }}">Edit</a>
                                    <form action="{{ route('admin.gallery.destroy', $image) }}" method="POST" onsubmit="return confirm('Delete this image?');">
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
