@extends('layouts.front')

@section('title')
   
{{ __('عن الشركة') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')


    
    <div class="header-title ">
        <div class="overlay d-flex justify-content-center align-items-center">
            <h1> {{ __('عن الشركة') }} </h1>
        </div>

    </div>
    <div class="about-us-page bg-white">
        <!-- Modal -->
<div class="modal fade" id="staticBackdrop"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <iframe width="100%" height="500px" src="https://www.youtube.com/embed/oqflk_NfckE?si=jCsso45Lq2PM5DJc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
        <div class="container position-top box p-5">
        <button type="button" class="btn btn-video" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <i class="fas fa-play"></i>
        </button>
            <div class="row pt-5">
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="p-5 wow animate__animated animate__fadeInRight" data-wow-delay="1s"
                        data-wow-duration="1s">
                        <h2 class="fw-bold">{{ __('لماذا يعد دكتور عبدالرحمن شمس') }}</h2>
                        <h2 class="fw-bold">{{ __('افضل دكتور عيون في مصر') }}</h2>
                    </div>
                </div>
                
                {!! $ps->about_details_ar !!}

            </div>
        </div>
    </div>
    <div class="about-us-2-page bg-white">
        <div class="overlay">
            <div class="container p-5">
                <div class="row mb-5">
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="pt-5 wow animate__animated animate__fadeInRight" data-wow-delay="1s"
                            data-wow-duration="1s">
                            <h1> {{ __('يعتبر ايضا دكتور عبد الرحمن شمس هو افضل دكتور عيون في القاهرة ') }}  </h1>
                            <p class="fw-bold" >  {{ __('يعد الدكتور عبد الرحمن شمس اكبر دكتور عيون فى مصر في علاج جفاف العين والمياه البيضاء و تصحيح الابصار والافضل في عمليات الليزك وزرع العدسات في مصر وذلك لأنه يتمتع بخبرة كبيرة في علاج حالات جفاف العين الشديدة حيث قام بالعلاج العديد من الحالات الناجحة بإستخدام أحدث التقنيات بالإضافة إلى أنه حاصل على:') }} </p>
                            <button   onclick="window.location.href='{{ route('book.index') }}'"> {{ __('احجز الان') }}  </button>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class=" wow animate__animated animate__fadeInRight" data-wow-delay="1s"
                            data-wow-duration="1s">
                            <img src="{{ $ps->about_photo }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="blog p-5 wow animate__animated animate__fadeIn" data-wow-delay="1s" data-wow-duration="1s">
        <div class="container">
            <div class="text-center">
                <span>    {{ __('اراء العملاء') }} </span>
                <h1 class="fs-3">
                  {{ __('ماذا قال عملاءنا') }} 
                </h1>
            </div>
            <div class="swiper mySwiper mt-5">
                <div class="swiper-wrapper">

                  @foreach ($reviews as $review)
            
                  <div class="swiper-slide">
                    <div class="card">
        
                      <img class="card-img-top" src="{{ $review->photo }}" alt="Card image cap">
        
                    </div>
                  </div>
        
                  @endforeach
                   

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </div>
 
    <div class="pannar">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <p>  {{ __('هل تريد حجز موعد وسنتواصل معك') }}     </p>
          </div>
          <div class="col-6">
            <button   onclick="window.location.href='{{ route('book.index') }}'"> {{ __('احجز الان') }}   </button>
          </div>
        </div>
      </div>
    </div>
  
     @stop