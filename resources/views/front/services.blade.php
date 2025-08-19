  @extends('layouts.front')

@section('title')
   
{{ __('الخدمات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
    <!-- Hero Banner -->
    <section class="">
        <div class="bg-gradient-to-r from-blue-500 to-green-600 text-white py-16 px-4 md:px-16">
            <div class="text-center px-4">
                <h1 class="text-xl sm:text-4xl font-bold mb-4">{{ __('الخدمات') }}</h1>
                <p class="text-sm sm:text-lg mb-8 max-w-2xl mx-auto">
                  
                    {{ __('اكتشف مجموعتنا الواسعة من خدمات طب الأسنان للحصول على ابتسامة صحية وجميلة') }}
                </p>
            </div>
        </div>

        <div class="sm:px-16 px-4 py-10 sm:py-16 mx-auto text-center bg-gray-100">
            <h2 class="text-lg sm:text-4xl font-bold text-blue-800 mb-6">
                
                {{ __('تعرف على خدماتنا المتكاملة لطب الأسنان') }}
            </h2>
            <p class="text-gray-500 text-sm sm:text-base max-w-3xl mx-auto">
            
                {{ __('في عيادات Tooth Guard، نقدم مجموعة شاملة من خدمات طب الأسنان لتلبية جميع احتياجاتك. سواء كنت بحاجة إلى رعاية وقائية أو علاج تجميلي أو حلول متقدمة للأسنان، فإن فريقنا المتخصص موجود لمساعدتك في تحقيق ابتسامة صحية ومشرقة.') }}
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10 max-w-6xl mx-auto">
              
              @foreach ($servicess as $service)
                <div
                    class="bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img src="{{ $service->photo }}"
                        alt="{{ $service->{'title_' . $sign} }}" class="w-full h-60 object-cover" />
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-blue-800 mb-2">
                           {{ $service->{'title_' . $sign} }} 
                        </h3>
                        <p class="text-gray-600 text-sm">
                          {{ $service->{'short_details_' . $sign} }}
                        </p>
                        <div class="mt-7 mb-4">
                            <a class="text-sm border border-blue-800 text-blue-800 px-4 py-2 rounded-md shadow-md hover:bg-blue-800 hover:text-white transition duration-300"
                                href="{{ route('single-service.index'.$lang,['slug' => $service->{'slug_' . $sign} ,$lang]) }}"> {{ __('اعرف المزيد') }}</a>
                        </div>
                    </div>
                </div>
                 @endforeach
            </div>

            <!-- Pagination -->

 
           {{ $servicess->links('includes.paginations') }}


        </div>

     

    </section>
  @include('includes.book')
@stop