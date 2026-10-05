@extends('layouts.app')

@section('content')

    <section class="hero">
        <div class="container">
            <p class="hero-eyebrow">{{ setting('site_name', 'Omisewa Temple') }}</p>
            <h1 class="hero-title">{{ setting('hero_heading', 'SPIRITUAL CONSULTATIONS') }}</h1>
            <p class="hero-sub">{{ setting('hero_subtext') }}</p>
            <a class="btn btn-gold btn-lg" href="{{ route('contact') }}">{{ setting('hero_button_text', 'Contact the Temple') }}</a>
        </div>
    </section>

    <section class="section">
        <div class="container intro-grid">
            <div class="intro-text">
                <h2>{{ setting('home_intro_title', 'Welcome to Omisewa Temple') }}</h2>
                @foreach (preg_split('/\n+/', setting('home_intro_text')) as $paragraph)
                    @if (trim($paragraph) !== '')
                        <p>{{ trim($paragraph) }}</p>
                    @endif
                @endforeach
                <img src="{{ asset('images/owner.jpg') }}" alt="Omisewa Temple" class="owner-photo">
            </div>
            <div class="intro-text">
                <h3>How we can help</h3>
                <div class="help-cards">
                    <div class="card">
                        <div class="card-icon">G</div>
                        <h3>Guidance</h3>
                        <p>Gentle direction when a decision feels heavy or unclear.</p>
                    </div>
                    <div class="card">
                        <div class="card-icon">C</div>
                        <h3>Clarity</h3>
                        <p>A clearer view of a situation and the steps in front of you.</p>
                    </div>
                    <div class="card">
                        <div class="card-icon">S</div>
                        <h3>Spiritual insight</h3>
                        <p>Deeper understanding of the signs and patterns around your life.</p>
                    </div>
                    <div class="card">
                        <div class="card-icon">P</div>
                        <h3>Personal consultations</h3>
                        <p>Private, one-to-one sessions held with respect and care.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container video-layout">
            <div class="video-wrap">
                <video controls playsinline preload="metadata">
                    <source src="{{ asset('videos/welcome.mp4') }}" type="video/mp4">
                    Your browser does not support video playback.
                </video>
            </div>
            <div class="video-text">
                <h2>A warm welcome</h2>
                <p>Welcome to Omisewa Temple. This short video is a greeting from us, and we hope it gives you a gentle first sense of the space we hold for our visitors.</p>
                <p>Whether you come with a clear question or simply wish to be heard, you are welcome here. Reach out whenever you are ready.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-heading">
                <h2>Photos</h2>
                <p class="lead">Images from our practice and community.</p>
            </div>

            @if ($gallery->isNotEmpty())
                <div class="image-strip">
                    @foreach ($gallery as $image)
                        <img src="{{ $image->url() }}" alt="{{ $image->caption ?: 'Omisewa Temple' }}" loading="lazy">
                    @endforeach
                </div>
            @else
                <div class="gallery-placeholder">
                    Photos of the temple will appear here soon. Please check back.
                </div>
            @endif
        </div>
    </section>

@endsection
