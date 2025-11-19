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


<body dir="{{ session::get('front_language_duraction') }}" lang="{{ $sign }}">
 
  <header id="mainHeader" class="sticky-top">
    <nav class="navbar navbar-expand-md container">
      <div
        class="d-flex flex-wrap w-100  align-items-center justify-content-between justify-content-md-center flex-md-nowrap">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('front.index', $sign) }}">
          <img src="{{ $gs->{'logo_' . $sign} }}" alt="{{ $gs->{'title_' . $sign} }}" />
        </a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
          aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <!-- <span class="navbar-toggler-icon"></span> -->
          <i class="fa-solid fa-bars"></i>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="mainNavbar">
          <ul class="navbar-nav d-flex align-content-center">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('front.index', $sign) }}">{{ __('الرئيسية') }}</a>
            </li>
  @foreach ($categories as $category)

            @if ($category->parentServices()->count() > 0)
              
            <!-- المطابخ -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="{{ route('single-category-service.index', ['lang' => $sign, 'slug' => $category->{'slug_' . $sign}]) }}" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                 {!! $category->{'title_' . $sign} ?? '' !!}
              </a>

              <ul class="dropdown-menu dropdown-menu-end">

                @foreach ($category->parentServices as $service)
                  
                @if ($service->childs()->count() > 0)
                  
                <!-- Nested dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle d-flex align-items-center justify-content-between" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>  {!! $service->{'title_' . $sign} ?? '' !!}  </span>
                    <!-- <i class="dropdown-toggle-arrow"></i> -->
                    <i class="fa-solid fa-caret-left"></i> </a>
                  <ul class="dropdown-menu dropdown-submenu">

                    @foreach ($service->childs as $child)
                      
                    <li><a class="dropdown-item" href="{{ route('single-service.index', ['lang' => $sign, 'slug' => $child->{'slug_' . $sign}]) }}"> {!! $child->{'title_' . $sign} ?? '' !!} </a></li>

                    @endforeach
                     
                  </ul>
                </li>

                @else
                  
                <li><a class="dropdown-item" href="{{ route('single-service.index', ['lang' => $sign, 'slug' => $service->{'slug_' . $sign}]) }}"> {!! $service->{'title_' . $sign} ?? '' !!} </a></li>

                @endif
                @endforeach
 
                
              </ul>
            </li>


            @else
               
            <li class="nav-item">
              <a class="nav-link" href="{{ route('single-category-service.index', ['lang' => $sign, 'slug' => $category->{'slug_' . $sign}]) }}"> {!! $category->{'title_' . $sign} ?? '' !!} </a>
            </li>

            @endif

