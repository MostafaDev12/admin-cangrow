<!DOCTYPE html>
<html lang="{{ $sign }}" dir="{{ session::get('front_language_duraction') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp




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
        <meta property="og:title" content="{{ $blog->{'meta_title_' . $sign} ?? $blog->{'title_' . $sign} }}">

        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->{'meta_details_' . $sign} }}">
        <meta property="og:description" content="{{ $blog->{'meta_details_' . $sign} }}">
    @else
        <meta property="og:title" content="{{ $gs->{'title_' . $sign} }}">
        <meta property="og:description" content="{{ $gs->{'title_' . $sign} }}">
        </title>
        <meta name="+author" content=" {{ $gs->{'title_' . $sign} }}">
    @endif


    <title>
        @yield('title')
    </title>

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

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CLLHL0B28N"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CLLHL0B28N');
</script>


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NG3XDDPZ');</script>
<!-- End Google Tag Manager -->



    <link rel="stylesheet" href="{{ asset('build/css/toastr.css') }}">


    @include('includes.style')


    @yield(section: 'css')





</head>

@php
    $phones = explode(',', $gs->phones);
    $emails = explode(',', $gs->emails);
    $addresses = json_decode($gs->{'addresses_' . $sign});

    $randomAddress = Arr::random($addresses);
    $randomPhone = Arr::random($phones);
    $randomEmail = Arr::random($emails);
@endphp


 

