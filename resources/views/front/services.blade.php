  @extends('layouts.front')

@section('title')
   
{{ __('الخدمات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
<!-- Services Hero Banner -->
<section class="relative w-full overflow-hidden text-white
                aspect-[750/500] md:aspect-auto md:h-[550px]">

    <!-- Mobile Background -->
    <img
        src="{{ asset('assets/images/about/about-slider-mobile.webp') }}"
        alt="{{ __('الخدمات') }}"
        class="absolute inset-0 block md:hidden
               h-full w-full object-cover object-center"
        fetchpriority="high"
        decoding="async">

    <!-- Desktop Background -->
    <img
        src="{{ asset('assets/images/about/about-slider.webp') }}"
        alt="{{ __('الخدمات') }}"
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
                {{ __('الخدمات') }}
            </h1>

            <p class="mx-auto mt-5 max-w-2xl
                      text-sm sm:text-lg
                      leading-7 sm:leading-8
                      text-white/95 drop-shadow-md">
                {{ __('اكتشف مجموعتنا الواسعة من خدمات طب الأسنان للحصول على ابتسامة صحية وجميلة') }}
            </p>

        </div>
    </div>

</section>
    <!-- Hero Banner -->
    <!--<section class="">-->
    <!--    <div class="bg-gradient-to-r from-blue-500 to-green-600 text-white py-16 px-4 md:px-16">-->
    <!--        <div class="text-center px-4">-->
    <!--            <h1 class="text-xl sm:text-4xl font-bold mb-4">{{ __('الخدمات') }}</h1>-->
    <!--            <p class="text-sm sm:text-lg mb-8 max-w-2xl mx-auto">-->
                  
    <!--                {{ __('اكتشف مجموعتنا الواسعة من خدمات طب الأسنان للحصول على ابتسامة صحية وجميلة') }}-->
    <!--            </p>-->
    <!--        </div>-->
    <!--    </div>-->

        <div class="sm:px-16 px-4 py-10 sm:py-16 mx-auto text-center bg-gray-100">
            <h2 class="text-lg sm:text-4xl font-bold text-blue-800 mb-6">
                
                {{ __('تعرف على خدماتنا المتكاملة لطب الأسنان') }}
            </h2>
            <p class="text-gray-500 text-sm sm:text-base max-w-3xl mx-auto">
            
                {{ __('في عيادات Tooth Guard، نقدم مجموعة شاملة من خدمات طب الأسنان لتلبية جميع احتياجاتك. سواء كنت بحاجة إلى رعاية وقائية أو علاج تجميلي أو حلول متقدمة للأسنان، فإن فريقنا المتخصص موجود لمساعدتك في تحقيق ابتسامة صحية ومشرقة.') }}
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10 max-w-6xl mx-auto">
              
        @foreach ($servicess as $service)
    <a
        href="{{ route('single-service.index'.$lang, ['slug' => $service->{'slug_' . $sign}, 'lang' => $lang]) }}"
        class="group block bg-white shadow-md rounded-lg overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-xl"
    >
        <img
            src="{{ $service->photo }}"
            alt="{{ $service->{'title_' . $sign} }}"
            class="w-full h-60 object-cover"
        />

        <div class="p-4">
            <h3 class="text-lg font-bold text-blue-800 mb-2">
                {{ $service->{'title_' . $sign} }}
            </h3>

            <p class="text-gray-600 text-sm leading-7 min-h-[56px]">
                {{ $service->{'short_details_' . $sign} }}
            </p>

            <div class="mt-7 mb-4">
                <span class="inline-block text-sm border border-blue-800 text-blue-800 px-4 py-2 rounded-md shadow-md group-hover:bg-blue-800 group-hover:text-white transition duration-300">
                    {{ __('اعرف المزيد') }}
                </span>
            </div>
        </div>
    </a>
@endforeach
            </div>

            <!-- Pagination -->

 
           {{ $servicess->links('includes.paginations') }}


        </div>

     

    </section>
  @include('includes.book')
@stop