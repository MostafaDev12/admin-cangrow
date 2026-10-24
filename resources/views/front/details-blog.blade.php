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
    "@id": "{{ route('single-blog.index'.$lang,['blog' =>$blog->{'slug_' . $sign} ,'lang'=> $lang ]) }}"
  },
  "headline": "{{ $blog->{'meta_title_' . $sign} }}",
  "image": "{{ $blog->photo }}",
  "datePublished": "{{ $blog->created_at }}",
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

    /* =========================
       INLINE ARTICLE VIDEO
       shortcode: [video:ID]
    ========================== */
    .article-video-card {
        width: 100%;
        max-width: 760px;
        margin: 32px auto;
        direction: rtl;
    }
    .article-video-card__trigger {
        position: relative;
        width: 100%;
        padding: 0;
        border: 0;
        background: transparent;
        display: block;
        cursor: pointer;
        text-align: inherit;
    }
    .article-video-card__frame {
        position: relative;
        width: 100%;
        aspect-ratio: 16 / 9;
        overflow: hidden;
        border-radius: 12px;
        border: 2px solid #4ac8de;
        background: #000;
        box-shadow: 0 8px 22px rgba(0,0,0,.18);
    }
    .article-video-card__thumb {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .3s ease;
    }
    .article-video-card__trigger:hover .article-video-card__thumb { transform: scale(1.025); }
    .article-video-card__shade {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,.72) 0%, rgba(0,0,0,.10) 35%, rgba(0,0,0,.10) 58%, rgba(0,0,0,.78) 100%);
        pointer-events: none;
    }
    .article-video-card__top,
    .article-video-card__bottom {
        position: absolute;
        z-index: 2;
        right: 18px;
        left: 18px;
        color: #fff;
    }
    .article-video-card__top { top: 13px; text-align: center; }
    .article-video-card__title {
        display: block;
        color: #fff;
        font-size: 20px;
        line-height: 1.45;
        font-weight: 800;
        text-shadow: 0 2px 7px rgba(0,0,0,.65);
    }
    .article-video-card__author {
        display: block;
        color: #dff7ff;
        font-size: 14px;
        font-weight: 700;
        margin-top: 3px;
    }
    .article-video-card__bottom {
        bottom: 13px;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 14px;
    }
    .article-video-card__brand {
        display: flex;
        flex-direction: column;
        gap: 2px;
        color: #fff;
        font-size: 13px;
        line-height: 1.4;
        text-align: right;
        font-weight: 700;
    }
    .article-video-card__youtube {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        flex: 0 0 auto;
        padding: 7px 11px;
        border-radius: 999px;
        background: rgba(0,0,0,.48);
        color: #fff;
        font-size: 13px;
        font-weight: 800;
    }
    .article-video-card__youtube i { color: #ff0000; font-size: 20px; }
    .article-video-card__play {
        position: absolute;
        z-index: 3;
        top: 50%;
        left: 50%;
        width: 72px;
        height: 50px;
        transform: translate(-50%, -50%);
        border-radius: 13px;
        background: #ff0000;
        display: grid;
        place-items: center;
        box-shadow: 0 7px 18px rgba(0,0,0,.3);
        transition: transform .25s ease, background .25s ease;
    }
    .article-video-card__play::before {
        content: '';
        width: 0;
        height: 0;
        margin-left: 4px;
        border-top: 9px solid transparent;
        border-bottom: 9px solid transparent;
        border-left: 15px solid #fff;
    }
    .article-video-card__trigger:hover .article-video-card__play {
        transform: translate(-50%, -50%) scale(1.08);
        background: #e60000;
    }
    .article-video-card iframe { width: 100%; height: 100%; border: 0; display: block; }
    @media (max-width: 767.98px) {
        .article-video-card { margin: 24px auto; }
        .article-video-card__frame { border-radius: 9px; }
        .article-video-card__top,
        .article-video-card__bottom { right: 10px; left: 10px; }
        .article-video-card__top { top: 9px; }
        .article-video-card__bottom { bottom: 9px; }
        .article-video-card__title { font-size: 14px; }
        .article-video-card__author,
        .article-video-card__brand,
        .article-video-card__youtube { font-size: 11px; }
        .article-video-card__play { width: 58px; height: 40px; }
        .article-video-card__play::before {
            border-top-width: 7px;
            border-bottom-width: 7px;
            border-left-width: 12px;
        }
    }
    @media (max-width: 767px) {

    /* العمودين نفس العرض */
    .social-connect .row > div {
        display: flex;
    }

    /* زر WhatsApp و Call Us نفس المقاس */
    .social-connect .btn-responsive-action {
        width: 100% !important;
        height: 64px !important;
        min-height: 64px !important;

        display: flex !important;
        align-items: center !important;
        justify-content: center !important;

        padding: 0 12px !important;
        box-sizing: border-box !important;
    }

    /* المحتوى جوه الزر */
    .social-connect .btn-responsive-action .icon-container {
        width: 100% !important;
        height: 100% !important;

        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        justify-content: center !important;

        gap: 8px !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    /* النص ماينزلش سطر تاني */
    .social-connect .btn-responsive-action .icon-container p {
        margin: 0 !important;
        padding: 0 !important;

        white-space: nowrap !important;
        width: auto !important;

        font-size: 14px !important;
        line-height: 1 !important;
    }

    /* الأيقونات نفس الحجم */
    .social-connect .btn-responsive-action .icon-container i {
        font-size: 20px !important;
        width: auto !important;
        height: auto !important;

        margin: 0 !important;
        padding: 0 !important;
        line-height: 1 !important;
        flex: 0 0 auto !important;
    }
}
 
</style>

    <div class="header-title blog-detils">
        <div class="overlay d-flex justify-content-center align-items-center">
         
            <h1> {{ $blog->{'title_' . $sign} }}   </h1>
            <br>
            @if(!empty(optional($blog->category)->{'title_' . $sign} )) <a href="{{ route('blogs-category.index'.$lang, ['slug' => $blog->category->{'slug_' . $sign} ,'lang'=> $lang ]) }}" class="">{{ optional($blog->category)->{'title_' . $sign} }}</a> @endif

        </div>

    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                  <div class="doctor">
                            <div class="d-flex  gap-10 align-items-center" style="gap:10px">
                                       <img src="{{ asset('assets/images/blog.jpeg') }}" alt="">

                                     <h2>
                                        <a class="nav-link" href="{{ route('about.index'.$lang,$lang) }}">
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
                            $Call = __('Call Us');

                            /*
                            |--------------------------------------------------------------------------
                            | Reusable Contact Buttons
                            |--------------------------------------------------------------------------
                            | نفس البلوك والكلاسات الحالية يُستخدم:
                            | 1) داخل المقال عند كتابة [contact_buttons]
                            | 2) كأزرار ثابتة في آخر محتوى المقال
                            |--------------------------------------------------------------------------
                            */
                            $contactButtons = <<<HTML
                            <div class="social-connect">
                                <div class="container">
                                    <div class="row px-2">
                                        <div class="col-6 col-md-6 col-lg-4 mb-2 mb-lg-0">
                                            <a href="http://wa.me/2{$randomPhone}" target="_blank" class="btn-custom btn-responsive-action">
                                                <div class="icon-container d-flex pt-3">
                                                    <i class="fab fa-whatsapp"></i>
                                                    <p class="color-white-important">{$WhatsApp}</p>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-6 col-md-6 col-lg-4 mb-2 mb-lg-0">
                                            <a href="tel:+2{$randomPhone}" class="btn-custom btn-responsive-action bg-2">
                                                <div class="icon-container d-flex pt-3">
                                                    <i class="fas fa-phone-alt"></i>
                                                    <p class="color-white-important">{$Call}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            HTML;

                            $content = $blog->{'details_' . $sign};

                            // دعم القيم القديمة الموجودة بالفعل داخل محتوى المقال
                            $content = str_replace(
                                ['{{ $randomPhone }}', "{{ __(&#39;WhatsApp&#39;) }}", "{{ __(&#39;Call Us&#39;) }}"],
                                [$randomPhone, $WhatsApp, $Call],
                                $content
                            );

                            /*
                            |--------------------------------------------------------------------------
                            | [contact_buttons] Shortcode
                            |--------------------------------------------------------------------------
                            | الكاتب يضعه في أي مكان داخل المقال من الداشبورد.
                            | لو الـEditor لفّه داخل <p> نشيل الـ<p> أولاً حتى يظل الـHTML صحيحاً.
                            |--------------------------------------------------------------------------
                            */
                            $content = preg_replace(
                                '/<p[^>]*>\s*(?:&nbsp;\s*)*\[contact_buttons\](?:\s*&nbsp;)*\s*<\/p>/i',
                                $contactButtons,
                                $content
                            );

                            // fallback لو الـshortcode غير موجود داخل <p>
                            $content = str_replace('[contact_buttons]', $contactButtons, $content);


                     /*
|--------------------------------------------------------------------------
| [video:URL] Shortcode
|--------------------------------------------------------------------------
| مثال:
| [video:https://www.youtube.com/embed/ZwdlthI_aoU?si=xxxx]
|--------------------------------------------------------------------------
*/

$content = preg_replace_callback(
    '/\[video:(https?:\/\/[^\]]+)\]/i',
    function ($matches) {

        $youtubeUrl = trim(html_entity_decode($matches[1]));

        // استخراج YouTube ID من الرابط
        if (!preg_match(
            '~(?:youtube(?:-nocookie)?\.com/(?:embed/|watch\?(?:.*&)?v=|shorts/)|youtu\.be/)([A-Za-z0-9_-]{11})~i',
            $youtubeUrl,
            $ytMatch
        )) {
            return '';
        }

        $youtubeId = $ytMatch[1];

        $embedUrl = 'https://www.youtube.com/embed/' . $youtubeId;
        $thumbnail = 'https://img.youtube.com/vi/' . $youtubeId . '/hqdefault.jpg';

        return
            '<div class="article-video-card" data-video-url="' . $embedUrl . '">' .

                '<button class="article-video-card__trigger" type="button">' .

                    '<div class="article-video-card__frame">' .

                        '<img
                            class="article-video-card__thumb"
                            src="' . $thumbnail . '"
                            alt="شاهد الفيديو"
                            loading="lazy"
                        >' .

                        '<span class="article-video-card__shade"></span>' .

                        '<span class="article-video-card__top">' .
                            '<span class="article-video-card__title">
                                شاهد الفيديو
                            </span>' .
                            '<span class="article-video-card__author">
                                د. عبدالرحمن شمس
                            </span>' .
                        '</span>' .

                        '<span class="article-video-card__play"></span>' .

                        '<span class="article-video-card__bottom">' .

                            '<span class="article-video-card__brand">' .
                                '<span>للاستفسار والتثقيف</span>' .
                            '</span>' .

                            '<span class="article-video-card__youtube">' .
                                '<i class="fab fa-youtube"></i>' .
                                '<span>شاهد على YouTube</span>' .
                            '</span>' .

                        '</span>' .

                    '</div>' .

                '</button>' .

            '</div>';
    },
    $content
);

                        @endphp

                        {{-- محتوى المقال --}}
                        {!! $content !!}

                        {{-- FAQ --}}
                        @if(count($blog->faqs) > 0)
                            <h2 class="mb-3">الاسئله الشائعة</h2>
                            <div class="accordion" id="accordionExample">

                                @foreach($blog->faqs as $k => $faq)
                                    <div class="accordion-item box font-cairo">
                                        <h3 class="accordion-header">
                                            <button
                                                class="accordion-button @if($k != 0) collapsed @endif"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#ss{{$faq->id}}"
                                                aria-expanded="{{ $k == 0 ? 'true' : 'false' }}"
                                                aria-controls="ss{{$faq->id}}"
                                            >
                                                {!! $faq->{'title_' . $sign} !!}
                                            </button>
                                        </h3>

                                        <div
                                            id="ss{{$faq->id}}"
                                            class="accordion-collapse collapse @if($k == 0) show @endif"
                                            data-bs-parent="#accordionExample"
                                        >
                                            <div class="accordion-body">
                                                {!! $faq->{'details_' . $sign} !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endif

                        {{-- الأزرار الثابتة في آخر المقال --}}
                        {!! $contactButtons !!}
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 box">
                    <div class=" p-4">
                        <div class="blog-div">
                            <h2> {{ __('احدث المقالات') }}</h2>
                            <hr>

                            @foreach (App\Models\Blog::orderBy('blog_date', 'desc')->where('id','!=',$blog->id)->limit(4)->get() as $k=> $blogg)
                            @php
                            $k++
                            @endphp
                            <div class="d-flex justify-content-between">
                                <div class="pt-2">
                                    <span> <a href="{{ route('single-blog.index'.$lang, ['blog' =>$blogg->{'slug_' . $sign} ,'lang'=> $lang ]) }}"> {{ $blogg->{'title_' . $sign} }} </a> </span>
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
              <button   onclick="window.location.href='{{ route('book.index'.$lang,$lang) }}'"> {{ __('احجز الان') }}   </button>
            </div>
          </div>
        </div>
      </div>
      
    <script>
        document.addEventListener('click', function (event) {
            const trigger = event.target.closest('.article-video-card__trigger');
            if (!trigger) return;

            const card = trigger.closest('.article-video-card');
            if (!card) return;

            const videoUrl = card.getAttribute('data-video-url');
            if (!videoUrl) return;

            const separator = videoUrl.includes('?') ? '&' : '?';

            card.innerHTML = `
                <div class="article-video-card__frame">
                    <iframe
                        src="${videoUrl}${separator}autoplay=1&rel=0"
                        title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allowfullscreen>
                    </iframe>
                </div>
            `;
        });
    </script>

      @stop