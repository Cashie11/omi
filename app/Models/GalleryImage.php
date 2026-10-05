<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
        'path',
        'caption',
        'sort_order',
    ];

    /**
     * Public URL for the stored gallery image.
     */
    public function url(): string
    {
        return asset($this->path);
    }
}
