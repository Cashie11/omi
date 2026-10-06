<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') - {{ setting('site_name', 'Omisewa Temple') }}</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

    <header class="admin-topbar">
        <div class="container">
            <a class="brand" href="{{ route('admin.home') }}">
                <img src="{{ asset('images/logo.jpg') }}" alt="">
                <span>{{ setting('site_name', 'Omisewa Temple') }} Admin</span>
            </a>

            <input type="checkbox" id="admin-nav-toggle" class="admin-nav-toggle" hidden>
            <label for="admin-nav-toggle" class="admin-nav-toggle-label" aria-label="Toggle navigation">
                <span></span><span></span><span></span>
            </label>

            <nav class="admin-nav">
                <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">Messages</a>
                <a href="{{ route('admin.bookings.index') }}" class="{{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">Bookings</a>
                <a href="{{ route('admin.consultants.index') }}" class="{{ request()->routeIs('admin.consultants.*') ? 'active' : '' }}">Consultants</a>
                <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">Services</a>
                <a href="{{ route('admin.teachings.index') }}" class="{{ request()->routeIs('admin.teachings.*') ? 'active' : '' }}">Teachings</a>
                <a href="{{ route('admin.faqs.index') }}" class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">FAQs</a>
                <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">Gallery</a>
                <a href="{{ route('admin.settings.edit') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">Settings</a>
                <a href="{{ route('home') }}" target="_blank" rel="noopener">View Site</a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-gold">Log Out</button>
                </form>
            </nav>
        </div>
    </header>

    <main class="admin-main">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @yield('content')
        </div>
    </main>

</body>
</html>
