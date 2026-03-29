<?php

use App\Models\SiteImage;

if (!function_exists('site_image')) {
    function site_image($key, $prefix = 'front/mtc/')
    {
        static $cache = null;
        if ($cache === null) {
            $cache = SiteImage::pluck('path', 'key')->toArray();
        }
        $path = $cache[$key] ?? '';
        return $path ? asset($prefix . $path) : '';
    }
}
