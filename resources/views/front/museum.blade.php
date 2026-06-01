 
  
   @extends('layouts.front')

@section('title')
   
{{ __('المتحف') }} -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')

 @stop

@section('content')
 
  





    <main>
        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12 max-w-3xl mx-auto">
                    <h2 class="text-6xl md:text-8xl font-extrabold text-gray-100 select-none">
                           {{ __('دار التوفيق') }}     
                    </h2>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 -mt-9 md:-mt-14">
                        {{ __('المتحف') }} 
                    </h1>
                    <p class="text-lg text-gray-600 mt-6 leading-relaxed max-w-2xl mx-auto">
                        {{ __('فعاليات مستمرة تنظمها مؤسسة دار التوفيق لتعزيز روح العطاء والترابط المجتمعي') }}   
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-16 md:mb-24">
                  
                    @foreach ($servicess as $service)
                    
                    <!-- Card 1 -->
                    <a href="#" class="rounded-lg overflow-hidden shadow-lg bg-white group">
                        <img src="{!! $service->photo !!}" alt=" {!! $service->{'title_' . $sign} ?? '' !!}"
                            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-slate-800"> {!! $service->{'title_' . $sign} ?? '' !!}    </h3>
                            <p class="text-gray-600 mt-2 text-sm leading-relaxed">
                                {!! $service->{'short_details_' . $sign} ?? '' !!}
                            </p>
                        </div>
                    </a>
                    @endforeach
                   
                   <!-- Card -->
                    <a href="/1TW.pdf" download class="rounded-lg overflow-hidden shadow-lg bg-white group block text-center">
                        

                        <div class="p-6">
                            
                            <!-- Icon -->
                            <div class="flex justify-center mb-4">
                                <div class="w-16 h-16 flex items-center justify-center rounded-full bg-green-100 text-green-600 text-2xl group-hover:bg-green-600 group-hover:text-white transition duration-300">
                                    <i class="fa-solid fa-book-open"></i>
                                </div>
                            </div>
                    
                            <!-- Title -->
                            <h3 class="text-xl font-bold text-slate-800">
                                كتاب سيرة ومسيرة
                            </h3>
                    
                            <!-- Subtitle -->
                            <p class="text-gray-600 mt-2 text-sm">
                                للدكتور الراحل / أحمد توفيق عويضة
                            </p>
                    
                        </div>
                    </a>
                    
                </div>

                <!--<div class="text-center mt-12">
                    <button
                        class="bg-gray-100 text-gray-700 font-semibold py-2 px-6 rounded-full border border-gray-300 hover:bg-gray-200 transition-colors">
                        عرض المزيد
                    </button>
                </div>-->
                    <div class="text-center mt-12">
               
                 {{ $servicess->links() }}
            </div>
            </div>
        </section>
<!--
        <section class="bg-custom-orange">
            <div class="relative max-w-7xl mx-auto py-10 rounded-2xl overflow-hidden shadow-lg">
                <div class="absolute inset-0 opacity-20" style="
        background-image: url('./assets/imgs/banner/bg-lines-transparent.png');
        background-size: cover;
        background-position: center bottom;
        background-repeat: no-repeat;
      "></div>

                <div
                    class="relative flex flex-col md:flex-row justify-between items-center px-4 sm:px-6 lg:px-8 py-6 md:py-8">
                    <div class="mb-6 md:mb-0">
                        <h2 class="text-2xl md:text-3xl font-bold leading-tight text-white">
                            انضم إلينا في الندواتنا الدائمة<br class="hidden md:block" />
                            وكن جزءًا من أثر الخير المستمر
                        </h2>
                    </div>

                    <a href="#"
                        class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-white hover:text-custom-orange transition-all duration-300 ease-in-out flex items-center space-x-2 space-x-reverse">
                        <span> تعرف على الفعاليات القادمة </span>
                        <i class="fas fa-arrow-left text-sm"></i>
                    </a>
                </div>
            </div>
        </section>-->
    </main>

@stop