       @extends('layouts.front')

      @section('title')

          {{ __('المراجع') }} - {{ $gs->{'title_' . $sign} }}

      @stop

      @section('gsearch')
          <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
      @stop

      @section('css')

      @stop
      @section('content')


    <section class="relative h-screen w-full">
        <div class="relative h-screen w-full  bg-[url('{{ asset('front/gulddal/') }}/images/about.jpg')] md:bg-cover bg-center">
            <div class="flex flex-column items-center w-full h-full justify-center" data-carousel-item>
                <div class="text-center text-white bg-black/50 w-full py-10  mb-16">
                    <h1 class="text-4xl font-bold mb-4">
                       {{ __('المراجع') }}

                    </h1>
                    
                </div>
            </div>
    </section>
    <section id="references" class="py-20 bg-gray-950 text-gray-200" dir="rtl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($references as $model)
                    
                <!-- Poland -->
                <div class="bg-gray-900 p-6 rounded-xl shadow-lg border border-gray-800">
                    <h3 class="text-yellow-400 text-xl font-bold mb-2"> {!! $model->{'title_' . $sign} ?? '' !!}</h3>
                     
                    <p class="text-sm text-gray-400 mt-1">{!! $model->{'details_' . $sign} ?? '' !!}</p>
                </div>

                @endforeach
                
            </div>
        </div>
    </section>
     @stop