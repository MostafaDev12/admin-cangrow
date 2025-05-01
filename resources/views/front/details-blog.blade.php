
@extends('layouts.front')

@section('title')
   
{{ $blog->{'title_' . $sign} }}   -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
@php
$phones =  explode(',', $gs->phones);
 
$randomPhone = Arr::random($phones);
@endphp
   <!-- blogs -->
    <div class="container mx-auto px-4 md:px-8 lg:px-16 xl:px-32 min-h-screen my-10">
        <div><span class="uppercase text-accent font-semibold leading-4">{{ __('المقالات') }} </span>
            <h2 class="text-primary font-bold text-4xl italic">{{ __('المقالات') }} </h2>
        </div>
        <div class="flex flex-wrap my-10">
            <div class="w-full lg:w-2/3 my-10 md:w-1/2 p-4">
                <img class="rounded" src="{{ $blog->photo }}"
                    srcset="{{ $blog->photo }} 1x, {{ $blog->photo }} 2x"
                    alt="{{ $blog->{'title_' . $sign} }}"
                    title="Download free HD stock image of Ai Generated Employee">
                <div class="">
                    <h1 class="text-3xl font-bold my-4"> {{ $blog->{'title_' . $sign} }} </h1>
                    <p class="text-gray-600">{{ \Carbon\Carbon::parse($blog->blog_date)->format('j/n/Y') }}</p>
                    <p class="text-gray my-4">
                        {!! $blog->{'details_' . $sign} !!}
                    </p>
                   
                </div>
               

            </div>
          
        </div>
    </div>
    <!-- blogs -->
    <!-- footer -->
   
    <!-- footer -->
   
@stop
@section('script')

 <script>
        const text = document.getElementById('text');
        const btn = document.getElementById('toggleBtn');

        let expanded = false;

        btn.addEventListener('click', () => {
            expanded = !expanded;
            text.classList.toggle('line-clamp-3', !expanded);
            text.classList.toggle('line-clamp-none', expanded);
            btn.textContent = expanded ? 'إظهار أقل' : 'إقرأ المزيد';
        });
    </script>


@stop