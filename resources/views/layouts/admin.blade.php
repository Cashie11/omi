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

            <nav class="admin-nav">
                <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">Messages</a>
                <a href="{{ route('admin.consultants.index') }}" class="{{ request()->routeIs('admin.consultants.*') ? 'active' : '' }}">Consultants</a>
                <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">Gallery</a>
                <a href="{{ route('admin.settings.edit') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">Settings</a>
                <a href="{{ route('home') }}" target="_blank" rel="noopener">View Site</a>
                <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-gold" style="padding:0.4rem 1rem;">Log Out</button>
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
