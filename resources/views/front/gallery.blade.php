 
@extends('layouts.front')

@section('title')
   
{{ __('معرض الصور') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')


    <section class="container mx-auto px-4 py-8">
        {{----}} <h1 class="text-3xl font-bold text-center text-primary mb-10">{{ $service->{'title_' . $sign} }} </h1> 

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
          
            @foreach ($service->galleries as $image)
                
            <!-- Image 1 -->
            <div class="overflow-hidden rounded-lg transform transition duration-300 hover:scale-105">
                <img src="{{ $image->photo_url }}" alt="{{ $service->{'title_' . $sign} }}" class="w-full h-64 object-cover">
            </div>

            @endforeach
           
        </div>
    </section>
   @stop