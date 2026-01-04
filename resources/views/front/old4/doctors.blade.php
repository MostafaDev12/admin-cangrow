   @extends('layouts.front')

  @section('title')

      {{ __('doctors') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop

  @section('css')
      <link rel='stylesheet' id='elementor-post-2524-css'
          href='{{ asset('front/sinai_clinic/') }}/css/post-40.css?ver=1745740192' type='text/css' media='all' />

  @stop
  @section('content')


 <!-- main-content -->
 <main class="main-content alternat-2">


     <!-- page-title -->
     <section class="page-title centred">
         <div class="bg-layer"
             style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/page-title-4.jpg');">
         </div>
         <div class="pattern-layer"
             style="background-image: url('{{ asset('front/sinai_clinic/') }}/img/shape-53.png');">
         </div>
         <div class="auto-container">
             <div class="content-box">
                 <h2>{{ __('Doctors') }}</h2>
                 <ul class="bread-crumb">
                     <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Hom') }}</a></li>
                     <li class="breadcrumb-item">{{ __('Doctors') }}</li>
                 </ul>
             </div>
         </div>
     </section>
     <!-- page-title end -->

     <div data-elementor-type="wp-page" data-elementor-id="40" class="elementor elementor-40"
         data-elementor-post-type="page">
         <div class="elementor-element elementor-element-f51b369 e-con-full e-flex e-con e-parent" data-id="f51b369"
             data-element_type="container">
             <div class="elementor-element elementor-element-80bfae0 elementor-widget elementor-widget-labout_team_grid"
                 data-id="80bfae0" data-element_type="widget" data-widget_type="labout_team_grid.default">
                 <div class="elementor-widget-container">


                     <!-- team-section -->
                     <section class="team-section pt_120 pb_180 centred">
                         <div class="auto-container">
                             <div class="sec-title mb_70 sec-title-animation animation-style2">
                                 <span class="sub-title mb_20 title-animation">{{ __('Team Members') }}</span>
                                 <h2 class="title-animation">{{ __('Our Expert Scientists') }}</h2>
                             </div>
                             <div class="row clearfix">

 @foreach ($doctors as $doctor)
                                 <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                                     <div class="team-block-one wow fadeInUp animated" data-wow-delay="200ms"
                                         data-wow-duration="1500ms">
                                         <div class="inner-box">
                                             <div class="image-box">
                                                 <figure class="image"><img fetchpriority="high" decoding="async"
                                                         width="280" height="340"
                                                         src="{{ $doctor->photo_url }}"
                                                         class="attachment-labout_300x340 size-labout_300x340 wp-post-image"
                                                         alt="" /></figure>
                                                 <ul class="social-links">
                                                     @if ($doctor->facebook)
                                                                 <li><a href="{{ $doctor->facebook }}"><i
                                                                             class="fab  fa-facebook-f"></i></a></li>
                                                             @endif
                                                             @if ($doctor->twitter)
                                                                 <li><a href="{{ $doctor->twitter }}"><i
                                                                             class="fab  fa-twitter"></i></a></li>
                                                             @endif
                                                             @if ($doctor->linkedin)
                                                                 <li><a href="{{ $doctor->linkedin }}"><i
                                                                             class="fab  fa-linkedin"></i></a></li>
                                                             @endif
                                                 </ul>
                                             </div>
                                             <div class="lower-content">
                                                 <h3><a href="#">{{ $doctor->{'name_' . $sign}  ?? ''}}</a></h3>
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
     </div>


     <div class="clearfix"></div>


 </main>
 <!-- main-content end -->
  
 @stop

