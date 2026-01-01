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


<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>
    
    <div class="preloader">
        <div class="preloader__image" style="background-image: url({{ asset('front/mtc/') }}/assets/images/loader.png.png);"></div>
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        <div class="topbar topbar--two">
            <div class="container-fluid">
                <div class="topbar__inner">
                    <ul class="list-unstyled topbar__info">
                        <li>
                            <i class="icon-paper-plane"></i>
                            <a href="mailto:{{ $randomEmail }}">{{ $randomEmail }}</a>
                        </li>
                        <li>
                            <i class="icon-maps-and-flags"></i>
                            <a href="{{ $ps->map }}">   
                                 {{ $randomAddress }}</a>
                        </li>
                    </ul><!-- /.list-unstyled topbar__info -->
                    <div class="topbar__right">
                        <ul class="list-unstyled topbar__pages">
                            <li><a href="{{ route('contact.index',$sign) }}">{{ __('مساعدة') }} </a></li>
                            <li><a href="{{ route('contact.index',$sign) }}">{{ __('دعم') }}</a></li>
                            <li><a href="{{ route('contact.index',$sign) }}"> {{ __('اتصل بنا') }}  </a></li>
                        </ul><!-- /.list-unstyled topbar__pages -->
                        <div class="topbar__social">
                            @if(App\Models\Socialsetting::find(1)->f_status == 1)
                            <a href="{{ App\Models\Socialsetting::find(1)->facebook }}">
                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                <span class="sr-only">{{ __('فيسبوك') }}</span>
                            </a>
                             @endif
                               @if(App\Models\Socialsetting::find(1)->t_status == 1) 
                            <a href="{{ App\Models\Socialsetting::find(1)->twitter }}">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                <span class="sr-only">{{ __('تويتر') }}</span>
                            </a>
                            @endif
                              @if(App\Models\Socialsetting::find(1)->ystatus == 1)
                            <a href="{{ App\Models\Socialsetting::find(1)->youtube }}">
                                <i class="fab fa-youtube" aria-hidden="true"></i>
                                <span class="sr-only">{{ __('يوتيوب') }}</span>
                            </a>
                            @endif
                             @if(App\Models\Socialsetting::find(1)->i_status == 1)
                            <a href="{{ App\Models\Socialsetting::find(1)->instagram }}">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                                <span class="sr-only">{{ __('إنستغرام') }}</span>
                            </a>
                            @endif
                        </div><!-- /.topbar__social -->
                    </div><!-- /.topbar__right -->
                </div><!-- /.topbar__inner -->
            </div><!-- /.container-fluid -->
        </div><!-- /.topbar -->

        <header class="main-header main-header--two sticky-header sticky-header--normal">
            <div class="main-header__container-fluid container-fluid">
                <div class="main-header__inner">
                    <div class="main-header__logo">
                        <a href="{{ route('front.index',$sign) }}">
                            <img src="{{ $gs->{'logo_' . $sign} }}" alt="Boskery HTML" width="100">
                        </a>
                    </div><!-- /.main-header__logo -->
                    <div class="main-header__right">
                        <div class="main-header__right__left">
                            <nav class="main-header__nav main-menu">
                                <ul class="main-menu__list one-page-scroll-menu">
                                    <!-- الرئيسية -->
                                    <li  class="scrollToLink">
                                        <a href="{{ route('front.index',$sign) }}">{{ __('الرئيسية') }}</a>
                                    </li>

                                    <!-- About MTC – من نحن (Mega Menu) -->
                                    <li  class="dropdown">
                                        <a href="{{ route('about.index',$sign) }}"> {{ __('من نحن') }}</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('about.index',$sign) }}#our-story">{{ __('قصتنا / من نحن') }}</a></li>
                                            <li><a href="{{ route('about.index',$sign) }}#vision-mission-values">{{ __('الرؤية والرسالة والقيم') }}</a>
                                            </li>
                                            <li><a href="{{ route('about.index',$sign) }}#why-mtc">{{ __('لماذا MTC') }}</a></li>
                                            <li><a href="{{ route('about.index',$sign) }}#success-partners">{{ __('شركاء النجاح') }}</a></li>
                                        </ul>
                                    </li>

                                    <!-- Farm to Fork – من المزرعة إلى المائدة -->
                                    <li  class="dropdown">
                                        <a href="{{ route('farm-to-fork.index',$sign) }}">{{ __('من المزرعة إلى المائدة') }}</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('farm-to-fork.index',$sign) }}#fattening-farms">{{ __('مزارع التسمين') }}</a></li>
                                            <li><a href="{{ route('farm-to-fork.index',$sign) }}#slaughterhouse">{{ __('المجزر وعمليات الذبح') }}</a></li>
                                            <li><a href="{{ route('farm-to-fork.index',$sign) }}#processing-packaging">{{ __('التصنيع والتعبئه والتغليف') }}
                                                    </a></li>
                                            <li><a href="{{ route('farm-to-fork.index',$sign) }}#cold-chain">{{ __('سلسلة التبريد والنقل') }}</a></li>
                                        </ul>
                                    </li>

                                    <!-- المنتجات -->
                                    <li style="font-size: 10px; " class="dropdown ">
                                        <a href="{{ route('products.index',$sign) }}">{{ __('المنتجات') }}</a>
                                        <ul class="sub-menu">
                                            @foreach ($categories as $category)
                                                
                                            <li><a href="{{ route('products.index',$sign) }}#{{ $category->title_en }}"> {{ $category->{'title_' . $sign} }}  </a>
                                            </li>
                                            @endforeach
                                          
                                        </ul>
                                    </li>

                                    <!-- B2B Services -->
                                    <li style="font-size: 10px; " class="dropdown ">
                                        <a href="{{ route('b2b-services.index',$sign) }}">{{ __('عملاءنا') }}</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('b2b-services.index',$sign) }}#restaurant-cuts">{{ __('قطع خاصة للمطاعم') }}</a></li>
                                            <li><a href="{{ route('b2b-services.index',$sign) }}#bulk-vacuum">{{ __('عبوات Bulk / Vacuum large packs') }}</a></li>
                                            <li><a href="{{ route('b2b-services.index',$sign) }}#private-label">{{ __('Private Label') }}</a></li>
                                            <li><a href="{{ route('b2b-services.index',$sign) }}#rfq-form">{{ __('نموذج طلب عرض أسعار') }}</a></li>
                                        </ul>
                                    </li>

                                    <!-- الجودة والسلامة الغذائية -->
                                    <li  class="dropdown">
                                        <a href="{{ route('quality.index',$sign) }}"> {{ __('الجودة والسلامة الغذائية') }}</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('quality.index',$sign) }}#certifications">{{ __('شهادات الجودة (ISO / Halal /...)') }}</a></li>
                                            <li><a href="{{ route('quality.index',$sign) }}#halal-standards">{{ __('معايير الذبح الحلال والرقابة الصحية') }}</a></li>
                                            <li><a href="{{ route('quality.index',$sign) }}#traceability">{{ __('نظام التتبع من المزرعة للمستهلك') }}</a></li>
                                            <li><a href="{{ route('quality.index',$sign) }}#faqs">{{ __('أسئلة شائعة عن التخزين والتجميد الآمن') }}</a></li>
                                        </ul>
                                    </li>

                                    <!-- الوظائف -->
                                    <li  class="dropdown">
                                        <a href="{{ route('careers.index',$sign) }}">{{ __('الوظائف') }}</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('careers.index',$sign) }}#work-culture">{{ __('ثقافة العمل في MTC') }}</a></li>
                                            <li><a href="{{ route('careers.index',$sign) }}#available-jobs">{{ __('الوظائف المتاحة') }}</a></li>
                                            <li><a href="{{ route('careers.index',$sign) }}#apply-cv">{{ __('نموذج إرسال السيرة الذاتية') }}</a></li>
                                        </ul>
                                    </li>

                                    <!-- صحتك أمانة -->
                                    <li  class="dropdown">
                                        <a href="{{ route('blogs.index',$sign) }}">{{ __('صحتك أمانة') }}</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('blogs.index',$sign) }}#articles">{{ __('مقالات قصيرة') }}</a></li>
                                            <li><a href="{{ route('blogs.index',$sign) }}#videos">{{ __('فيديوهات') }}</a></li>
                                        </ul>
                                    </li>

                                    <!-- اتصل بنا -->
                                    <li class="scrollToLink">
                                        <a href="{{ route('contact.index',$sign) }}">{{ __('اتصل بنا') }}</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <!-- Right Icons / Controls -->
                        <div class="main-header__right__right">
                            <div class="mobile-nav__btn mobile-nav__toggler">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <a href="#" class="search-toggler main-header__search">
                                <i class="icon-search" aria-hidden="true"></i>
                                <span class="sr-only">{{ __('بحث') }}</span>
                            </a>
                            <!-- <a href="{{ route('contact.index',$sign) }}" class="main-header__cart">
                                <i class="icon-cart" aria-hidden="true"></i>
                                <span class="sr-only">سلة التسوق</span>
                            </a> -->
                             @php
                    $lang = App\Models\Language::where('sign', '!=', $sign)->first();
                @endphp

                  @if ($lang)
                            <a href="{{ route('change-lang.index', $lang->id) }}" style="padding-right: 10px;font-weight: bold;" class="main-header__lang">
                                <span>{{ $lang->language }}</span>
                            </a>
                              @endif
                            <div class="main-header__call">
                                <span class="main-header__call__icon icon-mobile"></span>
                                <div class="main-header__call__inner">
                                    <span class="main-header__call__tagline">{{ __('اتصل بنا في أي وقت') }}</span>
                                    <a href="tel:{{ $randomPhone }}" class="main-header__call__number">{{ $randomPhone }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.main-header__inner -->
            </div><!-- /.container-fluid -->
        </header><!-- /.main-header -->

 


    @yield('content')

 
        <footer class="main-footer">
            <div class="main-footer__bg" style="background-image: url({{ asset('front/mtc/') }}/assets/images/backgrounds/footer-bg.png);"></div>
            <!-- /.main-footer__bg -->
            <div class="container">
                <div class="main-footer__top">
                    <div class="row gutter-y-40 align-items-center">
                        <div class="col-md-3 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <a href="{{ route('front.index',$sign) }}" class="main-footer__logo">
                                <img src="{{ $gs->{'logo_' . $sign} }}" width="119" alt="قالب بوسكيري HTML">
                            </a><!-- /.main-footer__logo -->
                        </div><!-- /.col-md-3 -->
                        <div class="col-md-9 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="300ms">
                           <form action="{{ route('front.subscripe.submit') }}" name="appointment"
                                                id="subscribeform" aria-label="subscripe form" data-status="init"
                                                method="POST" autocomplete="off"  data-url=" " class="main-footer__newsletter  ">
                                                {{ csrf_field() }}
                                                <div style="width: 81%;">
                                                        @include('includes.admin.form-both')
                                                   </div>
                                <input type="text" name="email" required placeholder="{{ __('عنوان البريد الإلكتروني') }}">
                                <button type="submit" class="icon-paper-plane">
                                    <span class="sr-only">{{ __('إرسال') }}</span><!-- /.sr-only -->
                                </button>
                            </form><!-- /.main-footer__newsletter mc-form -->
                            <div class="mc-form__response"></div><!-- /.mc-form__response -->
                        </div><!-- /.col-md-9 -->
                    </div><!-- /.row -->
                </div><!-- /.main-footer__top -->
                <div class="main-footer__widget">
                    <div class="row gutter-y-50">
                        <div class="col-lg-5 col-xl-3 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <div class="footer-widget footer-widget--about">
                                <h2 class="footer-widget__title">   
                                      {{ $gs->{'footer_' . $sign} }}</h2>
                                <!-- /.footer-widget__title -->
                                <a href="{{ route('contact.index',$sign) }}" class="boskery-btn">
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__text">{{ __('اتصل بنا') }}</span>
                                    <i class="icon-meat-3"></i>
                                </a><!-- /.boskery-btn -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-lg-5 col-xl-3 -->
                        <div class="col-lg-3 col-md-3 col-xl-2 wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="200ms">
                            <div class="footer-widget footer-widget--links">
                                <h2 class="footer-widget__title">{{ __('استكشف') }}</h2><!-- /.footer-widget__title -->
                                <ul class="list-unstyled footer-widget__links">
                                    <li><a href="{{ route('about.index',$sign) }}">{{ __('من نحن') }}</a></li>
                                 
                                    <li><a href="{{ route('blogs.index',$sign) }}">{{ __('آخر الأخبار') }}</a></li>
                                    <li><a href="{{ route('contact.index',$sign) }}">{{ __('اتصل بنا') }}</a></li>
                                </ul><!-- /.list-unstyled footer-widget__links -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-lg-3 col-md-3 col-xl-2 -->
                        <div class="col-lg-4 col-md-5 col-xl-4 wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="400ms">
                            <div class="footer-widget footer-widget--contact">
                                <h2 class="footer-widget__title">{{ __('اتصل بنا') }}</h2><!-- /.footer-widget__title -->
                                <div class="footer-widget__contact">
                                     @foreach ($addresses as $address)
                                    <address class="footer-widget__address"> {{ $address }} 
                                         </address>
                                         @endforeach
                                    <!-- /.footer-widget__address -->
                                    <ul class="list-unstyled footer-widget__info">
                                         @foreach ($emails as $email)
                                        <li><span class="icon-paper-plane"></span> <a
                                                href="mailto:{{ $email }}">{{ $email }}</a>
                                        </li>
                                         @endforeach
                                         @foreach ($phones as $phone)
                                        <li><span class="icon-phone-call"></span> <a href="tel:{{ $phone }}">{{ $phone }}</a></li>
                                           @endforeach
                                    </ul><!-- /.list-unstyled footer-widget__info -->
                                    <div class="footer-widget__social">
 @if(App\Models\Socialsetting::find(1)->f_status == 1)
                                        <a href="{{ App\Models\Socialsetting::find(1)->facebook }}">
                                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            <span class="sr-only">{{ __('فيسبوك') }}</span>
                                        </a>
@endif
  @if(App\Models\Socialsetting::find(1)->t_status == 1) 
                                        <a href="{{ App\Models\Socialsetting::find(1)->twitter }}">
                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                            <span class="sr-only">{{ __('تويتر') }}</span>
                                        </a>
                                         @endif
                                          @if(App\Models\Socialsetting::find(1)->l_status == 1)
                                        <a href="{{ App\Models\Socialsetting::find(1)->linkedin }}">
                                            <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                                            <span class="sr-only">{{ __('لينكدإن') }}</span>
                                        </a>
                                          @endif
                                        @if(App\Models\Socialsetting::find(1)->ystatus == 1)
                                        <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" aria-hidden="true">
                                            <i class="fab fa-youtube"></i>
                                            <span class="sr-only">{{ __('يوتيوب') }}</span>
                                        </a>
                                        @endif
                                    </div><!-- /.footer-widget__social -->
                                </div><!-- /.footer-widget__contact -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-lg-4 col-md-5 col-xl-4 -->
                        <div class="col-lg-5 col-md-4 col-sm-8 col-xl-3 wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="600ms">
                            <div class="footer-widget footer-widget--gallery">
                                <h2 class="footer-widget__title">{{ __('المعرض') }}</h2><!-- /.footer-widget__title -->
                                <div class="footer-widget__gallery">
                                   @foreach ($footer_images as $footer_image)
                                       
                                    <a href="#" class="footer-widget__gallery__link">
                                        <img src="{{  $footer_image->photo }}" alt="معرض الصور">
                                        <span class="footer-widget__gallery__icon icon-plus"></span>
                                    </a><!-- /.footer-widget__gallery__link -->
                                   
                                   @endforeach
                                </div>
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-lg-5 col-md-4 col-sm-8 col-xl-3 -->
                    </div><!-- /.row -->
                </div><!-- /.main-footer__widget -->
            </div><!-- /.container -->
            <div class="main-footer__bottom">
                <div class="container">
                    <div class="main-footer__bottom__inner">
                        <p class="main-footer__copyright">
                            &copy; حقوق النشر <span class="dynamic-year"></span>© {{ date('Y') }} جميع الحقوق محفوظة –
                            cangrowonline
                        </p>
                    </div><!-- /.main-footer__inner -->
                </div><!-- /.container -->
            </div><!-- /.main-footer__bottom -->
        </footer><!-- /.main-footer -->

    </div><!-- /.page-wrapper -->

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="{{ route('front.index',$sign) }}" aria-label="logo image"><img src="{{ $gs->{'logo_' . $sign} }}" width="100"
                        alt="logo" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                 @foreach ($emails as $email)
                                      
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:{{ $email }}">{{ $email }}</a>
                </li> 
                  @endforeach
                     @foreach ($phones as $phone)
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:{{ $phone }}">{{ $phone }}</a>
                </li>
                    @endforeach
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__social">
                @if(App\Models\Socialsetting::find(1)->f_status == 1)
                                        <a href="{{ App\Models\Socialsetting::find(1)->facebook }}">
                                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            <span class="sr-only">{{ __('فيسبوك') }}</span>
                                        </a>
@endif
  @if(App\Models\Socialsetting::find(1)->t_status == 1) 
                                        <a href="{{ App\Models\Socialsetting::find(1)->twitter }}">
                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                            <span class="sr-only">{{ __('تويتر') }}</span>
                                        </a>
                                         @endif
                                          @if(App\Models\Socialsetting::find(1)->l_status == 1)
                                        <a href="{{ App\Models\Socialsetting::find(1)->linkedin }}">
                                            <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                                            <span class="sr-only">{{ __('لينكدإن') }}</span>
                                        </a>
                                          @endif
                                        @if(App\Models\Socialsetting::find(1)->ystatus == 1)
                                        <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" aria-hidden="true">
                                            <i class="fab fa-youtube"></i>
                                            <span class="sr-only">{{ __('يوتيوب') }}</span>
                                        </a>
                                        @endif
                {{-- <a href="https://facebook.com">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="https://twitter.com">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                    <span class="sr-only">Twitter</span>
                </a>
                <a href="https://pinterest.com">
                    <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                    <span class="sr-only">Pinterest</span>
                </a>
                <a href="https://instagram.com">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <span class="sr-only">Instagram</span>
                </a> --}}
            </div><!-- /.mobile-nav__social -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="#">
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="boskery-btn">
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__hover"></span>
                    <span class="boskery-btn__hover"></span>
                    <span class="icon-search"></span>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->
    <aside class="sidebar-one">
        <div class="sidebar-one__overlay sidebar-btn__toggler"></div><!-- /.siderbar-ovarlay -->
        <div class="sidebar-one__content">
            <span class="sidebar-one__close sidebar-btn__toggler"><i class="fa fa-times"></i></span>
            <div class="sidebar-one__logo sidebar-one__item">
                <a href="{{ route('front.index',$sign) }}" aria-label="logo image"><img src="{{ $gs->{'logo_' . $sign} }}" width="100"
                        alt="logo" /></a>
            </div><!-- /.sidebar-one__logo -->
            <div class="sidebar-one__about sidebar-one__item">
                <p class="sidebar-one__about__text"> {{ $gs->{'footer_' . $sign} }}
                </p>
            </div><!-- /.sidebar-one__about -->
            <div class="sidebar-one__info sidebar-one__item">
                <h4 class="sidebar-one__title">{{ __('Contact') }}</h4>
                <ul class="sidebar-one__info__list">
                       @foreach ($addresses as $address)
                    <li><span class="icon-maps-and-flags"></span>
                        <address> {{ $address }} </address>
                    </li>
                           @endforeach
                     @foreach ($emails as $email)
                                        <li><span class="icon-paper-plane"></span> <a
                                                href="mailto:{{ $email }}">{{ $email }}</a>
                                        </li>
                                         @endforeach
                                         @foreach ($phones as $phone)
                                        <li><span class="icon-phone-call"></span> <a href="tel:{{ $phone }}">{{ $phone }}</a></li>
                                           @endforeach
                    {{-- <li><span class="icon-paper-plane"></span> <a
                            href="mailto:needhelp@company.com">needhelp@company.com</a></li>
                    <li><span class="icon-phone-call"></span> <a href="tel:+9156980036420">+91 5698 0036 420</a></li> --}}
                </ul><!-- /.sidebar-one__info__list -->
            </div><!-- /.sidebar-one__info -->
            <div class="sidebar-one__social sidebar-one__item">
                @if(App\Models\Socialsetting::find(1)->f_status == 1)
                                        <a href="{{ App\Models\Socialsetting::find(1)->facebook }}">
                                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            <span class="sr-only">{{ __('فيسبوك') }}</span>
                                        </a>
@endif
  @if(App\Models\Socialsetting::find(1)->t_status == 1) 
                                        <a href="{{ App\Models\Socialsetting::find(1)->twitter }}">
                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                            <span class="sr-only">{{ __('تويتر') }}</span>
                                        </a>
                                         @endif
                                          @if(App\Models\Socialsetting::find(1)->l_status == 1)
                                        <a href="{{ App\Models\Socialsetting::find(1)->linkedin }}">
                                            <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                                            <span class="sr-only">{{ __('لينكدإن') }}</span>
                                        </a>
                                          @endif
                                        @if(App\Models\Socialsetting::find(1)->ystatus == 1)
                                        <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" aria-hidden="true">
                                            <i class="fab fa-youtube"></i>
                                            <span class="sr-only">{{ __('يوتيوب') }}</span>
                                        </a>
                                        @endif
                {{-- <a href="https://facebook.com">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="https://twitter.com">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                    <span class="sr-only">Twitter</span>
                </a>
                <a href="https://linkedin.com">
                    <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                    <span class="sr-only">Linkedin</span>
                </a>
                <a href="https://youtube.com" aria-hidden="true">
                    <i class="fab fa-youtube"></i>
                    <span class="sr-only">Youtube</span>
                </a> --}}
            </div><!-- /sidebar-one__social -->
            <div class="sidebar-one__newsletter sidebar-one__item">
                <label class="sidebar-one__title" for="sidebar-email">{{ __('Newsletter') }}</label>
              
                       <form action="{{ route('front.subscripe.submit') }}" name="appointment"
                                                id="subscribeform" aria-label="subscripe form" data-status="init"
                                                method="POST" autocomplete="off"  data-url="{{ route('front.subscripe.submit') }}" class="sidebar-one__newsletter__inner  ">
                                                {{ csrf_field() }}
                                                <div style="width: 81%;">
                                                        @include('includes.admin.form-both')
                                                   </div>
                    <input type="email" name="email" required id="sidebar-email" class="sidebar-one__newsletter__input"
                        placeholder="Email Address">
                    <button type="submit" class="sidebar-one__newsletter__btn"><span class="icon-email"
                            aria-hidden="true"></span></button>
                </form>
                <div class="mc-form__response"></div><!-- /.mc-form__response -->
            </div><!-- /.sidebar-one__form -->
        </div><!-- /.sidebar__content -->
    </aside><!-- /.sidebar-one -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">{{ __('back top') }}</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    </a>








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
