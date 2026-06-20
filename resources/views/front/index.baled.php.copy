      @extends('layouts.front')

      @section('title')

          {{ $gs->{'title_' . $sign} }}

      @stop

      @section('gsearch')
          <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
      @stop


      @section('content')

          @php
              $phones = explode(',', $gs->phones);
              $emails = explode(',', $gs->emails);

              $randomPhone = Arr::random($phones);
          @endphp



<!-- HERO SECTION -->
<section class="relative min-h-[660px] md:min-h-[720px] overflow-hidden text-white">

    <!-- Mobile Background -->
    <div class="absolute inset-0 block md:hidden bg-[#0b4fa8]">

        <img
            src="{{ asset('assets/images/doctors /team-hero2-mobile.webp') }}"
            alt="Tooth Guard Team"
            class="absolute inset-0 w-full h-full object-cover object-top"
        >

    </div>

    <!-- Desktop Background -->
    <div class="absolute inset-0 hidden md:block">

        <img
            src="{{ asset('assets/images/doctors /team-hero.webp') }}"
            alt="Tooth Guard Team"
            class="absolute inset-0 w-full h-full object-cover object-center"
        >

    </div>

    <!-- Blue / Green Overlay -->
    <div class="absolute inset-0
                bg-gradient-to-r
                from-blue-700/90
                via-blue-600/55
                to-green-600/55">
    </div>

    <!-- Bottom Overlay -->
    <div class="absolute inset-0
                bg-gradient-to-t
                from-[#062e67]/75
                via-[#062e67]/10
                to-transparent">
    </div>

 <!-- Content -->
<div class="relative z-10 container mx-auto
            min-h-[660px] md:min-h-[720px]
            flex items-end
            justify-center md:justify-start
            px-5 md:px-16
            pb-6 md:pb-8">

    <div
        dir="{{ $sign === 'en' ? 'ltr' : 'rtl' }}"
        class="w-full md:w-1/2
               text-center
               {{ $sign === 'en' ? 'md:text-left' : 'md:text-right' }}">

        <h1 class="text-3xl sm:text-4xl md:text-5xl
                   font-extrabold mb-5 md:mb-6
                   leading-tight drop-shadow-lg">

            {{ $slider->{'title_' . $sign} ?? '' }}
        </h1>

        <div class="mx-auto md:mx-0 max-w-xl
                    text-sm sm:text-lg md:text-xl
                    mb-7 md:mb-8
                    leading-7 sm:leading-8 md:leading-relaxed
                    text-white/95 drop-shadow-md">

            {!! $slider->{'details_' . $sign} ?? '' !!}
        </div>

        <div class="flex flex-wrap
                    justify-center md:justify-start
                    gap-3 md:gap-4">

            <a
                href="{{ route('about.index'.$lang, $lang) }}"
                class="inline-flex items-center justify-center
                       bg-green-500 hover:bg-green-600
                       text-white font-semibold
                       text-sm sm:text-lg
                       py-3 px-6 sm:px-8
                       rounded-full shadow-lg
                       transition duration-300">

                {{ __('معلومات عنا') }}
            </a>

            <a
                href="{{ route('contact.index'.$lang, $lang) }}"
                class="inline-flex items-center justify-center
                       bg-transparent border-2 border-white
                       hover:bg-white hover:text-blue-600
                       text-white font-semibold
                       text-sm sm:text-lg
                       py-3 px-6 sm:px-8
                       rounded-full
                       transition duration-300">

                {{ __('احجز موعدك') }}
            </a>

        </div>

    </div>

</div>

</section>

          <!--<section class="bg-gradient-to-r from-blue-500 to-green-600 text-white py-16 px-4 md:px-16">-->
          <!--    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-8">-->
          <!--        <div class="md:w-1/2 text-center md:text-right">-->
          <!--            <img src="{{ $gs->{'logo_' . $sign} }}" alt="Tooth Guard Clinic"-->
          <!--                class="w-64 sm:w-80 mx-auto md:mx-0 mb-8">-->
          <!--            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-6"> {{ $slider->{'title_' . $sign} ?? '' }}-->
          <!--            </h1>-->
          <!--            <p class="text-base sm:text-lg md:text-xl mb-8 leading-relaxed">-->
          <!--                {!! $slider->{'details_' . $sign} ?? '' !!}-->
          <!--            </p>-->
          <!--            <div class="flex justify-center md:justify-start space-x-4 space-x-reverse">-->
          <!--                <a href="{{ route('about.index'.$lang,$lang) }}"-->
          <!--                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm sm:text-lg py-2 px-4 sm:px-8 rounded-full transition duration-300">-->
          <!--                    {{ __('معلومات عنا') }}-->
          <!--                </a>-->
          <!--                <a href="{{ route('contact.index'.$lang,$lang) }}"-->
          <!--                    class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-500 text-white font-semibold text-sm sm:text-lg py-2 px-4 sm:px-8 rounded-full transition duration-300">-->
          <!--                    {{ __('احجز موعدك') }}-->
          <!--                </a>-->
          <!--            </div>-->
          <!--        </div>-->
          <!--        <div class="md:w-1/2 mt-8 md:mt-0 flex justify-center">-->
          <!--            <img src="{{ $slider->{'photo'} ?? '' }}" alt="Tooth Guard Clinic"-->
          <!--                class="rounded-lg shadow-lg w-full max-w-md h-auto object-cover">-->
          <!--        </div>-->
          <!--    </div>-->
          <!--</section>-->
   
          
          
          <section class="sm:py-16 py-10">
              <div class="sm:px-32 px-10 mx-auto text-center">
                  <h2 class="sm:text-4xl text-lg font-bold text-blue-800 mb-12">
                      {{ __('طب الأسنان الشامل') }} <br> {{ __('لكل حاجة') }}
                  </h2>
                  <div class="swiper mySwiper overflow-hidden">
                      <div class="swiper-wrapper">
                       
                          @foreach ($services as $k => $service)
                              <div class="swiper-slide">
                                  <div
                                      class="h-80 w-full bg-gradient-to-b from-blue-700 to-green-500 text-white p-6 sm:p-10 rounded-lg shadow-lg">
                                      <img src="{{ $gs->{'logo_' . $sign} }}" alt="Cosmetic Fillings"
                                          class="mx-auto w-20  mb-4">
                                      <h3 class="text-xl sm:text-2xl font-bold mb-2">
                                          {{ $service->{'title_' . $sign} ?? '' }} </h3>
                                      <p class="text-sm"> {!! $service->{'short_details_' . $sign} ?? '' !!} </p>
                                      <div class="my-10">
                                          <a href="{{ route('single-service.index'.$lang, ['slug' => $service->{'slug_' . $sign} ,'lang'=> $lang]) }}"
                                              class="text-sm sm:text-md border border-gray-200 border-opacity-30 p-2 rounded-sm shadow-lg transform transition duration-500 ease-in-out hover:scale-125">
                                              {{ __('أقرأ المزيد') }}
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          @endforeach



                      </div>
                  </div>
                  <div class="mt-8">
                      <a href="{{ route('services.index'.$lang,$lang) }}"
                          class="bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-6 rounded-full shadow-md transition duration-300">

                          {{ __('اكتشف المزيد من خدماتنا') }}


                      </a>
                  </div>
              </div>
          </section>
      
      <!-- تجارب مرضانا -->
<section id="testimonials"
    class="relative -mt-6 pt-8 pb-12 md:pt-10 md:pb-14 overflow-hidden bg-gradient-to-br from-[#f8fbff] via-white to-[#eef7ff] rounded-[32px]">

    <!-- Background Decoration -->
    <div class="pointer-events-none absolute -top-24 -left-24 w-72 h-72 rounded-full bg-[#1670d8]/10 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-28 -right-20 w-80 h-80 rounded-full bg-[#12a86b]/10 blur-3xl"></div>

    <div class="relative container mx-auto px-4 lg:px-8 xl:max-w-7xl">

        <!-- Section Header -->
        <div class="text-center mb-10 md:mb-14">

            <div class="flex items-center justify-center gap-4 mb-4">
                <span class="w-20 h-px bg-gradient-to-l from-transparent to-[#1670d8]/40"></span>

                <span class="w-11 h-11 rounded-full bg-white shadow-md border border-[#dcecff] text-[#1670d8] flex items-center justify-center">
                    <i class="fa-solid fa-heart-pulse text-lg"></i>
                </span>

                <span class="w-20 h-px bg-gradient-to-r from-transparent to-[#1670d8]/40"></span>
            </div>

            <h2 class="text-3xl md:text-5xl font-extrabold text-[#10233f] leading-tight">
                {{ __('تجارب مرضانا') }}
            </h2>

            <p class="mt-4 text-sm md:text-lg text-[#607086] leading-8 max-w-2xl mx-auto">
                {{ __('آراء مرضانا وثقتهم هي ما يدفعنا لتقديم أفضل رعاية صحية يومًا بعد يوم') }}
            </p>

        </div>

        @php
            $patients = [
                [
                    'name' => 'hazem khaled',
                    'country' => __('مصر'),
                    'review' => __('افضل عيادة اسنان فى مدينة نصر تقريبا متخصصين فى كل ما يخص الاسنان من تقويم اسنان زراعة اسنان.')
                ],
                [
                    'name' => 'Sama Emad',
                    'country' => __('مصر'),
                    'review' => __('تجربه ممتازه ودكاتره ممتازين واكتر حاجه مريحه بنسبالي هيا التعقيم والمواعيد ودي اكتر حاجه بيهتمو بيه حقيقي علي غير مراكز تانيه كتير شكرا توث جارد علي تجربتي معاكو 🌸')
                ],
                [
                    'name' => 'Mohamed Abdelkader',
                    'country' => __('مصر'),
                    'review' => __('من افضل الاماكن والتعامل ويقدم افضل خدمة وخامة محترمة جدااا جداا.')
                ],
                [
                    'name' => 'Nour',
                    'country' => __('مصر'),
                    'review' => __('أفضل تجربة لي، احترافية عالية. أنصح بها بشدة.')
                ],
                [
                    'name' => 'Ahmed Fouad',
                    'country' => __('مصر'),
                    'review' => __('عيادة ممتازة مع أطباء ممتازين.')
                ],
                [
                    'name' => 'Ahmed Ghaly',
                    'country' => __('مصر'),
                    'review' => __('تجربة رائعة.')
                ],
                [
                    'name' => 'Wafaa Hegab',
                    'country' => __('مصر'),
                    'review' => __('أفضل الأطباء وأفضل عيادة.')
                ],
                [
                    'name' => 'Ziad Muhammad',
                    'country' => __('مصر'),
                    'review' => __('عيادة أسنان تحفة في كل حاجة حرفيا نضافة جوده معاملة احترافيه بجد شكرا ليكم ❤️.')
                ],
                [
                    'name' => 'Mohamed Hegab',
                    'country' => __('مصر'),
                    'review' => __('عيادة أسنان رائعة حقًا.')
                ],
            ];
        @endphp

        <div class="relative px-10 md:px-14">

            <!-- Left Button -->
            <button
                type="button"
                onclick="scrollPatients('left')"
                aria-label="Previous"
                class="absolute left-0 top-1/2 z-20 -translate-y-1/2
                       w-10 h-10 md:w-12 md:h-12
                       rounded-full bg-white shadow-xl
                       border border-[#e3eefb]
                       text-[#1670d8]
                       flex items-center justify-center
                       hover:bg-[#1670d8] hover:text-white
                       transition-all duration-300">

                <i class="fa-solid fa-chevron-left text-sm"></i>
            </button>

            <!-- Right Button -->
            <button
                type="button"
                onclick="scrollPatients('right')"
                aria-label="Next"
                class="absolute right-0 top-1/2 z-20 -translate-y-1/2
                       w-10 h-10 md:w-12 md:h-12
                       rounded-full bg-white shadow-xl
                       border border-[#e3eefb]
                       text-[#1670d8]
                       flex items-center justify-center
                       hover:bg-[#1670d8] hover:text-white
                       transition-all duration-300">

                <i class="fa-solid fa-chevron-right text-sm"></i>
            </button>

            <!-- Slider -->
            <div
                id="patientsSlider"
                dir="ltr"
                class="flex gap-5 md:gap-6 overflow-x-auto
                       scroll-smooth snap-x snap-mandatory
                       py-6 no-scrollbar">

                @foreach($patients as $patient)

                    @php
                        $name = trim($patient['name']);
                        $initial = mb_substr($name, 0, 1, 'UTF-8');

                        // الكارت الثاني في كل 3 كروت مميز على الديسكتوب
                        $featured = $loop->iteration % 3 === 2;
                    @endphp

                    <div class="patient-card group shrink-0 snap-center
                                w-full
                                md:w-[calc((100%_-_24px)/2)]
                                lg:w-[calc((100%_-_48px)/3)]">

                        <div
                            dir="rtl"
                            class="relative h-full
                                   min-h-[340px] md:min-h-[360px]
                                   bg-white rounded-[30px]
                                   border overflow-hidden
                                   transition-all duration-300

                                   {{ $featured
                                       ? 'border-[#1670d8]/45 shadow-[0_24px_70px_rgba(22,112,216,0.18)] lg:-translate-y-3'
                                       : 'border-[#e8eef6] shadow-[0_18px_50px_rgba(15,39,64,0.08)]'
                                   }}

                                   group-hover:-translate-y-2
                                   group-hover:shadow-[0_24px_70px_rgba(15,39,64,0.14)]">

                            <!-- Google Logo -->
                            <img
                                src="{{ asset('assets/images/slider/google-icon.webp') }}"
                                alt="Google Review"
                                class="absolute top-5 left-5 z-10
                                       w-6 h-6 object-contain"
                                loading="lazy"
                                decoding="async">

                            @if($featured)

                                <!-- Top Gradient -->
                                <div class="absolute top-0 left-0 right-0 h-1
                                            bg-gradient-to-l
                                            from-[#12a86b]
                                            via-[#1670d8]
                                            to-[#38bdf8]">
                                </div>

                                <!-- Featured Star -->
                                <div class="absolute -top-px left-1/2 -translate-x-1/2
                                            w-11 h-11 rounded-full
                                            bg-[#1670d8] text-white
                                            shadow-lg
                                            flex items-center justify-center">

                                    <i class="fa-regular fa-star text-base"></i>
                                </div>

                            @endif

                            <div class="h-full p-6 md:p-7
                                        {{ $featured ? 'pt-9' : '' }}
                                        flex flex-col">

                                <!-- Header -->
                                <div class="flex items-center gap-4 mb-6">

                                    <!-- Avatar -->
                                    <div class="shrink-0 w-16 h-16 rounded-full
                                                bg-gradient-to-br
                                                from-[#1670d8]
                                                to-[#12a86b]
                                                text-white
                                                flex items-center justify-center
                                                font-extrabold text-2xl uppercase
                                                shadow-lg shadow-[#1670d8]/20
                                                ring-4 ring-[#edf6ff]">

                                        {{ $initial }}
                                    </div>

                                    <!-- Name & Country -->
                                    <div class="min-w-0 text-right">

                                        <h3 class="font-extrabold
                                                   text-[#10233f]
                                                   text-base md:text-lg
                                                   leading-7 truncate">

                                            {{ $patient['name'] }}
                                        </h3>

                                        <div class="mt-1 flex items-center gap-2
                                                    text-[#66758a] text-sm">

                                            <i class="fa-solid fa-location-dot text-[#1670d8]"></i>

                                            <span>
                                                {{ $patient['country'] }}
                                            </span>
                                        </div>

                                    </div>
                                </div>

                                <!-- Divider -->
                                <div class="w-full h-px
                                            bg-gradient-to-l
                                            from-transparent
                                            via-[#d9e5f3]
                                            to-transparent
                                            mb-6">
                                </div>

                                <!-- Review -->
                                <p class="text-[#4d5d70]
                                          text-sm md:text-[15px]
                                          leading-8
                                          text-right flex-1">

                                    {{ $patient['review'] }}
                                </p>

                                <!-- Stars -->
                                <div class="mt-7 flex items-center justify-center
                                            gap-1 text-[#ffc107]
                                            text-lg tracking-wide">

                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>

                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

        </div>
    </div>
</section>
<!-- تجارب مرضانا -->


<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>


<script>
    function scrollPatients(direction) {
        const slider = document.getElementById('patientsSlider');

        if (!slider) {
            return;
        }

        const card = slider.querySelector('.patient-card');

        if (!card) {
            return;
        }

        const styles = window.getComputedStyle(slider);

        const gap = parseFloat(
            styles.gap || styles.columnGap || 24
        );

        const cardWidth = card.offsetWidth + gap;

        // موبايل: كارت واحد
        // ديسكتوب: 3 كروت
        const cardsPerClick = window.innerWidth >= 1024 ? 3 : 1;

        slider.scrollBy({
            left: direction === 'left'
                ? -(cardWidth * cardsPerClick)
                : cardWidth * cardsPerClick,

            behavior: 'smooth'
        });
    }
</script>   
          
          
          <section class="sm:px-16 px-4 py-10 sm:py-16 bg-gray-100">
              <div class="sm:px-16 px-10 mx-auto text-center">
                  <h2 class="sm:text-4xl text-lg font-bold text-blue-800 mb-6">

                      {{ __('ابق على اطلاع بأفكارنا') }}

                      <br>{{ __('المتعلقة بطب الأسنان') }}
                  </h2>
                  <p class="text-gray-500 text-base sm:text-lg mb-8">

                      {{ __('تفضل بزيارة مدونة Tooth Guard Clinics للحصول على أحدث النصائح والاتجاهات والرؤى المتعلقة بصحة الأسنان. تغطي مقالاتنا كل ما تحتاج إلى معرفته للحفاظ على ابتسامة مشرقة وصحية') }}
                  </p>
                  <div class="swiper mySwiper overflow-hidden">
                      <div class="swiper-wrapper">
                          @foreach ($blogs as $blog)
                              <div class="swiper-slide">
                                  <div
                                      class="bg-white shadow-md rounded-lg overflow-hidden mt-4 mb-4 transform transition duration-300 hover:scale-105">
                                      <img src="{{ $blog->photo }}" alt="{{ strip_tags($blog->{'title_' . $sign} ) }}"
                                          class="w-full h-60 object-cover">
                                      <div class="p-4">
                                          <h3 class="text-lg font-bold text-blue-800 mb-2">  
                                            {{ strip_tags($blog->{'title_' . $sign} ) }}
                                          </h3>
                                          <div class="text-gray-600 text-sm"></div>
                                          <div class="group mt-7 mb-4">
                                              <a href="{{ route('single-blog.index'.$lang, ['blog' =>$blog->{'slug_' . $sign} ,'lang'=> $lang ]) }}"
                                                  class="text-sm sm:text-md border border-blue-800 text-blue-800 p-2 rounded-sm shadow-md hover:bg-blue-800 hover:text-white transition duration-300">
                                                  {{ __('أقرأ المزيد') }}
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endforeach


                          <!-- Additional slides can be added here following the same structure -->
                      </div>
                  </div>
                  <div class="mt-8">
                      <a href="{{ route('blogs.index'.$lang,$lang) }}"
                          class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-3 px-6 rounded-full shadow-md transition duration-300">
                          {{ __('اكتشف المزيد من المقالات') }}
                      </a>
                  </div>
              </div>
          </section>

          @include('includes.book')





          <!-- Video Testimonials Section -->
          <!--<section class="py-20 bg-gradient-to-b from-blue-50 to-white">-->
          <!--    <div class="container mx-auto px-4">-->
          <!--        <h2-->
          <!--            class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-blue-800 to-green-600 bg-clip-text text-transparent text-center mb-16">-->
          <!--            {{ __('فيديوهات عن الدكتور') }}-->
          <!--        </h2>-->
          <!--        <div class="max-w-5xl mx-auto">-->
          <!--            <div-->
          <!--                class="bg-gradient-to-br from-blue-900 to-green-900 rounded-2xl overflow-hidden aspect-video relative shadow-2xl border-4 border-blue-200">-->
          <!--                <img src="https://via.placeholder.com/800x400" alt="Video testimonial"-->
          <!--                    class="object-cover w-full h-full">-->
          <!--                <div-->
          <!--                    class="absolute inset-0 bg-gradient-to-br from-blue-900/60 to-green-900/60 flex items-center justify-center">-->
          <!--                    <button-->
          <!--                        class="bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 text-white border-2 border-white rounded-full p-6 shadow-2xl hover:shadow-green-500/25 transition-all duration-300 transform hover:scale-110">-->
          <!--                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">-->
          <!--                            <path d="M8 5v14l11-7z" />-->
          <!--                        </svg>-->
          <!--                    </button>-->
          <!--                </div>-->
          <!--                <div class="absolute bottom-6 left-6 text-white">-->
          <!--                    <div class="flex items-center gap-3 bg-blue-600/80 backdrop-blur-sm rounded-full px-4 py-2">-->
          <!--                        <div-->
          <!--                            class="w-10 h-10 bg-gradient-to-r from-green-400 to-blue-400 rounded-full flex items-center justify-center">-->
          <!--                            <i data-lucide="users" class="w-5 h-5 text-white"></i>-->
          <!--                        </div>-->
          <!--                        <span class="font-semibold">reviews</span>-->
          <!--                    </div>-->
          <!--                </div>-->
          <!--                <div class="absolute bottom-6 right-6 text-white">-->
          <!--                    <div class="bg-green-600/80 backdrop-blur-sm rounded-full px-4 py-2 font-semibold">Share</div>-->
          <!--                </div>-->
          <!--            </div>-->
          <!--        </div>-->
          <!--    </div>-->
          <!--</section>-->



 <section class="py-20 bg-gradient-to-b from-blue-50 to-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-blue-800 to-green-600 bg-clip-text text-transparent text-center mb-16">
                فيديوهات عن الدكتور
            </h2>
            <!-- Outer container for swiper with relative positioning for navigation buttons -->
            <div class="max-w-5xl mx-auto relative">
                <!-- Swiper main container -->
                <div id="doctorVideoSwiper" class="swiper rounded-2xl overflow-hidden shadow-2xl border-4 border-blue-200 bg-gradient-to-tr from-slate-200 to-white pb-16">
                    <!-- Swiper wrapper -->
                    <div class="swiper-wrapper">
                        
                          @foreach($medias as $video)
                        <!-- Swiper slides. The `dsv-swiper-slide` class is for Swiper initialization. -->
                        <div class="swiper-slide flex items-center justify-center">
                            <div class="relative aspect-video overflow-hidden rounded-2xl w-full">
                                <iframe src="{{$video->youtube_url}}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen
                                    class="absolute inset-0 w-full h-full"></iframe>
                            </div>
                        </div>
@endforeach 
                         
                    </div>
                </div>

                <!-- Swiper navigation buttons styled with Tailwind -->
                <div class="dsv-button-next absolute top-1/2 -right-7 -translate-y-1/2 z-10 text-white w-14 h-14 flex items-center justify-center rounded-full transition-all duration-300 ease-in-out bg-gradient-to-r from-blue-600 to-green-400 hover:scale-110 hover:shadow-lg cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
                </div>
                <div class="dsv-button-prev absolute top-1/2 -left-7 -translate-y-1/2 z-10 text-white w-14 h-14 flex items-center justify-center rounded-full transition-all duration-300 ease-in-out bg-gradient-to-r from-green-400 to-blue-600 hover:scale-110 hover:shadow-lg cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
                </div>
                
                <!-- Swiper pagination -->
                <div class="swiper-pagination dsv-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        // Initialize Swiper after the page loads
        document.addEventListener('DOMContentLoaded', (event) => {
            const swiper = new Swiper('#doctorVideoSwiper', {
                // Optional parameters
                loop: true,
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 'auto',

                // If we need pagination
                pagination: {
                    el: '.dsv-pagination',
                    clickable: true,
                    // The bullet styling is handled by Swiper's default classes, which we can customize if needed.
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.dsv-button-next',
                    prevEl: '.dsv-button-prev',
                },
            });
        });
    </script>


      @stop
