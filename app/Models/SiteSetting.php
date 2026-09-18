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

    /**
     * Get multi-line HTML formatted office address
     */
    public static function getFormattedAddress(): string
    {
        $street1 = static::get('contact_street1');
        $street2 = static::get('contact_street2');
        $city = static::get('contact_city');
        $state = static::get('contact_state');
        $zip = static::get('contact_zip');
        $country = static::get('contact_country');

        if ($street1 || $city || $country) {
            $lines = [];
            if (!empty($street1)) {
                $lines[] = e($street1);
            }
            if (!empty($street2)) {
                $lines[] = e($street2);
            }

            $cityStateZipParts = [];
            if (!empty($city)) {
                $cityStateZipParts[] = !empty($state) ? e($city) . ',' : e($city);
            }
            if (!empty($state)) {
                $cityStateZipParts[] = e($state);
            }
            if (!empty($zip)) {
                $cityStateZipParts[] = e($zip);
            }

            if (!empty($cityStateZipParts)) {
                $lines[] = implode(' ', $cityStateZipParts);
            }

            if (!empty($country)) {
                $lines[] = e($country);
            }

            return implode('<br>', $lines);
        }

        // Fallback to legacy single contact_address if individual fields not defined yet
        $legacy = static::get('contact_address', '7901 4th St N, Suite 300, St. Petersburg, FL 33702, USA');
        return e($legacy);
    }

    /**
     * Get single line formatted office address
     */
    public static function getSingleLineAddress(): string
    {
        $street1 = static::get('contact_street1');
        $street2 = static::get('contact_street2');
        $city = static::get('contact_city');
        $state = static::get('contact_state');
        $zip = static::get('contact_zip');
        $country = static::get('contact_country');

        if ($street1 || $city || $country) {
            $cityState = trim(implode(', ', array_filter([$city, $state])));
            $cityStateZip = trim(implode(' ', array_filter([$cityState, $zip])));
            $parts = array_filter([$street1, $street2, $cityStateZip, $country]);
            return implode(', ', $parts);
        }

        return static::get('contact_address', '7901 4th St N, Suite 300, St. Petersburg, FL 33702, USA');
    }
}
