@extends('layouts.front')

@section('title')
{{ $blog->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}
@stop

@section('gsearch')
<meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}" />
@stop

@section('content')
@php
$phones = explode(',', $gs->phones);
$randomPhone = Arr::random($phones);
@endphp

<!-- Main container with flex layout -->
<div class="flex flex-col lg:flex-row min-h-screen">
    <!-- Main content -->
    <div class="container mx-auto px-4 md:px-8 lg:px-16 xl:px-32 flex-grow my-10">
        <div style="opacity: 1; transform: none;">
            <span class="uppercase text-accent font-semibold leading-4">{{ __('المقالات') }}</span>
            <h2 class="text-primary font-bold text-4xl italic">{{ __('المقالات') }}</h2>
        </div>
        
        <div class="flex flex-wrap my-10">
            <div class="w-full lg:w-2/3">
                <h1 class="text-3xl font-bold mb-4">{{ $blog->{'title_' . $sign} }}</h1>
                <p class="text-gray-600 mb-4">4/9/2025, 7:55:18 PM</p>
                <div class="text-accent max-w-xl mx-auto">
                    <div id="">
                        <div id="" class="transition-all duration-300">
                            {!! $blog->{'details_' . $sign} !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sidebar -->
    <aside class="sticky top-10 left-10 h-screen overflow-y-auto w-full flex flex-col gap-4 lg:w-1/3 md:w-1/2">
        <h2 class="text-xl font-bold mb-4">اقراء ايضا</h2>
        <div class="flex flex-col gap-4">
            <div class="rounded shadow hover:shadow-lg p-4 transition-all duration-500">
                <a class="block" href="/blog.deatils.html">
                    <img class="rounded w-full" src="https://cdn.pixabay.com/photo/2024/02/21/14/53/ai-generated-8587845_640.png" 
                         srcset="https://cdn.pixabay.com/photo/2024/02/21/14/53/ai-generated-8587845_640.png 1x, 
                                 https://cdn.pixabay.com/photo/2024/02/21/14/53/ai-generated-8587845_1280.png 2x" 
                         alt="Free Ai Generated Employee illustration and picture">
                    <h2 class="text-xl mt-4 font-bold text-white mb-2 line-clamp-2">الرحاب</h2>
                    <p class=" text-ellipsis overflow-hidden whitespace-nowrap max-w-full">
                        الرحاب لتوريد العمالة توفر بودى جارد، وحراسات خاصة للافراد والاسر والمجموعات السياحية ورجال
                        الاعمال -- 01104891929"
                    </p>
                    <span class="text-gray-400 text-sm">4/9/2025, 7:55:18 PM</span>
                </a>
            </div>
             <div class="rounded shadow hover:shadow-lg p-4 transition-all duration-500">
                <a class="block" href="/blog.deatils.html">
                    <img class="rounded w-full" src="https://cdn.pixabay.com/photo/2024/02/21/14/53/ai-generated-8587845_640.png" 
                         srcset="https://cdn.pixabay.com/photo/2024/02/21/14/53/ai-generated-8587845_640.png 1x, 
                                 https://cdn.pixabay.com/photo/2024/02/21/14/53/ai-generated-8587845_1280.png 2x" 
                         alt="Free Ai Generated Employee illustration and picture">
                    <h2 class="text-xl mt-4 font-bold text-white mb-2 line-clamp-2">الرحاب</h2>
                    <p class="text-ellipsis overflow-hidden whitespace-nowrap max-w-full">
                        الرحاب لتوريد العمالة توفر بودى جارد، وحراسات خاصة للافراد والاسر والمجموعات السياحية ورجال
                        الاعمال -- 01104891929"
                    </p>
                    <span class="text-gray-400 text-sm">4/9/2025, 7:55:18 PM</span>
                </a>
            </div> <div class="rounded shadow hover:shadow-lg p-4 transition-all duration-500">
                <a class="block" href="/blog.deatils.html">
                    <img class="rounded w-full" src="https://cdn.pixabay.com/photo/2024/02/21/14/53/ai-generated-8587845_640.png" 
                         srcset="https://cdn.pixabay.com/photo/2024/02/21/14/53/ai-generated-8587845_640.png 1x, 
                                 https://cdn.pixabay.com/photo/2024/02/21/14/53/ai-generated-8587845_1280.png 2x" 
                         alt="Free Ai Generated Employee illustration and picture">
                    <h2 class="text-xl mt-4 font-bold text-white mb-2 line-clamp-2">الرحاب</h2>
                    <p class=" text-ellipsis overflow-hidden whitespace-nowrap max-w-full">
                        الرحاب لتوريد العمالة توفر بودى جارد، وحراسات خاصة للافراد والاسر والمجموعات السياحية ورجال
                        الاعمال -- 01104891929"
                    </p>
                    <span class="text-gray-400 text-sm">4/9/2025, 7:55:18 PM</span>
                </a>
            </div> <div class="rounded shadow hover:shadow-lg p-4 transition-all duration-500">
                <a class="block" href="/blog.deatils.html">
                    <img class="rounded w-full" src="https://cdn.pixabay.com/photo/2024/02/21/14/53/ai-generated-8587845_640.png" 
                         srcset="https://cdn.pixabay.com/photo/2024/02/21/14/53/ai-generated-8587845_640.png 1x, 
                                 https://cdn.pixabay.com/photo/2024/02/21/14/53/ai-generated-8587845_1280.png 2x" 
                         alt="Free Ai Generated Employee illustration and picture">
                    <h2 class="text-xl mt-4 font-bold text-white mb-2 line-clamp-2">الرحاب</h2>
                    <p class=" text-ellipsis overflow-hidden whitespace-nowrap max-w-full">
                        الرحاب لتوريد العمالة توفر بودى جارد، وحراسات خاصة للافراد والاسر والمجموعات السياحية ورجال
                        الاعمال -- 01104891929"
                    </p>
                    <span class="text-gray-400 text-sm">4/9/2025, 7:55:18 PM</span>
                </a>
            </div>
        </div>
    </aside>
</div>

<!-- footer -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Your JavaScript code here
    });
</script>
@stop