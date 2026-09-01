<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'service_interested',
        'budget',
        'message',
        'source_page',
        'ip_address',
        'status',
        'is_forwarded',
        'forwarded_at',
        'forwarding_error',
    ];

    protected $casts = [
        'is_forwarded' => 'boolean',
        'forwarded_at' => 'datetime',
    ];
}
