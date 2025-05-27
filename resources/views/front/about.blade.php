 @extends('layouts.front')

@section('title')
   
{{ __('About Us') }} -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')

 <link rel='stylesheet' id='swiper-css' href='{{ asset('front/sinai_clinic/') }}/css/swiper.min.css?ver=8.4.5' type='text/css' media='all' />
<link rel='stylesheet' id='e-swiper-css' href='{{ asset('front/sinai_clinic/') }}/css/e-swiper.min.css?ver=3.28.3' type='text/css' media='all' />
<link rel='stylesheet' id='widget-image-carousel-css' href='{{ asset('front/sinai_clinic/') }}/css/widget-image-carousel.min.css?ver=3.28.3' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-45-css' href='{{ asset('front/sinai_clinic/') }}/css/post-45.css?ver=1746044568' type='text/css' media='all' />
 <link rel='stylesheet' id='labout-funfact-css' href='{{ asset('front/sinai_clinic/') }}/css/funfact.css?ver=6.7.2' type='text/css' media='all' />
@stop
@section('content')

<!-- main-content -->
<main class="main-content alternat-2">


    <!-- page-title -->
    <section class="page-title centred">
        <div class="bg-layer"
            style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/page-title-5.jpg');">
        </div>
        <div class="auto-container">
            <div class="content-box">
                <h2>{{ __('About Us') }}</h2>
                <ul class="bread-crumb">
                    <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('About Us') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->

    <div data-elementor-type="wp-page" data-elementor-id="45" class="elementor elementor-45"
        data-elementor-post-type="page">
        <div class="elementor-element elementor-element-9ca604e e-con-full e-flex e-con e-parent" data-id="9ca604e"
            data-element_type="container">
            <div class="elementor-element elementor-element-992fb79 elementor-widget elementor-widget-labout_about_us"
                data-id="992fb79" data-element_type="widget" data-widget_type="labout_about_us.default">
                <div class="elementor-widget-container">


                    <!-- about-style-two -->
                    <section class="about-style-two pt_120 pb_120">
                        <div class="pattern-layer">
                            <div class="pattern-2"
                                style="background-image: url({{ asset('front/sinai_clinic/') }}/img/shape-14.webp);">
                            </div>
                        </div>
                        <div class="auto-container">
                            <div class="row">


                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="content_block_one">
                                        <div class="content-box mt_25 mr_70 sec-title-animation animation-style2">
                                            <div class="sec-title mb_25">
                                                <span class="sub-title mb_20 title-animation">{{ __('About Us') }}</span>
                                                <h2 class="title-animation">  {{ $ps->{'about_title_' . $sign} ?? '' }} </h2>
                                            </div>
                                            <div class="text-box mb_45 title-animation">
                                                <p>{!! $ps->{'about_details_' . $sign} ?? '' !!}</p>
                                            </div>
                                            <div class="btn-box">
                                                <a href="{{ route('contact.index') }}"
                                                    class="theme-btn">{{ __('Contact Us') }}<span></span><span></span><span></span><span></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <div class="image_block_two">
                                        <div class="image-inner">
                                            <div class="image-shape">
                                                <div class="shape-1"
                                                    style="background-image: url({{ asset('front/sinai_clinic/') }}/img/shape-12.webp);">
                                                </div>
                                                <div class="shape-2"
                                                    style="background-image: url({{ asset('front/sinai_clinic/') }}/img/shape-12.webp);">
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                                    <div class="image-box">
                                                        <figure class="image mb_30"><img decoding="async"
                                                                src="{{ $ps->portfolio_photo }}"
                                                                alt="azure-sardine-328383.hostingersite.com"></figure>
                                                        <div class="experience-box bounce-slide">
                                                            <div class="inner p_relative pt_5 pb_5">
                                                                <h2>{{ __('10') }}<span>{{ __('Years') }}</span></h2>
                                                                <h3>{{ __('Of Experience in the Finance Service') }}</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                                    <figure class="image pt_100 mt_15"><img decoding="async"
                                                            src="{{ $ps->about_photo }}"
                                                            alt="azure-sardine-328383.hostingersite.com"></figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- about-style-two end -->


                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-45b7e10 e-con-full e-flex e-con e-parent" data-id="45b7e10"
            data-element_type="container">
            <div class="elementor-element elementor-element-c4d19f2 elementor-widget elementor-widget-labout_funfacts"
                data-id="c4d19f2" data-element_type="widget" data-widget_type="labout_funfacts.default">
                <div class="elementor-widget-container">


                    <!-- funfact-style-two -->
                    <section class="funfact-style-two pt_130 pb_120">
                        <div class="bg-layer parallax-bg" data-parallax='{"y": 100}'
                            style="background-image: url({{ asset('front/sinai_clinic/') }}/img/funfact-bg-2.webp);">
                        </div>
                        <div class="pattern-layer">
                            <div class="pattern-1"
                                style="background-image: url({{ asset('front/sinai_clinic/') }}/img/shape-28.webp);">
                            </div>
                            <div class="pattern-2"
                                style="background-image: url({{ asset('front/sinai_clinic/') }}/img/shape-29.webp);">
                            </div>
                        </div>
                        <div class="auto-container">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                                    <div class="funfact-block-one">
                                        <div class="inner-box">
                                            <div class="icon-box">
                                                <i class=" icon-8"></i>
                                            </div>
                                            <div class="count-outer count-box" style="display: block;">
                                                <span class="odometer" data-count="{{ __('320') }}">00</span><span>+</span>
                                            </div>
                                            <p>{{ __('Patient safety') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                                    <div class="funfact-block-one">
                                        <div class="inner-box">
                                            <div class="icon-box">
                                                <i class=" icon-9"></i>
                                            </div>
                                            <div class="count-outer count-box" style="display: block;">
                                                <span class="odometer" data-count="{{ __('94') }}">00</span><span>k+</span>
                                            </div>
                                            <p>{{ __('Tasks Completed') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                                    <div class="funfact-block-one">
                                        <div class="inner-box">
                                            <div class="icon-box">
                                                <i class=" icon-10"></i>
                                            </div>
                                            <div class="count-outer count-box" style="display: block;">
                                                <span class="odometer" data-count="{{ __('50') }}">00</span><span>k+</span>
                                            </div>
                                            <p>{{ __('Worldwide Users') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                                    <div class="funfact-block-one">
                                        <div class="inner-box">
                                            <div class="icon-box">
                                                <i class=" icon-11"></i>
                                            </div>
                                            <div class="count-outer count-box" style="display: block;">
                                                <span class="odometer" data-count="{{ __('45') }}">00</span><span>k+</span>
                                            </div>
                                            <p>{{ __('Projects Completed') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- funfact-style-two end -->

                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-a2673e5 e-con-full e-flex e-con e-parent" data-id="a2673e5"
            data-element_type="container">
            <div class="elementor-element elementor-element-7abf430 elementor-widget elementor-widget-labout_feature_services"
                data-id="7abf430" data-element_type="widget" data-widget_type="labout_feature_services.default">
                <div class="elementor-widget-container">


                    <!-- working-style-two -->
                    <section class="working-style-two about-page centred pt_120 pb_110">
                        <div class="auto-container">
                            <div class="sec-title mb_70 sec-title-animation animation-style2">
                                <span class="sub-title mb_20 title-animation">{{ __('Our Process') }}</span>
                                <h2 class="title-animation">{{ __('How We Work') }}</h2>
                            </div>
                            <div class="lower-content">
                                <div class="row clearfix">
                                   @foreach ($processes as $k => $process)
                                    <div class="col-lg-4 col-md-6 col-sm-12 working-block">
                                        <div class="working-block-two">
                                            <div class="inner-box">
                                                @if (($k % 3 != 2) && ($k != count($processes) - 1))
                                                    <div class="shape"
                                                        style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/shape-16.webp');">
                                                    </div>
                                                @endif

                                                <div class="icon-box">
                                                    <div class="r-hex">
                                                        <div class="r-hex-inner"></div>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="icon-{{ rand(25,29) }}"></i>
                                                    </div>
                                                </div>
                                                <h3>
                                                    <a href="#">{{ $process->{'title_' . $sign} ?? '' }}</a>
                                                </h3>
                                                <p>{{ $process->{'details_' . $sign} ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                 
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- working-style-two end -->


                </div>
            </div>
            {{-- <div class="elementor-element elementor-element-cae3cdd elementor-widget elementor-widget-labout_feature_services"
                data-id="cae3cdd" data-element_type="widget" data-widget_type="labout_feature_services.default">
                <div class="elementor-widget-container">


                    <!-- working-style-two -->
                    <section class="working-style-two about-page centred pt_120 pb_110">
                        <div class="pattern-layer">
                            <div class="pattern-2"
                                style="background-image: url('https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/shape-11.png');">
                            </div>
                        </div>
                        <div class="auto-container">
                            <div class="lower-content">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-6 col-sm-12 working-block">
                                        <div class="working-block-two">
                                            <div class="inner-box">
                                                <div class="shape"
                                                    style="background-image: url('https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/shape-16.png');">
                                                </div>

                                                <div class="icon-box">
                                                    <div class="r-hex">
                                                        <div class="r-hex-inner"></div>
                                                    </div>
                                                    <div class="icon">
                                                        <i class=" icon-26"></i>
                                                    </div>
                                                </div>
                                                <h3><a
                                                        href="https://azure-sardine-328383.hostingersite.com/service/lab-start-testing/">MODERN
                                                        FACILITIES</a></h3>
                                                <p>The hospital has modern facilities equipped with the latest medical
                                                    technologies, such as modern operating rooms, waiting rooms, special
                                                    rooms, and advanced medical equipment.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 working-block">
                                        <div class="working-block-two">
                                            <div class="inner-box">
                                                <div class="shape"
                                                    style="background-image: url('https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/shape-16.png');">
                                                </div>

                                                <div class="icon-box">
                                                    <div class="r-hex">
                                                        <div class="r-hex-inner"></div>
                                                    </div>
                                                    <div class="icon">
                                                        <i class=" icon-25"></i>
                                                    </div>
                                                </div>
                                                <h3><a
                                                        href="https://azure-sardine-328383.hostingersite.com/service/client-briefs-project/">ATTENTION
                                                        TO INTERNATIONAL PATIENTS</a></h3>
                                                <p>Sinaiclinic hospital has extensive experience in caring for
                                                    international patients, providing translation, international manual
                                                    drive and accommodation facilities for patients who want to stay for
                                                    a long time.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 working-block">
                                        <div class="working-block-two">
                                            <div class="inner-box">

                                                <div class="icon-box">
                                                    <div class="r-hex">
                                                        <div class="r-hex-inner"></div>
                                                    </div>
                                                    <div class="icon">
                                                        <i class=" icon-27"></i>
                                                    </div>
                                                </div>
                                                <h3><a
                                                        href="https://azure-sardine-328383.hostingersite.com/service/reports-delivered/">PROVIDING
                                                        MEDICINES</a></h3>
                                                <p>High-quality pharmaceutical preparations and medical materials are
                                                    supplied at the hospital and provided at affordable prices.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- working-style-two end -->


                </div>
            </div> --}}
        </div> 

    @foreach ($timelines as $k=>$timeline)
        <div class="elementor-element elementor-element-abe0768 e-con-full e-flex e-con e-parent" data-id="abe0768"
            data-element_type="container">
            <div class="elementor-element elementor-element-1d50db3 elementor-widget elementor-widget-labout_history_widget"
                data-id="1d50db3" data-element_type="widget" data-widget_type="labout_history_widget.default">
                <div class="elementor-widget-container">


                    <!-- history-section -->
                    <section class="history-section">
                        <div class="auto-container">
                            <div class="sec-title centred mb_70 sec-title-animation animation-style2">
                             @if ($k == 0)
                                  <span class="sub-title mb_20 title-animation">{{ __('History') }}</span>
                             @endif  
                                <h2 class="title-animation">{{ $timeline->year }}: {{ $timeline->{'title_' . $sign}  ?? ''}}</h2>
                            </div>
                            <div class="inner-container p_relative">
                                <div class="border-line"></div>
                                <div class="inner-box p_relative mb_80">
                                    <figure class="image-box"><img decoding="async"
                                            src="{{ $timeline->photo_url }}"
                                            alt="azure-sardine-328383.hostingersite.com"></figure>
                                    <span class="year">{{ $timeline->year }}</span>
                                    <div class="content-box">
                                        <h3><a
                                                href="#">{{ $timeline->{'title_' . $sign}  ?? ''}}</a></h3>
                                        <p>{{ $timeline->{'details_' . $sign}  ?? ''}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- history-section end -->


                </div>
            </div>
        </div>
    @endforeach  
    
    
        <div class="elementor-element elementor-element-1afc557 e-con-full e-flex e-con e-parent" data-id="1afc557"
            data-element_type="container">
            <div class="elementor-element elementor-element-ea56442 elementor-align-center elementor-widget elementor-widget-button"
                data-id="ea56442" data-element_type="widget" data-widget_type="button.default">
                <div class="elementor-widget-container">
                    <div class="elementor-button-wrapper">
                        <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                            <span class="elementor-button-content-wrapper">
                                <span class="elementor-button-text">{{ __('Our Reviews') }}</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-309f638 elementor-widget elementor-widget-heading"
                data-id="309f638" data-element_type="widget" data-widget_type="heading.default">
                <div class="elementor-widget-container">
                    <h2 class="elementor-heading-title elementor-size-default">{{ __('FROM INSIDE SINAICLINIC') }}
                    </h2>
                </div>
            </div>
            <div class="elementor-element elementor-element-ee1c68d elementor-pagination-position-outside elementor-widget elementor-widget-image-carousel"
                data-id="ee1c68d" data-element_type="widget"
                data-settings="{&quot;slides_to_show&quot;:&quot;4&quot;,&quot;navigation&quot;:&quot;dots&quot;,&quot;image_spacing_custom&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:13,&quot;sizes&quot;:[]},&quot;autoplay&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;infinite&quot;:&quot;yes&quot;,&quot;speed&quot;:500,&quot;image_spacing_custom_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;image_spacing_custom_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}"
                data-widget_type="image-carousel.default">
                <div class="elementor-widget-container">
                    <div class="elementor-image-carousel-wrapper swiper" role="region"
                        aria-roledescription="carousel" aria-label="Image Carousel" dir="ltr">
                        <div class="elementor-image-carousel swiper-wrapper" aria-live="off">
                           
                              @foreach ($certificates as $k=>$image)
                            <div class="swiper-slide" role="group" aria-roledescription="slide"
                                aria-label="{{ $k + 1 }} of {{ count($certificates) }}">
                                <figure class="swiper-slide-inner"><img decoding="async" class="swiper-slide-image"
                                        src="{{ $image->photo }}"
                                        alt="1" /></figure>
                            </div>
                        @endforeach
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-48b4903 e-con-full e-flex e-con e-parent" data-id="48b4903"
            data-element_type="container">
            <div class="elementor-element elementor-element-943f093 elementor-align-center elementor-widget elementor-widget-button"
                data-id="943f093" data-element_type="widget" data-widget_type="button.default">
                <div class="elementor-widget-container">
                    <div class="elementor-button-wrapper">
                        <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                            <span class="elementor-button-content-wrapper">
                                <span class="elementor-button-text">{{ __('Our Partners') }}</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-e4af9a7 elementor-widget elementor-widget-heading"
                data-id="e4af9a7" data-element_type="widget" data-widget_type="heading.default">
                <div class="elementor-widget-container">
                    <h2 class="elementor-heading-title elementor-size-default">{{ __('COMPANIES CONTRACTING WITH SINAICLINIC') }}
                    </h2>
                </div>
            </div>
            <div class="elementor-element elementor-element-83f507e elementor-widget elementor-widget-labout_clients"
                data-id="83f507e" data-element_type="widget" data-widget_type="labout_clients.default">
                <div class="elementor-widget-container">



                    <!-- clients-section -->
                    <section class="clients-section">
                        <div class="outer-container">
                            <div class="clients-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">

                                  @foreach ($partners as $partner)
                                
                               
                                <figure class="clients-logo"><a href="#"><img decoding="async"
                                            src="{{ $partner->photo }}"
                                            alt="azure-sardine-328383.hostingersite.com"></a></figure>

                                @endforeach
                                
                            </div>
                        </div>
                    </section>
                    <!-- clients-section end -->

                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-5649c1a e-con-full e-flex e-con e-parent" data-id="5649c1a"
            data-element_type="container">
            <div class="elementor-element elementor-element-ad5f440 elementor-widget elementor-widget-labout_testimonials_carousel"
                data-id="ad5f440" data-element_type="widget" data-widget_type="labout_testimonials_carousel.default">
                <div class="elementor-widget-container">



                    <!-- testimonial-section -->
                    <section class="testimonial-section pt_120 pb_120">
                        <div class="auto-container">
                            <div class="sec-title centred mb_70 sec-title-animation animation-style2">
                                <span class="sub-title mb_20 title-animation">{{ __('Testimonials') }}</span>
                                <h2 class="title-animation">{{ __('Love from Clients') }}</h2>
                            </div>
                            <div class="two-item-carousel owl-carousel owl-theme dots-style-one owl-nav-none">
                               
                              @foreach ($testimonials as $testimonial)
                                 @php
                                                           $photo = $testimonial->photo ? $testimonial->photo_url : asset('assets/images/noimage.png');
                                                          
                                                        @endphp
                                      <div class="testimonial-block-one">
                                         <div class="inner-box">
                                             <div class="icon-box">
                                                 <div class="r-hex">
                                                     <div class="r-hex-inner"></div>
                                                 </div>
                                                 <div class="icon"><i class="icon-35"></i></div>
                                             </div>
                                             <p > {{ $testimonial->{'details_' . $sign}  ?? ''}}     </p>
                                             <div class="lower-box">
                                                 <div class="author-box">
                                                     <figure class="thumb-box">
                                                         <img loading="lazy" decoding="async" width="70"
                                                             height="70"
                                                             src="{{ $photo }}"
                                                             class="attachment-labout_70x70 size-labout_70x70 wp-post-image"
                                                             alt="{{ $testimonial->{'name_' . $sign}  ?? ''}}"
                                                             srcset="{{ $photo }} 70w, {{ $photo }} 90w, {{ $photo }} 97w, {{ $photo }} 120w"
                                                             sizes="(max-width: 70px) 100vw, 70px" />
                                                     </figure>
                                                     <h3>{{ $testimonial->{'name_' . $sign}  ?? ''}}</h3>
                                                     <span class="designation">{{ $testimonial->{'job_' . $sign}  ?? ''}}</span>
                                                 </div>
                                                 <ul class="rating">
                                                     <li><i class="fas fa-star"></i></li>
                                                     <li><i class="fas fa-star"></i></li>
                                                     <li><i class="fas fa-star"></i></li>
                                                     <li><i class="fas fa-star"></i></li>
                                                     <li><i class="fas fa-star"></i></li>
                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                    
                                    @endforeach
                            </div>
                        </div>
                    </section>
                    <!-- testimonial-section end -->


                </div>
            </div>
        </div>
    </div>


    <div class="clearfix"></div>


</main>
<!-- main-content end -->

@stop

 @section('js')
 <script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/swiper.min.js?ver=8.4.5" id="swiper-js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.swiper', {
            slidesPerView: 4,
            spaceBetween: 13,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                480: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                1025: { slidesPerView: 4 }
            }
        });
    });
</script>
 <script>
 

    (function(body) {
        'use strict';
        body.className = body.className.replace(/\btribe-no-js\b/, 'tribe-js');
    })(document.body);
</script>
<script>
    (function() {
        function maybePrefixUrlField() {
            const value = this.value.trim()
            if (value !== '' && value.indexOf('http') !== 0) {
                this.value = 'http://' + value
            }
        }

        const urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]')
        for (let j = 0; j < urlFields.length; j++) {
            urlFields[j].addEventListener('blur', maybePrefixUrlField)
        }
    })();
</script>
<script>
    /* <![CDATA[ */
    var tribe_l10n_datatables = {
        "aria": {
            "sort_ascending": ": activate to sort column ascending",
            "sort_descending": ": activate to sort column descending"
        },
        "length_menu": "Show _MENU_ entries",
        "empty_table": "No data available in table",
        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
        "info_empty": "Showing 0 to 0 of 0 entries",
        "info_filtered": "(filtered from _MAX_ total entries)",
        "zero_records": "No matching records found",
        "search": "Search:",
        "all_selected_text": "All items on this page were selected. ",
        "select_all_link": "Select all pages",
        "clear_selection": "Clear Selection.",
        "pagination": {
            "all": "All",
            "next": "Next",
            "previous": "Previous"
        },
        "select": {
            "rows": {
                "0": "",
                "_": ": Selected %d rows",
                "1": ": Selected 1 row"
            }
        },
        "datepicker": {
            "dayNames": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            "dayNamesShort": ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            "dayNamesMin": ["S", "M", "T", "W", "T", "F", "S"],
            "monthNames": ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                "October", "November", "December"
            ],
            "monthNamesShort": ["January", "February", "March", "April", "May", "June", "July", "August",
                "September", "October", "November", "December"
            ],
            "monthNamesMin": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            "nextText": "Next",
            "prevText": "Prev",
            "currentText": "Today",
            "closeText": "Done",
            "today": "Today",
            "clear": "Clear"
        }
    }; /* ]]> */
</script>
<script>
    const lazyloadRunObserver = () => {
        const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
        const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    let lazyloadBackground = entry.target;
                    if (lazyloadBackground) {
                        lazyloadBackground.classList.add('e-lazyloaded');
                    }
                    lazyloadBackgroundObserver.unobserve(entry.target);
                }
            });
        }, {
            rootMargin: '200px 0px 200px 0px'
        });
        lazyloadBackgrounds.forEach((lazyloadBackground) => {
            lazyloadBackgroundObserver.observe(lazyloadBackground);
        });
    };
    const events = [
        'DOMContentLoaded',
        'elementor/lazyload/observe',
    ];
    events.forEach((event) => {
        document.addEventListener(event, lazyloadRunObserver);
    });
