 @extends('layouts.front')

 @section('title')

     {{ $gs->{'title_' . $sign} }}

 @stop

 @section('gsearch')
     <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
 @stop


 @section('content')

     <!-- main-content -->
     <main class="main-content">

         <div data-elementor-type="wp-page" data-elementor-id="19" class="elementor elementor-19"
             data-elementor-post-type="page">
             <div class="elementor-element elementor-element-df32418 e-con-full e-flex e-con e-parent" data-id="df32418"
                 data-element_type="container">
                 <div class="elementor-element elementor-element-ee68a64 elementor-widget elementor-widget-labout_main_slider"
                     data-id="ee68a64" data-element_type="widget" data-widget_type="labout_main_slider.default">
                     <div class="elementor-widget-container">

                         <!-- banner-section -->
                         <section class="banner-section p_relative">
                             <div class="banner-carousel owl-theme owl-carousel owl-dots-none owl-nav-none">

                                 @foreach ($sliders as $slider)
                                     <div class="slide-item p_relative">
                                         <div class="bg-layer"
                                             style="background-image: url({{ $slider->{'photo'} ?? '' }});">
                                         </div>
                                         <div class="pattern-layer"
                                             style="background-image: url({{ asset('front/sinai_clinic/') }}/img/shape-1.webp);">
                                         </div>
                                         <div class="auto-container">
                                             <div class="content-box p_relative d_block z_5">
                                                 <span class="sub-title">SinaiClinic Hospital</span>
                                                 <h2>At Sinai Clinic
                                                     <span> Hospital</span>
                                                 </h2>
                                                 <p>{!! $slider->{'details_' . $sign} ?? '' !!}</p>
                                                 <div class="btn-box">
                                                     <a href="{{ route('about.index') }}" class="theme-btn">About Us
                                                         <span></span><span></span><span></span><span></span></a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 @endforeach

                             </div>
                         </section>
                         <!-- banner-section end -->

                     </div>
                 </div>
             </div>

             <div class="elementor-element elementor-element-e9e3948 e-con-full elementor-hidden-desktop elementor-hidden-tablet elementor-hidden-mobile e-flex e-con e-parent"
                 data-id="e9e3948" data-element_type="container">
                 <div class="elementor-element elementor-element-d18e4de elementor-widget elementor-widget-labout_feature_services"
                     data-id="d18e4de" data-element_type="widget" data-widget_type="labout_feature_services.default">
                     <div class="elementor-widget-container">

                         <!-- feature-section -->
                         <section class="feature-section">
                             <div class="auto-container">
                                 <div class="inner-container clearfix">
                                     <div class="feature-block-one">
                                         <div class="inner-box">

                                             <div class="icon-box">
                                                 <div class='r-hex'>
                                                     <div class='r-hex-inner'></div>
                                                 </div>
                                                 <div class="icon">
                                                     <i class=" icon-4"></i>
                                                 </div>
                                             </div>
                                             <h3><a
                                                     href="https://azure-sardine-328383.hostingersite.com/service/10-research-center/">10+
                                                     Research Center</a></h3>
                                             <p>This institute focuses on understanding the molecular mechanisms of diseases
                                                 into the developing new technologies.</p>
                                         </div>
                                     </div>
                                     <div class="feature-block-one">
                                         <div class="inner-box">
                                             <div class="bg-layer"
                                                 style="background-image: url('https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/feature-1.jpg');">
                                             </div>

                                             <div class="icon-box">
                                                 <div class='r-hex'>
                                                     <div class='r-hex-inner'></div>
                                                 </div>
                                                 <div class="icon">
                                                     <i class=" icon-5"></i>
                                                 </div>
                                             </div>
                                             <h3><a
                                                     href="https://azure-sardine-328383.hostingersite.com/service/free-pick-up-delivery/">Free
                                                     Pick Up &amp; Delivery</a></h3>
                                             <p>Free pick-up and delivery services are often offered by businesses to
                                                 enhance customer convenience</p>
                                         </div>
                                     </div>
                                     <div class="feature-block-one">
                                         <div class="inner-box">

                                             <div class="icon-box">
                                                 <div class='r-hex'>
                                                     <div class='r-hex-inner'></div>
                                                 </div>
                                                 <div class="icon">
                                                     <i class=" icon-6"></i>
                                                 </div>
                                             </div>
                                             <h3><a
                                                     href="https://azure-sardine-328383.hostingersite.com/service/24-7-support-assistant/">24/7
                                                     Support Assistant</a></h3>
                                             <p>The support assistant is available 24 hours a day, every day of the week,
                                                 ensuring continuous accessibility</p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </section>
                         <!-- feature-section end -->


                     </div>
                 </div>
             </div>

             <div class="elementor-element elementor-element-297abf5 e-con-full e-flex e-con e-parent" data-id="297abf5"
                 data-element_type="container">
                 <div class="elementor-element elementor-element-95adbe8 elementor-widget elementor-widget-labout_about_us"
                     data-id="95adbe8" data-element_type="widget" data-widget_type="labout_about_us.default">
                     <div class="elementor-widget-container">


                         <!-- about-style-four -->
                         <section class="about-style-four pt_90 pb_120">
                             <div class="pattern-layer">
                                 <div class="pattern-2 zoom-fade"
                                     style="background-image: url({{ asset('front/sinai_clinic/') }}/img/shape-42.webp);">
                                 </div>
                                 <div class="pattern-3 zoom-fade"
                                     style="background-image: url({{ asset('front/sinai_clinic/') }}/img/shape-26.webp);">
                                 </div>
                             </div>
                             <div class="auto-container">
                                 <div class="row align-items-center">
                                     <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                         <div class="image_block_three">
                                             <div class="image-box">
                                                 <div class="row clearfix">
                                                     <div class="col-lg-6 col-md-6 col-sm-12 single-image">
                                                         <figure class="image image-1"><img decoding="async"
                                                                 src="{{ $ps->portfolio_photo }}"
                                                                 alt="azure-sardine-328383.hostingersite.com"></figure>
                                                     </div>
                                                     <div class="col-lg-6 col-md-6 col-sm-12 single-image">
                                                         <figure class="image image-2 mt_55"><img decoding="async"
                                                                 src="{{ $ps->about_photo }}"
                                                                 alt="azure-sardine-328383.hostingersite.com"></figure>
                                                     </div>
                                                 </div>
                                                 <div class="experience-box">
                                                     <div class="shape"
                                                         style="background-image: url({{ asset('front/sinai_clinic/') }}/img/ChatGPT-Image-Apr-9-2025-02_35_05-AM-1.webp);">
                                                     </div>
                                                     <div class="inner p_relative">
                                                         <h2>10</h2>
                                                         <h4>Years of <br />expericence</h4>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                         <div class="content_block_one">
                                             <div class="content-box ml_30 sec-title-animation animation-style2">
                                                 <div class="sec-title mb_25">
                                                     <span class="sub-title mb_20 title-animation">About Us</span>
                                                     <h2 class="title-animation">
                                                         {{ $ps->{'portfolio_title_' . $sign} ?? '' }} </h2>
                                                 </div>
                                                 <div class="text-box mb_45 title-animation">
                                                     <p> {!! $ps->{'portfolio_details_' . $sign} ?? '' !!} </p>
                                                     <ul class="list-style-one clearfix">

                                                         @foreach ($points as $point)
                                                             <li> {{ $point->{'title_' . $sign} ?? '' }}</li>
                                                         @endforeach

                                                     </ul>
                                                 </div>
                                                 <div class="btn-box">
                                                     <a href="{{ route('contact.index') }}" class="theme-btn">Get
                                                         more<span></span><span></span><span></span><span></span></a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </section>
                         <!-- about-style-four end -->


                     </div>
                 </div>
             </div>
             <div class="elementor-element elementor-element-4b2d63c e-con-full e-flex e-con e-parent" data-id="4b2d63c"
                 data-element_type="container">
                 <div class="elementor-element elementor-element-7dae4aa elementor-widget elementor-widget-labout_working_process"
                     data-id="7dae4aa" data-element_type="widget" data-widget_type="labout_working_process.default">
                     <div class="elementor-widget-container">


                         <!-- working-section -->
                         <section class="working-section centred pt_120 pb_80">
                             <div class="bg-layer parallax-bg" data-parallax='{"y": 100}'
                                 style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/working-bg.webp');">
                             </div>
                             <div class="auto-container">
                                 <div class="sec-title light mb_60 sec-title-animation animation-style2">
                                     <span class="sub-title mb_20 title-animation">About Us</span>
                                     <h2 class="title-animation">Our Mission</h2>
                                 </div>
                                 <div class="inner-container p_relative">
                                     <div class="row clearfix">
                                         @foreach ($models as $k => $model)
                                             <div class="col-lg-3 col-md-6 col-sm-12 working-block">
                                                 <div class="working-block-one">
                                                     <div class="inner-box">
                                                         <div class="count-box">
                                                             <div class="shape"
                                                                 style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/Group-2406-1.webp');">
                                                             </div>
                                                             <span> {{ $k + 1 }}</span>
                                                         </div>
                                                         <h3> {{ $model->{'title_' . $sign} ?? '' }} </h3>
                                                         <p>{{ $model->{'details_' . $sign} ?? '' }}</p>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endforeach

                                     </div>
                                 </div>
                             </div>
                         </section>
                         <!-- working-section end -->

                     </div>
                 </div>
             </div>

             {{-- not working  --}}
             {{-- <div class="elementor-element elementor-element-adb0ddd e-con-full elementor-hidden-desktop elementor-hidden-tablet elementor-hidden-mobile e-flex e-con e-parent"
                 data-id="adb0ddd" data-element_type="container">
                 <div class="elementor-element elementor-element-dba9b73 elementor-widget elementor-widget-labout_feature_services"
                     data-id="dba9b73" data-element_type="widget" data-widget_type="labout_feature_services.default">
                     <div class="elementor-widget-container">


                         <!-- chooseus-section -->
                         <section class="chooseus-section pt_120 pb_90 centred">
                             <div class="auto-container">
                                 <div class="sec-title mb_70 sec-title-animation animation-style2">
                                     <span class="sub-title mb_20 title-animation">OUR DEPARTMENT</span>
                                     <h2 class="title-animation">In order to meet the diverse medical needs of patients,
                                         sinaiclinic provides some important departments that ensure the provision of the
                                         necessary health care according to world standards</h2>
                                 </div>
                                 <div class="row clearfix">


                                     <div class="col-lg-3 col-md-6 col-sm-12 chooseus-block">
                                         <div class="chooseus-block-one p_relative z_1 title-animation">
                                             <div class="inner-box">
                                                 <div class="bg-layer"
                                                     style="background-image: url('https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/chooseus-1.jpg');">
                                                 </div>
                                                 <div class="icon-box">
                                                     <div class="r-hex">
                                                         <div class="r-hex-inner"></div>
                                                     </div>
                                                     <div class="icon">
                                                         <i class=" icon-19"></i>
                                                     </div>
                                                 </div>
                                                 <h3><a
                                                         href="https://azure-sardine-328383.hostingersite.com/service/medical-research/">Emergency</a>
                                                 </h3>
                                                 <p>The department consists of a medical team specializing in medical,
                                                     surgical and nursing emergencies, and works to provide emergency
                                                     medical care to patients around the clock</p>
                                                 <div class="btn-box p_relative">
                                                     <div class="link-icon"><a
                                                             href="https://azure-sardine-328383.hostingersite.com/service/medical-research/"><i
                                                                 class="icon-23"></i></a></div>
                                                     <div class="link-text"><a
                                                             href="https://azure-sardine-328383.hostingersite.com/service/medical-research/">Get
                                                             Service</a></div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>


                                     <div class="col-lg-3 col-md-6 col-sm-12 chooseus-block">
                                         <div class="chooseus-block-one p_relative z_1 title-animation">
                                             <div class="inner-box">
                                                 <div class="bg-layer"
                                                     style="background-image: url('https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/research-10.jpg');">
                                                 </div>
                                                 <div class="icon-box">
                                                     <div class="r-hex">
                                                         <div class="r-hex-inner"></div>
                                                     </div>
                                                     <div class="icon">
                                                         <i class=" icon-33"></i>
                                                     </div>
                                                 </div>
                                                 <h3><a
                                                         href="https://azure-sardine-328383.hostingersite.com/service/blood-resources/">Cardiology
                                                         and Catheterization</a></h3>
                                                 <p>The catheter unit is characterized by the availability of the latest
                                                     devices for conducting diagnostic and therapeutic catheterization of
                                                     the heart</p>
                                                 <div class="btn-box p_relative">
                                                     <div class="link-icon"><a
                                                             href="https://azure-sardine-328383.hostingersite.com/service/blood-resources/"><i
                                                                 class="icon-23"></i></a></div>
                                                     <div class="link-text"><a
                                                             href="https://azure-sardine-328383.hostingersite.com/service/blood-resources/">Get
                                                             Service</a></div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-6 col-sm-12 chooseus-block">
                                         <div class="chooseus-block-one p_relative z_1 title-animation">
                                             <div class="inner-box">
                                                 <div class="bg-layer"
                                                     style="background-image: url('https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/events-4.jpg');">
                                                 </div>
                                                 <div class="icon-box">
                                                     <div class="r-hex">
                                                         <div class="r-hex-inner"></div>
                                                     </div>
                                                     <div class="icon">
                                                         <i class=" icon-21"></i>
                                                     </div>
                                                 </div>
                                                 <h3><a
                                                         href="https://azure-sardine-328383.hostingersite.com/service/extramural-funding/">Intensive
                                                         Care</a></h3>
                                                 <p>This department includes a medical team trained in critical care of
                                                     patients and of their health conditions</p>
                                                 <div class="btn-box p_relative">
                                                     <div class="link-icon"><a
                                                             href="https://azure-sardine-328383.hostingersite.com/service/extramural-funding/"><i
                                                                 class="icon-23"></i></a></div>
                                                     <div class="link-text"><a
                                                             href="https://azure-sardine-328383.hostingersite.com/service/extramural-funding/">Get
                                                             Service</a></div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-6 col-sm-12 chooseus-block">
                                         <div class="chooseus-block-one p_relative z_1 title-animation">
                                             <div class="inner-box">
                                                 <div class="bg-layer"
                                                     style="background-image: url('https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/about-4.jpg');">
                                                 </div>
                                                 <div class="icon-box">
                                                     <div class="r-hex">
                                                         <div class="r-hex-inner"></div>
                                                     </div>
                                                     <div class="icon">
                                                         <i class=" icon-22"></i>
                                                     </div>
                                                 </div>
                                                 <h3><a
                                                         href="https://azure-sardine-328383.hostingersite.com/service/health-science/">Dentistry</a>
                                                 </h3>
                                                 <p>The dental department is an integrated Center for oral health care. The
                                                     department provides comprehensive services characterized by advanced
                                                     technology to ensure the best healthcare for patients</p>
                                                 <div class="btn-box p_relative">
                                                     <div class="link-icon"><a
                                                             href="https://azure-sardine-328383.hostingersite.com/service/health-science/"><i
                                                                 class="icon-23"></i></a></div>
                                                     <div class="link-text"><a
                                                             href="https://azure-sardine-328383.hostingersite.com/service/health-science/">Get
                                                             Service</a></div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </section>
                         <!-- chooseus-section end -->


                     </div>
                 </div>
             </div>
 --}}

             <div class="elementor-element elementor-element-bdea80f e-con-full e-flex e-con e-parent" data-id="bdea80f"
                 data-element_type="container">
                 <div class="elementor-element elementor-element-a94a754 elementor-widget elementor-widget-labout_feature_services"
                     data-id="a94a754" data-element_type="widget" data-widget_type="labout_feature_services.default">
                     <div class="elementor-widget-container">


                         <!-- service-section -->
                         <section class="service-section pt_120 pb_90">
                             <div class="bg-layer parallax-bg" data-parallax='{"y": 100}'
                                 style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/service-bg.webp');">
                             </div>
                             <div class="pattern-layer"
                                 style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/shape-8.webp');">
                             </div>
                             <div class="auto-container">
                                 <div class="sec-title centred mb_70 sec-title-animation animation-style2">
                                     <span class="sub-title mb_20 title-animation">OUR DEPARTMENT</span>
                                     <h2 class="title-animation">In order to meet the diverse medical needs of patients,
                                         sinaiclinic provides some important departments that ensure the provision of the
                                         necessary health care according to world standards

                                     </h2>
                                 </div>
                                 <div class="row clearfix">
                                     @foreach ($home_services as $k => $home_service)
                                         <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                                             <div class="service-block-one">
                                                 <div class="inner-box">
                                                     <div class="icon-box">
                                                         <div class='r-hex'>
                                                             <div class='r-hex-inner'></div>
                                                         </div>
                                                         <div class="icon">
                                                             <i class=" icon-{{ rand(10, 25) }}"></i>
                                                         </div>
                                                     </div>
                                                     <h3><a href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}"
                                                             target=&quot;_blank&quot;
                                                             rel=&quot;nofollow&quot;>{{ $home_service->{'title_' . $sign} }}
                                                         </a>
                                                     </h3>
                                                     <p>{{ $home_service->{'short_details_' . $sign} }}</p>
                                                     <div class="link"><a
                                                             href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}"
                                                             target=&quot;_blank&quot; rel=&quot;nofollow&quot;>Discover
                                                             More <i class="fal fa-angle-right"></i></a></div>
                                                 </div>
                                             </div>
                                         </div>
                                     @endforeach
                                 </div>
                             </div>
                         </section>
                         <!-- service-section end -->


                     </div>
                 </div>
             </div>
             <div class="elementor-element elementor-element-e7db2b1 e-con-full e-flex e-con e-parent" data-id="e7db2b1"
                 data-element_type="container">
                 <div class="elementor-element elementor-element-aa2934e elementor-align-center elementor-widget elementor-widget-button"
                     data-id="aa2934e" data-element_type="widget" data-widget_type="button.default">
                     <div class="elementor-widget-container">
                         <div class="elementor-button-wrapper">
                             <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                 <span class="elementor-button-content-wrapper">
                                     <span class="elementor-button-text">Our Partners</span>
                                 </span>
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="elementor-element elementor-element-f428ee0 elementor-widget elementor-widget-heading"
                     data-id="f428ee0" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                         <h2 class="elementor-heading-title elementor-size-default">COMPANIES CONTRACTING WITH SINAICLINIC
                         </h2>
                     </div>
                 </div>
                 <div class="elementor-element elementor-element-175633b elementor-widget elementor-widget-labout_clients"
                     data-id="175633b" data-element_type="widget" data-widget_type="labout_clients.default">
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
             <div class="elementor-element elementor-element-b8cc84a e-con-full e-flex e-con e-parent" data-id="b8cc84a"
                 data-element_type="container">
                 <div class="elementor-element elementor-element-75c36ab elementor-widget elementor-widget-labout_funfacts"
                     data-id="75c36ab" data-element_type="widget" data-widget_type="labout_funfacts.default">
                     <div class="elementor-widget-container">


                         <!-- funfact-section -->
                         <section class="funfact-section pt_130 pb_120 centred">
                             <div class="bg-layer parallax-bg" data-parallax='{"y": 100}'
                                 style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/funfact-bg.webp');">
                             </div>
                             <div class="pattern-layer">
                                 <div class="pattern-1"
                                     style="background-image: url({{ asset('front/sinai_clinic/') }}/img/shape-7.webp);">
                                 </div>
                             </div>
                             <div class="auto-container">
                                 <div class="sec-title light mb_70 sec-title-animation animation-style2">
                                     <span class="sub-title mb_20 title-animation">Sinaiclinic is characterized by
                                         high-quality </span>
                                     <h2 class="title-animation">services and many features that make it one of the leading
                                         hospitals in the Middle East</h2>
                                 </div>
                                 <div class="row clearfix">

                                     @foreach ($features as $k => $feature)
                                         <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                                             <div class="funfact-block-one">
                                                 <div class="inner-box">
                                                     <div class="icon-box">
                                                         @if ($k == 0)
                                                             <svg xmlns="http://www.w3.org/2000/svg" width="101"
                                                                 height="101" viewBox="0 0 101 101" fill="none">
                                                                 <circle cx="50.5" cy="50.5" r="50.5"
                                                                     fill="white">
                                                                 </circle>
                                                                 <path
                                                                     d="M50 80C66.5765 80 80 66.5765 80 50C80 33.4235 66.5765 20 50 20C33.4235 20 20 33.4235 20 50C20 66.5765 33.4235 80 50 80ZM50 22.8507C65 22.8507 77.1492 35 77.1492 50C77.1492 65 65 77.1492 50 77.1492C35 77.1492 22.8507 65 22.8507 50C22.8507 35 35 22.8507 50 22.8507Z"
                                                                     fill="#DA3928"></path>
                                                                 <path
                                                                     d="M49.1042 49.8528L58.3299 59.1513C58.6287 59.4502 59.0037 59.6025 59.3055 59.6025C59.6805 59.6025 60.0555 59.4531 60.2811 59.1513C60.8055 58.6269 60.8055 57.7275 60.2811 57.1269L51.5039 48.2762V35.7519C51.5039 34.9257 50.83 34.3281 50.08 34.3281C49.3301 34.3281 48.6562 35.002 48.6562 35.7519V48.8769C48.6562 49.0263 48.7324 49.2519 48.7324 49.4013C48.8057 49.6269 48.9547 49.7767 49.1042 49.8528Z"
                                                                     fill="#DA3928"></path>
                                                                 <path
                                                                     d="M49.9941 31.3935C50.8203 31.3935 51.4179 30.7197 51.4179 29.9697V26.7441C51.4179 25.9179 50.7441 25.3203 49.9941 25.3203C49.2441 25.3203 48.5703 25.9941 48.5703 26.7441V30.0429C48.5703 30.7929 49.168 31.3935 49.9941 31.3935Z"
                                                                     fill="#DA3928"></path>
                                                                 <path
                                                                     d="M34.8452 36.8767C35.144 37.1756 35.519 37.3279 35.8208 37.3279C36.1196 37.3279 36.5708 37.1785 36.7964 36.8767C37.3208 36.3523 37.3208 35.4529 36.7964 34.8523L34.4702 32.5261C33.9458 32.0017 33.0464 32.0017 32.4458 32.5261C31.8452 33.0505 31.9214 33.9499 32.4458 34.5505L34.8452 36.8767Z"
                                                                     fill="#DA3928"></path>
                                                                 <path
                                                                     d="M31.3935 49.9941C31.3935 49.1679 30.7197 48.5703 29.9697 48.5703H26.7441C25.9179 48.5703 25.3203 49.2441 25.3203 49.9941C25.3203 50.7441 25.9941 51.4179 26.7441 51.4179H30.0429C30.7929 51.4179 31.3935 50.8203 31.3935 49.9941Z"
                                                                     fill="#DA3928"></path>
                                                                 <path
                                                                     d="M33.5749 67.8513C33.9499 67.8513 34.3249 67.7019 34.5505 67.4002L36.8767 65.074C37.4011 64.5495 37.4011 63.6502 36.8767 63.0496C36.3523 62.5251 35.4529 62.5251 34.8523 63.0496L32.5261 65.3758C32.0017 65.9002 32.0017 66.7996 32.5261 67.4002C32.825 67.7752 33.2 67.8513 33.5749 67.8513Z"
                                                                     fill="#DA3928"></path>
                                                                 <path
                                                                     d="M49.9941 74.6698C50.8203 74.6698 51.4179 73.996 51.4179 73.246V69.9472C51.4179 69.121 50.7441 68.5234 49.9941 68.5234C49.2441 68.5234 48.5703 69.1973 48.5703 69.9472V73.246C48.5703 74.0722 49.168 74.6698 49.9941 74.6698Z"
                                                                     fill="#DA3928"></path>
                                                                 <path
                                                                     d="M65.449 67.4705C65.7478 67.7693 66.1228 67.9216 66.4246 67.9216C66.7234 67.9216 67.1746 67.7722 67.4002 67.4705C67.9246 66.9461 67.9246 66.0467 67.4002 65.4461L65.074 63.1199C64.5495 62.5955 63.6502 62.5955 63.0496 63.1199C62.5251 63.6443 62.5251 64.5437 63.0496 65.1443L65.449 67.4705Z"
                                                                     fill="#DA3928"></path>
                                                                 <path
                                                                     d="M70.0204 51.4179H73.246C74.0722 51.4179 74.6698 50.7441 74.6698 49.9941C74.6698 49.2441 73.996 48.5703 73.246 48.5703H69.9472C69.121 48.5703 68.5234 49.2441 68.5234 49.9941C68.5205 50.7441 69.1972 51.4179 70.0204 51.4179Z"
                                                                     fill="#DA3928"></path>
                                                                 <path
                                                                     d="M64.1687 37.2476C64.5437 37.2476 64.9187 37.0982 65.1443 36.7964L67.4705 34.4702C67.9949 33.9458 67.9949 33.0464 67.4705 32.4458C66.9461 31.8452 66.0467 31.9214 65.4461 32.4458L63.1199 34.772C62.5955 35.2964 62.5955 36.1958 63.1199 36.7964C63.4187 37.1714 63.7937 37.2476 64.1687 37.2476Z"
                                                                     fill="#DA3928"></path>
                                                             </svg>
                                                         @elseif ($k == 1)
                                                             <svg xmlns="http://www.w3.org/2000/svg" width="103"
                                                                 height="103" viewBox="0 0 103 103" fill="none">
                                                                 <circle cx="51.5076" cy="51.505" r="50.5"
                                                                     transform="rotate(-179.445 51.5076 51.505)"
                                                                     fill="white">
                                                                 </circle>
                                                                 <path
                                                                     d="M36.1898 27C35.9623 27.001 35.7444 27.0981 35.5836 27.2702C35.4227 27.4424 35.332 27.6756 35.3311 27.9191V30.3861H32.3526C29.404 30.3861 27 32.9551 27 36.113V71.2712C27 74.4292 29.404 77 32.3526 77H71.6542C74.6027 77 77 74.4292 77 71.2712V36.113C77 32.9551 74.6027 30.3861 71.6542 30.3861H68.6773V27.9191C68.6764 27.6753 68.5855 27.4418 68.4242 27.2696C68.263 27.0974 68.0447 27.0005 67.8169 27C67.7037 26.9995 67.5915 27.0229 67.4868 27.0689C67.382 27.1148 67.2867 27.1824 67.2064 27.2677C67.126 27.353 67.0621 27.4545 67.0184 27.5662C66.9747 27.678 66.952 27.7979 66.9515 27.9191V30.3861H52.8621V27.9191C52.8612 27.6756 52.7704 27.4424 52.6096 27.2702C52.4487 27.0981 52.2308 27.001 52.0034 27C51.8902 26.9995 51.778 27.0229 51.6732 27.0689C51.5684 27.1148 51.4732 27.1824 51.3928 27.2677C51.3124 27.353 51.2486 27.4545 51.2048 27.5662C51.1611 27.678 51.1384 27.7979 51.1379 27.9191V30.3861H37.0552V27.9191C37.0548 27.7979 37.032 27.678 36.9883 27.5662C36.9446 27.4545 36.8807 27.353 36.8004 27.2677C36.72 27.1824 36.6247 27.1148 36.5199 27.0689C36.4152 27.0229 36.303 26.9995 36.1898 27ZM32.3526 32.2314H35.3311V34.6894C35.3306 34.8106 35.3525 34.9306 35.3954 35.0428C35.4383 35.1549 35.5015 35.2569 35.5812 35.3429C35.6609 35.4289 35.7557 35.4972 35.8601 35.544C35.9646 35.5909 36.0766 35.6152 36.1898 35.6157C36.3036 35.6161 36.4163 35.5925 36.5215 35.5461C36.6267 35.4997 36.7223 35.4315 36.8027 35.3454C36.8832 35.2593 36.9469 35.157 36.9903 35.0444C37.0336 34.9318 37.0557 34.8112 37.0552 34.6894V32.2314H51.1379V34.6894C51.1375 34.8112 51.1596 34.9318 51.2029 35.0444C51.2462 35.157 51.31 35.2593 51.3904 35.3454C51.4709 35.4315 51.5665 35.4997 51.6717 35.5461C51.7769 35.5925 51.8896 35.6161 52.0034 35.6157C52.1166 35.6152 52.2286 35.5909 52.333 35.544C52.4374 35.4972 52.5322 35.4289 52.612 35.3429C52.6917 35.2569 52.7548 35.1549 52.7977 35.0428C52.8407 34.9306 52.8625 34.8106 52.8621 34.6894V32.2314H66.9515V34.6894C66.9511 34.8112 66.9731 34.9318 67.0165 35.0444C67.0598 35.157 67.1235 35.2593 67.204 35.3454C67.2844 35.4315 67.38 35.4997 67.4852 35.5461C67.5904 35.5925 67.7032 35.6161 67.8169 35.6157C67.9303 35.6154 68.0425 35.5913 68.1471 35.5446C68.2517 35.4979 68.3467 35.4295 68.4266 35.3435C68.5065 35.2575 68.5698 35.1554 68.6128 35.0432C68.6559 34.9309 68.6778 34.8107 68.6773 34.6894V32.2314H71.6542C73.6761 32.2314 75.2826 33.9441 75.2826 36.113V41.6436H28.7258V36.113C28.7258 33.9441 30.3306 32.2314 32.3526 32.2314ZM28.7258 43.4889H75.2826V71.2712C75.2826 73.4401 73.6761 75.1529 71.6542 75.1529H32.3526C30.3306 75.1529 28.7258 73.4401 28.7258 71.2712V43.4889ZM71.5363 47.6696C71.4909 47.6664 71.4453 47.667 71.3999 47.6714C71.287 47.6819 71.1771 47.7161 71.0766 47.7721C70.9761 47.8281 70.8868 47.9047 70.814 47.9976L65.6096 54.6382L62.1344 51.2125C61.966 51.0478 61.7436 50.9612 61.5158 50.9717C61.2879 50.9822 61.0732 51.0888 60.9187 51.2684C60.8418 51.3577 60.782 51.4624 60.743 51.5765C60.704 51.6906 60.6864 51.8118 60.6912 51.9332C60.6961 52.0546 60.7233 52.1738 60.7713 52.2839C60.8193 52.394 60.8871 52.4929 60.9709 52.5749L65.1061 56.6547C65.1921 56.7396 65.2933 56.8049 65.4036 56.8466C65.5139 56.8883 65.631 56.9055 65.7477 56.8973C65.8644 56.889 65.9783 56.8554 66.0825 56.7986C66.1867 56.7417 66.279 56.6627 66.3538 56.5664L72.1391 49.1834C72.2118 49.0903 72.2667 48.9828 72.3006 48.867C72.3345 48.7512 72.3467 48.6294 72.3365 48.5085C72.3264 48.3877 72.294 48.2702 72.2414 48.1627C72.1887 48.0552 72.1167 47.9599 72.0296 47.8823C71.8902 47.7575 71.7176 47.6831 71.5363 47.6696ZM33.7972 47.6714C33.5686 47.6705 33.349 47.7668 33.1867 47.9392C33.0244 48.1115 32.9327 48.3458 32.9318 48.5905V56.2132C32.9327 56.4579 33.0244 56.6922 33.1867 56.8645C33.349 57.0369 33.5686 57.1332 33.7972 57.1323H40.8992C41.1278 57.1332 41.3474 57.0369 41.5097 56.8645C41.672 56.6922 41.7637 56.4579 41.7646 56.2132V48.5905C41.7637 48.3458 41.672 48.1115 41.5097 47.9392C41.3474 47.7668 41.1278 47.6705 40.8992 47.6714H33.7972ZM48.4456 47.6714C48.2182 47.6724 48.0003 47.7696 47.8395 47.9417C47.6786 48.1138 47.5879 48.347 47.5869 48.5905V56.2132C47.5879 56.4567 47.6786 56.6899 47.8395 56.862C48.0003 57.0341 48.2182 57.1313 48.4456 57.1323H55.5544C55.783 57.1332 56.0026 57.0369 56.1649 56.8645C56.3272 56.6922 56.4189 56.4579 56.4198 56.2132V48.5905C56.4189 48.3458 56.3272 48.1115 56.1649 47.9392C56.0026 47.7668 55.783 47.6705 55.5544 47.6714H48.4456ZM34.6559 49.5168H40.0405V55.2852H34.6559V49.5168ZM49.3111 49.5168H54.6956V55.2852H49.3111V49.5168ZM33.7972 61.5113C33.5686 61.5103 33.349 61.6066 33.1867 61.779C33.0244 61.9513 32.9327 62.1856 32.9318 62.4303V70.053C32.9327 70.2977 33.0244 70.532 33.1867 70.7044C33.349 70.8767 33.5686 70.973 33.7972 70.9721H40.8992C41.1278 70.973 41.3474 70.8767 41.5097 70.7044C41.672 70.532 41.7637 70.2977 41.7646 70.053V62.4303C41.7637 62.1856 41.672 61.9513 41.5097 61.779C41.3474 61.6066 41.1278 61.5103 40.8992 61.5113H33.7972ZM48.4456 61.5113C48.2182 61.5122 48.0003 61.6094 47.8395 61.7815C47.6786 61.9537 47.5879 62.1869 47.5869 62.4303V70.053C47.5879 70.2965 47.6786 70.5297 47.8395 70.7018C48.0003 70.874 48.2182 70.9711 48.4456 70.9721H55.5544C55.783 70.973 56.0026 70.8767 56.1649 70.7044C56.3272 70.532 56.4189 70.2977 56.4198 70.053V62.4303C56.4189 62.1856 56.3272 61.9513 56.1649 61.779C56.0026 61.6066 55.783 61.5103 55.5544 61.5113H48.4456ZM63.1025 61.5113C62.8748 61.5118 62.6564 61.6087 62.4952 61.7809C62.334 61.9531 62.243 62.1866 62.2421 62.4303V70.053C62.243 70.2968 62.334 70.5303 62.4952 70.7025C62.6564 70.8747 62.8748 70.9716 63.1025 70.9721H70.2095C70.4382 70.973 70.6578 70.8767 70.8201 70.7044C70.9824 70.532 71.074 70.2977 71.075 70.053V62.4303C71.074 62.1856 70.9824 61.9513 70.8201 61.779C70.6578 61.6066 70.4382 61.5103 70.2095 61.5113H63.1025ZM34.6559 63.3566H40.0405V69.125H34.6559V63.3566ZM49.3111 63.3566H54.6956V69.125H49.3111V63.3566ZM63.9679 63.3566H69.3508V69.125H63.9679V63.3566Z"
                                                                     fill="#DA3928"></path>
                                                             </svg>
                                                         @elseif ($k == 2)
                                                             <svg xmlns="http://www.w3.org/2000/svg" width="103"
                                                                 height="103" viewBox="0 0 103 103" fill="none">
                                                                 <circle cx="51.5076" cy="51.505" r="50.5"
                                                                     transform="rotate(-179.445 51.5076 51.505)"
                                                                     fill="white">
                                                                 </circle>
                                                                 <path
                                                                     d="M79.3117 72.2718C78.7618 72.2718 78.262 72.5119 77.9015 72.8988C77.541 73.2857 77.3174 73.8222 77.3174 74.4125C77.3174 75.0028 77.5411 75.5394 77.9015 75.9263C78.2619 76.3132 78.7618 76.5533 79.3117 76.5533C79.8616 76.5533 80.3614 76.3132 80.7219 75.9263C81.0824 75.5394 81.3059 75.0028 81.3059 74.4125C81.3059 73.8222 81.0823 73.2857 80.7219 72.8988C80.3615 72.5119 79.8616 72.2718 79.3117 72.2718ZM50.5137 66.3977C51.2582 66.3977 51.8607 67.0444 51.8607 67.8436C51.8607 68.6429 51.2582 69.2896 50.5137 69.2896H50.4926C49.7481 69.2896 49.1456 68.6429 49.1456 67.8436C49.1456 67.0444 49.7481 66.3977 50.4926 66.3977H50.5137ZM42.7973 41.3395H48.8983C49.6429 41.3395 50.2454 41.9862 50.2454 42.7855V46.9849H54.1575C54.9021 46.9849 55.5045 47.6316 55.5045 48.4309V54.98C55.5045 55.7792 54.9021 56.4259 54.1575 56.4259H50.2454V60.6254C50.2454 61.4246 49.6429 62.0713 48.8983 62.0713H42.7973C42.0527 62.0713 41.4502 61.4246 41.4502 60.6254V56.4259H37.5381C36.7935 56.4259 36.1911 55.7792 36.1911 54.98V48.4309C36.1911 47.6316 36.7935 46.9849 37.5381 46.9849H41.4502V42.7855C41.4502 41.9862 42.0527 41.3395 42.7973 41.3395ZM47.5513 44.2314H44.1443V48.4309C44.1443 49.2301 43.5418 49.8768 42.7973 49.8768H38.8851V53.534H42.7973C43.5418 53.534 44.1443 54.1807 44.1443 54.98V59.1794H47.5513V54.98C47.5513 54.1807 48.1538 53.534 48.8983 53.534H52.8105V49.8768H48.8983C48.1538 49.8768 47.5513 49.2301 47.5513 48.4309V44.2314ZM45.7334 66.4006C46.4779 66.4006 47.0804 67.0473 47.0804 67.8465C47.0804 68.6458 46.4779 69.2925 45.7334 69.2925H25.0411C23.9282 69.2925 22.918 68.8039 22.1865 68.0188C21.4552 67.2337 21 66.1493 21 64.9546V38.4563C21 37.2618 21.4551 36.1773 22.1865 35.3922C22.9179 34.6071 23.9282 34.1185 25.0411 34.1185H30.929V30.2297C30.929 28.2444 31.6894 26.4369 32.9101 25.1265C34.1256 23.8133 35.812 23 37.6642 23H54.0285C55.8754 23 57.5591 23.8133 58.7799 25.1237C60.0059 26.4398 60.7636 28.2472 60.7636 30.2297V34.1185H66.6542C67.7618 34.1185 68.772 34.6071 69.5035 35.3922C70.2402 36.1829 70.6953 37.2674 70.6953 38.4563V49.9501C73.9339 50.4528 76.8332 52.0767 79.0407 54.4461C81.7243 57.3267 83.3817 61.3059 83.3817 65.697C83.3817 66.756 83.2791 67.8094 83.0844 68.8459C82.9581 69.5208 82.7924 70.176 82.5898 70.8171L82.6266 70.8567C83.4738 71.766 84 73.0256 84 74.4151C84 75.8045 83.4738 77.0613 82.6266 77.9735C81.7795 78.8828 80.6061 79.4477 79.3117 79.4477C78.0173 79.4477 76.8465 78.8828 75.9967 77.9735C75.1496 77.0641 74.6234 75.8045 74.6234 74.4151C74.6234 73.0256 75.1496 71.766 75.9967 70.8567C76.8439 69.9473 78.0173 69.3825 79.3117 69.3825C79.6063 69.3825 79.8957 69.4107 80.1746 69.4672C80.2851 69.0775 80.3772 68.6821 80.4535 68.2811C80.6061 67.4677 80.6876 66.6008 80.6876 65.697C80.6876 62.1019 79.3301 58.8457 77.1359 56.4907C74.8471 54.0338 71.7742 52.6782 68.5594 52.6782C65.2103 52.6782 62.1768 54.1354 59.9829 56.4907C57.7888 58.846 56.4312 62.1022 56.4312 65.697C56.4312 68.5014 57.2494 71.0939 58.6439 73.2123C60.0829 75.3925 62.1298 77.0786 64.5187 77.9823C64.8476 78.1065 65.1712 78.1433 65.4737 78.0981C65.7815 78.0529 66.0841 77.9201 66.363 77.7083C66.6418 77.4965 66.8549 77.2339 66.9996 76.9374C67.1391 76.6465 67.2128 76.3076 67.2128 75.932V73.2293C65.8315 72.7746 64.6266 71.6591 63.6716 70.2668C62.4456 68.3973 61.3222 65.768 61.3222 63.4353C61.3222 61.9103 61.922 60.5293 62.8875 59.5324C63.8426 58.5496 65.1528 57.9396 66.5971 57.9396C67.3417 57.9396 67.9441 58.5864 67.9441 59.3856C67.9441 60.1848 67.3416 60.8315 66.5971 60.8315C65.871 60.8315 65.2185 61.1309 64.7502 61.611C64.2977 62.0798 64.0162 62.7237 64.0162 63.4353C64.0162 65.0789 64.9318 67.2704 65.8394 68.5582C66.6261 69.7048 67.589 70.5548 68.5598 70.5548C69.5306 70.5548 70.4961 69.7019 71.288 68.5554C72.4035 66.9343 73.106 64.8247 73.106 63.4353C73.106 62.7236 72.8245 62.0797 72.372 61.611C71.9063 61.1309 71.2512 60.8315 70.5251 60.8315C69.7805 60.8315 69.1781 60.1848 69.1781 59.3856C69.1781 58.5863 69.7805 57.9396 70.5251 57.9396C71.9668 57.9396 73.2796 58.5496 74.2346 59.5324C75.2002 60.5293 75.8 61.9103 75.8 63.4353C75.8 65.35 74.8897 68.1713 73.4454 70.2724C72.4903 71.6591 71.2854 72.7746 69.9068 73.2292V75.9319C69.9068 76.7678 69.7279 77.553 69.3885 78.259C69.0518 78.9594 68.5545 79.5694 67.9126 80.058C67.2733 80.5437 66.5708 80.8459 65.8447 80.9532C65.1133 81.0634 64.3635 80.9787 63.6268 80.7019C60.7065 79.5949 58.2071 77.5333 56.4526 74.8701C54.7451 72.2719 53.7401 69.1033 53.7401 65.6971C53.7401 61.3028 55.4002 57.3236 58.0811 54.4462C60.641 51.6983 64.1349 49.9502 68.0073 49.7977V38.4586C68.0073 38.0604 67.8547 37.6989 67.6127 37.4363C67.368 37.1765 67.0313 37.0127 66.6603 37.0127H25.0474C24.679 37.0127 24.3423 37.1765 24.0976 37.4391C23.8529 37.7018 23.7003 38.0632 23.7003 38.4586V64.957C23.7003 65.3524 23.8529 65.7138 24.0976 65.9765C24.3423 66.2392 24.679 66.4029 25.0474 66.4029H45.7397L45.7334 66.4006ZM33.6236 34.1214H58.0701V30.2326C58.0701 29.038 57.6149 27.9508 56.8862 27.1684C56.1522 26.3805 55.1419 25.892 54.0264 25.892H37.6621C36.5519 25.892 35.5416 26.3805 34.8075 27.1684C34.0735 27.9507 33.6184 29.0351 33.6184 30.2326V34.1214H33.6236Z"
                                                                     fill="#DA3928"></path>
                                                             </svg>
                                                         @elseif ($k == 3)
                                                             <svg xmlns="http://www.w3.org/2000/svg" width="103"
                                                                 height="103" viewBox="0 0 103 103" fill="none">
                                                                 <circle cx="51.5076" cy="51.505" r="50.5"
                                                                     transform="rotate(-179.445 51.5076 51.505)"
                                                                     fill="white">
                                                                 </circle>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M80.4734 84.9959H22.7767C22.3479 84.9959 22 84.6683 22 84.2646V70.8337C22 63.0256 28.7477 56.6719 37.0392 56.6719H41.811C42.2397 56.6719 42.5876 56.9995 42.5876 57.4032C42.5876 57.8069 42.2397 58.1346 41.811 58.1346H37.0392C29.6018 58.1346 23.5532 63.8304 23.5532 70.8338V83.533H79.6968V70.8338C79.6968 63.8303 73.6481 58.1346 66.2108 58.1346H61.439C61.0103 58.1346 60.6624 57.8069 60.6624 57.4032C60.6624 56.9995 61.0103 56.6719 61.439 56.6719H66.2108C74.5027 56.6719 81.25 63.0259 81.25 70.8337V84.2646C81.25 84.6683 80.9053 84.9959 80.4734 84.9959Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M51.6268 53.9401C44.1833 53.9401 38.125 48.2385 38.125 41.2289V33.289C38.125 32.8853 38.4729 32.5577 38.9017 32.5577C39.3335 32.5577 39.6783 32.8853 39.6783 33.289V41.2259C39.6783 47.4278 45.0373 52.4745 51.6238 52.4745C58.2102 52.4745 63.5692 47.4282 63.5692 41.2259V33.286C63.5692 32.8823 63.9171 32.5547 64.3459 32.5547C64.7746 32.5547 65.1225 32.8823 65.1225 33.286V41.223C65.1225 48.2323 59.0676 53.9341 51.6239 53.9341L51.6268 53.9401Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M38.8964 40.389H37.4176C35.1218 40.389 33.2578 38.6308 33.2578 36.4718C33.2578 34.31 35.1249 32.5547 37.4176 32.5547H38.8964C39.3283 32.5547 39.6731 32.8823 39.6731 33.286C39.6731 33.6897 39.3283 34.0174 38.8964 34.0174H37.4207C35.9824 34.0174 34.8143 35.1174 34.8143 36.4718C34.8143 37.8262 35.9824 38.9262 37.4207 38.9262H38.8995C39.3314 38.9262 39.6762 39.2538 39.6762 39.6575C39.6762 40.0612 39.3314 40.3889 38.8995 40.3889L38.8964 40.389Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M65.8258 40.3889H64.347C63.9183 40.3889 63.5703 40.0612 63.5703 39.6575C63.5703 39.2538 63.9183 38.9262 64.347 38.9262H65.8258C67.261 38.9262 68.4322 37.8262 68.4322 36.4718C68.4322 35.1174 67.261 34.0174 65.8258 34.0174H64.347C63.9183 34.0174 63.5703 33.6897 63.5703 33.286C63.5703 32.8823 63.9183 32.5547 64.347 32.5547H65.8258C68.1216 32.5547 69.9856 34.3129 69.9856 36.4718C69.9856 38.6308 68.1185 40.3889 65.8258 40.3889Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M66.7833 34.148C66.3546 34.148 66.0067 33.8204 66.0067 33.4167V30.9389C66.0067 24.6112 60.539 19.4626 53.8163 19.4626H49.439C42.7163 19.4626 37.2486 24.6113 37.2486 30.9389V33.4167C37.2486 33.8204 36.9007 34.148 36.472 34.148C36.0433 34.148 35.6953 33.8204 35.6953 33.4167V30.9389C35.6953 23.8038 41.8589 18 49.4357 18H53.813C61.3901 18 67.5534 23.804 67.5534 30.9419V33.4197C67.5534 33.8234 67.2055 34.151 66.7768 34.151L66.7833 34.148Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M39.3653 34.0272C39.2038 34.0272 39.0391 34.0243 38.8682 34.0155C38.4395 33.998 38.1071 33.6557 38.1257 33.252C38.1444 32.8483 38.5048 32.5353 38.9366 32.5557C42.6459 32.7137 43.2579 30.9117 43.8451 29.1711C44.0532 28.5479 44.2521 27.9599 44.6031 27.5241C44.746 27.3485 44.9666 27.2403 45.2027 27.2344C45.445 27.2315 45.6625 27.3222 45.8147 27.4919C45.9669 27.6586 49.6328 31.6167 54.8644 30.2739C61.0591 28.6825 64.7811 32.6376 64.9361 32.8073C65.2188 33.1116 65.1816 33.5738 64.8554 33.84C64.5323 34.1033 64.0415 34.0711 63.7587 33.7639C63.6282 33.6264 60.4998 30.3412 55.2713 31.684C54.3641 31.9151 53.5004 32.0146 52.6865 32.0175C49.2785 32.0175 46.7032 30.2769 45.4574 29.2208C45.4139 29.3466 45.3673 29.4782 45.3238 29.6098C44.7646 31.2774 43.8388 34.0272 39.3621 34.0272L39.3653 34.0272Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M43.6829 56.816C43.2542 56.816 42.9062 56.4883 42.9062 56.0846V50.5673C42.9062 50.1636 43.2542 49.8359 43.6829 49.8359C44.1116 49.8359 44.4596 50.1636 44.4596 50.5673V56.0846C44.4596 56.4883 44.1116 56.816 43.6829 56.816Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M59.5657 56.816C59.137 56.816 58.7891 56.4883 58.7891 56.0846V50.5673C58.7891 50.1636 59.137 49.8359 59.5657 49.8359C59.9975 49.8359 60.3424 50.1636 60.3424 50.5673V56.0846C60.3424 56.4883 59.9944 56.816 59.5657 56.816Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M41.0577 67.5104L49.6199 79.9902L43.2327 57.3208L39.7346 59.7781L42.4002 62.5397C42.5866 62.7357 42.6518 63.0107 42.5617 63.2623L41.0581 67.5071L41.0577 67.5104ZM51.6296 84.9989C51.3718 84.9989 51.1233 84.8789 50.9741 84.6625L39.5512 68.0083C39.4238 67.821 39.3897 67.5899 39.4642 67.3793L40.943 63.2077L38.0072 60.1682C37.8612 60.016 37.7867 59.8113 37.8084 59.6065C37.8302 59.4017 37.942 59.2145 38.116 59.0916L43.2202 55.505C43.4284 55.3587 43.6986 55.3207 43.941 55.3997C44.1864 55.4787 44.3697 55.6688 44.4349 55.9029L52.3755 84.0775C52.4749 84.4256 52.2885 84.7884 51.9406 84.9346C51.8381 84.9756 51.7324 84.9961 51.6268 84.9961L51.6296 84.9989Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M60.0264 57.3217L53.6392 79.9911L62.2014 67.5113L60.6978 63.2665C60.6077 63.0149 60.6699 62.74 60.8594 62.5439L63.528 59.7824L60.0269 57.325L60.0264 57.3217ZM51.6289 84.9961C51.5232 84.9961 51.4176 84.9756 51.3151 84.9346C50.964 84.7883 50.7807 84.4256 50.877 84.0775L58.8177 55.9029C58.8829 55.6688 59.0693 55.4787 59.3116 55.3997C59.557 55.3207 59.8273 55.3588 60.0324 55.505L65.1397 59.0916C65.3137 59.2145 65.4255 59.4017 65.4473 59.6094C65.469 59.8142 65.3976 60.019 65.2484 60.1711L62.3127 63.2106L63.7914 67.3822C63.866 67.5929 63.8349 67.824 63.7076 68.0112L52.2815 84.6654C52.1355 84.8789 51.8838 85.0018 51.6291 85.0018L51.6289 84.9961Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M51.6252 59.6866C48.8136 59.6866 46.0021 58.6802 43.2093 56.6646C42.8707 56.4189 42.8054 55.9596 43.0664 55.6378C43.3273 55.316 43.8151 55.2575 44.1568 55.5032C49.1834 59.1308 54.0703 59.1308 59.0934 55.5032C59.4351 55.2575 59.9229 55.3189 60.1838 55.6378C60.4448 55.9596 60.3826 56.4189 60.0409 56.6646C57.2512 58.6773 54.4365 59.6866 51.6282 59.6866H51.6252Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M32.851 64.7548C30.8876 64.7548 29.2877 66.2585 29.2877 68.1103C29.2877 69.9592 30.8876 71.4658 32.851 71.4658C34.8145 71.4658 36.4113 69.9621 36.4113 68.1103C36.4113 66.2614 34.8145 64.7548 32.851 64.7548ZM32.851 72.9254C30.0302 72.9254 27.7344 70.7635 27.7344 68.1072C27.7344 65.4509 30.0302 63.2891 32.851 63.2891C35.6719 63.2891 37.9646 65.4509 37.9646 68.1072C37.9646 70.7635 35.6688 72.9254 32.851 72.9254Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M74.7426 72.9225H72.4623C72.0336 72.9225 71.6857 72.5949 71.6857 72.1912C71.6857 71.7875 72.0336 71.4598 72.4623 71.4598H73.969V66.2614C73.969 65.4276 73.2483 64.7519 72.366 64.7519H68.4454C67.5631 64.7519 66.8424 65.4276 66.8424 66.2614V71.4598H68.346C68.7747 71.4598 69.1227 71.7875 69.1227 72.1912C69.1227 72.5949 68.7747 72.9225 68.346 72.9225H66.0657C65.637 72.9225 65.2891 72.5949 65.2891 72.1912V66.2613C65.2891 64.6231 66.7057 63.2891 68.4423 63.2891H72.3629C74.1026 63.2891 75.5193 64.623 75.5193 66.2613V72.1912C75.5193 72.5949 75.1713 72.9225 74.7426 72.9225Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M32.8548 64.7526C32.423 64.7526 32.0781 64.4249 32.0781 64.0212V60.1421C32.0781 59.1124 32.4323 58.1382 33.1064 57.322C33.3705 57.0031 33.8583 56.9446 34.1969 57.1933C34.5355 57.442 34.5976 57.9012 34.3336 58.2201C33.8738 58.776 33.6315 59.4429 33.6315 60.1421V64.0183C33.6315 64.422 33.2835 64.7497 32.8548 64.7497L32.8548 64.7526ZM70.405 64.7526C69.9763 64.7526 69.6283 64.4249 69.6283 64.0212V60.1421C69.6283 59.44 69.386 58.7759 68.9262 58.2201C68.6621 57.9012 68.7243 57.4419 69.0629 57.1933C69.4015 56.9446 69.8893 57.0031 70.1533 57.322C70.8275 58.1382 71.1817 59.1123 71.1817 60.1421V64.0183C71.1817 64.422 70.8337 64.7496 70.405 64.7496L70.405 64.7526Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M70.8313 82.0107C70.4026 82.0107 70.0547 81.686 70.0547 81.2793V75.3642C70.0547 74.9605 70.4026 74.6328 70.8313 74.6328C71.2632 74.6328 71.608 74.9605 71.608 75.3642V81.2764C71.608 81.683 71.2601 82.0078 70.8313 82.0078V82.0107Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M73.9692 79.0565H67.6907C67.262 79.0565 66.9141 78.7288 66.9141 78.3251C66.9141 77.9214 67.2589 77.5938 67.6907 77.5938H73.9692C74.398 77.5938 74.7459 77.9214 74.7459 78.3251C74.7459 78.7288 74.398 79.0565 73.9692 79.0565Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M30.0615 79.661H40.4036V77.0018H30.0615V79.661ZM41.1798 81.1237H29.2845C28.8558 81.1237 28.5078 80.796 28.5078 80.3923V76.2704C28.5078 75.8667 28.8558 75.5391 29.2845 75.5391H41.1798C41.6085 75.5391 41.9565 75.8667 41.9565 76.2704V80.3923C41.9565 80.796 41.6085 81.1237 41.1798 81.1237Z"
                                                                     fill="#DA3928"></path>
                                                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                                                     d="M32.8564 67.364C32.4184 67.364 32.0611 67.7005 32.0611 68.113C32.0611 68.5254 32.4184 68.8619 32.8564 68.8619C33.2945 68.8619 33.6486 68.5254 33.6486 68.113C33.6486 67.7005 33.2913 67.364 32.8564 67.364ZM32.8564 70.3216C31.561 70.3216 30.5078 69.3299 30.5078 68.11C30.5078 66.8901 31.561 65.8984 32.8564 65.8984C34.1488 65.8984 35.2019 66.8901 35.2019 68.11C35.2019 69.3299 34.1488 70.3216 32.8564 70.3216Z"
                                                                     fill="#DA3928"></path>
                                                             </svg>
                                                         @endif
                                                     </div>
                                                     <div class="count-outer count-box">
                                                         <span class="odometer" data-count="">00</span><span></span>
                                                     </div>
                                                     <p>{{ $feature->{'title_' . $sign}  ?? ''}} </p>
                                                     <p>{{ $feature->{'details_' . $sign}  ?? ''}} </p>
                                                 </div>
                                             </div>
                                         </div>
                                     @endforeach
                                     
                                 </div>
                             </div>
                         </section>
                         <!-- funfact-section end -->

                     </div>
                 </div>
             </div> 
             
             <div class="elementor-element elementor-element-9f07c58 e-con-full e-flex e-con e-parent" data-id="9f07c58"
                 data-element_type="container">
                 <div class="elementor-element elementor-element-108080a elementor-widget elementor-widget-labout_team_grid"
                     data-id="108080a" data-element_type="widget" data-widget_type="labout_team_grid.default">
                     <div class="elementor-widget-container">


                         <!-- team-section -->
                         <section class="team-section pt_120 pb_90 centred">
                             <div class="bg-layer"
                                 style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/team-bg.webp');">
                             </div>
                             <div class="pattern-layer"
                                 style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/shape-10.webp');">
                             </div>
                             <div class="auto-container">
                                 <div class="sec-title mb_70 sec-title-animation animation-style2">
                                     <span class="sub-title mb_20 title-animation">Team Members</span>
                                     <h2 class="title-animation">Our Doctors</h2>
                                 </div>
                                 <div class="row clearfix">

                                    @foreach ($doctors as $doctor)
                                        
                                     <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                                         <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                             data-wow-duration="1500ms">
                                             <div class="inner-box">
                                                 <div class="image-box">
                                                     <figure class="image"><img decoding="async" width="280"
                                                             height="340"
                                                             src="{{ $doctor->photo_url }}"
                                                             class="attachment-labout_300x340 size-labout_300x340 wp-post-image"
                                                             alt="" /></figure>
                                                     <ul class="social-links">
                                                         <li><a href="{{ $doctor->facebook }}"><i
                                                                     class="fab  fa-facebook-f"></i></a></li>
                                                         <li><a href="{{ $doctor->twitter }}"><i
                                                                     class="fab  fa-twitter"></i></a></li>
                                                         <li><a href="{{ $doctor->linkedin }}"><i
                                                                     class="fab  fa-linked-in"></i></a></li>
                                                     </ul>
                                                 </div>
                                                 <div class="lower-content">
                                                     <h3><a
                                                             href="#">{{ $doctor->{'name_' . $sign}  ?? ''}}</a></h3>
                                                     <span class="designation">{{ $doctor->{'title_' . $sign}  ?? ''}}</span>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
 
                                    @endforeach
                                 </div>
                             </div>
                         </section>
                         <!-- team-section end -->

                     </div>
                 </div>
             </div>
{{-- 
             <div class="elementor-element elementor-element-8e5d3ca e-con-full e-flex e-con e-parent" data-id="8e5d3ca"
                 data-element_type="container">
                 <div class="elementor-element elementor-element-a1c0e71 elementor-widget elementor-widget-labout_events_grid_view"
                     data-id="a1c0e71" data-element_type="widget" data-widget_type="labout_events_grid_view.default">
                     <div class="elementor-widget-container">


                         <!-- events-section -->
                         <section class="events-section pt_120">
                             <div class="bg-layer parallax-bg" data-parallax='{"y": 100}'
                                 style="background-image: url('https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/events-bg.jpg');">
                             </div>
                             <div class="auto-container">
                                 <div class="sec-title mb_70 centred sec-title-animation animation-style2">
                                     <span class="sub-title mb_20 title-animation">Events</span>
                                     <h2 class="title-animation">Upcoming Events</h2>
                                 </div>
                                 <div class="row clearfix">
                                     <div class="col-lg-4 col-md-6 col-sm-12 events-block">
                                         <div class="events-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                             data-wow-duration="1500ms">
                                             <div class="inner-box">
                                                 <figure class="image-box">
                                                     <a
                                                         href="https://azure-sardine-328383.hostingersite.com/event/decade-of-action-on-nutrition-and-global-initiatives/">
                                                         <img fetchpriority="high" decoding="async" width="390"
                                                             height="241"
                                                             src="https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/events-bg-2-390x241.jpg"
                                                             class="attachment-labout_390x241 size-labout_390x241 wp-post-image"
                                                             alt="" /> </a>
                                                 </figure>
                                                 <div class="lower-content">
                                                     <div class="post-date">
                                                         <h2>24<span>Jun</span></h2>
                                                     </div>
                                                     <span class="location-box"><i class="icon-18"></i>United State</span>
                                                     <h3><a
                                                             href="https://azure-sardine-328383.hostingersite.com/event/decade-of-action-on-nutrition-and-global-initiatives/">Decade
                                                             of Action on Nutrition and Global Initiatives</a></h3>
                                                     <p>Managing interactions customers throughout the entire customer
                                                         lifecycle of&hellip;</p>
                                                     <div class="speakers-box">
                                                         <ul class="speakers-list">
                                                             <li><img decoding="async"
                                                                     src="https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/speakers-1.png"
                                                                     alt="azure-sardine-328383.hostingersite.com"></li>
                                                             <li><img decoding="async"
                                                                     src="https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/speakers-2.png"
                                                                     alt="azure-sardine-328383.hostingersite.com"></li>
                                                             <li><img decoding="async"
                                                                     src="https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/speakers-3.png"
                                                                     alt="azure-sardine-328383.hostingersite.com"></li>
                                                         </ul>
                                                         <div class="text">
                                                             <h6>10+</h6> <span>Speakers</span>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-4 col-md-6 col-sm-12 events-block">
                                         <div class="events-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                             data-wow-duration="1500ms">
                                             <div class="inner-box">
                                                 <figure class="image-box">
                                                     <a
                                                         href="https://azure-sardine-328383.hostingersite.com/event/decade-of-action-on-nutrition-and-global-initiatives-2/">
                                                         <img fetchpriority="high" decoding="async" width="390"
                                                             height="241"
                                                             src="https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/events-bg-2-390x241.jpg"
                                                             class="attachment-labout_390x241 size-labout_390x241 wp-post-image"
                                                             alt="" /> </a>
                                                 </figure>
                                                 <div class="lower-content">
                                                     <div class="post-date">
                                                         <h2>24<span>Jun</span></h2>
                                                     </div>
                                                     <span class="location-box"><i class="icon-18"></i>United State</span>
                                                     <h3><a
                                                             href="https://azure-sardine-328383.hostingersite.com/event/decade-of-action-on-nutrition-and-global-initiatives-2/">Decade
                                                             of Action on Nutrition and Global Initiatives</a></h3>
                                                     <p>Managing interactions customers throughout the entire customer
                                                         lifecycle of&hellip;</p>
                                                     <div class="speakers-box">
                                                         <ul class="speakers-list">
                                                             <li><img decoding="async"
                                                                     src="https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/speakers-1.png"
                                                                     alt="azure-sardine-328383.hostingersite.com"></li>
                                                             <li><img decoding="async"
                                                                     src="https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/speakers-2.png"
                                                                     alt="azure-sardine-328383.hostingersite.com"></li>
                                                             <li><img decoding="async"
                                                                     src="https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/speakers-3.png"
                                                                     alt="azure-sardine-328383.hostingersite.com"></li>
                                                         </ul>
                                                         <div class="text">
                                                             <h6>10+</h6> <span>Speakers</span>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-4 col-md-6 col-sm-12 events-block">
                                         <div class="events-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                             data-wow-duration="1500ms">
                                             <div class="inner-box">
                                                 <figure class="image-box">
                                                     <a
                                                         href="https://azure-sardine-328383.hostingersite.com/event/the-researche-team-is-filled-with-disciplinary/">
                                                         <img decoding="async" width="390" height="241"
                                                             src="https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/testimonial-bg-390x241.jpg"
                                                             class="attachment-labout_390x241 size-labout_390x241 wp-post-image"
                                                             alt="" /> </a>
                                                 </figure>
                                                 <div class="lower-content">
                                                     <div class="post-date">
                                                         <h2>10<span>Jul</span></h2>
                                                     </div>
                                                     <span class="location-box"><i class="icon-18"></i>United State</span>
                                                     <h3><a
                                                             href="https://azure-sardine-328383.hostingersite.com/event/the-researche-team-is-filled-with-disciplinary/">The
                                                             researche team is filled with disciplinary</a></h3>
                                                     <p>Managing interactions customers throughout the entire customer
                                                         lifecycle of&hellip;</p>
                                                     <div class="speakers-box">
                                                         <ul class="speakers-list">
                                                             <li><img decoding="async"
                                                                     src="https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/speakers-1.png"
                                                                     alt="azure-sardine-328383.hostingersite.com"></li>
                                                             <li><img decoding="async"
                                                                     src="https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/speakers-2.png"
                                                                     alt="azure-sardine-328383.hostingersite.com"></li>
                                                             <li><img decoding="async"
                                                                     src="https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2024/05/speakers-3.png"
                                                                     alt="azure-sardine-328383.hostingersite.com"></li>
                                                         </ul>
                                                         <div class="text">
                                                             <h6>10+</h6> <span>Speakers</span>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="more-btn centred pt_30">
                                     <a href="https://azure-sardine-328383.hostingersite.com/our-events/"
                                         class="theme-btn btn-one">View All
                                         Events<span></span><span></span><span></span><span></span></a>
                                 </div>
                             </div>
                         </section>
                         <!-- events-section end -->

                     </div>
                 </div>
             </div>

              --}}
             <div class="elementor-element elementor-element-e0022cb e-con-full e-flex e-con e-parent" data-id="e0022cb"
                 data-element_type="container">
                 <div class="elementor-element elementor-element-59b80f4 elementor-widget elementor-widget-labout_feature_services"
                     data-id="59b80f4" data-element_type="widget" data-widget_type="labout_feature_services.default">
                     <div class="elementor-widget-container">


                         <!-- journey-section -->
                         <section class="journey-section">
                             <div class="bg-box">
                                 <div class="bg-layer parallax-bg" data-parallax='{"y": 100}'
                                     style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/journey-bg.jpg');">
                                 </div>
                             </div>
                             <div class="auto-container">
                                 <div class="inner-container pt_120 pb_120">
                                     <div class="sec-title light mb_70 sec-title-animation animation-style2">
                                         <span class="sub-title mb_20 title-animation">Our Timeline</span>
                                         <h2 class="title-animation">Our Journey Map</h2>
                                     </div>
                                     <div class="slider-content p_relative">
                                         <div class="border-line"></div>
                                         <div class="journey-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                                            
                                            @foreach ($timelines as $timeline)
                                                
                                            <div class="journey-block-one">
                                                 <div class="inner-box">
                                                     <span class="year">{{ $timeline->year }}</span>
                                                     <span class="decore"></span>
                                                     <figure class="image-box"><img decoding="async"
                                                             src="{{ $timeline->photo_url }}"
                                                             alt="azure-sardine-328383.hostingersite.com"></figure>
                                                     <h3><a
                                                             href="#">{{ $timeline->{'title_' . $sign}  ?? ''}}</a></h3>
                                                     <p>{{ $timeline->{'details_' . $sign}  ?? ''}}</p>
                                                 </div>
                                             </div>

                                            @endforeach
 
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </section>
                         <!-- journey-section end -->


                     </div>
                 </div>
             </div>
         
             <div class="elementor-element elementor-element-b6f0510 e-con-full e-flex e-con e-parent" data-id="b6f0510"
                 data-element_type="container">
                 <div class="elementor-element elementor-element-6a9f3e2 elementor-widget elementor-widget-labout_testimonials_carousel"
                     data-id="6a9f3e2" data-element_type="widget"
                     data-widget_type="labout_testimonials_carousel.default">
                     <div class="elementor-widget-container">



                         <!-- testimonial-section -->
                         <section class="testimonial-section pt_120 pb_120">
                             <div class="auto-container">
                                 <div class="sec-title centred mb_70 sec-title-animation animation-style2">
                                     <span class="sub-title mb_20 title-animation">Testimonials</span>
                                     <h2 class="title-animation">Love from Clients</h2>
                                 </div>
                                 <div class="two-item-carousel owl-carousel owl-theme dots-style-one owl-nav-none">
                                    @foreach ($testimonials as $testimonial)
                                      <div class="testimonial-block-one">
                                         <div class="inner-box">
                                             <div class="icon-box">
                                                 <div class="r-hex">
                                                     <div class="r-hex-inner"></div>
                                                 </div>
                                                 <div class="icon"><i class="icon-35"></i></div>
                                             </div>
                                             <p > {{ $timeline->{'details_' . $sign}  ?? ''}}     </p>
                                             <div class="lower-box">
                                                 <div class="author-box">
                                                     <figure class="thumb-box">
                                                         <img loading="lazy" decoding="async" width="70"
                                                             height="70"
                                                             src="{{ $testimonial->photo_url }}"
                                                             class="attachment-labout_70x70 size-labout_70x70 wp-post-image"
                                                             alt="{{ $timeline->{'name_' . $sign}  ?? ''}}"
                                                             srcset="{{ $testimonial->photo_url }} 70w, {{ $testimonial->photo_url }} 90w, {{ $testimonial->photo_url }} 97w, {{ $testimonial->photo_url }} 120w"
                                                             sizes="(max-width: 70px) 100vw, 70px" />
                                                     </figure>
                                                     <h3>{{ $timeline->{'name_' . $sign}  ?? ''}}</h3>
                                                     <span class="designation">{{ $timeline->{'job_' . $sign}  ?? ''}}</span>
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
             <div class="elementor-element elementor-element-ae6aedc e-flex e-con-boxed e-con e-parent" data-id="ae6aedc"
                 data-element_type="container">
                 <div class="e-con-inner">
                     <div class="elementor-element elementor-element-cb1b585 e-con-full e-flex e-con e-child"
                         data-id="cb1b585" data-element_type="container">
                         <div class="elementor-element elementor-element-5e3f31a elementor-widget elementor-widget-html"
                             data-id="5e3f31a" data-element_type="widget" data-widget_type="html.default">
                             <div class="elementor-widget-container">
                                 {{-- <iframe
                                     src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d451498.71712793066!2d33.69471848906249!3d27.861017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14533a3cb9c519ed%3A0xc400b9b192ca5e0b!2sSinai%20Clinic%20Hospital!5e0!3m2!1sen!2sus!4v1744159653201!5m2!1sen!2sus"
                                     width="600" height="650" style="border:0;" allowfullscreen="" loading="lazy"
                                     referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

                                     {!! $ps->map !!}
                             </div>
                         </div>
                     </div>
                     <div class="elementor-element elementor-element-6a0f2c1 e-con-full e-flex e-con e-child"
                         data-id="6a0f2c1" data-element_type="container">
                         <div class="elementor-element elementor-element-8e60316 elementor-widget elementor-widget-labout_form"
                             data-id="8e60316" data-element_type="widget" data-widget_type="labout_form.default">
                             <div class="elementor-widget-container">


                                 <!-- contact-section -->
                                 <section class="contact-section pt_120 pb_180">
                                     <div class="auto-container">
                                         <div class="sec-title mb_70 centred sec-title-animation animation-style2">
                                             <span class="sub-title mb_20 title-animation">Send Message</span>
                                             <h2 class="title-animation">Get in Touch</h2>
                                         </div>
                                         <div class="form-inner">
                                             <div id="contact-form">

                                                 <div class="wpcf7 no-js" id="wpcf7-f934-p19-o1" lang="en-US"
                                                     dir="ltr" data-wpcf7-id="934">
                                                     <div class="screen-reader-response">
                                                         <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                         <ul></ul>
                                                     </div>
                                                     {{-- <form action="/#wpcf7-f934-p19-o1" method="post"
                                                         class="wpcf7-form init" aria-label="Contact form"
                                                         novalidate="novalidate" data-status="init"> --}}
<form action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST" autocomplete="off" class="cons-contact-form wpcf7-form init">
                            {{csrf_field()}}
                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>
                                                         
                                                         <div class="row clearfix">
                                                             <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                                 <p><span class="wpcf7-form-control-wrap"
                                                                         data-name="text-178"><input size="40"
                                                                             maxlength="400"
                                                                             class="fname wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                             aria-required="true" aria-invalid="false"
                                                                             placeholder="Your name" name="name" value=""
                                                                             type="text" name="text-178" /></span>
                                                                 </p>
                                                             </div>
                                                             <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                                 <p><span class="wpcf7-form-control-wrap"
                                                                         data-name="email-979"><input size="40"
                                                                             maxlength="400"
                                                                             class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email"
                                                                             aria-required="true" name="email"  aria-invalid="false"
                                                                             placeholder="Your email" value=""
                                                                             type="email" name="email-979" /></span>
                                                                 </p>
                                                             </div>
                                                             <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                                 <p><span class="wpcf7-form-control-wrap"
                                                                         data-name="text-179"><input size="40"
                                                                             maxlength="400"
                                                                             class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                             aria-required="true" aria-invalid="false"
                                                                             placeholder="Phone"  name="phone"   value=""
                                                                             type="text" name="text-179" /></span>
                                                                 </p>
                                                             </div>
                                                             <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                                 <p><span class="wpcf7-form-control-wrap"
                                                                         data-name="text-180"><input size="40"
                                                                             maxlength="400"
                                                                             class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                             aria-required="true" aria-invalid="false"
                                                                             placeholder="Subject"   name="subject"   value=""
                                                                             type="text" name="text-180" /></span>
                                                                 </p>
                                                             </div>
                                                             <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                                 <p><span class="wpcf7-form-control-wrap"
                                                                         data-name="textarea-481">
                                                                         <textarea cols="40" rows="10" maxlength="2000"
                                                                             class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false"
                                                                             placeholder="Type message" name="text"></textarea>
                                                                     </span>
                                                                 </p>
                                                             </div>
                                                             <div
                                                                 class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                                                                 <p><button type="submit" class="theme-btn"
                                                                         name="submit-form">Ask
                                                                         Question<span></span><span></span><span></span><span></span></button>
                                                                 </p>
                                                             </div>
                                                         </div>
                                                         <div class="wpcf7-response-output" aria-hidden="true"></div>
                                                     </form>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </section>
                                 <!-- contact-section end -->

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>


         <div class="clearfix"></div>


     </main>
     <!-- main-content end -->
     <!-- main-footer -->



 @stop

 <!-- Page cached by LiteSpeed Cache 7.0.0.1 on 2025-05-08 11:21:56 -->
