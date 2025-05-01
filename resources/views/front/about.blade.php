@extends('layouts.front')

@section('title')
   
{{ __('عن أوبر') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')


    <!-- About Section -->
    <section class="container mx-auto px-4 md:px-8 lg:px-16 xl:px-32">
        <!-- Section Container -->
        <div class="py-12">
            <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
                <div id="rightToLeft" class="md:py-12">
                    <h1 class="text-4xl font-semibold  hover:text-primary transition-all duration-700">
                        {{ $ps->{'about_title_' . $sign}  ?? ''}}

                    </h1>
                    <p class="text-accent my-4 hover:text-primary transition-all duration-700">    
                        {!! $ps->{'about_details_' . $sign}  ?? ''!!}    
                      </p>
                </div>
                <div id="leftToRight" class="relative hidden md:block">
                    <img src="{{ $ps->about_photo }}" alt="About us illustration"
                        class="object-contain w-full h-full animate-hero-img">
                </div>
            </div>
        </div>

    </section>
    <!-- About Section -->
    @stop