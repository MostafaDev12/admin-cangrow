  @extends('layouts.front')

 @section('title')

     {{ $gs->{'title_' . $sign} }}

 @stop

 @section('gsearch')
     <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
 @stop


 @section('content')
     @php
         $phones = explode(',', $gs->phones);
         $emails = explode(',', $gs->emails);
         $addresses = json_decode($gs->{'addresses_' . $sign});

         $randomAddress = Arr::random($addresses);
         $randomPhone = Arr::random($phones);
         $randomEmail = Arr::random($emails);
     @endphp


        <section class="hero-slider-two" id="home">
            <div class="hero-slider-two__carousel boskery-owl__carousel boskery-owl__carousel--basic-nav owl-carousel"
                data-owl-options='{
		"loop": true,
		"animateIn": "fadeIn",
		"animateOut": "slideOutDown",
		"items": 1,
		"autoplay": true,
		"autoplayTimeout": 7000,    
		"smartSpeed": 1000,
		"nav": true,
        "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
		"dots": false,
		"margin": 0
	    }'>
         @foreach ($sliders as $slider)
                <div class="item">
                    <div class="hero-slider-two__item">
                        <div class="hero-slider-two__bg"
                            style="background-image: url({{ $slider->{'photo'} ?? '' }});"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xxl-12 col-xl-10 col-lg-10 mx-auto">
                                    <div class="hero-slider-two__content">
                                        <h5 class="hero-slider-two__sub-title">
                                          {!! $slider->{'title_' . $sign} ?? '' !!}
                                            <span
                                                class="hero-slider-two__sub-title__border hero-slider-two__sub-title__border--left"></span>
                                            <span
                                                class="hero-slider-two__sub-title__border hero-slider-two__sub-title__border--right"></span>
                                        </h5><!-- /.slider-sub-title -->
                                        <h2 class="hero-slider-two__title">
                                         {!! $slider->{'details_' . $sign} ?? '' !!}

                                        </h2><!-- /.slider-title -->
                                        <div class="hero-slider-two__btn">
                                            <a href="{{ route('contact.index',$sign) }}" class="boskery-btn">
                                                <span class="boskery-btn__hover"></span>
                                                <span class="boskery-btn__hover"></span>
                                                <span class="boskery-btn__hover"></span>
                                                <span class="boskery-btn__hover"></span>
                                                <span class="boskery-btn__hover"></span>
                                                <span class="boskery-btn__hover"></span>
                                                <span class="boskery-btn__text">{{ __('اتصل بنا الآن') }}</span>
                                                <i class="icon-meat-3"></i>
                                            </a><!-- slider-btn -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.slider-item -->
          @endforeach
            </div>
        </section><!-- /.hero-slider-two -->

        <section class="meat-list meat-list-two">
            <div class="meat-list-two__inner">
                <div class="meat-list-two__wrapper">
                    <div class="container">
                        <div class="flex-col flex md:flex-row !items-center !justify-between !w-auto"
                            data-owl-options='{
                    "items": 1,
                    "margin": 0,
                    "loop": true,
                    "autoplay": true,
                    "smartSpeed": 700,
                    "nav": false,
                    "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
                    "dots": true,
                    "responsive": {
                        "0": {
                            "items": 1,
                            "nav": true,
                            "dots": false,
                            "margin": 10
                        },
                        "361": {
                            "items": 2,
                            "nav": true,
                            "dots": false,
                            "margin": 40
                        },
                        "576": {
                            "items": 3,
                            "margin": 40
                        },
                        "768": {
                            "items": 4,
                            "margin": 40
                        },
                        "992": {
                            "items": 5,
                            "margin": 60
                        },
                        "1200": {
                            "items": 6,
                            "loop": false,
                            "autoplay": false,
                            "dots": false,
                            "margin": 60
                        },
                        "1400": {
                            "items": 6,
                            "loop": false,
                            "autoplay": false,
                            "dots": false,
                            "margin": 80
                        },
                        "1600": {
                            "items": 6,
                            "loop": false,
                            "autoplay": false,
                            "dots": false,
                            "margin": 101
                        }
                    }
                }'>
                        @foreach ($categories as $k=>$category)
                            
                        
                            <div class="meat-list__item item wow fadeInUp !w-auto" data-wow-duration="1500ms"
                                data-wow-delay="{{ $k }}00ms">
                                <div class="meat-list__icon">
                                    <span class="icon-bull"></span>
                                </div><!-- /.meat-list__icon -->
                                <h6 class="meat-list__title">    {!! $category->{'title_' . $sign} ?? '' !!} </h6><!-- /.meat-list__title -->
                            </div><!-- /.meat-list__item item -->
                             


                        @endforeach
                        </div><!-- /.meat-list__carousel -->
                    </div><!-- /.container -->
                </div><!-- /.meat-list-two__wrapper -->
            </div><!-- /.meat-list__inner -->
        </section><!-- /.meat-list -->

        <!-- ------------------------------- -->
        <!-- من نحن -->
        <section class="about-two" id="about">
            <div class="container">
                <div class="row gutter-y-60">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                        <div class="about-two__image">
                            <img src="{{ site_image('about_image_2') }}" alt="مجمع تكنولوجيا اللحوم MTC"
                                class="about-two__image__one">
                            <img src="{{ $ps->about_photo }}" alt="منتجات اللحوم الطازجة"
                                class="about-two__image__two">
                            <div class="about-two__experience">
                                <div class="about-two__experience__bg"
                                    style="background-image: url({{ site_image('about_experience_bg') }});">
                                </div><!-- /.about-two__experience__bg -->
                                <div class="about-two__experience__content">
                                    <div class="about-two__experience__box count-box relative"
                                        style="position: relative;">
                                        <div class="">
                                            <img class="!h-[100px] !w-[100px]" src="{{ site_image('about_experience_logo') }}"
                                                width="50" height="50" />
                                        </div>
                                        <h3 class="about-two__experience__year">+</h3>
                                    </div><!-- /.about-two__experience__box -->
                                    <h4 class="about-two__experience__text">{{ __('سنوات من') }}<br> {{ __('الخبرة') }}</h4>
                                    <!-- /.about-two__experience__text -->
                                </div><!-- /.about-two__experience__content -->
                            </div><!-- /.about-two__experience -->
                        </div><!-- /.about-two__image -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6 wow fadeInRight" data-wow-duration="1500ms">
                        <div class="about-two__content">
                            <div class="sec-title @@extraClassName">

                                <img src="{{ site_image('section_title_shape') }}" alt="عن مجمع تكنولوجيا اللحوم MTC"
                                    class="sec-title__img">

                                <!-- <h6 class="sec-title__tagline">عن مجمع تكنولوجيا اللحوم MTC</h6> -->
                                <!-- /.sec-title__tagline -->

                                <h2 class="sec-title__title">      {{ $ps->{'about_title_' . $sign} ?? '' }}    </h2><!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <p class="about-two__text">    {!! $ps->{'about_details_' . $sign} ?? '' !!} <p>
                            <!-- /.about-two__text -->
                            <div class="about-two__inner">


                                @foreach ($about_features as $feature)
                                <div class="about-two__info">
                                    <div class="about-two__info__icon">
                                        <span class="{{ $feature->icon }}"></span>
                                    </div><!-- /.about-two__info__icon -->
                                    <div class="about-two__info__content">
                                        <h4 class="about-two__info__title">{{ $feature->{'title_' . $sign} }}</h4>
                                    </div><!-- /.about-two__info__content -->
                                </div><!-- /.about-two__info -->
                                @endforeach


                            </div><!-- /.about-two__inner -->
                            <ul class="about-two__list">
                                 @foreach ($points as $point)
                              
                                <li>
                                    <span class="icon-check"></span>
                                    {!! $point->{'title_' . $sign} ?? '' !!}
                                </li>
                                  @endforeach 
                               
                            </ul><!-- /.about-two__list -->
                            <a href="{{ route('about.index',$sign) }}" class="boskery-btn">
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__text">{{ __('تعرف علينا أكثر') }}</span>
                                <i class="icon-meat-3"></i>
                            </a><!-- /.boskery-btn -->
                        </div><!-- /.about-two__content -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
            <div class="about-two__shape">
                <div class="about-two__shape__image wow fadeInRight" data-wow-duration="1500ms">
                    <img src="{{ site_image('about_shape_2_1') }}" alt="about-shape">
                </div><!-- /.about-two__shape__image -->
                <img src="{{ site_image('about_shape_2_2') }}" alt="about-shape"
                    class="about-two__shape__two wow fadeInLeft" data-wow-duration="1500ms">
            </div><!-- /.about-two__shape -->
        </section><!-- /.about-two -->
    
        <section class="about-one section-space-top" id="about">
            <div class="container">
                <div class="row gutter-y-60">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                        <div class="about-one__image">
                            <div class="about-one__image__inner">
                                <h3 class="about-one__image__text">{{ __('لماذا MTC') }}</h3>
                                <img src="{{ site_image('about_image_1') }}" alt="about image">
                                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="video-button video-popup">
                                    <span class="icon-play"></span>
                                    <i class="video-button__ripple"></i>
                                </a>
                                <div class="about-one__image__border"></div>
                            </div>
                            <img src="{{ $ps->portfolio_photo }}" alt="about shape"
                                class="about-one__image__shape">
                        </div>
                    </div>

                    <div class="col-lg-6 wow fadeInRight" data-wow-duration="1500ms">
                        <div class="about-one__content">
                            <div class="sec-title @@extraClassName">

                                <img src="{{ site_image('section_title_shape') }}" alt="about boskery meat shop"
                                    class="sec-title__img">

                                <!-- <h6 class="sec-title__tagline"></h6> -->

                                <!-- <h2 class="sec-title__title">نقاط تميزنا</h2> -->
                                <h2 class="sec-title__title"> {{ __('لماذا MTC') }}</h2>
                            </div>

                            <p class="about-one__text">
                                {!! $ps->{'portfolio_details_' . $sign}  ?? '' !!} 
                            </p>

                            <div class="about-one__inner">
                                <h5 class="about-one__info-title">{{ __('أهم مميزاتنا') }}</h5>

                                <ul class="about-one__info">
                                    @foreach ($about_visions as $point)
                     
                                    <li><span class="icon-check-mark"></span>  {!! $point->{'title_' . $sign} ?? '' !!}    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="about-one__bottom">
                                <a href="{{ route('contact.index',$sign) }}" class="boskery-btn">
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__text">  {{ __('تواصل معنا') }}</span>
                                    <i class="icon-meat-3"></i>
                                </a>

                                <div class="contact__info">
                                    <div class="contact__info__inner">
                                        <div class="contact__info__icon">
                                            <span class="icon-telephone"></span>
                                        </div>
                                        <div class="contact__info__right">
                                            <h4 class="contact__info__title"> {{ __('اتصل بنا') }}</h4>
                                            <a href="tel:{{ $randomPhone}}" class="contact__info__number">
                                             {{ $randomPhone}}
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="about-one__shape">
                <img src="{{ site_image('about_shape_1_2') }}" alt="about shape" class="about-one__shape__one">
                <img src="{{ site_image('about_shape_1_3') }}" alt="about shape" class="about-one__shape__two">
            </div>
        </section>

        <!-- المنجات -->
        <!-- المنتجات -->
    @include('includes.form')
@stop