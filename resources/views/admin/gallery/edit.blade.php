@extends('layouts.admin')

@section('title', 'Edit Image')

@section('content')

    <div class="page-head">
        <h1>Edit Image</h1>
        <a class="btn btn-brown" href="{{ route('admin.gallery.index') }}">Back</a>
    </div>

    <div class="panel">
        <form action="{{ route('admin.gallery.update', $image) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.gallery._form', ['image' => $image])
            <div class="form-actions">
                <button type="submit" class="btn btn-green btn-lg">Save Changes</button>
                <a class="btn btn-brown" href="{{ route('admin.gallery.index') }}">Cancel</a>
            </div>
        </form>
    </div>

@endsection
