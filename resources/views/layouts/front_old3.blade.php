<!DOCTYPE html>
<html lang="en" dir="rtl">

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

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('front/alrehab/') }}/src/footer.css">
    <link rel="stylesheet" href="{{ asset('front/alrehab/') }}/src/input.css">
    <link rel="stylesheet" href="{{ asset('front/alrehab/') }}/src/service.css">


    @yield('css')

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DL8NRCL49R"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DL8NRCL49R');
</script>
</head>

@php
    $phones = explode(',', $gs->phones);
    $emails = explode(',', $gs->emails);
    $addresses = json_decode($gs->{'addresses_' . $sign});

    $randomPhone = Arr::random($phones);
@endphp


<body class="font-cairo" dir="rtl" lang="ar">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <nav id="mainNav" class="container mx-auto px-4 flex items-center justify-between">
            <div class="text-xl font-bold">
                <a href="{{ route('front.index') }}" class="inline-block">
                    <img src="{{ $gs->{'logo_' . $sign} }}" class="w-20 h-20" alt="Company Logo">
                </a>
            </div>

            <button id="menuButton" class="lg:hidden p-2 rounded-md hover:bg-gray-100" aria-label="Open menu">
                <i class="fas fa-bars w-6 h-6"></i>
            </button>

            <ul id="mobileMenu"
                class="fixed lg:static -right-full lg:right-auto top-0 pt-16 pb-8 px-6 lg:p-0 bg-white lg:bg-transparent transition-all duration-300 h-full lg:h-auto flex-col lg:flex-row w-4/5 lg:w-auto flex items-start lg:items-center gap-4 z-40 shadow-lg lg:shadow-none">
                <li>
                    <a href="{{ route('front.index') }}"
                        class="font-semibold hover:text-primary uppercase text-sm text-primary py-2 block"> {{ __('الرئيسية') }}</a>
                </li>
                <li>
                    <a href="{{ route('about.index') }}"
                        class="font-semibold hover:text-primary uppercase text-sm text-gray-600 py-2 block">    {{ __('من نحن') }}</a>
                </li>
                <li class="relative group">
                    <button
                        class="font-semibold hover:text-primary uppercase text-sm text-gray-600 flex items-center gap-1 py-2">
                        {{ __('الخدمات') }}
                        <i class="fas fa-chevron-down w-4 h-4"></i>
                    </button>
                    <ul
                        class="lg:absolute mt-2 lg:mt-0 hidden group-hover:block bg-white lg:shadow-lg rounded-md p-2 min-w-[200px] z-10">
                        @foreach ($services as $service)
                       
                        <li>
                            <a href="{{ route('single-service.index',['slug' => $service->{'slug_' . $sign} ]) }}"
                                class="block px-4 py-2 hover:bg-gray-100 rounded text-gray-600 text-sm"> {{ $service->{'title_' . $sign} }}  </a>
                        </li>
                        @endforeach
                     
                      
                    </ul>
                </li>
                <li>
                    <a href="{{ route('blogs.index') }}"
                        class="font-semibold hover:text-primary uppercase text-sm text-gray-600 py-2 block">   {{ __('المقالات') }}</a>
                </li>
                <li>
                    <a href="{{ route('contact.index') }}"
                        class="font-semibold hover:text-primary uppercase text-sm text-gray-600 py-2 block">
                           {{ __('اتصل بنا') }}</a>
                </li>
                <button id="closeMenuButton" class="absolute top-4 right-4 lg:hidden p-2 rounded-md hover:bg-gray-100"
                    aria-label="Close menu">
                    <i class="fas fa-times w-6 h-6"></i>
                </button>
            </ul>
        </nav>
    </header>
    <!--end Header -->


    @yield('content')



      <!-- footer -->
      <footer class="">
        <div class="footer">
            <div class="container mx-auto px-4 md:px-8 lg:px-16 xl:px-32">
                <div class="box">
                    <div>
                        <img src="{{ $gs->{'logo_' . $sign} }}" class=" w-20 h-20" alt="">
                    </div>
                    <ul class="social groub">
                      @if(App\Models\Socialsetting::find(1)->t_status == 1) 
                        <li>
                            <a target="_blank" class="transition-all duration-500 hover:bg-[#000]"
                                href="{{ App\Models\Socialsetting::find(1)->twitter }}">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </li>
                        @endif
                      
                        @if(App\Models\Socialsetting::find(1)->ystatus == 1)
                        <li>
                            <a target="_blank" class="transition-all duration-500 hover:bg-[#FF0000]"
                                href="{{ App\Models\Socialsetting::find(1)->youtube }}">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                          @endif
                          
                          @if(App\Models\Socialsetting::find(1)->f_status == 1)  
                        <li>
                            <a target="_blank" class="transition-all duration-500 hover:bg-[#1877F2]"
                                href="{{ App\Models\Socialsetting::find(1)->facebook }}">
                                <i class="fa-brands fa-facebook-f"></i> </a>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="box">
                    <ul class="links">
                        <li class="group"><a
                                class="uppercase group-hover:text-white group-hover:translate-x-1  text-center flex items-center transition-all duration-700"
                                href="{{ route('front.index') }}"><span
                                    class="group-hover:text-white inline-block text-center  transition-all duration-700 group-hover:translate-x-1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-chevrons-right">
                                        <path d="m6 17 5-5-5-5"></path>
                                        <path d="m13 17 5-5-5-5"></path>
                                    </svg></span>{{ __('الرئيسية') }}</a></li>
                        <li class="group"><a
                                class="uppercase group-hover:text-white group-hover:translate-x-1  text-center flex items-center transition-all duration-700"
                                href="{{ route('blogs.index') }}"><span
                                    class="group-hover:text-white inline-block text-center  transition-all duration-700 group-hover:translate-x-1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-chevrons-right">
                                        <path d="m6 17 5-5-5-5"></path>
                                        <path d="m13 17 5-5-5-5"></path>
                                    </svg></span> {{ __('المقالات') }}</a></li>
                        <li class="group"><a
                                class="uppercase group-hover:text-white group-hover:translate-x-1  text-center flex items-center transition-all duration-700"
                                href="{{ route('about.index') }}"><span
                                    class="group-hover:text-white inline-block text-center  transition-all duration-700 group-hover:translate-x-1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-chevrons-right">
                                        <path d="m6 17 5-5-5-5"></path>
                                        <path d="m13 17 5-5-5-5"></path>
                                    </svg></span> {{ __('من نحن') }}  </a></li>
                        <li class="group"><a
                                class="uppercase group-hover:text-white group-hover:translate-x-1  text-center flex items-center transition-all duration-700"
                                href="{{ route('contact.index') }}"><span
                                    class="group-hover:text-white inline-block text-center  transition-all duration-700 group-hover:translate-x-1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-chevrons-right">
                                        <path d="m6 17 5-5-5-5"></path>
                                        <path d="m13 17 5-5-5-5"></path>
                                    </svg></span> {{ __('اتصل بنا') }}  </a></li>
                    </ul>
                </div>
                <div class="box">
                    <div class="line transition-all duration-500">
                        <div class="w-6 h-6">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="info"> مصر الجديدة خلف نادي النصر</div>
                    </div>
                    <div class="line transition-all duration-500">
                        <div class="w-6 h-6">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div class="info"> <!-- -->أوقات العمل: من 10:00 إلى 18:00</div>
                    </div>
                    <div class="line transition-all duration-500">
                        <div class="w-6 h-6">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <div class="info"><span>{{ $randomPhone }}</span></div>
                    </div>
                    @foreach ($emails as $email)
                       <div class="line transition-all duration-500">
                        <div class="w-6 h-6">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="info"><span> {{ $email }}</span></div>
                    </div
                    @endforeach
                   >

                </div>
            </div>
            <p
                class="py-5 text-center flex justify-center items-center text-accent mt-12 border-t border-gray-700 uppercase">
                <span class="text-accent" id="year-footer">2025<!-- --> </span>© جميع الحقوق محفوظة<a target="_blank"
                    href="https://www.cangrowonline.com/">
                    <img src="{{ asset('front/alrehab/') }}/assets/CanGrow logo.png" class=" w-40 h-20" alt="">
            </p>
        </div>
    </footer>
    <ul class="fixed flex gap-4 flex-col right-2 sm:right-10 bottom-2 sm:bottom-10 z-50 rounded">
       
      <li
            style="background-color:#25D366; width:3rem; height:3rem; border-radius:9999px; box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); display:flex; justify-content:center; align-items:center;">
            <a target="_blank" class="flex justify-center items-center" href="tel:+2{{ $randomPhone }}">
                <i class="fas fa-phone-volume text-white text-xl"></i>
            </a>
        </li>
        <li
            style="background-color:#128C7E; width:3rem; height:3rem; border-radius:9999px; box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); display:flex; justify-content:center; align-items:center;">
            <a target="_blank" class="flex justify-center items-center" href="https://wa.me/+2{{ $randomPhone }}">
                <i class="fa-brands fa-whatsapp text-white text-xl"></i>
            </a>
        </li>
    </ul>
    <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script src="{{ asset('front/alrehab/') }}/src/script/swiper.js"></script>
    <script src="{{ asset('front/alrehab/') }}/src/script/scripts.js"></script>
    <script src="{{ asset('front/alrehab/') }}/src/script/motion.js"></script>
    <script src="{{ asset('front/alrehab/') }}/src/script/service.js"></script>
    <script src="{{ asset('front/alrehab/') }}/src/script/tailwind.js"></script>




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


    @yield('js')
</body>

</html>
