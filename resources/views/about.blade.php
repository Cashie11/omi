@extends('layouts.app')

@section('title', 'About - '.setting('site_name', 'Omisewa Temple'))

@section('content')

    <section class="page-header">
        <div class="container">
            <h1>{{ setting('about_heading', 'About Omisewa Temple') }}</h1>
            <p>Traditional spiritual consultation, rooted in the Yoruba tradition of Isese.</p>
        </div>
    </section>

    <section class="section">
        <div class="container about-layout">
            <div class="about-photo">
                <img src="{{ asset('images/owner.jpg') }}" alt="Omisewa Temple">
            </div>

            <div class="about-body">
                @foreach (preg_split('/\n+/', setting('about_text')) as $paragraph)
                    @php $clean = trim($paragraph); @endphp
                    @if ($clean !== '')
                        @if (strtolower($clean) === 'what to expect')
                            <h2 class="about-subhead">What to expect</h2>
                        @else
                            <p>{{ $clean }}</p>
                        @endif
                    @endif
                @endforeach

                <p style="margin-top: 1.75rem;">
                    <a class="btn btn-green btn-lg" href="{{ route('contact') }}">Contact the Temple</a>
                </p>
            </div>
        </div>
    </section>

@endsection
