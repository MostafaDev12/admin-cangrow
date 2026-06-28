  @extends('layouts.front')

 @section('title')

     {{ $gs->{'title_' . $sign} }}

 @stop

 @section('gsearch')
     <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
 @stop


 @section('content')

    <!-- hero section -->
    <section class="relative min-h-screen overflow-hidden">
        <!-- Background Video -->
        <div class="absolute inset-0 z-0">
            <video class="w-full h-full object-cover" autoplay muted playsinline loop
                src="{{str_replace(' ', '%20', $gs->home_video)}}"></video>
            <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        </div>

        <!-- Content Container -->
        <div class="relative z-10 container mx-auto px-4 py-20 flex items-center min-h-screen">
            <div class="w-full text-center">
                <!-- Heading -->
                <div class="mb-8">
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-4">{{ __("Glamour, Gags, and Great Teeth – That’s Innova Style") }}</h1>
                    {{-- <h4 class="text-xl md:text-2xl text-white">{{ __('Accepting New Patients') }}</h4> --}}
                </div>

                <!-- Button -->
                <div class="mb-8">
                    <a href="https://surveyheart.com/form/659f1393fe62f1133c8debfd" 
                        class="inline-block roounded-full hover:bg-transparent hover:border border-blue-600 bg-blue-600 hover:border-blue-600 border-4 text-white font-medium py-2 px-6 rounded transition duration-300">
                        {{ __('Book A Virtual Consultation') }}
                    </a>
                </div>

                <!-- Link -->
                {{-- <div>
                    <!--<p class="text-white">-->
                    <!--    <a href="/new-patients-info/" class="hover:underline">New Patients Information &gt;</a>-->
                    <!--</p>-->
                </div> --}}
            </div>
        </div>
    </section>
    <!-- end hero section -->
    <!-- start Card -->
<!--    <section class="px-6 py-20">-->
<!--        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4">-->

<!--         {{--   <!-- Invisalign Card -->-->
<!--            <div onclick="window.location='/orthodontics/invisalign/'"-->
<!--                class="cursor-pointer p-6 shadow-lg rounded-lg hover:shadow-2xl transition">-->
<!--                <div id="deals"></div>-->
<!--                <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/icon-clear-aligners.svg"-->
<!--                    alt="icon-clear-aligners" class="w-20 h-20 mx-auto mb-4">-->
<!--                <h3 class="text-xl font-bold text-center mb-2">All-In Invisalign</h3>-->
<!--                <h6 class="text-center text-gray-600 mb-4">Because you want your smile to stand out, not your teeth.-->
<!--                </h6>-->
<!--                <div class="text-center mb-4">-->
<!--                    <a href="/invisalign/"-->
<!--                        class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">-->
<!--                        Save on Invisalign →-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="flex justify-center space-x-4">-->
<!--                    <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/Invisalign-Provider-Logo-RGB_x2.png"-->
<!--                        alt="Invisalign Provider Logo" class="h-12">-->
<!--                    <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/logo-itero_x2.png" alt="iTero Logo"-->
<!--                        class="h-16">-->
<!--                    <img src="https://ladentalclinic.com/wp-content/uploads/2021/07/AdvantageProgIcons_CMYK_Diamond-tag-top-624x1024.png"-->
<!--                        alt="Advantage Diamond Tag" class="h-16">-->
<!--                </div>-->
<!--            </div>-->

            <!-- Dental Implants Card -->
<!--             <div onclick="window.location='/restorative-dentistry/dental-implants/'"-->
<!--                class="cursor-pointer p-6 shadow-lg rounded-lg hover:shadow-2xl transition">-->
<!--                <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/icon-teeth.svg" alt="icon-teeth"-->
<!--                    class="w-20 h-20 mx-auto mb-4">-->
<!--                <h3 class="text-xl font-bold text-center mb-2">Dental Implants</h3>-->
<!--                <h6 class="text-center text-gray-600 mb-4">For one tooth. Or a full smile. Go from missing teeth to-->
<!--                    smiling proudly.</h6>-->
<!--                <div class="text-center mb-4">-->
<!--                    <a href="/restorative-dentistry/dental-implants/"-->
<!--                        class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">-->
<!--                        Save on Dental Implants →-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="flex justify-center">-->
<!--                    <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/logo-hybridge_x2.png"-->
<!--                        alt="Hybridge Logo" class="h-12">-->
<!--                </div>-->
<!--            </div> --}}-->
<!-- @foreach ($timelines as $timeline)-->
            <!-- Veneers Card -->
<!--            <div onclick="window.location='/cosmetic-dentistry/veneers/'"-->
<!--                class="cursor-pointer p-6 shadow-lg rounded-lg hover:shadow-2xl transition">-->
<!--                <img src="{{ $timeline->photo_url }}"-->
<!--                    alt="icon-placed-veneers" class="w-20 h-20 mx-auto mb-4">-->
<!--                <h3 class="text-xl font-bold text-center mb-2">{{ $timeline->{'title_' . $sign} ?? '' }}</h3>-->
<!--                <h6 class="text-center text-gray-600 mb-4">{{ $timeline->{'details_' . $sign} ?? '' }}</h6>-->
<!--               @if($timeline->year)-->
<!--                <div class="text-center mb-4">-->
<!--                    <a href="{{ $timeline->year }}"-->
<!--                        class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">-->
<!--                         {{ __('Save on') }} {{ $timeline->{'title_' . $sign} ?? '' }} →-->
<!--                    </a>-->
<!--                </div>-->
<!--               @endif-->
                
<!--            </div>-->
<!--@endforeach-->


