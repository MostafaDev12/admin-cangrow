     
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
  <div class="slider">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        @foreach ($sliders as $slider)
        <!-- Slide 1 -->
        <div class="swiper-slide">
          <div class="slide-inner">
            <img src="{{ $slider->{'photo'}  ?? ''}}" loading="lazy" alt="Slide Image">
            <div class="overlay"></div>
            <div class="slide-content">
              <h2>   {{ $slider->{'title_' . $sign}  ?? ''}}</h2>
              <p> {!! $slider->{'details_' . $sign}  ?? '' !!}</p>
              <a href="#about">اعرف المزيد</a>
            </div>
          </div>
        </div>
  
        @endforeach
        
      
  
      </div>
  
      <!-- Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </div>
  
  <div id="about" class="about pt-2 pb-5">
    <div class="container p-lg-5">
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="">
            <h2>   {{ $ps->{'portfolio_title_' . $sign}  ?? ''}}    </h2>
            <p> {!! $ps->{'portfolio_details_' . $sign}  ?? '' !!}</p>
            <a class="btn-about" href="{{ route('about.index') }}">اقرأ المزيد</a>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <img src="{{ $ps->portfolio_photo }}" alt="About Image">
        </div>
      </div>
      <div class="row ">
        @foreach ($models as $model)
        
        <div class="col-12 col-lg-3 col-md-6">
          <div class="about-box">
            <img src="{{ $model->photo }}" alt="About Image">
            <h3> {{ $model->{'title_' . $sign} }}  </h3>
            <p>  {{ $model->{'details_' . $sign}  ?? ''}}</p>
          </div>
        </div>

        @endforeach
 


      </div>
    </div>
  </div>

  
  <div class="service">
    <div class="container p-lg-5">
      <div class="row">
        <div class="col-12 col-lg-6">
          <h2>خدماتنا</h2>
          <p>نقدم مجموعة متنوعة من الخدمات التي تلبي احتياجات عملائنا في مجال المصاعد. تشمل خدماتنا تصميم وتركيب وصيانة الأنظمة المختلفة.</p>
          <a class="btn-service" href="{{ route('services.index') }}">اقرأ المزيد</a>
        </div>
        <div class="col-12 col-lg-6">
          <img src="img/3961.jpg" alt="Service Image">
        </div>
      </div>
      <div class="row">
  @foreach ($services as $service)
        <div class="col-12 col-lg-4 col-md-6">
          <div class="service-box">
            <img src="{{ $service->photo }}" alt="Service Image">
            <div class="service-box-content">
              <h3>  {{ $service->{'title_' . $sign} }}     </h3>
              <p>   {{ $service->{'short_details_' . $sign} }} </p>
              <a href="{{ route('single-service.index',['slug' => $service->{'slug_' . $sign} ]) }}">المزيد</a>
            </div>
          </div>
        </div>
 @endforeach

      </div>
    </div>
  </div>
  <div class="details-features">
    <div class="container p-lg-5">
      <div class="text-xl-center mb-4">
        <h2>عن شتيجن</h2>
        <P>عندما تم التفكير في شتيجن للمرة الأولى، سعينا إلى بناء نموذج عمل يركز على الجودة والانتباه للتفاصيل. نهج مستوحى لتنفيذ مشاريع سكنية وتجارية عالية الجودة</P>
      </div>
      <div class="row">
        @php
          $icons = [
          'fa-lightbulb' , 'fa-user' , 'fa-bucket','fa-circle-check'

          ]
        @endphp
         @foreach ($points as $point)
        <div class="col-12 col-lg-4 col-md-6">
          <div class="box-features">
            <div class="d-flex">
              <div>
                <i class="fa-solid {{ $icons[rand(0,3)] ?? '' }}"></i>
              </div>
              <div>
                <h2>  {{ $point->{'title_' . $sign}  ?? ''}}     </h2>
                <p>  {{ $point->{'details_' . $sign}  ?? ''}}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach 


      </div>
    </div>
  </div>
  <section class="stats-section">
    <div class="container">
      <div class="stats-grid">
        
        <div class="stat-box">
          <div class="icon"><i class="fa-solid fa-building-shield"></i></div>
          <h3 class="counter" data-target="1430">0</h3>
          <p>مشاريع مكتملة</p>
        </div>
  
        <div class="stat-box">
          <div class="icon"><i class="fa-solid fa-helmet-safety"></i></div>
          <h3 class="counter" data-target="43">0</h3>
          <p>مهندسين محترفين</p>
        </div>
  
        <div class="stat-box">
          <div class="icon"><i class="fa-solid fa-ruler"></i></div>
          <h3 class="counter" data-target="747">0</h3>
          <p>+عقود صيانة</p>
        </div>
  
        <div class="stat-box">
          <div class="icon"><i class="fa-solid fa-building-circle-check"></i></div>
          <h3 class="counter" data-target="4">0</h3>
          <p>+فروع في المملكة</p>
        </div>
  
      </div>
    </div>
  </section>
  @include('includes.book')




 @stop