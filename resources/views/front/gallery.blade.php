 
 
@extends('layouts.front')

@section('title')
   
{{ __('معرض الصور') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')


    <main>

        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4">

                <div class="text-center mb-12 max-w-3xl mx-auto">
                    <h2 class="text-6xl md:text-8xl font-extrabold text-gray-100 select-none">
                           {{ __('دار التوفيق') }}
                    </h2>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 -mt-9 md:-mt-14">
                                 {{ __('ألبوم صور مؤسسة دار التوفيق') }}
                    </h1>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 mb-16 md:mb-24">
                    @foreach ( $images as  $image)
                        
                    <div class="rounded-lg overflow-hidden shadow-lg group">
                        <img src="{{ $image->media }}"
                            alt="Gallery Image 1"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    @endforeach
                     
                </div>
{{-- 
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

                </div> --}}
                {{-- @foreach ( $videos as  $video)
                    
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
                @endforeach --}}
 
                {{-- <div class="text-center mt-12">
                    <button
                        class="bg-gray-100 text-gray-700 font-semibold py-2 px-6 rounded-full border border-gray-300 hover:bg-gray-200 transition-colors">
                        Load More
                    </button>
                </div> --}}

            </div>
        </section>




        @include('includes.share')


    </main>


@stop