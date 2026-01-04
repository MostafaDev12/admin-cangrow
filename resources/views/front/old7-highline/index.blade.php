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

         $randomPhone = Arr::random($phones);
         $randomEmail = Arr::random($emails);
     @endphp
     <section class="slider">
         <div class="swiper mySwiper">
             <div class="swiper-wrapper">
                 @foreach ($sliders as $slider)
                     <!-- Slide 1 -->
                     <div class="swiper-slide">
                         <div class="overlay"></div>
                         <div class="slide-content">
                             <div>
                                 <h2 class="type-title">{!! $slider->{'title_' . $sign} ?? '' !!}</h2>
                                 <p class="type-text"> {!! $slider->{'details_' . $sign} ?? '' !!} </p>
                                 <a href="{{ route('about.index', $sign) }}">{{ __('Read More') }}</a>
                             </div>


                         </div>
                         <img src="{{ $slider->{'photo'} ?? '' }}" loading="lazy" alt="Slide Image">
                     </div>
                 @endforeach

             </div>

             <!-- Pagination -->
             <div class="swiper-pagination"></div>
         </div>
     </section>
     <section id="about" class="about pt-5 pb-5">
         <div class="container">
             <div class="row">
                 <div class="col-12 col-lg-6">
                     <img src="{{ $ps->about_photo }}" alt="About Image">
                 </div>
                 <div class="col-12 col-lg-6">
                     <div class="">
                         <h2> {{ $ps->{'about_title_' . $sign} ?? '' }} </h2>
                         <p> {!! $ps->{'about_details_' . $sign} ?? '' !!}
                         </p>
                         <a class="btn-about btn-pulse" href="{{ route('about.index', $sign) }}">
                             {{ __('اقرأ المزيد') }}</a>
                     </div>
                 </div>
             </div>
             <div class="row">

                 @foreach ($processes as $k => $process)
                     @php
                         $icon = ['fas fa-bullseye', 'fas fa-rocket', 'fas fa-eye', 'fas fa-star'];
                     @endphp
                     <div class="col-12 col-lg-3 col-md-6">
                         <div class="about-box ">
                             <i class=" {{ $icon[$k] ?? 'fas fa-star' }} fa-2x  animated-icon"></i>

                             <!-- <img src="img/target.png" class="floating" alt="About Image"> -->
                             <h3>{{ $process->{'title_' . $sign} ?? '' }} </h3>
                             <p> {{ $process->{'details_' . $sign} ?? '' }}
                             </p>
                         </div>
                     </div>
                 @endforeach

             </div>
         </div>
     </section>
     <section class="videos pt-5 pb-5">
         <div class="container">
             <h2 class="mb-4 fw-bold">{{ __('فيديوهاتنا') }}</h2>
             <div class="row">
                 @foreach ($medias as $video)
                     <div class="col-12 col-lg-4 col-md-6 ">

                         <iframe width="100%" height="315" src="{{ $video->youtube_url }}" title="YouTube video player"
                             frameborder="0"
                             allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                             referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                     </div>
                 @endforeach

             </div>
         </div>
     </section>
     <div class="testimonials" id="testimonials">
         <h2 class="main-title"> {{ __('تعليقات العملاء') }}</h2>
         <!-- Add Swiper CSS -->
         <div class="container">
             <!-- Swiper container -->
             <div class="swiper-container">
                 <div class="swiper-wrapper">


                     @foreach ($testimonials as $testimonial)
                         @php
                             $photo = $testimonial->photo
                                 ? $testimonial->photo_url
                                 : asset('assets/images/noimage.png');
// img/avatar-03.png
                         @endphp
                         <!-- Your boxes as swiper slides -->
                         <div class="swiper-slide">
                             <div class="box">
                                 <img src="{{ $photo }}" alt=""
                                     style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                                 <h3>{{ $testimonial->{'name_' . $sign} ?? '' }}</h3>
                                 <span class="title">{{ $testimonial->{'job_' . $sign} ?? '' }}</span>
                                 <div class="rate">
                                     <i class="filled fas fa-star"></i>
                                     <i class="filled fas fa-star"></i>
                                     <i class="filled fas fa-star"></i>
                                     <i class="filled fas fa-star"></i>
                                     <i class="filled fas fa-star"></i>
                                 </div>
                                 <p>
                                     {{ $testimonial->{'details_' . $sign} ?? '' }}
                                 </p>
                             </div>
                         </div>
                     @endforeach

                 </div>
                 <!-- Pagination -->
                 <div class="swiper-pagination"></div>

                 <!-- Navigation buttons (hidden on mobile) -->
                 <div class="swiper-button-next"></div>
                 <div class="swiper-button-prev"></div>
             </div>
         </div>

         <!-- Add Swiper JS at the end of your HTML -->

         <!-- Initialize Swiper with mobile-friendly settings -->

     </div>
     <section class="service">
         <div class="container">
             <h2 class="mb-4 fw-bold"> {{ __('ما نقدمة من خدمات') }}</h2>
             <div class="row">


 @foreach ($servicess as $service)
                 <div class="col-12 col-lg-3 col-md-6">
                     <div class="service-box">
                         <div class="overlay">
                             <h3>  {!! $service->{'title_' . $sign} ?? '' !!}      </h3>
                             <a href="{{ route('single-service-service.index', ['lang' => $sign, 'slug' => $service->{'slug_' . $sign}]) }}"> {{ __('اقرأ المزيد') }}<i class="fa-solid fa-arrow-left"></i></a>
                         </div>
                         <img src=" {!! $service->photo !!}" alt="Service Image">
                     </div>
                 </div>
  @endforeach
                  

             </div>
             <!-- <button class="btn-servicer"><a href="">المزيد من الخدمات</a></button> -->
               <a class="playbtn" href="{{ route('services.index', $sign) }}">
                 <span></span>
                 <span></span>
                 <span></span>
                 <span></span>
                 {{ __('المزيد من الخدمات') }}
             </a>  
         </div>
     </section>

     @include('includes.form')
   

 @stop
