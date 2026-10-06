@extends('layouts.admin')

@section('title', 'Add Topic')

@section('content')

    <div class="page-head">
        <h1>Add Topic</h1>
        <a class="btn btn-brown" href="{{ route('admin.teachings.index') }}">Back</a>
    </div>

    <div class="panel">
        <form action="{{ route('admin.teachings.store') }}" method="POST">
            @csrf
            @include('admin.teachings._form', ['topic' => null])
            <div class="form-actions">
                <button type="submit" class="btn btn-green btn-lg">Save Topic</button>
                <a class="btn btn-brown" href="{{ route('admin.teachings.index') }}">Cancel</a>
            </div>
        </form>
    </div>

@endsection
