<!DOCTYPE html>
<html lang="{{$sign}}" dir="{{($sign == 'ar') ? 'rtl':'ltr'}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp



 

 
    <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}">
    <meta property="og:url" content="{{ url('/') }}/">
    <meta property="og:type" content="website">
    
    <meta name="google-site-verification" content="fILhxCvzmcgwtK0tCkHeQ16wXhpRH55UG8z4wyaE_cs" />

    <meta name="google-site-verification" content="IdWOrbHM6JKC0_evYH8uNuHf2MuPTGcup45QC7eNyzU" />
  
    @if (isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
        <title>@yield('title') -

            {{ $gs->{'title_' . $sign} }}

        </title>
    @elseif(isset($blog))
        @php
            $articleTitle = $blog->{'title_' . $sign};        // visible <h1>
            $metaTitle    = $blog->{'meta_title_' . $sign};   // SEO title

            // <title>: meta_title -> article_title -> site name (final fallback).
            $seoTitle = $metaTitle ?: ($articleTitle ?: $gs->{'title_' . $sign});

            // og:title: social_title (not in schema) -> meta_title -> article_title.
            $ogTitle = $metaTitle ?: $articleTitle;

            // SEO description: meta_details -> short_details -> safe excerpt from the article body.
            $seoDescription = $blog->{'meta_details_' . $sign}
                ?: ($blog->{'short_details_' . $sign}
                ?: \Illuminate\Support\Str::limit(trim(strip_tags($blog->{'details_' . $sign})), 160));
        @endphp
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $seoDescription }}">
        <meta property="og:title" content="{{ $ogTitle }}">
      <meta property="og:description" content="{{ $seoDescription }}">
      <title>{{ $seoTitle }}</title>
    @else
        <meta name="+author" content=" {{ $gs->{'title_' . $sign} }}">
        <meta property="og:title" content="{{ $gs->{'title_' . $sign} }}">
    <meta property="og:description" content="عيادات أسنان انوفا innovadentalclinics: متخصصون في زراعة وتجميل الأسنان الفوري وتركيبات الأسنان عالية الجودة. تواصل معنا لمعرفة الأسعار">
    
        <title>
            @yield('title')
        </title>
    @endif

<link rel="canonical" href="{{ url()->current() }}" />




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


    @include('includes.style')


   @yield(section: 'css')



<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-17M1118THG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-17M1118THG');
</script>

</head>

@php
    $phones = explode(',', $gs->phones);
    $emails = explode(',', $gs->emails);
    $addresses = json_decode($gs->{'addresses_' . $sign});

    $randomPhone = Arr::random($phones);
@endphp


<body class="bg-[#f5f5f5] font-cairo">
    <!-- start header -->
    <header class="sticky bg-white z-50 left-0 top-0 w-full shadow ">
        
        <div id="#scroll-social" class=" flex hidden items-center bg-[#333133] text-xs md:text-sm py-4 text-white justify-center gap-2 gap-4">

        @if (App\Models\Socialsetting::find(1)->d_status == 1)
            <a href="{{ App\Models\Socialsetting::find(1)->dribble }}" target="_blank"
>
                <i class="fab fa-tiktok"></i>
            </a>
        @endif
        @if (App\Models\Socialsetting::find(1)->f_status == 1)
            <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" target="_blank"
>
                <i class="fab fa-facebook-f"></i>
            </a>
        @endif
        @if (App\Models\Socialsetting::find(1)->ystatus == 1)
            <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" target="_blank"
>
                <i class="fab fa-youtube"></i>
            </a>
        @endif
        @if (App\Models\Socialsetting::find(1)->t_status == 1)
            <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" target="_blank"
>
                <i class="fab fa-instagram"></i>
            </a>
        @endif
        <a href="https://wa.me/2{{$randomPhone}}" target="_blank" class="flex flex-wrap flex-col md:flex-row items-center">
  <i class="fa-brands fa-whatsapp"></i>
  <span class="text-[8px] md:text-xs"> {{$randomPhone}}
  </span>
