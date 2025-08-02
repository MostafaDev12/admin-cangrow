<html lang="{{ $sign }}" dir="{{ Session::get('front_language_duraction') }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp




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
    @elseif(isset($blog->meta_tag) || isset($blog->{'meta_details_' . $sign} ))
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
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
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
<header class="header">
    <div class="bg-light d-none d-md-block py-2">
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-3 me-md-auto mb-2 mb-md-0">
                <a href="tel:+20564853053" class="text-decoration-none text-dark d-flex align-items-center me-3 hover-red">
                    <i class="fas fa-phone me-2 text-danger"></i> <span class="small">0564853053</span>
                </a>
                <a href="mailto:project@shtegin.com" class="text-decoration-none text-dark d-flex align-items-center me-3 hover-red">
                    <i class="fas fa-envelope me-2 text-danger"></i> <span class="small">project@shtegin.com</span>
                </a>
                <a href="https://maps.google.com/?q=المملكة العربية السعودية الرياض" target="_blank" class="text-decoration-none text-dark d-flex align-items-center hover-red">
                    <i class="fa-solid fa-location-dot me-2 text-danger"></i> <span class="small">المملكة العربية السعودية الرياض</span>
                </a>
            </div>

            <div class="d-flex gap-3 mx-2">
                <a href="https://wa.me/+20564853053" target="_blank" class="text-danger fs-5 hover-scale" aria-label="WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="tel:20564853053" class="text-danger fs-5 hover-scale" aria-label="Call us"> <i class="fa-solid fa-phone"></i>
                </a>
                 </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('front.index') }}">
                <img src="{{ $gs->{'logo_' . $sign} }}" alt="shtegin logo" class="img-fluid" style="max-height: 60px;">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('front.index') }}">{{ __('الرئيسية') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about.index') }}"> {{ __('عن الشركة') }}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('services.index') }}"
                            id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('الخدمات') }}
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm" aria-labelledby="servicesDropdown">
                            @foreach ($services as $service)
                                <li class="dropdown-item-hover-red"> <a class="dropdown-item"
                                        href="{{ route('single-service.index', ['slug' => $service->{'slug_' . $sign}]) }}">
                                        {{ $service->{'title_' . $sign} }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs.index') }}"> {{ __('المقالات') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.index') }}"> {{ __('اتصل بنا') }} </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<style>
    /* Custom styles for enhancements */
    /* Define a CSS variable for the red color for easy modification */
    :root {
        --bs-red-custom: #dc3545; /* Using Bootstrap's default danger color as a base */
    }

    .header .hover-red:hover {
        color: var(--bs-red-custom) !important;
    }

    .header .hover-scale:hover {
        transform: scale(1.1);
        transition: transform 0.2s ease-in-out;
    }

    .navbar-nav .nav-link {
        font-weight: 500;
        color: #343a40;
        padding: 0.5rem 1rem;
    }

    .navbar-nav .nav-link:hover {
        color: var(--bs-red-custom); /* Red color on hover */
    }

    .navbar-nav .nav-link.active {
        color: var(--bs-red-custom) !important; /* Ensure active link is red */
    }

    .dropdown-menu .dropdown-item-hover-red:hover .dropdown-item {
        background-color: var(--bs-red-custom);
        color: white;
    }
    .dropdown-menu .dropdown-item:hover {
        background-color: var(--bs-red-custom); /* Ensures regular dropdown items also get the red hover */
        color: white;
    }
</style>
<style>
    /* Custom styles for enhancements */
    .header .hover-primary:hover {
        color: #8d2218 !important; /* Bootstrap primary color */
    }

    .header .hover-scale:hover {
        transform: scale(1.1);
        transition: transform 0.2s ease-in-out;
    }

    .navbar-nav .nav-link {
        font-weight: 500; /* Slightly bolder nav links */
        color: #8d2218; /* Darker text color */
        padding: 0.5rem 1rem; /* Adjust padding */
    }

    .navbar-nav .nav-link:hover {
        color: #8d2218; /* Primary color on hover */
    }

    .navbar-nav .nav-link.active {
        color: #8d2218 !important; /* Ensure active link is primary */
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #8d2218;
        color: white;
    }

    /* For nested dropdowns (if you uncomment the commented section in the future) */
    /* .dropdown-menu .dropdown-submenu {
        position: relative;
    }
    .dropdown-menu .dropdown-submenu > .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
    }
    .dropdown-menu .dropdown-submenu:hover > .dropdown-menu {
        display: block;
    } */
