@extends('layouts.app')

@section('title', 'Book a Session - '.setting('site_name', 'Omisewa Temple'))

@section('content')

    <section class="page-header">
        <div class="container">
            <h1>Book a Session</h1>
            <p>Request an appointment and we will get back to you to confirm a date and time.</p>
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

                <form id="booking-form" class="contact-form" action="{{ route('booking.store') }}" method="POST">
                    @csrf

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
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')<div class="error">{{ $message }}</div>@enderror
                    </div>

                    @if ($services->isNotEmpty())
                        <div class="field">
                            <label for="service">What would you like to book?</label>
                            <select id="service" name="service">
                                <option value="">Please choose...</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->title }}" @selected(old('service') === $service->title)>{{ $service->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="field">
                        <label for="preferred_date">Preferred date</label>
                        <input type="date" id="preferred_date" name="preferred_date" value="{{ old('preferred_date') }}" required>
                        @error('preferred_date')<div class="error">{{ $message }}</div>@enderror
                    </div>

                    <div class="field">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Anything you would like us to know...">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-green btn-lg btn-block">Request Appointment</button>
                </form>
            </div>

            <div>
                <div class="contact-details">
                    <h3>What happens next</h3>
                    <ul>
                        <li><span class="label">We receive your request</span> Your details are sent safely to the temple.</li>
                        <li><span class="label">We confirm with you</span> We contact you to agree a date and time.</li>
                        <li><span class="label">Your session</span> A private, unhurried consultation.</li>
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
        var form = document.getElementById('booking-form');
        var timer = document.getElementById('form_time');

        if (form && timer) {
            form.addEventListener('submit', function () {
                timer.value = Math.floor((Date.now() - started) / 1000);
            });
        }
    })();
</script>
@endpush
