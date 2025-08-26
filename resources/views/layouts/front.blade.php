<!DOCTYPE html>
<html lang="{{ $sign }}">

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
    @elseif(isset($blog->{'meta_details_' . $sign}))
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->{'meta_details_' . $sign} }}">
        <meta property="og:description" content="{{ $blog->{'meta_details_' . $sign} }}">
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


<body class="bg-black" dir="{{ session::get('front_language_duraction') }}" lang="{{ $sign }}">

    <header
        class="bg-[url('{{ asset('front/gulddal/') }}/images/headerBack.png')]  bg-repeat sticky top-0 z-[1000] text-primary hidden lg:block">
        <div class="container mx-auto px-4 py-4">
            <div dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}"
                class="flex items-cneter relative justify-between">
                <!-- Logo Section -->
                <div class=" animate-slideInLeft" style="animation-delay: 0.2s;">
                    <a href="{{ route('front.index', $sign) }}" class="">
                        <img src="{{ $gs->{'logo_' . $sign} }}" alt="MWM Gulddal Systems Logo"
                            class="logo h-40 scale-150 transition-transform duration-300">
                    </a>

                </div>
                @php
                    $lang = App\Models\Language::where('sign', '!=', $sign)->first();
                @endphp
                <!-- Menu and Social Links -->
                <div dir="{{ session::get('front_language_duraction') }}" class="">
                    <!-- Social Links and Language -->
                    <div class="w-full animate-slideInDown" style="animation-delay: 0.2s;">
                        @if ($lang)
                            <a href="{{ route('change-lang.index', $lang->id) }}"
                                class="text-[#bbac7d]  hover:text-gray-800">{{ $lang->language }}</a>
                        @endif
                        <span class="mx-2 text-primary ">|</span>

                        <span class="text-[#bbac7d]  ml-2">{{ __('تابعنا') }}</span>
                        <a href="https://www.facebook.com/mwmgulddalsystems" target="_blank"
                            class="text-[#bbac7d]  mx-1 hover:text-primary ">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/mwmgulddalsystems" target="_blank"
                            class="text-[#bbac7d]  mx-1 hover:text-primary ">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/mwm-gulddal-systems" target="_blank"
                            class="text-[#bbac7d]  mx-1 hover:text-primary ">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <!-- Main Menu -->
                    <nav id="menu-main" class="w-full mt-10 transition-all animate-slideInLeft">
                        <ul class="flex items-center text-gray-700 ">
                            <li><a href="{{ route('front.index', $sign) }}"
                                    class="text-primary hover:bg-primary hover:text-white p-4">{{ __('الرئيسية') }}</a>
                            </li>
                            <li><a href="{{ route('about.index', $sign) }}"
                                    class="text-primary hover:bg-primary hover:text-white p-4 ">
                                    {{ __('عن الشركة') }}</a></li>
                            <!-- Products Dropdown -->
                            <li class="relative group">
                                <a href="#"
                                    class="text-primary hover:bg-primary hover:text-white p-4  flex items-center">
                                    {{ __('المنتجات') }}
                                    <i class="fa fa-chevron-down mr-1 text-xs"></i>
                                </a>
                                <ul
                                    class="dropdown absolute bg-[url('{{ asset('front/gulddal/') }}/images/headerBack.png')]  bg-repeat text-primary shadow-lg w-72 right-0 z-20">

                                    @foreach ($categories as $category)
                                        <li class="relative group">
                                            <a href="#" class=" px-4 py-2 hover:bg-gray-100 flex justify-between">
                                                {!! $category->{'title_' . $sign} ?? '' !!}
                                                <i class="fa fa-chevron-left mr-1 text-xs"></i>
                                            </a>
                                            <ul
                                                class="dropdown absolute bg-[url('{{ asset('front/gulddal/') }}/images/headerBack.png')]  bg-repeat text-primary shadow-lg w-56 right-full top-0 z-30">

                                                @foreach ($category->parentServices as $parentServices)
                                                    <li class="relative group">
                                                        <a href="{{ route('single-service.index', ['lang' => $sign, 'slug' => $parentServices->{'slug_' . $sign}]) }}"
                                                            class="block px-4 py-2 hover:bg-gray-100"> أنظمة SBP </a>
                                                        <ul
                                                            class="dropdown absolute bg-[url('{{ asset('front/gulddal/') }}/images/headerBack.png')]  bg-repeat text-primary shadow-lg w-48 right-full top-0">

                                                            @foreach ($parentServices->childs as $service)
                                                                <li><a href="{{ route('single-service.index', ['lang' => $sign, 'slug' => $service->{'slug_' . $sign}]) }}"
                                                                        class="block px-4 py-2 hover:bg-gray-100">
                                                                        {!! $service->{'title_' . $sign} ?? '' !!}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <!-- Solutions Dropdown -->
                           
                            <li class="relative group">
                                <a href="#"
                                    class="text-primary hover:bg-primary hover:text-white p-4  flex items-center">
                                    {{ __('معرض الصور') }}
                                    <i class="fa fa-chevron-down mr-1 text-xs"></i>
                                </a>
                                <ul
                                    class="dropdown absolute bg-[url('{{ asset('front/gulddal/') }}/images/headerBack.png')]  bg-repeat text-primary shadow-lg w-72 right-0 z-20">

                                    @foreach ($categories as $category)
                                        <li class="relative group">
                                            <a href="#" class=" px-4 py-2 hover:bg-gray-100 flex justify-between">
                                                {!! $category->{'title_' . $sign} ?? '' !!}
                                                <i class="fa fa-chevron-left mr-1 text-xs"></i>
                                            </a>
                                            <ul
                                                class="dropdown absolute bg-[url('{{ asset('front/gulddal/') }}/images/headerBack.png')]  bg-repeat text-primary shadow-lg w-56 right-full top-0 z-30">

                                                @foreach ($category->parentServices as $parentServices)
                                                    <li class="relative group">
                                                        <a href="{{ route('gallery.index', ['lang' => $sign, 'slug' => $parentServices->{'slug_' . $sign}]) }}"
                                                            class="block px-4 py-2 hover:bg-gray-100"> أنظمة SBP </a>
                                                        <ul
                                                            class="dropdown absolute bg-[url('{{ asset('front/gulddal/') }}/images/headerBack.png')]  bg-repeat text-primary shadow-lg w-48 right-full top-0">

                                                            @foreach ($parentServices->childs as $service)
                                                                <li><a href="{{ route('gallery.index', ['lang' => $sign, 'slug' => $service->{'slug_' . $sign}]) }}"
                                                                        class="block px-4 py-2 hover:bg-gray-100">
                                                                        {!! $service->{'title_' . $sign} ?? '' !!}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <!-- References Dropdown -->
                            <li class="relative group">
                                <a href="#"
                                    class="text-primary hover:bg-primary hover:text-white p-4  flex items-center">
                                    {{ __('المراجع') }}
                                    <i class="fa fa-chevron-down mr-1 text-xs"></i>
                                </a>
                                <ul
                                    class="dropdown absolute bg-[url('{{ asset('front/gulddal/') }}/images/headerBack.png')]  bg-repeat text-primary shadow-lg w-40 right-0 z-20">
                                    <li><a href="{{ route('blogs.index', $sign) }}"
                                            class="block px-4 py-2 hover:bg-gray-100"> {{ __('المدونات') }}</a>
                                    </li>
 @foreach ($references as $reference)
                                    <li><a href="{{ route('single-model-category.index', ['lang' => $sign, 'id' => $reference->id]) }}?ref={!! $reference->{'title_' . $sign} ?? '' !!}"
                                            class="block px-4 py-2 hover:bg-gray-100">
                                            {!! $reference->{'title_' . $sign} ?? '' !!}</a>
                                    </li>
                                  
                               @endforeach
                                    
                                    
                                </ul>
                            </li>
                            <li><a href="{{ route('careers.index', $sign) }}"
                                    class="text-primary hover:bg-primary hover:text-white p-4 ">{{ __('الوظائف') }}</a>
                            </li>
                            <li><a href="{{ route('contact.index', $sign) }}"
                                    class="text-primary hover:bg-primary hover:text-white p-4 ">
                                    {{ __('اتصل بنا') }}</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <header
        class="bg-[url('{{ asset('front/gulddal/') }}/images/headerBack.png')]  bg-repeat sticky top-0 z-[1000] text-primary lg:hidden">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">


                    <a href="{{ route('front.index', $sign) }}">
                        <img src="{{ $gs->{'logo_' . $sign} }}" alt="MWM Gulddal Systems Logo"
                            class="scale-150 h-16">
                    </a>

                </div>
                <button id="mobile-menu-button" class="text-primary">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
            <div id="mobile-menu" class="mobile-menu">
                <div class="pt-2 pb-4 h-screen overflow-y-scroll space-y-1">
                    <!-- Social Links and Language -->
                    <div class="py-2 border-b">
                        <span class="text-primary  ml-2">{{ __('تابعنا') }}</span>
                        <a href="https://www.facebook.com/mwmgulddalsystems" target="_blank"
                            class="text-primary  mx-1 hover:text-primary ">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/mwmgulddalsystems" target="_blank"
                            class="text-primary  mx-1 hover:text-primary ">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/mwm-gulddal-systems" target="_blank"
                            class="text-primary  mx-1 hover:text-primary ">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <span class="mx-2 text-primary ">|</span>
                        @if ($lang)
                            <a href="{{ route('change-lang.index', $lang->id) }}"
                                class="text-primary  hover:text-gray-800">{{ $lang->language }}</a>
                        @endif
                    </div>
                    <!-- Menu Items -->
                    <div class="relative">
                        <a href="{{ route('front.index', $sign) }}"
                            class="block px-3 py-2 hover:bg-gray-100">{{ __(key: 'الرئيسية') }}</a>
                    </div>
                    <div class="relative">
                        <a href="{{ route('about.index', $sign) }}" class="block px-3 py-2 hover:bg-gray-100">
                            {{ __('عن الشركه') }}</a>
                    </div>
                    <!-- Products -->
                    <div class="relative">
                        <button onclick="toggleSubmenu(this)"
                            class="w-full  px-3 py-2 hover:bg-gray-100 flex justify-between items-center">
                            <span>{{ __('المنتجات') }}</span>
                            <i class="fas fa-chevron-down text-xs transform transition-transform"></i>
                        </button>
                        <div class="submenu hidden pl-4">


                            <div class="relative">
                                <button onclick="toggleSubmenu(this)"
                                    class="w-full  px-3 py-2 hover:bg-gray-100 flex justify-between items-center">
                                    <span>علامات الطرق</span>
                                    <i class="fas fa-chevron-down text-xs transform transition-transform"></i>
                                </button>
                                <div class="submenu hidden pl-4">


                                    <div class="relative">
                                        <button onclick="toggleSubmenu(this)"
                                            class="w-full  px-3 py-2 hover:bg-gray-100 flex justify-between items-center">
                                            <span>أنظمة SBP</span>
                                            <i class="fas fa-chevron-down text-xs transform transition-transform"></i>
                                        </button>
                                        <div class="submenu hidden pl-4">

                                            <a href="./products.html" class="block px-3 py-2 hover:bg-gray-100">SBP
                                                480</a>

                                        </div>
                                    </div>


                                </div>
                            </div>




                        </div>
                        <!-- Solutions -->

                        {{-- <div class="relative">
                            <a href="{{ route('gallery.index', $sign) }}"
                                class="block px-3 py-2 hover:bg-gray-100">{{ __('معرض الصور') }}</a>
                        </div> --}}
                        <!-- References -->
                        <div class="relative">
                            <button onclick="toggleSubmenu(this)"
                                class="w-full  px-3 py-2 hover:bg-gray-100 flex justify-between items-center">
                                <span>{{ __('المراجع') }}</span>
                                <i class="fas fa-chevron-down text-xs transform transition-transform"></i>
                            </button>
                            <div class="submenu hidden pl-4">
                                <a href="{{ route('blogs.index', $sign) }}"
                                    class="block px-3 py-2 hover:bg-gray-100">{{ __('المدونات') }}</a>
                               @foreach ($references as $reference)
                                    <a href="{{ route('single-model-category.index', ['lang' => $sign, 'id' => $reference->id]) }}?ref={!! $reference->{'title_' . $sign} ?? '' !!}"
                                        class="block px-3 py-2 hover:bg-gray-100">
                                        {!! $reference->{'title_' . $sign} ?? '' !!}</a>
                                   
                               @endforeach
                                   
                            </div>
                        </div>
                        <div class="relative">
                            <a href="{{ route('contact.index', $sign) }}" class="block px-3 py-2 hover:bg-gray-100">
                                {{ __('اتصل بنا') }}</a>
                        </div>
                    </div>
                </div>
            </div>
    </header>


    @yield('content')



    <div class="fixed bottom-3 md:bottom-6 right-3 md:right-6 z-50">
        <a href="https://wa.me/+201288867154" target="_blank" rel="noopener noreferrer"
            class="flex items-center justify-center bg-primary text-white p-3
       bg-gray-900 rounded-xl shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800 hover:bg-green-600 ease-in-out">
            <i class="fab fa-whatsapp md:fa-2x"></i>
        </a>
    </div>
    <footer class="bg-black text-white py-10" dir="{{ session::get('front_language_duraction') }}">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8">

                <!-- معلومات الشركة -->
                <div class="mb-8 md:mb-0">
                    <a href="{{ route('front.index', $sign) }}"
                        class="text-center flex items-center justify-center mb-4">
                        <img src="{{ $gs->{'logo_' . $sign} }}" alt="شعار الشركة" class="h-40 scale-150" />
                    </a>
                    <p class="text-sm text-center text-gray-300">
                        {{ $gs->{'footer_' . $sign} }} </p>

                    <!-- أيقونات التواصل الاجتماعي -->
                    <div class="flex text-center my-2 justify-center items-center gap-2">
                        <a href="https://www.facebook.com/mwmgulddalsystems" target="_blank"
                            class="text-primary hover:text-primary transition duration-200">
                            <i class="fab fa-facebook-f text-2xl"></i>
                        </a>
                        <a href="https://www.instagram.com/mwmgulddalsystems" target="_blank"
                            class="text-primary hover:text-primary transition duration-200">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/mwm-gulddal-systems" target="_blank"
                            class="text-primary hover:text-primary transition duration-200">
                            <i class="fab fa-linkedin text-2xl"></i>
                        </a>
                    </div>
                </div>

                <!-- روابط سريعة -->
                <div class="mb-8 md:mb-0">
                    <h4 class="text-lg font-bold text-primary mb-4"> {{ __('روابط سريعة') }}</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('front.index', $sign) }}"
                                class="hover:text-primary transition duration-200">{{ __('الرئيسية') }}</a>
                        </li>
                        <li><a href="{{ route('about.index', $sign) }}"
                                class="hover:text-primary transition duration-200"> {{ __('عن الشركه') }} </a></li>
                        <li><a href="{{ route('blogs.index', $sign) }}"
                                class="hover:text-primary transition duration-200">{{ __('المدونات') }}</a>
                        </li>

                        <li><a href="{{ route('careers.index', $sign) }}"
                                class="hover:text-primary transition duration-200">{{ __('الوظائف') }}</a>
                        </li>
                        <li><a href="{{ route('contact.index', $sign) }}"
                                class="hover:text-primary transition duration-200"> {{ __('اتصل بنا') }} </a>
                        </li>
                    </ul>
                </div>

                <!-- المنتجات -->
                <div class="mb-8 md:mb-0">
                    <h4 class="text-lg font-bold text-primary mb-4">{{ __('منتجاتنا') }}</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="./products.html" class="hover:text-primary transition duration-200">دهانات تخطيط
                                الطرق

                            </a></li>
                        <li><a href="./products.html" class="hover:text-primary transition duration-200">دهانات
                                الأرضيات

                            </a></li>
                        <li><a href="./products.html" class="hover:text-primary transition duration-200">
                                دهانات الحماية</a></li>
                    </ul>
                </div>

                <!-- معلومات التواصل -->
                <div>
                    <h4 class="text-lg font-bold text-primary mb-4"> {{ __('اتصل بنا') }}</h4>
                    <address class="not-italic text-sm text-gray-300 mb-4">
                        <p class="mb-1"><strong> {{ __('مكتب الشرق الأوسط وأفريقيا') }}</strong></p>
                        <p> {{ __('٣٥ شارع حسن الشريف - مدينة نصر، القاهرة، مصر') }} </p>
                        <a href="mailto:info@gulddalsystems.com" class="block">
                            info@gulddalsystems.com
                        </a>
                        @foreach ($phones as $phone)
                            @if (Str::startsWith($phone, '02') || Str::startsWith($phone, '+202') || Str::startsWith($phone, '202'))
                                <p class="mt-2 flex items-center gap-2">
                                    <i class="fas fa-phone-alt"></i>
                                    <span>{{ __('هاتف') }}</span>
                                    <span
                                        dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}">{{ $phone }}</span>
                                </p>
                            @else
                                <p class="flex items-center gap-2 mt-2">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>{{ __('جوال') }}</span>
                                    <span
                                        dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}">{{ $phone }}</span>
                                </p>
                            @endif
                        @endforeach

                    </address>


                </div>

            </div>

            <!-- حقوق النشر -->
            <div class="text-center text-xs text-gray-500">
                <p
                    class="py-5 text-center flex justify-center items-center text-accent mt-12 border-t border-gray-700 uppercase">
                    <span class="text-accent" id="year-footer">{{ date('Y') }}<!-- --> </span> ©
                    {{ __('جميع الحقوق محفوظة') }}<a target="_blank" href="https://www.cangrowonline.com/">
                        <img src="https://alrehab-eg.com/front/alrehab/assets/CanGrow logo.png" class=" w-40 h-20"
                            alt="">
                    </a>
                </p>
            </div>

        </div>
    </footer>



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

    <script src="{{ asset('front/gulddal/') }}/scripts/index.js"></script>

    <script>
        lucide.createIcons();
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
