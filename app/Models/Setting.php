<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Read a setting value by key. Values are cached for the request.
     */
    public static function get(string $key, $default = null)
    {
        static $cache = null;

        if ($cache === null) {
            $cache = static::query()->pluck('value', 'key')->all();
        }

        return $cache[$key] ?? $default;
    }

    /**
     * Store or update a single setting value.
     */
    public static function set(string $key, $value): void
    {
        static::query()->updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}
