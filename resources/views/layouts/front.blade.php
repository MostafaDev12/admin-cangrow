<!DOCTYPE html>
<html lang="{{ \Session::get('sign') }}" dir="{{ \Session::get('front_language_duraction') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp





@if(!request()->routeIs('single-service.index', 'single-service.indexen'))
<meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}">
<meta property="og:url" content="{{ url('/') }}">
<meta property="og:type" content="website">
@endif


<meta name="google-site-verification" content="jdqb87iJXXXUrCGlimEZq1LLuffzAaAW3tDfKWboVLg" />

    @if(request()->routeIs('single-service.index', 'single-service.indexen'))
        @include('front.partials.service-seo')
    @elseif (isset($page->meta_tag) && isset($page->meta_description))
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
        <meta name="keywords" content="{{ $metaTitle }}">
        <meta name="description" content="{{ $seoDescription }}">
        <meta property="og:title" content="{{ $ogTitle }}">
        <meta property="og:description" content="{{ $seoDescription }}">

        <title>{{ $seoTitle }}</title>
        
        
        
    @else
        <meta name="+author" content=" {{ $gs->{'title_' . $sign} }}">
        <meta property="og:title" content="دكتور عبد الرحمن شمس مدرس طب وجراحة العيون">
        <meta property="og:description" content="{{ $gs->{'title_' . $sign} }}">
        <title>
            @yield('title')
        </title>
        
        <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "MedicalOrganization",
          "name": "عيادات الدكتور عبدالرحمن شمس للعيون", 
          "url": "https://abdelrhmanshams.com/",
          "logo": "{{ $gs->{'logo_' . $sign} }}",
          "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+201118886541",
            "contactType": "customer service",
            "areaServed": "EG",
            "availableLanguage": "Arabic"
          },
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "99 شارع النصر",
            "addressLocality": "المعادي الجديدة",
            "addressRegion": "القاهرة",
            "addressCountry": "EG"
          },
          "sameAs": [
            "https://www.facebook.com/DrAbdelrahmanShams", 
            "https://www.youtube.com/@Dr.AbdelrahmanShams", 
            "https://www.linkedin.com/in/dr-abdelrahman-shams-92809b24b/",
            "https://www.instagram.com/dr.abdelrhmanshams/?igsh=MWZ3N3RzaW5mOThrMw",
            "https://www.tiktok.com/@dr.abdelrhmanshams?_t=8kQIekjhT3W&_r=1"
          ],
          "medicalSpecialty": "Ophthalmology" 
        }
     </script>
    @endif

 @if(isset($blog->{'header_code_' . $sign}))
 
   {!! $blog->{'header_code_' . $sign} !!}
 
 @endif
 @if(!request()->routeIs('single-service.index', 'single-service.indexen'))<link rel="canonical" href="{{ url()->current() }}" />@endif

   
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-8RJGGYWDV7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-8RJGGYWDV7');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<link rel="stylesheet"
      href="{{ asset('front/dr-shams/css/style.css') }}?v={{ filemtime(public_path('front/dr-shams/css/style.css')) }}">


    <link rel="stylesheet" href="{{ asset('build/css/toastr.css') }}">

    @yield('css')



    <style>
        @media (min-width: 992px) {
            .header .navbar-nav > .dropdown:hover > .dropdown-menu { display:block; }
            .header .navbar-nav .dropdown-menu > .dropdown { position:relative; }
            .header .navbar-nav .dropdown-menu > .dropdown:hover > .dropdown-menu { display:block; top:0; margin-top:0; }
            html[dir="rtl"] .header .navbar-nav .dropdown-menu > .dropdown > .dropdown-menu { right:100%; left:auto; margin-right:6px; }
            html[dir="ltr"] .header .navbar-nav .dropdown-menu > .dropdown > .dropdown-menu { left:100%; right:auto; margin-left:6px; }
        }
        @media (max-width: 991.98px) {
            .header .navbar-collapse { max-height:calc(100vh - 115px); overflow-y:auto; overflow-x:hidden; padding:12px 0 20px; }
            .header .navbar-nav, .header .navbar-nav .nav-item, .header .navbar-nav .dropdown { width:100%; }
            .header .navbar-nav .nav-link { width:100%; display:flex; align-items:center; justify-content:space-between; padding:10px 14px; }
            .header .navbar-nav .dropdown-menu { position:static !important; inset:auto !important; transform:none !important; width:100%; min-width:0; margin:0; padding:5px 10px; border:0; border-radius:0; box-shadow:none; background:#f7f7f7; }
            .header .navbar-nav .dropdown-menu:not(.show) { display:none; }
            .header .navbar-nav .dropdown-menu.show { display:block; }
            .header .navbar-nav .dropdown-menu .dropdown-menu { margin:4px 0 6px; padding:4px 12px; background:#fff; border-inline-start:2px solid #324f5d; }
            .header .navbar-nav .dropdown-item { width:100%; white-space:normal; padding:9px 12px; text-align:start; }
            .header .navbar-nav .dropdown > .dropdown-toggle { display:flex; align-items:center; justify-content:space-between; gap:10px; }
            .header .navbar-nav .dropdown > .dropdown-toggle::after { margin-inline-start:auto; transition:transform .2s ease; }
            .header .navbar-nav .dropdown.submenu-open > .dropdown-toggle::after { transform:rotate(180deg); }
        }
    </style>

</head>

<body>

  @php
  $phones =  explode(',', $gs->phones);
  $emails =   explode(',', $gs->emails);
  $addresses =  json_decode($gs->{'addresses_' . $sign});

  $randomPhone = Arr::random($phones);
  @endphp
    <div class="header-social text-center">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="d-flex justify-content-center justify-content-evenly">
                      @if(App\Models\Socialsetting::find(1)->f_status == 1)   <a target="_blank"  href="{{ App\Models\Socialsetting::find(1)->facebook }}"> <i class="fab fa-facebook"></i></a>  @endif
                      @if(App\Models\Socialsetting::find(1)->ystatus == 1)    <a target="_blank"  href="{{ App\Models\Socialsetting::find(1)->youtube }}"> <i class="fab fa-youtube"></i></a>  @endif
                      @if(App\Models\Socialsetting::find(1)->t_status == 1)    <a target="_blank"  href="{{ App\Models\Socialsetting::find(1)->twitter }}">  <i class="fab fa-instagram"></i></a>  @endif
                      @if(App\Models\Socialsetting::find(1)->d_status == 1)     <a target="_blank"  href="{{ App\Models\Socialsetting::find(1)->dribble }}">  <i class="fab fa-tiktok"></i></a>  @endif
                    </div>
                </div>
                <div class="col-4">
                    <a target="_blank"  href="http://wa.me/2{{ $randomPhone }}"><i class="fab fa-whatsapp"></i> {{ $randomPhone }}</a>
                </div>
                <div class="col-4">
                    <a href="tel:+2{{ $randomPhone }}"><i class="fas fa-phone"></i> {{ $randomPhone }} </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header">
        <nav class="navbar navbar-expand-lg bg-white">
            <div class="container-fluid">
                <a class="navbar-brand wow animate__animated animate__fadeInDown" data-wow-delay="1s"
                    data-wow-duration="1s" href="{{ route('front.index'.$lang,$lang) }}"><img
                        src="{{ $gs->{'logo_' . $sign} }}" alt="RGS Logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav wow animate__animated animate__fadeInDown" data-wow-delay="1s"
                        data-wow-duration="1s">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('front.index'.$lang,$lang) }}">{{ __('الرئيسية') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about.index'.$lang,$lang) }}">{{ __('عن الشركة') }}</a>
                        </li>

