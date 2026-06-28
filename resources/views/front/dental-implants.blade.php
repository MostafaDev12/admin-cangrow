 
     @extends('layouts.front')

   @section('title')

       {{ __('dental implants') }} - {{ $gs->{'title_' . $sign} }}

   @stop

   @section('gsearch')
       <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
   @stop

   @section('css')
 
   @stop
   @section('content')

@php
    $phones = explode(',', $gs->phones);
    $emails = explode(',', $gs->emails);
    $addresses = json_decode($gs->{'addresses_' . $sign});

    $randomPhone = Arr::random($phones);
@endphp

 <section class="py-16 bg-gray-50 md:h-screen"
     style="background-image: url({{ asset('front/innova/assets/7.jpg') }});
    background-position: bottom center;
    background-size: cover;">
     <div class="container mx-auto px-4">
         <!-- Flex Container for Two Columns -->
         <div class="flex flex-wrap">
             <!-- Left Column (Text Content) -->
             <div class="w-full md:w-1/2 p-4">
                 <div class="mb-6">
                     <!-- Certification Badges -->
                     <p class="text-sm font-medium text-gray-600 mb-4">
                         {{ __('Hybridge Certified | 98% Success Rate | Lifetime Comfort Adjustments') }}
                     </p>

                     <!-- Main Heading -->
                     <h1 class="text-4xl font-bold text-gray-900 mb-4">
                         {{ __('1 Tooth or Full Dental Implants in Los Angeles, CA') }}
                     </h1>

                     <!-- Subheading -->
                     <h4 class="text-xl font-medium text-gray-700">
                         {{ __('For stability. For comfort. For the feeling of loving your smile again.') }}
                     </h4>
                 </div>
             </div>

             <!-- Right Column (Empty in Original) -->
             <div class="w-full md:w-1/2 p-4">
                 <!-- Add content here if needed -->
             </div>
         </div>
     </div>
 </section>
 <section class="py-16 bg-gray-50">
     <div class="container mx-auto px-4">
         <!-- Flex Container -->
         <div class="flex flex-wrap items-center">

             <!-- Left Column (Image) -->
             <div class="w-full md:w-1/2 p-4">
                 <div class="relative overflow-hidden rounded-lg shadow-lg">
                     <img src="{{ asset('front/innova/assets/6.webp') }}"
                         alt="Dr. Azy and Arezo" class="w-full h-auto" loading="lazy" decoding="async">
                 </div>
             </div>

             <!-- Right Column (Text Content) -->
             <div class="w-full md:w-1/2 p-4">
                 <div class="space-y-6">
                     <!-- Main Headline -->
                     <h3 class="text-3xl font-semibold text-gray-900">
                         {{ __('You’re not you without your smile.') }}
                     </h3>

                     <!-- Body Text -->
                     <p class="text-gray-700">
                         {{ __('And when you’re missing teeth, or struggling with loose dentures, it can feel like your smile isn’t yours anymore.') }}
                     </p>

                     <p class="text-gray-700">
                         {{ __('Your grin goes away, you can’t eat what you want – you even speak differently. It’s just not the same.') }}
                     </p>

                     <!-- Callout Heading -->
                     <h2 class="text-4xl font-bold text-gray-900">
                         {{ __('The answer?') }}
                         <strong class="text-blue-600">{{ __('Dental implants.') }}</strong>
                     </h2>

                     <!-- Subtext -->
                     <h6 class="text-xl text-gray-800 font-medium">
                         {{ __('Comfortable and natural-looking, they make your smile yours again, whether you need one or two teeth, or a whole new smile.') }}
                     </h6>

                     <!-- CTA Button -->
                     <a href="https://surveyheart.com/form/659f1393fe62f1133c8debfd"
                         class="inline-block px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-300">
                         {{ __('Schedule Consultation') }}
                     </a>
                 </div>
             </div>
         </div>
     </div>
 </section>

   
  
 <!-- Main Section -->
 <section class="py-16 px-6 md:px-12 max-w-7xl mx-auto">
     <div class="flex flex-col md:flex-row gap-12">

         <!-- Left Column: Features -->
         <div class="md:w-1/2">
             <h2 class="text-3xl md:text-4xl font-bold mb-10">{{ __('What makes Innova Dental the place to get dental implants in LA?') }}</h2>

             <!-- Feature 1: Experience -->
             <div class="flex items-start gap-4 mb-8">
                 <div class="text-blue-600 mt-1">
                     <i class="fas fa-history fa-lg"></i> <!-- Matches "since 2007" SVG -->
                 </div>
                 <div>
                     <h5 class="font-semibold text-xl mb-2">{{ __('Us and dental implants? We go way back.') }}</h5>
                     <p class="text-gray-600">{{ __('We’ve been placing implants since 2007 and have successfully restored hundreds of smiles.') }}</p>
                 </div>
             </div>

             <!-- Feature 2: Success Rate -->
             <div class="flex items-start gap-4 mb-8">
                 <div class="text-blue-600 mt-1">
                     <i class="fas fa-shield-alt fa-lg"></i> <!-- Matches "shield" SVG -->
                 </div>
                 <div>
                     <h5 class="font-semibold text-xl mb-2">{{ __('Nobody’s perfect. But our track record is pretty darn close.') }}</h5>
                     <p class="text-gray-600">{{ __('We take care to get things right the first time, and our 98% success rate is proof of that.') }}</p>
                 </div>
             </div>

             <!-- Feature 3: Certification -->
             <div class="flex items-start gap-4">
                 <div class="text-blue-600 mt-1">
                     <i class="fas fa-award fa-lg"></i> <!-- Matches "trophy" SVG -->
                 </div>
                 <div>
                     <h5 class="font-semibold text-xl mb-2">{{ __('We’ve earned our stripes. And Hybridge Certification too.') }}
                     </h5>
                     <p class="text-gray-600">{{ __('We’ve gone through strict training to prove that we’re among the nation’s top implant doctors.') }}</p>
                 </div>
             </div>
         </div>

         <!-- Right Column: Dentists -->
         <div class="md:w-1/2">
             <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">

                 <!-- Dentist 1 -->
                 <div class="text-center">
                     <img src="{{ asset('front/innova/assets/8.jpg') }}"
                         alt="Dr. Arezoo Nasiry" class="w-48 h-60 object-cover mx-auto rounded-lg shadow-md mb-4">
                     {{-- <figcaption class="text-lg font-medium">Dr. Arezoo Nasiry</figcaption> --}}
                 </div>

                 <!-- Dentist 2 -->
                 <div class="text-center">
                     <img src="{{ asset('front/innova/assets/9.jpg') }}"
                         alt="Dr. Azy Nasiry" class="w-48 h-60 object-cover mx-auto rounded-lg shadow-md mb-4">
                     {{-- <figcaption class="text-lg font-medium">Dr. Azy Nasiry</figcaption> --}}
                 </div>

             </div>
         </div>

     </div>
 </section>
 <!-- Full-Width Guarantee Section -->
 
 <section class="py-12 bg-gray-100">
     <div class="max-w-7xl mx-auto px-4">
         <h2 class="text-3xl font-bold mb-8 text-center">{{ __('Gallery of Images') }}</h2>

         <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($reviews as $gallery)
                 <!-- Image Card 1 -->
             <div
                 class="overflow-hidden rounded-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                 <img src="{{ $gallery->photo }}" alt="Image 1"
                     class="w-full h-auto object-cover transition-transform duration-500 hover:rotate-1">
             </div>

            @endforeach
             

         </div>
     </div>
 </section>
  @stop