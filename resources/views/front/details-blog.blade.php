@extends('layouts.front')

@php
    // SEO title: prefer the article's meta/SEO title; fall back to the article (H1) title.
    $seoMetaTitle = trim((string) ($blog->{'meta_title_' . $sign} ?? ''));
    $seoTitle     = $seoMetaTitle !== '' ? $seoMetaTitle : $blog->{'title_' . $sign};
@endphp

@section('title'){{ $seoTitle }} - {{ $gs->{'title_' . $sign} }}@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

   
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
    </style>
@section('content')
@php
$phones =  explode(',', $gs->phones);
 
$randomPhone = Arr::random($phones);
@endphp
 
    <div class="gradient-bg text-white py-28 px-4">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4"> {{ $blog->{'title_' . $sign} }}  </h1>
            {{-- <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">استكشف   واسعة من المق ت</p> --}}
            <div class="flex justify-center space-x-4 space-x-reverse">
                {{-- <button
                    class="bg-white text-purple-700 hover:bg-gray-100 font-semibold py-2 px-6 rounded-lg transition duration-300">
                    ابدأ القراءة
                </button>
                <button
                    class="bg-transparent border-2 border-white hover:bg-white hover:bg-opacity-10 font-semibold py-2 px-6 rounded-lg transition duration-300">
                    تصفح المزيد
                </button> --}}
            </div>
        </div>
    </div>
    <!-- blogs -->
    <div class="container mx-auto px-4 md:px-8 lg:px-16 xl:px-32 min-h-screen my-10">
        <div><span class="uppercase text-accent font-semibold leading-4">{{ __('المقالات') }} </span>
            <h2 class="text-primary font-bold text-4xl italic">{{ __('المقالات') }} </h2>
        </div>
        <div class="flex flex-wrap my-10">
            <div class="w-full lg:w-2/3 my-10 md:w-1/2 p-4">
                <img class="rounded" src="{{ $blog->photo }}"
                    srcset="{{ $blog->photo }} 1x, {{ $blog->photo }} 2x"
                    alt="Free Ai Generated Employee illustration and picture"
                    title="Download free HD stock image of Ai Generated Employee">
                <div class="">
                    <h2 class="text-3xl font-bold my-4">{{ $blog->{'title_' . $sign} }} </h2>
                    <p class="text-gray-600">{{ $blog->blog_date }}</p>
                    <p class="text-gray my-4">

                          {!! $blog->{'details_' . $sign} !!}  
                       </p>
                    <!-- <button id="toggleBtn" class="mt-2 text-primary hover:text-blue-800 text-sm font-medium">
                            إقرأ المزيد
                        </button> -->
                </div>
             

            </div>
            <div class="w-full flex flex-col gap-4 lg:w-1/3 md:w-1/2 p-4">
               
                            @foreach (App\Models\Blog::orderBy('blog_date', 'desc')->where('id','!=',$blog->id)->limit(2)->get() as $k=> $blogg)
                            @php
                            $k++
                            @endphp
                <div class="rounded shadow hover:shadow-lg p-4 transition-all duration-500">
                    <a class="" href="{{ route('single-blog.index',['lang'=> $sign , 'blog' =>$blogg->{'slug_' . $sign} ]) }}">
                        <img class="rounded"
                            src="{{ $blogg->photo }}"
                            srcset="{{ $blogg->photo }} 1x, {{ $blogg->photo }} 2x"
                            alt="Free Ai Generated Employee illustration and picture"
                            title="Download free HD stock image of Ai Generated Employee">
                        <h2 class="text-xl mt-4 font-bold text-gray-800 mb-2 line-clamp-2">{{ $blogg->{'title_' . $sign} }}

                        </h2>

                        <p class="text-gray-600 text-ellipsis overflow-hidden whitespace-nowrap max-w-full ">
                             {{ $blogg->{'short_details_' . $sign} }}
                        </p>
                        <span class="text-gray-600 text-sm">{{ $blogg->blog_date }}</span>

                    </a>
                </div>
                 @endforeach 
               
            </div>
        </div>
    </div>
    <!-- blogs -->
     @stop