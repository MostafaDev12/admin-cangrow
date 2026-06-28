     @extends('layouts.front')

  @section('title')

      {{ __('blogs') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop

  @section('css')
    
  @stop
  @section('content')

    <!-- blogs -->
    <section class="container my-10 mx-auto px-4 md:px-8 lg:px-16 xl:px-32">
        <div class="text-center my-10">
            <div style="opacity: 1; transform: none;"><span
                    class="uppercase text-accent font-semibold leading-4"></span>
                <h1 class="text-primary font-bold text-4xl italic">{{ __('blogs') }} </h1>
            </div>
        </div>
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
             @foreach($blogs as $blog) 
                <div class="rounded overflow-hidden shadow hover:shadow-lg p-4 transition-all duration-500 bg-white group
                            animate-fadeIn cursor-pointer">
                    <a class="flex flex-col overflow-hidden justify-center items-center" 
                       href="{{ route('single-blog.index', [ 'blog' => $blog->{'slug_' . $sign} ]) }}">
                
                        <!-- Image with fixed height + animation -->
                        <div class="w-full h-48 overflow-hidden rounded relative">
                            <img class="object-cover w-full h-full rounded transform group-hover:scale-105 transition-all duration-500"
                                src="{{ $blog->photo }}"
                                srcset="{{ $blog->photo }} 1x, {{ $blog->photo }} 2x"
                                alt="Blog image"
                                title="Blog image" />
                        </div>
                
                        <!-- Title -->
                        <h1 class="text-xl mt-4 font-bold text-gray-800 mb-2 line-clamp-2 group-hover:text-primary transition-colors">
                            {{ $blog->{'title_' . $sign} }}
                        </h1>
                
                        <!-- Short Description -->
                        <p class="text-gray-600 text-sm line-clamp-2">
                            {{ $blog->{'short_details_' . $sign} }}
                        </p>
                
                        <!-- Author with icon -->
                        <div class="flex items-center gap-2 mt-3 text-gray-500 text-sm">
                                 <i class="fa-solid fa-pen-nib text-gray-400"></i>
    
                                
                                <a href="{{ route('doctors.index') }}">
                                   Dr Mohamed Atef
                                </a>
                        </div>
                    </a>
                </div>
              
           @endforeach
        </div>
        <div id="pagination" class="flex my-10 justify-center space-x-2">
             {{ $blogs->links('includes.pagination.custom') }}
        </div>
    </section>
    
      
                <style>
                @keyframes fadeIn {
                  from { opacity: 0; transform: translateY(10px); }
                  to { opacity: 1; transform: translateY(0); }
                }
                .animate-fadeIn {
                  animation: fadeIn 0.6s ease-in-out;
                }
                </style>
    
    
    
    
    
    
   @stop