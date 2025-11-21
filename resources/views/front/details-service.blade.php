    @extends('layouts.front')

  @section('title')
      {{ $service->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}
  @stop

  @section('gsearch')
      <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}" />
  @stop
  @section('css')


  @stop



  @section('content')
      @php
          $phones = explode(',', $gs->phones);
          $randomPhone = Arr::random($phones);
      @endphp
    <section class="px-4 py-12 my-20">
        <div class="max-w-4xl mx-auto p-6 md:p-12">

            <!-- Back Link -->
            {{-- <div class="mb-8">
                <a href="articles.html"
                    class="text-indigo-600 hover:text-indigo-800 font-semibold flex items-center w-fit">
                    <span class="ml-2">&rarr;</span>
                    العودة إلى المقالات
                </a>
            </div> --}}

            <!-- Article Header -->
            <header class="mb-6 border-b pb-6">
                <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">  {{ $service->{'title_' . $sign} }}     </h1>
                
            </header>

            <!-- Feature Image -->
            <img src="{{ $service->photo }}" alt=" {{ $service->{'title_' . $sign} }} "
                class="w-full h-auto rounded-lg mb-8 shadow-md">

            <!-- Article Content -->
            <article class="article-content text-gray-800">
               {!! $service->{'details_' . $sign} !!}
            </article>

            
        </div>
    </section>

@stop