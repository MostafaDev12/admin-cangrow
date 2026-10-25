@php($seo = \App\Support\ServiceSeo::metadata($service, $gs, $sign))
<title>{{ $seo['title'] }}</title>
<meta name="description" content="{{ $seo['description'] }}">
<link rel="canonical" href="{{ $seo['url'] }}">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $seo['og_title'] }}">
<meta property="og:description" content="{{ $seo['og_description'] }}">
<meta property="og:url" content="{{ $seo['url'] }}">
<meta name="twitter:card" content="{{ $seo['image'] ? 'summary_large_image' : 'summary' }}">
<meta name="twitter:title" content="{{ $seo['og_title'] }}">
<meta name="twitter:description" content="{{ $seo['og_description'] }}">
@if($seo['image'])
<meta property="og:image" content="{{ $seo['image'] }}">
<meta name="twitter:image" content="{{ $seo['image'] }}">
@endif
<script type="application/ld+json">{!! json_encode(['@context' => 'https://schema.org', '@type' => 'Service', 'name' => \App\Support\ServiceSeo::clean($service->{'title_'.$sign}), 'description' => $seo['description'], 'url' => $seo['url'], 'provider' => ['@type' => 'Organization', 'name' => $gs->{'title_'.$sign}, 'url' => \App\Support\ServiceSeo::root()]], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
