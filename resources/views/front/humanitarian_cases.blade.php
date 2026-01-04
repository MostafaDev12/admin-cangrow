 
  @extends('layouts.front')

  @section('title')

      {{ __('حالات انسانية') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop

  @section('css')
      <link rel="stylesheet" href="{{ asset('front/highline/') }}/css/articles.css">
  @stop
  @section('content')

    <main> 
        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-slate-800 mb-4 relative inline-block">
                            {{ __('الحالات الإنسانية') }}
                        <span class="absolute bottom-0 left-0 w-1/2 h-2 bg-primary rounded-full -mb-2"></span>
                    </h2>
                    <p class="text-gray-600 text-lg mt-6 max-w-2xl mx-auto">
         
                    {{ __('اختر الحملة التي تود المساهمة فيها وكن سبباً في تغيير حياة الكثيرين للأفضل. حالات انسانية') }} 
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

 @foreach ($servicess as $service)
                     
                    <!-- 6 -->
                    <article
                        class="bg-white rounded-lg shadow-lg overflow-hidden group transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                        <div class="relative">
                            <img src="{!! $service->photo !!}" alt="{!! $service->{'title_' . $sign} ?? '' !!}"
                                class="w-full h-56 object-cover">

                        </div>
                        <div class="p-6">

                            <div class="flex justify-end gap-3 mb-2 text-sm font-semibold">
                                {{-- <span class="text-gray-500">#صحة</span> --}}
                                <span class="text-accent">{!! optional($service->category)->{'title_' . $sign} ?? '' !!}   </span>
                            </div>

                            <h2 class="text-3xl font-extrabold text-slate-800 mb-3">
                                   {!! $service->{'title_' . $sign} ?? '' !!}
                            </h2>

                            <p class="text-gray-600 text-base leading-relaxed mb-4">
                               {!! $service->{'short_details_' . $sign} ?? '' !!}
                            </p>

                            {{-- <div class="mb-5">
                                <img src="https://via.nplaceholder.com/400x300?text=Campaign+Graphic"
                                    alt="الحالات الطارئة" class="w-full h-auto rounded-lg">
                            </div> --}}

                            <div class="mb-4">
                                <div class="flex justify-end mb-1">
                                    <span class="text-sm font-bold text-accent">  {!! $service->percent ?? 0 !!}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-accent h-2.5 rounded-full" style="width:  {!! $service->percent ?? 0 !!}%"></div>
                                </div>
                            </div>

                            <div class="flex justify-between items-center text-sm mb-4">
                                <div class="text-right">
                                    <span class="block text-gray-500">{{ __('المجموع') }}</span>
                                    <span class="font-bold text-slate-800" dir="ltr">ج  {!! $service->total ?? 0 !!}</span>
                                </div>
                                <div class="text-left">
                                    <span class="block text-gray-500">{{ __('الهدف') }}</span>
                                    <span class="font-bold text-slate-800" dir="ltr">ج  {!! $service->target ?? 0 !!}</span>
                                </div>
                            </div>
{{-- 
                            <div class="text-center">
                                <span class="font-bold text-accent text-lg">5756</span>
                                <span class="text-gray-600 font-semibold">متبرعين</span>
                            </div> --}}

                        </div>
                    </article>
                
                    @endforeach  

                </div>
                 <div class="text-center mt-12">
                   {{-- <nav aria-label="Pagination" class="flex items-center my-10 justify-between">
                    <!-- Previous -->
                    <a href="/page/2"
                        class="relative inline-flex items-center px-4 py-2 rounded-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Previous
                    </a>

                    <!-- Page Numbers -->
                    <div class="flex space-x-1">
                        <a href="/page/1"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            1
                        </a>
                        <a href="/page/2"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            2
                        </a>
                        <span
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium bg-custom-orange text-white border border-blue-600 rounded-md z-10">
                            3
                        </span>
                        <a href="/page/4"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            4
                        </a>
                        <a href="/page/5"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            5
                        </a>
                        <span
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700">...</span>
                        <a href="/page/10"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            10
                        </a>
                    </div>

                    <!-- Next -->
                    <a href="/page/4"
                        class="relative inline-flex items-center px-4 py-2 rounded-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Next
                    </a>
                </nav> --}}
                {{ $servicess->links() }}
                </div> 
            </div>
        </section>


          @include('includes.share')



    </main>

 @stop