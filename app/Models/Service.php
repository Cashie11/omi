<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'what_is',
        'who_for',
        'what_happens',
        'duration',
        'sort_order',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
