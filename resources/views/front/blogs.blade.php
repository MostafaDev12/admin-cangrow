   
@extends('layouts.front')

@section('title')
   
{{ __('المقالات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

    <!-- Hero Banner -->
    <section class="">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500 to-green-600 text-white py-16 px-4 md:px-16">
            <div class="text-center px-4">
                <h1 class="text-xl sm:text-4xl font-bold mb-4">{{ __('المقالات') }}</h1>
                <p class="text-sm sm:text-lg mb-8 max-w-2xl mx-auto">
                   
                    {{ __('اكتشف أحدث النصائح والمعلومات حول صحة الأسنان من خلال مدونتنا') }}
                </p>
            </div>
        </div>

        <!-- Blog Section -->
        <div class="sm:px-16 px-4 py-10 sm:py-16 mx-auto text-center bg-gray-100">
            <h2 class="text-lg sm:text-4xl font-bold text-blue-800 mb-6">
                {{ __('ابق على اطلاع بأفكارنا') }}<br /> {{ __('المتعلقة بطب الأسنان') }}
            </h2>
            <p class="text-gray-500 text-sm sm:text-base max-w-3xl mx-auto">
                
                {{ __('تفضل بزيارة مدونة Tooth Guard Clinics للحصول على أحدث النصائح والاتجاهات والرؤى المتعلقة بصحة الأسنان. تغطي مقالاتنا كل ما تحتاج إلى معرفته للحفاظ على ابتسامة مشرقة وصحية.') }}
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10 max-w-6xl mx-auto">
               @foreach ($blogs as $blog)
                <div
                    class="bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img src="{{ $blog->photo }}"
                        alt="{{ strip_tags($blog->{'title_' . $sign} ) }}" class="w-full h-60 object-cover" />
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-blue-800 mb-2">
                           {{ strip_tags($blog->{'title_' . $sign} ) }} 
                        </h3>
                        <p class="text-gray-600 text-sm">
                          {{ $blog->{'short_details_' . $sign} }}
                        </p>
                        <div class="mt-7 mb-4">
                            <a class="text-sm border border-blue-800 text-blue-800 px-4 py-2 rounded-md shadow-md hover:bg-blue-800 hover:text-white transition duration-300"
                                href="{{ route('single-blog.index'.$lang,['blog' =>$blog->{'slug_' . $sign} ,'lang'=> $lang ]) }}"> {{ __('اعرف المزيد') }}</a>
                        </div>
                    </div>
                </div>
                 @endforeach
            </div>
              {{ $blogs->links('includes.paginations') }}

 
        </div>

      
    </section>
 @include('includes.book')
@stop