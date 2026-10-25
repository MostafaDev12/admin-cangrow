<?php

namespace App\Support;

use App\Models\Service;
use Illuminate\Support\Str;

class ServiceSeo
{
    public static function root(): string
    {
        $root = rtrim(config('app.url'), '/');

        // Match the existing production URL::forceScheme('https') policy.
        return app()->environment('production') ? preg_replace('~^http://~i', 'https://', $root) : $root;
    }

    public static function clean(?string $text): string
    {
        return trim(preg_replace('/\s+/u', ' ', strip_tags(html_entity_decode($text ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8'))));
    }

    public static function url(Service $service, string $locale): string
    {
        return self::root().($locale === 'en' ? '/en' : '').'/services/'.rawurlencode($service->{'slug_'.$locale});
    }

    public static function metadata(Service $service, $settings, string $locale): array
    {
        $title = self::clean($service->{'meta_title_'.$locale}) ?: self::clean($service->{'title_'.$locale}.' - '.$settings->{'title_'.$locale});
        $description = self::clean($service->{'meta_details_'.$locale}) ?: Str::limit(self::clean($service->{'short_details_'.$locale}) ?: self::clean($service->{'details_'.$locale}), 160);
        $photo = $service->getAttributes()['photo'] ?? null;
        $logo = $settings->getAttributes()['logo_'.$locale] ?? null;
        $image = ($service->og_image ?: $photo)
            ? self::root().'/assets/images/services/'.rawurlencode($service->og_image ?: $photo)
            : ($logo ? self::root().'/assets/images/'.rawurlencode($logo) : null);

        return compact('title', 'description', 'image') + [
            'url' => self::url($service, $locale),
            'og_title' => self::clean($service->{'og_title_'.$locale}) ?: $title,
            'og_description' => self::clean($service->{'og_description_'.$locale}) ?: $description,
        ];
    }
}
