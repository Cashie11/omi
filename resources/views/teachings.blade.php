@extends('layouts.app')

@section('title', 'Teachings & Wisdom - '.setting('site_name', 'Omisewa Temple'))

@section('content')

    <section class="page-header">
        <div class="container">
            <h1>Teachings &amp; Wisdom</h1>
            <p>Areas of guidance and wisdom shared at Omisewa Temple.</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            @if ($topics->isNotEmpty())
                <div class="teachings-grid">
                    @foreach ($topics as $topic)
                        <div class="card">
                            <h3>{{ $topic->title }}</h3>
                            @if ($topic->summary)
                                <p>{{ $topic->summary }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="gallery-placeholder">Topics will be listed here soon.</div>
            @endif

            <p style="text-align: center; margin-top: 2.5rem;">
                <a class="btn btn-green btn-lg" href="{{ route('booking') }}">Book a Session</a>
            </p>
        </div>
    </section>

@endsection
