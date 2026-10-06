<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeachingTopic extends Model
{
    protected $fillable = [
        'title',
        'summary',
        'sort_order',
    ];
}
