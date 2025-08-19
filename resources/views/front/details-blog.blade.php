  @extends('layouts.front')

@section('title')
   
{{ strip_tags($blog->{'title_' . $sign} ) }}   -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

     
@section('content')
@php
$phones =  explode(',', $gs->phones);
 
$randomPhone = Arr::random($phones);
@endphp
    <div class="bg-gradient-to-r from-blue-500 to-green-600 text-white py-16 px-4 md:px-16">
        <div class="text-center px-4">
            <h1 class="text-xl sm:text-4xl font-bold mb-4">    {{ strip_tags($blog->{'title_' . $sign} ) }}    </h1>
            <p class="text-sm sm:text-lg max-w-2xl mx-auto">
             {{ $blog->{'short_details_' . $sign} }}
            </p>
        </div>
    </div>
    <section class="container mx-auto px-4 py-8 lg:px-8 xl:max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Article Content -->
            <section class="lg:col-span-8">
                <div class="prose prose-lg max-w-none text-gray-700">
                    {{-- <p class="text-base sm:text-lg leading-relaxed">
                        <strong>
                            أصبحت زراعة الأسنان واحدة من أكثر الخيارات انتشارًا لاستعادة الأسنان المفقودة، لأنها توفر
                            حلًا
                            دائمًا يساعد المرضى على استعادة مظهرهم الجمالي.
                        </strong>
                    </p>
                    <p class="text-base sm:text-lg leading-relaxed">
                        <strong>
                            ومع تزايد الوعي بفوائد زراعة الأسنان، يتزايد اهتمام الأفراد بمعرفة سعر زراعة الأسنان في مصر،
                            حيث
                            تتفاوت الأسعار بناءً على عوامل متعددة مثل نوع الزرعة، وخبرة الطبيب، والمرافق المستخدمة في
                            العملية.
                        </strong>
                    </p>
                    <p class="text-base sm:text-lg leading-relaxed">
                        <strong>
                            في هذه المقالة، سوف نتحدث حول التفاصيل عن تكلفة زراعة الأسنان في مصر، مع توضيح النقاط
                            الرئيسية
                            التي
                            يجب أن يأخذها المرضى في الاعتبار لضمان حصولهم على أفضل رعاية بأسعار معقولة.
                        </strong>
                    </p> --}}
                    <img src="{{ $blog->photo }}"
                        alt="{{ strip_tags($blog->{'title_' . $sign} ) }}"
                        class="w-full max-w-[602px] h-auto rounded-lg shadow-md mx-auto my-6">

                    <h2 class="text-2xl sm:text-3xl font-bold text-blue-800 mt-8 mb-4">
                        {{ strip_tags($blog->{'title_' . $sign} ) }}
                    </h2>
                    <p class="text-base sm:text-lg leading-relaxed">
                         {!! $blog->{'details_' . $sign} !!} 
                    </p>
                   
                </div>
            </section>
            <aside class="lg:col-span-4 mt-8 lg:mt-0">
                <div class="bg-white shadow-xl rounded-xl p-6 md:p-8 border border-gray-100">
                    <div class="mb-10">
                        <h3 class="text-2xl font-extrabold text-blue-900 border-b-2 border-blue-300 pb-3 mb-5">
                            <i class="fas fa-tooth text-blue-600 ml-2"></i> {{ __('خدماتنا') }}
                        </h3>
                        <ul class="space-y-3">

                               @foreach ($services as $servic)
                                  <li>
                                      <a href="{{ route('single-service.index'.$lang, ['slug' => $servic->{'slug_' . $sign} ,'lang'=> $lang]) }}"
                                          class="flex items-center text-gray-700 hover:text-blue-700 transition-all duration-300 transform hover:translate-x-1">
                                          <i class="fas fa-angle-left text-blue-500 text-sm ml-2"></i>
                                          {{ $servic->{'title_' . $sign} }}
                                      </a>
                                  </li>
                              @endforeach
                            
                        </ul>
                    </div>
 
                    <div class="mb-10">
                        <h3 class="text-2xl font-extrabold text-blue-900 border-b-2 border-blue-300 pb-3 mb-5">
                            <i class="fas fa-newspaper text-blue-600 ml-2"></i> {{ __('أحدث المقالات') }}
                        </h3>
                        <ul class="space-y-5">
                           @foreach (App\Models\Blog::orderBy('blog_date', 'desc')->limit(3)->get() as $k => $blogg)
                                  @php
                                      $k++;
                                  @endphp
                                  <li class="flex items-start">
                                      <img src="{{ $blogg->photo }}" alt="صورة مقالة"
                                          class="w-24 h-24 object-cover rounded-lg shadow-sm ml-4 flex-shrink-0" />
                                      <div>
                                          <a href="{{ route('single-blog.index'.$lang, ['blog' =>$blogg->{'slug_' . $sign} ,'lang'=> $lang ]) }}"
                                              class="font-bold text-gray-800 hover:text-blue-700 text-lg leading-snug">
                                              {{ strip_tags($blogg->{'title_' . $sign} ) }}
                                          </a>
                                          <p class="text-sm text-gray-500 mt-1">
                                              {{ $blogg->blog_date }}
                                          </p>
                                      </div>
                                  </li>
                              @endforeach
                        </ul>
                    </div>
 
                </div>
            </aside>
        </div>

    </section>
    <!-- Contact Call-to-Action -->

    <section class="">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500 to-green-600 text-white py-16 px-4 md:px-16">
            <div class="text-center px-4">
                <h1 class="text-xl sm:text-4xl font-bold mb-4"> {{ __('المقالات متعلقة') }}</h1>
                <p class="text-sm sm:text-lg mb-8 max-w-2xl mx-auto">
                     
                    {{ __(' اكتشف أحدث النصائح والمعلومات حول صحة الأسنان من خلال مدونتنا ') }}
                </p>
            </div>
        </div>

        <!-- Blog Section -->
        <div class="sm:px-16 px-4 py-10 sm:py-16 mx-auto text-center bg-gray-100">
            <h2 class="text-lg sm:text-4xl font-bold text-blue-800 mb-6">
                {{ __('ابق على اطلاع بأفكارنا') }}<br /> {{ __('المتعلقة بطب الأسنان') }}
            </h2>
            

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10 max-w-6xl mx-auto">
               
               @foreach ($blogs as $blog)
                   
  <div
                    class="bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img src="{{ $blog->photo }}"
                        alt="{{ strip_tags($blog->{'title_' . $sign} ) }}" class="w-full h-60 object-cover" />
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-blue-800 mb-2">
                           {{ strip_tags($blog->{'title_' . $sign} ) }} 
                        </h3>
                        <p class="text-gray-600 text-sm">
                          {{ $blog->{'short_details_' . $sign} }}
                        </p>
                        <div class="mt-7 mb-4">
                            <a class="text-sm border border-blue-800 text-blue-800 px-4 py-2 rounded-md shadow-md hover:bg-blue-800 hover:text-white transition duration-300"
                                href="{{ route('single-blog.index'.$lang,['blog' =>$blog->{'slug_' . $sign} ,'lang'=> $lang ]) }}"> {{ __('اعرف المزيد') }}</a>
                        </div>
                    </div>
                </div>
               @endforeach
 
            </div>
           {{ $blogs->links('includes.paginations') }}

        </div>

    
    </section>
@include('includes.book')
 @stop