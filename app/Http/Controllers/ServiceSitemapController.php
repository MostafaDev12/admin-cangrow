<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Support\ServiceSeo;

class ServiceSitemapController extends Controller
{
    public function __invoke()
    {
        return response()->stream(function () {
            echo '<?xml version="1.0" encoding="UTF-8"?>';
            echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
            foreach (Service::where('is_published', true)->cursor() as $service) {
                $seen = [];
                foreach (config('service_seo.locales') as $locale) {
                    $slug = $service->getAttribute('slug_'.$locale);
                    if (blank($slug) || in_array($slug, $seen, true)) {
                        continue;
                    }
                    $seen[] = $slug;
                    echo '<url><loc>'.htmlspecialchars(ServiceSeo::url($slug), ENT_XML1 | ENT_QUOTES, 'UTF-8').'</loc>';
                    if ($service->updated_at) {
                        echo '<lastmod>'.$service->updated_at->toAtomString().'</lastmod>';
                    }
                    echo '</url>';
                }
            }
            echo '</urlset>';
        }, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }
}
