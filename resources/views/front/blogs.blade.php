    @extends('layouts.front')

  @section('title')

      {{ __('blogs') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop

  @section('css')
      <link rel='stylesheet' id='elementor-post-2524-css'
          href='{{ asset('front/sinai_clinic/') }}/css/post-35.css?ver=1745740192' type='text/css' media='all' />

  @stop
  @section('content')

 <!-- main-content -->
 <main class="main-content alternat-2">


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
                 <h2> {{ __('blogs') }} </h2>
                 <ul class="bread-crumb">
                     <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                     <li class="breadcrumb-item"> {{ __('blogs') }}   </li>
                 </ul>
             </div>
         </div>
     </section>
     <!-- page-title end -->

     <div data-elementor-type="wp-page" data-elementor-id="35" class="elementor elementor-35"
         data-elementor-post-type="page">
         <div class="elementor-element elementor-element-ee781da e-con-full e-flex e-con e-parent" data-id="ee781da"
             data-element_type="container">
             <div class="elementor-element elementor-element-ebe863f elementor-widget elementor-widget-labout_events_grid_view"
                 data-id="ebe863f" data-element_type="widget" data-widget_type="labout_events_grid_view.default">
                 <div class="elementor-widget-container">


                     <!-- events-section -->
                     <section class="events-section events-page-section pt_120">
                         <div class="auto-container">
                             <div class="sec-title mb_70 centred sec-title-animation animation-style2">
                                 <span class="sub-title mb_20 title-animation">{{ __('blogs') }} </span>
                                 {{-- <h2 class="title-animation">Upcoming Events</h2> --}}
                             </div>
                             <div class="row clearfix">


                               @foreach($blogs as $blog) 
                                 <div class="col-lg-4 col-md-6 col-sm-12 events-block">
                                     <div class="events-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                         data-wow-duration="1500ms">
                                         <div class="inner-box">
                                             <figure class="image-box">
                                                 <a
                                                     href="{{ route('single-blog.index',$blog->{'slug_' . $sign}) }}">
                                                     <img fetchpriority="high" decoding="async" width="390"
                                                         height="241"
                                                         src="{{ $blog->photo }}"
                                                         class="attachment-labout_390x241 size-labout_390x241 wp-post-image"
                                                         alt="" /> </a>
                                             </figure>
                                             <div class="lower-content">
                                                 <div class="post-date">
                                                     {{-- <h2>24<span>Jun</span></h2> --}}
                                                     <h2>{{ \Carbon\Carbon::parse($blog->blog_date)->format('d') }}<span>{{ \Carbon\Carbon::parse($blog->blog_date)->format('M') }}</span></h2>
                                                 </div>
                                                 {{-- <span class="location-box"><i class="icon-18"></i>United State</span> --}}
                                                 <h3><a
                                                         href="{{ route('single-blog.index',$blog->{'slug_' . $sign}) }}">{{ $blog->{'title_' . $sign} }}</a></h3>
                                                 <p> {{ $blog->{'short_details_' . $sign} }}</p>
                                                 <div class="speakers-box">
                                                     {{-- <ul class="speakers-list">
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
                                                     </div> --}}
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                               @endforeach
                                 
                             </div>
                             <div class="pagination-wrapper pt_30 centred">
                                 <div class="pagination clearfix">
                                     {{ $blogs->links('includes.pagination.custom') }}
                                 </div>
                             </div>
                         </div>
                     </section>
                     <!-- events-section end -->

                 </div>
             </div>
         </div>
     </div>


     <div class="clearfix"></div>


 </main>
 <!-- main-content end -->
  @stop
