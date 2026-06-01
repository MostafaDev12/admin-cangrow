       @extends('layouts.front')

      @section('title')

          {{ __('الأخبار') }} - {{ $gs->{'title_' . $sign} }}

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

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

                    @foreach ($blogs as $blog)
                         
                    <!-- 1 -->
                    <article
                        class="bg-white rounded-lg shadow-lg overflow-hidden group transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                        <div class="relative">
                            <img src="{{ $blog->photo }}" alt="{{ optional($blog)->{'title_' . $sign} }}"
                                class="w-full h-56 object-cover">
                            <div
                                class="absolute top-4 left-4 bg-primary text-white rounded-md px-3 py-2 text-center leading-none">
                                <span class="font-bold text-xl block"> {{ \Carbon\Carbon::parse($blog->blog_date)->format('d') }}</span>
                                <span class="text-xs uppercase block"> {{ \Carbon\Carbon::parse($blog->blog_date)->format('M') }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            {{-- <div class="text-xs text-gray-500 mb-2">
                                <i class="fa-solid fa-comments ml-1"></i>
                                <span>0 تعليقات</span>
                            </div> --}}
                            <h3 class="text-xl font-bold text-slate-800 mb-3">
                                <a href="{{ route('single-blog.index',['lang'=> $sign , 'blog' =>$blog->{'slug_' . $sign} ]) }}" class="transition-colors hover:text-accent">
                                  {{ optional($blog)->{'title_' . $sign} }}
                                </a>
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ optional($blog)->{'short_details_' . $sign} }}
                            </p>
                        </div>
                    </article>
 @endforeach
                    
                    

                </div>
               <div class="text-center mt-12">
                    {{-- <button
                        class="bg-gray-100 text-gray-700 font-semibold py-2 px-6 rounded-full border border-gray-300 hover:bg-gray-200 transition-colors">
                        عرض المزيد
                    </button> --}}
                     {{ $blogs->links() }}
                </div>
            </div>
        </section>


        
         @include('includes.share')


    </main>

 @stop