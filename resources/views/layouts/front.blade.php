<!DOCTYPE html>
<html lang="{{ $sign }}" dir="{{ Session::get('front_language_duraction') }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp


    <meta name="google-site-verification" content="XmE4cT8eN-RTm7fLfT_e-ap_toosMuXQwzYRDNRZqaM" />

    <meta property="og:title" content="{{ $gs->{'title_' . $sign} }}">

    <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">


    <meta name="google-site-verification" content="IdWOrbHM6JKC0_evYH8uNuHf2MuPTGcup45QC7eNyzU" />
    @if (isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
        <title>@yield('title') -

            {{ $gs->{'title_' . $sign} }}

        </title>
    @elseif(isset($blog->meta_tag) || isset($blog->{'meta_details_' . $sign}))
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->{'meta_details_' . $sign} }}">
        <meta property="og:description" content="{{ $blog->{'meta_details_' . $sign} }}">
    @else
        <meta name="+author" content=" {{ $gs->{'title_' . $sign} }}">
        <meta property="og:description" content="{{ $gs->{'title_' . $sign} }}">
        <title>
            @yield('title')
        </title>
    @endif



    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "{{url('/')}}",
      "logo": "{{ $gs->{'logo_' . $sign} }}"
    }
    </script>
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "{{ $gs->{'title_' . $sign} }}",
    "url": "{{url('/')}}",
    "description": "",
    "image": "{{ $gs->{'logo_' . $sign} }}",
      "logo": "{{ $gs->{'logo_' . $sign} }}",
      "sameAs": ["{{ App\Models\Socialsetting::find(1)->facebook }}", "{{ App\Models\Socialsetting::find(1)->twitter }}", "{{ App\Models\Socialsetting::find(1)->instagram }}"],
    "telephone": "",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "",
      "addressLocality": "",
      "addressRegion": "Cairo",
      "postalCode": "11341",
      "addressCountry": "Egypt"
    }
  }
</script>


    @yield('gsearch')
    <!-- Google Font -->

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $gs->favicon }}" />
    <!-- bootstrap -->




    <link rel="stylesheet" href="{{ asset('build/css/toastr.css') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script><!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0YQR8KJCZV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-0YQR8KJCZV');
</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }
    </style>

    @yield('css')
</head>

<body class="min-h-screen bg-gray-50" dir="{{ Session::get('front_language_duraction') }}" lang="{{ $sign }}">
    @php
        $phones = explode(',', $gs->phones);
        $emails = explode(',', $gs->emails);
        $addresses = json_decode($gs->{'addresses_' . $sign});

        $randomPhone = Arr::random($phones);
    @endphp

    <!-- Header -->
<header class="bg-gradient-to-r from-blue-500 to-green-600 text-white w-full z-50 py-4 sticky top-0">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <div>
            <a href="{{ route('front.index'.$lang,$lang) }}">
                <img alt="Tooth Guard Logo" class="w-40 h-30" src="{{ $gs->{'logo_' . $sign} }}">
            </a>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center gap-6">
            <a href="{{ route('front.index'.$lang,$lang) }}"
                class="text-white text-lg hover:font-semibold transition duration-300">{{ __('الرئيسية') }}</a>
            <a href="{{ route('about.index'.$lang,$lang) }}"
                class="text-white text-lg hover:font-semibold transition duration-300">
                {{ __('معلومات عنا') }}</a>
                <li class="relative group list-none before:hidden">
    <a href="{{ route('services.index'.$lang, $lang) }}"
       class="text-white text-lg hover:font-semibold transition duration-300 flex items-center justify-center gap-2">
        {{ __('الخدمات') }}
        <i class="fa-solid fa-chevron-down text-xs"></i>
    </a>

    <ul class="absolute left-1/2 -translate-x-1/2 top-full z-50 hidden group-hover:block bg-white min-w-max rounded-xl shadow-xl border border-gray-100 overflow-hidden text-center px-4 py-3 list-none">
        @foreach ($services as $service)
            <li class="list-none">
                <a href="{{ route('single-service.index'.$lang, ['slug' => $service->{'slug_' . $sign}, 'lang' => $lang]) }}"
                   class="block whitespace-nowrap text-center px-6 py-3 text-sm font-semibold text-[#0f2c4a] hover:bg-blue-50 hover:text-blue-700 rounded-lg transition">
                    {{ $service->{'title_' . $sign} }}
                </a>
            </li>
        @endforeach
    </ul>
