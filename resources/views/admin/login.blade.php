<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login - {{ setting('site_name', 'Omisewa Temple') }}</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

    <div class="login-wrap">
        <div class="login-card">
            <div class="login-brand">
                <img src="{{ asset('images/logo.jpg') }}" alt="{{ setting('site_name', 'Omisewa Temple') }} logo">
                <h1>Admin Login</h1>
                <p>{{ setting('site_name', 'Omisewa Temple') }}</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
            @endif

            <form action="{{ route('login.attempt') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="field">
                    <label style="font-weight: normal; display: flex; align-items: center; gap: 0.5rem;">
                        <input type="checkbox" name="remember" value="1" style="width: auto;">
                        Keep me signed in
                    </label>
                </div>

                <button type="submit" class="btn btn-green btn-lg btn-block">Log In</button>
            </form>

            <p style="margin-top: 1.25rem; text-align: center;">
                <a href="{{ route('home') }}">Back to website</a>
            </p>
        </div>
    </div>

</body>
</html>
