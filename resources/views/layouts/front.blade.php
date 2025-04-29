<!DOCTYPE html>
<html lang="{{ \Session::get('sign') }}" dir="{{ \Session::get('front_language_duraction') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp




<meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}">
<meta property="og:url" content="{{ url('/') }}">
<meta property="og:type" content="website">

<meta name="google-site-verification" content="25cBwjBBrSuhTz84wDRtN12h3RqXmc5xvB1FTnosxd8" />

    @if (isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
        <title>@yield('title') -

            {{ $gs->{'title_' . $sign} }}

        </title>
    @elseif(isset($blog->{'meta_title_' . $sign}) && isset($blog->{'meta_details_' . $sign}))
        <meta name="keywords" content="{{ $blog->{'meta_title_' . $sign} }}">
        <meta name="description" content="{{ $blog->{'meta_details_' . $sign} }}">
        <meta property="og:title" content="{{ $blog->{'meta_title_' . $sign} }}">
        <meta property="og:description" content="{{ $blog->{'meta_details_' . $sign} }}">

        <title>@yield('title') </title>
    @else
 
        <meta property="og:title" content="{{ $gs->{'title_' . $sign} }}">
        <meta property="og:description" content="">
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



    <link rel="stylesheet" href="{{ asset('front/Rgs/') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('front/Rgs/') }}/css/slider.css">



    <link rel="stylesheet" href="{{ asset('build/css/toastr.css') }}">

    @yield('css')


</head>

<body>

  @php
  $phones =  explode(',', $gs->phones);
  $emails =   explode(',', $gs->emails);
  $addresses =  json_decode($gs->{'addresses_' . $sign});

  $randomPhone = Arr::random($phones);
  @endphp
 


    <div class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('front.index') }}"><img src="{{ $gs->{'logo_' . $sign} }}" alt="RGS Logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('front.index') }}">{{ __('الرئيسية') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about.index') }}">  {{ __('عن الشركة') }}  </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('services.index') }}" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ __('الخدمات') }}
                            </a>
                            <ul class="dropdown-menu">
                              @foreach ($services as $service)
                                <li><a class="dropdown-item" href="{{ route('single-service.index',['slug' => $service->{'slug_' . $sign} ]) }}"> {{ $service->{'title_' . $sign} }}   </a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                  {{ __('المعرض') }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('videos.index') }}">  {{ __('فيديوهات') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('projects.index') }}">{{ __('صور') }}</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blogs.index') }}">{{ __('المقالات') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('certificates.index') }}">{{ __('الشهادات') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact.index') }}"> {{ __('اتصل بنا') }}  </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    

    @yield('content')



    <section class="footer-section">
      <div class="container">
          <div class="row text-center">
              <!-- روابط هامة -->

              <!-- عناوين فروعنا -->
              <div class="col-lg-6 col-md-6 ">
                  <div class="logo">
                      <img src="{{ $gs->{'logo_' . $sign} }}" alt="RGS Logo">
                  </div>
                  <h1>   {{ __('عناوين فروعنا') }}</h1>
                  <p class="branch-info">
                    @foreach ($addresses as $address)
                    <i class="fas fa-map-marker-alt"></i> <a href="#">   {{ $address }}   </a>
                    <br>
                    @endforeach
                     
                  </p>
              </div>
              <div class="col-lg-3 col-md-6 ">
                  <h1>   {{ __('روابط هامه') }}</h1>
                  <ul class="list-unstyled">
                    <li><a href="{{ route('front.index') }}">{{ __('الرئيسية') }}</a></li>
                    <li><a href="{{ route('about.index') }}"> {{ __('عن الشركة') }} </a></li>
                    <li><a href="{{ route('services.index') }}"> {{ __('الخدمات') }}</a></li>
                    <li><a href="{{ route('videos.index') }}">{{ __('الفيديوهات') }}</a></li>
                    <li><a href="{{ route('blogs.index') }}">{{ __('المقالات') }}</a></li>
                    <li><a href="{{ route('contact.index') }}">    {{ __('اتصل بنا') }}</a></li>
                  </ul>
              </div>
              <!-- تواصل معنا -->
              <div class="col-lg-3 col-md-6 ">
                  <h1>   {{ __('تواصل معنا') }}</h1>
                  <p class="contact-info">
                    @foreach ($phones as $phone)
                    @if($phone)
                    <i class="fas fa-phone"></i><a href="tel:+2{{ $phone }}">{{ $phone }}</a> <br>
                    @endif
                    @endforeach
                    @foreach ($emails as $email)
                    @if($email)
                    <i class="fas fa-envelope"></i><a href="mailto:{{ $email }}">{{ $email }}</a> <br>
                    @endif
                    @endforeach
                      
                  </p>
              </div>
          </div>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
      integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script
      src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
      integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script>
      new WOW().init();
    </script>
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
    document.onreadystatechange = function() {
let lastScrollPosition = 0;
const navbar = document.querySelector('.navbar');
window.addEventListener('scroll', function(e) {
  lastScrollPosition = window.scrollY;
  
  if (lastScrollPosition > 100)
    navbar.classList.add('navbar-dark');
  else
    navbar.classList.remove('navbar-dark');
});
}
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
  var swiper = new Swiper(".service  .mySwiper", {
      autoplay: {
  delay: 3000,
},
loop: true,
    slidesPerView: 4,
    spaceBetween: 20,
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
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 20
      }
    }
  });    var swiper = new Swiper(".partner  .mySwiper", {
      autoplay: {
  delay: 3000,
},
loop: true,
    slidesPerView: 4,
    spaceBetween: 20,
    centeredSlides: true,
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
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 20
      }
    }
  });
  var swiper = new Swiper(".blog .mySwiper", {
      autoplay: {
  delay: 3000,
},
loop: true,
    slidesPerView: 4,
    spaceBetween: 20,
    
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
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 20
      }
    }
  });
  </script>


 
 
    <script src="{{ asset('build/js/toastr.js') }}"></script>

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
