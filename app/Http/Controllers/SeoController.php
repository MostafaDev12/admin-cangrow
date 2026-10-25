<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Support\ServiceSeo;

class SeoController extends Controller
{
    public function sitemap()
    {
        $xml = new \SimpleXMLElement(file_get_contents(resource_path('seo/sitemap-base.xml')));
        $root = ServiceSeo::root();
        foreach ($xml->xpath('//*[local-name()="url"]') as $entry) {
            $path = parse_url((string) $entry->loc, PHP_URL_PATH) ?: '/';
            if (preg_match('~^/(en/)?services/[^/]+/?$~u', $path)) {
                $node = dom_import_simplexml($entry);
                $node->parentNode->removeChild($node);
            } else {
                $entry->loc = $root.$path;
            }
        }
        foreach (Service::query()->where('is_published', true)->cursor() as $service) {
            // Both routes remain public even when a language is hidden from dashboard navigation.
            foreach (['ar', 'en'] as $locale) {
                if (! filled($service->{'slug_'.$locale})) {
                    continue;
                }
                $entry = $xml->addChild('url');
                $entry->addChild('loc', htmlspecialchars(ServiceSeo::url($service, $locale), ENT_XML1, 'UTF-8'));
                if ($service->updated_at) {
                    $entry->addChild('lastmod', $service->updated_at->toAtomString());
                }
            }
        }

        return response($xml->asXML(), 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    public function robots()
    {
        return response("User-agent: *\nDisallow: /?*\nDisallow: /cgi-bin/\nDisallow: /admin/\nDisallow: /api/\nSitemap: ".ServiceSeo::root()."/sitemap.xml\n", 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    }
}