</li>
            <a href="{{ route('blogs.index'.$lang,$lang) }}"
                class="text-white text-lg hover:font-semibold transition duration-300">{{ __('المقالات') }}</a>
            <a href="{{ route('videos.index'.$lang,$lang) }}"
                class="text-white text-lg hover:font-semibold transition duration-300">{{ __('فيديوهات') }}</a>
                <!--تعديل-->
                   <a href="{{ route('medical-tourism.index'.$lang,$lang) }}"
                 class="text-white text-lg hover:font-semibold transition duration-300">
                      {{ __('السياحة العلاجية') }}
                     </a>
                          <!--تعديل-->

            <a href="{{ route('contact.index'.$lang,$lang) }}"
                class="text-white text-lg hover:font-semibold transition duration-300"> {{ __('تواصل معنا') }}
            </a>
        </nav>

        <!-- Social Icons and Language Selector (Desktop) -->
        <div class="hidden lg:flex items-center gap-4">
            @if (App\Models\Socialsetting::find(1)->f_status == 1)
                <a target="_blank" href="{{ App\Models\Socialsetting::find(1)->facebook }}" 
                   class="transition-transform duration-200 hover:scale-110">
                    <i class="fa-brands fa-facebook w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                </a>
            @endif
            @if (App\Models\Socialsetting::find(1)->t_status == 1)
                <a target="_blank" href="{{ App\Models\Socialsetting::find(1)->twitter }}" 
                   class="transition-transform duration-200 hover:scale-110">
                    <i class="fa-brands fa-instagram w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                </a>
            @endif

            <a target="_blank" href="tel:{{ $randomPhone }}" 
               class="transition-transform duration-200 hover:scale-110">
                <i class="fa-solid fa-phone w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
            </a>
            <a target="_blank" href="https://wa.me/{{ $randomPhone }}" 
               class="transition-transform duration-200 hover:scale-110">
                <i class="fa-brands fa-whatsapp w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
            </a>
            @if (App\Models\Socialsetting::find(1)->ystatus == 1)
                <a target="_blank" href="{{ App\Models\Socialsetting::find(1)->youtube }}" 
                   class="transition-transform duration-200 hover:scale-110">
                    <i class="fa-brands fa-youtube w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                </a>
            @endif
            <select id="language-select2"
                class="outline-none px-3 py-2 bg-transparent text-white border border-white rounded-md hover:bg-blue-700 cursor-pointer transition duration-300">
                @foreach ($languages as $language)
                    <option class="bg-gray-600" value="{{ $language->sign }}"
                        data-href="{{ route('front.lang-change', $language->id) }}"
                        {{ $language->sign == $sign ? 'selected' : '' }}> {{ $language->language }}</option>
                @endforeach
            </select>
        </div>

        <!-- Mobile Hamburger Menu -->
        <div class="lg:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none transition-transform duration-200 hover:scale-110">
                <i class="fa-solid fa-bars w-8 h-8"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-menu"
        class="lg:hidden bg-gradient-to-r from-blue-500 to-green-600 text-white fixed inset-0 z-[9999] hidden opacity-0 scale-95 flex-col items-center justify-center transition-all duration-300 ease-in-out backdrop-blur-sm">
        <button id="close-menu" class="absolute top-4 right-4 text-white focus:outline-none transition-transform duration-200 hover:scale-110">
            <i class="fa-solid fa-times w-8 h-8"></i>
        </button>
        <nav class="flex flex-col items-center gap-6 text-lg transform transition-all duration-300">
            <a href="{{ route('front.index'.$lang,$lang) }}"
                class="hover:font-semibold transition duration-300 hover:text-green-300">{{ __('الرئيسية') }}</a>
            <a href="{{ route('about.index'.$lang,$lang) }}" 
                class="hover:font-semibold transition duration-300 hover:text-green-300">{{ __('معلومات عنا') }}</a>
   <li class="list-none w-full">
    <button type="button"
        onclick="document.getElementById('mobileServicesMenu').classList.toggle('hidden')"
        class="w-full text-white text-lg font-semibold flex items-center justify-center gap-2 py-2">
        {{ __('الخدمات') }}
        <i class="fa-solid fa-chevron-down text-xs"></i>
    </button>

    <ul id="mobileServicesMenu"
        class="hidden mt-2 mx-auto bg-white rounded-xl shadow-lg overflow-hidden list-none w-fit min-w-[170px] px-3 py-2 text-center">

        @foreach ($services as $service)
            <li class="list-none">
                <a href="{{ route('single-service.index'.$lang, ['slug' => $service->{'slug_' . $sign}, 'lang' => $lang]) }}"
                   class="block whitespace-nowrap px-4 py-2 text-sm font-bold text-[#0f2c4a] hover:bg-blue-50 rounded-lg">
                    {{ $service->{'title_' . $sign} }}
                </a>
            </li>
        @endforeach
    </ul>
