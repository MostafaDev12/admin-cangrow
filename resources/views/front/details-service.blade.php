  @extends('layouts.front')

  @section('title')

      {{ $service->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop
  @section('css')
      <link rel='stylesheet' id='elementor-post-1978-css'
          href='{{ asset('front/sinai_clinic/') }}/css/post-1978.css?ver=1745166625' type='text/css' media='all' />
  @stop



  @section('content')
      <!-- main-content -->
      <main class="main-content alternat-2">

          <!-- page-title -->
          <section class="page-title centred">
              <div class="bg-layer"></div>
              <div class="auto-container">
                  <div class="content-box">
                      <h2>{{ $service->{'title_' . $sign} }} </h2>
                      <ul class="bread-crumb">
                          <li class="breadcrumb-item"><a href="https://azure-sardine-328383.hostingersite.com/">Home</a>
                          </li>
                          <li class="breadcrumb-item">{{ $service->{'title_' . $sign} }} </li>
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

                                  <div data-elementor-type="wp-page" data-elementor-id="1978"
                                      class="elementor elementor-1978" data-elementor-post-type="page">
                                      <div class="elementor-element elementor-element-884c212 e-flex e-con-boxed e-con e-parent"
                                          data-id="884c212" data-element_type="container">
                                          <div class="e-con-inner">
                                              <div class="elementor-element elementor-element-e3d95d4 elementor-widget elementor-widget-heading"
                                                  data-id="e3d95d4" data-element_type="widget"
                                                  data-widget_type="heading.default">
                                                  <div class="elementor-widget-container">
                                                      <h2 class="elementor-heading-title elementor-size-default">
                                                          {{ $service->{'title_' . $sign} }} </h2>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="elementor-element elementor-element-e1ee9e9 e-flex e-con-boxed e-con e-parent"
                                          data-id="e1ee9e9" data-element_type="container">
                                          <div class="e-con-inner">
                                              <div class="elementor-element elementor-element-c644be7 e-con-full e-flex e-con e-child"
                                                  data-id="c644be7" data-element_type="container">
                                                  <div class="elementor-element elementor-element-cfaf79b elementor-widget elementor-widget-image"
                                                      data-id="cfaf79b" data-element_type="widget"
                                                      data-widget_type="image.default">
                                                      <div class="elementor-widget-container">
                                                          <img fetchpriority="high" decoding="async" width="1549"
                                                              height="715" src="{{ $service->photo }}"
                                                              class="attachment-full size-full wp-image-1977" alt=""
                                                              srcset="{{ $service->photo }} 1549w, {{ $service->photo }} 300w, {{ $service->photo }} 1024w, {{ $service->photo }} 768w, {{ $service->photo }} 1536w"
                                                              sizes="(max-width: 1549px) 100vw, 1549px" />
                                                              
                                                      </div>
                                                  </div>

                                                  {!! $service->{'details_' . $sign} !!}

                                              </div>
                                              <div class="elementor-element elementor-element-257bef4 e-con-full e-flex e-con e-child"
                                                  data-id="257bef4" data-element_type="container">
                                                  <div class="elementor-element elementor-element-59970d3 e-con-full e-flex e-con e-child"
                                                      data-id="59970d3" data-element_type="container"
                                                      data-settings="{'background_background':'classic'}">
                                                      <div class="elementor-element elementor-element-4061cc7 elementor-widget elementor-widget-heading"
                                                          data-id="4061cc7" data-element_type="widget"
                                                          data-widget_type="heading.default">
                                                          <div class="elementor-widget-container">
                                                              <h2 class="elementor-heading-title elementor-size-default">
                                                                  {{ __('Our Services') }}</h2>
                                                          </div>
                                                      </div>
                                                      <div class="elementor-element elementor-element-612bd0f elementor-button-align-stretch elementor-widget elementor-widget-form"
                                                          data-id="612bd0f" data-element_type="widget"
                                                          data-settings="{'step_next_label':'Next','step_previous_label':'Previous','button_width':'100','step_type':'number_text','step_icon_shape':'circle'}"
                                                          data-widget_type="form.default">
                                                          <div class="elementor-widget-container">

                                                              <form action="{{ route('front.contact.submit') }}"
                                                                  name="New Form" id="email-form" method="POST"
                                                                  autocomplete="off" class="elementor-form">
                                                                  {{ csrf_field() }}
                                                                  <div class="form-group w-100">
                                                                      <div class="response w-100"></div>
                                                                  </div>

                                                                   
                                                                  <input type="hidden" name="service"
                                                                      value="{{ $service->{'title_' . $sign} }}" />

                                                                  
                                                                  <div
                                                                      class="elementor-form-fields-wrapper elementor-labels-above">
                                                                      <div
                                                                          class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100">
                                                                          <input size="1" type="text"
                                                                              name="name" required
                                                                              id="form-field-name"
                                                                              class="elementor-field elementor-size-md  elementor-field-textual fname"
                                                                              placeholder="{{ __('Name') }}">
                                                                      </div>
                                                                      <div
                                                                          class="elementor-field-type-tel elementor-field-group elementor-column elementor-field-group-email elementor-col-100 elementor-field-required">
                                                                          <input size="1" type="tel"
                                                                              name="phone" required
                                                                              id="form-field-email"
                                                                              class="elementor-field elementor-size-md  elementor-field-textual"
                                                                              placeholder="{{ __('Phone') }}" required="required"
                                                                              pattern="[0-9()#&amp;+*-=.]+"
                                                                              title="Only numbers and phone characters (#, -, *, etc) are accepted.">

                                                                      </div>
                                                                      <div
                                                                          class="elementor-field-type-email elementor-field-group elementor-column elementor-field-group-field_a0cf781 elementor-col-100 elementor-field-required">
                                                                          <input size="1" type="email"
                                                                              name="email"
                                                                              id="form-field-field_a0cf781"
                                                                              class="elementor-field elementor-size-md  elementor-field-textual"
                                                                              placeholder="{{ __('Email') }}" required="required">
                                                                      </div>
                                                                      <div
                                                                          class="elementor-field-type-textarea elementor-field-group elementor-column elementor-field-group-message elementor-col-100">
                                                                          <textarea class="elementor-field-textual elementor-field  elementor-size-md" name="text"
                                                                              id="form-field-message" rows="4" placeholder="{{ __('Message') }}"></textarea>
                                                                      </div>
                                                                      <div
                                                                          class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                                                                          <button
                                                                              class="elementor-button elementor-size-md"
                                                                              type="submit">
                                                                              <span
                                                                                  class="elementor-button-content-wrapper">
                                                                                  <span
                                                                                      class="elementor-button-text">{{ __('Send') }}</span>
                                                                              </span>
                                                                          </button>
                                                                      </div>
                                                                  </div>
                                                              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="elementor-element elementor-element-126f766 e-con-full e-flex e-con e-child"
                                                      data-id="126f766" data-element_type="container"
                                                      data-settings="{'background_background':'classic'}">
                                                      <div class="elementor-element elementor-element-2c1d5ab elementor-widget elementor-widget-heading"
                                                          data-id="2c1d5ab" data-element_type="widget"
                                                          data-widget_type="heading.default">
                                                          <div class="elementor-widget-container">
                                                              <h2 class="elementor-heading-title elementor-size-default">
                                                                  {{ __('Location') }}</h2>
                                                          </div>
                                                      </div>
                                                      <div class="elementor-element elementor-element-d209ddd elementor-widget elementor-widget-html"
                                                          data-id="d209ddd" data-element_type="widget"
                                                          data-widget_type="html.default">
                                                          <div class="elementor-widget-container">
                                                              {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d451498.71712793066!2d33.69471848906249!3d27.861017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14533a3cb9c519ed%3A0xc400b9b192ca5e0b!2sSinai%20Clinic%20Hospital!5e0!3m2!1sen!2sus!4v1745165636539!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>		
				 --}}
                                                              {{-- <iframe
                                                                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d451498.71712793066!2d33.69471848906249!3d27.861017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14533a3cb9c519ed%3A0xc400b9b192ca5e0b!2sSinai%20Clinic%20Hospital!5e0!3m2!1sen!2sus!4v1744159653201!5m2!1sen!2sus"
                                                                  width="600" height="100%" style="border:0;"
                                                                  allowfullscreen="" loading="lazy"
                                                                  referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                                                              {!! $gs->map !!}
                                                          </div>

                                                      </div>
                                                  </div>
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
