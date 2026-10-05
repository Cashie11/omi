@extends('layouts.admin')

@section('title', 'Settings')

@section('content')

    <div class="page-head">
        <h1>Settings</h1>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf

        <div class="panel">
            <h2>Site</h2>

            <div class="field">
                <label for="site_name">Site name</label>
                <input type="text" id="site_name" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? '') }}" required>
                @error('site_name')<div class="error">{{ $message }}</div>@enderror
            </div>

            <div class="field">
                <label for="footer_tagline">Footer tagline</label>
                <input type="text" id="footer_tagline" name="footer_tagline" value="{{ old('footer_tagline', $settings['footer_tagline'] ?? '') }}">
            </div>
        </div>

        <div class="panel">
            <h2>Home Page</h2>

            <div class="field">
                <label for="hero_heading">Hero heading</label>
                <input type="text" id="hero_heading" name="hero_heading" value="{{ old('hero_heading', $settings['hero_heading'] ?? '') }}">
            </div>

            <div class="field">
                <label for="hero_subtext">Hero subtext</label>
                <input type="text" id="hero_subtext" name="hero_subtext" value="{{ old('hero_subtext', $settings['hero_subtext'] ?? '') }}">
            </div>

            <div class="field">
                <label for="hero_button_text">Hero button text</label>
                <input type="text" id="hero_button_text" name="hero_button_text" value="{{ old('hero_button_text', $settings['hero_button_text'] ?? '') }}">
            </div>

            <div class="field">
                <label for="home_intro_title">Intro title</label>
                <input type="text" id="home_intro_title" name="home_intro_title" value="{{ old('home_intro_title', $settings['home_intro_title'] ?? '') }}">
            </div>

            <div class="field">
                <label for="home_intro_text">Intro text</label>
                <textarea id="home_intro_text" name="home_intro_text" rows="6">{{ old('home_intro_text', $settings['home_intro_text'] ?? '') }}</textarea>
                <div class="hint">Separate paragraphs with a blank line.</div>
            </div>
        </div>

        <div class="panel">
            <h2>About Page</h2>

            <div class="field">
                <label for="about_heading">Heading</label>
                <input type="text" id="about_heading" name="about_heading" value="{{ old('about_heading', $settings['about_heading'] ?? '') }}">
            </div>

            <div class="field">
                <label for="about_text">About text</label>
                <textarea id="about_text" name="about_text" rows="10">{{ old('about_text', $settings['about_text'] ?? '') }}</textarea>
                <div class="hint">Separate paragraphs with a blank line. Use "What to expect" on its own line to make it a sub-heading.</div>
            </div>
        </div>

        <div class="panel">
            <h2>Contact Details</h2>

            <div class="field">
                <label for="opening_hours">Opening hours</label>
                <input type="text" id="opening_hours" name="opening_hours" value="{{ old('opening_hours', $settings['opening_hours'] ?? '') }}">
            </div>

            <div class="field">
                <label for="phone_call">Phone (click-to-call)</label>
                <input type="text" id="phone_call" name="phone_call" value="{{ old('phone_call', $settings['phone_call'] ?? '') }}">
                <div class="hint">Include the country code, for example +2348012345678.</div>
            </div>

            <div class="field">
                <label for="phone_whatsapp">WhatsApp number</label>
                <input type="text" id="phone_whatsapp" name="phone_whatsapp" value="{{ old('phone_whatsapp', $settings['phone_whatsapp'] ?? '') }}">
                <div class="hint">Include the country code, for example +2348012345678.</div>
            </div>

            <div class="field">
                <label for="social_tiktok">TikTok link</label>
                <input type="url" id="social_tiktok" name="social_tiktok" value="{{ old('social_tiktok', $settings['social_tiktok'] ?? '') }}">
                <div class="hint">Full TikTok profile link, for example https://www.tiktok.com/@username.</div>
            </div>

            <div class="field">
                <label for="contact_email_primary">Primary email</label>
                <input type="email" id="contact_email_primary" name="contact_email_primary" value="{{ old('contact_email_primary', $settings['contact_email_primary'] ?? '') }}" required>
                @error('contact_email_primary')<div class="error">{{ $message }}</div>@enderror
            </div>

            <div class="field">
                <label for="contact_email_secondary">Secondary email</label>
                <input type="email" id="contact_email_secondary" name="contact_email_secondary" value="{{ old('contact_email_secondary', $settings['contact_email_secondary'] ?? '') }}" required>
                @error('contact_email_secondary')<div class="error">{{ $message }}</div>@enderror
            </div>

            <div class="field">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="{{ old('address', $settings['address'] ?? '') }}">
            </div>

            <div class="field">
                <label for="map_embed_url">Map embed code</label>
                <textarea id="map_embed_url" name="map_embed_url" rows="4">{{ old('map_embed_url', $settings['map_embed_url'] ?? '') }}</textarea>
                <div class="hint">Paste a Google Maps "Embed a map" iframe here, or leave empty to hide the map.</div>
                @error('map_embed_url')<div class="error">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-green btn-lg">Save Changes</button>
        </div>
    </form>

@endsection
