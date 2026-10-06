@extends('layouts.admin')

@section('title', 'Edit Topic')

@section('content')

    <div class="page-head">
        <h1>Edit Topic</h1>
        <a class="btn btn-brown" href="{{ route('admin.teachings.index') }}">Back</a>
    </div>

    <div class="panel">
        <form action="{{ route('admin.teachings.update', $topic) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.teachings._form', ['topic' => $topic])
            <div class="form-actions">
                <button type="submit" class="btn btn-green btn-lg">Save Changes</button>
                <a class="btn btn-brown" href="{{ route('admin.teachings.index') }}">Cancel</a>
            </div>
        </form>
    </div>

@endsection
