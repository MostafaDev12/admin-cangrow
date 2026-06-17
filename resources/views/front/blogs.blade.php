 
         @extends('layouts.front')

      @section('title')

          {{ __('مدونة أوبر درايفر') }} - {{ $gs->{'title_' . $sign} }}

      @stop

      @section('gsearch')
          <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
      @stop

      @section('css')

      @stop
      @section('content')

 <section class="pt-32 pb-20 bg-gradient-to-r from-[#040720] to-blue-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">     
{{ __('مدونة أوبر درايفر') }} </h1>
            <p class="text-xl max-w-3xl mx-auto">    
{{ __('آخر الأخبار والنصائح للسائقين في مصر') }} </p>
        </div>
    </section>

    <!-- محتوى صفحة المدونة -->
    <section class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $classes = [ 'from-blue-500 to-blue-700', 
                                'from-green-500 to-green-700', 
                                'from-purple-500 to-purple-700' ];


                @endphp
                @foreach ($blogs as $index => $blog)
                    @php
                        $gradientClass = $classes[$index % count($classes)];
                    @endphp
                   
                <!-- مقال 1 -->
                <article
                    class="bg-white rounded-xl overflow-hidden shadow-custom transition-all duration-300 hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-r {{ $gradientClass }} flex items-center justify-center">
                       <!-- <i class="fas fa-car text-5xl text-white"></i>-->
                       <img alt="رؤيتنا وأهدافنا" loading="lazy" width="400" height="200"
                                  class="w-full h-full object-cover transition-transform hover:scale-105 duration-500"
                                  style="color:transparent" sizes="(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 33vw"
                                  src="{{ $blog->photo }}"
                                  onerror="this.onerror=null;this.src='{{ $blog->photo }}';" />
                    </div>
                    <div class="p-6">
                        <span class="text-sm text-blue-600 font-semibold">   {{ optional($blog->category)->{'title_' . $sign} }}</span>
                        <h3 class="text-xl font-semibold my-3">     {{ optional($blog)->{'title_' . $sign} }}     </h3>
                        <p class="text-gray-600">  {{ optional($blog)->{'short_details_' . $sign} }}</p>
                        <a href="{{ route('single-blog.index',['lang'=> $sign , 'blog' =>$blog->{'slug_' . $sign} ]) }}"
                            class="block mt-4 text-blue-600 font-semibold hover:text-blue-800"> {{ __('اقرأ المزيد') }}  </a>
                    </div>
                </article>
                @endforeach
               
            </div>
            
         <div id="pagination" class="flex my-10 justify-center space-x-2">
             {{ $blogs->links('includes.pagination.custom') }}
        </div>
        </div>
    </section>
  @stop
     