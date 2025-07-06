  @extends('layouts.front')

  @section('title')
      {{ $blog->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}
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
      <!-- blogs -->
      <section class="container mx-auto px-4 md:px-8 lg:px-16 xl:px-32 min-h-screen my-10">
          <div><span class="uppercase text-accent font-semibold leading-4">{{ __('blogs') }}</span>
              <h2 class="text-primary font-bold text-4xl italic">{{ __('blogs') }}</h2>
          </div>
          <div class="flex flex-wrap my-10">
              <div class="w-full lg:w-2/3 my-10 md:w-1/2 p-4">
                  <img class="rounded" src="{{ $blog->photo }}" srcset="{{ $blog->photo }} 1x, {{ $blog->photo }} 2x"
                      alt="{{ $blog->{'title_' . $sign} }}" title="{{ $blog->{'title_' . $sign} }}">
                  <div class="">
                      <h1 class="text-3xl font-bold my-4">{{ $blog->{'title_' . $sign} }}</h1>
                      <p class="text-gray-600">{{ \Carbon\Carbon::parse($blog->blog_date)->format('d M, Y') }}</p>
                      <p class="text-gray my-4">
                          {!! $blog->{'details_' . $sign} !!}
                      </p>

                  </div>


              </div>
              <div class="w-full flex flex-col gap-4 lg:w-1/3 md:w-1/2 p-4">
                  @foreach (App\Models\Blog::orderBy('blog_date', 'desc')->where('id', '!=', $blog->id)->limit(4)->get() as $k => $blogg)
                      @php
                          $k++;
                      @endphp
                      <div class="rounded shadow hover:shadow-lg p-4 transition-all duration-500">
                          <a class="" href="/blog.deatils.html">
                              <img class="rounded" src="{{ $blogg->photo }}"
                                  srcset="{{ $blogg->photo }} 1x, {{ $blogg->photo }} 2x"
                                  alt="{{ $blogg->{'title_' . $sign} }}" title="{{ $blogg->{'title_' . $sign} }}">
                              <h2 class="text-xl mt-4 font-bold text-gray-800 mb-2 line-clamp-2">
                                  {{ $blogg->{'title_' . $sign} }}

                              </h2>

                              <p class="text-gray-600 text-ellipsis overflow-hidden whitespace-nowrap max-w-full ">
                                  {{ $blogg->{'short_details_' . $sign} }}
                              </p>
                              <span class="text-gray-600 text-sm">{{ $blogg->blog_date }}</span>

                          </a>
                      </div>
                  @endforeach

              </div>
          </div>
      </section>
      <!-- blogs -->

  @stop
