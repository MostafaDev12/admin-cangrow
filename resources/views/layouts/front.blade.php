<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp




    <meta property="og:title" content="{{ $gs->{'title_' . $sign} }}">
    <meta property="og:description" content="{{ $gs->{'title_' . $sign} }}">
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
    @elseif(isset($blog->meta_tag) && isset($blog->meta_description))
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->meta_description }}">
        <meta property="og:description" content="{{ $blog->meta_description }}">
    @else
        <meta name="+author" content=" {{ $gs->{'title_' . $sign} }}">

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


    @include('includes.style')


   @yield(section: 'css')





</head>

@php
    $phones = explode(',', $gs->phones);
    $emails = explode(',', $gs->emails);
    $addresses = json_decode($gs->{'addresses_' . $sign});

    $randomPhone = Arr::random($phones);
@endphp


<body class="bg-[#f5f5f5] font-cairo">
    <!-- start header -->
    <header class="sticky bg-white z-50 left-0 top-0 w-full shadow">
        <nav class="container px-6">
            <div class="flex items-center justify-between text-white">
                <a href="{{ route('front.index') }}">
                    <img src="{{ $gs->{'logo_' . $sign} }}" class="h-20" alt="">
                </a>

                <div class="p-2 flex flex-wrap align-center justify-center text-[#333133] bold  gap-1 md:gap-4">
                    <div class="flex items-center justify-between gap-2 md:gap-4">
                        <a href="#">{{ __('Emergency Info') }}</a>

                        <a href="tel:213-385-9710" class="flex items-center gap-1">
                            <span class="elementor-icon-list-icon">
                                <i aria-hidden="true" class="fas fa-phone-square"></i> </span>
                            <span class=" hidden md:block">
                                {{ $randomPhone }}</span>
                        </a>
                    </div>
                    <div class="hidden md:flex items-center justify-between gap-2 md:gap-4">
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
                                            <span> {{ $location->title_ar . ' - ' . $location->title_en }} </span>
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
                        <a class="text-xs text-center bg-[#333133] rounded-full p-2 md:p-4 text-white text-center whitespace-nowrap flex items-center justify-center flex-nowrap"
                            href="{{ route('contact.index') }}" target="_blank">
                            {{ __('Book A Virtual Consultation') }}
                        </a>

                    </div>
                </div>
                <button id="mobile-menu-button"
                    class="flex items-center md:hidden px-3 py-2 border rounded text-gray-900">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <ul id="mobile-menu" class="hidden md:flex text-[#3e3c3f]  uppercase text-xs justify-center items-center">
                <!-- {/* Dentistry */} -->
                <li class="relative">
                    <a href="{{ route('dentistry.index') }}"
                        class="flex items-center px-4 py-3 hover:bg-[#3e3c3f] hover:text-white transition-all duration-700 ">
                        <span class="font-medium">{{ __('Dentistry') }}</span>
                    </a>
                </li>

                <!-- {/* Invisalign */} -->
                <li class=" relative">
                    <a href="{{ route('invisalign.index') }}"
                        class="flex items-center px-4 py-3  hover:bg-[#3e3c3f] hover:text-white  transition-all duration-700">
                        <span class="font-medium">{{ __('Invisalign') }}</span>
                    </a>
                </li>

                <!-- {/* Dental Implants */} -->
                <li class=" relative">
                    <a href="{{ route('dental-implants.index') }}"
                        class="flex items-center px-4 py-3  hover:bg-[#3e3c3f] hover:text-white  transition-all duration-700">
                        <span class="font-medium">{{ __('dental implants') }}</span>
                    </a>
                </li>

                <!-- {/* Veneers */} -->
                <li class=" relative">
                    <a href="{{ route('veneers.index') }}"
                        class="flex items-center px-4 py-3  hover:bg-[#3e3c3f] hover:text-white  transition-all duration-700">
                        <span class="font-medium">{{ __('Veneers') }}</span>
                    </a>
                </li>

                

                <!-- {/* Smile Sisters Podcast */} -->
                <!-- <li class=" relative">
                    <a href="/smile-sisters-podcast"
                        class="flex items-center px-4 py-3  hover:bg-[#3e3c3f] hover:text-white  transition-all duration-700">
                        <span class="font-medium">Smile Sisters Podcast</span>
                    </a>
                </li> -->

                <!-- {/* About Us (with dropdown) */} -->
                <li class="group relative  hover:bg-[#3e3c3f] hover:text-white  transition-all duration-700">
                    <div class="flex items-center px-4 py-3 cursor-pointer">
                        <span class="font-medium mr-1">{{ __(key: 'About Us') }}</span>
                        <i class="fa-solid fa-caret-down h-4 w-4 transition-transform group-hover:rotate-180"></i>
                    </div>
                    <ul
                        class="absolute left-0 mt-0 w-48 text-[#3e3c3f] bg-white shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-10">
                        <li>
                            <a href="{{ route('doctors.index') }}" class="block px-4 py-2 hover:bg-gray-100">
                              {{ __(key: 'Staff') }}  
                            </a>
                        </li>
                         
                        <li>
                            <a href="{{ route('contact.index') }}" class="block px-4 py-2 hover:bg-gray-100">
                                {{ __(key: 'Contact') }}
                            </a>
                        </li>

                    </ul>
                </li>
                <li class=" relative">
                    <a href="{{ route('blogs.index') }}"
                        class="flex items-center px-4 py-3  hover:bg-[#3e3c3f] hover:text-white  transition-all duration-700">
                        <span class="font-medium">{{ __(key: 'blogs') }}</span>
                    </a>
                </li>
                <li class=" relative">
                    <a href="{{ route('services.index') }}"
                        class="flex items-center px-4 py-3  hover:bg-[#3e3c3f] hover:text-white  transition-all duration-700">
                        <span class="font-medium">{{ __(key: 'Services') }}</span>
                    </a>
                </li>
                <!-- {/* FYI (with mega dropdown) */} -->
                <!-- <li class="group relative  hover:bg-[#3e3c3f] hover:text-white  transition-all duration-700">
                    <div class="flex items-center px-4 py-3 cursor-pointer">
                        <span class="font-medium mr-1">FYI</span>
                        <i class="fa-solid fa-caret-down h-4 w-4 transition-transform group-hover:rotate-180"></i>
                    </div>
                    <div
                        class="absolute right-0 mt-0 w-96 bg-white shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-100 p-4 grid grid-cols-2 gap-4">
                        <div>
                            <a href="/new-patients-info" class="block px-4 py-2 hover:bg-gray-100">
                                New Patients
                            </a>
                            <a href="https://mychart.myoryx.com/patient/#/home?realm=ladental"
                                class="block px-4 py-2 hover:bg-gray-100">
                                Assess Your Oral Health
                            </a>
                            <a href="https://mychart.myoryx.com/patient/#/home?realm=ladental"
                                class="block px-4 py-2 hover:bg-gray-100">
                                Patient Forms
                            </a>
                            <a href="/dental-insurance" class="block px-4 py-2 hover:bg-gray-100">
                                Insurance
                            </a>
                        </div>
                        <div>
                            <a href="/blog" class="block px-4 py-2 hover:bg-gray-100">
                                Blog
                            </a>
                            <a href="/covid-19-update" class="block px-4 py-2 hover:bg-gray-100">
                                COVID-19
                            </a>

                            <div class="group/sub relative">
                                <div class="flex items-center px-4 py-2 hover:bg-gray-100 cursor-pointer">
                                    <span class="mr-1">Common Dental Problems</span>
                                    <i class="fa-solid fa-caret-up h-4 w-4"></i>
                                </div>
                                <ul
                                    class="absolute right-full top-0 w-48 bg-white shadow-lg opacity-0 invisible group-hover/sub:opacity-100 group-hover/sub:visible ml-1">
                                    <li>
                                        <a href="/common-dental-problems/missing-teeth"
                                            class="block px-4 py-2 hover:bg-gray-100">
                                            Missing Teeth
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/common-dental-problems/broken-teeth"
                                            class="block px-4 py-2 hover:bg-gray-100">
                                            Broken Teeth
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li> -->
            </ul>
            <div class="p-2 flex flex-wrap align-center justify-center text-[#333133] bold md:hidden gap-4">
                <div class="flex items-center justify-between gap-2 md:gap-4">
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
                            @foreach ($locations as $location)
                                <!-- Egypt New Location -->
                                <li class="border-b border-gray-200">
                                    <a href="{{ $location->book_link }}"
                                        class="flex items-center px-6 py-2 hover:bg-gray-100 text-sm">
                                        <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                                        <span>{{ $location->title_ar . ' - ' . $location->title_en }}</span>
                                    </a>

                                </li>
                            @endforeach
                            {{-- <!-- Madinaty Location -->
                            <li class="border-b border-gray-200">
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
                    <a class="text-xs text-center bg-[#333133] rounded-full p-2 md:p-4 text-white text-center whitespace-nowrap flex items-center justify-center flex-nowrap"
                        href="{{ route('contact.index') }}" target="_blank">
                        {{ __('Book A Virtual Consultation') }}
                    </a>

                </div>
            </div>
        </nav>
    </header>
    <!-- end header -->



    @yield('content')



    <footer class="bg-gray-50  w-full">
        <!-- Locations Section -->
        <section class="py-12 px-4 md:px-0">
            <div class="container mx-auto flex flex-col md:flex-row gap-8">
                <!-- Address Column -->
                <div class="w-full md:w-1/2">
                    <div class="prose">
                        <h4 class="text-lg font-bold mb-4">{{ __('Connect') }}</h4>
                    </div>
                    <div class="flex flex-col md:flex-row gap-8 mt-4">
                        <div class="w-full md:w-1/2">
                            <div class="prose">
                                <p><strong> {{ $gs->{'title_' . $sign} }}</strong></p>
                                 @foreach ($addresses as $address)
                                <p>{{ $address }}</p>
                                 @endforeach
                            </div>
                        </div>
                        <div class="w-full md:w-1/2">
                            <ul class="space-y-3">
                                <li class="flex items-center">
                                    <a href="tel:213-385-9710"
                                        class="flex items-center text-blue-600 hover:underline">
                                        <i class="fas fa-phone mr-2 w-4 text-center"></i>
                                        <span>{{ $randomPhone }}</span>
                                    </a>
                                </li>
                                <li class="flex items-center">
                                    @foreach ($emails as $email)
                                        <a class="flex items-center text-blue-600 hover:underline"
                                            href="mailto:{{ $email }}">
                                            <i class="fas fa-envelope mr-2 w-4 text-center"></i>
                                            <span>{{ $email }}</span></a>
                                    @endforeach

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Social & Payment Column -->
                <div class="w-full md:w-1/2">
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="w-full md:w-1/2">
                            <div class="flex space-x-4">

                                @if (App\Models\Socialsetting::find(1)->d_status == 1)
                                    <a href="{{ App\Models\Socialsetting::find(1)->dribble }}" target="_blank"
                                        class="bg-black text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-gray-800">
                                        <i class="fab fa-tiktok"></i>
                                    </a>
                                @endif
                                @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                    <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" target="_blank"
                                        class="bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-blue-700">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                @endif
                                @if (App\Models\Socialsetting::find(1)->ystatus == 1)
                                    <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" target="_blank"
                                        class="bg-red-600 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-red-700">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                @endif
                                @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                    <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" target="_blank"
                                        class="bg-pink-600 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-pink-700">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="w-full md:w-1/2">
                            <form name="PrePage" method="post"
                                action="https://Simplecheckout.authorize.net/payment/CatalogPayment.aspx">
                                <input type="hidden" name="LinkId" value="dcf1a658-065f-48ba-a25a-d65eef2040d2">
                                <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Make A Payment
                                </button>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
        <section class="container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 md:gap-4">

                @foreach ($locations as $location)
                    <!-- Heliopolis -->
                    <div class="text-center md:text-left w-full md:w-auto">
                        <h4 class="font-semibold text-gray-800 mb-2">
                            {{ $location->title_ar . ' - ' . $location->title_en }}</h4>
                        <div class="flex justify-center md:justify-start space-x-6">
                            <a href="{{ $location->book_link }}"
                                class="text-blue-600 hover:text-blue-800 transition-colors flex items-center">
                                <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                                <span>{{ __('Book') }}</span>
                            </a>
                            <a href="{{ $location->map }}"
                                class="text-green-600 hover:text-green-800 transition-colors flex items-center">
                                <i class="fas fa-map-marker-alt mr-2 text-green-500"></i>
                                <span>{{ __('Map') }}</span>
                            </a>
                        </div>
                    </div>
                @endforeach
                <!-- Madinaty -->
                {{-- <div class="text-center md:text-left w-full md:w-auto">
                    <h4 class="font-semibold text-gray-800 mb-2">مدينتي - Madinaty</h4>
                    <div class="flex justify-center md:justify-start space-x-6">
                        <a href="https://calendar.app.google/qA4jtcStpPtXeGpN7"
                            class="text-blue-600 hover:text-blue-800 transition-colors flex items-center">
                            <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                            <span>Book</span>
                        </a>
                        <a href="https://maps.app.goo.gl/EEUHhwQFaQnpaMw89?g_st=aw"
                            class="text-green-600 hover:text-green-800 transition-colors flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-green-500"></i>
                            <span>Map</span>
                        </a>
                    </div>
                </div>

                <!-- New Cairo -->
                <div class="text-center md:text-left w-full md:w-auto">
                    <h4 class="font-semibold text-gray-800 mb-2">التجمع - New Cairo</h4>
                    <div class="flex justify-center md:justify-start space-x-6">
                        <a href="https://calendar.app.google/n1nNKEj3tfvUUL2P6"
                            class="text-blue-600 hover:text-blue-800 transition-colors flex items-center">
                            <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                            <span>Book</span>
                        </a>
                        <a href="https://maps.app.goo.gl/a3YxuJ4rT5SroTjz9?g_st=aw"
                            class="text-green-600 hover:text-green-800 transition-colors flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-green-500"></i>
                            <span>Map</span>
                        </a>
                    </div>
                </div> --}}
            </div>
        </section>

        <section class="border-t py-6">
            <p class=" text-center flex-wrap flex justify-center items-center text-accent  uppercase">
                <span class="text-accent" id="year-footer">{{ date('Y') }}<!-- --> </span>© جميع الحقوق محفوظة<a
                    target="_blank" href="https://www.cangrowonline.com/">
                    <img src="https://alrehab-eg.com/front/alrehab/assets/CanGrow logo.png" class=" w-40 h-20"
                        alt="">
                </a>
            </p>
        </section>
    </footer>

    <!-- Font Awesome CDN -->

    <!-- Fixed Social Icons -->
    <div class="fixed bottom-10 right-0  flex flex-col space-y-2 z-50 mr-2">

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
