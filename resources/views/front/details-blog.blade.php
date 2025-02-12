@extends('layouts.front')

@section('title')
   
{{ $blog->{'title_' . $sign} }}   -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
@php
$phones =  explode(',', $gs->phones);
 
$randomPhone = Arr::random($phones);
@endphp
    <div class="header-title ">
        <div class="overlay d-flex justify-content-center align-items-center">
           @if(!empty(optional($blog->category)->{'title_' . $sign} )) <a href="{{ route('blogs-category.index',$blog->category->{'slug_' . $sign}) }}" class="">{{ optional($blog->category)->{'title_' . $sign} }}</a> @endif

            <h1> {{ $blog->{'title_' . $sign} }}   </h1>
        </div>

    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 col-md-6">
                    <div class="fw-bold">
                        <img class="mb-4" width="100%" src="{{ $blog->photo }}" alt="">
                        
                        <p>   {!! $blog->{'details_' . $sign} !!}   </p>
                     
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 box">
                    <div class=" p-4">
                        <div class="blog-div">
                            <h2> {{ __('احدث المقالات') }}</h2>
                            <hr>

                            @foreach (App\Models\Blog::orderBy('blog_date', 'desc')->where('id','!=',$blog->id)->limit(6)->get() as $k=> $blogg)
                            @php
                            $k++
                            @endphp
                            <div class="d-flex justify-content-between">
                                <div class="pt-2">
                                    <h3> <a href="{{ route('single-blog.index',$blogg->{'slug_' . $sign}) }}"> {{ $blogg->{'title_' . $sign} }} </a> </h3>
                                    <span>{{ $blogg->blog_date }}</span>
                                </div>
                                <img class="mb-4" src="{{ $blogg->photo }}" alt="">
                            </div>

                            @endforeach 
                              
                        </div>
                        <div class="mb-4">
                            <a href="">
                                <img src="{{ asset('front/dr-shams/') }}/img/asa.webp" width="100%" alt="">
                            </a>
                        </div>
                        <form action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST" autocomplete="off" class="cons-contact-form">
                            {{csrf_field()}}
                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>
                            <h3 class="fw-bold fs-5 mb-4"> {{ __('تواصل معنا') }}</h3>
                            <div class=" mb-3">
                                <div class="col-12">
                                    <label for="name" class="form-label">{{ __('الاسم') }}</label>
                                    <input type="text" id="name" class="form-control w-100 fname" placeholder="{{ __(key: 'ادخل اسمك') }}">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <div class="col-12">
                                    <label for="email" class="form-label">{{ __('البريد الالكتروني') }}</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="{{ __('الايميل') }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="details" class="form-label">{{ __('الرسالة') }}</label>
                                <textarea id="details" name="text" class="form-control" rows="4"
                                    placeholder="{{ __('اكتب الرسالة') }}"></textarea>
                            </div>
                            <input type="hidden" name="blog" value="{{ $blog->{'title_' . $sign} }}">
                            @if($gs->is_capcha == 1)

                            <ul class="captcha-area">
                              <li>
                                <p><img style="width: 180px;" class="codeimg1" src="{{asset("assets/images/capcha_code.png")}}" alt=""> <i class="fas fa-sync-alt pointer refresh_code"></i></p>
                            
                              </li>
                              <li>
                                <input name="codes" type="text" class="input-field" placeholder="{{ __('ادخل الكود') }}" required="">
                            
                              </li>
                            </ul>
                            
                            @endif
                            <div class="text-center">
                                <button type="submit" class="btn btn-submit w-100 mt-3 px-5">  {{ __('إرسال') }}<i class="fa-solid fa-envelope text-white"></i> </button>
                            </div>
                        </form>
                        @php
                        $phones =  explode(',', $gs->phones);
                         
                        $randomPhone = Arr::random($phones);
                        @endphp
                         <div class="mt-4 mb-4">
                            <i class="fas fa-phone"></i><a class="mb-3" href="tel:+2{{ $randomPhone }}">{{ $randomPhone }}</a> <br>
                            <br>
                            <i class="fab fa-whatsapp"></i><a href="http://wa.me/2{{ $randomPhone }}">{{ $randomPhone }}</a><br>
                        </div>
                       
                    </div>
                </div>
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