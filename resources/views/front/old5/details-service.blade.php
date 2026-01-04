  @extends('layouts.front')

  @section('title')
      {{ $service->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}
  @stop

  @section('gsearch')
      <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}" />
  @stop
  @section('css')


  @stop



  @section('content')
      @php
          $phones = explode(',', $gs->phones);
          $randomPhone = Arr::random($phones);
      @endphp
      <!-- services -->
      <section class="container mx-auto px-4 md:px-8 lg:px-16 xl:px-32 min-h-screen my-10">
          <div><span class="uppercase text-accent font-semibold leading-4">{{ __('services') }}</span>
              <h2 class="text-primary font-bold text-4xl italic">{{ __('services') }}</h2>
          </div>
          <div class="flex flex-wrap my-10">
              <div class="w-full lg:w-2/3 my-10 md:w-1/2 p-4">
                  <img class="rounded" src="{{ $service->photo }}" srcset="{{ $service->photo }} 1x, {{ $service->photo }} 2x"
                      alt="{{ $service->{'title_' . $sign} }}" title="{{ $service->{'title_' . $sign} }}">
                  <div class="">
                      <h1 class="text-3xl font-bold my-4">{{ $service->{'title_' . $sign} }}</h1>
                    
                      <p class="text-gray my-4">
                          {!! $service->{'details_' . $sign} !!}
                      </p>

                  </div>


              </div> 
          </div>
      </section>
      <!-- services -->

  @stop
