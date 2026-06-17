  
@extends('layouts.front')

@section('title')
   
{{ __('فيديوهات عن الدكتور') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
<!-- Videos Hero Banner -->
<section class="relative w-full overflow-hidden text-white
                aspect-[750/500] md:aspect-auto md:h-[550px]">

    <!-- Mobile Background -->
    <img
        src="{{ asset('assets/images/about/about-slider-mobile.webp') }}"
        alt="{{ __('فيديوهات عن الدكتور') }}"
        class="absolute inset-0 block md:hidden
               h-full w-full object-cover object-center"
        fetchpriority="high"
        decoding="async">

    <!-- Desktop Background -->
    <img
        src="{{ asset('assets/images/about/about-slider.webp') }}"
        alt="{{ __('فيديوهات عن الدكتور') }}"
        class="absolute inset-0 hidden md:block
               h-full w-full object-cover object-center"
        fetchpriority="high"
        decoding="async">

    <!-- Unified Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r
                from-[#1558e8]/70
                via-[#168db5]/60
                to-[#0ca85f]/70">
    </div>

    <!-- Content -->
    <div class="relative z-10 flex h-full items-center justify-center px-4 md:px-16">
        <div class="max-w-3xl text-center">

            <h1 class="text-2xl sm:text-4xl lg:text-5xl
                       font-bold leading-tight drop-shadow-lg">
                {{ __('فيديوهات عن الدكتور') }}
            </h1>

        </div>
    </div>

</section>

    <!-- Hero Banner -->
    <!--<section class="bg-gray-100">-->
        <!-- Header -->
    <!--    <div-->
    <!--        class="bg-gradient-to-r from-blue-500 to-green-400 text-white h-[150px] flex flex-col items-center justify-center">-->
    <!--        <h2 class="text-xl sm:text-4xl font-bold">  {{ __('فيديوهات عن الدكتور') }}</h2>-->
    <!--    </div>-->

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
