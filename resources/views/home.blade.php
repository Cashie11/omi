@extends('layouts.app')

@section('content')

    <section class="hero">
        <div class="container">
            <p class="hero-eyebrow">{{ setting('site_name', 'Omisewa Temple') }}</p>
            <h1 class="hero-title">{{ setting('hero_heading', 'SPIRITUAL CONSULTATIONS') }}</h1>
            <p class="hero-sub">{{ setting('hero_subtext') }}</p>
            <div class="hero-actions">
                <a class="btn btn-gold btn-lg" href="{{ route('booking') }}">Book a Session</a>
                <a class="btn btn-outline-cream btn-lg" href="{{ route('contact') }}">{{ setting('hero_button_text', 'Contact the Temple') }}</a>
            </div>
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
                <img src="{{ asset('images/owner.jpg') }}" alt="{{ setting('site_name', 'Omisewa Temple') }}" class="owner-photo">
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
        <div class="container">
            <div class="founder-bio">
                <h2>Meet Omisewa</h2>
                @foreach (preg_split('/\n+/', setting('founder_bio')) as $paragraph)
                    @if (trim($paragraph) !== '')
                        <p>{{ trim($paragraph) }}</p>
                    @endif
                @endforeach
                <p class="bio-more">
                    <a class="btn btn-green" href="{{ route('about') }}">Read more about Omisewa</a>
                </p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container video-layout">
            <div class="video-wrap">
                <video controls playsinline preload="metadata" poster="{{ asset('images/owner.jpg') }}">
                    <source src="{{ asset('videos/welcome.mp4') }}" type="video/mp4">
                    Your browser does not support video playback.
                </video>
            </div>
            <div class="video-text">
                <h2>A warm welcome</h2>
                <p>Welcome to Omisewa Temple. This short video is a greeting from us, and we hope it gives you a gentle first sense of the space we hold for our visitors.</p>
                <p>Whether you come with a clear question or simply wish to be heard, you are welcome here. Take your time, and reach out whenever you are ready.</p>

                <ul class="welcome-points">
                    <li><span class="welcome-point-title">Private and confidential</span> Your questions are met with respect and without judgement.</li>
                    <li><span class="welcome-point-title">Guidance and clarity</span> Honest insight rooted in the Yoruba tradition of Isese.</li>
                    <li><span class="welcome-point-title">Calm and unhurried</span> Time to talk at your own pace.</li>
                    <li><span class="welcome-point-title">Open to everyone</span> For anyone seeking direction and spiritual insight.</li>
                </ul>

                <p>
                    <a class="btn btn-outline-brown" href="{{ route('booking') }}">Request a session</a>
                </p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-heading">
                <h2>Our Services</h2>
                <p class="lead">Private consultations to guide, clarify, and support your path.</p>
            </div>

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
                <p class="center-link">
                    <a class="btn btn-outline-brown" href="{{ route('services') }}">View All Services</a>
                </p>
            @endif
        </div>
    </section>

    <section class="section section--alt">
        <div class="container">
            <div class="section-heading">
                <h2>Teachings &amp; Wisdom</h2>
                <p class="lead">Guidance shared across the areas of life people most often bring to the temple.</p>
            </div>

            @if ($topics->isNotEmpty())
                <div class="topics-grid">
                    @foreach ($topics as $topic)
                        <div class="topic-card">
                            <h3>{{ $topic->title }}</h3>
                            @if ($topic->summary)
                                <p>{{ $topic->summary }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
                <p class="center-link">
                    <a class="btn btn-outline-brown" href="{{ route('teachings') }}">Explore all teachings</a>
                </p>
            @endif
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-heading">
                <h2>How a session works</h2>
                <p class="lead">Booking is simple. You request, we confirm, and the time is yours.</p>
            </div>

            <div class="steps-grid">
                <div class="step">
                    <span class="step-number">1</span>
                    <h3>Request a time</h3>
                    <p>Tell us what you would like to discuss and choose a preferred date.</p>
                </div>
                <div class="step">
                    <span class="step-number">2</span>
                    <h3>We confirm with you</h3>
                    <p>We contact you to agree a date and time, in person or online.</p>
                </div>
                <div class="step">
                    <span class="step-number">3</span>
                    <h3>Your consultation</h3>
                    <p>A private, unhurried conversation held with care and respect.</p>
                </div>
            </div>

            <p class="center-link">
                <a class="btn btn-green btn-lg" href="{{ route('booking') }}">Book a Session</a>
            </p>
        </div>
    </section>

    @if ($consultants->isNotEmpty())
        <section class="section section--alt">
            <div class="container">
                <div class="section-heading">
                    <h2>Our Consultants</h2>
                    <p class="lead">Experienced hands, each bringing their own knowledge and care to the work.</p>
                </div>

                <div class="consultants-grid">
                    @foreach ($consultants as $consultant)
                        <div class="consultant-card">
                            <img src="{{ $consultant->photoUrl() }}" alt="{{ $consultant->name }}">
                            <h3>{{ $consultant->name }}</h3>
                            <p>{{ $consultant->bio ?: 'Biography coming soon.' }}</p>
                        </div>
                    @endforeach
                </div>

                <p class="center-link">
                    <a class="btn btn-outline-brown" href="{{ route('consultants') }}">Meet the consultants</a>
                </p>
            </div>
        </section>
    @endif

    @if ($faqs->isNotEmpty())
        <section class="section">
            <div class="container" style="max-width: 820px;">
                <div class="section-heading">
                    <h2>Common questions</h2>
                    <p class="lead">A few of the things people ask before their first visit.</p>
                </div>

                <div class="faq-list">
                    @foreach ($faqs as $faq)
                        <details class="faq-item">
                            <summary>{{ $faq->question }}</summary>
                            <p>{{ $faq->answer }}</p>
                        </details>
                    @endforeach
                </div>

                <p class="center-link">
                    <a class="btn btn-outline-brown" href="{{ route('faq') }}">See all questions</a>
                </p>
            </div>
        </section>
    @endif

    <section class="cta-band section">
        <div class="container">
            <h2>Book a Session</h2>
            <p>Request an appointment and we will get back to you to confirm a date and time.</p>
            <a class="btn btn-gold btn-lg" href="{{ route('booking') }}">Book a Session</a>
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
                        <img src="{{ $image->url() }}" alt="{{ $image->caption ?: setting('site_name', 'Omisewa Temple') }}" loading="lazy">
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
