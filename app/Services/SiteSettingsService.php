<?php

namespace App\Services;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;

class SiteSettingsService
{
    protected const CACHE_KEY = 'site_settings';

    protected const CACHE_TTL = 86400; // 24 jam

    /**
     * @return array<string, mixed>
     */
    public function all(): array
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function (): array {
            $settings = SiteSetting::all();
            $result = [];

            foreach ($settings as $setting) {
                $result[$setting->key] = $setting->value;
            }

            return $result;
        });
    }

    /**
     * Get a setting by key.
     */
    public function get(string $key, mixed $default = null): mixed
    {
        $all = $this->all();

        return $all[$key] ?? $default;
    }

    /**
     * Get all settings in a specific group.
     *
     * @return array<string, mixed>
     */
    public function getGroup(string $group): array
    {
        $key = 'site_'.$group;

        return (array) $this->get($key, []);
    }

    /**
     * Update settings for a group and clear cache.
     *
     * @param  array<string, mixed>  $values
     */
    public function updateGroup(string $group, array $values): void
    {
        $key = 'site_'.$group;

        SiteSetting::updateOrCreate(
            ['key' => $key],
            [
                'group' => $group,
                'value' => $values,
                'type' => 'json',
            ]
        );

        $this->clearCache();
    }

    /**
     * Clear settings cache.
     */
    public function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}
