
   
@extends('layouts.front')

@section('title')
   
{{ __('اتصل بنا') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
@php
$phones =  explode(',', $gs->phones);
$addresses =  json_decode($gs->{'addresses_' . $sign});
$randomPhone = Arr::random($phones);
@endphp
    <div class="header-title ">
        <div class="overlay d-flex justify-content-center align-items-center">
            <h1>   {{ __('اتصل بنا') }}</h1>
        </div>

    </div>
    <div class="contact p-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-4">
                    <div class="p-4 mt-4 wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s">
                        <span class="mb-3 d-block">  {{ __('ابقى على تواصل') }}</span>
                        <p>  {{ __('يمكنكم زياراتنا ومراسلتنا') }}</p>
                        <p>{{ __('نعمل علي مدار اليوم لاستقبال طلباتكم') }}</p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-4">
                    <div class="text-center mb-3 contact-div p-4 wow animate__animated animate__fadeInDown" data-wow-delay="1s" data-wow-duration="1s">
                        <i class="fas fa-location"></i>
                        <h2>{{ __('العنوان') }}</h2>
                        @foreach ($addresses as $address)
                
                        <p> {{ $address }}  </p>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-4">
                    <div class="text-center contact-div p-4 wow animate__animated animate__fadeInDown" data-wow-delay="1s" data-wow-duration="1s">
                        <i class="fas fa-phone"></i>
                        <h2>{{ __('الموبيل') }}</h2>
                        @foreach ($phones as $phone)
                        <a href="tel:+2{{ $phone }}">{{ $phone }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5 wow animate__animated animate__fadeInDown" data-wow-delay="1s" data-wow-duration="1s">
            <div>
              {!! $gs->map !!}
            </div>
        </div>
    </div>
    <div class="contact-form wow animate__animated animate__fadeInUp" data-wow-delay="1s" data-wow-duration="1s">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-6">
                    <div>
                        <img src="{{ asset('front/dr-shams/') }}/img/dc.webp" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="p-4 pt-5">
                        
                        <form action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST" autocomplete="off" class="cons-contact-form">
                            {{csrf_field()}}
                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>
                            <h3 class="fw-bold fs-5 mb-4">{{ __('ادخل تفاصيل الحجز') }}</h3>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">{{ __('الاسم') }}*</label>
                                    <input type="text" id="name"  name="name" class="form-control fname" required placeholder="{{ __(key: 'ادخل اسمك') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="age" class="form-label">{{ __('السن') }}</label>
                                    <input type="number" id="age" name="age" class="form-control" placeholder="{{ __('السن') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="mobile" class="form-label">{{ __('الموبايل') }}*</label>
                                    <input type="tel" id="mobile"  name="phone" required class="form-control text-end" placeholder="{{ __('ادخل رقم الموبيل') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">  {{ __('البريد الالكتروني') }} </label>
                                    <input type="email" id="email"  name="email" class="form-control" placeholder="{{ __('ان وجد') }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="specialty" class="form-label">{{ __('نوع التعب') }}</label>
                                <input type="text" id="specialty"  name="specialty" class="form-control" placeholder="{{ __('ادخل اسم التخصص') }}">
                            </div>
                            <div class="mb-3">
                                <label for="bookingDate" class="form-label"> {{ __(' تاريخ الحجز') }} </label>
                                <input type="date" id="bookingDate"  name="bookingDate" class="form-control">
                            </div>
                          
                            <div class="mb-3">
                                <label for="details" class="form-label">{{ __('التفاصيل') }}</label>
                                <textarea id="details" class="form-control" rows="4" name="text"
                                    placeholder="{{ __('تفاصيل الحجز') }}"></textarea>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-submit w-100 mt-3 px-5">  {{ __('إرسال') }}<i class="fa-solid fa-envelope"></i> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-4">
        <div class="text-center">
            <h2 class="fw-bold">{{ __('هل تريد مساعدة سريعه؟') }}</h2>
            <p class="fw-bold mt-3">{{ __('تواصل معنا علي الخط الساخن') }}</p>
            @foreach ($phones as $phone)
                
            <a class="fw-bold fs-5" href="tel:+2{{ $phone }}"> {{ $phone }} <i class="fas fa-phone"></i></a>

            @endforeach
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