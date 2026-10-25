<?php

namespace App\Support;

use App\Models\Service;
use Illuminate\Support\Str;

class ServiceSeo
{
    private static function localized(Service $service, string $field, string $locale): string
    {
        return trim(strip_tags((string) $service->getAttribute($field.'_'.$locale)));
    }

    public static function origin(): string
    {
        $origin = rtrim(config('service_seo.origin'), '/');

        return app()->environment('production') ? preg_replace('/^http:/i', 'https:', $origin) : $origin;
    }

    public static function text(Service $service, string $field, string $locale): string
    {
        foreach (array_unique([$locale, 'en', 'ar', 'fr']) as $language) {
            $value = self::localized($service, $field, $language);
            if ($value !== '') {
                return $value;
            }
        }

        return '';
    }

    public static function url(string $slug): string
    {
        return self::origin().route('single-service.index', ['slug' => $slug], false);
    }

    public static function metadata(Service $service, string $locale): array
    {
        $name = self::text($service, 'title', $locale) ?: 'Service '.$service->id;
        $title = self::localized($service, 'meta_title', $locale) ?: $name;
        $description = self::localized($service, 'meta_details', $locale)
            ?: Str::limit(self::localized($service, 'short_details', $locale) ?: self::localized($service, 'details', $locale)
                ?: self::text($service, 'meta_details', $locale) ?: self::text($service, 'short_details', $locale)
                ?: self::text($service, 'details', $locale) ?: $name, 160, '');
        $slug = self::text($service, 'slug', $locale);
        $image = $service->og_image ? self::origin().'/assets/images/services/'.$service->og_image :
            ($service->getRawOriginal('photo') ? self::origin().'/assets/images/services/'.$service->getRawOriginal('photo') : null);

        return compact('name', 'title', 'description', 'image') + [
            'url' => self::url($slug),
            'og_title' => self::localized($service, 'og_title', $locale) ?: $title,
            'og_description' => self::localized($service, 'og_description', $locale) ?: $description,
        ];
    }
}