<!--        </div>-->
<!--    </section>-->
    <!-- end Card -->
    <!--<section class="px-4 py-12">-->
    <!--    <div class="max-w-7xl mx-auto overflow-hidden">-->
    <!--         Heading -->
    <!--        <div class="text-center mb-12">-->
    <!--            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">-->
    <!--                {{ __("When you're happy and you know it, your smile will surely show it") }}-->
    <!--            </h2>-->
    <!--        </div>-->

    <!--         Image Carousel -->
    <!--        <div class="mb-12">-->
    <!--             Swiper Container -->
    <!--            <div class="swiper-container">-->
    <!--                <div class="swiper-wrapper">-->

    <!--                    @foreach ($certificates as $image)-->
                            
    <!--                     Slide 1 -->
    <!--                    <div class="swiper-slide">-->
    <!--                        <figure class="p-2">-->
    <!--                            <img class="w-full h-auto rounded-lg"-->
    <!--                                src="{{ $image->photo }}"-->
    <!--                                alt="kimberly-smile" width="280" height="280">-->
    <!--                        </figure>-->
    <!--                    </div>-->

    <!--                    @endforeach-->
                         
 
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--         Button -->
    <!--        {{-- <div class="text-center mb-12">-->
    <!--            <a href="https://ladentalclinic.com/before-afters/" target="_blank"-->
    <!--                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded transition duration-300">-->
    <!--                Visit Our Smile Gallery &gt;-->
    <!--            </a>-->
    <!--        </div> --}}-->

    <!--         Reviews Section -->
    <!--        {{-- <section class="bg-gray-50 rounded-lg p-6 mb-12">-->
    <!--            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">-->
    <!--                 Google Review -->
    <!--                <div class="text-center">-->
    <!--                    <div class="mb-4">-->
    <!--                        <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/google-4.8-stars-89x54_x2.png"-->
    <!--                            alt="Google 4.8 stars" class="mx-auto h-12 w-auto" width="178" height="108">-->
    <!--                    </div>-->
    <!--                    <h3 class="text-lg font-medium text-gray-900">4.8/5 with 200+ reviews</h3>-->
    <!--                </div>-->

    <!--                 Yelp Review -->
    <!--                <div class="text-center">-->
    <!--                    <div class="mb-4">-->
    <!--                        <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/4-star-review-yelp-85x54_2x.png"-->
    <!--                            alt="Yelp 4 stars" class="mx-auto h-12 w-auto" width="172" height="108">-->
    <!--                    </div>-->
    <!--                    <h3 class="text-lg font-medium text-gray-900">4/5 with 148+ reviews</h3>-->
    <!--                </div>-->

    <!--                 Zocdoc Review -->
    <!--                <div class="text-center">-->
    <!--                    <div class="mb-4">-->
    <!--                        <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/zocdoc-5-stars-89x54_x2.png"-->
    <!--                            alt="Zocdoc 5 stars" class="mx-auto h-12 w-auto" width="179" height="108">-->
    <!--                    </div>-->
    <!--                    <h3 class="text-lg font-medium text-gray-900">5/5 with 185+ reviews</h3>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </section> --}}-->
    <!--    </div>-->
    <!--</section>-->


    <!--<div class="px-4 py-12 max-w-7xl mx-auto overflow-hidden">-->
    <!--    <div class="text-center">-->
    <!--        <h2 class="text-3xl font-bold">{{ __('Your Friendly Dental Clinic') }}</h2>-->
    <!--        <h4 class="text-xl text-gray-600">{{ __('Experienced And Personable Dental Service') }}</h4>-->
    <!--    </div>-->

    <!--    <section class="grid grid-cols-1 md:grid-cols-4 gap-8 items-start">-->
    <!--        <div class="text-center space-y-4">-->
    <!--            <img src="{{ $ps->portfolio_photo }}" alt="Dr"-->
    <!--                class="mx-auto rounded-lg shadow-md">-->
    <!--            {{-- <p class="text-lg font-medium">{{ __('Dr. Arezoo Nasiry') }}</p> --}}-->
    <!--        </div>-->

    <!--        <div class="text-center space-y-4">-->
    <!--            <img src="{{ $ps->about_photo }}" alt="Dr"-->
    <!--                class="mx-auto rounded-lg shadow-md">-->
    <!--            {{-- <p class="text-lg font-medium">{{ __('Dr. Azy Nasiry') }}</p> --}}-->
    <!--        </div>-->

    <!--        <div class="md:col-span-2 space-y-4">-->
    <!--            <p class="text-gray-700">-->
    <!--                    {!! $ps->{'about_details_' . $sign}  ?? '' !!}-->
    <!--            </p>-->
    <!--            <p class="text-gray-700">-->
    <!--                {!! $ps->{'portfolio_details_' . $sign}  ?? '' !!} -->
    <!--            </p>-->
    <!--        </div>-->
    <!--    </section>-->

    <!--    <section class="grid grid-cols-1 md:grid-cols-4 gap-8 items-start mt-12">-->
          
    <!--    @foreach ($features as $k => $feature)-->
    <!--        <div class="space-y-4">-->
    <!--            <hr class="border-gray-300">-->
    <!--            <h4 class="text-lg font-semibold">{{ $feature->{'title_' . $sign} ?? '' }} </h4>-->
    <!--            <p class="text-gray-600">-->
    <!--                {{ $feature->{'details_' . $sign} ?? '' }}-->
    <!--            </p>-->
    <!--        </div>-->
    <!--     @endforeach-->
             
    <!--    </section>-->
 
    <!--</div>-->

 <!--<section class="bg-white py-12 px-4 max-w-7xl mx-auto overflow-hidden">-->
 <!--       <div class="text-center mb-12">-->
 <!--           <h2 class="text-3xl font-bold mb-4">{{ __('Service Is Our #1 Priority.') }}</h2>-->
 <!--           <p class="text-gray-600 max-w-2xl mx-auto">-->
 <!--               {{ __('We want to ensure that your visit to the dentist is as pleasant as possible. Innova Dental uses the most advanced and proven technology to help you maintain that beautiful smile and to ensure that your next visit is an enjoyable one!') }}-->
 <!--           </p>-->
 <!--       </div>-->

 <!--       <div class="swiper-container">-->
 <!--           <div class="swiper-wrapper">-->
 <!--               @foreach ($parentservices as $k => $home_service)-->
 <!--                   <div class="swiper-slide text-center rounded shadow overflow-hidden p-4">-->
 <!--                       <a href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}">-->
 <!--                           <img src="{{ $home_service->photo_url }}"-->
 <!--                               alt="General Dentistry" class="mx-auto mb-4 w-50 h-30 object-contain">-->
 <!--                       </a>-->
 <!--                       <h4 class="text-xl font-semibold py-2">-->
 <!--                           <a href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}" class="hover:text-blue-500">{{ $home_service->{'title_' . $sign} }}</a>-->
 <!--                       </h4>-->
 <!--                       <p class="text-gray-600">-->
 <!--                           <a href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}">{{ $home_service->{'short_details_' . $sign} }}</a>-->
 <!--                       </p>-->
 <!--                   </div>-->
 <!--               @endforeach-->
 <!--           </div>-->
 <!--           <div class="swiper-pagination"></div>-->
 <!--           <div class="swiper-button-next"></div>-->
 <!--           <div class="swiper-button-prev"></div>-->
 <!--       </div>-->
 <!--   </section>-->
   <!-- <section class="bg-white py-12 px-4 max-w-7xl mx-auto overflow-hidden">-->
   <!--     <div class="text-center mb-12">-->
   <!--         <h2 class="text-3xl font-bold mb-4">{{ __('Service Is Our #1 Priority.') }}</h2>-->
   <!--         <p class="text-gray-600 max-w-2xl mx-auto">-->
   <!--             {{ __('We want to ensure that your visit to the dentist is as pleasant as possible. Innova Dental uses the most advanced and proven technology to help you maintain that beautiful smile and to ensure that your next visit is an enjoyable one!') }}-->
   <!--         </p>-->
   <!--     </div>-->
   <!--     <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">-->
            <!-- General Dentistry -->
   <!--       {{-- https://ladentalclinic.com/wp-content/uploads/2018/12/icon-general-dentistry-e1553197622402.png --}}-->
   <!--        @foreach ($parentservices as $k => $home_service)-->
   <!--         <div class="text-center rounded shadow overflow-hidden">-->
   <!--             <a href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}">-->
   <!--                 <img src="{{ $home_service->photo_url }}"-->
   <!--                     alt="General Dentistry" class="mx-auto mb-4 w-50 h-30 object-contain">-->
   <!--             </a>-->
   <!--             <h4 class="text-xl font-semibold py-2">-->
   <!--                 <a href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}" class="hover:text-blue-500">{{ $home_service->{'title_' . $sign} }}</a>-->
   <!--             </h4>-->
   <!--             <p class="text-gray-600">-->
   <!--                 <a href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}">{{ $home_service->{'short_details_' . $sign} }}</a>-->
   <!--             </p>-->
   <!--         </div>-->
   <!--@endforeach-->
            


   <!--     </div> -->
   <!-- </section>-->
{{-- 
   <!--<section class="px-4 py-8 bg-white">-->
   <!--     <div class="max-w-7xl mx-auto">-->
   <!--         <div class="w-full">-->
   <!--             <div class="space-y-8">-->
   <!--                 <div>-->
   <!--                     <h2 class="text-3xl font-bold text-center">Conveniently Located In Heart Of Koreatown, LA</h2>-->
   <!--                 </div>-->
   <!--                 <section class="grid grid-cols-1 md:grid-cols-2 gap-8">-->
   <!--                     <div class="space-y-4">-->
   <!--                         <div class="relative  rounded-lg shadow-md w-3xs overflow-hidden">-->
   <!--                             <div class="aspect-3/2 object-cover w-full h-full">-->
   <!--                                 <iframe class="elementor-video aspect-3/2 object-cover" frameborder="0"-->
   <!--                                     allowfullscreen=""-->
   <!--                                     allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"-->
   <!--                                     referrerpolicy="strict-origin-when-cross-origin"-->
   <!--                                     title="New Downtown Los Angeles Office Tour – Visit Us! | Innova Dental"-->
   <!--                                     width="640" height="360"-->
   <!--                                     src="https://www.youtube.com/embed/_6L8JMgyVLI?controls=1&amp;rel=0&amp;playsinline=0&amp;cc_load_policy=0&amp;autoplay=0&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fladentalclinic.com&amp;widgetid=1&amp;forigin=https%3A%2F%2Fladentalclinic.com%2F&amp;aoriginsup=1&amp;vf=2"-->
   <!--                                     id="widget2" data-gtm-yt-inspected-18="true"></iframe>-->
   <!--                             </div>-->
   <!--                         </div>-->
   <!--                         <p class="text-lg font-semibold text-center">Video walkthrough of the Innova Dental with-->
   <!--                             Dr. Arezoo Nasiry</p>-->
   <!--                     </div>-->
   <!--                     <div class="space-y-4">-->
   <!--                         <p class="text-base text-gray-700">-->
   <!--                             Innova Dental is located in the heart of Koreatown, part of central Los Angeles. We-->
   <!--                             are easily accessible by both transit as well as by car. Street parking is available-->
   <!--                             directly outside of the clinic. We also have underground parking available in the-->
   <!--                             building. Please note that if you are undergoing a dental procedure that requires-->
   <!--                             general anesthetic, we ask that you arrange a ride or take public transit.-->
   <!--                         </p>-->
   <!--                         <p class="text-base font-bold text-gray-800">We also validate parking!</p>-->
   <!--                     </div>-->
   <!--                 </section>-->
   <!--             </div>-->
   <!--         </div>-->
   <!--     </div>-->
   <!-- </section>-->
   <!-- <section class="relative bg-white">-->
   <!--     <div-->
   <!--         class="py-20 flex flex-col w-full h-full justify-center items-center bg-[url(https://ladentalclinic.com/wp-content/uploads/2017/08/bg-famliy-dentistry.png)] bg-cover bg-center">-->
            <!-- <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/hero-bg.jpg" alt
   <!--             class="bg-[url(https://ladentalclinic.com/wp-content/uploads/2021/10/hero-bg.jpg)] bg-cover bg-center h-96 rounded-lg shadow-lg relative overflow-hidden"> -->-->
            <!-- Left Column (66% width) -->
   <!--         <div class="flex flex-col md:flex-row items-center px-4">-->
   <!--             <div class="">-->
   <!--                 <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">-->
   <!--                     Find Your Perfect Smile!-->
   <!--                 </h2>-->
   <!--                 <p class="text-lg text-gray-700 mb-6">-->
   <!--                     Click on the-->
   <!--                     <a href="https://scheduling.simplifeye.co/#key=71wwAXx1P1jjH9GtWTNfXTV5wOta7mG&amp;gaID=null"-->
   <!--                         target="_blank" rel="noopener"-->
   <!--                         class="font-bold text-blue-600 hover:text-blue-800 transition-colors">-->
   <!--                         Book My Appointment-->
   <!--                     </a>-->
   <!--                     button or call us at-->
   <!--                     <a href="tel:2133859710" class="font-bold text-blue-600 hover:text-blue-800 transition-colors">-->
   <!--                         213.385.9710-->
   <!--                     </a>-->
   <!--                     to book your appointment! If you have any questions about your initial appointment, call us-->
   <!--                     or fill in the form below and we'll be sure to help you as soon as possible. We are always-->
   <!--                     happy to answer your dental-related questions!-->
   <!--                 </p>-->

   <!--                 <div class="mt-8">-->
   <!--                     <a href="https://mychart.myoryx.com/online-schedule/index.html?realm=ladental&amp;univers=com"-->
   <!--                         target="_blank" rel="noopener"-->
   <!--                         class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition-colors duration-300">-->
   <!--                         Book My Appointment-->
   <!--                     </a>-->
   <!--                 </div>-->
   <!--             </div>-->
   <!--         </div>-->
   <!--     </div>-->
   <!-- </section>-->
    
    --}}
    <!-- Newsletter Section -->
    <!--<section id="newsletter" class="bg-blue-600  py-20 px-4">-->
    <!--    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">-->
    <!--        <h3 class="text-5xl font-extrabold capitalize  text-white tracking-tight leading-tight drop-shadow-lg">-->
    <!--            {{ __('The Latest Dental Deals and Tips.') }}-->
    <!--        </h3>-->
            
    <!--                  <form class="flex gap-4 items-center w-full justify-between flex-col gap-4" action="{{ route('front.subscripe.submit') }}" name="appointment"-->
    <!--                                            id="subscribeform" aria-label="subscripe form" data-status="init"-->
    <!--                                            method="POST" autocomplete="off">-->
    <!--                                            {{ csrf_field() }}-->
    <!--                                            <div style="width: 81%;">-->
    <!--                                                    @include('includes.admin.form-both')-->
    <!--                                               </div>-->
    <!--            {{-- <div class="w-full">-->
    <!--                <label class="block text-sm font-medium text-white mb-1" for="input_1a">-->
    <!--                    First Name<span class="text-red-500">*</span>-->
    <!--                </label>-->
    <!--                <input type="text" name="input_1" placeholder="First Name"-->
    <!--                    class="medium w-full px-3 py-2 border outline-none border-gray-300 rounded-md shadow-sm">-->
    <!--            </div> --}}-->
    <!--            <div class="w-full">-->
    <!--                <label class="block text-sm font-medium text-white mb-1" for="input_2">-->
    <!--                    {{ __('Email') }}<span class="text-red-500">*</span>-->
    <!--                </label> -->
    <!--                <input type="email" placeholder="Email" name="email"-->
    <!--                    class="medium w-full px-3 py-2 border outline-none border-gray-300 rounded-md shadow-sm">-->
    <!--            </div>-->
    <!--            <button type="submit"-->
    <!--                class="w-full text-blue-600  hover:bg-gray-200 bg-white font-bold py-2 px-3 rounded">-->
    <!--                {{ __("I'm in!") }}-->
    <!--            </button>-->
    <!--        </form>-->
    <!--    </div>-->
    <!--</section>-->

  
    <!-- Services & Hours Section -->
 <!--   <section class="bg-white py-12 px-4 md:px-0">-->
 <!--       <div class="container mx-auto flex flex-col md:flex-row gap-8">-->
            <!-- Services Column -->
 <!--           <div class="w-full md:w-1/2">-->
 <!--               <div class="prose">-->
 <!--                   <h4 class="text-lg font-bold mb-4"> {{ __("Our Services") }}</h4>-->
 <!--               </div>-->
 <!--               <div class="flex flex-col md:flex-row gap-8 mt-4">-->
 <!--                   <div class="w-full md:w-1/2">-->
 <!--                       <ul class="space-y-2">-->
 <!--@foreach ($parentservices->take(4) as $k => $home_service)-->
 <!--                           <li><a href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}"-->
 <!--                                   class="text-blue-600 hover:underline">{{ $home_service->{'title_' . $sign} }}</a>-->
                          

 <!--               @endforeach                -->
 <!--                       </ul>-->
 <!--                   </div>-->
 <!--                   <div class="w-full md:w-1/2">-->
 <!--                       <ul class="space-y-2">-->
 <!--                      @foreach ($home_services->skip(4)->take(3) as $k => $home_service)-->
 <!--                           <li><a href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}"-->
 <!--                                   class="text-blue-600 hover:underline">{{ $home_service->{'title_' . $sign} }}</a>-->
                          

 <!--               @endforeach-->
 <!--                       </ul>-->
 <!--                   </div>-->
 <!--               </div>-->
 <!--           </div>-->

            <!-- Hours Column -->
 <!--           <div class="w-full md:w-1/2">-->
 <!--               <div class="prose">-->
 <!--                   <h4 class="text-lg font-bold mb-4"> {{ __("Hours") }}</h4>-->
 <!--               </div>-->
 <!--               <div class="flex flex-col md:flex-row gap-8 mt-4">-->
 <!--                   <div class="w-full md:w-1/2">-->
 <!--                       <ul class="space-y-2">-->
 <!--                           <li><strong> {{ __("MON:") }}</strong> {{ __("9:00 AM – 6:00 PM") }} </li>-->
 <!--                           <li><strong> {{ __("TUE:") }}</strong> {{ __("9:00 AM – 6:00 PM") }} </li>-->
 <!--                           <li><strong> {{ __("WED:") }}</strong> {{ __("9:00 AM – 6:00 PM") }} </li>-->
 <!--                           <li><strong> {{ __("THU:") }}</strong> {{ __("9:00 AM – 6:00 PM") }} </li>-->
 <!--                       </ul>-->
 <!--                   </div>-->
 <!--                   <div class="w-full md:w-1/2">-->
 <!--                       <ul class="space-y-2">-->
 <!--                           <li><strong> {{ __("FRI:") }}</strong> {{ __("8:30 AM – 5:00 PM") }} </li>-->
 <!--                           <li><strong> {{ __("SAT:") }}</strong> {{ __("Closed") }} </li>-->
 <!--                           <li><strong> {{ __("SUN:") }}</strong> {{ __("Closed") }} </li>-->
 <!--                       </ul>-->
 <!--                   </div>-->
 <!--               </div>-->
 <!--           </div>-->
 <!--       </div>-->
 <!--   </section>-->
    <!-- Connect Section -->

 
 
     <!-- قسم حول العيادة -->
    <!--<section id="about" class="py-20 bg-gray-50">-->
    <!--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">-->
    <!--        <div class="text-center mb-16">-->
    <!--            <h2 class="text-4xl font-bold text-gray-900 mb-4">حول عيادة إنوفادنتال</h2>-->
    <!--            <div class="w-24 h-1 bg-yellow-500 mx-auto"></div>-->
    <!--        </div>-->
    <!--        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">-->
    <!--            <div>-->
    <!--                <img src="/dr-mohamed-atef-dental-clinic.png" alt="الدكتور محمد عاطف - المؤسس"-->
    <!--                    class="rounded-lg shadow-lg" />-->
    <!--            </div>-->
    <!--            <div>-->
    <!--                <p class="text-gray-700 mb-6 leading-relaxed">-->
    <!--                    تأسست عيادة إنوفادنتال في عام 2006 على يد الدكتور محمد عاطف، بناءً على رؤية استراتيجية: إعادة-->
    <!--                    تعريف العناية بالأسنان من خلال الجمع بين التميز الطبي والفخامة والراحة. مع فروع في أكثر المواقع-->
    <!--                    تميزًا بالقاهرة — هليوبوليس، القاهرة الجديدة، ومدينتي — أصبحت إنوفادنتال وجهة لمن يبحثون عن-->
    <!--                    خدمات أسنان عالمية المستوى في بيئة حصرية.-->
    <!--                </p>-->
    <!--                <p class="text-gray-700 mb-6 leading-relaxed">-->
    <!--                    ترتكز فلسفة الدكتور عاطف على الجودة التي لا تقبل المساومة. من تجميع فريق من المحترفين ذوي-->
    <!--                    المهارات العالية، إلى الاستثمار في أحدث تقنيات الأسنان واستخدام أفضل المواد، يتم تصميم كل تفصيلة-->
    <!--                    في إنوفادنتال لضمان الدقة والسلامة والنتائج المذهلة.-->
    <!--                </p>-->
    <!--                <p class="text-gray-700 mb-8 leading-relaxed">-->
    <!--                    بالإضافة إلى التميز السريري، تقدم إنوفادنتال تجربة كبار الشخصيات، حيث يتمتع المرضى بوسائل راحة-->
    <!--                    مميزة وبيئة هادئة وأنيقة. في عيادة إنوفادنتال، الفخامة تلتقي بالاحترافية — مما يخلق معيارًا-->
    <!--                    جديدًا في طب الأسنان الحديث.-->
    <!--                </p>-->
                    <!--<div class="grid grid-cols-3 gap-6">-->
                    <!--    <div class="text-center">-->
                    <!--        <i class="fa fa-map-marker-alt w-8 h-8 text-blue-900 mx-auto mb-2"></i>-->
                    <!--        <h4 class="font-semibold text-gray-900">هليوبوليس</h4>-->
                    <!--        <p class="text-sm text-gray-600">الفرع الرئيسي - هليوبوليس، القاهرة</p>-->
                    <!--    </div>-->
                    <!--    <div class="text-center">-->
                    <!--        <i class="fa fa-map-marker-alt w-8 h-8 text-blue-900 mx-auto mb-2"></i>-->
                    <!--        <h4 class="font-semibold text-gray-900">القاهرة الجديدة</h4>-->
                    <!--        <p class="text-sm text-gray-600">موقع مميز - القاهرة الجديدة</p>-->
                    <!--    </div>-->
                    <!--    <div class="text-center">-->
                    <!--        <i class="fa fa-map-marker-alt w-8 h-8 text-blue-900 mx-auto mb-2"></i>-->
                    <!--        <h4 class="font-semibold text-gray-900">مدينتي</h4>-->
                    <!--        <p class="text-sm text-gray-600">منشأة حديثة - مدينتي</p>-->
                    <!--    </div>-->
                    <!--</div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- قسم فريق العمل -->
    <!--<section id="team" class="py-20 bg-white">-->
    <!--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">-->
    <!--        <div class="text-center mb-16">-->
    <!--            <h2 class="text-4xl font-bold text-gray-900 mb-4">تعرف على فريقنا</h2>-->
    <!--            <p class="text-xl text-gray-600 max-w-3xl mx-auto">-->
    <!--                يجمع فريقنا من المتخصصين ذوي المهارات العالية بين سنوات من الخبرة والتخصص لتقديم رعاية أسنان-->
    <!--                استثنائية.-->
    <!--            </p>-->
    <!--            <div class="w-24 h-1 bg-yellow-500 mx-auto mt-6"></div>-->
    <!--        </div>-->
    <!--        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">-->
    <!--            <div class="group hover:shadow-xl transition-all duration-300 border-0 shadow-lg">-->
    <!--                <div class="relative overflow-hidden">-->
    <!--                    <img src="/placeholder-mb8nd.png" alt="الدكتور محمد عاطف"-->
    <!--                        class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300" />-->
    <!--                    <div-->
    <!--                        class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="p-6">-->
    <!--                    <h3 class="text-xl font-bold text-gray-900 mb-2">الدكتور محمد عاطف</h3>-->
    <!--                    <p class="text-blue-900 font-semibold mb-2">المؤسس والرئيس التنفيذي لإنوفادنتال</p>-->
    <!--                    <p class="text-gray-600 text-sm">متخصص في تجميل الأسنان والزراعة</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="group hover:shadow-xl transition-all duration-300 border-0 shadow-lg">-->
    <!--                <div class="relative overflow-hidden">-->
    <!--                    <img src="/male-dentist.png" alt="الدكتور محمد صلاح"-->
    <!--                        class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300" />-->
    <!--                    <div-->
    <!--                        class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="p-6">-->
    <!--                    <h3 class="text-xl font-bold text-gray-900 mb-2">الدكتور محمد صلاح</h3>-->
    <!--                    <p class="text-blue-900 font-semibold mb-2">متخصص</p>-->
    <!--                    <p class="text-gray-600 text-sm">متخصص في علاج الجذور وتجميل الأسنان</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="group hover:shadow-xl transition-all duration-300 border-0 shadow-lg">-->
    <!--                <div class="relative overflow-hidden">-->
    <!--                    <img src="/female-dentist-white-coat.png" alt="الدكتورة منة حسن"-->
    <!--                        class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300" />-->
    <!--                    <div-->
    <!--                        class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="p-6">-->
    <!--                    <h3 class="text-xl font-bold text-gray-900 mb-2">الدكتورة منة حسن</h3>-->
    <!--                    <p class="text-blue-900 font-semibold mb-2">متخصصة</p>-->
    <!--                    <p class="text-gray-600 text-sm">متخصصة في تقويم الأسنان وتجميل الأسنان</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="group hover:shadow-xl transition-all duration-300 border-0 shadow-lg">-->
    <!--                <div class="relative overflow-hidden">-->
    <!--                    <img src="/placeholder-m1byi.png" alt="الدكتورة منة سيد"-->
    <!--                        class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300" />-->
    <!--                    <div-->
    <!--                        class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="p-6">-->
    <!--                    <h3 class="text-xl font-bold text-gray-900 mb-2">الدكتورة منة سيد</h3>-->
    <!--                    <p class="text-blue-900 font-semibold mb-2">متخصصة</p>-->
    <!--                    <p class="text-gray-600 text-sm">متخصصة في البوتوكس والفيلر</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="group hover:shadow-xl transition-all duration-300 border-0 shadow-lg">-->
    <!--                <div class="relative overflow-hidden">-->
    <!--                    <img src="/professional-female-pediatric-dentist.png" alt="الدكتورة يارا محسن"-->
    <!--                        class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300" />-->
    <!--                    <div-->
    <!--                        class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="p-6">-->
    <!--                    <h3 class="text-xl font-bold text-gray-900 mb-2">الدكتورة يارا محسن</h3>-->
    <!--                    <p class="text-blue-900 font-semibold mb-2">متخصصة</p>-->
    <!--                    <p class="text-gray-600 text-sm">متخصصة في تقويم الأسنان وطب أسنان الأطفال</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="group hover:shadow-xl transition-all duration-300 border-0 shadow-lg">-->
    <!--                <div class="relative overflow-hidden">-->
    <!--                    <img src="/male-cosmetic-dentist.png" alt="الدكتور يوسف صديق"-->
    <!--                        class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-300" />-->
    <!--                    <div-->
    <!--                        class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="p-6">-->
    <!--                    <h3 class="text-xl font-bold text-gray-900 mb-2">الدكتور يوسف صديق</h3>-->
    <!--                    <p class="text-blue-900 font-semibold mb-2">طبيب تجميل أسنان</p>-->
    <!--                    <p class="text-gray-600 text-sm">طبيب تجميل أسنان</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- قسم آراء العملاء -->
    <!--<section id="testimonials" class="py-20 bg-gray-50">-->
    <!--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">-->
    <!--        <div class="text-center mb-16">-->
    <!--            <h2 class="text-4xl font-bold text-gray-900 mb-4">آراء العملاء</h2>-->
    <!--            <p class="text-xl text-gray-600">تجارب حقيقية من مرضانا الموقرين</p>-->
    <!--            <div class="w-24 h-1 bg-yellow-500 mx-auto mt-6"></div>-->
    <!--        </div>-->
    <!--        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">-->
    <!--            <div class="bg-white shadow-lg hover:shadow-xl transition-shadow duration-300">-->
    <!--                <div class="p-8">-->
    <!--                    <div class="flex mb-4">-->
    <!--                        <i class="fa fa-star w-5 h-5 text-yellow-500"></i>-->
    <!--                        <i class="fa fa-star w-5 h-5 text-yellow-500"></i>-->
    <!--                        <i class="fa fa-star w-5 h-5 text-yellow-500"></i>-->
    <!--                        <i class="fa fa-star w-5 h-5 text-yellow-500"></i>-->
    <!--                        <i class="fa fa-star w-5 h-5 text-yellow-500"></i>-->
    <!--                    </div>-->
    <!--                    <p class="text-gray-700 mb-6 italic">"خدمة ونتائج استثنائية! الدكتور عاطف غيّر ابتسامتي تمامًا.-->
    <!--                        الأجواء الفاخرة في العيادة جعلت التجربة مريحة وخالية من التوتر."</p>-->
    <!--                    <div class="border-t pt-4">-->
    <!--                        <h4 class="font-semibold text-gray-900">سارة أحمد</h4>-->
    <!--                        <p class="text-sm text-blue-900">تجميل الابتسامة</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="bg-white shadow-lg hover:shadow-xl transition-shadow duration-300">-->
    <!--                <div class="p-8">-->
    <!--                    <div class="flex mb-4">-->
    <!--                        <i class="fa fa-star w-5 h-5 text-yellow-500"></i>-->
    <!--                        <i class="fa fa-star w-5 h-5 text-yellow-500"></i>-->
    <!--                        <i class="fa fa-star w-5 h-5 text-yellow-500"></i>-->
    <!--                        <i class="fa fa-star w-5 h-5 text-yellow-500"></i>-->
    <!--                        <i class="fa fa-star w-5 h-5 text-yellow-500"></i>-->
    <!--                    </div>-->
    <!--                    <p class="text-gray-700 mb-6 italic">"فريق محترف، معدات متطورة، ونتائج مذهلة. زراعة الأسنان تبدو-->
    <!--                        وتشعر وكأنها طبيعية تمامًا. أوصي به بشدة!"</p>-->
    <!--                    <div class="border-t pt-4">-->
    <!--                        <h4 class="font-semibold text-gray-900">عمر حسن</h4>-->
    <!--                        <p class="text-sm text-blue-900">زراعة الأسنان</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="bg-white shadow-lg hover:shadow-xl transition-shadow duration-300">-->
    <!--                <div class="p-8">-->
    <!--                    <div class="flex mb-4">-->
    <!--                        <i class="fa fa-star w-5 h-5 text-yellow-500"></i>-->
    <!--                        <i class="fa fa-star w-5 h-5 text-yellow-500"></i>-->
    <!--                        <i class="fa fa-star w-5 h-5 text-yellow-500"></i>-->
    <!--                        <i class="fa fa-star w-5 h-5 text-yellow-500"></i>-->
    <!--                        <i class="fa fa-star w-5 h-5 text-yellow-500"></i>-->
    <!--                    </div>-->
    <!--                    <p class="text-gray-700 mb-6 italic">"علاج تقويم الأسنان مع الدكتورة منة حسن فاق توقعاتي.-->
    <!--                        العناية المميزة والاهتمام بالتفاصيل في إنوفادنتال لا مثيل له في القاهرة."</p>-->
    <!--                    <div class="border-t pt-4">-->
    <!--                        <h4 class="font-semibold text-gray-900">ليلى محمد</h4>-->
    <!--                        <p class="text-sm text-blue-900">تقويم الأسنان</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

  <!-- About Section -->
  <section id="about" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">{{ __('About Innova Dental Clinic') }}</h2>
        <div class="w-24 h-1 bg-yellow-500 mx-auto"></div>
      </div>

        <div>
          <p class="text-gray-700 mb-6 leading-relaxed">
            {{ __('Founded in 2006 by Dr. Mohamed Atef, Innova Dental Clinic was built on a strategic vision: to redefine dental care by combining medical excellence with luxury and comfort. With branches in Cairo’s most prestigious locations — Heliopolis, New Cairo, and Madinaty — Innova has become a destination for those seeking world-class dental services in an exclusive setting.') }}
          </p>
          <p class="text-gray-700 mb-6 leading-relaxed">
            {{ __('Dr. Atef’s philosophy centers on uncompromising quality. From assembling a team of highly skilled professionals, to investing in the latest dental technologies and using only the finest materials, every detail at Innova is crafted to ensure precision, safety, and stunning results.') }}
          </p>
          <p class="text-gray-700 mb-8 leading-relaxed">
            {{ __('Beyond clinical excellence, Innova offers a VIP experience, where patients enjoy premium amenities and a serene, elegant environment. At Innova Dental Clinic, luxury meets professionalism — creating a new standard in modern dentistry.') }}
          </p>
          <!--<div class="grid grid-cols-3 gap-6">-->
          <!--  <div class="text-center">-->
          <!--    <i class="fa fa-map-marker-alt w-8 h-8 text-blue-900 mx-auto mb-2"></i>-->
          <!--    <h4 class="font-semibold text-gray-900">Heliopolis</h4>-->
          <!--    <p class="text-sm text-gray-600">Main Branch - Heliopolis, Cairo</p>-->
          <!--  </div>-->
          <!--  <div class="text-center">-->
          <!--    <i class="fa fa-map-marker-alt w-8 h-8 text-blue-900 mx-auto mb-2"></i>-->
          <!--    <h4 class="font-semibold text-gray-900">New Cairo</h4>-->
          <!--    <p class="text-sm text-gray-600">Premium Location - New Cairo</p>-->
          <!--  </div>-->
          <!--  <div class="text-center">-->
          <!--    <i class="fa fa-map-marker-alt w-8 h-8 text-blue-900 mx-auto mb-2"></i>-->
          <!--    <h4 class="font-semibold text-gray-900">Madinaty</h4>-->
          <!--    <p class="text-sm text-gray-600">Modern Facility - Madinaty</p>-->
          <!--  </div>-->
          <!--</div>-->
        </div>
      </div>
  </section>

  <!-- Team Section -->
  <section id="team" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">{{ __('Meet Our Staff') }}</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          {{ __('Our team of highly skilled specialists brings together years of experience and expertise to provide you with exceptional dental care.') }}
        </p>
        <div class="w-24 h-1 bg-yellow-500 mx-auto mt-6"></div>
      </div>
     
        