@endforeach


             

            <li class="nav-item"><a class="nav-link" href="{{ route('services.index', $sign) }}"> {{ __('الخدمات') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('blogs.index', $sign) }}"> {{ __('مقالات تهمك') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('locations.index', $sign) }}">{{ __('معارضنا') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('reviews.index', $sign) }}">{{ __('اراء العملاء') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('contact.index', $sign) }}"> {{ __('تواصل معنا') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('about.index', $sign) }}"> {{ __('من نحن') }}</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>



    @yield('content')

  
  <footer class="text-white pt-5 pb-4">
    <div class="container">
      <div class="row">
        <!-- Column 1: About -->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4"> {{ __('من نحن') }}  </h5>
          <p>
             {{ $gs->{'footer_' . $sign} }}
          </p>
          <div class="social-icons mt-4">
            <a href="https://www.facebook.com/share/1AJ2LibUus/" class="text-white me-2"><i
                class="fab fa-facebook-f"></i></a>
            <!-- <a href="" class="text-white me-2"><i class="fab fa-twitter"></i></a> -->
            <a href="https://www.instagram.com/highline.furniture?igsh=MTh2aHNlc3l2eDA3ZA==" class="text-white me-2"><i
                class="fab fa-instagram"></i></a>
            <!-- WhatsApp -->
            <a href="https://wa.me/2{{ $randomPhone }}" target="_blank" title="WhatsApp" class="text-white me-2">
              <i class="fa-brands fa-whatsapp"></i>
            </a>

            <!-- Phone Call -->
            <a href="tel:{{ $randomPhone }}" title="Call" class="text-white me-2">
              <i class="fa-solid fa-phone"></i>
            </a>
            <!-- <a href="#" class="text-white me-2"><i class="fab fa-youtube"></i></a> -->
          </div>
        </div>

        <!-- Column 2: Quick Links -->
        <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4"> {{ __('روابط سريعة') }}</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="{{ route('front.index', $sign) }}" class="text-white">{{ __('الرئيسية') }}</a></li>
            <li class="mb-2"><a href="{{ route('about.index', $sign) }}" class="text-white"> {{ __('من نحن') }}  </a></li>
            <li class="mb-2"><a href="{{ route('blogs.index', $sign) }}" class="text-white"> {{ __('مقالات تهمك') }}</a></li>
            <li class="mb-2"><a href="{{ route('locations.index', $sign) }}" class="text-white">{{ __('معارضنا') }}</a></li>
            <li class="mb-2"><a href="{{ route('reviews.index', $sign) }}" class="text-white">{{ __('اراء العملاء') }}</a></li>
            <li class="mb-2"><a href="{{ route('contact.index', $sign) }}" class="text-white"> {{ __('تواصل معنا') }}</a></li>
          </ul>
        </div>

        <!-- Column 3: Products -->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4">{{ __('منتجاتنا') }}</h5>
          <ul class="list-unstyled">
              @foreach ($categories as $category)
            <li class="mb-2"><a href="{{ route('single-category-service.index', ['lang' => $sign, 'slug' => $category->{'slug_' . $sign}]) }}" class="text-white"> {!! $category->{'title_' . $sign} ?? '' !!} </a></li>
                   @endforeach

          </ul>
        </div>

        <!-- Column 4: Contact -->
        <div class="col-lg-3 col-md-6">
          <h5 class="text-uppercase me-4">    {{ __('خدمة العملاء') }}</h5>
          <ul class="list-unstyled">
            
            @foreach($addresses as $address)
            <li class="flex gap-2 align-items-center">
              <i class="fas fa-map-marker-alt"></i>
              <span>
                {{$address}}
              </span>
            </li>
            @endforeach
            <li class="my-3">
              <a href="https://wa.me/2{{ $randomPhone }}" class="text-white flex gap-2 align-items-center" target="_blank"
                title="WhatsApp">
                <i class="fa-brands fa-whatsapp"></i>
                <span dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}"> {{ $randomPhone }}</span>
              </a>
            </li>
            <li class="">
              <a href="tel:{{ $randomPhone }}" class="text-white flex gap-2 align-items-center" title="Call">
                <i class="fa-solid fa-phone"></i>
                <span dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}"> {{ $randomPhone }}</span>

              </a>
            </li>
            <!-- <li class="mb-3">
              <i class="fas fa-clock me-2"></i>
              ساعات العمل: 9 ص - 5 م
            </li> -->
          </ul>
        </div>
      </div>

      <hr class="my-4 bg-light">

      <!-- Copyright -->
      <div class="row align-items-center">
        <!-- <div class="col-md-6 text-center"> -->
        <div class="d-flex gap-2 justify-content-center align-items-center">

          <p class="mb-0 text-white">&copy; هاي لاين. جميع الحقوق محفوظة. <span class="year">{{ date('Y') }}</span></p>
          <a href="https://www.cangrowonline.com/" target="_blank">
            <img src="https://alrehab-eg.com/front/alrehab/assets/CanGrow logo.png" alt="CanGrow Logo"
              style="height: 100px;" class="" /> </a>
        </div>
        <!-- </div> -->
        <!-- <div class="col-md-6 text-center text-md-end">
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a href="#" class="text-white">شروط الخدمة</a>
            </li>
            <li class="list-inline-item">
              <span class="mx-2">|</span>
            </li>
            <li class="list-inline-item">
              <a href="#" class="text-white">سياسة الخصوصية</a>
            </li>
          </ul>
        </div> -->
      </div>
    </div>
  </footer>
  <section class="social-icons-fixed">
    <!-- <a href="#" class=""><i class="fab fa-facebook-f"></i></a> -->
    <!-- <a href="#" class="social-icon twitter"><i class="fab fa-twitter"></i></a> -->
    <!-- <a href="#" class=""><i class="fab fa-instagram"></i></a> -->
    <!-- <a href="#" class="social-icon youtube"><i class="fab fa-youtube"></i></a> -->
    <a href="https://www.facebook.com/share/1AJ2LibUus/" class=" social-icon facebook"><i
        class="fab fa-facebook-f"></i></a>
    <!-- <a href="" class="text-white me-2"><i class="fab fa-twitter"></i></a> -->
    <a href="https://www.instagram.com/highline.furniture?igsh=MTh2aHNlc3l2eDA3ZA==" class="social-icon instagram"><i
        class="fab fa-instagram"></i></a>
    <!-- WhatsApp -->
    <a href="https://wa.me/2{{ $randomPhone }}" target="_blank" title="WhatsApp" class="social-icon whatsapp">
      <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- Phone Call -->
    <a href="tel:{{ $randomPhone }}" title="Call" class="social-icon call">
      <i class="fa-solid fa-phone"></i>
    </a>

  </section>
 

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
