@extends('layouts.admin')

@section('title', 'Edit Question')

@section('content')

    <div class="page-head">
        <h1>Edit Question</h1>
        <a class="btn btn-brown" href="{{ route('admin.faqs.index') }}">Back</a>
    </div>

    <div class="panel">
        <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.faqs._form', ['faq' => $faq])
            <div class="form-actions">
                <button type="submit" class="btn btn-green btn-lg">Save Changes</button>
                <a class="btn btn-brown" href="{{ route('admin.faqs.index') }}">Cancel</a>
            </div>
        </form>
    </div>

@endsection
