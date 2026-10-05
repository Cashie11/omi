@extends('layouts.app')

@section('title', 'Consultants - '.setting('site_name', 'Omisewa Temple'))

@section('content')

    <section class="page-header">
        <div class="container">
            <h1>Our Consultants</h1>
            <p>Each consultant at Omisewa Temple brings their own knowledge and care to the work. You are welcome to ask about a consultant before you visit.</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="consultants-grid">
                @forelse ($consultants as $consultant)
                    <div class="consultant-card">
                        <img src="{{ $consultant->photoUrl() }}" alt="{{ $consultant->name }}">
                        <h3>{{ $consultant->name }}</h3>
                        <p>{{ $consultant->bio ?: 'Biography coming soon.' }}</p>
                    </div>
                @empty
                    <div class="empty" style="grid-column: 1 / -1;">
                        <p>Our consultants will be listed here soon.</p>
                    </div>
                @endforelse
            </div>

            <p style="text-align: center; margin-top: 2.5rem;">
                <a class="btn btn-green btn-lg" href="{{ route('contact') }}">Contact Us</a>
            </p>
        </div>
    </section>

@endsection
