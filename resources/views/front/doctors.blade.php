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
               <div class="bg-white group rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="overflow-hidden rounded-lg mb-5">
                    <img src="{{ $doctor->photo_url }}"
                        alt="{{ $doctor->{'name_' . $sign} ?? '' }}"
                        class="w-full h-50 object-cover transition-transform duration-300 hover:scale-110">
                </div>
                <div class="px-3 pb-3">
                    <h2 class="font-extrabold text-2xl text-gray-800 mb-1 truncate">{{ $doctor->{'name_' . $sign} ?? '' }}</h2>
              <p class="text-sm text-gray-600 font-medium
                          truncate
                          group-hover:whitespace-normal
                          group-hover:overflow-visible
                          group-hover:text-clip
                          transition-all duration-600 ease-in-out">
                    {{ $doctor->{'title_' . $sign} ?? '' }}
                </p>                </div>
            </div>
        @endforeach
                 
                
            </div>

          
        </div>
    </section>

    @stop