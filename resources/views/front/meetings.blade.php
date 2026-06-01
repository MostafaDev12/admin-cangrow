 
  
 @extends('layouts.front')

 @section('title')
           {!! $service->{'title_' . $sign} ?? '' !!}- {{ $gs->{'title_' . $sign} }}
 @stop

 @section('gsearch')
     <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}" />
 @stop
 @section('css')
 
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('front/dareltawfik/') }}/assets/style/service_details.css">
    
    <style>

    </style>
 @stop



 @section('content')
     @php
         $phones = explode(',', $gs->phones);
         $randomPhone = Arr::random($phones);
     @endphp
 
 
 
  <main>

        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4">

               <div class="text-center mb-12 max-w-3xl mx-auto">
                    <h2 class="text-6xl md:text-8xl font-extrabold text-gray-100 select-none">
                           {{ __('دار التوفيق') }}     
                    </h2>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 -mt-9 md:-mt-14">
                        {{ __('اللقاءات') }} 
                    </h1>
                    <p class="text-lg text-gray-600 mt-6 leading-relaxed max-w-2xl mx-auto">
                        {{ __('اللقاءات مستمرة تنظمها مؤسسة دار التوفيق لتعزيز روح العطاء والترابط المجتمعي') }}   
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 mb-16 md:mb-24">
               @foreach ($servicess as $service)
                        
                    @foreach ($service->galleries as $image)
                        
                    <div class="rounded-lg overflow-hidden shadow-lg group">
                        <img src="{{ $image->photo_url }}"
                            alt="Gallery Image 1"
                            class="w-full h-[400px] object-fill transition-transform duration-300 group-hover:scale-105">
                    </div>
                     
                    @endforeach
             @endforeach
                    
                </div>

               
              
                 <div class="text-center mb-12 max-w-3xl mx-auto">



                    <div class="text-center mb-12 max-w-3xl mx-auto">
                        <div class="relative mb-10">
                            <h1 class="text-sm font-extrabold text-custom-orange  mb-4">
                                فيديوهات </h1>
                            <div
                                class="font-['Aref_Ruqaa'] text-[60px] font-normal text-[color:var(--funden-heading-color)] opacity-10 tracking-[0] absolute left-0 top-[30%] w-full -translate-y-1/2 capitalize leading-[1] z-1">
                                دار التوفيق
                            </div>
                        </div>
                        <p class="text-lg text-gray-600 leading-relaxed">
                            بعض فيديوهات مؤسسة دار التوفيق
                        </p>
                    </div>

                </div>
            
                

            </div>
        </section>
 
 
                
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
          @foreach ($servicess as $service)
                    
               @php
                    $videos = json_decode($service->videos, true) ?? [];
                   
                    $maxCount =  count($videos);
                @endphp
                
                
        @for($i = 0; $i < $maxCount; $i++)
            <!-- Slide 1 -->
            <div class="swiper-slide">
              <div class="aspect-video rounded-xl overflow-hidden shadow-lg">
                <iframe
                  class="w-full h-full"
                  src="{{ $videos[$i] ?? '' }}"
                  title="YouTube video"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen
                ></iframe>
              </div>
            </div>
   @endfor
     @endforeach
          </div>
    
          <!-- Navigation -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
    
          <!-- Pagination -->
          <div class="swiper-pagination"></div>
        </div>  

  

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    const swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
    });
  </script>
    </main>
 @stop

 @section('js')
    
  @stop