      @extends('layouts.front')

      @section('title')

          {{ $gs->{'title_' . $sign} }}

      @stop

      @section('gsearch')
          <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
      @stop


      @section('content')

          @php
              $phones = explode(',', $gs->phones);
              $emails = explode(',', $gs->emails);

              $randomPhone = Arr::random($phones);
          @endphp

          <section class="bg-gradient-to-r from-blue-500 to-green-600 text-white py-16 px-4 md:px-16">
              <div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-8">
                  <div class="md:w-1/2 text-center md:text-right">
                      <img src="{{ $gs->{'logo_' . $sign} }}" alt="Tooth Guard Clinic"
                          class="w-64 sm:w-80 mx-auto md:mx-0 mb-8">
                      <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-6"> {{ $slider->{'title_' . $sign} ?? '' }}
                      </h1>
                      <p class="text-base sm:text-lg md:text-xl mb-8 leading-relaxed">
                          {!! $slider->{'details_' . $sign} ?? '' !!}
                      </p>
                      <div class="flex justify-center md:justify-start space-x-4 space-x-reverse">
                          <a href="{{ route('about.index'.$lang,$lang) }}"
                              class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm sm:text-lg py-2 px-4 sm:px-8 rounded-full transition duration-300">
                              {{ __('معلومات عنا') }}
                          </a>
                          <a href="{{ route('contact.index'.$lang,$lang) }}"
                              class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-500 text-white font-semibold text-sm sm:text-lg py-2 px-4 sm:px-8 rounded-full transition duration-300">
                              {{ __('احجز موعدك') }}
                          </a>
                      </div>
                  </div>
                  <div class="md:w-1/2 mt-8 md:mt-0 flex justify-center">
                      <img src="{{ $slider->{'photo'} ?? '' }}" alt="Tooth Guard Clinic"
                          class="rounded-lg shadow-lg w-full max-w-md h-auto object-cover">
                  </div>
              </div>
          </section>
          <!-- Services Section -->
          <section class="py-20 bg-gradient-to-b from-white to-blue-50">
              <div class="container mx-auto px-4">
                  <div class="grid md:grid-cols-3 gap-8">
                      @foreach ($models as $k => $model)
                          <!-- Service 1 -->
                          <div
                              class="text-center p-8 hover:shadow-2xl transition-all duration-300 border-2 border-blue-100 hover:border-blue-300 bg-gradient-to-br from-blue-50 to-white rounded-lg">
                              <div class="space-y-6">
                                  <div
                                      class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto shadow-lg">

                                      @if ($k == 0)
                                          <i data-lucide="shield" class="w-10 h-10 text-white"></i>
                                      @elseif($k == 1)
                                          <i data-lucide="stethoscope" class="w-10 h-10 text-white"></i>
                                      @else
                                          <i data-lucide="users" class="w-10 h-10 text-white"></i>
                                      @endif
                                  </div>
                                  <h3 class="text-2xl font-bold text-blue-800"> {{ $model->{'title_' . $sign} ?? '' }}
                                  </h3>
                                  <p class="text-gray-700 leading-relaxed text-lg">
                                      {{ $model->{'details_' . $sign} ?? '' }}
                                  </p>
                              </div>
                          </div>
                      @endforeach

                  </div>
              </div>
          </section>
          <section class="sm:py-16 py-10">
              <div class="sm:px-32 px-10 mx-auto text-center">
                  <h2 class="sm:text-4xl text-lg font-bold text-blue-800 mb-12">
                      {{ __('طب الأسنان الشامل') }} <br> {{ __('لكل حاجة') }}
                  </h2>
                  <div class="swiper mySwiper overflow-hidden">
                      <div class="swiper-wrapper">
                       
                          @foreach ($services as $k => $service)
                              <div class="swiper-slide">
                                  <div
                                      class="h-80 w-full bg-gradient-to-b from-blue-700 to-green-500 text-white p-6 sm:p-10 rounded-lg shadow-lg">
                                      <img src="{{ $gs->{'logo_' . $sign} }}" alt="Cosmetic Fillings"
                                          class="mx-auto w-20  mb-4">
                                      <h3 class="text-xl sm:text-2xl font-bold mb-2">
                                          {{ $service->{'title_' . $sign} ?? '' }} </h3>
                                      <p class="text-sm"> {!! $service->{'short_details_' . $sign} ?? '' !!} </p>
                                      <div class="my-10">
                                          <a href="{{ route('single-service.index'.$lang, ['slug' => $service->{'slug_' . $sign} ,'lang'=> $lang]) }}"
                                              class="text-sm sm:text-md border border-gray-200 border-opacity-30 p-2 rounded-sm shadow-lg transform transition duration-500 ease-in-out hover:scale-125">
                                              {{ __('أقرأ المزيد') }}
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          @endforeach



                      </div>
                  </div>
                  <div class="mt-8">
                      <a href="{{ route('services.index'.$lang,$lang) }}"
                          class="bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-6 rounded-full shadow-md transition duration-300">

                          {{ __('اكتشف المزيد من خدماتنا') }}


                      </a>
                  </div>
              </div>
          </section>
          <section class="sm:px-16 px-4 py-10 sm:py-16 bg-gray-100">
              <div class="sm:px-16 px-10 mx-auto text-center">
                  <h2 class="sm:text-4xl text-lg font-bold text-blue-800 mb-6">

                      {{ __('ابق على اطلاع بأفكارنا') }}

                      <br>{{ __('المتعلقة بطب الأسنان') }}
                  </h2>
                  <p class="text-gray-500 text-base sm:text-lg mb-8">

                      {{ __('تفضل بزيارة مدونة Tooth Guard Clinics للحصول على أحدث النصائح والاتجاهات والرؤى المتعلقة بصحة الأسنان. تغطي مقالاتنا كل ما تحتاج إلى معرفته للحفاظ على ابتسامة مشرقة وصحية') }}
                  </p>
                  <div class="swiper mySwiper overflow-hidden">
                      <div class="swiper-wrapper">
                          @foreach ($blogs as $blog)
                              <div class="swiper-slide">
                                  <div
                                      class="bg-white shadow-md rounded-lg overflow-hidden mt-4 mb-4 transform transition duration-300 hover:scale-105">
                                      <img src="{{ $blog->photo }}" alt="{{ $blog->{'title_' . $sign} }}"
                                          class="w-full h-60 object-cover">
                                      <div class="p-4">
                                          <h3 class="text-lg font-bold text-blue-800 mb-2"> {{ $blog->{'title_' . $sign} }}
                                          </h3>
                                          <div class="text-gray-600 text-sm"></div>
                                          <div class="group mt-7 mb-4">
                                              <a href="{{ route('single-blog.index'.$lang, ['blog' =>$blog->{'slug_' . $sign} ,'lang'=> $lang ]) }}"
                                                  class="text-sm sm:text-md border border-blue-800 text-blue-800 p-2 rounded-sm shadow-md hover:bg-blue-800 hover:text-white transition duration-300">
                                                  {{ __('أقرأ المزيد') }}
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endforeach


                          <!-- Additional slides can be added here following the same structure -->
                      </div>
                  </div>
                  <div class="mt-8">
                      <a href="{{ route('blogs.index'.$lang,$lang) }}"
                          class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-3 px-6 rounded-full shadow-md transition duration-300">
                          {{ __('اكتشف المزيد من المقالات') }}
                      </a>
                  </div>
              </div>
          </section>

          @include('includes.book')





          <!-- Video Testimonials Section -->
          <section class="py-20 bg-gradient-to-b from-blue-50 to-white">
              <div class="container mx-auto px-4">
                  <h2
                      class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-blue-800 to-green-600 bg-clip-text text-transparent text-center mb-16">
                      {{ __('فيديوهات عن الدكتور') }}
                  </h2>
                  <div class="max-w-5xl mx-auto">
                      <div
                          class="bg-gradient-to-br from-blue-900 to-green-900 rounded-2xl overflow-hidden aspect-video relative shadow-2xl border-4 border-blue-200">
                          <img src="https://via.placeholder.com/800x400" alt="Video testimonial"
                              class="object-cover w-full h-full">
                          <div
                              class="absolute inset-0 bg-gradient-to-br from-blue-900/60 to-green-900/60 flex items-center justify-center">
                              <button
                                  class="bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 text-white border-2 border-white rounded-full p-6 shadow-2xl hover:shadow-green-500/25 transition-all duration-300 transform hover:scale-110">
                                  <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                      <path d="M8 5v14l11-7z" />
                                  </svg>
                              </button>
                          </div>
                          <div class="absolute bottom-6 left-6 text-white">
                              <div class="flex items-center gap-3 bg-blue-600/80 backdrop-blur-sm rounded-full px-4 py-2">
                                  <div
                                      class="w-10 h-10 bg-gradient-to-r from-green-400 to-blue-400 rounded-full flex items-center justify-center">
                                      <i data-lucide="users" class="w-5 h-5 text-white"></i>
                                  </div>
                                  <span class="font-semibold">reviews</span>
                              </div>
                          </div>
                          <div class="absolute bottom-6 right-6 text-white">
                              <div class="bg-green-600/80 backdrop-blur-sm rounded-full px-4 py-2 font-semibold">Share</div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>

      @stop
