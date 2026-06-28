@extends('layouts.front')

@section('title')
    {{ __('services') }} - {{ $gs->{'title_' . $sign} }}
@stop

@section('gsearch')
    <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}" />
@stop

@section('content')

<section class="bg-white py-12 px-4 max-w-7xl mx-auto overflow-hidden">

    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold mb-4">
            {{ __('Service Is Our #1 Priority.') }}
        </h2>

        <p class="text-gray-600 max-w-2xl mx-auto">
            {{ __('We want to ensure that your visit to the dentist is as pleasant as possible. Innova Dental uses the most advanced and proven technology to help you maintain that beautiful smile and to ensure that your next visit is an enjoyable one!') }}
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($parentservices as $k => $home_service)

            @php
                $serviceUrl = route('single-service.index', [
                    'lang' => $sign,
                    'slug' => $home_service->{'slug_' . $sign}
                ]);
            @endphp

            <div class="text-center rounded shadow overflow-hidden p-4">

                <a href="{{ $serviceUrl }}"
                   target="_blank"
                   rel="noopener noreferrer">
                    <img src="{{ $home_service->photo_url }}"
                         alt="{{ $home_service->{'title_' . $sign} }}"
                         class="mx-auto mb-4 w-50 h-30 object-contain">
                </a>

                <h4 class="text-xl font-semibold py-2">
                    <a href="{{ $serviceUrl }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="hover:text-blue-500">
                        {{ $home_service->{'title_' . $sign} }}
                    </a>
                </h4>

                <p class="text-gray-600">
                    <a href="{{ $serviceUrl }}"
                       target="_blank"
                       rel="noopener noreferrer">
                        {{ $home_service->{'short_details_' . $sign} }}
                    </a>
                </p>

            </div>

        @endforeach

    </div>

</section>

{{-- 
<section class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        @foreach ($services as $service)
            @if(count($service->galleries) > 0)

                <h1 class="text-2xl font-bold mb-4">
                    {{ $service->{'title_' . $sign} }}
                </h1>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    @foreach ($service->galleries as $gallery)
                        <div class="overflow-hidden rounded-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                            <img src="{{ $gallery->photo_url }}"
                                 alt="{{ $service->{'title_' . $sign} }}"
                                 class="w-full h-auto object-cover transition-transform duration-500 hover:rotate-1">
                        </div>
                    @endforeach
                </div>

            @endif
        @endforeach
    </div>
</section>
--}}

@stop