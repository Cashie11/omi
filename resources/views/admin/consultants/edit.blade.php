@extends('layouts.admin')

@section('title', 'Edit Consultant')

@section('content')

    <div class="page-head">
        <h1>Edit Consultant</h1>
        <a class="btn btn-brown" href="{{ route('admin.consultants.index') }}">Back</a>
    </div>

    <div class="panel">
        <form action="{{ route('admin.consultants.update', $consultant) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.consultants._form', ['consultant' => $consultant])
            <div class="form-actions">
                <button type="submit" class="btn btn-green btn-lg">Save Changes</button>
                <a class="btn btn-brown" href="{{ route('admin.consultants.index') }}">Cancel</a>
            </div>
        </form>
    </div>

    @if ($consultant->photo)
        <div class="panel">
            <h2>Remove Photo</h2>
            <form action="{{ route('admin.consultants.photo.destroy', $consultant) }}" method="POST" onsubmit="return confirm('Remove the photo for this consultant?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Remove Photo</button>
            </form>
        </div>
    @endif

@endsection
