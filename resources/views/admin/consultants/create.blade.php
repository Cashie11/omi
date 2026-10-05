@extends('layouts.admin')

@section('title', 'Add Consultant')

@section('content')

    <div class="page-head">
        <h1>Add Consultant</h1>
        <a class="btn btn-brown" href="{{ route('admin.consultants.index') }}">Back</a>
    </div>

    <div class="panel">
        <form action="{{ route('admin.consultants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.consultants._form', ['consultant' => null])
            <div class="form-actions">
                <button type="submit" class="btn btn-green btn-lg">Save Consultant</button>
                <a class="btn btn-brown" href="{{ route('admin.consultants.index') }}">Cancel</a>
            </div>
        </form>
    </div>

@endsection
