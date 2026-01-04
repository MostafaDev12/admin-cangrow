    @extends('layouts.front')

  @section('title')

      {{ __('اراء العملاء') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop


  @section('content')
     <section class="header-title ">
    <div class="overlay d-flex justify-content-center align-items-center">
      <h1>  {{ __('اراء العملاء') }} </h1>
    </div>

  </section>

    <section class="videos pt-5 pb-5">
        <div class="container">
            <h2 class="mb-4 fw-bold">{{ __('الفيديوهات') }}</h2>
            <div class="row">
                @foreach ($videos as $video)
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
    <section class="testimonials" id="testimonials">
        <h2 class="main-title">   {{ __('تعليقات العملاء') }}</h2>
        <div class="container-grid container">
           
            @foreach ($testimonials as $testimonial)
                         @php
                             $photo = $testimonial->photo
                                 ? $testimonial->photo_url
                                 : asset('assets/images/noimage.png');
// img/avatar-03.png
                         @endphp
            <div class="box">
                <img src="{{ $photo }}" alt="">
                <h3>{{ $testimonial->{'name_' . $sign} ?? '' }}  </h3>
                <span class="title">{{ $testimonial->{'job_' . $sign} ?? '' }}</span>
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>
                      {{ $testimonial->{'details_' . $sign} ?? '' }}
                </p>
            </div>

            @endforeach
             
            
        </div>
    </section>

  @stop