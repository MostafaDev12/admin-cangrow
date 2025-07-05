   @extends('layouts.front')

   @section('title')

       {{ __('dentistry') }} - {{ $gs->{'title_' . $sign} }}

   @stop

   @section('gsearch')
       <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
   @stop

   @section('css')

   @stop
   @section('content')


       <!-- Main Container -->
       <section class="max-w-7xl bg-[#0069D1] !text-white mx-auto px-4 py-12">
           <!-- Header -->
           <div class="text-center mb-16">
               <h1 class="text-4xl font-bold mb-4">{{ __('Dentists in Los Angeles, CA') }}</h1>
               <p class="text-lg  max-w-2xl mx-auto">
                   {{ __('Innova Dental’s experienced and knowledgeable staff provide quality dental care.') }}
                   {{ __('Schedule a consultation and let us put a smile on your face.') }}
               </p>
           </div>

           <!-- Services Grid -->
           <div class="grid md:grid-cols-2 gap-8">
               <!-- Service Column 1 -->
            
                   @foreach ($parentservices->take(6)->chunk(3) as $services)
                   <div class="space-y-6">
                      @foreach ($services as $service) 
                  
                       <!-- Service Item 1 -->
                       <div class="flex items-start space-x-4 group">
                           <div class="mt-1 text-white group-hover:text-white-800 transition-colors">
                               <i class="fas fa-tooth text-3xl"></i>
                           </div>
                           <div>
                               <h3 class="text-xl font-semibold mb-1">
                                   <a href="#service-{{ $service->id }}"
                                       class="hover:text-white-600">{{ $service->{'title_' . $sign} }}</a>
                               </h3>
                               <p class="text-white">{{ $service->{'short_details_' . $sign} }}</p>
                           </div>
                       </div>
                   @endforeach
               </div>
  @endforeach


           </div>

           <!-- CTA Button -->
           <div class="text-center mt-12">
               <a href="{{ route('contact.index') }}" target="_blank" rel="noopener"
                   class="inline-block bg-white hover:bg-white-700 text-[#0069D1] px-8 py-3 rounded-md transition-colors">
                   {{ __('Schedule A Consultation') }} >
               </a>
           </div>
       </section>

       <section>
           <div class="container mx-auto px-4">
               <div class="flex flex-wrap gap-4 py-3 overflow-x-auto scrollbar-hide">
                   @foreach ($child_services as $service)
                       <!-- Dental Implants -->
                       <a href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}"
                           class="text-sm text-gray-700 hover:text-blue-500 hover:underline whitespace-nowrap">
                           {{ $home_service->{'title_' . $sign} }}
                       </a>
                   @endforeach



               </div>
           </div>
       </section>
       @foreach ($parentservices as $k => $service)
           @if ($k % 2 == 0)
               <section class="bg-white py-16" id="service-{{ $service->id }}">
                   <div class="container mx-auto px-4">
                       <div class="flex flex-wrap">
                           <!-- Left Column - Services List -->
                           <div class="w-full md:w-1/2 mb-8 md:mb-0">
                               <div class="bg-gray-50 p-6 rounded-lg">
                                   <h6 class="text-sm font-semibold text-gray-700 mb-4">{{ __('Popular scheduled') }}
                                       {{ $service->{'title_' . $sign} }}
                                   </h6>

                                   <ul class="space-y-3">
                                       @foreach ($service->childs as $serv)
                                           <li>
                                               <a href="{{ route('single-service.index', ['slug' => $serv->{'slug_' . $sign}]) }}"
                                                   class="flex items-center text-gray-700 hover:text-blue-500">
                                                   <i class="fas fa-chevron-right text-xs mr-3"></i>
                                                   <span> {{ $serv->{'title_' . $sign} }}</span>
                                               </a>
                                           </li>
                                       @endforeach


                                   </ul>
                               </div>
                           </div>

                           <!-- Right Column - Info Box -->
                           <div class="w-full md:w-1/2">
                               <div class="flex items-start">
                                   <!-- Icon -->
                                   <div class="mr-4">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                           viewBox="0 0 40 40" class="text-blue-500">
                                           <!-- Simplified SVG path (use original SVG paths) -->
                                           <path
                                               d="M20 5C12.8 5 7 10.8 7 18c0 5.2 3.1 9.7 7.7 11.8.1.1.3.1.4.2l2.1 1c.3.1.6.1.9-.1l2.1-2.1c.1-.1.3-.1.4-.1.6 0 1.2-.1 1.8-.2.3 0 .5-.3.5-.6v-1.5c0-.3-.3-.5-.6-.5-.1 0-.2 0-.3 0-4.4-.9-7.6-4.7-7.6-9.1 0-5.5 4.5-10 10-10s10 4.5 10 10c0 4.4-3.2 8.2-7.6 9.1-.1 0-.2 0-.3 0-.3 0-.5.3-.5.6v1.5c0 .3.3.5.6.5.1 0 .2 0 .3-.1l2.1-2.1c.3-.3.6-.3.9-.1l2.1 1c.1 0 .3.1.4.1 4.6-2.1 7.7-6.6 7.7-11.8 0-7.2-5.8-13-13-13z"
                                               fill="currentColor" />
                                       </svg>
                                   </div>

                                   <!-- Content -->
                                   <div>
                                       <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $service->{'title_' . $sign} }}
                                       </h2>
                                       <p class="text-gray-700">
                                           {{ $service->{'short_details_' . $sign} }}
                                       </p>
                                   </div>
                               </div>
                           </div>

                       </div>
                   </div>
               </section>
           @else
               <section class="bg-white py-16" id="service-{{ $service->id }}">
                   <div class="container mx-auto px-4">
                       <div class="flex flex-wrap">
                           <!-- Left Column - Services List -->

                           <div class="w-full md:w-1/2">
                               <div class="flex items-start">
                                   <!-- Icon -->
                                   <div class="mr-4">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                           viewBox="0 0 40 40" class="text-blue-500">
                                           <!-- Simplified SVG path (use original SVG paths) -->
                                           <path
                                               d="M20 5C12.8 5 7 10.8 7 18c0 5.2 3.1 9.7 7.7 11.8.1.1.3.1.4.2l2.1 1c.3.1.6.1.9-.1l2.1-2.1c.1-.1.3-.1.4-.1.6 0 1.2-.1 1.8-.2.3 0 .5-.3.5-.6v-1.5c0-.3-.3-.5-.6-.5-.1 0-.2 0-.3 0-4.4-.9-7.6-4.7-7.6-9.1 0-5.5 4.5-10 10-10s10 4.5 10 10c0 4.4-3.2 8.2-7.6 9.1-.1 0-.2 0-.3 0-.3 0-.5.3-.5.6v1.5c0 .3.3.5.6.5.1 0 .2 0 .3-.1l2.1-2.1c.3-.3.6-.3.9-.1l2.1 1c.1 0 .3.1.4.1 4.6-2.1 7.7-6.6 7.7-11.8 0-7.2-5.8-13-13-13z"
                                               fill="currentColor" />
                                       </svg>
                                   </div>

                                   <!-- Content -->
                                   <div>
                                       <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $service->{'title_' . $sign} }}
                                       </h2>
                                       <p class="text-gray-700">
                                           {{ $service->{'short_details_' . $sign} }}
                                       </p>
                                   </div>
                               </div>
                           </div>

                           <!-- Right Column - Info Box -->
                           <div class="w-full md:w-1/2 mb-8 md:mb-0">
                               <div class="bg-gray-50 p-6 rounded-lg">
                                   <h6 class="text-sm font-semibold text-gray-700 mb-4">{{ __('Popular scheduled') }}
                                       {{ $service->{'title_' . $sign} }}
                                   </h6>

                                   <ul class="space-y-3">
                                       @foreach ($service->childs as $serv)
                                           <li>
                                               <a href="{{ route('single-service.index', ['slug' => $serv->{'slug_' . $sign}]) }}"
                                                   class="flex items-center text-gray-700 hover:text-blue-500">
                                                   <i class="fas fa-chevron-right text-xs mr-3"></i>
                                                   <span> {{ $serv->{'title_' . $sign} }}</span>
                                               </a>
                                           </li>
                                       @endforeach


                                   </ul>
                               </div>
                           </div>
                       </div>
                   </div>
               </section>
           @endif
       @endforeach
   @stop
