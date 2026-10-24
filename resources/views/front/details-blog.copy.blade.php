@extends('layouts.front')

@section('title')
   
{{ $blog->{'title_' . $sign} }} 
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ route('single-blog.index'.$lang,['blog' =>$blog->{'slug_' . $sign} ,'lang'=> $lang ]) }}/"
  },
  "headline": "{{ $blog->{'meta_title_' . $sign} }}",
  "image": "{{ $blog->photo }}",
  "datePublished": "{{ $blog->blog_date }}",
  "dateModified": "{{ $blog->blog_date }}",
  "description": "{{ $blog->{'meta_details_' . $sign} }}",
  "author": {
    "@type": "Person",
    "name": "{{ $gs->{'title_' . $sign} }}",
    "url": "{{ url('/')}}",
    "jobTitle": "{{ $gs->{'title_' . $sign} }}"
  },
  "publisher": {
    "@type": "MedicalOrganization",
    "name": "عيادات الدكتور عبدالرحمن شمس للعيون",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ $gs->{'logo_' . $sign} }}"
    }
  }
}
</script>
@stop


@section('content')
@php
$phones =  explode(',', $gs->phones);
 
$randomPhone = Arr::random($phones);
@endphp

<style>
    .font-cairo {
    font-family: Cairo, sans-serif !important;
}
</style>

    <div class="header-title blog-detils">
        <div class="overlay d-flex justify-content-center align-items-center">
         
            <h1> {{ $blog->{'title_' . $sign} }}   </h1>
            <br>
            @if(!empty(optional($blog->category)->{'title_' . $sign} )) <a href="{{ route('blogs-category.index'.$lang, ['slug' => $blog->category->{'slug_' . $sign} ,'lang'=> $lang ]) }}/" class="">{{ optional($blog->category)->{'title_' . $sign} }}</a> @endif

        </div>

    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                  <div class="doctor">
                            <div class="d-flex  gap-10 align-items-center" style="gap:10px">
                                       <img src="{{ asset('assets/images/blog.jpeg') }}" alt="">

                                     <h2>
                                        <a class="nav-link" href="{{ route('about.index'.$lang,$lang) }}/">
                                            أ
                                            .
                                            د.عبد الرحمن شمس
                                        </a>
                                    </h2>
                               
                                </div>
                                    <p>
استشاري جراحات المياه البيضاء وتصحيح الابصار وعلاج جفاف العيون                                    </p>
        
                        </div>
            </div>
            <div class="row font-cairo">
                <div class="col-12 col-lg-8 col-md-6 font-cairo">
                    <div class="fw-bold">
                        <img class="mb-4" width="100%" src="{{ $blog->photo }}" alt="">
                        
                        @php
                        $WhatsApp = __('WhatsApp');
                        $Call =     __('Call Us');
                        
                        $content =  $blog->{'details_' . $sign};
                         $content = str_replace(['{{ $randomPhone }}', "{{ __(&#39;WhatsApp&#39;) }}", "{{ __(&#39;Call Us&#39;) }}"], [$randomPhone,$WhatsApp, $Call ], $content);

                        @endphp
                        <p>   {!! $content !!}   </p>
                        @if(count($blog->faqs) > 0)
                        <h2 class="mb-3">الاسئله الشائعة</h2>
                        <div class="accordion" id="accordionExample">

                            @foreach($blog->faqs as $k=>$faq )

                            <div class="accordion-item box font-cairo">
                                <h3 class="accordion-header">
                                <button class="accordion-button @if($k != 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#ss{{$faq->id}}" aria-expanded="true" aria-controls="ss{{$faq->id}}">
                                    {!! $faq->{'title_' . $sign} !!} 
                                </button>
                                </h3>
                                <div id="ss{{$faq->id}}" class="accordion-collapse collapse  @if($k == 0) show @endif " data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!! $faq->{'details_' . $sign} !!}  
                                </div>
                                </div>
                            </div>

                            
                            @endforeach
                                            

   <div class="social-connect">
    <div class="container">
        <div class="row px-2">
            <div class="col-6 col-md-6 col-lg-4 mb-2 mb-lg-0">
                <a href="http://wa.me/2{{ $randomPhone }}" target="_blank" class="btn-custom btn-responsive-action">
                    <div class="icon-container d-flex pt-3">
                        <i class="fab fa-whatsapp"></i>
                        <p class="color-white-important"> {{ __('WhatsApp') }}</p>

                    </div>
                </a>
            </div>

            <div class="col-6 col-md-6 col-lg-4 mb-2 mb-lg-0">
                <a href="tel:+2{{ $randomPhone }}" class="btn-custom btn-responsive-action bg-2">
                    <div class="icon-container  d-flex pt-3">
                        <i class="fas fa-phone-alt"></i>
                        <p class="color-white-important"> {{ __('Call Us') }}</p>

                    </div>
                </a>
            </div>
        </div>
    </div>


</div>
                        </div>

                        @endif
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
                                    <h3> <a href="{{ route('single-blog.index'.$lang, ['blog' =>$blogg->{'slug_' . $sign} ,'lang'=> $lang ]) }}/"> {{ $blogg->{'title_' . $sign} }} </a> </h3>
                                    <span>{{ $blogg->blog_date }}</span>
                                </div>
                                <img class="mb-4" src="{{ $blogg->photo }}" alt="">
                            </div>

                            @endforeach 
                              
                        </div>
                        <div class="mb-4">
                            <a href="https://abdelrhmanshams.com/services/%D8%AC%D9%84%D8%B3%D8%A7%D8%AA-%D8%AC%D9%81%D8%A7%D9%81-%D8%A7%D9%84%D8%B9%D9%8A%D9%86">
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
              <button   onclick="window.location.href='{{ route('book.index'.$lang,$lang) }}/'"> {{ __('احجز الان') }}   </button>
            </div>
          </div>
        </div>
      </div>
      @stop