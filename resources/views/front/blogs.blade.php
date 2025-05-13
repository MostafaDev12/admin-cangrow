   
@extends('layouts.front')

@section('title')
   
{{ __('المقالات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
    <!-- blogs -->
    <div class="container my-10 mx-auto">
        <div class="text-center my-10">
            <div style="opacity: 1; transform: none;"><span
                    class="uppercase text-accent font-semibold leading-4"></span>
                <h2 class="text-primary font-bold text-4xl italic">{{ __('المقالات') }} </h2>
            </div>
        </div>
        <div class="grid gap-1 md:gap-2 lg:gap-3 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
             @foreach($blogs as $blog)
            <div class="rounded shadow hover:shadow-lg p-4 transition-all duration-500"
              >
                <a class="flex flex-col justify-center items-center" href="{{ route('single-blog.index',$blog->{'slug_' . $sign}) }}">
                    <img class="rounded h-64 object-cover w-full"
                        src="{{ $blog->photo }}"
                        srcset="{{ $blog->photo }} 1x, {{ $blog->photo }} 2x"
                        alt="{{ $blog->{'title_' . $sign} }}"
                        title="{{ $blog->{'title_' . $sign} }}">
                    <h2 class="text-xl font-bold my-4 text-gray-800 ">{{ $blog->{'title_' . $sign} }}

                    </h2>
                    <p class="text-gray-600 text-ellipsis overflow-hidden whitespace-nowrap max-w-full ">
                      {{ $blog->{'short_details_' . $sign} }}
                    </p>
                </a>
            </div>
              @endforeach
        </div>
          {{ $blogs->links('includes.pagination.custom') }}
        {{-- <div id="pagination" class="flex my-10 justify-center space-x-2">
            <button class="px-4 py-2 bg-primary mx-4 text-white rounded hover:bg-primary disabled:bg-gray-400"
                disabled="">التالى</button>
            <button class="px-4 py-2 rounded bg-primary text-white hover:bg-primary">1</button>
            <button class="px-4 py-2 rounded bg-primary text-white hover:bg-primary">2</button>
            <button class="px-4 py-2 rounded bg-primary text-white hover:bg-primary">...</button>
            <button class="px-4 py-2 rounded bg-primary text-white hover:bg-primary">6</button>
            <button
                class="px-4 py-2 bg-primary text-white rounded hover:bg-primary disabled:bg-gray-400">السابق</button>
        </div> --}}
    </div>
    <!-- blogs -->
    <!-- footer -->
  @stop