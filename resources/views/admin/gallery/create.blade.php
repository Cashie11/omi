@extends('layouts.admin')

@section('title', 'Upload Image')

@section('content')

    <div class="page-head">
        <h1>Upload Image</h1>
        <a class="btn btn-brown" href="{{ route('admin.gallery.index') }}">Back</a>
    </div>

    <div class="panel">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.gallery._form', ['image' => null])
            <div class="form-actions">
                <button type="submit" class="btn btn-green btn-lg">Upload Image</button>
                <a class="btn btn-brown" href="{{ route('admin.gallery.index') }}">Cancel</a>
            </div>
        </form>
    </div>

@endsection