<div class="flex flex-col items-center justify-center">
  <div class="group relative overflow-hidden rounded-xl shadow-lg transition-all duration-300 hover:shadow-2xl">
    <img src="{{ asset('images/dr-mohamed-atef-dental-clinic.jpg') }}" alt="Dr. Mohamed Atef - Founder" class="h-80 w-full object-cover transition-transform duration-300 group-hover:scale-105" />
    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
    <div class="absolute inset-x-0 bottom-0 p-6 text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">
      <h3 class="mb-1 text-xl font-bold">{{ __('Dr. Mohamed Atef') }}</h3>
      <p class="font-semibold text-sky-300">{{ __('Founder and CEO of Innova Dental') }}</p>
    </div>
  </div>
  <div class="mt-4 text-center">
    <h3 class="mb-1 text-2xl font-bold text-gray-800">{{ __('Dr. Mohamed Atef') }}</h3>
    <p class="text-md font-semibold text-blue-600">{{ __('The Founder and CEO of Innova Dental') }}</p>
    <p class="text-sm text-gray-500">{{ __('Specialist in cosmetic and implant dentistry') }}</p>
  </div>
</div>
<div class="grid grid-cols-2 gap-8 md:grid-cols-2 my-10">
  <div class="group overflow-hidden rounded-xl bg-white shadow-lg transition-all duration-300 hover:shadow-2xl">
    <div class="relative overflow-hidden">
      <img src="{{ asset('images/dr-mohamed-salah.jpg') }}" alt="Dr Mohamed Salah" class="h-80 w-full object-cover transition-transform duration-300 group-hover:scale-105" />
    </div>
    <div class="p-6 text-center">
      <h3 class="mb-1 text-2xl font-bold text-gray-800">{{ __('Dr Mohamed Salah') }}</h3>
      <p class="mb-1 text-md font-semibold text-blue-600">{{ __('Specialist') }}</p>
      <p class="text-sm text-gray-500">{{ __('Specialist in RCT and restorative dentistry') }}</p>
    </div>
  </div>
  <div class="group overflow-hidden rounded-xl bg-white shadow-lg transition-all duration-300 hover:shadow-2xl">
    <div class="relative overflow-hidden">
      <img src="{{ asset('images/Dr-Menna -Hassan.jpg') }}" alt="Dr Menna Hassan" class="h-80 w-full object-cover transition-transform duration-300 group-hover:scale-105" />
    </div>
    <div class="p-6 text-center">
      <h3 class="mb-1 text-2xl font-bold text-gray-800">{{ __('Dr Menna Hassan') }}</h3>
      <p class="mb-1 text-md font-semibold text-blue-600">{{ __('Specialist') }}</p>
      <p class="text-sm text-gray-500">{{ __('Specialist in Orthodontics and cosmetic dentistry') }}</p>
    </div>
  </div>
  <div class="group overflow-hidden rounded-xl bg-white shadow-lg transition-all duration-300 hover:shadow-2xl">
    <div class="relative overflow-hidden">
      <img src="{{ asset('images/Dr-Menna Sayed.jpg') }}" alt="Dr Menna Sayed" class="h-80 w-full object-cover transition-transform duration-300 group-hover:scale-105" />
    </div>
    <div class="p-6 text-center">
      <h3 class="mb-1 text-2xl font-bold text-gray-800">{{ __('Dr Menna Sayed') }}</h3>
      <p class="mb-1 text-md font-semibold text-blue-600">{{ __('Specialist') }}</p>
      <p class="text-sm text-gray-500">{{ __('Specialist in Botox and Fillers') }}</p>
    </div>
  </div>
  <div class="group overflow-hidden rounded-xl bg-white shadow-lg transition-all duration-300 hover:shadow-2xl">
    <div class="relative overflow-hidden">
      <img src="{{ asset('images/Dr-Yara- Mohsen.jpg') }}" alt="Dr Yara Mohsen" class="h-80 w-full object-cover transition-transform duration-300 group-hover:scale-105" />
    </div>
    <div class="p-6 text-center">
      <h3 class="mb-1 text-2xl font-bold text-gray-800">{{ __('Dr Yara Mohsen') }}</h3>
      <p class="mb-1 text-md font-semibold text-blue-600">{{ __('Specialist') }}</p>
      <p class="text-sm text-gray-500">{{ __('Specialist in Orthodontics and pediatric dentistry') }}</p>
    </div>
  </div>
  <div class="group overflow-hidden rounded-xl bg-white shadow-lg transition-all duration-300 hover:shadow-2xl">
    <div class="relative overflow-hidden">
      <img src="{{ asset('images/Dr-Youssef-Seddik.jpg') }}" alt="Dr Youssef Seddik" class="h-80 w-full object-cover transition-transform duration-300 group-hover:scale-105" />
    </div>
    <div class="p-6 text-center">
      <h3 class="mb-1 text-2xl font-bold text-gray-800">{{ __('Dr Youssef Seddik') }}</h3>
      <p class="mb-1 text-md font-semibold text-blue-600">{{ __('Cosmetic Dentist') }}</p>
      <p class="text-sm text-gray-500">{{ __('Cosmetic Dentist') }}</p>
    </div>
  </div>
