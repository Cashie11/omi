<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'service',
        'preferred_date',
        'message',
    ];

    protected function casts(): array
    {
        return [
            'preferred_date' => 'date',
            'read_at' => 'datetime',
        ];
    }

    public function markAsRead(): void
    {
        if ($this->read_at === null) {
            $this->update(['read_at' => now()]);
        }
    }

    public function isRead(): bool
    {
        return $this->read_at !== null;
    }
}
