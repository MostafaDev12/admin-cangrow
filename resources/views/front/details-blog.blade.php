 @extends('layouts.front')

@section('title')
   
{{ $blog->{'title_' . $sign} }}   -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

    <style>
          h1,a{
            color: #ae9461 !important;
        }
        img{
            width: 100% !important;
        }
    </style>
@section('content')
@php
$phones =  explode(',', $gs->phones);
 
$randomPhone = Arr::random($phones);
@endphp
    <!-- blogs -->
    <div class="container mx-auto px-4 md:px-8 lg:px-16 xl:px-32 min-h-screen my-10">
        <div style="opacity: 1; transform: none;"><span
                class="uppercase text-accent font-semibold leading-4">{{ __('المقالات') }}</span>
            <h2 class="text-primary font-bold text-4xl italic">{{ __('المقالات') }}</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2">
            <div class="container mx-auto p-4" style="opacity: 1;">
                <h1 class="text-3xl font-bold mb-4" style="opacity: 1; transform: none;"> {{ $blog->{'title_' . $sign} }} </h1>
                <p class="text-gray-600 mb-4" style="opacity: 1; transform: none;">4/9/2025, 7:55:18 PM</p>
                <div class="text-accent max-w-xl mx-auto">
                    <p id="text" class="overflow-hidden line-clamp-3 hover:line-clamp-none transition-all duration-300">
                        {!! $blog->{'details_' . $sign} !!}  
                    
                    </p>
                    <button id="toggleBtn" class="mt-2 text-primary hover:text-blue-800 text-sm font-medium">
                        إقرأ المزيد
                    </button>
                </div>
            </div>
            <div class="rounded relative min-h-56 w-full max-h-96 sm:max-h-96 sm:min-h-96">
                <img class="rounded" src="{{ $blog->photo }}"
                    srcset="{{ $blog->photo }} 1x, {{ $blog->photo }} 2x"
                    alt="Free Ai Generated Employee illustration and picture"
                    title="{{ $blog->{'title_' . $sign} }}">
            </div>
        </div>
    </div>
    <!-- blogs -->
    <!-- footer -->
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