</div>    </div>
  </section>

  <!-- Testimonials Section -->
<section id="testimonials" class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">{{ __('Testimonials') }}</h2>
      <p class="text-xl text-gray-600">{{ __('Real experiences from our valued patients') }}</p>
      <div class="w-24 h-1 bg-yellow-500 mx-auto mt-6"></div>
    </div>

    <div class="swiper mySwiper">
      <div class="swiper-wrapper">

        <div class="swiper-slide bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
          <div class="p-8 h-full flex flex-col justify-between">
            <div class=" min-h-[250px]">
              <div class="flex mb-4">
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
              </div>
              <p class="text-gray-700 text-base mb-6 italic leading-relaxed">"{{ __('Excellent infection control and hygiene, very qualified staff and the best hospitality') }} ❤❤"</p>
            </div>
            <div class="border-t pt-4">
              <h4 class="font-semibold text-lg text-gray-900">{{ __('Nourhan Abdelhai') }}</h4>
            </div>
          </div>
        </div>

        <div class="swiper-slide bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
          <div class="p-8 h-full flex flex-col justify-between">
            <div class=" min-h-[250px]">
              <div class="flex mb-4">
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
              </div>
              <p class="text-gray-700 text-base mb-6 italic leading-relaxed">"عيادة ذات أداء طبي وإداري على أعلى مستوى بقيادة الدكتور محمد عاطف وفريقه. تشعر بالاحترافية والاحترام والالتزام والانضباط الممزوج باللياقة والذوق طوال تواجدك بالعيادة."</p>
            </div>
            <div class="border-t pt-4">
              <h4 class="font-semibold text-lg text-gray-900">Amr Aziz</h4>
            </div>
          </div>
        </div>

        <div class="swiper-slide bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
          <div class="p-8 h-full flex flex-col justify-between">
            <div class=" min-h-[250px]">
              <div class="flex mb-4">
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
              </div>
              <p class="text-gray-700 text-base mb-6 italic leading-relaxed">"Perfect clinic with excellent doctors and staff ❤❤❤"</p>
            </div> 
            <div class="border-t pt-4">
              <h4 class="font-semibold text-lg text-gray-900">Youmna Mohamed</h4>
            </div>
          </div>
        </div>

        <div class="swiper-slide bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
          <div class="p-8 h-full flex flex-col justify-between">
            <div class=" min-h-[250px]">
              <div class="flex mb-4">
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
              </div>
              <p class="text-gray-700 text-base mb-6 italic leading-relaxed">"دكتور محمد من أشطر الدكاترة بصراحة .. قبل أي حاجة بيعد يفهم المريض كل التفاصيل ويعرفه بيعمل إيه وليه وعشان إيه خطوة بخطوة .. ودي حاجة مريحة."</p>
            </div>
            <div class="border-t pt-4">
              <h4 class="font-semibold text-lg text-gray-900">Omar Ahmed</h4>
            </div>
          </div>
        </div>

        <div class="swiper-slide bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
          <div class="p-8 h-full flex flex-col justify-between">
            <div class=" min-h-[250px]">
              <div class="flex mb-4">
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
                <i class="fa-solid fa-star w-5 h-5 text-yellow-500"></i>
              </div>
              <p class="text-gray-700 text-base mb-6 italic leading-relaxed">"Another great testimonial to show on the carousel."</p>
            </div>
            <div class="border-t pt-4">
              <h4 class="font-semibold text-lg text-gray-900">Patient 5</h4>
            </div>
          </div>
        </div>

      </div>

      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });
</script> 
 
 @stop
