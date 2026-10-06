@extends('layouts.admin')

@section('title', 'FAQs')

@section('content')

    <div class="page-head">
        <h1>FAQ</h1>
        <a class="btn btn-green" href="{{ route('admin.faqs.create') }}">Add Question</a>
    </div>

    @if ($faqs->isEmpty())
        <div class="panel">
            <div class="empty">
                <p>No questions yet.</p>
                <a class="btn btn-green" href="{{ route('admin.faqs.create') }}">Add Question</a>
            </div>
        </div>
    @else
        <div class="panel">
            <table>
                <thead>
                    <tr>
                        <th>Question</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $faq)
                        <tr>
                            <td data-label="Question">{{ $faq->question }}</td>
                            <td data-label="Actions">
                                <div class="list-actions">
                                    <a class="btn btn-sm btn-brown" href="{{ route('admin.faqs.edit', $faq) }}">Edit</a>
                                    <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" onsubmit="return confirm('Remove this question?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
