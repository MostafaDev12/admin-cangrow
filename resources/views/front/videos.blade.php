  
@extends('layouts.front')

@section('title')
   
{{ __('فيديوهات عن الدكتور') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

    <!-- Hero Banner -->
    <section class="bg-gray-100">
        <!-- Header -->
        <div
            class="bg-gradient-to-r from-blue-500 to-green-400 text-white h-[150px] flex flex-col items-center justify-center">
            <h2 class="text-xl sm:text-4xl font-bold">  {{ __('فيديوهات عن الدكتور') }}</h2>
        </div>

        <!-- Video Grid -->
        <div class="sm:px-16 px-4 py-10 mx-auto text-center">
            <p class="text-gray-500 text-sm sm:text-base max-w-3xl mx-auto mb-8">
               
{{ __('شاهد فيديوهاتنا التي تعرض خبرات الدكتور في مجال طب الأسنان، وتعرف على أحدث التقنيات والنصائح للعناية بصحة فمك.') }}

            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
               @foreach($videos as $video)
                <!-- Video 1 -->
                <div class="flex justify-center">
                    <div
                        class="bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                        <iframe width="100%" height="200"
                            src="{{$video->youtube_url}}"
                            title="زراعة الأسنان: تقنيات حديثة"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen class="w-full"></iframe>
                        <div class="p-4">
                            {{-- <h3 class="text-base font-semibold text-blue-800 mb-2">زراعة الأسنان: تقنيات حديثة</h3>
                            <p class="text-gray-600 text-sm">تعرف على أحدث تقنيات زراعة الأسنان وكيفية تحسين ابتسامتك.
                            </p> --}}
                        </div>
                    </div>
                </div>
 @endforeach

                
               
            </div>
        </div>
    </section>

   @include('includes.book')


     

@stop
