@extends('layouts.admin')

@section('title', 'Add Service')

@section('content')

    <div class="page-head">
        <h1>Add Service</h1>
        <a class="btn btn-brown" href="{{ route('admin.services.index') }}">Back</a>
    </div>

    <div class="panel">
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            @include('admin.services._form', ['service' => null])
            <div class="form-actions">
                <button type="submit" class="btn btn-green btn-lg">Save Service</button>
                <a class="btn btn-brown" href="{{ route('admin.services.index') }}">Cancel</a>
            </div>
        </form>
    </div>

@endsection
