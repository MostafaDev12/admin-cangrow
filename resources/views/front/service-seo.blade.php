<title>{{ $serviceSeo['title'] }}</title>
<meta name="description" content="{{ $serviceSeo['description'] }}">
<link rel="canonical" href="{{ $serviceSeo['url'] }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $serviceSeo['url'] }}">
<meta property="og:title" content="{{ $serviceSeo['og_title'] }}">
<meta property="og:description" content="{{ $serviceSeo['og_description'] }}">
<meta property="og:locale" content="{{ ['ar' => 'ar_EG', 'en' => 'en_US', 'fr' => 'fr_FR'][$sign] ?? $sign }}">
<meta name="twitter:card" content="{{ $serviceSeo['image'] ? 'summary_large_image' : 'summary' }}">
<meta name="twitter:title" content="{{ $serviceSeo['og_title'] }}">
<meta name="twitter:description" content="{{ $serviceSeo['og_description'] }}">
@if($serviceSeo['image'])
<meta property="og:image" content="{{ $serviceSeo['image'] }}">
<meta name="twitter:image" content="{{ $serviceSeo['image'] }}">
@endif
<script type="application/ld+json">{!! json_encode(array_filter([
    '@context' => 'https://schema.org', '@type' => 'Service',
    '@id' => $serviceSeo['url'].'#service', 'url' => $serviceSeo['url'],
    'name' => $serviceSeo['name'], 'description' => $serviceSeo['description'],
    'image' => $serviceSeo['image'], 'inLanguage' => $sign,
]), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
