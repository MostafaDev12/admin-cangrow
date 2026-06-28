@extends('layouts.front')

@section('title')
    {{ $blog->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}
@stop

@section('gsearch')
    <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')
<style>
    .article-content {
        font-size: 20px;
        color: #111827;
        line-height: 2.2;
        word-break: break-word;
    }

    .article-content p {
        margin: 0 0 34px;
        line-height: 2.2;
    }

    .article-content h2 {
        font-size: 34px;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.5;
        margin: 70px 0 35px;
    }

    .article-content h3 {
        font-size: 28px;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.6;
        margin: 55px 0 30px;
    }

    .article-content h4 {
        font-size: 24px;
        font-weight: 700;
        margin: 45px 0 25px;
    }

    .article-content ul,
    .article-content ol {
        margin: 35px 0 45px;
        padding-right: 35px;
    }

    .article-content li {
        margin-bottom: 22px;
        line-height: 2.2;
    }

    .article-content li:last-child {
        margin-bottom: 0;
    }

    .article-content img {
        display: block;
        max-width: 100%;
        height: auto;
        margin: 35px auto;
        border-radius: 16px;
    }

    .article-content table {
        width: 100%;
        border-collapse: collapse;
        margin: 40px 0;
    }

    .article-content table td,
    .article-content table th {
        padding: 14px;
        border: 1px solid rgba(7,147,176,.25);
        line-height: 1.9;
    }

    .article-content a {
        color: #0793b0;
        font-weight: 600;
    }

    .article-content strong {
        font-weight: 700;
    }

    .article-content blockquote {
        margin: 35px 0;
        padding: 20px 25px;
        border-right: 4px solid #0793b0;
        background: #f7fcfd;
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        .article-content {
            font-size: 18px;
            line-height: 2;
        }

        .article-content h2 {
            font-size: 28px;
            margin: 55px 0 28px;
        }

        .article-content h3 {
            font-size: 24px;
            margin: 45px 0 24px;
        }

        .article-content p {
            margin-bottom: 26px;
        }

        .article-content li {
            margin-bottom: 18px;
        }

        .article-content ul,
        .article-content ol {
            padding-right: 24px;
        }
    }
</style>
@stop

@section('content')
    @php
        $phones = explode(',', $gs->phones);
        $randomPhone = Arr::random($phones);
    @endphp

    <section class="container mx-auto px-4 md:px-8 lg:px-16 xl:px-32 min-h-screen my-10">
        <div>
            <span class="uppercase text-accent font-semibold leading-4">{{ __('blogs') }}</span>
            <h2 class="text-primary font-bold text-4xl italic">{{ __('blogs') }}</h2>
        </div>

        <div class="flex items-center gap-4 mt-4">
            <div class="relative shrink-0">
                <img
                    src="{{ asset('images/dr-mohamed-atef-dental-clinic.jpg') }}"
                    alt=""
                    class="w-20 h-20 rounded-full object-cover border-2 border-gray-100 shadow-sm">
            </div>

            <div class="flex flex-col">
                <h2 class="text-xl md:text-2xl font-bold text-blue-800 leading-tight">
                    <a href="{{ route('contact.index',$sign) }}" class="block px-4 py-2 hover:bg-gray-100">
                        الكاتب: أ.د. محمد عاطف
                    </a>
                </h2>

                <h2 class="text-sm md:text-base font-semibold text-[#0f2c4a] mt-1">
                    استشاري طب وجراحة الفم والأسنان
                </h2>
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
                        {!! $blog->{'details_merged_' . $sign} !!}
                    </div>
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

                            <h2 class="text-xl mt-4 font-bold text-gray-800 mb-2 line-clamp-2">
                                {{ $blogg->{'title_' . $sign} }}
                            </h2>

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
@stop