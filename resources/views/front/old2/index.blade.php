 
     
@extends('layouts.front')

@section('title')
   
        {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

@php
$phones =  explode(',', $gs->phones);
$emails =   explode(',', $gs->emails);
 
$randomPhone = Arr::random($phones);
@endphp
  <main>
    <!-- Banner Section -->
    <section id="home" class="home">
      <div class="banner-wrapper wrapper home-page-background" style="background-image: url('{{ $sliders->{'photo'}  ?? ''}}');">
        <!-- <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 order-md-1 text-end">
              <h1>رؤية أفضل</h1>
              <p>
                مركز علاج الحول و عيون الاطفال و المياةالبيضاء لدينا احدث الاجهزه و التقنيات لاجراء جميع
                جراحات العيون و
                تصحيح الابصار
              </p>
            </div>
            <div class="col-md-6 order-md-2 order-1 mb-md-0 mb-5">
              <div class="top-right-sec">
                <img src="images/drhebametwally/heba-slider-new-removebg-preview.png" class="img-fluid aimg1">
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </section>

    <!-- Banner section exit -->

    <section id="">
      <div class="wrapper home-card">
        <div class="container">
          <div class="row">

            @foreach ($points as $point)
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="card box-invisible">
                <div class="icon-box feature">
                  <i class="fa fa-microscope"></i>
                </div>
                <h4>   {{ $point->{'title_' . $sign}  ?? ''}} </h4>
                <p>
                  {{ $point->{'details_' . $sign}  ?? ''}}
                
                </p>
                <a href="#" class="main-btn">أعرف أكثر</a>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </section>


    <section id="" class="opertions">
      <div class="wrapper pb-0">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center mb-5">
              <div class="title-body">
                <h3>
                  {{ __(key: 'العمليات') }}	         </h3>
              </div>
            </div>
          </div>
          <div class="row">
            @foreach ($reviews as $review)
            <div class="col-md-4 col-sm-6 mb-4 box-invisible">
              <div class="card-animate">
                <div class="imgbox">
                  <img src="{{ $review->photo }}" alt="" />
                </div>
                <p>    {{ $review->{'title_' . $sign} }} 
                </p>
                <p>
                  {{ __(key: 'عمليه') }}	        
                </p>
                <h6>    {{ $review->{'title_' . $sign} }} 
                </h6>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery-wrapper wrapper">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center mb-5">
            <div class="title-body">
              <h3>
                  {{ __(key: 'الأستوديو') }}	     
              </h3>
            </div>
          </div>
        </div>
        <div class="row">

         @foreach($medias as $media)
          <div class="col-md-4 col-sm-6 mb-4 box-invisible">
            <figure>
              <img src="{{ $media->media }}" class="w-100 h-100" alt="st1">
            </figure>
          </div>
          @endforeach

        </div>
      </div>
    </section>
    <!-- Gallery Section exit -->


    <!-- inforamtion -->
    <section id="inforamtion wrapper">
      <div class="wrapper pb-0">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-6 mb-4 box-invisible">
              <div class="card text-center">
                <div class="icon-box feature">
                  <i class="fas fa-phone"></i>
                </div>
                <div>
                  <h4>{{ $randomPhone }}</h4>
                  @foreach ($emails as $email)
                  <p>
                    <a href="mailto:{{ $email }}">{{ $email }}</a>
                  </p>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4 box-invisible">
              <div class="card text-center">
                <div class="icon-box feature">
                  <i class="fas fa-map-marker-alt"></i>
                </div>
                <div>
                  <h4>     {{ __(key: 'المهندسين, القاهرة, مصر') }}	   </h4>
                  <p>
                    {{ __(key: '116 ش محيي الدين ابو العز الدور الاول متفرع من جامعة الدول') }}	   
                  
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4 box-invisible">
              <div class="card text-center">
                <div class="icon-box feature">
                  <i class="fas fa-clock"></i>
                </div>
                <div>
                  <h4>      {{ __(key: 'السبت - الاربعاء') }}	   </h4>
                  <p>
                    {{ __(key: 'الاقصر زياره كل اسبوعين') }}	      </p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- About section -->
    <section id="about" class="about-wrapper wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ">
            <h2>        {{ __(key: 'ساعات العمل') }}	   </h2>
            <p>
              @foreach ($locations as $k=>$location)
              {{ $location->{'title_' . $sign} }} –  {{ $location->{'date_' . $sign} }}  <br>    
              @endforeach
            </p>
            <div class="about-clinic">
              <div class="card box-invisible">
                <h4> {{ __(key: 'الأحد') }}	     </h4>
                <p>{{ __(key: '8:00 AM 2:30 – PM') }}	 
                </p>
              </div>
              <div class="card box-invisible">
                <h4> {{ __(key: 'الإثنين') }}	     </h4>
                <p>  {{ __(key: '8:00 AM 7:00 – PM') }}	 
                </p>
              </div>
              <div class="card box-invisible">
                <h4> {{ __(key: 'الثلاثاء') }}	     </h4>
                <p>{{ __(key: '8:00 AM 7:00 – PM') }}
                </p>
              </div>
              <div class="card box-invisible">
                <h4> {{ __(key: 'الأربعاء') }}	     </h4>
                <p>{{ __(key: '8:00 AM 7:00 – PM') }}
                </p>
              </div>
              <div class="card box-invisible">
                <h4> {{ __(key: 'الخميس') }}	     </h4>
                <p> {{ __(key: 'مغلق') }}	     
                </p>
              </div>
              <div class="card box-invisible">
                <h4> {{ __(key: 'الجمعة') }}	     </h4>
                <p> {{ __(key: 'مغلق') }}	     
                </p>
              </div>
              <div class="card box-invisible">
                <h4> {{ __(key: 'السبت') }}	     </h4>
                <p>{{ __(key: '8:00 AM 7:00 – PM') }}

                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-md-0 mb-5">
            <div class="about-box-image">
              <img src="{{ asset('front/dr-heba/') }}/images/drhebametwally/Png-doctor.png" alt="" class="about-animate">
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- About section exit -->

    <!-- before & after -->
    <section id="before-after" class="gallery-wrapper wrapper">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center mb-5">
            <div class="title-body">
              <h3>
                {{ __(key: 'قبل وبعد') }}	      
              </h3>
            </div>
          </div>
        </div>
        <div class="swiper mySwiper box-invisible">
          <div class="swiper-wrapper">
@foreach ($after_befores as $after_before)
  
            <div class="swiper-slide">
              <figure>
                <img src="{{ $after_before->photo }}" class="d-block w-100" alt="loading">
              </figure>
            </div>

@endforeach
           
          </div>
          <div class="swiper-pagination"></div>

        </div>

      </div>
    </section>
    <!-- videos -->
    <!-- <section id="videos">
    <div class="container title-body">
      <h3>
        الفيديوهات
      </h3>
    </div>
    <div class="wrapper pb-0 video-youtype">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section> -->
    <!-- Certificates -->
    <section id="certificates" class="gallery-wrapper wrapper">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center mb-5">
            <div class="title-body">
              <h3>
                {{ __(key: 'الشهادات') }}	     
              </h3>
            </div>
          </div>
        </div>
        <div class="row">

          @foreach ($certificates as $certificate)
          <div class="col-md-4 col-sm-6 mb-4 box-invisible">
            <figure>
              <img src="{{ $certificate->photo }}" class="w-100 h-100" alt="">
            </figure>
          </div>
          @endforeach
          
        </div>
      </div>
    </section>
    <!-- last news -->
    <section id="last-news" class="team-wrapper wrapper last-news">
      <div class="title-body">
        <h3>
           	{{ __(key: 'أحدث الأخبار') }}	
        </h3>

      </div>
      <div class="container">
        <div class="row">
          @foreach($blogs as $blog)
          <div class="col-md-4 col-sm-6 mb-4 box-invisible">
            <div class="team-img">
              <a href="{{ route('single-blog.index',$blog->{'slug_' . $sign}) }}">
                 <img src="{{ $blog->photo }}" class="img-fluid" alt="">
                </a>
            </div>
            <div class="card rounded-3 py-4">
              <div class="">
                <p>
                  <span>  {{ $blog->blog_date }}
                  </span>
                  <i class="fa fa-light fa-clock"></i>

                </p>
                <h5 >
                  <a href="{{ route('single-blog.index',$blog->{'slug_' . $sign}) }}">
                    {{ $blog->{'title_' . $sign} }} 
                  </a>

                </h5>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- locations -->
    <section id="locations" class="team-wrapper wrapper locations">
      <div class="title-body">
        <h3>
        	{{ __(key: 'موقعنا') }}	    </h3>

      </div>
      <div class="container">
        <div class="row">

          @foreach ($locations as $k=>$location)
          <div class="col-md-4 col-sm-6 mb-4 box box-invisible">
            <div class="p-0 card rounded-3">
              <iframe
                src="{{ $location->map }}"
                width="100%" height="100%" style="border: 0px; width: 100%;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" data-gtm-yt-inspected-14="true"></iframe>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </section>
    <!-- Blog section exit -->
  </main>

  @stop