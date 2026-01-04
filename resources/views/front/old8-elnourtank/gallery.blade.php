        @extends('layouts.front')

  @section('title')

      {{ __('مقالات') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop

  @section('css')
     <link rel="stylesheet" href="{{ asset('front/highline/') }}/css/articles.css">
  @stop
  @section('content')


    <section class="bg-gray-50 container mx-auto px-4 py-10" style="padding-top: 7.5rem;">

        <header class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800">   {{ __(key: 'معرض الصور') }}</h1>
            <p class="text-gray-600 mt-2">  {{ __(key: 'مجموعة من الصور المختارة') }}</p>
        </header>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($images as $image)
                
            <div class="group relative overflow-hidden rounded-lg shadow-lg cursor-pointer">
                <img src="{{ $image->media }}" alt="صورة "
                    class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                <div
                    class="absolute inset-0 bg-white bg-opacity-80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    {{-- <p class="text-gray-800 text-lg font-bold">منظر طبيعي</p> --}}
                </div>
            </div>
            @endforeach
 
        </div>

    </section>
 @stop