{{-- Minimal shell isolates service HTTP behavior from unrelated global site data. --}}
@include('front.service-seo')
<h1>{{ $serviceSeo['name'] }}</h1>
