   @extends('layouts.front')

  @section('title')

      {{ __('doctors') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop

  @section('css')
 
  @stop
  @section('content')

    <!-- Meet Our Team -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <!-- Heading -->
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-2xl font-bold text-gray-800">{{ __('Meet Our Team') }} </h2>
                <p class="text-gray-600 mt-2">{{ __('Friendly, professional, and dedicated to your smile.') }}</p>
            </div>

            <!-- Team Grid -->
            <div class="grid md:grid-cols-4 sm:grid-cols-2 gap-8">
               
                @foreach ($doctors as $doctor)
                <!-- Team Member 1 -->
                <div class="text-center">
                    <div class="overflow-hidden rounded-lg mb-4">
                        <img src="{{ $doctor->photo_url }}"
                            alt="{{ $doctor->{'name_' . $sign}  ?? ''}}"
                            class="w-full h-auto transition-transform duration-300 hover:scale-105">
                    </div>
                    <h5 class="font-semibold text-gray-800">{{ $doctor->{'name_' . $sign}  ?? ''}}</h5>
                    <p class="text-gray-600 text-sm">{{ $doctor->{'title_' . $sign}  ?? ''}}</p>
                </div>
        @endforeach
                 
                
            </div>

          
        </div>
    </section>

    @stop