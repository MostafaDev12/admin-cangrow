
      @extends('layouts.front')

  @section('title')

     {{ __('خدماتنا و مشروعاتنا') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop

  @section('css')
     <link rel="stylesheet" href="{{ asset('front/highline/') }}/css/articles.css">
  @stop
  @section('content')

    <main>


        <section class="container mx-auto px-4 py-16 md:py-24">


            <div class="text-center mb-12 max-w-3xl mx-auto">
                <div class="relative mb-10">
                    <h1 class="text-sm font-extrabold text-custom-orange  mb-4">
                      {{ __('المشروعات والخدمات') }}
                    </h1>

                </div>
                <p class="text-lg text-gray-600 leading-relaxed">
                       {{ __('المشروعات والخدمات') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

                @foreach ($projects as $project)
                    
                 <div
                     class="fade-in-card group relative bg-white rounded-xl shadow-lg p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-1 overflow-hidden flex items-start gap-4">
                     <span
                         class="absolute bottom-0 right-0 h-0 w-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:h-full"></span>

                     <span
                         class="absolute bottom-0 right-0 w-0 h-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:w-full"></span>

                     <div class="flex-shrink-0 text-accent w-12 h-12 flex items-center justify-center">
                         <i class="{{ $project->icon }} text-4xl"></i>
                     </div>
                     <div>
                         <h3 class="text-xl font-bold text-gray-900 mb-1">   {!! $project->{'title_' . $sign} ?? '' !!}  </h3>
                         <p class="text-gray-500">    {!! $project->{'short_details_' . $sign} ?? '' !!}   </p>
                     </div>
                 </div>

                @endforeach
             
            </div>
        </section>

        <section class="container mx-auto px-4 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

 @foreach ($servicess as $service)
                 <!-- كارت 1 -->
                 <article
                     class="group bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                     <div class="relative overflow-hidden">
                         <img src="{!! $service->photo !!}" alt=" {!! $service->{'title_' . $sign} ?? '' !!}"
                             class="w-full h-64 object- transition-transform duration-500 ease-out group-hover:scale-110" />

                         <!-- الخط الصاعد -->
                         <span
                             class="absolute bottom-0 right-0 w-[2px] h-0 bg-custom-orange transition-all duration-500 ease-out group-hover:h-full group-hover:bottom-auto group-hover:top-0"></span>
                     </div>

                     <div class="p-6 flex-grow flex flex-col">
                         <h3 class="text-xl font-bold text-gray-900 mb-2">  {!! $service->{'title_' . $sign} ?? '' !!}    </h3>
                         <p class="text-gray-600 text-sm mb-4 flex-grow">
                              {!! $service->{'short_details_' . $sign} ?? '' !!}
                         </p>
                         <div class="flex gap-2">
                             <!-- Outline Button -->
                             <a href="{{ route('single-service-service.index', ['lang' => $sign, 'slug' => $service->{'slug_' . $sign}]) }}"
                                 class="flex-1 text-custom-orange bg-white border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-custom-orange hover:text-white">
                   {{ __('قدّم طلبك الآن') }}
                             </a>

                             <!-- Primary (Filled) Button -->
                             <a href="{{ route('single-service-service.index', ['lang' => $sign, 'slug' => $service->{'slug_' . $sign}]) }}"
                                 class="flex-1 text-white bg-custom-orange border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-white hover:text-custom-orange">
                                    {{ __('تبرع الآن') }}
                             </a>
                         </div>
                     </div>
                 </article>
  @endforeach
            </div>

            <div class="text-center mt-12">
                {{-- <a href="#"
                    class="inline-flex items-center justify-center bg-custom-orange text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 hover:bg-white hover:text-custom-orange border-2 border-custom-orange focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-opacity-75">
                    <i class="fa-solid fa-arrow-left-long ml-2"></i>
                    <span>شاهد الكل</span>
                </a> --}}
                 {{ $servicess->links('includes.pagination.custom') }}
            </div>
        </section>

        <section class="relative bg-no-repeat bg-cover bg-center py-20 flex items-center justify-center" style=" background-image:
            url('{{ asset('front/dareltawfik/') }}/assets/imgs/home/bg-1-3.png')">

            <!-- <div class="absolute inset-0 bg-blue-900 bg-opacity-80"></div> -->

            <div class="relative container mx-auto px-4 py-16 md:py-24 text-center">

                <h2 class="text-white text-3xl md:text-4xl font-bold mb-10">
               {{ __('تقرير الاعمال السنوية لمؤسسة دار التوفيق') }}
                </h2>

                <div class="flex flex-wrap items-center justify-center gap-4 md:gap-6">

                    @foreach ($timelines as $timeline)
                        <a href="#" dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}"
                         class="inline-flex items-center justify-center bg-primary text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 hover:bg-accent hover:shadow-lg hover:-translate-y-0.5">
                         <i class="fa-solid fa-arrow-left mr-2"></i>
                         <span>   {{ $timeline->{'title_' . $sign} ?? '' }}  </span>
                     </a>
@endforeach
                </div>

            </div>
        </section>
       <section class="py-16 md:py-24">
             <div class="container mx-auto px-4">

                 <div class="text-center mb-12 max-w-3xl mx-auto">
                     <div class="relative mb-10">
                         <h1 class="text-sm font-extrabold text-custom-orange  mb-4">
                          {{ __('شركاء النجاح') }}       </h1>

                     </div>
                     <p class="text-lg text-gray-600 leading-relaxed">
                         
                         {{ __('شركاء نجاح مؤسسة دار التوفيق') }}
                     </p>
                 </div>

                 <!-- Swiper -->
                 <div class="swiper partners-swiper">
                     <div class="swiper-wrapper">
                         <!-- توليد 19 شريكًا -->
                         @foreach ($reviews as $partner) 
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="{{ $partner->photo }}" alt="Partner 1"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                             @endforeach
                     </div>

                     <!-- أزرار التحكم -->
                     <div class="swiper-button-next !text-primary"></div>
                     <div class="swiper-button-prev !text-primary"></div>

                     <!-- النقاط -->
                     <div class="swiper-pagination mt-6"></div>
                 </div>
             </div>
         </section>


    </main>

 @stop