<body class="font-arabic bg-gray-50" dir="rtl" lang="ar">
    <!-- Header -->
    <header class="text-white fixed w-full top-0 z-50  transition-all duration-300">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex-shrink-0 z-10">
                    <div class=" transition-all duration-300 hover:scale-105">
                        <img src="{{ $gs->{'logo_' . $sign} }}" alt="Uber Captain Logo" class="h-24 w-auto">
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex gap-2 items-center">
                    <a href="{{ route('front.index',$sign) }}"
                        class="nav-link font-semibold text-sm xl:text-base px-3 py-2 rounded-lg transition-all duration-300 hover:bg-white/10">
                        {{ __('الرئيسية') }}
                    </a>
                    <a href="{{ route('about.index',$sign) }}"
                        class="nav-link font-semibold text-sm xl:text-base px-3 py-2 rounded-lg transition-all duration-300 hover:bg-white/10">
                            {{ __('عن أوبر') }}
                    </a>
                    <a href="{{ route('blogs.index',$sign) }}"
                        class="nav-link font-semibold text-sm xl:text-base px-3 py-2 rounded-lg transition-all duration-300 hover:bg-white/10">
                          {{ __('المقالات') }}
                    </a>
                    <a href="{{ route('contact.index',$sign) }}"
                        class="nav-link font-semibold text-sm xl:text-base px-3 py-2 rounded-lg transition-all duration-300 hover:bg-white/10">
                             {{ __('تواصل معنا') }}
                    </a>
                </nav>

                <!-- Social Icons & Phone -->
                <div class="flex items-center gap-2">
                    <!-- Social Icons -->
                    <div class="hidden md:flex items-center gap-2 text-white text-lg">
                         @if(App\Models\Socialsetting::find(1)->t_status == 1) 
                        <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" class="transition-all duration-300 hover:text-primary/40 hover:scale-110">
                            <i class="fab fa-instagram"></i>
                        </a>

                         @endif
                          @if(App\Models\Socialsetting::find(1)->f_status == 1)  
                        <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" class="transition-all duration-300 hover:text-primary/40 hover:scale-110">
                            <i class="fab fa-facebook"></i>
                        </a>
                         @endif
                          @if(App\Models\Socialsetting::find(1)->i_status == 1)  
                        <a href="{{ App\Models\Socialsetting::find(1)->instagram }}" class="transition-all duration-300 hover:text-primary/40 hover:scale-110">
                            <i class="fab fa-instagram"></i>
                        </a>
                         @endif

                        @if(App\Models\Socialsetting::find(1)->ystatus == 1)
                        <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" class="transition-all duration-300 hover:text-primary/40 hover:scale-110">
                            <i class="fab fa-youtube"></i>
                        </a>

                         @endif


                    </div>

                    <!-- Phone CTA -->
                    <a href="tel:+2{{ $randomPhone }}"
                        class="phone-pulse bg-primary text-white flex font-semibold text-sm px-4 py-2 rounded-full  items-center gap-2 transition-all duration-300 hover:bg-primary/80 hover:shadow-lg">
                        <i class="fas fa-phone rotate-[-15deg]"></i>

                        <span>{{ $randomPhone }}</span>
                    </a>

                    <!-- Mobile Menu Button -->
                    <button id="header-toggle" class="lg:hidden text-white focus:outline-none">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="lg:hidden bg-brand-blue/95 backdrop-blur-sm px-4 py-6 hidden">
            <div class="flex flex-col space-y-4">
                <a href="{{ route('front.index',$sign) }}"
                    class="text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300 hover:bg-white/10">
                    {{ __('الرئيسية') }}
                </a>
                <a href="{{ route('about.index',$sign) }}"
                    class="text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300 hover:bg-white/10">
                         {{ __('عن أوبر') }}
                </a>
                <a href="{{ route('blogs.index',$sign) }}"
                    class="text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300 hover:bg-white/10">
                      {{ __('المقالات') }}
                </a>
                <a href="{{ route('contact.index',$sign) }}"
                    class="text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300 hover:bg-white/10">
                         {{ __('تواصل معنا') }}
                </a>

                <div class="pt-4 flex justify-center gap-2 text-white text-xl border-t border-white/20">
                  
                      @if(App\Models\Socialsetting::find(1)->t_status == 1) 
                        <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" class="transition-all duration-300 hover:text-amber-400">
                            <i class="fab fa-instagram"></i>
                        </a>

                         @endif
                          @if(App\Models\Socialsetting::find(1)->f_status == 1)  
                        <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" class="transition-all duration-300 hover:text-amber-400">
                            <i class="fab fa-facebook"></i>
                        </a>
                         @endif
                          @if(App\Models\Socialsetting::find(1)->i_status == 1)  
                        <a href="{{ App\Models\Socialsetting::find(1)->instagram }}" class="transition-all duration-300 hover:text-amber-400">
                            <i class="fab fa-instagram"></i>
                        </a>
                         @endif

                        @if(App\Models\Socialsetting::find(1)->ystatus == 1)
                        <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" class="transition-all duration-300 hover:text-amber-400">
                            <i class="fab fa-youtube"></i>
                        </a>

                         @endif

                    {{-- <a href="#" class="transition-all duration-300 hover:text-amber-400">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="#" class="transition-all duration-300 hover:text-amber-400">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="transition-all duration-300 hover:text-amber-400">
                        <i class="fab fa-instagram"></i>
                    </a> --}}
                </div>
            </div>
        </div>
    </header>



    @yield('content')

 
    <!-- Footer -->
    <footer class="bg-gradient-to-r from-primary to-secondary   text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="transform -translate-y-2 transition-all duration-300 hover:scale-105">
                        <img src="{{ $gs->{'logo_' . $sign} }}" alt="Uber Captain Logo" class="h-20 w-20 object-contain">
                    </div>
                    <h3 class="text-xl font-semibold mb-4">       {{ __('درايفر أوبر مصر') }}</h3>
                    <p>  {{ $gs->{'footer_' . $sign} }}</p>
                </div>

                <div>
                    <h3 class="text-xl font-semibold mb-4">     {{ __('روابط سريعة') }}</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('contact.index',$sign) }}" class="hover:text-secondary transition">التسجيل</a></li>
                        <li><a href="#requirements" class="hover:text-secondary transition">المتطلبات</a></li>
                        <li><a href="#benefits" class="hover:text-secondary transition">المميزات</a></li>
                        <li><a href="#news" class="hover:text-secondary transition">الأخبار</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-semibold mb-4">     {{ __('اتصل بنا') }}</h3>
                    <div class="space-y-2">
                        <p class="flex items-center">
                            <i class="fas fa-phone-alt ml-2"></i>
                            <a href="tel:+2{{ $randomPhone }}">{{ $randomPhone }}</a>
                        </p>
                        <p class="flex items-center">
                            <i class="far fa-clock ml-2"></i>
                            {{ __('من الأحد إلى الخميس: 9 ص - 5 م') }}
                        </p>
                    </div>
                </div>

                <div>
                    <h3 class="text-xl font-semibold mb-4">  {{ __('تابعنا') }}</h3>
                    <div class="flex space-x-4 space-x-reverse">

                            @if(App\Models\Socialsetting::find(1)->t_status == 1) 
                        <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-secondary transition">
                            <i class="fab fa-instagram"></i>
                        </a>

                         @endif
                          @if(App\Models\Socialsetting::find(1)->f_status == 1)  
                        <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-secondary transition">
                            <i class="fab fa-facebook"></i>
                        </a>
                         @endif
                          @if(App\Models\Socialsetting::find(1)->i_status == 1)  
                        <a href="{{ App\Models\Socialsetting::find(1)->instagram }}" class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-secondary transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                         @endif

                        @if(App\Models\Socialsetting::find(1)->ystatus == 1)
                        <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-secondary transition">
                            <i class="fab fa-youtube"></i>
                        </a>

                         @endif

                        {{-- <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-secondary transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-secondary transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-secondary transition">
                            <i class="fab fa-instagram"></i>
                        </a> --}}
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p>© {{ date('Y') }}     {{ __('درايفر أوبر مصر. جميع الحقوق محفوظة.') }}   </p>
            </div>
        </div>
    </footer>
    <!-- Fixed Icons -->
    <div class="fixed left-6 bottom-6 flex flex-col gap-4 z-50 animate-fadeIn">
        @if(App\Models\Socialsetting::find(1)->t_status == 1) 
        
        <!-- TikTok -->
        <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" target="_blank"
            class="group relative w-14 h-14 bg-gradient-to-br from-black via-black to-black text-white rounded-2xl flex items-center justify-center text-2xl shadow-[0_0_15px_rgba(255,255,255,0.3)] hover:scale-110 hover:rotate-6 transition-all duration-500 ease-out">
            <i class="fab fa-instagram group-hover:animate-pulse"></i>
            <span
                class="absolute -right-20 opacity-0 group-hover:opacity-100 bg-black/80 text-white text-sm px-3 py-1 rounded-lg shadow-lg transition-all duration-500"> {{ __('twitter') }}</span>
        </a>
            @endif