</li>
            <a href="{{ route('blogs.index'.$lang,$lang) }}"
                class="hover:font-semibold transition duration-300 hover:text-green-300">{{ __('المقالات') }}</a>
            <a href="{{ route('videos.index'.$lang,$lang) }}"
                class="hover:font-semibold transition duration-300 hover:text-green-300">{{ __('فيديوهات') }}</a>
                
                <a href="{{ route('medical-tourism.index'.$lang,$lang) }}" class="hover:font-semibold transition duration-300 hover:text-green-300">{{ __('السياحة العلاجية') }}</a>
               
            <a href="{{ route('contact.index'.$lang,$lang) }}" 
                class="hover:font-semibold transition duration-300 hover:text-green-300">{{ __('تواصل معنا') }}</a>
            
            <!-- Social Icons (Mobile) -->
            <div class="flex items-center gap-4 mt-6">
                @if (App\Models\Socialsetting::find(1)->f_status == 1)
                    <a target="_blank" href="{{ App\Models\Socialsetting::find(1)->facebook }}" 
                       class="transition-transform duration-200 hover:scale-110">
                        <i class="fa-brands fa-facebook w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                    </a>
                @endif
                @if (App\Models\Socialsetting::find(1)->t_status == 1)
                    <a target="_blank" href="{{ App\Models\Socialsetting::find(1)->twitter }}" 
                       class="transition-transform duration-200 hover:scale-110">
                        <i class="fa-brands fa-instagram w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                    </a>
                @endif

                <a target="_blank" href="tel:{{ $randomPhone }}" 
                   class="transition-transform duration-200 hover:scale-110">
                    <i class="fa-solid fa-phone w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                </a>
                <a target="_blank" href="https://wa.me/{{ $randomPhone }}" 
                   class="transition-transform duration-200 hover:scale-110">
                    <i class="fa-brands fa-whatsapp w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                </a>
                @if (App\Models\Socialsetting::find(1)->ystatus == 1)
                    <a target="_blank" href="{{ App\Models\Socialsetting::find(1)->youtube }}" 
                       class="transition-transform duration-200 hover:scale-110">
                        <i class="fa-brands fa-youtube w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                    </a>
                @endif
            </div>
            
            <!-- Language Selector (Mobile) -->
            <select id="language-select"
                class="outline-none px-3 py-2 bg-transparent text-white border border-white rounded-md hover:bg-blue-700 cursor-pointer transition duration-300 mt-6">
                @foreach ($languages as $language)
                    <option class="bg-gray-600" value="{{ $language->sign }}"
                        data-href="{{ route('front.lang-change', $language->id) }}"
                        {{ $language->sign == $sign ? 'selected' : '' }}> {{ $language->language }}</option>
                @endforeach
            </select>
        </nav>
    </div>
