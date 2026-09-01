<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group',
        'type',
        'label',
    ];

    /**
     * Get a setting by key with fallback default
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $settings = static::getAllCached();
        return $settings[$key] ?? $default;
    }

    /**
     * Set a setting key-value pair
     */
    public static function set(string $key, mixed $value, string $group = 'general', string $type = 'text', ?string $label = null): self
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            [
                'value' => is_array($value) ? json_encode($value) : (string)$value,
                'group' => $group,
                'type' => $type,
                'label' => $label ?? ucfirst(str_replace('_', ' ', $key)),
            ]
        );

        Cache::forget('site_settings_all');
        return $setting;
    }

    /**
     * Get all settings as key-value array cached
     */
    public static function getAllCached(): array
    {
        try {
            return Cache::remember('site_settings_all', 3600, function () {
                return static::pluck('value', 'key')->toArray();
            });
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Clear the cache
     */
    public static function clearCache(): void
    {
        Cache::forget('site_settings_all');
    }
}
