@extends('layouts.app')

@section('title', 'Contact - '.setting('site_name', 'Omisewa Temple'))

@section('content')

    <section class="page-header">
        <div class="container">
            <h1>Contact Us</h1>
            <p>We would be glad to hear from you. Send us a message and we will get back to you.</p>
        </div>
    </section>

    <section class="section">
        <div class="container contact-layout">

            <div>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">Please check the form and try again.</div>
                @endif

                <form id="contact-form" class="contact-form" action="{{ route('contact.store') }}" method="POST">
                    @csrf

                    {{-- Honeypot: hidden from people, ignored if filled by a bot. --}}
                    <div class="honeypot" aria-hidden="true">
                        <label for="website">Website</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <input type="hidden" name="form_time" id="form_time" value="">

                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')<div class="error">{{ $message }}</div>@enderror
                    </div>

                    <div class="field">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">
                        @error('phone')<div class="error">{{ $message }}</div>@enderror
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')<div class="error">{{ $message }}</div>@enderror
                    </div>

                    <div class="field">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required>{{ old('message') }}</textarea>
                        @error('message')<div class="error">{{ $message }}</div>@enderror
                    </div>

                    <button type="submit" class="btn btn-green btn-lg btn-block">Send Message</button>
                </form>
            </div>

            <div>
                <div class="contact-details">
                    <h3>Get in touch</h3>
                    <ul>
                        <li>
                            <span class="label">Email</span>
                            <a href="mailto:{{ setting('contact_email_primary') }}">{{ setting('contact_email_primary') }}</a><br>
                            <a href="mailto:{{ setting('contact_email_secondary') }}">{{ setting('contact_email_secondary') }}</a>
                        </li>
                        @if (setting('phone_call'))
                            <li>
                                <span class="label">Phone</span>
                                <a href="tel:+{{ phone_digits(setting('phone_call')) }}">{{ setting('phone_call') }}</a>
                            </li>
                        @endif
                        <li>
                            <span class="label">Opening hours</span>
                            {{ setting('opening_hours') }}
                        </li>
                        @if (setting('address'))
                            <li>
                                <span class="label">Address</span>
                                {{ setting('address') }}
                            </li>
                        @endif
                    </ul>

                    @include('partials.social-links')
                </div>
            </div>

        </div>
    </section>

@endsection

@push('scripts')
<script>
    (function () {
        var started = Date.now();
        var form = document.getElementById('contact-form');
        var timer = document.getElementById('form_time');

        if (form && timer) {
            form.addEventListener('submit', function () {
                timer.value = Math.floor((Date.now() - started) / 1000);
            });
        }
    })();
</script>
@endpush
