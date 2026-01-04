 @extends('layouts.front')

@section('title')
   
{{ __('services') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

    <section class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4">
             @foreach ($services as $service)
             @if(count($service->galleries) > 0)
            <h3 class="text-2xl font-bold mb-4">{{ $service->{'title_' . $sign} }}</h3>
           
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
               @foreach ($service->galleries as $gallery)
                <div
                    class="overflow-hidden rounded-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <img src="{{ $gallery->photo }}" alt="{{ $service->{'title_' . $sign} }}"
                        class="w-full h-auto object-cover transition-transform duration-500 hover:rotate-1">
                </div>
                   
               @endforeach
                 
            </div>
            @endif
           @endforeach
        </div>
    </section>
   @stop