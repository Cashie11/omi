@extends('layouts.app')

@section('title', $service->title.' - '.setting('site_name', 'Omisewa Temple'))

@section('content')

    <section class="page-header">
        <div class="container">
            <h1>{{ $service->title }}</h1>
            @if ($service->summary)
                <p>{{ $service->summary }}</p>
            @endif
        </div>
    </section>

    <section class="section">
        <div class="container" style="max-width: 780px;">
            @if ($service->what_is)
                <h2 class="about-subhead">What is it?</h2>
                <p>{{ $service->what_is }}</p>
            @endif

            @if ($service->who_for)
                <h2 class="about-subhead">Who is it for?</h2>
                <p>{{ $service->who_for }}</p>
            @endif

            @if ($service->what_happens)
                <h2 class="about-subhead">What happens during a session?</h2>
                <p>{{ $service->what_happens }}</p>
            @endif

            @if ($service->duration)
                <h2 class="about-subhead">Duration</h2>
                <p>{{ $service->duration }}</p>
            @endif

            <p style="margin-top: 2rem;">
                <a class="btn btn-green btn-lg" href="{{ route('booking') }}">Book a Session</a>
            </p>
        </div>
    </section>

@endsection
