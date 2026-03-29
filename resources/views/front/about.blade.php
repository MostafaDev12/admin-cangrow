   
   @extends('layouts.front')

@section('title')
   
{{ __('من نحن') }} -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')

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

        <section class="page-header">
            <div class="page-header__bg" style="background-image: linear-gradient(to right, #000000, #ffffff);"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title">{{ __('من نحن') }}</h2>
              
            </div><!-- /.container -->
        </section><!-- /.page-header -->
       
        <!-- /.meat-list -->

        <!-- ------------------------------- -->
       <!-- من نحن -->
        <section class="about-two" id="our-story">
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
                                    <h4 class="about-two__experience__text">{{ __('سنوات من') }} <br> {{ __('الخبرة') }}</h4>
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
                            {{-- <a href="{{ route('about.index',$sign) }}" class="boskery-btn">
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__text">{{ __('تعرف علينا أكثر') }}</span>
                                <i class="icon-meat-3"></i>
                            </a><!-- /.boskery-btn --> --}}
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
    
        <!-- الرؤيا الرسالة والقيم -->
        <section class="about-three section-space" id="vision-mission-values">
            <div class="container">
                <div class="row gutter-y-60">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                        <div class="about-three__image">
                            <img src="{{ $ps->volunteering_photo }}" alt="مجمع تكنولوجيا اللحوم MTC"
                                class="about-three__image__one">
                            {{-- <div class="about-three__image__inner">
                                <img src="{{ asset('front/mtc/') }}/assets/images/about/about-3-2.jpg" alt="منتجات اللحوم"
                                    class="about-three__image__two">
                            </div><!-- /.about-three__image__inner --> --}}
                            <div class="about-three__experience">
                                <div class="about-three__experience__bg"
                                    style="background-image: url({{ site_image('about_shape_3_1') }});"></div>
                                <!-- /.about-three__experience__bg -->
                                <div class="about-three__experience__content">
                                    <div class="about-three__experience__text">
                                        <h4 class="about-three__experience__title">{{ __('سنوات من') }} <br>
                                            {{ __('الخبرة') }}</h4><!-- /.about-three__experience__title -->
                                    </div><!-- /.about-three__experience__text -->
                                    <h4 class="about-three__experience__year">50+</h4>
                                    <!-- /.about-three__experience__year -->
                                </div><!-- /.about-three__experience__content -->
                            </div><!-- /.about-three__experience -->
                        </div><!-- /.about-three__image -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6 wow fadeInRight" data-wow-duration="1500ms">
                        <div class="about-three__content">
                            <div class="sec-title @@extraClassName">

                                <img src="{{ site_image('section_title_shape') }}" alt="الرؤية والرسالة والقيم"
                                    class="sec-title__img">

                                <!-- <h6 class="sec-title__tagline">الرؤية والرسالة والقيم</h6> -->
                                <!-- /.sec-title__tagline -->

                                <h2 class="sec-title__title">{{ __('رؤيتنا ورسالتنا') }} <br> {{ __('نحو مستقبل أفضل') }}</h2>
                                <!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->

                            <div class="vision-mission-values">
                                  @foreach ($processes as $process)
                                <div class="vision-section mb-4">
                                    <h4 class="about-three__info__title mb-2">{!! $process->{'title_' . $sign} ?? '' !!}</h4>
                                    <p class="about-three__text"> {!! $process->{'details_' . $sign} ?? '' !!} </p>
                                </div>
     @endforeach
                                

                                @if($about_values->count() > 0)
                                <div class="values-section">
                                    <h4 class="about-three__info__title mb-2">{{ __('القيم') }}</h4>
                                    <div class="about-three__info">
                                        @foreach ($about_values as $value)
                                        <div class="about-three__info__inner">
                                            <div class="about-three__info__icon">
                                                <span class="{{ $value->icon }}"></span>
                                            </div><!-- /.about-three__info__icon -->
                                            <div class="about-three__info__content">
                                                <h4 class="about-three__info__title">{{ $value->{'title_' . $sign} }}</h4>
                                            </div><!-- /.about-three__info__content -->
                                        </div><!-- /.about-three__info__inner -->
                                        @endforeach
                                    </div><!-- /.about-three__info -->
                                </div>
                                @endif
                            </div>

                            <div class="about-three__bottom">
                                <a href="{{ route('contact.index',$sign) }}" class="boskery-btn">
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__text">{{ __('تواصل معنا') }}</span>
                                    <i class="icon-meat-3"></i>
                                </a><!-- /.boskery-btn -->
                            </div><!-- /.about-three__bottom -->
                        </div><!-- /.about-three__content -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
            <div class="about-three__shape">
                <img src="{{ site_image('about_shape_2_1') }}" alt="about shape" class="about-three__shape-one">
                <div class="about-three__shape__image wow fadeInLeft" data-wow-duration="1500ms">
                    <img src="{{ site_image('about_shape_2_2') }}" alt="about shape">
                </div><!-- /.about-three__shape__image -->
            </div><!-- /.about-three__shape -->
        </section><!-- /.about-three section-space -->

        <!-- لماذا MTC -->
     
        <section class="about-one section-space-top"  id="why-mtc">
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
                            <img src="{{ site_image('about_shape_1_1') }}" alt="about shape"
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
                                <h2 class="sec-title__title">{{ __('لماذا MTC') }}</h2>
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
                                    <span class="boskery-btn__text">{{ __('تواصل معنا') }}</span>
                                    <i class="icon-meat-3"></i>
                                </a>

                                <div class="contact__info">
                                    <div class="contact__info__inner">
                                        <div class="contact__info__icon">
                                            <span class="icon-telephone"></span>
                                        </div>
                                        <div class="contact__info__right">
                                            <h4 class="contact__info__title">{{ __('اتصل بنا') }}</h4>
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


        <!-- الإنجازات -->
        <section class="counter-one section-space">
            <div class="counter-one__bg boskery-jarallax" data-jarallax data-speed="0.3"
                style="background-image: url({{ site_image('counter_bg') }});"></div>
            <!-- /.counter-one__bg -->
            <div class="container">
                <div class="counter-one__wrapper">
    @foreach ($timelines as $timeline)
                    <div class="counter-one__item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <div class="counter-one__item__inner">
                            <div class="counter-one__box count-box">
                                <h3 class="counter-one__count-text count-text"  >{{ $timeline->year ?? 0 }}</h3>
                            </div><!-- /.counter-one__box -->
                            <h4 class="counter-one__title">    {{ $timeline->{'title_' . $sign} ?? '' }}  </h4><!-- /.counter-one__title -->
                        </div><!-- /.counter-one__item__inner -->
                    </div><!-- /.counter-one__item -->