</script>
 
<script type="text/javascript" id="elementor-frontend-js-before">
    /* <![CDATA[ */
    var elementorFrontendConfig = {
        "environmentMode": {
            "edit": false,
            "wpPreview": false,
            "isScriptDebug": false
        },
        "i18n": {
            "shareOnFacebook": "Share on Facebook",
            "shareOnTwitter": "Share on Twitter",
            "pinIt": "Pin it",
            "download": "Download",
            "downloadImage": "Download image",
            "fullscreen": "Fullscreen",
            "zoom": "Zoom",
            "share": "Share",
            "playVideo": "Play Video",
            "previous": "Previous",
            "next": "Next",
            "close": "Close",
            "a11yCarouselPrevSlideMessage": "Previous slide",
            "a11yCarouselNextSlideMessage": "Next slide",
            "a11yCarouselFirstSlideMessage": "This is the first slide",
            "a11yCarouselLastSlideMessage": "This is the last slide",
            "a11yCarouselPaginationBulletMessage": "Go to slide"
        },
        "is_rtl": false,
        "breakpoints": {
            "xs": 0,
            "sm": 480,
            "md": 768,
            "lg": 1025,
            "xl": 1440,
            "xxl": 1600
        },
        "responsive": {
            "breakpoints": {
                "mobile": {
                    "label": "Mobile Portrait",
                    "value": 767,
                    "default_value": 767,
                    "direction": "max",
                    "is_enabled": true
                },
                "mobile_extra": {
                    "label": "Mobile Landscape",
                    "value": 880,
                    "default_value": 880,
                    "direction": "max",
                    "is_enabled": false
                },
                "tablet": {
                    "label": "Tablet Portrait",
                    "value": 1024,
                    "default_value": 1024,
                    "direction": "max",
                    "is_enabled": true
                },
                "tablet_extra": {
                    "label": "Tablet Landscape",
                    "value": 1200,
                    "default_value": 1200,
                    "direction": "max",
                    "is_enabled": false
                },
                "laptop": {
                    "label": "Laptop",
                    "value": 1366,
                    "default_value": 1366,
                    "direction": "max",
                    "is_enabled": false
                },
                "widescreen": {
                    "label": "Widescreen",
                    "value": 2400,
                    "default_value": 2400,
                    "direction": "min",
                    "is_enabled": false
                }
            },
            "hasCustomBreakpoints": false
        },
        "version": "3.28.3",
        "is_static": false,
        "experimentalFeatures": {
            "e_font_icon_svg": true,
            "additional_custom_breakpoints": true,
            "container": true,
            "e_local_google_fonts": true,
            "theme_builder_v2": true,
            "nested-elements": true,
            "editor_v2": true,
            "e_element_cache": true,
            "home_screen": true,
            "launchpad-checklist": true
        },
        "urls": {
            "assets": "https:\/\/azure-sardine-328383.hostingersite.com\/wp-content\/plugins\/elementor\/assets\/",
            "ajaxurl": "https:\/\/azure-sardine-328383.hostingersite.com\/wp-admin\/admin-ajax.php",
            "uploadUrl": "https:\/\/azure-sardine-328383.hostingersite.com\/wp-content\/uploads"
        },
        "nonces": {
            "floatingButtonsClickTracking": "9930c4b8fd"
        },
        "swiperClass": "swiper",
        "settings": {
            "page": [],
            "editorPreferences": []
        },
        "kit": {
            "active_breakpoints": ["viewport_mobile", "viewport_tablet"],
            "global_image_lightbox": "yes",
            "lightbox_enable_counter": "yes",
            "lightbox_enable_fullscreen": "yes",
            "lightbox_enable_zoom": "yes",
            "lightbox_enable_share": "yes",
            "lightbox_title_src": "title",
            "lightbox_description_src": "description"
        },
        "post": {
            "id": 45,
            "title": "About%20Us%20%E2%80%93%20azure-sardine-328383.hostingersite.com",
            "excerpt": "",
            "featuredImage": false
        }
    };
    /* ]]> */
