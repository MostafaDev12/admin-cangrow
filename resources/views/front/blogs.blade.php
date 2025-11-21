       @extends('layouts.front')

  @section('title')

      {{ __('مقالات') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop

  @section('css')
     <link rel="stylesheet" href="{{ asset('front/highline/') }}/css/articles.css">
  @stop
  @section('content')

    <section class="container mx-auto px-4 py-12 my-20">

        <!-- Header -->
        <header class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800">     {{ __('أحدث مقالاتنا') }}</h1>
            <p class="text-gray-600 mt-3 text-lg">    {{ __('رؤى وقصص وأخبار من فريقنا حول حلول المياه.') }}</p>
        </header>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
  @foreach($blogs as $blog)
            <!-- Article Card 1 -->
            <div
                class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                <a href="{{ route('single-blog.index',['lang'=> $sign , 'blog' =>$blog->{'slug_' . $sign} ]) }}">
                    <img src="{{ $blog->photo }}" alt="     {{ $blog->{'title_' . $sign} }}"
                        class="w-full h-56 object-cover">
                </a>
                <div class="p-6">
                    <p class="text-sm text-gray-500 mb-2">  {{ \Carbon\Carbon::parse($blog->blog_date)->format('d, M Y') }}</p>
                    <h2 class="text-2xl font-bold text-gray-800 mb-3"> {{ $blog->{'title_' . $sign} }}  </h2>
                    <p class="text-gray-700 mb-4 leading-relaxed">
                      {{ $blog->{'short_details_' . $sign} }}
                    </p>
                    <a href="{{ route('single-blog.index',['lang'=> $sign , 'blog' =>$blog->{'slug_' . $sign} ]) }}"
                        class="font-semibold text-indigo-600 hover:text-indigo-800 transition-colors">     {{ __('اقرأ المزيد') }}
                        &larr;</a>
                </div>
            </div>
  @endforeach


        </div>

         <div id="pagination" class="flex my-10 justify-center space-x-2">
             {{ $blogs->links('includes.pagination.custom') }}
        </div>
    </section>
  @stop