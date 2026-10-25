@extends('layouts.front')

@section('title')
{{ $blog->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ route('single-blog.index',['blog' =>$blog->{'slug_' . $sign}  ]) }}/"
  },
  "headline": "{{ $blog->{'meta_title_' . $sign} }}",
  "image": "{{ $blog->photo }}",
  "datePublished": "{{ $blog->created_at }}",
  "dateModified": "{{ $blog->blog_date }}",
  "description": "{{ $blog->{'meta_details_' . $sign} }}",
  "author": {
    "@type": "Person",
    "name": "ا.د. محمد عاطف",
    "url": "{{ url('/')}}",
    "jobTitle": "استشارى طب وجراحه الفم والأسنان"
  },
  "publisher": {
    "@type": "MedicalOrganization",
    "name": "{{ $gs->{'title_' . $sign} }}",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ $gs->{'logo_' . $sign} }}"
    }
  }
}
</script>
@stop

@section('css')
<style>

/* ========================================
   ARTICLE BASE
======================================== */

.article-content {
    font-size: 18px;
    line-height: 2;
    color: #111111;
}


/* ========================================
   NORMAL ARTICLE TEXT
======================================== */

.article-content p,
.article-content li {
    font-size: 18px !important;
    line-height: 2 !important;
}

.article-content p {
    margin: 0 0 20px !important;
}


/* النصوص الداخلية داخل الفقرات والقوائم فقط */
.article-content p span,
.article-content p strong,
.article-content p b,
.article-content li span,
.article-content li strong,
.article-content li b {
    font-size: inherit !important;
    line-height: inherit !important;
}


/* ========================================
   ARTICLE HEADINGS
======================================== */

.article-content h2,
.article-content h2 * {
    font-size: 30px !important;
    font-weight: 800 !important;
    line-height: 1.55 !important;
}

.article-content h2 {
    margin: 38px 0 18px !important;
}


.article-content h3,
.article-content h3 * {
    font-size: 25px !important;
    font-weight: 800 !important;
    line-height: 1.6 !important;
}

.article-content h3 {
    margin: 32px 0 16px !important;
}


.article-content h4,
.article-content h4 * {
    font-size: 21px !important;
    font-weight: 700 !important;
    line-height: 1.6 !important;
}

.article-content h4 {
    margin: 28px 0 14px !important;
}


/* ========================================
   ARTICLE LISTS
======================================== */

.article-content ul {
    list-style-type: disc !important;
    list-style-position: outside !important;

    margin: 18px 0 24px !important;

    padding-right: 32px !important;
    padding-left: 0 !important;
}

.article-content ol {
    list-style-type: decimal !important;
    list-style-position: outside !important;

    margin: 18px 0 24px !important;

    padding-right: 36px !important;
    padding-left: 0 !important;
}

.article-content ul li,
.article-content ol li {
    display: list-item !important;

    margin-bottom: 10px !important;

    padding-right: 4px;

    font-size: 18px !important;
    line-height: 2 !important;
}

.article-content ul li::marker {
    color: #111827 !important;
    font-size: 1em;
}

.article-content ol li::marker {
    color: #111827 !important;
    font-weight: 700;
}

.article-content li:last-child {
    margin-bottom: 0 !important;
}


/* ========================================
   Contact Buttons
======================================== */

.blog-contact-buttons {
    display: flex;
    width: 100%;
    gap: 16px;
    margin: 32px 0;
}

.blog-contact-btn {
    flex: 1;
    min-height: 60px;

    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

    border-radius: 8px;

    font-size: 18px;
    font-weight: 700;
    text-decoration: none !important;

    transition:
        background-color 0.3s ease,
        border-color 0.3s ease,
        color 0.3s ease;
}

.blog-contact-btn.whatsapp {
    background: #f58220;
    color: #ffffff;
    border: 2px solid #f58220;
}

.blog-contact-btn.call {
    background: #111111;
    color: #ffffff;
    border: 2px solid #111111;
}

.blog-contact-btn.whatsapp:hover {
    background: #111111;
    border-color: #111111;
    color: #ffffff;
}

.blog-contact-btn.call:hover {
    background: #f58220;
    border-color: #f58220;
    color: #ffffff;
}

.blog-contact-btn i {
    font-size: 22px;
}


/* ========================================
   Blog FAQs
======================================== */

.blog-faqs {
    width: 100%;
    margin: 45px 0;
}