{{-- 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('services.index'.$lang,$lang) }}" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('الخدمات') }}
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $category)
                                    <li><a class="dropdown-item nav-link dropdown-toggle" href="#">{{ $category->{'title_' . $sign} }}</a>
                                      <ul class="dropdown-menu">
                                        @foreach ($categories as $category)
                                            <li><a class="dropdown-item" href="#">{{ $category->{'title_' . $sign} }}</a>
                                              
                                            </li>
                                        @endforeach
        
                                    </ul>
                                    </li>
                                @endforeach

                            </ul>
                        </li> --}}



                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle services-menu-toggle" href="{{ route('services.index'.$lang,$lang) }}" id="servicesDropdown" role="button"
                                aria-expanded="false">
                                {{ __('الخدمات') }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">

                                @foreach ($categories as $category)
                                <li class="dropdown">
                                <a class="dropdown-item @if(count($category->services) > 0) dropdown-toggle service-submenu-toggle @endif" href="{{ route('single-category-service.index'.$lang,['slug' => $category->{'slug_' . $sign}  ,'lang'=> $lang ]) }}">{{ $category->{'title_' . $sign} }}</a>
                                @if(count($category->services) > 0)
                                <ul class="dropdown-menu"> 
                                    
                                
                                    @foreach ($category->services as $service)
                                    <li><a class="dropdown-item" href="{{ route('single-service.index'.$lang,['slug' => $service->{'slug_' . $sign}  ,'lang'=> $lang ]) }}">{{ $service->{'title_' . $sign} }}  </a></li>
                                    @endforeach
                                    
                                </ul>
                                @endif
                                </li>
                                @endforeach
                

                                @foreach ($servicesWithoutCats as $service)
                                <li class="dropdown">
                                <a class="dropdown-item" href="{{ route('single-service.index'.$lang,['slug' => $service->{'slug_' . $sign} ,'lang'=> $lang ]) }}">{{ $service->{'title_' . $sign} }}</a>
                              
                                </li>
                                @endforeach
                
                            </ul>
                       </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('videos.index'.$lang,$lang) }}">{{ __('الفيديوهات') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blogs.index'.$lang,$lang) }}">{{ __('المقالات') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('book.index'.$lang,$lang) }}"> {{ __('احجز الان') }}  </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact.index'.$lang,$lang) }}">   {{ __('اتصل بنا') }}</a>
                        </li>

                    </ul>
                  <div class="dropdown">
                      <button class="btn dropdown-toggle font-bold" type="button" id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-globe"></i> 
                        {{ \Session::get('front_language_name') }}
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="langDropdown">
                       @foreach ($languages as $language)
                        <li><a class="dropdown-item" href="{{ route('front.lang-change', $language->id) }}"><i class="fa-solid fa-globe"></i> {{ $language->language }}</a></li>
                       @endforeach
                      </ul>
                    </div>

                </div>
            </div>
        </nav>
    </div>



    @yield('content')



    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 ">
                    <div class="logo">
                        <img src="{{ $gs->{'logo_' . $sign} }}" alt="RGS Logo">
                    </div>
                    <p class="branch-info fw-bold">
                      {{ $gs->{'footer_' . $sign} }}
                    </p>
                </div>
                <div class="col-lg-2 col-md-6 ">
                    <p class="title-footer">{{ __('روابط هامة') }}</p>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('front.index'.$lang,$lang) }}">{{ __('الرئيسية') }}</a></li>
                        <li><a href="{{ route('about.index'.$lang,$lang) }}"> {{ __('عن الشركة') }} </a></li>
                        <li><a href="{{ route('services.index'.$lang,$lang) }}"> {{ __('الخدمات') }}</a></li>
                        <li><a href="{{ route('videos.index'.$lang,$lang) }}">{{ __('الفيديوهات') }}</a></li>
                        <li><a href="{{ route('book.index'.$lang,$lang) }}">{{ __('احجز الان') }}</a></li>
                        <li><a href="{{ route('contact.index'.$lang,$lang) }}">    {{ __('اتصل بنا') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <p  class="title-footer"> {{ __('الخدمات') }}</p>
                    <ul class="list-unstyled">
                      @foreach ($services->shuffle()->take(6) as $service)
                      <li><a href="{{ route('single-service.index'.$lang,['slug' => $service->{'slug_' . $sign}  ,'lang'=> $lang ]) }}"> {{ $service->{'title_' . $sign} }}  </a></li>
                      @endforeach
                     
                       

                    </ul>
                </div>
                <!-- تواصل معنا -->
                <div class="col-lg-4 col-md-6 ">
                    <p  class="title-footer"> {{ __('تواصل معنا') }}</p>
                    <p class="contact-info">
                      @foreach ($phones as $phone)
 
                      <i class="fas fa-phone"></i><a href="tel:+2{{ $phone }}">{{ $phone }}</a> <br>

                      @endforeach
                     @foreach ($phones as $phone)

                      <i class="fab fa-whatsapp"></i><a target="_blank"  href="http://wa.me/2{{ $phone }}" target="_blank">{{ $phone }}</a><br>
                      @endforeach
                     
                   <!--تعديل-->
            @php
    $mapLang = $sign == 'ar' ? 'ar' : 'en';
@endphp

@foreach ($addresses as $address)
    <i class="fas fa-location"></i>
    <a
        href="https://www.google.com/maps?cid=14755123623181241467&hl={{ $mapLang }}&gl=EG"
        target="_blank"
        rel="noopener"
        class="hover:text-accent transition">
        {{ $address }}
    </a>
    <br>
@endforeach
               <!--تعديل-->
                        
                    </p>
                </div>
            </div>
            <hr>
            <p class="text-center fw-bold">جميع الحقوق محفوظة © {{ date('Y') }}  <a target="_blank" href="https://cangrowonline.com">CanGrow Digital Marketing Agency</a>      </p>
        </div>
    </section>
    <div class="social-media">
        <ul class="custom">

           @if(App\Models\Socialsetting::find(1)->f_status == 1)   <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" target="_blank"> <i class="fab fa-facebook"></i></a>  @endif
                      @if(App\Models\Socialsetting::find(1)->ystatus == 1)    <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" target="_blank"> <i class="fab fa-youtube"></i></a>  @endif
                      @if(App\Models\Socialsetting::find(1)->t_status == 1)    <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" target="_blank">  <i class="fab fa-instagram"></i></a>  @endif
                      @if(App\Models\Socialsetting::find(1)->d_status == 1)     <a href="{{ App\Models\Socialsetting::find(1)->dribble }}" target="_blank">  <i class="fab fa-tiktok"></i></a>  @endif

                      <a target="_blank" href="http://wa.me/201118886541"><i class="fab fa-whatsapp"></i></a>
                      <a href="tel:+201118886541"><i class="fas fa-phone"></i> </a>

        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
        integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

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
    </script>
    <script>
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

        // استماع لحدث التمرير
        window.addEventListener('scroll', () => {
            if (window.scrollY > headerSocial.offsetHeight) {
                // إضافة كلاس عندما يتم التمرير
                document.body.classList.add('scrolled');
            } else {
                // إزالة الكلاس عندما نعود للأعلى
                document.body.classList.remove('scrolled');
            }
        });
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
                    slidesPerView: 3,
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



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMax = 991.98;
            const servicesToggle = document.getElementById('servicesDropdown');
            if (!servicesToggle) return;
            const servicesItem = servicesToggle.closest('.dropdown');
            const servicesMenu = servicesItem ? servicesItem.querySelector(':scope > .dropdown-menu') : null;
            const isMobileNav = () => window.innerWidth <= mobileMax;

            servicesToggle.addEventListener('click', function (e) {
                if (!isMobileNav() || !servicesMenu) return;
                e.preventDefault();
                e.stopPropagation();
                const willOpen = !servicesMenu.classList.contains('show');
                servicesMenu.classList.toggle('show', willOpen);
                servicesItem.classList.toggle('submenu-open', willOpen);
                servicesToggle.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
                if (!willOpen) {
                    servicesMenu.querySelectorAll('.dropdown-menu.show').forEach(menu => menu.classList.remove('show'));
                    servicesMenu.querySelectorAll('.submenu-open').forEach(item => item.classList.remove('submenu-open'));
                }
            });

            document.querySelectorAll('.service-submenu-toggle').forEach(function (toggle) {
                toggle.addEventListener('click', function (e) {
                    if (!isMobileNav()) return;
                    const parent = toggle.closest('.dropdown');
                    const submenu = parent ? parent.querySelector(':scope > .dropdown-menu') : null;
                    if (!submenu) return;
                    e.preventDefault();
                    e.stopPropagation();
                    if (parent.parentElement) {
                        parent.parentElement.querySelectorAll(':scope > .dropdown.submenu-open').forEach(function (sibling) {
                            if (sibling === parent) return;
                            sibling.classList.remove('submenu-open');
                            const openMenu = sibling.querySelector(':scope > .dropdown-menu.show');
                            if (openMenu) openMenu.classList.remove('show');
                        });
                    }
                    const willOpen = !submenu.classList.contains('show');
                    submenu.classList.toggle('show', willOpen);
                    parent.classList.toggle('submenu-open', willOpen);
                });
            });

            window.addEventListener('resize', function () {
                if (!isMobileNav()) {
                    document.querySelectorAll('#navbarNavDropdown .dropdown-menu.show').forEach(menu => menu.classList.remove('show'));
                    document.querySelectorAll('#navbarNavDropdown .submenu-open').forEach(item => item.classList.remove('submenu-open'));
                    servicesToggle.setAttribute('aria-expanded', 'false');
                }
            });
        });
    </script>


    @yield('js')
</body>

</html>
