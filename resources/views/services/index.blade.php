@extends('layouts.app')

@section('title', 'Services - '.setting('site_name', 'Omisewa Temple'))

@section('content')

    <section class="page-header">
        <div class="container">
            <h1>Services</h1>
            <p>Each service is a private, one-to-one consultation. Choose the one that speaks to your needs.</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            @if ($services->isNotEmpty())
                <div class="services-grid">
                    @foreach ($services as $service)
                        <a class="service-card" href="{{ route('services.show', $service) }}">
                            <h3>{{ $service->title }}</h3>
                            @if ($service->summary)
                                <p>{{ $service->summary }}</p>
                            @endif
                            @if ($service->duration)
                                <span class="service-duration">{{ $service->duration }}</span>
                            @endif
                        </a>
                    @endforeach
                </div>
            @else
                <div class="gallery-placeholder">Services will be listed here soon.</div>
            @endif

            <p style="text-align: center; margin-top: 2.5rem;">
                <a class="btn btn-green btn-lg" href="{{ route('booking') }}">Book a Session</a>
            </p>
        </div>
    </section>

@endsection