</header>


    @yield('content')



    <!-- Footer -->
    <!-- <footer class="bg-gradient-to-r from-blue-900 via-blue-800 to-green-800 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-6 text-green-300">معلومات الاتصال</h3>
                    <div class="space-y-4">
                        <p class="flex items-center gap-3 text-blue-100 hover:text-green-300 transition-colors">
                            <i data-lucide="phone" class="w-5 h-5 text-green-400"></i>
                            +966 XX XXX XXXX
                        </p>
                        <p class="flex items-center gap-3 text-blue-100 hover:text-green-300 transition-colors">
                            <i data-lucide="message-circle" class="w-5 h-5 text-green-400"></i>
                            واتساب
                        </p>
                    </div>
                </div>
                <div>
                    <h3 class="text-2xl font-bold mb-6 text-green-300">خدماتنا</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                زراعة الأسنان
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                تقويم الأسنان
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                تجميل الأسنان
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                علاج الجذور
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-2xl font-bold mb-6 text-green-300">روابط مفيدة</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                عن العيادة
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                الأطباء
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                المواعيد
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                اتصل بنا
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-2xl font-bold mb-6 text-green-300">تابعنا</h3>
                    <div class="flex gap-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-blue-600 to-blue-700 rounded-full flex items-center justify-center hover:from-green-500 hover:to-green-600 transition-all duration-300 cursor-pointer">
                            <i data-lucide="facebook" class="w-6 h-6"></i>
                        </div>
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-blue-600 to-blue-700 rounded-full flex items-center justify-center hover:from-green-500 hover:to-green-600 transition-all duration-300 cursor-pointer">
                            <i data-lucide="instagram" class="w-6 h-6"></i>
                        </div>
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-blue-600 to-blue-700 rounded-full flex items-center justify-center hover:from-green-500 hover:to-green-600 transition-all duration-300 cursor-pointer">
                            <i data-lucide="youtube" class="w-6 h-6"></i>
                        </div>
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-blue-600 to-blue-700 rounded-full flex items-center justify-center hover:from-green-500 hover:to-green-600 transition-all duration-300 cursor-pointer">
                            <i data-lucide="message-circle" class="w-6 h-6"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-blue-600 mt-12 pt-8 text-center">
                <p class="text-blue-200 text-lg">&copy; 2024 عيادة الأسنان. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer> -->
    <footer
        class="bg-gradient-to-r from-blue-900 via-blue-800 to-green-800 text-white py-16 w-full  px-5 lg:px-10 lg:py-12">
        <div class="max-w-7xl mx-auto">
            <!-- Footer Content -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 text-center lg:text-right">
             <div
    dir="{{ $sign === 'en' ? 'ltr' : 'rtl' }}"
    class="w-full max-w-sm
           {{ $sign === 'en' ? 'text-left' : 'text-right' }}"
>

    <h3 class="mb-6 text-xl md:text-2xl font-extrabold text-white">
        {{ __('تواصل معنا') }}
    </h3>

    <div class="space-y-4">

        <!-- Email -->
        @foreach ($emails as $email)
            <a
                href="mailto:{{ trim($email) }}"
                class="group flex items-center gap-3 text-white hover:text-green-300 transition-colors duration-300"
            >
                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white/10 text-white group-hover:bg-green-500">
                    <i class="fa-solid fa-envelope text-sm"></i>
                </span>

                <span
                    dir="ltr"
                    class="text-sm md:text-base font-semibold break-all"
                >
                    {{ trim($email) }}
                </span>
            </a>
        @endforeach

        <!-- Phone -->
@foreach ($phones as $phone)
    @php
        $cleanPhone = preg_replace('/[^0-9+]/', '', trim($phone));

        if (str_starts_with($cleanPhone, '0')) {
            $cleanPhone = '+20' . substr($cleanPhone, 1);
        } elseif (!str_starts_with($cleanPhone, '+')) {
            $cleanPhone = '+' . $cleanPhone;
        }
    @endphp

    <a
        href="tel:{{ $cleanPhone }}"
        class="group flex items-center gap-3 text-white hover:text-green-300 transition-colors duration-300"
    >
        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white/10 text-white group-hover:bg-green-500">
            <i class="fa-solid fa-phone text-sm"></i>
        </span>

        <span dir="ltr" class="text-sm md:text-base font-semibold">
            {{ trim($phone) }}
        </span>
    </a>
