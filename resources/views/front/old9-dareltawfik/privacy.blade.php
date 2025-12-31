 
       @extends('layouts.front')

      @section('title')

          {{ __('سياسة الخصوصية') }} - {{ $gs->{'title_' . $sign} }}

      @stop

      @section('gsearch')
          <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
      @stop

      @section('css')

      @stop
      @section('content')


    <main>
        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4 max-w-5xl">


                <div class="text-center mb-12 max-w-3xl mx-auto">
                    <div class="relative mb-10">
                        <h1 class="text-sm font-extrabold text-custom-orange  mb-4">
                               {{ __('سياسة الخصوصية') }}
                        </h1>

                    </div>

                </div>
                <p class="text-gray-700 text-base md:text-lg leading-relaxed text-justify">
                     {!! optional($ps)->{'our_team_details_' . $sign} !!}
                </p>

            </div>
        </section>
      
        
         @include('includes.share')
    </main>

 @stop