.blog-faqs-title {
    margin: 0 0 20px;

    font-size: 30px !important;
    font-weight: 800;
    line-height: 1.4;

    color: #111111;
}

.blog-faq-accordion {
    width: 100%;
    border: 1px solid #d9dee5;
}

.blog-faq-item {
    width: 100%;
    margin: 0;

    background: #ffffff;

    border: 0;
    border-bottom: 1px solid #d9dee5;

    overflow: hidden;
}

.blog-faq-item:last-child {
    border-bottom: 0;
}

.blog-faq-button {
    width: 100%;
    min-height: 64px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 20px;

    padding: 16px 28px;

    background: #ffffff;
    color: #0f2c4a;

    border: 0;
    outline: 0;

    font-family: inherit;
    font-size: 19px !important;
    font-weight: 700;
    line-height: 1.6;

    text-align: inherit;

    cursor: pointer;

    transition:
        background-color 0.25s ease,
        color 0.25s ease;
}

.blog-faq-button:not(.collapsed) {
    background: #cfe2ff;
    color: #003b7a;
}

.blog-faq-button:focus,
.blog-faq-button:focus-visible {
    outline: none;
    box-shadow: none;
}

.blog-faq-button > span:first-child {
    flex: 1;
    font-size: inherit !important;
}

.blog-faq-icon {
    width: 13px;
    height: 13px;

    display: block;
    flex: 0 0 13px;

    border-right: 1.8px solid #111111;
    border-bottom: 1.8px solid #111111;

    transform: rotate(45deg);

    transition: transform 0.25s ease;
}

.blog-faq-button:not(.collapsed) .blog-faq-icon {
    transform: rotate(225deg);
}

.blog-faq-panel {
    display: none;
    width: 100%;
}

.blog-faq-panel.show {
    display: block;
}

.blog-faq-answer {
    width: 100%;

    padding: 18px 28px 28px;

    background: #ffffff;
    color: #111111;

    font-family: inherit;
    font-size: 18px;
    font-weight: 500;
    line-height: 1.9;
}

.blog-faq-answer p {
    margin: 0 0 12px;

    color: inherit;

    font-size: inherit !important;
    line-height: inherit !important;
}

.blog-faq-answer p:last-child {
    margin-bottom: 0;
}

.blog-faq-answer ul,
.blog-faq-answer ol {
    margin: 10px 0;
    padding-inline-start: 24px;
}

.blog-faq-answer li {
    margin-bottom: 6px;

    font-size: inherit !important;
    line-height: inherit !important;
}

.blog-faq-answer a {
    color: #0793b0;
    text-decoration: underline;
}


/* ========================================
   RTL
======================================== */

html[dir="rtl"] .article-content,
html[dir="rtl"] .blog-faqs {
    direction: rtl;
    text-align: right;
}

html[dir="rtl"] .blog-faqs-title,
html[dir="rtl"] .blog-faq-button,
html[dir="rtl"] .blog-faq-answer {
    text-align: right;
}


/* ========================================
   LTR
======================================== */

html[dir="ltr"] .article-content,
html[dir="ltr"] .blog-faqs {
    direction: ltr;
    text-align: left;
}

html[dir="ltr"] .blog-faqs-title,
html[dir="ltr"] .blog-faq-button,
html[dir="ltr"] .blog-faq-answer {
    text-align: left;
}


/* ========================================
   MOBILE
======================================== */

