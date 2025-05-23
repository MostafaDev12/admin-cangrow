 
   
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
$emails =   explode(',', $gs->emails);
$addresses =  json_decode($gs->{'addresses_' . $sign});
$randomPhone = Arr::random($phones);
@endphp

<div class="contact">
    <div class="container">
       <div class="title text-center mb-2">
        <h1 class="fw-bold">حدد موعدًا للمعاينة الان</h1>
        <p>شتيجن  هي شركة مصاعد كاملة الخدمات تقدم حلاً شاملاً من البداية إلى النهاية. لدينا  خبرة اكثر من ١٠ عشر سنوات.</p>
        <a class="btn-contact" href="">احجز معاينه</a>
       </div>
    
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="contact-div d-flex justify-content-center align-items-center">
                <div>
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div>
                    <h2>البريد الالكتروني</h2>
                    <a href="">info@shtegin.com</a>
                </div>            
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="contact-div d-flex justify-content-center align-items-center">
                <div>
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div>
                    <h2> اتصل الان</h2>
                    <a href="">0507048020</a>
                </div>            
            </div>
        </div>
        <div class="col-12">
            <div class="contact-form">
                <form>
                    <h3 class="fw-bold fs-5 mb-4">ادخل تفاصيل الحجز</h3>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">الاسم الاول</label>
                            <input type="text" id="name" class="form-control" placeholder=" الاسم الاول" required>
                        </div>
                        <div class="col-md-6">
                            <label for="age" class="form-label">الاسم الاخير</label>
                            <input type="text" id="age" class="form-control" placeholder="الاسم  الاخير">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">الموبايل</label>
                            <input type="tel" id="mobile" class="form-control text-end" placeholder="ادخل رقم الموبايل">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">البريد الالكتروني</label>
                            <input type="email" id="email" class="form-control" placeholder="إن وجد">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="bookingDate" class="form-label">تاريخ الحجز</label>
                        <input type="date" id="bookingDate" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">التفاصيل</label>
                        <textarea id="details" class="form-control" rows="4"
                            placeholder="تفاصيل الحجز"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-submit w-100 mt-3 px-5"> إرسال <i class="fa-solid fa-envelope"></i> </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>





@stop