@endforeach

        <!-- Address -->
        @foreach ($addresses as $address)
            <a
                href="https://maps.app.goo.gl/anJeL6VXLuoB61WK7?g_st=ac"
                target="_blank"
                rel="noopener noreferrer"
                class="group flex items-start gap-3 text-white hover:text-green-300 transition-colors duration-300"
            >
                <span class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white/10 text-white group-hover:bg-green-500">
                    <i class="fa-solid fa-location-dot text-sm"></i>
                </span>

                <span class="text-sm md:text-base font-semibold leading-7">
                    {{ trim($address) }}
                </span>
            </a>
        @endforeach

    </div>
</div>
                <!-- Links -->
                <div class="lg:col-span-1">
                    <h3 class="text-color_2 text-xl font-semibold uppercase mb-5">{{ __('الروابط') }}</h3>
                    <div class="space-y-4">
                        <a href="{{ route('front.index'.$lang,$lang) }}"
                            class="text-color_1 font-semibold text-sm hover:text-blue-500 transition duration-300 block">{{ __('الرئيسية') }}</a>
                        <a href="{{ route('about.index'.$lang,$lang) }}"
                            class="text-color_1 font-semibold text-sm hover:text-blue-500 transition duration-300 block">
                            {{ __('معلومات عنا') }}</a>
                        <a href="{{ route('services.index'.$lang,$lang) }}"
                            class="text-color_1 font-semibold text-sm hover:text-blue-500 transition duration-300 block">{{ __('الخدمات') }}
                        </a>
                        <a href="{{ route('blogs.index'.$lang,$lang) }}"
                            class="text-color_1 font-semibold text-sm hover:text-blue-500 transition duration-300 block">{{ __('المقالات') }}</a>
                        <a href="{{ route('videos.index'.$lang,$lang) }}"
                            class="text-color_1 font-semibold text-sm hover:text-blue-500 transition duration-300 block">{{ __('فيديوهات') }}</a>
                            
                           <a href="{{ route('medical-tourism.index'.$lang,$lang) }}"
                            class="text-color_1 font-semibold text-sm hover:text-blue-500 transition duration-300 block">{{ __('السياحة العلاجية') }}</a>             
                            

                        <a href="{{ route('contact.index'.$lang,$lang) }}"
                            class="text-color_1 font-semibold text-sm hover:text-blue-500 transition duration-300 block">
                            {{ __('تواصل معنا') }}</a>
                    </div>
                </div>
                <!-- Social Media -->
                <div class="lg:col-span-1">
                    <h3 class=" text-xl font-semibold uppercase mb-5"> {{ __('وسائل التواصل') }}</h3>
<div class="flex justify-center lg:justify-end items-center gap-4 text-white">
    @if (App\Models\Socialsetting::find(1)->f_status == 1)
        <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" target="_blank"
           class="text-white p-3 rounded-full hover:bg-blue-100 transition duration-300 hover:text-blue-500">
            <i class="fab fa-facebook-f  text-lg "></i>
        </a>
    @endif

    @if (App\Models\Socialsetting::find(1)->t_status == 1)
        <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" target="_blank"
           class="text-white p-3 rounded-full hover:bg-blue-100 transition duration-300 hover:text-pink-500">
            <i class="fab fa-instagram  text-lg "></i>
        </a>
    @endif

    <a href="tel:{{ $randomPhone }}" target="_blank"
       class="text-white p-3 rounded-full hover:bg-blue-100 transition duration-300 hover:text-green-500">
        <i class="fas fa-phone  text-lg"></i>
    </a>

    <a href="https://wa.me/{{ $randomPhone }}" target="_blank"
       class="text-white p-3 rounded-full hover:bg-blue-100 transition duration-300  hover:text-green-500">
        <i class="fab fa-whatsapp  text-lg"></i>
    </a>

    @if (App\Models\Socialsetting::find(1)->ystatus == 1)
        <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" target="_blank"
           class="text-white p-3 rounded-full hover:bg-blue-100 transition duration-300  hover:text-red-500">
            <i class="fab fa-youtube  text-lg"></i>
        </a>
    @endif
