  


      @extends('layouts.front')

  @section('title')

     {{ __('الاحتفالات') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop

  @section('css')
     <link rel="stylesheet" href="{{ asset('front/highline/') }}/css/articles.css">
  @stop
  @section('content')



    <main>
        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12 max-w-3xl mx-auto">
                    <h2 class="text-6xl md:text-8xl font-extrabold text-gray-100 select-none">
                             {{ __('دار التوفيق') }} 
                    </h2>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 -mt-9 md:-mt-14">
                           {{ __('احتفالات مؤسسة دار التوفيق') }}
                    </h1>
                    <p class="text-lg text-gray-600 mt-6 leading-relaxed max-w-2xl mx-auto">
                           {{ __('لحظات فرح وتكريم نحتفل بها مع المستفيدين والداعمين لنُظهر قصص النجاح والتمكين') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-16 md:mb-24">
                    @foreach ($servicess as $service)
                        
                    <a href="{{ route('single-parties.index', ['lang' => $sign , 'slug' => $service->id ]) }}" class="rounded-lg overflow-hidden shadow-lg bg-white group">
                        <img src="{!! $service->photo !!}"
                            alt="{!! $service->{'title_' . $sign} ?? '' !!}"
                            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-slate-800">  {!! $service->{'title_' . $sign} ?? '' !!}   </h3>
                            <p class="text-gray-600 mt-2 text-sm leading-relaxed">
                                {!! $service->{'short_details_' . $sign} ?? '' !!}
                            </p>
                        </div>
                    </a>

                    @endforeach
                </div>

                <div class="text-center mt-12">
                    {{-- <button
                        class="bg-gray-100 text-gray-700 font-semibold py-2 px-6 rounded-full border border-gray-300 hover:bg-gray-200 transition-colors">
                        عرض المزيد
                    </button> --}}
                     {{ $servicess->links() }}
                </div>
            </div>
        </section>

        @include('includes.share')

    </main>

 @stop