@media (max-width: 768px) {

    .article-content {
        font-size: 17px;
        line-height: 1.9;
    }

    .article-content p,
    .article-content li {
        font-size: 17px !important;
        line-height: 1.9 !important;
    }

    .article-content p {
        margin-bottom: 16px !important;
    }


    /* H2 */

    .article-content h2,
    .article-content h2 * {
        font-size: 26px !important;
        font-weight: 800 !important;
        line-height: 1.5 !important;
    }

    .article-content h2 {
        margin: 30px 0 16px !important;
    }


    /* H3 */

    .article-content h3,
    .article-content h3 * {
        font-size: 23px !important;
        font-weight: 800 !important;
        line-height: 1.55 !important;
    }

    .article-content h3 {
        margin: 26px 0 14px !important;
    }


    /* H4 */

    .article-content h4,
    .article-content h4 * {
        font-size: 20px !important;
        font-weight: 700 !important;
    }


    /* Lists */

    .article-content li {
        margin-bottom: 8px !important;
    }

    .article-content ul,
    .article-content ol {
        margin: 16px 0 20px !important;
        padding-right: 24px !important;
    }


    /* Contact buttons */

    .blog-contact-buttons {
        flex-direction: column;
        gap: 12px;
    }

    .blog-contact-btn {
        width: 100%;
        min-height: 56px;

        font-size: 16px;
    }


    /* FAQ */

    .blog-faqs {
        margin: 35px 0;
    }

    .blog-faqs-title {
        margin-bottom: 18px;

        font-size: 25px !important;
    }

    .blog-faq-item {
        margin-bottom: 18px;
    }

    .blog-faq-button {
        min-height: 58px;

        gap: 15px;

        padding: 15px 18px;

        font-size: 17px !important;
        line-height: 1.6;
    }

    .blog-faq-icon {
        width: 11px;
        height: 11px;
        flex-basis: 11px;
    }

    .blog-faq-answer {
        padding: 16px 18px 22px;

        font-size: 16px;
        line-height: 1.8;
    }
}


/* ========================================
   SMALL MOBILE
======================================== */

@media (max-width: 480px) {

    .article-content {
        font-size: 16px;
    }

    .article-content p,
    .article-content li {
        font-size: 16px !important;
    }

    .article-content h2,
    .article-content h2 * {
        font-size: 24px !important;
    }

    .article-content h3,
    .article-content h3 * {
        font-size: 21px !important;
    }

    .article-content h4,
    .article-content h4 * {
        font-size: 19px !important;
    }

    .blog-faqs-title {
        font-size: 23px !important;
    }

    .blog-faq-button {
        padding: 14px 16px;

        font-size: 16px !important;
    }

    .blog-faq-answer {
        padding: 15px 16px 20px;

        font-size: 15px;
    }
}

/* ========================================
   ARTICLE TABLES — RESPONSIVE FIX
======================================== */

.article-content {
    width: 100% !important;
    max-width: 100% !important;


}


/* أي جدول جاي من الداشبورد */
.article-content table {
    width: 100% !important;
    max-width: 100% !important;
    min-width: 0 !important;

    margin: 24px 0 !important;

    border-collapse: collapse !important;
    table-layout: fixed !important;

    background: #ffffff;
}


/* خلايا الجدول */
.article-content table th,
.article-content table td {
    width: auto !important;
    max-width: 100% !important;

    padding: 12px 14px !important;

    white-space: normal !important;

    overflow-wrap: anywhere !important;
    word-break: break-word !important;

    vertical-align: top;

    line-height: 1.8 !important;
}


/* لو الداشبورد حاطط width على عناصر داخل الجدول */
.article-content table p,
.article-content table span,
.article-content table div,
.article-content table a {
    max-width: 100% !important;

    white-space: normal !important;

    overflow-wrap: anywhere !important;
    word-break: break-word !important;
}


/* الصور داخل الجدول */
.article-content table img {
    display: block;

    width: auto !important;
    max-width: 100% !important;
    height: auto !important;
}


/* ========================================
   MOBILE TABLES
======================================== */

@media (max-width: 768px) {

    .article-content {
        width: 100% !important;
        max-width: 100% !important;

        overflow-x: hidden !important;
    }

    .article-content table {
        width: 100% !important;
        max-width: 100% !important;

        margin: 18px 0 !important;

        table-layout: fixed !important;

        font-size: 14px !important;
    }

    .article-content table th,
    .article-content table td {
        padding: 9px 8px !important;

        font-size: 14px !important;
        line-height: 1.7 !important;

        white-space: normal !important;

        overflow-wrap: anywhere !important;
        word-break: break-word !important;
    }

}


/* ========================================
   SMALL MOBILE
======================================== */

@media (max-width: 480px) {

    .article-content table {
        font-size: 12px !important;
    }

    .article-content table th,
    .article-content table td {
        padding: 7px 6px !important;

        font-size: 12px !important;
        line-height: 1.6 !important;
    }

}

/* ========================================
   ARTICLE TABLE — FINAL FIX
======================================== */

.article-content {
    width: 100% !important;
    max-width: 100% !important;
    overflow: visible !important;
}

.article-content table {
    width: 100% !important;
    max-width: 100% !important;
    min-width: 0 !important;

    table-layout: fixed !important;
    border-collapse: collapse !important;

    margin: 24px 0 !important;

    direction: rtl;
}

