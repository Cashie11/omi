<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', setting('site_name', 'Omisewa Temple'))</title>
    <meta name="description" content="@yield('description', 'Omisewa Temple offers traditional spiritual consultations for guidance, clarity, spiritual insight, and personal consultations.')">
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <header class="site-header">
        <nav class="nav container">
            <a class="nav-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.jpg') }}" alt="{{ setting('site_name', 'Omisewa Temple') }} logo">
                <span>{{ setting('site_name', 'Omisewa Temple') }}</span>
            </a>

            <input type="checkbox" id="nav-toggle" class="nav-toggle" hidden>
            <label for="nav-toggle" class="nav-toggle-label" aria-label="Toggle navigation">
                <span></span><span></span><span></span>
            </label>

            <ul class="nav-menu">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ route('consultants') }}" class="{{ request()->routeIs('consultants') ? 'active' : '' }}">Consultants</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-col">
                <div class="footer-brand">
                    <img src="{{ asset('images/logo.jpg') }}" alt="{{ setting('site_name', 'Omisewa Temple') }} logo">
                    <span>{{ setting('site_name', 'Omisewa Temple') }}</span>
                </div>
                <p>{{ setting('footer_tagline') }}</p>
            </div>

            <div class="footer-col">
                <h3>Explore</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('consultants') }}">Consultants</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Contact</h3>
                <ul>
                    <li><a href="mailto:{{ setting('contact_email_primary') }}">{{ setting('contact_email_primary') }}</a></li>
                    <li><a href="mailto:{{ setting('contact_email_secondary') }}">{{ setting('contact_email_secondary') }}</a></li>
                    @if (setting('phone_call'))
                        <li><a href="tel:+{{ phone_digits(setting('phone_call')) }}">{{ setting('phone_call') }}</a></li>
                    @endif
                    @if (setting('address'))
                        <li>{{ setting('address') }}</li>
                    @endif
                </ul>
            </div>

            <div class="footer-col">
                <h3>Opening Hours</h3>
                <p>{{ setting('opening_hours') }}</p>
            </div>
        </div>

        @if (setting('map_embed_url'))
            <div class="container footer-map-outer">
                <div class="footer-map">
                    {!! setting('map_embed_url') !!}
                </div>
            </div>
        @endif

        <div class="footer-bottom">
            <div class="container">
                <p>&copy; {{ date('Y') }} {{ setting('site_name', 'Omisewa Temple') }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
