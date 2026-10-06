@extends('layouts.app')

@section('title', 'FAQ - '.setting('site_name', 'Omisewa Temple'))

@section('content')

    <section class="page-header">
        <div class="container">
            <h1>Frequently Asked Questions</h1>
            <p>Answers to common questions about our consultations.</p>
        </div>
    </section>

    <section class="section">
        <div class="container" style="max-width: 780px;">
            @if ($faqs->isNotEmpty())
                <div class="faq-list">
                    @foreach ($faqs as $faq)
                        <details class="faq-item">
                            <summary>{{ $faq->question }}</summary>
                            <p>{{ $faq->answer }}</p>
                        </details>
                    @endforeach
                </div>
            @else
                <div class="gallery-placeholder">Questions and answers will appear here soon.</div>
            @endif

            <p style="text-align: center; margin-top: 2.5rem;">
                <a class="btn btn-green btn-lg" href="{{ route('booking') }}">Book a Session</a>
            </p>
        </div>
    </section>

@endsection
