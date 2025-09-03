       @extends('layouts.front')

      @section('title')

        {{ $service->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}

      @stop

      @section('gsearch')
          <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
      @stop

      @section('css')

      @stop
      @section('content')

<section class="bg-gray-800 py-3 border-b border-gray-700">
     <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-sm text-primary text-right">
         <a href="products.html" class="hover:text-yellow-100">{{ __('المنتجات') }}</a>
        
         <span class="mx-2">/</span>
         <a href="#" class="hover:text-yellow-100"> {{ optional($service->category)->{'title_' . $sign} }}  </a>
        
         <span class="mx-2">/</span>
          @if($service->parent)
         <a href="#" class="hover:text-yellow-100"> {{ optional($service->parent)->{'title_' . $sign} }}  </a>
         <span class="mx-2">/</span>
        @endif

         <span class="font-bold text-yellow-500">{{ $service->{'title_' . $sign} }}</span>
     </div>
 </section>

 <section class="py-12 md:py-16 bg-gray-900 text-yellow-400">
     <div class="container mx-auto px-4 sm:px-6 lg:px-8">
         <div class="lg:grid lg:grid-cols-2 lg:gap-12 items-start">
             <div class="mb-8 lg:mb-0">
                 <img src="{!! $service->photo !!}" alt="{{ $service->{'title_' . $sign} }}"
                     class="w-full h-auto rounded-xl shadow-lg mb-4">
                 <!-- <div class="flex space-x-4 rtl:space-x-reverse justify-center">
                        <img src="https://placehold.co/100x75/3B82F6/FACC15?text=Img1" alt="SBP 480 Thumbnail 1"
                            class="w-24 h-auto rounded-md cursor-pointer border-2 border-transparent hover:border-yellow-400 transition-colors">
                        <img src="https://placehold.co/100x75/3B82F6/FACC15?text=Img2" alt="SBP 480 Thumbnail 2"
                            class="w-24 h-auto rounded-md cursor-pointer border-2 border-transparent hover:border-yellow-400 transition-colors">
                        <img src="https://placehold.co/100x75/3B82F6/FACC15?text=Img3" alt="SBP 480 Thumbnail 3"
                            class="w-24 h-auto rounded-md cursor-pointer border-2 border-transparent hover:border-yellow-400 transition-colors">
                    </div> -->
             </div>

             <div class="">
                 <h1 class="text-4xl md:text-5xl font-bold text-yellow-500 mb-4">  {{ $service->{'title_' . $sign} }}</h1>
                 <!-- <p class="text-primary text-lg mb-6">
                        دهان علامات طرق مكون واحد عالي المحتوى الصلب، متين، وقليل المذيبات، مخصص لتطبيقات مدارج
                        المطارات.
                    </p> -->

                 <div class="bg-gray-800 rounded-xl shadow-md p-6 mb-8">
                     <h2 class="text-2xl font-bold text-yellow-500 mb-4"> {{ __('وصف المنتج') }}</h2>
                     <p class="text-primary mb-4">
                       
  {!! $service->{'details_' . $sign} ?? '' !!} 
                     </p>

                 </div>
 
 

                 <a href="{{ route('contact.index', $sign) }}"
                     class="inline-block bg-yellow-400 text-white text-lg font-bold px-8 py-4 rounded-full shadow-lg hover:bg-yellow-400/90 transition-colors duration-300">
                     <i class="fa-solid fa-envelope ml-3"></i> {{ __('اطلب عرض سعر') }}
                 </a>
                 @if(optional($service->category)->{'slug_' . $sign} )
                 <a href="{{ route('single-category-service.index', ['lang' => $sign, 'slug' => optional($service->category)->{'slug_' . $sign}  ]) }}"
                     class="inline-block border border-gray-600 text-primary text-lg font-bold px-8 py-4 rounded-full shadow-lg hover:bg-gray-700 transition-colors duration-300 mr-4">
                     <i class="fa-solid fa-arrow-right ml-3"></i> {{ __('العودة للمنتجات') }}
                 </a>
                 @endif
             </div>
         </div>
     </div>
 </section>

 <section class="py-12 md:py-16 bg-gray-900 text-yellow-400 border-t border-gray-800">
     <div class="container mx-auto px-4 sm:px-6 lg:px-8">
         <h2 class="text-3xl md:text-4xl font-bold text-yellow-500 mb-8 text-center"> {{ __('منتجات ذات صلة') }}</h2>
         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
             
            
            @if ($service->category && $service->category->services->count() > 0)
                @foreach ($service->category->services->where('id', '!=', $service->id) as $relatedService)
                
                   <div
                    class="bg-gray-800 rounded-xl shadow-md overflow-hidden flex flex-col hover:shadow-lg transition-shadow duration-300">
                    <div class="relative h-48 w-full overflow-hidden">
                        <img src="{!! $relatedService->photo !!}" alt="{{ $relatedService->{'title_' . $sign} }}"
                            class="w-full h-full object-cover transition-transform hover:scale-105 duration-500">
                    </div>
                    <div class="p-6 flex-grow flex flex-col justify-between text-right">
                        <div>
                            <h3 class="text-xl font-bold text-yellow-500 mb-2">{{ $relatedService->{'title_' . $sign} }}</h3>
                            <p class="text-primary text-sm mb-4 line-clamp-3">
                               {!! $relatedService->{'short_details_' . $sign} ?? '' !!} 
                            </p>
                        </div>
                        <a href="{{ route('single-service.index', ['lang' => $sign, 'slug' => $relatedService->{'slug_' . $sign}]) }}"
                            class="inline-flex items-center text-yellow-400 font-medium hover:text-accent-green transition-colors duration-200 mt-4 flex-row-reverse">
                             {{ __('المزيد') }}
                            <i class="fa-solid fa-arrow-left h-4 w-4 mr-1"></i>
                        </a>
                    </div>
                </div>

 
                @endforeach
            @else
                
            @endif
{{-- 
            <div
                 class="bg-gray-800 rounded-xl shadow-md overflow-hidden flex flex-col hover:shadow-lg transition-shadow duration-300">
                 <div class="relative h-48 w-full overflow-hidden">
                     <img src="https://placehold.co/400x300/3B82F6/FACC15?text=SBP+369" alt="SBP 369"
                         class="w-full h-full object-cover transition-transform hover:scale-105 duration-500">
                 </div>
                 <div class="p-6 flex-grow flex flex-col justify-between text-right">
                     <div>
                         <h3 class="text-xl font-bold text-yellow-500 mb-2">SBP 369</h3>
                         <p class="text-primary text-sm mb-4 line-clamp-3">
                             دهان علامات طرق مكون واحد يعتمد على المذيبات، مناسب لأنظمة الرش الهوائية.
                         </p>
                     </div>
                     <a href="product-details.html?id=sbp369"
                         class="inline-flex items-center text-yellow-400 font-medium hover:text-accent-green transition-colors duration-200 mt-4 flex-row-reverse">
                         المزيد
                         <i class="fa-solid fa-arrow-left h-4 w-4 mr-1"></i>
                     </a>
                 </div>
             </div> --}}

 

         </div>
     </div>
 </section>
 @stop