.article-content table col,
.article-content table colgroup {
    width: auto !important;
}

.article-content table th,
.article-content table td {
    width: auto !important;
    max-width: none !important;

    padding: 12px 10px !important;

    white-space: normal !important;
    word-break: normal !important;
    overflow-wrap: anywhere !important;

    vertical-align: top;

    font-size: 16px !important;
    line-height: 1.8 !important;
}

.article-content table th {
    font-weight: 800 !important;
}


/* MOBILE */

@media (max-width: 768px) {

    .article-content table {
        width: 100% !important;
        table-layout: fixed !important;

        margin: 18px 0 !important;
    }

    .article-content table th,
    .article-content table td {
        padding: 8px 6px !important;

        font-size: 13px !important;
        line-height: 1.65 !important;
    }
}


/* SMALL MOBILE */

@media (max-width: 480px) {

    .article-content table th,
    .article-content table td {
        padding: 7px 5px !important;

        font-size: 12px !important;
    }
}
/* ========================================
   TABLE — EXTRA MOBILE INSET
======================================== */

@media (max-width: 768px) {

    .article-content table {
        width: 96% !important;
        max-width: 96% !important;

        margin: 18px auto !important;
    }

}

@media (max-width: 480px) {

    .article-content table {
        width: 94% !important;
        max-width: 94% !important;

        margin-left: auto !important;
        margin-right: auto !important;
    }

}

</style>
@stop

@section('content')
@php
$phones = explode(',', $gs->phones);
$randomPhone = Arr::random($phones);

$WhatsApp = __('WhatsApp');
$Call = __('Call Us');

$contactButtons = '
<div class="blog-contact-buttons">
    <a href="https://wa.me/2'.$randomPhone.'"
       target="_blank"
       rel="noopener noreferrer"
       class="blog-contact-btn whatsapp">
        <i class="fab fa-whatsapp"></i>
        <span>'.$WhatsApp.'</span>
    </a>

    <a href="tel:+2'.$randomPhone.'"
       class="blog-contact-btn call">
        <i class="fas fa-phone-alt"></i>
        <span>'.$Call.'</span>
    </a>
</div>';

$content = $blog->{'details_merged_' . $sign};

$content = preg_replace(
    '/<p[^>]*>\s*(?:&nbsp;\s*)*\[contact_buttons\](?:\s*&nbsp;)*\s*<\/p>/i',
    $contactButtons,
    $content
);

$content = str_replace('[contact_buttons]', $contactButtons, $content);
@endphp

<section class="container mx-auto px-4 md:px-8 lg:px-16 xl:px-32 min-h-screen my-10">
    <div>
        <span class="uppercase text-accent font-semibold leading-4">{{ __('blogs') }}</span>
        <h2 class="text-primary font-bold text-4xl italic">{{ __('blogs') }}</h2>
    </div>

    <div class="flex items-center gap-4 mt-4">
     
           @php
    $doctorsUrl = url('/'.$sign.'/doctors');
@endphp

<div class="flex items-center gap-4 mt-4">

    <a href="{{ $doctorsUrl }}"
       class="relative shrink-0 block"
       aria-label="{{ $sign == 'ar' ? 'الفريق الطبي' : 'Medical Team' }}">

        <img
            src="{{ asset('images/dr-mohamed-atef-dental-clinic.jpg') }}"
            alt="{{ $sign == 'ar' ? 'أ.د. محمد عاطف' : 'Dr. Mohamed Atef' }}"
            class="w-20 h-20 rounded-full object-cover border-2 border-gray-100 shadow-sm hover:opacity-90 transition"
        >

    </a>

    <div class="flex flex-col">

        <span class="text-xl md:text-2xl font-bold text-blue-800 leading-tight">

            <a href="{{ $doctorsUrl }}"
               class="block hover:opacity-80 transition">

                @if($sign == 'ar')
                    الكاتب: أ.د. محمد عاطف
                @else
                    Author: Dr. Mohamed Atef
                @endif

            </a>

        </span>

        <span class="text-sm md:text-base font-semibold text-[#0f2c4a] mt-1">
            @if($sign == 'ar')
                استشاري طب وجراحة الفم والأسنان
            @else
                Consultant of Oral and Dental Surgery
            @endif
        </span>

    </div>

