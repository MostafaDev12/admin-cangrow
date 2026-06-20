<?php

namespace App\Support;

/**
 * Helpers for validating and normalising external embed URLs
 * (YouTube videos and Google Maps embeds).
 */
class EmbedUrl
{
    /**
     * Extract a YouTube video id from any accepted form:
     * full watch URL, youtu.be short link, embed link, shorts link, or bare id.
     */
    public static function youtubeId(?string $value): string
    {
        $value = trim((string) $value);
        if ($value === '') {
            return '';
        }

        if (str_contains($value, 'youtube.com') || str_contains($value, 'youtu.be')) {
            preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([^\&\?\/]+)/', $value, $m);
            return $m[1] ?? '';
        }

        // bare id (11 chars typical, but allow loosely)
        if (preg_match('/^[A-Za-z0-9_\-]{6,20}$/', $value)) {
            return $value;
        }

        return '';
    }

    /**
     * True when the value resolves to a usable YouTube video id.
     */
    public static function isValidYoutube(?string $value): bool
    {
        return self::youtubeId($value) !== '';
    }

    /**
     * Build the canonical embeddable YouTube URL, or '' when invalid.
     */
    public static function youtubeEmbed(?string $value): string
    {
        $id = self::youtubeId($value);
        return $id !== '' ? 'https://www.youtube.com/embed/' . $id : '';
    }

    /**
     * True when the URL belongs to Google Maps (embed iframe src,
     * full maps link, or short maps.app.goo.gl / goo.gl/maps link).
     */
    public static function isGoogleMaps(?string $value): bool
    {
        $value = trim((string) $value);
        if ($value === '') {
            return false;
        }

        $host = parse_url($value, PHP_URL_HOST);
        if (! $host) {
            return false;
        }
        $host = strtolower($host);

        $allowed = [
            'google.com', 'www.google.com',
            'maps.google.com', 'maps.app.goo.gl',
            'goo.gl', 'google.co', // covers regional google.co.* loosely below
        ];

        foreach ($allowed as $domain) {
            if ($host === $domain || str_ends_with($host, '.google.com')) {
                return true;
            }
        }

        // regional google domains e.g. google.com.eg, google.co.uk
        if (preg_match('/(^|\.)google\.[a-z.]+$/', $host)) {
            return true;
        }
        if ($host === 'maps.app.goo.gl' || $host === 'goo.gl') {
            return true;
        }

        return false;
    }
}