@if(App\Models\Socialsetting::find(1)->f_status == 1) 
        <!-- Facebook -->
        <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" target="_blank"
            class="group relative w-14 h-14 bg-gradient-to-br from-blue-500 via-blue-700 to-blue-900 text-white rounded-2xl flex items-center justify-center text-2xl shadow-[0_0_15px_rgba(0,115,255,0.6)] hover:scale-110 hover:-rotate-6 transition-all duration-500 ease-out">
            <i class="fab fa-facebook-f group-hover:animate-pulse"></i>
            <span
                class="absolute -right-24 opacity-0 group-hover:opacity-100 bg-blue-900/90 text-white text-sm px-3 py-1 rounded-lg shadow-lg transition-all duration-500"> {{ __('Facebook') }}</span>
        </a>
            @endif
@if(App\Models\Socialsetting::find(1)->i_status == 1)  
        <!-- Instagram -->
        <a href="{{ App\Models\Socialsetting::find(1)->instagram }}" target="_blank"
            class="group relative w-14 h-14 bg-gradient-to-r from-pink-500 via-purple-600 to-orange-400 text-white rounded-2xl flex items-center justify-center text-2xl shadow-[0_0_20px_rgba(255,105,180,0.6)] hover:scale-110 hover:rotate-6 transition-all duration-500 ease-out">
            <i class="fab fa-instagram group-hover:animate-pulse"></i>
            <span
                class="absolute -right-28 opacity-0 group-hover:opacity-100 bg-pink-700/90 text-white text-sm px-3 py-1 rounded-lg shadow-lg transition-all duration-500"> {{ __('Instagram') }}</span>
        </a>
    @endif
        <!-- Phone -->
        <a href="tel:+2{{ $randomPhone }}"
            class="group relative w-14 h-14 bg-gradient-to-br from-green-400 via-green-600 to-green-800 text-white rounded-2xl flex items-center justify-center text-2xl shadow-[0_0_15px_rgba(0,255,100,0.6)] hover:scale-110 hover:-rotate-6 transition-all duration-500 ease-out">
            <i class="fas fa-phone group-hover:animate-pulse"></i>
            <span
                class="absolute -right-20 opacity-0 group-hover:opacity-100 bg-green-700/90 text-white text-sm px-3 py-1 rounded-lg shadow-lg transition-all duration-500">Call</span>
        </a>
        <a href="https://wa.me/2{{ $randomPhone }}"
           target="_blank"
           class="group relative w-14 h-14 bg-gradient-to-br from-emerald-400 via-emerald-600 to-emerald-800 text-white rounded-2xl flex items-center justify-center text-2xl shadow-[0_0_15px_rgba(0,255,150,0.6)] hover:scale-110 hover:rotate-6 transition-all duration-500 ease-out">
            <i class="fab fa-whatsapp group-hover:animate-pulse"></i>
            <span class="absolute -right-24 opacity-0 group-hover:opacity-100 bg-emerald-700/90 text-white text-sm px-3 py-1 rounded-lg shadow-lg transition-all duration-500">
                WhatsApp
            </span>
        </a>
          @if(App\Models\Socialsetting::find(1)->d_status == 1)     
        <a href="{{ App\Models\Socialsetting::find(1)->dribble }}"
           target="_blank"
            class="group relative w-14 h-14 bg-gradient-to-br from-black via-black to-black text-white rounded-2xl flex items-center justify-center text-2xl shadow-[0_0_15px_rgba(255,255,255,0.3)] hover:scale-110 hover:rotate-6 transition-all duration-500 ease-out">
            <i class="fab fa-tiktok group-hover:animate-pulse"></i>
            <span class="absolute -right-20 opacity-0 group-hover:opacity-100 bg-black/90 text-white text-sm px-3 py-1 rounded-lg shadow-lg transition-all duration-500">
                TikTok
            </span>
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

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NG3XDDPZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

</body>

</html>
