<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    private const KEYS = [
        'site_name',
        'footer_tagline',
        'hero_heading',
        'hero_subtext',
        'hero_button_text',
        'home_intro_title',
        'home_intro_text',
        'about_heading',
        'about_text',
        'opening_hours',
        'phone_call',
        'phone_whatsapp',
        'social_tiktok',
        'contact_email_primary',
        'contact_email_secondary',
        'address',
        'map_embed_url',
    ];

    public function edit(): View
    {
        $settings = Setting::query()->pluck('value', 'key')->all();

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'contact_email_primary' => ['required', 'email'],
            'contact_email_secondary' => ['required', 'email'],
            'map_embed_url' => ['nullable', 'string', 'max:1000'],
            'site_name' => ['required', 'string', 'max:255'],
        ]);

        foreach (self::KEYS as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key));
            }
        }

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Settings saved.');
    }
}
