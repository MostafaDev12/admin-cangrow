<!DOCTYPE html>
<html lang="{{ $sign }}"  dir="{{ session::get('front_language_duraction') }}"  >

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

 
 
 
<body class="bg-gray-50 text-gray-800 font-tajawal" dir="{{ session::get('front_language_duraction') }}" lang="{{ $sign }}">
    <header
        class="desktopHeader fixed top-0 w-full bg-white/80 backdrop-blur-sm z-50 text-gray-800 hidden lg:block transition-all duration-300 shadow-sm">

        <div class="container mx-auto px-6 py-3 flex justify-between items-center w-full">

            <div class="flex items-center animate-slideInRight" style="animation-delay: 0.2s;">
                <a href="{{ route('front.index',$sign) }}">
                    <img src="{{ $gs->{'logo_' . $sign} }}" alt="شعار الشركة" class="h-16">
                </a>
            </div>

            <nav class="animate-slideInRight" style="animation-delay: 0.4s;">
                <ul class="flex items-center gap-6 text-lg font-medium">
                    <li><a href="{{ route('front.index',$sign) }}" class="hover:text-primary transition">{{ __('الرئيسية') }}</a></li>
                    <li><a href="{{ route('about.index',$sign) }}" class="hover:text-primary transition">    {{ __('من نحن') }}</a></li>

                    <li class="relative group">
                        <a href="#" class="hover:text-primary transition flex items-center gap-1">
                            {{ __('الخدمات') }}
                            <i class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                        </a>
                        <ul
                            class="absolute right-0 mt-2 w-56 bg-white text-gray-700 rounded-lg shadow-lg border border-gray-100 opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300">
                            @foreach ($services as $service)
                            <li><a href="{{ route('single-service-service.index',['lang' => $sign,'slug' => $service->{'slug_' . $sign} ]) }}" class="block px-4 py-2 hover:text-primary hover:bg-gray-50">   
                                     {{ $service->{'title_' . $sign} }}</a></li>
                          @endforeach
                        </ul>
                    </li>

                    <li><a href="{{ route('blogs.index',$sign) }}" class="hover:text-primary transition">{{ __('المقالات') }}</a></li>
                    <li><a href="{{ route('gallery.index',$sign) }}" class="hover:text-primary transition">{{ __('المعرض') }}</a></li>
                    <li><a href="{{ route('contact.index',$sign) }}" class="hover:text-primary transition"> {{ __('اتصل بنا') }}  </a></li>
                </ul>
            </nav>
        </div>
    </header>

    <header
        class="mobileHeader fixed top-0 w-full bg-white/80 backdrop-blur-sm z-50 text-gray-800 lg:hidden transition-all duration-300 shadow-sm">

        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('front.index',$sign) }}">
                <img src="{{ $gs->{'logo_' . $sign} }}" alt="شعار الشركة" class="h-14">
            </a>

            <button id="menu-btn" class="focus:outline-none text-gray-800 text-3xl">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- القائمة الجانبية -->
        <div id="mobile-menu"
            class="fixed top-0 right-0 w-full !bg-white text-gray-800 shadow-lg transform translate-x-full transition-transform duration-300 z-[9999]">
            <div class="flex justify-between items-center p-4 border-b border-gray-200">
                <span class="font-bold text-lg">{{ __('القائمة') }}</span>
                <button id="close-btn" class="focus:outline-none text-primary text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <ul class="flex flex-col gap-4 p-4 text-lg">
                <li><a href="{{ route('front.index',$sign) }}" class="hover:text-primary transition">{{ __('الرئيسية') }}</a></li>
                <li><a href="{{ route('about.index',$sign) }}" class="hover:text-primary transition"> {{ __('من نحن') }}  </a></li>

                <li>
                    <button class="flex justify-between items-center w-full focus:outline-none submenu-btn">
                        <span>{{ __('الخدمات') }}</span>
                        <i class="fas fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <ul class="submenu hidden  flex-col pr-4 mt-2 gap-2 text-base text-gray-600">
                      @foreach ($services as $service)
                      <li><a href="{{ route('single-service-service.index',['lang' => $sign,'slug' => $service->{'slug_' . $sign} ]) }}" class="hover:text-primary">    {{ $service->{'title_' . $sign} }}  </a></li>
                         @endforeach  
                    </ul>
                </li>

                <li><a href="{{ route('blogs.index',$sign) }}" class="hover:text-primary transition">{{ __('المقالات') }}</a></li>
                <li><a href="{{ route('gallery.index',$sign) }}" class="hover:text-primary transition">{{ __('المعرض') }}</a></li>
                <li><a href="{{ route('contact.index',$sign) }}" class="hover:text-primary transition">   {{ __('اتصل بنا') }}</a></li>
            </ul>
        </div>

        <!-- خلفية شفافة تغلق القائمة -->
        <!-- <div id="overlay" class="fixed inset-0 bg-black/30 hidden opacity-0 transition-opacity duration-300 z-[9998]">
        </div> -->
    </header>



    @yield('content')
 

    <footer class="bg-gray-900 text-gray-300 pt-16 pb-8 mt-12">
        <div class="container mx-auto px-6 grid md:grid-cols-4 gap-10">

            <div>
                <a href="{{ route('front.index',$sign) }}">
                    <img src="{{ $gs->{'logo_' . $sign} }}" alt="شعار الشركة" class="h-28 mb-4">
                </a>
                <p class="text-sm text-gray-400 leading-relaxed">
                    {{ $gs->{'footer_' . $sign} }}
                </p>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-white mb-4">خزانات المياه</h3>
                <ul class="space-y-2 text-gray-400">
                      @foreach ($services as $service)
                  <li><a href="{{ route('single-service-service.index',['lang' => $sign,'slug' => $service->{'slug_' . $sign}  ]) }}" class="hover:text-accent transition">  {{ $service->{'title_' . $sign} }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-white mb-4">الشركة</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ route('about.index',$sign) }}" class="hover:text-accent transition">   {{ __('من نحن') }}</a></li>
                    
                    <li><a href="{{ route('blogs.index',$sign) }}" class="hover:text-accent transition">{{ __('المقالات') }}</a></li>
                    <li><a href="{{ route('gallery.index',$sign) }}" class="hover:text-accent transition">{{ __('المعرض') }}</a></li>
                    <li><a href="{{ route('contact.index',$sign) }}" class="hover:text-accent transition">   {{ __('اتصل بنا') }}</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-white mb-4">{{ __('تواصل معنا') }}  </h3>
                <ul class="space-y-3 text-gray-400">
                    @foreach ($addresses as $address)
                  <li class="flex items-start gap-2">
                        <i class="fas fa-map-marker-alt text-accent mt-1"></i>
                        <span>   {{ $address }}  </span>
                    </li>
                     @endforeach
                      @foreach ($phones as $phone)
                    <li class="flex items-center gap-2">
                        <i class="fas fa-phone text-accent"></i>
                        <a href="tel:+2{{ $phone }}" class="hover:text-accent transition">{{ $phone }}</a>
                    </li>
                       @endforeach
                </ul>
            </div>

        </div>

        <div class="mt-12 pt-6 border-t border-gray-700 text-center text-gray-500 text-sm">
            © {{ date('Y') }}     {{ __('شركة النور لخزانات المياه. جميع الحقوق محفوظة.') }}
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
