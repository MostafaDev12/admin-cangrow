 @extends('layouts.front')

@section('title')
   
{{ $blog->{'title_' . $sign} }}   -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

    <style>
          h1,a{
            color: #ae9461 !important;
        }
        img{
            width: 100% !important;
        }
    </style>
@section('content')
@php
$phones =  explode(',', $gs->phones);
 
$randomPhone = Arr::random($phones);
@endphp
  <div class="content">
    <div class="container">
        <div class="title">
            <h1>     {{ $blog->{'title_' . $sign} }}   </h1>
        </div>
        <div class="row">
            <!-- المحتوى الرئيسي -->
            <div class="col-12 col-lg-8 col-md-6">
                <div class="fw-bold">
                    <img class="mb-4" width="100%" src="{{ $blog->photo }}" alt="">
                      {!! $blog->{'details_' . $sign} !!}  

                    <!-- أزرار التواصل -->
                    <div class="social-connect">
                        <div class="container">
                            <div class="row px-2">
                                <div class="col-6 col-md-6 col-lg-4 mb-2 mb-lg-0">
                                    <a href="https://wa.me/+2{{ $randomPhone }}" target="_blank" class="btn-custom btn-responsive-action">
                                        <div class="icon-container d-flex pt-3">
                                            <i class="fab fa-whatsapp"></i>
                                            <p class="color-white-important"> WhatsApp</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-6 col-md-6 col-lg-4 mb-2 mb-lg-0">
                                    <a href="tel:+2{{ $randomPhone }}" class="btn-custom btn-responsive-action bg-2">
                                        <div class="icon-container  d-flex pt-3">
                                            <i class="fas fa-phone-alt"></i>
                                            <p class="color-white-important"> Call Us</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <!-- الشريط الجانبي -->
            <div class="col-12 col-lg-4 col-md-6 box">
                <div class="p-4">
                    <div class="blog-divs">
                        <h2>أحدث المقالات</h2>
                        <hr>
 @foreach (App\Models\Blog::orderBy('blog_date', 'desc')->where('id','!=',$blog->id)->limit(6)->get() as $k=> $blogg)
                            @php
                            $k++
                            @endphp
                        <!-- تكرار مقالات -->
                        <div class="d-flex justify-content-between mb-3">
                            <div class="pt-2">
                                <h3> <a href="{{ route('single-blog.index',$blogg->{'slug_' . $sign}) }}"> {{ $blogg->{'title_' . $sign} }} </a>      </h3>
                                <span>   {{ $blogg->blog_date }}    </span>
                            </div>
                            <img src="{{ $blogg->photo }}" width="80" alt="">
                        </div>
 @endforeach 
                         

                    </div>

                    <!-- إعلان -->
                    <div class="mb-4">
                        <a href="">
                            <img src="{{ asset('front/shtegin/') }}/img/slider.jpg" width="100%" alt="">
                        </a>
                    </div>

                    <!-- نموذج تواصل -->
                  <form action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST" autocomplete="off" class="cons-contact-form">
                            {{csrf_field()}}
                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>
                        <h3 class="fw-bold fs-5 mb-4">تواصل معنا</h3>
                        <div class="mb-3">
                            <label for="name" class="form-label">الاسم</label>
                            <input type="text" id="name" name="name" class="form-control w-100" placeholder="ادخل اسمك">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">البريد الإلكتروني</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="إن وجد">
                        </div>
                        <div class="mb-3">
                            <label for="details" class="form-label">الرسالة</label>
                            <textarea id="details" name="text" class="form-control" rows="4" placeholder="اكتب الرسالة"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-submit w-100 mt-3 px-5"> إرسال <i class="fa-solid fa-envelope text-white"></i> </button>
                        </div>
                    </form>

                    <!-- معلومات الاتصال -->
                    <div class="mt-4 mb-4">
  @foreach ($phones as $phone)
                        <i class="fas fa-phone"></i><a href="tel:+2{{ $phone }}"> {{ $phone }} </a><br>
 @endforeach
                        <i class="fab fa-whatsapp"></i><a href="https://wa.me/2{{ $randomPhone  }}"> {{ $randomPhone  }} </a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






 @stop