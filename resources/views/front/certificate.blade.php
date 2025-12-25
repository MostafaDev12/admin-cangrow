  
 @extends('layouts.front')

 @section('title')

    {{ __('إنجازاتنا وشهادات التقدير') }} - {{ $gs->{'title_' . $sign} }}

 @stop

 @section('gsearch')
     <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
 @stop

 @section('css')

 @stop

 @section('content')



    <main>


        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4">

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                    <div class="relative">
                        <img src="{{ $ps->portfolio_photo }}" alt="Life Makers Group"
                            class="rounded-lg shadow-lg w-full h-auto">

                        <div
                            class="absolute -right-4 top-1/2 -translate-y-1/2 bg-white p-2 shadow-lg rounded-md hidden lg:block">
                            <img src="{{ asset('front/dareltawfik/') }}/assets/imgs/banner/image-2.jpg"
                                alt="Duke of Edinburgh Award" class="h-48 w-auto">
                        </div>
                    </div>

                    <div>
                        <div class="relative mb-6">




                            <div class="text-center mb-12 max-w-3xl mx-auto">
                                <div class="relative mb-10">
                                    <h1 class="text-sm font-extrabold text-custom-orange  mb-4">
                                    {!! $ps->{'portfolio_title_' . $sign} ?? '' !!}
                                    </h1>

                                </div>
                                {{-- <p class="text-lg text-gray-600 leading-relaxed">
                                    عن الجائزة
                                </p> --}}
                            </div>




                        </div>
                        <p class="text-gray-700 leading-relaxed mb-6">
                          {!! $ps->{'portfolio_details_' . $sign} ?? '' !!}
                        </p>

                        

                    </div>

                </div>

            </div>
        </section>




        <section class="container mx-auto px-4 my-10">

            <!-- Include Swiper CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

            <!-- Your Swiper Slider -->
            <div class="swiper blogSwiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    @foreach ($certificates as $certificate)
                    <div class="swiper-slide">
                        <article
                            class="bg-white rounded-lg shadow-lg overflow-hidden group transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 h-full">
                            <div class="relative">
                                <img src="{{ $certificate->photo }}"
                                    alt="الصحراء" class="w-full h-56 object-cover" />
                                {{-- <div
                                    class="absolute bottom-4 left-4 bg-primary text-white rounded-md px-3 py-2 text-center leading-none">
                                    <span class="font-bold text-xl block">03</span>
                                    <span class="text-xs uppercase block">JUL</span>
                                </div> --}}
                            </div>
                            <div class="p-6 relative">
                                <div
                                    class="absolute -top-4 left-0 bg-white h-10 w-full rounded-lg px-3 py-2 text-center leading-none">

                                </div>
                                <h3 class="text-xl font-bold text-slate-800 mb-3">
                                    <a href="#" class="transition-colors hover:text-accent">
                                    {!! $certificate->{'title_' . $sign} ?? '' !!}
                                    </a>
                                </h3>
                                {{-- <p class="text-gray-600 text-sm leading-relaxed">
                                    "التحدي والشغف.. واكتساب مهارات جديدة، ليفعلوا شيء لم يعتادوا فعله."
                                </p> --}}
                            </div>
                        </article>
                    </div>
                    @endforeach
                  
                </div>

                <!-- Optional: Navigation Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Optional: Pagination -->
                <div class="swiper-pagination"></div>
            </div>

            <!-- Include Swiper JS -->
            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

            <!-- Initialize Swiper -->
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    new Swiper('.blogSwiper', {
                        slidesPerView: 1,
                        spaceBetween: 24,
                        loop: false,
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        breakpoints: {
                            // when window width >= 768px (md)
                            768: {
                                slidesPerView: 2,
                                spaceBetween: 32,
                            },
                            // when window width >= 1024px (lg)
                            1024: {
                                slidesPerView: 3,
                                spaceBetween: 32,
                            },
                        },
                    });
                });
            </script>
        </section>
        
         @include('includes.share')

    </main>

@stop