</script>
 
<script type="text/javascript" id="elementor-pro-frontend-js-before">
    /* <![CDATA[ */
    var ElementorProFrontendConfig = {
        "ajaxurl": "https:\/\/azure-sardine-328383.hostingersite.com\/wp-admin\/admin-ajax.php",
        "nonce": "6d60809dbb",
        "urls": {
            "assets": "https:\/\/azure-sardine-328383.hostingersite.com\/wp-content\/plugins\/elementor-pro\/assets\/",
            "rest": "https:\/\/azure-sardine-328383.hostingersite.com\/wp-json\/"
        },
        "settings": {
            "lazy_load_background_images": true
        },
        "popup": {
            "hasPopUps": false
        },
        "shareButtonsNetworks": {
            "facebook": {
                "title": "Facebook",
                "has_counter": true
            },
            "twitter": {
                "title": "Twitter"
            },
            "linkedin": {
                "title": "LinkedIn",
                "has_counter": true
            },
            "pinterest": {
                "title": "Pinterest",
                "has_counter": true
            },
            "reddit": {
                "title": "Reddit",
                "has_counter": true
            },
            "vk": {
                "title": "VK",
                "has_counter": true
            },
            "odnoklassniki": {
                "title": "OK",
                "has_counter": true
            },
            "tumblr": {
                "title": "Tumblr"
            },
            "digg": {
                "title": "Digg"
            },
            "skype": {
                "title": "Skype"
            },
            "stumbleupon": {
                "title": "StumbleUpon",
                "has_counter": true
            },
            "mix": {
                "title": "Mix"
            },
            "telegram": {
                "title": "Telegram"
            },
            "pocket": {
                "title": "Pocket",
                "has_counter": true
            },
            "xing": {
                "title": "XING",
                "has_counter": true
            },
            "whatsapp": {
                "title": "WhatsApp"
            },
            "email": {
                "title": "Email"
            },
            "print": {
                "title": "Print"
            },
            "x-twitter": {
                "title": "X"
            },
            "threads": {
                "title": "Threads"
            }
        },
        "facebook_sdk": {
            "lang": "en_US",
            "app_id": ""
        },
        "lottie": {
            "defaultAnimationUrl": "https:\/\/azure-sardine-328383.hostingersite.com\/wp-content\/plugins\/elementor-pro\/modules\/lottie\/assets\/animations\/default.json"
        }
    };
    /* ]]> */
</script>
 
 @stop