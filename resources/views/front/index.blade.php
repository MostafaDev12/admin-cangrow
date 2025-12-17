 
  
   
@extends('layouts.front')

@section('title')
   
        {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
<div class="slider-phone  d-block  d-md-none"  style="background-image: url('{{asset('assets/images/slider/slider.jpg') }}');">
    <div class="title-doc  wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s">
      <h1>   {{ $sliders->{'title_' . $sign}  ?? ''}}  </h1>
      {!! $sliders->{'details_' . $sign}  ?? '' !!}
      <!--<button  onclick="window.location.href='{{ route('contact.index'.$lang,$lang) }}/'"> {{ __('اتصل بنا') }}   </button>-->
    </div>
  </div>

  <div class="slider d-md-block d-none" style="background-image: url('{{ $sliders->{'photo'}  ?? ''}}');">
    <div class="title-doc  wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s" >
      <h1> {{ $sliders->{'title_' . $sign}  ?? ''}} </h1>
      {!! $sliders->{'details_' . $sign}  ?? '' !!}
      <button  onclick="window.location.href='{{ route('contact.index'.$lang,$lang) }}/'"> {{ __('اتصل بنا') }}  </button>
    </div>
  </div>


  <div class="about-us bg-white">
    <div class="container position-top box p-5">
      <div class="row">
        <div class="col-12 col-lg-4 col-md-6">
          <div class="p-5 wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s">
            <p> {{ __('لماذا يعد دكتور عبدالرحمن شمس') }} </p>
            <p> {{ __('افضل دكتور عيون في مصر') }} </p>
            <button  onclick="window.location.href='{{ route('about.index'.$lang,$lang) }}/'"> {{ __('عن الدكتور') }}  </button>
          </div>
        </div>
        <div class="col-12 col-lg-8 col-md-6">
          <div class="wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
            <ul>
              @foreach ($points as $point)
              <li>  {{ $point->{'title_' . $sign}  ?? ''}}</li>
              @endforeach
            
              

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="about-us-2 bg-white " style="background-color: #f7f7f7 !important;">
    <div class="container p-5">
      <div class="row mb-5">
        <div class="col-12 col-lg-6 col-md-6">
          <div class="pt-5 wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
            <h2>  {{ $ps->{'portfolio_title_' . $sign}  ?? ''}}     </h2>
            <p class="fw-bold">    
              {!! $ps->{'portfolio_details_' . $sign}  ?? '' !!} 
            </p>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6">
          <div class="wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s">
            <img src="{{ $ps->portfolio_photo }} " alt="">
          </div>
        </div>
      </div>
      <div class="row mt-5 fw-bold">
        <div class="col-12 col-lg-6">
          <div class="wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
            <p>   {{ __('يرجى التواصل معنا أو ارسال رسالة على واتساب على رقم 01118886541') }} </p>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s">
            <p> {{ __('يشمل مركز دكتور عبدالرحمن شمس افضل دكتور عيون في السعودية ومصر احدث اجهزة الفحص وغرف عمليات جراحية مجهزة بأحدث الميكروسكوبات الجراحية وافضل الاجهزة في عمليات المياه البيضاء وزراعة العدسات و تصحيح الابصار وزراعة القرنية') }} </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="service text-center p-5 wow animate__animated animate__fadeInDown" data-wow-delay="1s"
    data-wow-duration="1s">
    <div class="container">
      <div class="fw-bold">
        <h2>
          {{ __('الخدمات') }}
        </h2>
      </div>
      <div class="swiper mySwiper mt-4 p-3">
        <div class="swiper-wrapper">

          @foreach ($services as $service)
            
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top" src="{{ $service->photo }}" alt="Card image cap">
              <div class="card-body">
                <a href="{{ route('single-service.index'.$lang,['slug' => $service->{'slug_' . $sign} ,'lang'=> $lang ]) }}/">  {{ $service->{'title_' . $sign} }} </a>
              </div>
            </div>
          </div>

          @endforeach
  

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </div>
  <div class="about-us-3 " style="background-color: #f7f7f7;">
    <div class="container ">
      <div class="row mb-5">
        <div class="col-12 col-lg-6 col-md-6 pt-5">
          <div class="pt-5 mt-4 wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
            <h2 class="fw-bold fs-3 mb-3">{{ __('احجز الان كشفك اون لاين') }}</h2>
            <p class="fw-bold mb-4">   {{ __('تقدر تحجز كشفك اون لاين مع الدكتور عبدالرحمن املي كل البيانات وهيتم التواصل معاك لتاكيد ميعاد الحجز') }} </p>
            <button  onclick="window.location.href='{{ route('book.index'.$lang,$lang) }}/'">   {{ __('حجز الان') }}</button>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6">
          <div class="wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
            <img src="{{ asset('front/dr-shams/') }}/img/dc.webp" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="service-2 text-center">
    <!-- <div class="overlay">
      
    </div> -->
    <div class="container">
      <div>
        <h2> {{ __('افضل دكتور عيون وليزك في مصر') }} </h2>
        <p>  {{ __('تواصل الان واحجز ميعاد كشفك مع افضل طبيب عيون ف القاهره') }}  </p>
        <button  onclick="window.location.href='{{ route('contact.index'.$lang,$lang) }}/'">  {{ __('اتصل الان') }}   </button>
      </div>
      <div class="row">

        @foreach ($models as $model)
          
        <div class="col-12 col-lg-4 col-md-6">
          <div class="div-service wow animate__animated animate__fadeInDown" data-wow-delay="1s" data-wow-duration="1s">
            <i class="fas fa-heart"></i>
            <h2>   {{ $model->{'title_' . $sign}  ?? ''}} </h2>
            <p> {{ $model->{'details_' . $sign}  ?? ''}} </p>
          </div>
        </div>

        @endforeach
 
      </div>
    </div>
  </div>
  <!--<div class="blog p-5">-->
  <!--  <div class="container">-->
  <!--    <div class="text-center">-->
  <!--      <span>  {{ __('اراء العملاء') }}  </span>-->
  <!--      <h1 class="fs-3">-->
  <!--        {{ __('ماذا قال عملاءنا') }} -->
  <!--      </h1>-->
  <!--    </div>-->
  <!--    <div class="swiper mySwiper mt-5">-->
  <!--      <div class="swiper-wrapper">-->

  <!--        @foreach ($reviews as $review)-->
            
  <!--        <div class="swiper-slide">-->
  <!--          <div class="card">-->

  <!--            <img class="card-img-top" src="{{ $review->photo }}" alt="Card image cap">-->

  <!--          </div>-->
  <!--        </div>-->

  <!--        @endforeach-->
           

  <!--      </div>-->
  <!--      <div class="swiper-pagination"></div>-->
  <!--    </div>-->

  <!--  </div>-->
  <!--</div>-->
  <div class="pannar">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <p>  {{ __('هل تريد حجز موعد وسنتواصل معك') }}     </p>
        </div>
        <div class="col-6">
          <button   onclick="window.location.href='{{ route('book.index'.$lang,$lang) }}/'"> {{ __('احجز الان') }}   </button>
        </div>
      </div>
    </div>
  </div>

  @stop