   
   
@extends('layouts.front')

@section('title')
   
        {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

  <div class="slider">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">

        @foreach ($sliders as $slider)
          
        <!-- Slide 1 -->
        <div class="swiper-slide">
          <div class="overlay"></div>
          <div class="slide-content">
            <h1> {{ $slider->{'title_' . $sign}  ?? ''}}</h1>
          </div>
          <img src="{{ $slider->{'photo_url'}  ?? ''}}" loading="lazy" alt="Slide Image">
        </div>
  
        @endforeach
      </div>

      <!-- Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <div class="about-us">
    <div class="container">
      <div class="title_lines">
        <h1>
           {{ __('نبذه عننا') }}
        </h1>
      </div>
      <div class="row">
        <div class="col-12 col-lg-6 col-md-6">
          <div class="  wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
            <h2> {{ $ps->{'portfolio_title_' . $sign}  ?? ''}}   </h2>
            <p >  {!! $ps->{'portfolio_details_' . $sign}  ?? '' !!}  </p>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6">
          <div class="text-center wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s">
            <img width="100%" height="100%" class="m-auto" src="{{ $ps->portfolio_photo }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="service  p-5">
    <div class="container-fluid">
      <div class="title_lines">
        <h1>
            {{ __('خدمتنا') }}
        </h1>
      </div>
      <div class="row">

        @foreach ($services as $service)
        <div class="col-12 col-lg-4 col-md-4">
          <div class="card wow animate__animated animate__zoomIn shadow-lg">
            <img class="card-img-top" src="{{ $service->photo_url }}" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title fw-bold"> {{ $service->{'title_' . $sign} }}</h5>
              <a href="{{ route('single-service.index',['slug' => $service->{'slug_' . $sign} ]) }}" class="btn px-4 py-2 mt-2">     {{ __('المزيد') }}  </a>
            </div>
          </div>
        </div>
        @endforeach
  
      </div>

    </div>
  </div>


  <div class="blog p-5">
    <div class="container-fluid">
      <div class="title_lines">
        <h1>
            {{ __('مقالات') }}
        </h1>
      </div>
      <div class="row">
        @foreach($blogs->take(6) as $blog)
        <div class="col-12 col-lg-4 col-md-4">
          <div class="card">
            <span>   </span>
            <img class="card-img-top" src="{{ $blog->photo_url }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"> {{ $blog->{'title_' . $sign} }}  </h5>
              <p class="card-text">{{ $blog->{'short_details_' . $sign} }} </p>

              <a href="{{ route('single-blog.index',$blog->{'slug_' . $sign}) }}" class="btn">       {{ __('المزيد') }} <i class="fa-solid fa-arrow-left"></i></a>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
    </div>
  </div>


  <div class="videos p-5">
    <div class="container-fluid">
      <div class="title_lines">
        <h1>
          {{ __('فيديوهاتنا') }}
        </h1>
      </div>
      <div class="row">

        @foreach($videos->take(3) as $video)
        <div class="col-12 col-lg-4 col-md-4">
          <div>
            <iframe width="100%" height="300px" src="{{$video->youtube_url}}"
              title="YouTube video player" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
        @endforeach
        
        
      </div>
    </div>
  </div>

  <div class="certificate p-5 ">
    <div class="container-fluid">
        <div class="title_lines">
            <h1>
                 {{ __('شهاداتنا') }}
            </h1>
        </div>
        <div class="row pt-5">

          @foreach ($reviews->take(4) as $review)
            <div class="col-12 col-lg-3 col-md-3 mb-3">
                
                <div class="position-relative">
                    <div class="overlay">
                        
                    </div>
                    <img src="{{ $review->photo_url }}" alt="">
               </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@include('includes.contact-form',['classes' => 'p-5'])
 

@stop