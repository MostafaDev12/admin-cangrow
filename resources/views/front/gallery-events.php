 
  
 @extends('layouts.front')

 @section('title')
         {{ __('كن متطوع') }} - {{ $gs->{'title_' . $sign} }}
 @stop

 @section('gsearch')
     <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}" />
 @stop
 @section('css')
 
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('front/dareltawfik/') }}/assets/style/service_details.css">
    
    <style>

    </style>
 @stop



 @section('content')
     @php
         $phones = explode(',', $gs->phones);
         $randomPhone = Arr::random($phones);
     @endphp
 
 
 
  <main>

        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4">

                <div class="text-center mb-12 max-w-3xl mx-auto">
                    <h2 class="text-6xl md:text-8xl font-extrabold text-gray-100 select-none">
                        دار التوفيق
                    </h2>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 -mt-9 md:-mt-14">
                        صور مناسبات دائمة خاصة بالمؤسسة
                    </h1>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 mb-16 md:mb-24">
                    <div class="rounded-lg overflow-hidden shadow-lg group">
                        <img src="https://hpt.ea2.myftpupload.com/wp-content/uploads/2023/01/f1.jpg"
                            alt="Gallery Image 1"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg group">
                        <img src="https://hpt.ea2.myftpupload.com/wp-content/uploads/2023/01/f2.jpg"
                            alt="Gallery Image 2"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg group">
                        <img src="https://hpt.ea2.myftpupload.com/wp-content/uploads/2023/01/f3.jpg"
                            alt="Gallery Image 3"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg group">
                        <img src="https://hpt.ea2.myftpupload.com/wp-content/uploads/2023/01/f4.jpg"
                            alt="Gallery Image 4"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg group">
                        <img src="https://hpt.ea2.myftpupload.com/wp-content/uploads/2023/01/f5.jpg"
                            alt="Gallery Image 5"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg group">
                        <img src="https://hpt.ea2.myftpupload.com/wp-content/uploads/2023/01/f6.jpg"
                            alt="Gallery Image 6"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                </div>

                <div class="text-center mb-12 max-w-3xl mx-auto">



                    <div class="text-center mb-12 max-w-3xl mx-auto">
                        <div class="relative mb-10">
                            <h1 class="text-sm font-extrabold text-custom-orange  mb-4">
                                فيديوهات </h1>
                            <div
                                class="font-['Aref_Ruqaa'] text-[60px] font-normal text-[color:var(--funden-heading-color)] opacity-10 tracking-[0] absolute left-0 top-[30%] w-full -translate-y-1/2 capitalize leading-[1] z-1">
                                دار التوفيق
                            </div>
                        </div>
                        <p class="text-lg text-gray-600 leading-relaxed">
                            بعض فيديوهات مؤسسة دار التوفيق
                        </p>
                    </div>

                </div>

                <div class="max-w-4xl mx-auto mb-8 rounded-lg overflow-hidden shadow-lg">
                    <div class="relative aspect-video">
                        <img src="https://via.placeholder.com/800x450/cccccc/969696?text=Main+Video" alt="Main Video"
                            class="w-full h-full object-cover">
                        <a href="#" class="absolute inset-0 flex items-center justify-center group">
                            <div
                                class="w-16 h-16 bg-red-600 bg-opacity-90 rounded-full flex items-center justify-center transition-all duration-300 group-hover:scale-110">
                                <i class="fa-solid fa-play text-white text-2xl ml-1"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                    <div class="rounded-lg overflow-hidden shadow-lg group relative">
                        <img src="https://hpt.ea2.myftpupload.com/wp-content/uploads/2023/01/f1.jpg"
                            alt="Video Thumbnail" class="w-full h-full object-cover">
                        <!-- play overlay -->
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg group relative">
                        <img src="https://hpt.ea2.myftpupload.com/wp-content/uploads/2023/01/f2.jpg"
                            alt="Video Thumbnail" class="w-full h-full object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg group relative">
                        <img src="https://hpt.ea2.myftpupload.com/wp-content/uploads/2023/01/f3.jpg"
                            alt="Video Thumbnail" class="w-full h-full object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg group relative">
                        <img src="https://hpt.ea2.myftpupload.com/wp-content/uploads/2023/01/f4.jpg"
                            alt="Video Thumbnail" class="w-full h-full object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg group relative">
                        <img src="https://hpt.ea2.myftpupload.com/wp-content/uploads/2023/01/f5.jpg"
                            alt="Video Thumbnail" class="w-full h-full object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg group relative">
                        <img src="https://hpt.ea2.myftpupload.com/wp-content/uploads/2023/01/f6.jpg"
                            alt="Video Thumbnail" class="w-full h-full object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg group relative">
                        <img src="https://hpt.ea2.myftpupload.com/wp-content/uploads/2023/01/f1.jpg"
                            alt="Video Thumbnail" class="w-full h-full object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg group relative">
                        <img src="https://hpt.ea2.myftpupload.com/wp-content/uploads/2023/01/f2.jpg"
                            alt="Video Thumbnail" class="w-full h-full object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg group relative">
                        <img src="https://hpt.ea2.myftpupload.com/wp-content/uploads/2023/01/f3.jpg"
                            alt="Video Thumbnail" class="w-full h-full object-cover">
                    </div>
                </div>

                
            </div>
        </section>


 @include('includes.share')

    </main>
 @stop