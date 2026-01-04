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



          <section class="py-12 md:py-20 bg-gray-900 text-yellow-400">
              <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="text-center max-w-3xl mx-auto mb-12 md:mb-16 text-right">
                      <h2 class="text-3xl md:text-4xl font-bold text-yellow-500 mb-4">  {{ __('أحدث الأخبار والرؤى') }}</h2>
                      <p class="text-primary text-base sm:text-lg"> 
                        {{ __('ابقَ على اطلاع بأحدث الاتجاهات والأبحاث والتطورات في مجال MWM GULDDAL SYSTEMS.') }}
                        </p>
                  </div>
                  <div class="my-8 flex justify-center">
                      <div class="relative w-full max-w-lg">
                          <input type="text" placeholder="{{ __('ابحث عن المقالات') }}..."
                              class="w-full py-3 px-5 pl-12 border border-gray-600 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-accent-blue focus:border-transparent bg-gray-800 text-primary"
                              style="padding-left: 3rem; padding-right: 1.25rem;">
                          <i
                              class="fa-solid fa-magnifying-glass absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                      </div>
                  </div>
                  <div class="flex flex-wrap justify-center gap-4 mb-8" id="filter-buttons">
                      <button
                          class="category-button px-6 py-3 bg-accent-blue text-white rounded-full shadow-md hover:bg-accent-blue/90 transition-colors duration-300 ease-in-out"
                          data-category="all">
                          {{ __('كل المقالات') }}
                      </button>
                     
                     @foreach ($blogcategories as $blogcategory)
                         
                            <button
                                class="category-button px-6 py-3 bg-gray-700 text-primary rounded-full shadow-md border border-gray-600 hover:bg-gray-600 transition-colors duration-300 ease-in-out"
                                data-category="{{ $blogcategory->id }}">
                                {{ $blogcategory->{'title_' . $sign} }}
                            </button>
                     @endforeach
                      
                  </div>
                  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">


                    @foreach ($blogs as $blog)
                         
                      <div class="bg-gray-800 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300"
                          data-category="{{ $blog->category_id }}">
                          <div class="relative h-48 overflow-hidden">
                              <img alt="رؤيتنا وأهدافنا" loading="lazy" width="400" height="200"
                                  class="w-full h-full object-cover transition-transform hover:scale-105 duration-500"
                                  style="color:transparent" sizes="(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 33vw"
                                  src="{{ $blog->photo }}"
                                  onerror="this.onerror=null;this.src='{{ $blog->photo }}';" />
                              <div
                                  class="absolute top-4 right-4 bg-accent-blue text-white px-3 py-1 rounded-full text-xs font-medium">
                                  {{ optional($blog->category)->{'title_' . $sign} }}</div>
                          </div>
                          <div class="p-6">
                              <div class="flex items-center text-sm text-primary mb-3 flex-row-reverse space-x-reverse">
                                  <span class="flex items-center ml-6">
                                      <i class="fa-solid fa-calendar-days h-4 w-4 ml-1 text-gray-400"
                                          aria-hidden="true"></i>
                                     {{ \Carbon\Carbon::parse($blog->blog_date)->format('d M, Y') }}
                                  </span>
                                  {{-- <span class="flex items-center">
                                      <i class="fa-solid fa-user h-4 w-4 ml-1 text-gray-400" aria-hidden="true"></i>
                                      فريق التطوير
                                  </span> --}}
                              </div>
                              <h3 class="text-xl font-bold text-yellow-400 mb-2 text-right">  {{ optional($blog)->{'title_' . $sign} }} </h3>
                              <p class="text-primary mb-4 line-clamp-3 text-sm text-right">  
                                
                                {{ optional($blog)->{'short_details_' . $sign} }}

                              </p>
                              <a href="{{ route('single-blog.index',['lang'=> $sign , 'blog' =>$blog->{'slug_' . $sign} ]) }}" target="_blank" rel="noopener noreferrer"
                                  class="inline-flex items-center text-accent-blue font-medium hover:text-accent-green transition-colors duration-200 flex-row-reverse">
                                  {{ __('اقرأ المزيد') }}
                                  <i class="fa-solid fa-arrow-left h-4 w-4 mr-1" aria-hidden="true"></i>
                              </a>
                          </div>
                      </div>

                    @endforeach
                    
                  </div>
              </div>
          </section>

      @stop
