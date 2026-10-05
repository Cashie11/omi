<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    protected $fillable = [
        'name',
        'bio',
        'photo',
        'sort_order',
    ];

    /**
     * Public URL for the consultant photo, or a neutral placeholder.
     */
    public function photoUrl(): string
    {
        return $this->photo ? asset($this->photo) : asset('images/placeholder.svg');
    }
}
