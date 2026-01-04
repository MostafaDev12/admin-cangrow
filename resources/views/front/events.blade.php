 


      @extends('layouts.front')

  @section('title')

     {{ __('مناسبات دائمة خاصة بالمؤسسة') }} - {{ $gs->{'title_' . $sign} }}

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
                        {{ __('مناسبات دائمة خاصة بالمؤسسة') }}
                    </h1>
                     <p class="text-lg text-gray-600 mt-6 leading-relaxed max-w-2xl mx-auto">
                           {{ __('فعاليات مستمرة تنظمها مؤسسة دار التوفيق لتعزيز روح العطاء والترابط المجتمعي') }}
                    </p> {{----}}
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-16 md:mb-24">
                    <!-- Card 1 -->
                  
                    @foreach ($servicess as $service)
                        
                    <a href="{{ route('gallery-events.index', ['lang' => $sign]) }}" class="rounded-lg overflow-hidden shadow-lg bg-white group">
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
                {{-- <a href="#"
                    class="inline-flex items-center justify-center bg-custom-orange text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 hover:bg-white hover:text-custom-orange border-2 border-custom-orange focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-opacity-75">
                    <i class="fa-solid fa-arrow-left-long ml-2"></i>
                    <span>شاهد الكل</span>
                </a> --}}
                 {{-- {{ $servicess->links() }} --}}
                 {{ $servicess->links() }}
            </div>
                {{-- <div class="text-center mb-12 max-w-3xl mx-auto">
                    <div class="relative mb-10">
                        <h1 class="text-sm font-extrabold text-custom-orange mb-4">
                            فيديوهات الحفلات
                        </h1>
                        <div
                            class="font-['Aref_Ruqaa'] text-[60px] font-normal text-[color:var(--funden-heading-color)] opacity-10 tracking-[0] absolute left-0 top-[30%] w-full -translate-y-1/2 capitalize leading-[1] z-1">
                            دار التوفيق
                        </div>
                    </div>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        لحظات لا تُنسى من حفلات التكريم والفرحة التي تنظمها المؤسسة
                    </p>
                </div>

                <div class="max-w-4xl mx-auto mb-8 rounded-lg overflow-hidden shadow-lg">
                    <div class="relative aspect-video">
                        <img src="https://via.placeholder.com/800x450/e5e7eb/6b7280?text=حفل+تكريم+2024" alt="حفل تكريم"
                            class="w-full h-full object-cover">
                        <a href="#" class="absolute inset-0 flex items-center justify-center group">
                            <div
                                class="w-16 h-16 bg-red-600 bg-opacity-90 rounded-full flex items-center justify-center transition-all duration-300 group-hover:scale-110">
                                <i class="fa-solid fa-play text-white text-2xl ml-1"></i>
                            </div>
                        </a>
                    </div>
                </div> --}}
{{--  
                <div class="text-center mt-12">
                    <button
                        class="bg-gray-100 text-gray-700 font-semibold py-2 px-6 rounded-full border border-gray-300 hover:bg-gray-200 transition-colors">
                        عرض المزيد من الحفلات
                    </button>
                </div> --}}
            </div>
        </section>

   

        @include('includes.share')

    </main>

 @stop