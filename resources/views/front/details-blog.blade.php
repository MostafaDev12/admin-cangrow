 @extends('layouts.front')

 @section('title')
     {{ $blog->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}
 @stop

 @section('gsearch')
     <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}" />
 @stop
 @section('css')
     <link rel='stylesheet' id='elementor-post-1978-css'
         href='{{ asset('front/sinai_clinic/') }}/css/post-1978.css?ver=1745166625' type='text/css' media='all' />
 <style>
    .elementor-element-257bef4 {
  display: flex;
  flex-direction: column;
  --container-widget-width: 100%;
  --container-widget-height: initial;
  --container-widget-flex-grow: 0;
  --container-widget-align-self: initial;
  --flex-wrap-mobile: wrap;
  padding-top: 0px;
  padding-bottom: 24px;
  padding-left: 24px;
  padding-right: 24px;
}
.elementor-element-59970d3 {
  display: flex;
  border-radius: 15px 15px 15px 15px;
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.0784313725490196);
  padding-top: 21px;
  padding-bottom: 34px;
  padding-left: 24px;
  padding-right: 24px;
}

.elementor-element-612bd0f {
  --e-form-steps-indicators-spacing: 20px;
  --e-form-steps-indicator-padding: 30px;
  --e-form-steps-indicator-inactive-secondary-color: #ffffff;
  --e-form-steps-indicator-active-secondary-color: #ffffff;
  --e-form-steps-indicator-completed-secondary-color: #ffffff;
  --e-form-steps-divider-width: 1px;
  --e-form-steps-divider-gap: 10px;
}
.elementor-labels-above input,
.elementor-labels-above textarea,
.elementor-labels-above select {
    margin: 5px !important ;
}
 </style>
 
         @stop



 @section('content')
     @php
         $phones = explode(',', $gs->phones);
         $randomPhone = Arr::random($phones);
     @endphp
     <!-- main-content -->
     <main class="main-content alternat-2">
         <section id="tribe-events-pg-template" class="tribe-events-pg-template">
             <div class="tribe-events-before-html"></div><span class="tribe-events-ajax-loading"><img
                     class="tribe-events-spinner-medium" src="{{ asset('front/sinai_clinic/') }}/img/tribe-loading.gif"
                     alt="Loading Events" /></span>
             <!-- page-title -->
             <section class="page-title centred">
                 <div class="bg-layer"
                     style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/page-title-3.jpg');">
                 </div>
                 <div class="pattern-layer"
                     style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/shape-53.png');">
                 </div>
                 <div class="auto-container">
                     <div class="content-box">
                         <h2>{{ $blog->{'title_' . $sign} }} </h2>
                         <ul class="bread-crumb">
                             <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a>
                             </li>
                             <li class="breadcrumb-item">{{ $blog->{'title_' . $sign} }} </li>
                         </ul>
                     </div>
                 </div>
             </section>
             <!-- page-title end -->

             <!-- events-details -->
             <section class="events-details">
                 <div class="auto-container">
                     <div class="row clearfix">


                         <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                             <div class="event-details-content">
                                 <figure class="image-box mb_30"><img width="1920" height="523"
                                         src="{{ $blog->photo }}"
                                         class="attachment-full size-full wp-post-image" alt="" decoding="async"
                                         srcset="{{ $blog->photo }} 1920w, {{ $blog->photo }} 300w, {{ $blog->photo }} 1024w, {{ $blog->photo }} 768w, {{ $blog->photo }} 1536w"
                                         sizes="(max-width: 1920px) 100vw, 1920px" /></figure>
                                 <ul class="info-list mb_18 clearfix">
                                    <li><i class="icon-37"></i>{{ \Carbon\Carbon::parse($blog->blog_date)->format('d M, Y') }}</li>
                                     {{-- <li><i class="icon-37"></i>24 Jun, 2025</li> --}}
                                     {{-- <li><i class="icon-1"></i>10:00 am - 11:00 am</li> --}}
                                     {{-- <li><i class="icon-39"></i>United State</li> --}}
                                 </ul>
                                 <h2>  {{ $blog->{'title_' . $sign} }}</h2>

                                 <div class="text">
                                     {!! $blog->{'details_' . $sign} !!}
                                 </div>
                                
                             </div>

                         </div>
                         <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                             <div class="elementor-element elementor-element-257bef4 e-con-full e-flex e-con e-child"
                                 data-id="257bef4" data-element_type="container">
                                 <div class="elementor-element elementor-element-59970d3 e-con-full e-flex e-con e-child"
                                     data-id="59970d3" data-element_type="container"
                                     data-settings="{'background_background':'classic'}">
                                     <div class="elementor-element elementor-element-4061cc7 elementor-widget elementor-widget-heading"
                                         data-id="4061cc7" data-element_type="widget" data-widget_type="heading.default">
                                         <div class="elementor-widget-container">
                                             <h2 class="elementor-heading-title elementor-size-default">
                                               {{ __('appointment') }}</h2>
                                         </div>
                                     </div>
                                     <div class="elementor-element elementor-element-612bd0f elementor-button-align-stretch elementor-widget elementor-widget-form"
                                         data-id="612bd0f" data-element_type="widget"
                                         data-settings="{'step_next_label':'Next','step_previous_label':'Previous','button_width':'100','step_type':'number_text','step_icon_shape':'circle'}"
                                         data-widget_type="form.default">
                                         <div class="elementor-widget-container">

                                             <form action="{{ route('front.contact.submit') }}" name="New Form"
                                                 id="email-form" method="POST" autocomplete="off"
                                                 class="elementor-form">
                                                 {{ csrf_field() }}
                                                 <div class="form-group w-100">
                                                     <div class="response w-100"></div>
                                                 </div>

                                                 {{-- 
                                                 <input type="hidden" name="service"
                                                     value="{{ $service->{'title_' . $sign} }}" /> --}}


                                                 <div class="elementor-form-fields-wrapper elementor-labels-above">
                                                     <div
                                                         class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100">
                                                         <input size="1" type="text" name="name"
                                                             id="form-field-name"
                                                             class="elementor-field elementor-size-md  elementor-field-textual fname"
                                                             placeholder="{{ __('Name') }}">
                                                     </div>
                                                     <div
                                                         class="elementor-field-type-tel elementor-field-group elementor-column elementor-field-group-email elementor-col-100 elementor-field-required">
                                                         <input size="1" type="tel" name="phone"
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
                                                         <button class="elementor-button elementor-size-md" style="background-color: #1D72A8;"
                                                             type="submit">
                                                             <span class="elementor-button-content-wrapper">
                                                                 <span class="elementor-button-text">{{ __('Send') }}</span>
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
                                         data-id="2c1d5ab" data-element_type="widget" data-widget_type="heading.default">
                                         <div class="elementor-widget-container">
                                             <h2 class="elementor-heading-title elementor-size-default">
                                                 {{ __('Location') }}</h2>
                                         </div>
                                     </div>
                                     <div class="elementor-element elementor-element-d209ddd elementor-widget elementor-widget-html"
                                         data-id="d209ddd" data-element_type="widget" data-widget_type="html.default">
                                         <div class="elementor-widget-container">
                                             {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d451498.71712793066!2d33.69471848906249!3d27.861017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14533a3cb9c519ed%3A0xc400b9b192ca5e0b!2sSinai%20Clinic%20Hospital!5e0!3m2!1sen!2sus!4v1745165636539!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>		
				 --}}
                                             {{-- <iframe
                                                                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d451498.71712793066!2d33.69471848906249!3d27.861017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14533a3cb9c519ed%3A0xc400b9b192ca5e0b!2sSinai%20Clinic%20Hospital!5e0!3m2!1sen!2sus!4v1744159653201!5m2!1sen!2sus"
                                                                  width="600" height="100%" style="border:0;"
                                                                  allowfullscreen="" loading="lazy"
                                                                  referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                                             {!! $ps->map !!}
                                         </div>

                                     </div>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
             </section>
             <!--End blog area-->
             <div class="tribe-events-after-html"></div>
             <!--
        This calendar is powered by The Events Calendar.
        http://evnt.is/18wn
        -->
         </section>

         <div class="clearfix"></div>


     </main>
     <!-- main-content end -->

 @stop
