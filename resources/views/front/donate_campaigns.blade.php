




      @extends('layouts.front')

  @section('title')

     {{ __('حملات التبرع') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop

  @section('css')
     <link rel="stylesheet" href="{{ asset('front/highline/') }}/css/articles.css">
  @stop
  @section('content')

    <main>
        <section class="py-16 md:py-24 bg-gray-50" dir="rtl">
            <div class="container mx-auto px-4 max-w-7xl">

                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-slate-800 mb-4 relative inline-block">
                           {{ __('حملات التبرع') }} 
                        <span class="absolute bottom-0 left-0 w-1/2 h-2 bg-primary rounded-full -mb-2"></span>
                    </h2>
                    <p class="text-gray-600 text-lg mt-6 max-w-2xl mx-auto">
                                 {{ __('اختر الحملة التي تود المساهمة فيها وكن سبباً في تغيير حياة الكثيرين للأفضل.') }} 
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($servicess as $service)
                        
                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group border border-gray-100 flex flex-col">
                        <div class="relative h-56 overflow-hidden">
                            <img src="{!! $service->photo !!}" alt="{!! $service->{'title_' . $sign} ?? '' !!}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            <div
                                class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-primary font-bold px-3 py-1 rounded-full text-sm shadow-sm">
                                <i class="fa-solid fa-house-chimney ml-1"></i>  {!! optional($service->category)->{'title_' . $sign} ?? '' !!}  
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <h3
                                class="text-2xl font-bold text-slate-800 mb-3 group-hover:text-primary transition-colors">
                                    {!! $service->{'title_' . $sign} ?? '' !!}</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed flex-1">
                              {!! $service->{'short_details_' . $sign} ?? '' !!}
                            </p>
                            <a href="{{ route('single-donate_campaigns.index', ['lang' => $sign, 'slug' => $service->{'slug_' . $sign}]) }}"
                                class="w-full block text-center bg-primary text-white font-bold py-3 rounded-xl hover:bg-accent transition-colors duration-300 shadow-md hover:shadow-lg">
                                تبرع الآن <i class="fa-solid fa-heart mr-2"></i>
                            </a>
                        </div>
                    </div>

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