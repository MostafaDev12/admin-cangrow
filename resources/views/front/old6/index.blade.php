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
    $addresses = json_decode($gs->{'addresses_' . $sign});

    $randomPhone = Arr::random($phones);
    $randomEmail = Arr::random($emails);
@endphp
    <section class="relative overflow-hidden group" id="homeSlider">
        <!-- Carousel container -->
        <div class="relative h-screen w-full">
            <!-- Slides -->
            <div class="relative h-full w-full">
               @foreach ($sliders as $slider)
                <!-- Slide 1 -->
                <div class="absolute inset-0 flex items-center justify-center bg-[url('{{ $slider->{'photo'} ?? '' }}')] bg-cover bg-center transition-opacity duration-500 opacity-0"
                    data-carousel-item>
                    <div class="text-center px-4">
                        <div class="text-white text-4xl font-bold mb-4 animate-fadeInDown">   {!! $slider->{'title_' . $sign} ?? '' !!}</div>
                        <div class="text-white text-xl animate-fadeInUp animate-delay-200">    
                                {!! $slider->{'details_' . $sign} ?? '' !!}   </div>
                    </div>
                </div>
 @endforeach
                 
            </div>

            <!-- Navigation buttons -->
            <button
                class="absolute left-4 top-1/2 -translate-y-1/2 z-10 bg-[url('{{ asset('front/gulddal/') }}/images/headerBack.png')]  bg-repeat/30 hover:bg-[url('{{ asset('front/gulddal/') }}/images/headerBack.png')]  bg-repeat/50 text-white w-10 h-10 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                data-carousel-prev>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="sr-only">{{ __('Previous') }}</span>
            </button>

            <button
                class="absolute right-4 top-1/2 -translate-y-1/2 z-10 bg-[url('{{ asset('front/gulddal/') }}/images/headerBack.png')]  bg-repeat/30 hover:bg-[url('{{ asset('front/gulddal/') }}/images/headerBack.png')]  bg-repeat/50 text-white w-10 h-10 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                data-carousel-next>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="sr-only">{{ __('Next') }}</span>
            </button>

            <!-- Indicators -->
            <div class="absolute bottom-4 left-0 right-0 flex justify-center gap-2" data-carousel-indicators>
                <button
                    class="w-8 h-1.5 rounded-full bg-white bg-opacity-30 hover:bg-opacity-100 transition-all duration-300 focus:outline-none"
                    data-carousel-indicator="0" aria-label="Slide 1"></button>
                <button
                    class="w-8 h-1.5 rounded-full bg-white bg-opacity-30 hover:bg-opacity-100 transition-all duration-300 focus:outline-none"
                    data-carousel-indicator="1" aria-label="Slide 2"></button>
                <button
                    class="w-8 h-1.5 rounded-full bg-white hover:bg-opacity-100 transition-all duration-300 focus:outline-none"
                    data-carousel-indicator="2" aria-label="Slide 3"></button>
            </div>
        </div>
    </section>

    <section id="" class="py-20 bg-black text-white" dir="{{ session::get('front_language_duraction') }}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="space-y-8">
                <div>
                    <h2 class="text-4xl font-bold text-primary mb-6">
                        
                        {{ __('عن انظمة أم دابليو أم جولدال سيستمز') }}
                    </h2>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
                    <div
                        class="text-center bg-gray-900 rounded-xl p-8 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800">
                        <div class="text-3xl font-bold text-primary mb-2">300+</div>
                        <div class="text-gray-300">    {{ __('المشاريع المنجزة') }}</div>
                    </div>
                    <div
                        class="text-center bg-gray-900 rounded-xl p-8 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800">
                        <div class="text-3xl font-bold text-primary mb-2">99.8%</div>
                        <div class="text-gray-300">   {{ __('معايير الجودة') }}</div>
                    </div>
                    <div
                        class="text-center bg-gray-900 rounded-xl p-8 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800">
                        <div class="text-3xl font-bold text-primary mb-2">12+</div>
                        <div class="text-gray-300">    {{ __('وكيل و موزع معتمد') }}</div>
                    </div>
                    <div
                        class="text-center bg-gray-900 rounded-xl p-8 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800">
                        <div class="text-3xl font-bold text-primary mb-2">24/7</div>
                        <div class="text-gray-300">    {{ __('دعم فنى دائم') }}</div>
                    </div>
                </div>


            </div>


        </div>
        </div>
    </section>

    <section id="about" class="py-20 bg-black text-white" dir="{{ session::get('front_language_duraction') }}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="">

                <div class="space-y-8">
                    <div class="bg-gray-900 p-6 rounded-lg border border-gray-800">
                        <h3 class="text-lg font-semibold text-primary mb-4">
                            {{ __('شهادات الصناعة و الإعتمادات') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
                            <div class="flex items-center text-sm text-gray-200">
                                <div class="w-2 h-2 bg-primary rounded-full ml-3"></div>
                                {{ __('عضو إتحاد الصناعات المصريه') }}
                            </div>
                            <div class="flex items-center text-sm text-gray-200">
                                <div class="w-2 h-2 bg-primary rounded-full ml-3"></div>
                                {{ __('عضو بالإتحاد الأفريقي للتشييد و البناء') }}
                            </div>
                            <div class="flex items-center text-sm text-gray-200">
                                <div class="w-2 h-2 bg-primary rounded-full ml-3"></div>
                                {{ __('إعتمادات من مكاتب إستشاريه محليه و دوليه') }}
                            </div>
                            <div class="flex items-center text-sm text-gray-200">
                                <div class="w-2 h-2 bg-primary rounded-full ml-3"></div>
                                {{ __('إعتمادات من معامل إختبارات معتمدة محليه و دوليه') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8 my-10">
                    <div
                        class="flex gap-4 items-start space-x-4 p-6 rounded-lg bg-gray-900 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800">
                        <div class="bg-primary p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="award" class="h-6 w-6"></i>
                        </div>
                        <div class="">
                            <h3 class="text-lg font-semibold text-primary mb-2"> {{ __('شهادات الجوده') }}</h3>
                            <p class="text-gray-200">
                                ISO 45001:2018
                                -
                                ISO14001:2015
                                -
                                ISO9001:2015
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start space-x-4 p-6 rounded-lg bg-gray-900 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800"
                        dir="{{ session::get('front_language_duraction') }}">
                        <div class="bg-primary p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="target" class="h-6 w-6"></i>
                        </div>
                        <div class="">
                            <h3 class="text-lg font-semibold text-primary mb-2"> {{ __('تكنولوجيا متطورة') }}</h3>
                            <p class="text-gray-200">
                                {{ __('تقديم افضل انظمة الدهانات المتطوره للمسطحات الاسفلتية والخرصانية والمعدنية') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start space-x-4 p-6 rounded-lg bg-gray-900 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800"
                        dir="{{ session::get('front_language_duraction') }}">
                        <div class="bg-primary p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="users" class="h-6 w-6"></i>
                        </div>
                        <div class="">
                            <h3 class="text-lg font-semibold text-primary mb-2"> {{ __('شراكة استراتيجية') }}</h3>
                            <p class="text-gray-200">
                                {{ __('علاقات طويلة الامد مع عملاء وموزعين معتمدين محليا ودوليا') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start space-x-4 p-6 rounded-lg bg-gray-900 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800"
                        dir="{{ session::get('front_language_duraction') }}">
                        <div class="bg-primary p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="lightbulb" class="h-6 w-6"></i>
                        </div>
                        <div class="">
                            <h3 class="text-lg font-semibold text-primary mb-2"> {{ __('رياده الابتكار') }}</h3>
                            <p class="text-gray-200">
                                
{{ __('الرياده في تطبيق احدث التكنولوجيا المتطوره في صناعه الدهانات المتخصصه للتقديم احدث الحلول الاقتصادية والمستدامة') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-16 md:py-20" dir="{{ session::get('front_language_duraction') }}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-white">
                    {{ __('عن انظمة أم دابليو أم جولدال سيستمز') }}

                </h2>
                <p class="text-base md:text-xl text-gray-300 max-w-3xl mx-auto">
 
                    {{ __('في حاله وجود اي استفسار بالرجاء التواصل مع احد خبرائنا من خلال نموذج الاتصال او التواصل مع اقرب مكتب اقليمي تابع لك فنحن هنا لمساعدتك') }}
                </p>
            </div>


            <!-- Contact Info -->
            <div>
                <h3 class="text-2xl font-bold mb-6 text-yellow-400">  {{ __('معلومات الاتصال') }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
                    <!-- Phone -->
                    <a href="tel:+201222243351" class="block">
                        <div
                            class="flex items-start space-x-reverse space-x-4 bg-gray-900 rounded-xl p-8 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800">
                            <div class="bg-primary p-3 rounded-lg text-white">
                                <i data-lucide="phone" class="h-6 w-6"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg mb-1 text-white">  {{ __('الاتصال الرئيسي') }}</h4>
                                <span class="text-gray-200">هاتف:</span>
                                <span dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}" class="text-gray-200">+2022733403</span>
                                <span dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}" class="text-gray-200">+201222243351</span>
                            </div>
                        </div>
                    </a>

                    <!-- Email -->
                    <a href="mailto:info@gulddalsystems.com" class="block">
                        <div
                            class="flex items-start space-x-reverse space-x-4 bg-gray-900 rounded-xl p-8 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800">
                            <div class="bg-primary p-3 rounded-lg text-white">
                                <i data-lucide="mail" class="h-6 w-6"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg mb-1 text-white">   {{ __('البريد الإلكتروني') }}</h4>
                                <p class="text-gray-200 text-xs md:text-lg">info@mwmgulddalsystems.com</p>

                                <!-- <p class="text-gray-200">sales@gulddal-systems.com</p> -->
                            </div>
                        </div>
                    </a>


                    <!-- Address -->
                    <div
                        class="flex items-start space-x-reverse space-x-4 bg-gray-900 rounded-xl p-8 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800">
                        <div class="bg-primary p-3 rounded-lg text-white">
                            <i data-lucide="map-pin" class="h-6 w-6"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-lg mb-1 text-white"> {{ __('المكتب الرئيسي') }}</h4>

                            <p class="text-gray-200">  {{ __('35 شارع حسن الشريف') }}</p>
                            <p class="text-gray-200">    {{ __('مدينة نصر، القاهرة، مصر') }}</p>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div
                        class="flex items-start space-x-reverse space-x-4 bg-gray-900 rounded-xl p-8 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800">
                        <div class="bg-primary p-3 rounded-lg text-white">
                            <i data-lucide="clock" class="h-6 w-6"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-lg mb-1 text-white">   {{ __('ساعات العمل') }}</h4>
                            <p class="text-gray-200">
                                
                                {{ __('من الاحد إلى الخميس من الساعه 9:00 صباحاً الي 5:00 مساءً بتوقيت القاهره') }}
                            </p>
                            <!-- <p class="text-gray-200">الدعم الطارئ: 24/7</p> -->
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
  
 @stop