@endforeach
                   
                </div><!-- /.counter-one__wrapper -->
            </div><!-- /.container -->
        </section><!-- /.counter-one section-space -->

        <!-- شركاء النجاح -->
        <section class="client-carousel client-carousel--two" id="success-partners" style="padding-top: 143px;">
            <div class="container">
                <div class="sec-title text-center mb-5">
                    <img src="{{ site_image('section_title_shape') }}" alt="شركاء النجاح" class="sec-title__img">
                    <!-- <h6 class="sec-title__tagline">شركاء النجاح</h6> -->
                    <h2 class="sec-title__title"> {{ __('شركاء النجاح') }}
                    </h2>
                </div>

                <div class="client-carousel__one boskery-owl__carousel boskery-owl__carousel--basic-nav owl-carousel owl-theme"
                    data-owl-options='{
            "items": 1,
            "margin": 0,
            "loop": true,
            "smartSpeed": 700,
            "nav": false,
            "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
            "dots": false,
            "autoplay": true,
            "responsive": {
                "0":{
                    "items": 2,
                    "margin": 50
                },
                "500":{
                    "items": 3,
                    "margin": 70
                },
                "768":{
                    "items": 4,
                    "margin": 70
                },
                "992":{
                    "items": 5,
                    "margin": 100
                },
                "1200":{
                    "items": 5,
                    "margin": 150
                }
            }
        }'>
          @foreach ($partners as $partner) 
                    <div class="client-carousel__one__item">
                        <img src="{{ $partner->photo }}" alt=" {{ $partner->{'title_' . $sign} ?? '' }}      ">
                        <p class="partner-name"> {{ $partner->{'title_' . $sign} ?? '' }}  </p>
                    </div><!-- /.owl-slide-item-->
 @endforeach

                   
                </div><!-- /.thm-owl__slider -->


            </div><!-- /.container -->
        </section>
     @stop