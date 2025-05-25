  @extends('layouts.front')

  @section('title')

      {{ __('Contact') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop


  @section('content')
      @php
          $phones = explode(',', $gs->phones);
          $emails = explode(',', $gs->emails);
          $addresses = json_decode($gs->{'addresses_' . $sign});
          $randomPhone = Arr::random($phones);
      @endphp

      <!-- main-content -->
      <main class="main-content alternat-2">


          <!-- page-title -->
          <section class="page-title centred">
              <div class="bg-layer" style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/page-title-5.jpg');">
              </div>
              <div class="pattern-layer"
                  style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/shape-53.png');">
              </div>
              <div class="auto-container">
                  <div class="content-box">
                      <h2>{{ __('Contact') }}</h2>
                      <ul class="bread-crumb">
                          <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a>
                          </li>
                          <li class="breadcrumb-item">{{ __('Contact') }}</li>
                      </ul>
                  </div>
              </div>
          </section>
          <!-- page-title end -->

          <div data-elementor-type="wp-page" data-elementor-id="64" class="elementor elementor-64"
              data-elementor-post-type="page">
              <div class="elementor-element elementor-element-ab60348 e-con-full e-flex e-con e-parent" data-id="ab60348"
                  data-element_type="container">
                  <div class="elementor-element elementor-element-80bd85a elementor-widget elementor-widget-labout_call_to_action"
                      data-id="80bd85a" data-element_type="widget" data-widget_type="labout_call_to_action.default">
                      <div class="elementor-widget-container">


                          <!-- contact-info-section -->
                          <section class="contact-info-section pt_120 pb_90 centred">
                              <div class="auto-container">
                                  <div class="sec-title mb_70 sec-title-animation animation-style2">
                                      <span class="sub-title mb_20 title-animation">{{ __('Contact Info') }}</span>
                                      <h2 class="title-animation">{{ __('Our Contact Details') }}</h2>
                                  </div>
                                  <div class="row clearfix">
                                      <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                                          <div class="info-block-one">
                                              <div class="inner-box">
                                                  <div class="icon-box">
                                                      <div class="r-hex">
                                                          <div class="r-hex-inner"></div>
                                                      </div>
                                                      <div class="icon">
                                                          <i class=" icon-67"></i>
                                                      </div>
                                                  </div>
                                                  <h3>{{ __('Our Location') }}</h3>
                                                  @foreach ($addresses as $address)
                                                      <p> {{ $address }} </p><br>
                                                  @endforeach
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                                          <div class="info-block-one">
                                              <div class="inner-box">
                                                  <div class="icon-box">
                                                      <div class="r-hex">
                                                          <div class="r-hex-inner"></div>
                                                      </div>
                                                      <div class="icon">
                                                          <i class=" icon-68"></i>
                                                      </div>
                                                  </div>
                                                  <h3>{{ __('Email Address') }}</h3>
                                                  <p>
                                                      @foreach ($emails as $email)
                                                          <a href="mailto:{{ $email }}">{{ $email }}</a>
                                                          <br />
                                                      @endforeach


                                                  </p>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                                          <div class="info-block-one">
                                              <div class="inner-box">
                                                  <div class="icon-box">
                                                      <div class="r-hex">
                                                          <div class="r-hex-inner"></div>
                                                      </div>
                                                      <div class="icon">
                                                          <i class=" icon-69"></i>
                                                      </div>
                                                  </div>
                                                  <h3>{{ __('Phone Number') }}</h3>
                                                  <p>
                                                      @foreach ($phones as $phone)
                                                          <a href="tel:+2{{ $phone }}">{{ $phone }}</a>
                                                          <br />
                                                      @endforeach
                                                  </p>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </section>
                          <!-- contact-info-section end -->


                      </div>
                  </div>
              </div>
              <div class="elementor-element elementor-element-c54740e e-con-full e-flex e-con e-parent" data-id="c54740e"
                  data-element_type="container">
                  <div class="elementor-element elementor-element-b4d7898 elementor-widget elementor-widget-labout_google_map"
                      data-id="b4d7898" data-element_type="widget" data-widget_type="labout_google_map.default">
                      <div class="elementor-widget-container">

                          <!-- google-map-section -->
                          <section class="google-map-section">
                              <div class="auto-container">
                                  <div class="map-inner">
                                      {{-- <iframe
                                          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.2527998699!2d-74.14448787425354!3d40.697631233397885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1716884860333!5m2!1sen!2s"
                                          width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                          referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

                                      {!! $ps->map !!}
                                  </div>
                              </div>
                          </section>

                      </div>
                  </div>
              </div>
              <div class="elementor-element elementor-element-e5622c8 e-con-full e-flex e-con e-parent" data-id="e5622c8"
                  data-element_type="container">
                  <div class="elementor-element elementor-element-0b3ab76 elementor-widget elementor-widget-labout_form"
                      data-id="0b3ab76" data-element_type="widget" data-widget_type="labout_form.default">
                      <div class="elementor-widget-container">


                          <!-- contact-section -->
                          <section class="contact-section pt_120 pb_180">
                              <div class="auto-container">
                                  <div class="sec-title mb_70 centred sec-title-animation animation-style2">
                                      <span class="sub-title mb_20 title-animation">{{ __('Send Message') }}</span>
                                      <h2 class="title-animation">{{ __('Get in Touch') }}</h2>
                                  </div>
                                  <div class="form-inner">
                                      <div id="contact-form">

                                          <div class=" no-js" id="-f934-p64-o1" lang="en-US" dir="ltr"
                                              data--id="934">
                                              <div class="screen-reader-response">
                                                  <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                  <ul></ul>
                                              </div>

                                              <form action="{{ route('front.contact.submit') }}" name="appointment"
                                                  id="email-form" aria-label="Contact form" data-status="init"
                                                  method="POST" autocomplete="off">
                                                  {{ csrf_field() }}
                                                  <div class="form-group w-100">
                                                      <div class="response w-100"></div>
                                                  </div>

                                                  <div class="row clearfix">
                                                      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                          <p><span class="-form-control-wrap" data-name="text-178"><input
                                                                      size="40" maxlength="400"
                                                                      class="-form-control -text -validates-as-required fname"
                                                                      aria-required="true" aria-invalid="false"
                                                                      placeholder="{{ __('Your name') }}" value=""
                                                                      type="text" name="name" /></span>
                                                          </p>
                                                      </div>
                                                      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                          <p><span class="-form-control-wrap" data-name="email-979"><input
                                                                      size="40" maxlength="400"
                                                                      class="-form-control -email -validates-as-required -text -validates-as-email"
                                                                      aria-required="true" aria-invalid="false"
                                                                      placeholder="{{ __('Your email') }}" value=""
                                                                      type="email" name="email" /></span>
                                                          </p>
                                                      </div>
                                                      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                          <p><span class="-form-control-wrap" data-name="text-179"><input
                                                                      size="40" maxlength="400"
                                                                      class="-form-control -text -validates-as-required"
                                                                      aria-required="true" aria-invalid="false"
                                                                      placeholder="{{ __('Phone') }}" value=""
                                                                      type="text" name="phone" /></span>
                                                          </p>
                                                      </div>
                                                      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                          <p><span class="-form-control-wrap" data-name="text-180"><input
                                                                      size="40" maxlength="400"
                                                                      class="-form-control -text -validates-as-required"
                                                                      aria-required="true" aria-invalid="false"
                                                                      placeholder="{{ __('Subject') }}" value=""
                                                                      type="text" name="subject" /></span>
                                                          </p>
                                                      </div>
                                                      <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                          <p><span class="-form-control-wrap" data-name="textarea-481">
                                                                  <textarea cols="40" rows="10" maxlength="2000" class="-form-control -textarea -validates-as-required"
                                                                      aria-required="true" aria-invalid="false" placeholder="{{ __('Type message') }}" name="text"></textarea>
                                                              </span>
                                                          </p>
                                                      </div>
                                                      <div
                                                          class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                                                          <p><button type="submit" class="theme-btn"
                                                                  name="submit-form">{{ __('Ask Question') }}<span></span><span></span><span></span><span></span></button>
                                                          </p>
                                                      </div>
                                                  </div>
                                                  <div class="-response-output" aria-hidden="true"></div>
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


          <div class="clearfix"></div>


      </main>
      <!-- main-content end -->

  @stop
