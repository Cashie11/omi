<?php

use App\Models\Setting;

if (! function_exists('setting')) {
    /**
     * Read a stored site setting by key, with an optional fallback.
     */
    function setting(string $key, $default = null)
    {
        return Setting::get($key, $default);
    }
}

if (! function_exists('phone_digits')) {
    /**
     * Strip everything except digits from a phone number.
     */
    function phone_digits(string $value): string
    {
        return preg_replace('/\D/', '', $value);
    }
}
