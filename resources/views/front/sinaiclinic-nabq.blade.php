  @extends('layouts.front')

  @section('title')

      {{ __('Sinaiclinic Nabq') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop

  @section('css')
      <link rel='stylesheet' id='elementor-post-2524-css'
          href='{{ asset('front/sinai_clinic/') }}/css/post-2524.css?ver=1745740192' type='text/css' media='all' />

  @stop
  @section('content')


      <!-- main-content -->
      <main class="main-content alternat-2">

          <!-- page-title -->
          <section class="page-title centred">
              <div class="bg-layer"></div>
              <div class="auto-container">
                  <div class="content-box">
                      <h2>   {{ __('Sinaiclinic Nabq') }} </h2>
                      <ul class="bread-crumb">
                          <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a>
                          </li>
                          <li class="breadcrumb-item"> {{ __('Sinaiclinic Nabq') }}   </li>
                      </ul>
                  </div>
              </div>
          </section>
          <!-- page-title end -->


          <!-- sidebar-page-container -->
          <section class="sidebar-page-container p_relative pt_120 pb_180 te-page__custom">
              <div class="auto-container">
                  <div class="row clearfix">

                      <div class="content-side col-lg-12  col-md-12 col-sm-12 content-column">
                          <div class="blog-details-content">
                              <div class="thm-unit-test">

                                  <div data-elementor-type="wp-page" data-elementor-id="2524"
                                      class="elementor elementor-2524" data-elementor-post-type="page">
                                      <div class="elementor-element elementor-element-0dbc026 e-con-full e-flex e-con e-parent"
                                          data-id="0dbc026" data-element_type="container">
                                          <div class="elementor-element elementor-element-4e5f3d0 elementor-widget elementor-widget-labout_feature_services"
                                              data-id="4e5f3d0" data-element_type="widget"
                                              data-widget_type="labout_feature_services.default">
                                              <div class="elementor-widget-container">


                                                  <!-- chooseus-section -->
                                                  <section class="chooseus-section pt_120 pb_90 centred">
                                                      <div class="auto-container">
                                                          <div class="sec-title mb_70 sec-title-animation animation-style2">
                                                              <span class="sub-title mb_20 title-animation">{{ __('Our Services') }}</span>
                                                              <h2 class="title-animation">{{ __('We Provide Reliable Services') }}</h2>
                                                          </div>
                                                          <div class="row clearfix">
                                                                @foreach ($services as $service)
                                                                 <div class="col-lg-3 col-md-6 col-sm-12 chooseus-block">
                                                                  <div
                                                                      class="chooseus-block-one p_relative z_1 title-animation">
                                                                      <div class="inner-box">
                                                                          <div class="bg-layer"></div>
                                                                          <div class="icon-box">
                                                                              <div class="r-hex">
                                                                                  <div class="r-hex-inner"></div>
                                                                              </div>
                                                                              <div class="icon">
                                                                                  <i class="icon-mail"></i>
                                                                              </div>
                                                                          </div>
                                                                          <h3><a href="{{ route('single-service.index', ['slug' => $service->{'slug_' . $sign}]) }}" target="_blank"
                                                                                  rel="nofollow"> {{ $service->{'title_' . $sign} }}
                                                                                   </a></h3>
                                                                          <p>{{ $service->{'short_details_' . $sign} }}</p>
                                                                          <div class="btn-box p_relative">
                                                                              <div class="link-icon"><a href="{{ route('single-service.index', ['slug' => $service->{'slug_' . $sign}]) }}"
                                                                                      target="_blank"
                                                                                      rel="nofollow"><i
                                                                                          class="icon-23"></i></a></div>
                                                                              <div class="link-text"><a href="{{ route('single-service.index', ['slug' => $service->{'slug_' . $sign}]) }}"
                                                                                      target="_blank"
                                                                                      rel="nofollow">{{ __('Get Service') }}</a></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                           
                                                                @endforeach
                                                             
                                                          </div>
                                                      </div>
                                                  </section>
                                                  <!-- chooseus-section end -->


                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="clearfix"></div>



                              </div>
                          </div>
                      </div>

                  </div>
              </div>
          </section><!-- blog section with pagination -->


          <div class="clearfix"></div>


      </main>
      <!-- main-content end -->
  @stop