</div>
                </div>
                <!-- Logo -->
                <div class="lg:col-span-1">
                    <img alt="Tooth Guard Logo" class="w-48 lg:w-52 mx-auto lg:mx-0"
                        src="{{ $gs->{'logo_' . $sign} }}">
                </div>
            </div>
            <!-- Footer Bottom -->
            <div class="mt-10">
                <div class="border-t border-color_1 opacity-40 w-full"></div>
                <a href="https://cangrowonline.com/en" target="_blank"
                    class="flex justify-center items-center mt-5 text-color_1 text-[9px] lg:text-sm">
                    © {{ date('Y') }} {{ __('All Rights Reserved | Tooth Guard Clinics Made by') }} ❤️
                    {{ __('CanGrow Digital Marketing Agency') }}
                </a>
            </div>
        </div>
    </footer>
    
    
    
    
<div class="fixed 
    {{ Session::get('front_language_duraction') === 'rtl' ? 'left-4' : 'right-4' }} 
    top-1/2 -translate-y-1/2 flex flex-col items-center gap-4 z-50">
    
    
     

    <a href="tel:{{ $randomPhone }}" target="_blank"
       class="bg-gradient-to-r from-blue-500 to-green-600 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-lg transition-all duration-500 hover:bg-green-500 hover:from-green-500 hover:to-green-500">
        <i class="fas fa-phone text-lg"></i>
    </a>

    <a href="https://wa.me/{{ $randomPhone }}" target="_blank"
       class="bg-gradient-to-r from-blue-500 to-green-600 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-lg transition-all duration-500 hover:bg-green-600 hover:from-green-600 hover:to-green-600">
        <i class="fab fa-whatsapp text-lg"></i>
    </a>
@if (App\Models\Socialsetting::find(1)->f_status == 1)
        <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" target="_blank"
           class="bg-gradient-to-r from-blue-500 to-green-600 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-lg transition-all duration-500 hover:bg-blue-600 hover:from-blue-600 hover:to-blue-600">
            <i class="fab fa-facebook-f text-lg"></i>
        </a>
    @endif

    @if (App\Models\Socialsetting::find(1)->t_status == 1)
        <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" target="_blank"
           class="bg-gradient-to-r from-blue-500 to-green-600 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-lg transition-all duration-500 hover:bg-pink-500 hover:from-pink-500 hover:to-pink-500">
            <i class="fab fa-instagram text-lg"></i>
        </a>
    @endif
    @if (App\Models\Socialsetting::find(1)->ystatus == 1)
        <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" target="_blank"
           class="bg-gradient-to-r from-blue-500 to-green-600 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-lg transition-all duration-500 hover:bg-red-600 hover:from-red-600 hover:to-red-600">
            <i class="fab fa-youtube text-lg"></i>
        </a>
    @endif
