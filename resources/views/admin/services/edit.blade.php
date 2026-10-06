@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')

    <div class="page-head">
        <h1>Edit Service</h1>
        <a class="btn btn-brown" href="{{ route('admin.services.index') }}">Back</a>
    </div>

    <div class="panel">
        <form action="{{ route('admin.services.update', $service) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.services._form', ['service' => $service])
            <div class="form-actions">
                <button type="submit" class="btn btn-green btn-lg">Save Changes</button>
                <a class="btn btn-brown" href="{{ route('admin.services.index') }}">Cancel</a>
            </div>
        </form>
    </div>

@endsection