</style>

    @yield('content')





    <section class="footer-section text-center ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 ">
                    <div class="logo">
                        <img src="{{ $gs->{'logo_' . $sign} }}" alt="RGS Logo">
                    </div>
                    <p class="branch-info fw-bold">
                        {{ $gs->{'footer_' . $sign} }}
                    </p>
                    <div class="d-flex justify-content-center justify-content-space-between align-items-center mt-3">

                        <a href="tel:2{{ $randomPhone }}"><i class="fa-solid fa-phone"></i></a>

                        <a href="https://wa.me/+2{{ $randomPhone }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <h2> {{ __('روابط هامة') }}</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('front.index') }}">{{ __('الرئيسية') }}</a></li>
                        <li><a href="{{ route('about.index') }}"> {{ __('عن الشركة') }}  </a></li>
                        <li><a href="{{ route('services.index') }}"> {{ __('الخدمات') }}  </a></li>
                        <li><a href="{{ route('blogs.index') }}"> {{ __('المقالات') }}</a></li>
                        <li><a href="{{ route('contact.index') }}"> {{ __('اتصل بنا') }}  </a></li>
                    </ul>
                </div>
                <!-- <div class="col-lg-3 col-md-6 ">
                <h2> الخدمات</h2>
                <ul class="list-unstyled">
                    <li><a href="#"> دريسنج روم</a></li>
                    <li><a href="#"> غرف نوم </a></li>
                    <li><a href="#"> غرف معيشة</a></li>
                    <li><a href="#"> مطابخ </a></li>
                    <li><a href="#">وحدات حمامات </a></li>
                </ul>
            </div> -->
                <!-- تواصل معنا -->
                <div class="col-lg-4 col-md-6 ">
                    <h2> {{ __('تواصل معنا') }}</h2>
                    <p class="contact-info">
                        @foreach ($phones as $phone)
                            <i class="fas fa-phone"></i><a href="tel:+2{{ $phone }}">{{ $phone }}</a>
                            <br>
                        @endforeach
                        {{-- <i class="fab fa-whatsapp"></i><a href="tel:+200564853053">0564853053</a><br> --}}

                        @foreach ($emails as $email)
                            <i class="fas fa-location"></i> <a href="mailto:{{ $email }}">
                                {{ $email }}
                            </a> <br>
                        @endforeach
                    </p>
                </div>
            </div>
            <hr>
            <a href="" class="text-center d-block fw-bold">جميع الحقوق محفوظة © {{ date('Y') }}  لصالح   <a target="_blank" href="https://cangrowonline.com">CanGrow Digital Marketing Agency</a>    </a>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
        integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        new WOW().init();
        document.addEventListener("DOMContentLoaded", function() {
            Fancybox.bind("[data-fancybox]", {
                Thumbs: {
                    autoStart: true, // تشغيل الصور المصغرة تلقائيًا
                },
                Toolbar: {
                    display: ["zoom", "download", "close"], // تخصيص أزرار التحكم
                }
            });
        });
    </script>
    <script>
        const counters = document.querySelectorAll('.counter');
        const speed = 200;

        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 20);
                } else {
                    counter.innerText = target;
                }
            };

            // Start animation immediately (or add intersection observer for scroll)
            updateCount();
        });
    </script>

    <!-- <script>
        let lastScrollTop = 0;
        const header = document.querySelector('.header');

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;

            if (currentScroll > lastScrollTop) {
                // Scroll Down
                header.classList.add('hidden');
            } else {
                // Scroll Up
                header.classList.remove('hidden');
            }

            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
        });
        const headerSocial = document.querySelector('.header-social');

        window.addEventListener('scroll', () => {
            if (window.scrollY > headerSocial.offsetHeight) {

                document.body.classList.add('scrolled');
            } else {

                document.body.classList.remove('scrolled');
            }
        });
    </script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"
        integrity="sha512-vKtlh10whXT2NhAshnxhceCdwq/bMyMrfeZ3p2IaF89qGCwbC94ATb7Qyg8cFs8EL3Hgz9bJBF++ZWfKn4ligg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/3.0.0-rc3/lazysizes.min.js"
        integrity="sha512-HMnm5Dp1stoEycrUKuMyGDHIudidstU6uRwRgRxPbl2jNxU9xS2B0XLon7xowk3ZitrjNw7WIbQwXroIwY33sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
        integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var swiper = new Swiper(".slider .mySwiper", {
            autoplay: {
                delay: 3000,
            },
            loop: true,
            effect: "fade",
            grabCursor: true,
            keyboard: {
                enabled: true,
            },
            autoplay: {
                delay: 3000,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 1,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 1,
                    spaceBetween: 40
                }
            }
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


    @yield('js')
</body>

</html>
