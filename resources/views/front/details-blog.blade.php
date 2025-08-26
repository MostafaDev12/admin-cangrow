 
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
    <section class="relative py-12 md:py-20 bg-gray-900 text-yellow-400 overflow-hidden">
        <!-- <div class="absolute inset-0">
            <img src="{{ $blog->photo }}" alt="Hero Background"
                class="w-full h-full object-cover opacity-20">
        </div> -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-yellow-500 mb-4">{{ $blog->{'title_' . $sign} }}</h1>
            <p class="text-primary text-lg md:text-xl mb-6">  {{ optional($blog)->{'short_details_' . $sign} }}</p>
            <div class="flex items-center justify-center text-sm text-primary space-x-4 rtl:space-x-reverse">
                <span class="flex items-center">
                    <i class="fa-solid fa-calendar-days h-4 w-4 ml-1 text-gray-400"></i>
                    {{ \Carbon\Carbon::parse($blog->blog_date)->format('d M, Y') }}
                </span>
                {{-- <span class="flex items-center">
                    <i class="fa-solid fa-user h-4 w-4 ml-1 text-gray-400"></i>
                    فريق التطوير
                </span> --}}
                <span class="flex items-center">
                    <i class="fa-solid fa-tag h-4 w-4 ml-1 text-gray-400"></i>
                    {{ optional($blog->category)->{'title_' . $sign} }}
                </span>
            </div>
        </div>
    </section>

    <section class="py-12 md:py-16 bg-gray-900 text-yellow-400">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 bg-gray-800 rounded-xl shadow-lg p-6 md:p-8">
                <div class="prose prose-invert max-w-none text-primary text-right">
                    <p class="mb-4">
                        {!! $blog->{'details_' . $sign} !!}
                    </p>
                </div>
            </div>

            <aside class="lg:col-span-1">
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 mb-8">
                    <h3 class="text-xl font-bold text-yellow-500 mb-4 text-right">مقالات حديثة</h3>
                    <ul class="space-y-4">
                        @foreach (App\Models\Blog::orderBy('blog_date', 'desc')->where('id', '!=', $blog->id)->limit(3)->get() as $k => $blogg)
                      @php
                          $k++;
                      @endphp
                        <li>
                            <a href="{{ route('single-blog.index',['lang'=> $sign , 'blog' => $blogg->{'slug_' . $sign} ]) }}"
                                class="block text-primary hover:text-yellow-100 transition-colors duration-200 text-right">
                                <span class="block font-medium"> {{ $blogg->{'title_' . $sign} }}  </span>
                                <span class="text-sm text-gray-400 flex items-center justify-end mt-1">
                                    <i class="fa-solid fa-calendar-days h-3 w-3 mr-1"></i>    {{ \Carbon\Carbon::parse($blogg->blog_date)->format('d M, Y') }}
                                </span>
                            </a>
                        </li>

                         @endforeach
                     
                    </ul>
                </div>

                {{-- <div class="bg-gray-800 rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-yellow-500 mb-4 text-right">وسوم شائعة</h3>
                    <div class="flex flex-wrap gap-2 justify-end">
                        <a href="#"
                            class="bg-gray-700 text-primary px-4 py-2 rounded-full text-sm hover:bg-accent-blue hover:text-white transition-colors duration-200">الاستدامة</a>
                        <a href="#"
                            class="bg-gray-700 text-primary px-4 py-2 rounded-full text-sm hover:bg-accent-blue hover:text-white transition-colors duration-200">الشراكة</a>
                        <a href="#"
                            class="bg-gray-700 text-primary px-4 py-2 rounded-full text-sm hover:bg-accent-blue hover:text-white transition-colors duration-200">الابتكار</a>
                        <a href="#"
                            class="bg-gray-700 text-primary px-4 py-2 rounded-full text-sm hover:bg-accent-blue hover:text-white transition-colors duration-200">القيادة</a>
                        <a href="#"
                            class="bg-gray-700 text-primary px-4 py-2 rounded-full text-sm hover:bg-accent-blue hover:text-white transition-colors duration-200">الدهانات</a>
                        <a href="#"
                            class="bg-gray-700 text-primary px-4 py-2 rounded-full text-sm hover:bg-accent-blue hover:text-white transition-colors duration-200">الأداء</a>
                    </div>
                </div> --}}
            </aside>
        </div>
    </section>


    @stop