</div>

    
    <script src="{{ asset('front/tooth-guard/') }}/js/script.js"></script>
    <script src="{{ asset('front/tooth-guard/') }}/js/swiper.js"></script>
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const closeMenu = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        closeMenu.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    </script>





    <script src="{{ asset('build/js/toastr.js') }}"></script>


    <script type="text/javascript">
        var logo_src = "{{ $gs->{'logo_' . $sign} }}";
    </script>



    <script type="text/javascript">
        var mainurl = "{{ url('/' . $sign) }}";
        var mainurl2 = "{{ url('/') }}";
        var gs = {!! json_encode($gs) !!};
        var langg = {!! json_encode($sign) !!};
        var mainurl2 = "{{ url('/') }}";

        $(".selectors").on('change', function() {
            var url = $(this).val();
            window.location = url;
        });
    </script>
    <Script>
        $(document).on('submit', '#subscribeform', function(e) {
            e.preventDefault();
            console.log(12);
            $('#sub-btn').prop('disabled', true);
            console.log(13);
            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(14);
                    if ((data.errors)) {
                        console.log(15);
                        $('.alert-danger').show();
                        $('.alert-danger ul').html('');
                        for (var error in data.errors) {
                            $('.alert-danger ul').append('<li>' + data.errors[error] + '</li>');
                        }

                    } else {
                        console.log(16);
                        toastr.success(langg.subscribe_success);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.alert-success p').html(langg.subscribe_success);

                    }

                    $('#sub-btn').prop('disabled', false);


                }

            });

        });
    </script>


    <script>
        $(document).on('submit', '#email-form', function(e) {
            e.preventDefault();
            $('.gocover').show();
            $('.submit-btn').prop('disabled', true);
            var name = $('.fname').val();



            if (name == '') {
                $('#email-form .response').html(
                    '<div class="failed alert alert-warning">Please fill the required fields.</div>');
                $('button.submit-btn').prop('disabled', false);
                return false;
            }

            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#email-form .response').html(
                        '<div class="text-info">Loading...</div>'
                    );
                    console.log(1);
                },
                success: function(data) {
                    console.log(2);
                    if ((data.errors)) {
                        console.log(3);
                        $('.alert-success').hide();
                        $('.alert-danger').show();
                        $('#email-form .response').html('');
                        for (var error in data.errors) {
                            console.log(4);
                            $('#email-form .response').append('<li>' + data.errors[error] + '</li>')
                        }
                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .eq(0).focus();
                        $('#email-form .refresh_code').trigger('click');

                    } else {
                        console.log(5);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('#email-form .response').html(data);
                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .eq(0).focus();
                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .val('');
                        $('#email-form .refresh_code').trigger('click');

                    }
                    console.log(6);
                    $('.gocover').hide();
                    $('button.submit-btn').prop('disabled', false);
                }

            });

        });


        $(document).on('submit', '#appointment-form', function(e) {
            e.preventDefault();
            $('.gocover').show();
            $('.submit-btn').prop('disabled', true);
            var name = $('.fname').val();



            if (name == '') {
                $('#appointment-form .response').html(
                    '<div class="failed alert alert-warning">Please fill the required fields.</div>');
                $('button.submit-btn').prop('disabled', false);
                return false;
            }

            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#appointment-form .response').html(
                        '<div class="text-info"><img src="{{ asset('assets/images/preloader.gif') }}"> Loading...</div>'
                    );
                    console.log(1);
                },
                success: function(data) {
                    console.log(2);
                    if ((data.errors)) {
                        console.log(3);
                        $('.alert-success').hide();
                        $('.alert-danger').show();
                        $('#appointment-form .response').html('');
                        for (var error in data.errors) {
                            console.log(4);
                            $('#appointment-form .response').append('<li>' + data.errors[error] +
                                '</li>')
                        }
                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .eq(0).focus();
                        $('#appointment-form .refresh_code').trigger('click');

                    } else {
                        console.log(5);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('#appointment-form .response').html(data);
                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .eq(0).focus();
                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .val('');
                        $('#appointment-form .refresh_code').trigger('click');

                    }
                    console.log(6);
                    $('.gocover').hide();
                    $('button.submit-btn').prop('disabled', false);
                }

            });

        });

        $('.refresh_code').on("click", function() {
            $.get(mainurl2 + '/contact/refresh_code', function(data, status) {
                $('.codeimg1').attr("src", mainurl2 + "/assets/images/capcha_code.png?time=" + Math
                    .random());
            });
        })
    </script>


    <script>
        document.getElementById('language-select').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var url = selectedOption.getAttribute('data-href');
            if (url) {
                window.location.href = url;
            }
        });
        document.getElementById('language-select2').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var url = selectedOption.getAttribute('data-href');
            if (url) {
                window.location.href = url;
            }
        });
    </script>
    @yield('js')
    <div id="globalBookingModal"
     class="hidden fixed inset-0 z-[999999] bg-black/50 px-4 py-8 overflow-y-auto">

    <div class="max-w-md mx-auto relative">

        <button type="button"
                onclick="document.getElementById('globalBookingModal').classList.add('hidden'); document.body.style.overflow = '';"
                class="absolute -top-4 -left-4 w-10 h-10 rounded-full bg-white shadow-lg text-gray-700 hover:text-red-600 font-bold z-10">
            ×
        </button>

        @include('components.booking-form', [
            'variant' => 'sidebar',
            'formId' => 'globalBookingFormBox',
            'wrapperClass' => '',
            'leadForm' => ($globalLeadForm ?? null),
            'leadServiceId' => ($globalLeadServiceId ?? null),
        ])

    </div>
</div>
</body>

</html>