</a>
<a href="tel:+2{{$randomPhone}}" target="_blank" class="flex flex-col md:flex-row items-center">
  <i class="fa-solid fa-phone"></i>
  <span class="text-[8px] md:text-xs"> {{$randomPhone}}
  </span>
</a>
    </div>

       <nav class="container px-6 mx-auto">
    <div class="flex py-4 items-center justify-between text-white">
        <a href="{{ route('front.index') }}" class="md:px-4">
            <img src="{{ $gs->{'logo_' . $sign} }}" class="h-20 lg:scale-150" alt="">
        </a>
               <div>
                <div id="nav-upper" class="p-2  hidden md:flex flex-wrap align-center justify-center text-[#333133] bold  gap-1 md:gap-2">
                        <a href="#" class="text-xs font-bold text-center flex items-center justify-center">
                            {{ __('Emergency Info') }}</a>

                        <a href="tel:{{ $randomPhone }}" class="flex items-center gap-1">
                            <span class="elementor-icon-list-icon">
                                <i aria-hidden="true" class="fas fa-phone-square"></i> </span>
                            <span class=" hidden md:block">
                                {{ $randomPhone }}</span>
                        </a>
                        <div
                            class="group relative hover:bg-[#3e3c3f] hover:text-white transition-all duration-700 px-4 py-3 rounded-md w-full md:w-auto">
                            <div class="flex items-center justify-between cursor-pointer">
                                <span class="font-semibold"> {{ __('Book An Appointment') }}</span>
                                <i
                                    class="fa-solid fa-caret-down h-4 w-4 transition-transform group-hover:rotate-180 ml-2"></i>
                            </div>

                            <!-- Dropdown Menu -->
                            <ul
                                class="absolute left-0 text-[#3e3c3f] mt-2 w-full bg-white shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-10 rounded-md">
                                {{-- https://calendar.app.google/h4mt1C2YnV7wpJ6CA --}}
                                @foreach ($locations as $location)
                                    <!-- Egypt New Location -->
                                    <li class="border-b border-gray-200">
                                        <a href="{{ $location->book_link }}"
                                            class="flex items-center px-6 py-2 hover:bg-gray-100 text-sm">
                                            <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                                            <span> {{ $location->{'title_' . $sign} }} </span>
                                        </a>

                                    </li>
                                @endforeach
                                <!-- Madinaty Location -->
                                {{-- <li class="border-b border-gray-200">
                                    <a href="https://calendar.app.google/qA4jtcStpPtXeGpN7 "
                                        class="flex items-center px-6 py-2 hover:bg-gray-100 text-sm">
                                        <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                                        <span>مدينتي - Madinaty</span>
                                    </a>

                                </li>

                                <!-- New Cairo Location -->
                                <li>
                                    <a href="https://calendar.app.google/n1nNKEj3tfvUUL2P6 "
                                        class="flex items-center px-6 py-2 hover:bg-gray-100 text-sm">
                                        <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                                        <span>التجمع - New Cairo</span>
                                    </a>

                                </li> --}}
                            </ul>
                        </div>
                        <a class="text-xs  bg-[#333133] rounded-full p-2 md:p-4 text-white text-center whitespace-nowrap flex items-center justify-center flex-nowrap"
                            href="https://surveyheart.com/form/659f1393fe62f1133c8debfd" target="_blank">
                            {{ __('Book A Virtual Consultation') }}
                        </a>

                </div>
                <div class="flex items-center justify-center gap-2 text-xs">
                
                    <a href="tel:+2{{$randomPhone}}" target="_blank" class="flex flex-col md:flex-row items-center text-gray-900 md:hidden">
                        <span class="flex items-center">
                            {{ __('Book now') }}
                        </span>
                        <span class="flex items-center font-bold gap-1 text-lg">
                            <i class="fa-solid fa-phone"></i>
                            <span class=""> {{$randomPhone}}</span>
                        </span>
                    </a>
                    <button id="mobile-menu-button"
                        class="flex items-center md:hidden px-3 py-2 border rounded text-gray-900">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                
                </div>                

            <!--<div class="p-2 flex flex-wrap align-center justify-center flex-wrap text-[#333133] bold md:hidden gap-4">-->
               
            <!--</div>-->
               </div>
            </div>
            
<ul id="mobile-menu" 
    class="hidden md:flex z-[100] text-[#3e3c3f] uppercase text-xs h-screen md:h-auto overflow-y-auto md:overflow-y-visible flex-col md:flex-row items-stretch justify-between">
    
    <!-- Left-aligned menu items container -->
    <div class="flex flex-col md:flex-row items-stretch flex-1">
        <!-- Dentistry -->
        <li>
            <a href="{{ route('dentistry.index') }}"
                class="flex items-center px-4 py-3 hover:bg-[#3e3c3f] hover:text-white transition-all duration-700">
                <span class="font-medium">{{ __('Dentistry') }}</span>
            </a>
        </li>

        <!-- Invisalign -->
        <li>
            <a href="{{ route('invisalign.index') }}"
                class="flex items-center px-4 py-3 hover:bg-[#3e3c3f] hover:text-white transition-all duration-700">
                <span class="font-medium">{{ __('Invisalign') }}</span>
            </a>
        </li>

        <!-- Dental Implants -->
        <li>
            <a href="{{ route('dental-implants.index') }}"
                class="flex items-center px-4 py-3 hover:bg-[#3e3c3f] hover:text-white transition-all duration-700">
                <span class="font-medium">{{ __('dental implants') }}</span>
            </a>
        </li>

        <!-- Veneers -->
        <li>
            <a href="{{ route('veneers.index') }}"
                class="flex items-center px-4 py-3 hover:bg-[#3e3c3f] hover:text-white transition-all duration-700">
                <span class="font-medium">{{ __('Veneers') }}</span>
            </a>
        </li>

        <!-- About Us Dropdown -->
        <li class="group relative">
            <div class="flex items-center px-4 py-3 cursor-pointer">
                <span class="font-medium mr-1">{{ __('About Us') }}</span>
            </div>
            <ul class="absolute left-0 text-[#3e3c3f] mt-2 w-full bg-white shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-10 rounded-md">
                <li>
                    <a href="{{ route('doctors.index') }}" class="block px-4 py-2 hover:bg-gray-100">
                        {{ __('Staff') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact.index') }}" class="block px-4 py-2 hover:bg-gray-100">
                        {{ __('Contact') }}
                    </a>
                </li>
            </ul>
        </li>
        
        <!--Medical tourism-->

    <li>
    <a href="{{ route('medical-tourism.index') }}"
        class="flex items-center px-4 py-3 hover:bg-[#3e3c3f] hover:text-white transition-all duration-700">
        <span class="font-medium">{{ __('السياحة العلاجية') }}</span>
    </a>
</li>
        <!-- Blogs -->
        <li>
            <a href="{{ route('blogs.index') }}"
                class="flex items-center px-4 py-3 hover:bg-[#3e3c3f] hover:text-white transition-all duration-700">
                <span class="font-medium">{{ __('blogs') }}</span>
            </a>
        </li>

        <!-- Services -->
        <li>
            <a href="{{ route('services.index') }}"
                class="flex items-center px-4 py-3 hover:bg-[#3e3c3f] hover:text-white transition-all duration-700">
                <span class="font-medium">{{ __('Services') }}</span>
            </a>
        </li>
    </div>


    
    <li>
        
@php
    $locale = app()->getLocale();
    $target = $locale === 'ar' ? 'en' : 'ar';

    // remove current locale from URL
    $path = request()->path(); // e.g. ar/service
    $segments = explode('/', $path);

    // remove first segment if it's locale
    if (in_array($segments[0], ['ar', 'en'])) {
        array_shift($segments);
    }

    $newPath = implode('/', $segments);
@endphp

<a href="/{{ $target }}{{ $newPath ? '/' . $newPath : '' }}">
    {{ strtoupper($target) }}
</a>





    </li>
</ul>                
        </nav>
    </header>
    <!-- end header -->



    @yield('content')
<footer class="bg-[#333133] text-white py-8 md:py-12">
    <div class="container px-6 mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-6 gap-8">
            <!-- Logo and Contact Info -->
            <div class="md:col-span-1">
                <a href="{{ route('front.index') }}" class="block">
                    <!--<img src="{{ $gs->{'logo_' . $sign} }}" class="h-16 md:h-24 w-auto" alt="Company Logo">-->
                                        <img src="/images/logo-w-tr.png" alt="Logo" />

                </a>
                <div class="">
                    <h4 class="text-lg font-semibold mb-4">{{ __('Connect With Us') }}</h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="tel:{{ $randomPhone }}" class="flex items-center text-gray-300 hover:text-white transition">
                                <i class="fas fa-phone {{ $sign == 'ar' ? 'ml-3' : 'mr-3' }} text-blue-400"></i>
                                <span>{{ $randomPhone }}</span>
                            </a>
                        </li>
                        @foreach($emails as $email)
                            @if(!empty($email))
                                <li>
                                    <a href="mailto:{{ $email }}" class="flex items-center text-gray-300 hover:text-white transition">
                                        <i class="fas fa-envelope {{ $sign == 'ar' ? 'ml-3' : 'mr-3' }} text-blue-400"></i>
                                        <span class="text-sm">{{ $email }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

           
            <!-- Quick Links -->
            <div class="md:col-span-1">
                <h3 class="text-lg font-bold mb-4">{{ __('Quick Links') }}</h3>
                <ul class="space-y-2">
                    @foreach([
                        ['route' => 'front.index', 'text' => __('Home')],
                        ['route' => 'services.index', 'text' => __('Services')],
                        ['route' => 'doctors.index', 'text' => __('Our Doctors')],
                        ['route' => 'blogs.index', 'text' => __('Blog')],
                        ['route' => 'contact.index', 'text' => __('Contact Us')]
                    ] as $link)
                    <li>
                        <a href="{{ route($link['route']) }}" class="text-gray-300 hover:text-white transition flex items-center">
                            <i class="fas fa-chevron-left text-xs {{ $sign == 'ar' ? 'ml-2' : 'mr-2' }} text-blue-400"></i>
                            {{ $link['text'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Services -->
            <div class="md:col-span-1">
                <h3 class="text-lg font-bold mb-4">{{ __('Our Services') }}</h3>
                <ul class="space-y-2">
                    @foreach([
                        ['route' => 'dentistry.index', 'text' => __('Dentistry')],
                        ['route' => 'invisalign.index', 'text' => __('Invisalign')],
                        ['route' => 'dental-implants.index', 'text' => __('Dental Implants')],
                        ['route' => 'veneers.index', 'text' => __('Veneers')]
                    ] as $service)
                    <li>
                        <a href="{{ route($service['route']) }}" class="text-gray-300 hover:text-white transition flex items-center">
                            <i class="fas fa-chevron-left text-xs {{ $sign == 'ar' ? 'ml-2' : 'mr-2' }} text-blue-400"></i>
                            {{ $service['text'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
 <!-- Recent Articles -->
            <div class="md:col-span-2">
    <h4 class="text-lg font-bold mb-4">{{ __('Recent Articles') }}</h4>
    <div class="space-y-4">
        @if(isset($blogs) && $blogs->isNotEmpty())
            @foreach($blogs->take(3) as $blog)
            <div class="flex gap-3">
                <a href="{{ route('single-blog.index', ['blog' => $blog->{'slug_' . $sign} ]) }}" class="flex-shrink-0">
                    <img src="{{ $blog->photo }}" alt="{{ $blog->{'title_' . $sign} }}" class="w-20 h-16 object-cover rounded">
                </a>
                <div class="{{ $sign == 'ar' ? 'mr-2' : 'ml-2' }}">
                    <h5 class="font-medium text-sm">
                        <a href="{{ route('single-blog.index', [ 'blog' => $blog->{'slug_' . $sign} ]) }}" class="hover:text-blue-300 transition">{{ $blog->{'title_' . $sign} }}</a>
                    </h5>
                    <span class="inline-block bg-blue-600 text-white px-2 py-0.5 text-xs rounded mt-1">
                        <!--@if(Route::has('blog.category'))-->
                        <!--    <a href="{{ route('blog.category', ['category' => 'غير-مصنف']) }}">{{ __('مقالات') }}</a>-->
                        <!--@else-->
                        <!--    {{ __('مقالات') }}-->
                        <!--@endif-->
                    </span>
                </div>
            </div>
            @endforeach
        @else
            <p>{{ __('No recent articles available') }}</p>
        @endif
    </div>
</div>
            <!-- Locations and Social -->
            <div class="md:col-span-1">
                <h3 class="text-lg font-bold mb-4">{{ __('Our Locations') }}</h3>
                <ul class="space-y-3">
                  
                    @foreach ($locations as $location)
                                    <!-- Egypt New Location -->
                    <li class="flex items-start">
                                        <a href="{{ $location->address_ar }}"
                                            class="">
                        <i class="fas fa-map-marker-alt mt-1 {{ $sign == 'ar' ? 'ml-3' : 'mr-3' }} text-blue-400"></i>
<span class="text-gray-300 text-sm">
                            {{ $location->{'title_' . $sign} }}
                        </span>                                        </a>

                                    </li>
                                @endforeach
                </ul>
                
                <div class="mt-6">
                    <h4 class="text-lg font-bold mb-3">{{ __('Follow Us') }}</h4>
                    <div class="flex {{ $sign == 'ar' ? 'space-x-reverse' : '' }} space-x-4">
                        @if (App\Models\Socialsetting::find(1)->f_status == 1)
                            <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" target="_blank" class="text-gray-300 hover:text-white transition">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </a>
                        @endif
                        @if (App\Models\Socialsetting::find(1)->t_status == 1)
                            <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" target="_blank" class="text-gray-300 hover:text-white transition">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                        @endif
                        @if (App\Models\Socialsetting::find(1)->ystatus == 1)
                            <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" target="_blank" class="text-gray-300 hover:text-white transition">
                                <i class="fab fa-youtube text-xl"></i>
                            </a>
                        @endif
                        @if (App\Models\Socialsetting::find(1)->d_status == 1)
                            <a href="{{ App\Models\Socialsetting::find(1)->dribble }}" target="_blank" class="text-gray-300 hover:text-white transition">
                                <i class="fab fa-tiktok text-xl"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-700 mt-8 pt-6">
            <div class="flex flex-col md:flex-row justify-center items-center">
                <p class="text-gray-400 text-sm mb-3 md:mb-0">
                    &copy; {{ date('Y') }} {{ $gs->website_title }}. {{ __('All rights reserved') }}.
                </p>
                <a href="https://www.cangrowonline.com/" target="_blank" class="flex items-center">
                    <span class="text-gray-400 text-sm {{ $sign == 'ar' ? 'ml-2' : 'mr-2' }}">{{ __('Developed by') }}</span>
                    <img src="https://alrehab-eg.com/front/alrehab/assets/CanGrow logo.png" 
                         class="h-14 w-auto" 
                         alt="CanGrow Online">
                </a>
            </div>
        </div>
    </div>
</footer>

<!--<footer class="bg-gray-100 w-full text-gray-700">-->
    
<!--    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">-->
        
<!--        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">-->

<!--            <div>-->
<!--                <h4 class="text-xl font-semibold text-gray-800 mb-6">{{ __('Connect With Us') }}</h4>-->
<!--                <div class="space-y-4">-->
<!--                    <div>-->
<!--                        <p class="font-bold text-gray-800 mb-2">{{ $gs->{'title_' . $sign} }}</p>-->
<!--                        @foreach ($addresses as $address)-->
<!--                            <p class="text-sm">{{ $address }}</p>-->
<!--                        @endforeach-->
<!--                    </div>-->
<!--                    <ul class="space-y-3">-->
<!--                        <li>-->
<!--                            <a href="tel:{{ $randomPhone }}" class="flex items-center text-blue-600 hover:text-blue-800 transition-colors">-->
<!--                                <i class="fas fa-phone mr-3 text-lg"></i>-->
<!--                                <span>{{ $randomPhone }}</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        @foreach ($emails as $email)-->
<!--                            <li>-->
<!--                                <a class="flex items-center text-blue-600 hover:text-blue-800 transition-colors" href="mailto:{{ $email }}">-->
<!--                                    <i class="fas fa-envelope mr-3 text-lg"></i>-->
<!--                                    <span>{{ $email }}</span>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                        @endforeach-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="md:col-span-2">-->
<!--                <h4 class="text-xl font-semibold text-gray-800 mb-6">{{ __('Our Locations') }}</h4>-->
<!--                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">-->
<!--                    @foreach ($locations as $location)-->
<!--                        <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">-->
<!--                            <h5 class="font-semibold text-gray-800 mb-3">{{ $location->{'title_' . $sign} }}</h5>-->
<!--                            <div class="flex flex-col space-y-3">-->
<!--                                <a href="{{ $location->book_link }}" class="text-blue-600 hover:text-blue-800 transition-colors flex items-center">-->
<!--                                    <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>-->
<!--                                    <span>{{ __('Book Appointment') }}</span>-->
<!--                                </a>-->
<!--                                <a href="{{ $location->address_ar }}" class="text-green-600 hover:text-green-800 transition-colors flex items-center">-->
<!--                                    <i class="fas fa-map-marker-alt mr-2 text-green-500"></i>-->
<!--                                    <span>{{ __('View Map') }}</span>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    @endforeach-->
<!--                </div>-->
<!--            </div>-->

<!--        </div>-->
<!--    </div>-->

<!--    <div class="border-t border-gray-200 py-6 text-sm text-gray-600">-->
<!--        <p class="text-center flex flex-wrap justify-center items-center px-4">-->
<!--            <span class="mr-1">{{ date('Y') }} &copy; {{ __('All rights reserved') }}</span>-->
<!--            <a target="_blank" href="https://www.cangrowonline.com/" class="flex items-center mx-2">-->
<!--                <img src="https://alrehab-eg.com/front/alrehab/assets/CanGrow logo.png" class="h-12 w-auto" alt="CanGrow Online">-->
<!--            </a>-->
<!--        </p>-->
<!--    </div>-->
<!--</footer>-->
    <!--<footer class="bg-gray-50  w-full">-->
        <!-- Locations Section -->
    <!--    <section class="py-12 px-4 md:px-0">-->
    <!--        <div class="container mx-auto flex flex-col md:flex-row gap-8">-->
                <!-- Address Column -->
    <!--            <div class="w-full md:w-1/2">-->
    <!--                <div class="prose">-->
    <!--                    <h4 class="text-lg font-bold mb-4">{{ __('Connect') }}</h4>-->
    <!--                </div>-->
    <!--                <div class="flex flex-col md:flex-row gap-8 mt-4">-->
    <!--                    <div class="w-full md:w-1/2">-->
    <!--                        <div class="prose">-->
    <!--                            <p><strong> {{ $gs->{'title_' . $sign} }}</strong></p>-->
    <!--                             @foreach ($addresses as $address)-->
    <!--                            <p>{{ $address }}</p>-->
    <!--                             @endforeach-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="w-full md:w-1/2">-->
    <!--                        <ul class="space-y-3">-->
    <!--                            <li class="flex items-center">-->
    <!--                                <a href="tel:213-385-9710"-->
    <!--                                    class="flex items-center text-blue-600 hover:underline">-->
    <!--                                    <i class="fas fa-phone mr-2 w-4 text-center"></i>-->
    <!--                                    <span>{{ $randomPhone }}</span>-->
    <!--                                </a>-->
    <!--                            </li>-->
    <!--                            <li class="flex items-center">-->
    <!--                                @foreach ($emails as $email)-->
    <!--                                    <a class="flex items-center text-blue-600 hover:underline"-->
    <!--                                        href="mailto:{{ $email }}">-->
    <!--                                        <i class="fas fa-envelope mr-2 w-4 text-center"></i>-->
    <!--                                        <span>{{ $email }}</span></a>-->
    <!--                                @endforeach-->

    <!--                            </li>-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

                <!-- Social & Payment Column -->
    <!--            <div class="w-full md:w-1/2">-->
    <!--                <div class="flex flex-col md:flex-row gap-8">-->
                        <!--<div class="w-full md:w-1/2">-->
                        <!--    <div class="flex space-x-4">-->

                        <!--        @if (App\Models\Socialsetting::find(1)->d_status == 1)-->
                        <!--            <a href="{{ App\Models\Socialsetting::find(1)->dribble }}" target="_blank"-->
                        <!--                class="bg-black text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-gray-800">-->
                        <!--                <i class="fab fa-tiktok"></i>-->
                        <!--            </a>-->
                        <!--        @endif-->
                        <!--        @if (App\Models\Socialsetting::find(1)->f_status == 1)-->
                        <!--            <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" target="_blank"-->
                        <!--                class="bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-blue-700">-->
                        <!--                <i class="fab fa-facebook-f"></i>-->
                        <!--            </a>-->
                        <!--        @endif-->
                        <!--        @if (App\Models\Socialsetting::find(1)->ystatus == 1)-->
                        <!--            <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" target="_blank"-->
                        <!--                class="bg-red-600 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-red-700">-->
                        <!--                <i class="fab fa-youtube"></i>-->
                        <!--            </a>-->
                        <!--        @endif-->
                        <!--        @if (App\Models\Socialsetting::find(1)->t_status == 1)-->
                        <!--            <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" target="_blank"-->
                        <!--                class="bg-pink-600 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-pink-700">-->
                        <!--                <i class="fab fa-instagram"></i>-->
                        <!--            </a>-->
                        <!--        @endif-->
                                   

                        <!--                                <a  class="flex items-center gap-1">-->
                        <!--    <span class="elementor-icon-list-icon">-->
                        <!--        <i aria-hidden="true" class="fas fa-phone-square"></i> </span>-->
                        <!--    <span class=" hidden md:block">-->
                        <!--        {{ $randomPhone }}</span>-->
                        <!--</a>-->

                        <!--    </div>-->
                        <!--</div>-->
    <!--                    {{-- <div class="w-full md:w-1/2">-->
    <!--                        <form name="PrePage" method="post"-->
    <!--                            action="https://Simplecheckout.authorize.net/payment/CatalogPayment.aspx">-->
    <!--                            <input type="hidden" name="LinkId" value="dcf1a658-065f-48ba-a25a-d65eef2040d2">-->
    <!--                            <button type="submit"-->
    <!--                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">-->
    <!--                                Make A Payment-->
    <!--                            </button>-->
    <!--                        </form>-->
    <!--                    </div> --}}-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </section>-->
    <!--    <section class="container mx-auto px-4 py-8">-->
    <!--        <div class="flex flex-col md:flex-row justify-evenly items-center gap-6 md:gap-4">-->

    <!--            @foreach ($locations as $location)-->
                    <!-- Heliopolis -->
    <!--                <div class="text-center md:text-left w-full md:w-auto">-->
    <!--                    <h4 class="font-semibold text-gray-800 mb-2">-->
    <!--                        {{ $location->{'title_' . $sign} }}</h4>-->
    <!--                    <div class="flex justify-center md:justify-start space-x-6">-->
    <!--                        <a href="{{ $location->book_link }}"-->
    <!--                            class="text-blue-600 hover:text-blue-800 transition-colors flex items-center">-->
    <!--                            <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>-->
    <!--                            <span>{{ __('Book') }}</span>-->
    <!--                        </a>-->
    <!--                        <a href="{{ $location->address_ar }}"-->
    <!--                            class="text-green-600 hover:text-green-800 transition-colors flex items-center">-->
    <!--                            <i class="fas fa-map-marker-alt mr-2 text-green-500"></i>-->
    <!--                            <span>{{ __('Map') }}</span>-->
    <!--                        </a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            @endforeach-->
                <!-- Madinaty -->
    <!--            {{-- <div class="text-center md:text-left w-full md:w-auto">-->
    <!--                <h4 class="font-semibold text-gray-800 mb-2">مدينتي - Madinaty</h4>-->
    <!--                <div class="flex justify-center md:justify-start space-x-6">-->
    <!--                    <a href="https://calendar.app.google/qA4jtcStpPtXeGpN7"-->
    <!--                        class="text-blue-600 hover:text-blue-800 transition-colors flex items-center">-->
    <!--                        <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>-->
    <!--                        <span>Book</span>-->
    <!--                    </a>-->
    <!--                    <a href="https://maps.app.goo.gl/EEUHhwQFaQnpaMw89?g_st=aw"-->
    <!--                        class="text-green-600 hover:text-green-800 transition-colors flex items-center">-->
    <!--                        <i class="fas fa-map-marker-alt mr-2 text-green-500"></i>-->
    <!--                        <span>Map</span>-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--            </div>-->

                <!-- New Cairo -->
    <!--            <div class="text-center md:text-left w-full md:w-auto">-->
    <!--                <h4 class="font-semibold text-gray-800 mb-2">التجمع - New Cairo</h4>-->
    <!--                <div class="flex justify-center md:justify-start space-x-6">-->
    <!--                    <a href="https://calendar.app.google/n1nNKEj3tfvUUL2P6"-->
    <!--                        class="text-blue-600 hover:text-blue-800 transition-colors flex items-center">-->
    <!--                        <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>-->
    <!--                        <span>Book</span>-->
    <!--                    </a>-->
    <!--                    <a href="https://maps.app.goo.gl/a3YxuJ4rT5SroTjz9?g_st=aw"-->
    <!--                        class="text-green-600 hover:text-green-800 transition-colors flex items-center">-->
    <!--                        <i class="fas fa-map-marker-alt mr-2 text-green-500"></i>-->
    <!--                        <span>Map</span>-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--            </div> --}}-->
    <!--        </div>-->
    <!--    </section>-->

    <!--    <section class="border-t py-6">-->
    <!--        <p class=" text-center flex-wrap flex justify-center items-center text-accent  uppercase">-->
    <!--            <span class="text-accent" id="year-footer">{{ date('Y') }}
    </span>© جميع الحقوق محفوظة<a-->
    <!-- --> 
    <!--                target="_blank" href="https://www.cangrowonline.com/">-->
    <!--                <img src="https://alrehab-eg.com/front/alrehab/assets/CanGrow logo.png" class=" w-40 h-20"-->
    <!--                    alt="">-->
    <!--            </a>-->
    <!--        </p>-->
    <!--    </section>-->
    <!--</footer>-->

    <!-- Font Awesome CDN -->

    <!-- Fixed Social Icons -->
    <div class="fixed bottom-5 right-0  flex flex-col space-y-2 z-20 mr-2">

        @if (App\Models\Socialsetting::find(1)->d_status == 1)
            <a href="{{ App\Models\Socialsetting::find(1)->dribble }}" target="_blank"
                class="bg-black text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-800">
                <i class="fab fa-tiktok"></i>
            </a>
        @endif
        @if (App\Models\Socialsetting::find(1)->f_status == 1)
            <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" target="_blank"
                class="bg-blue-600 text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-blue-700">
                <i class="fab fa-facebook-f"></i>
            </a>
        @endif
        @if (App\Models\Socialsetting::find(1)->ystatus == 1)
            <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" target="_blank"
                class="bg-red-600 text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-red-700">
                <i class="fab fa-youtube"></i>
            </a>
        @endif
        @if (App\Models\Socialsetting::find(1)->t_status == 1)
            <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" target="_blank"
                class="bg-pink-600 text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-pink-700">
                <i class="fab fa-instagram"></i>
            </a>
        @endif
         <a href="https://wa.me/2{{$randomPhone}}" target="_blank"
                class="bg-green-900 text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-green-700">
                <!--<i class="fab fa-whats"></i>-->
                <i class="fa-brands fa-whatsapp"></i>
        </a>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
    </script>


    @include('includes.script')



    <script src="{{ asset('build/js/toastr.js') }}"></script>


    <script type="text/javascript">
        var logo_src = "{{ $gs->{'logo_' . $sign} }}";
    </script>



    <script type="text/javascript">
        var mainurl = "{{ url('/') }}";
        var mainurl2 = "{{ url('/') }}";
        var gs = {!! json_encode($gs) !!};
        var langg = {!! json_encode($sign) !!};
        var mainurl2 = "{{ url('/') }}";

        $(".selectors").on('change', function() {
            var url = $(this).val();
            window.location = url;
        });
    </script>
   @yield('js')
    <script>
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
 

</body>

</html>
