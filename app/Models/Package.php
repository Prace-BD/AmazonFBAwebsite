<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'platform',
        'subtitle',
        'price_usd',
        'original_price_usd',
        'discount_badge',
        'features',
        'is_popular',
        'badge_text',
        'cta_text',
        'order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
        'price_usd' => 'decimal:2',
        'original_price_usd' => 'decimal:2',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order', 'asc');
    }

    public function scopeForPlatform($query, string $platform)
    {
        return $query->where('platform', $platform)->where('is_active', true)->orderBy('order', 'asc');
    }
}
