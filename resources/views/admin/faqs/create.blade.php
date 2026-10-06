@extends('layouts.admin')

@section('title', 'Add Question')

@section('content')

    <div class="page-head">
        <h1>Add Question</h1>
        <a class="btn btn-brown" href="{{ route('admin.faqs.index') }}">Back</a>
    </div>

    <div class="panel">
        <form action="{{ route('admin.faqs.store') }}" method="POST">
            @csrf
            @include('admin.faqs._form', ['faq' => null])
            <div class="form-actions">
                <button type="submit" class="btn btn-green btn-lg">Save Question</button>
                <a class="btn btn-brown" href="{{ route('admin.faqs.index') }}">Cancel</a>
            </div>
        </form>
    </div>

@endsection