</div>
        </div>
    </div>

    <div class="flex flex-wrap my-10">
        <div class="w-full lg:w-2/3 my-10 md:w-1/2 p-4">

            <img class="rounded"
                 src="{{ $blog->photo }}"
                 srcset="{{ $blog->photo }} 1x, {{ $blog->photo }} 2x"
                 alt="{{ $blog->{'title_' . $sign} }}"
                 title="{{ $blog->{'title_' . $sign} }}">

            <div>
                <h1 class="text-3xl font-bold my-4">
                    {{ $blog->{'title_' . $sign} }}
                </h1>

                <p class="text-gray-600 flex items-center gap-2">
                    <i class="fa-regular fa-calendar-days text-gray-400"></i>
                    {{ \Carbon\Carbon::parse($blog->blog_date)->format('d M, Y') }}
                </p>

                <div class="article-content my-8">
                    {!! $content !!}
                </div>
                {{-- Blog FAQs: hidden until backend provides $faqs --}}
                @if(isset($faqs) && $faqs->count() > 0)
                    <div class="blog-faqs">
                        <h2 class="blog-faqs-title">
                            {{ $sign == 'ar' ? 'الأسئلة الشائعة' : 'Frequently Asked Questions' }}
                        </h2>

                        <div class="blog-faq-accordion" id="blogFaqAccordion">
                            @foreach($faqs as $k => $faq)
                                <div class="blog-faq-item">
                                    <h3 class="m-0">
                                        <button
                                            class="blog-faq-button {{ $k == 0 ? '' : 'collapsed' }}"
                                            type="button"
                                            data-faq-target="blogFaq{{ $faq->id }}"
                                            aria-expanded="{{ $k == 0 ? 'true' : 'false' }}"
                                            aria-controls="blogFaq{{ $faq->id }}"
                                        >
                                            <span>{!! $faq->{'title_' . $sign} !!}</span>
                                            <span class="blog-faq-icon" aria-hidden="true"></span>
                                        </button>
                                    </h3>

                                    <div
                                        id="blogFaq{{ $faq->id }}"
                                        class="blog-faq-panel {{ $k == 0 ? 'show' : '' }}"
                                    >
                                        <div class="blog-faq-answer">
                                            {!! $faq->{'details_' . $sign} !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Fixed contact buttons at the end of every article --}}
                {!! $contactButtons !!}
            </div>
        </div>

        <div class="w-full flex flex-col gap-4 lg:w-1/3 md:w-1/2 p-4">
            @foreach (App\Models\Blog::orderBy('blog_date', 'desc')->where('id', '!=', $blog->id)->limit(4)->get() as $k => $blogg)
                <div class="rounded shadow hover:shadow-lg p-4 transition-all duration-500">
                    <a href="{{ route('single-blog.index', ['lang' => $sign , 'blog' => $blogg->{'slug_' . $sign} ]) }}">
                        <img class="rounded"
                             src="{{ $blogg->photo }}"
                             srcset="{{ $blogg->photo }} 1x, {{ $blogg->photo }} 2x"
                             alt="{{ $blogg->{'title_' . $sign} }}"
                             title="{{ $blogg->{'title_' . $sign} }}">

                        <span class="text-xl mt-4 font-bold text-gray-800 mb-2 line-clamp-2">
                            {{ $blogg->{'title_' . $sign} }}
                        </span>

                        <p class="text-gray-600 text-ellipsis overflow-hidden whitespace-nowrap max-w-full">
                            {{ $blogg->{'short_details_' . $sign} }}
                        </p>

                        <span class="text-gray-600 text-sm">{{ $blogg->blog_date }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const faqRoot = document.getElementById('blogFaqAccordion');

    if (!faqRoot) {
        return;
    }

    const faqButtons = faqRoot.querySelectorAll('.blog-faq-button');
    const faqPanels = faqRoot.querySelectorAll('.blog-faq-panel');

    faqButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const targetId = button.getAttribute('data-faq-target');
            const target = document.getElementById(targetId);

            if (!target) {
                return;
            }

            const isOpen = target.classList.contains('show');

            faqPanels.forEach(function (panel) {
                panel.classList.remove('show');
            });

            faqButtons.forEach(function (btn) {
                btn.classList.add('collapsed');
                btn.setAttribute('aria-expanded', 'false');
            });

            if (!isOpen) {
                target.classList.add('show');
                button.classList.remove('collapsed');
                button.setAttribute('aria-expanded', 'true');
            }
        });
    });
});
</script>

@stop