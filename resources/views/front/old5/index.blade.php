 
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
                src="{{ $gs->home_video }}"></video>
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
                    <p class="text-white">
                        <a href="/new-patients-info/" class="hover:underline">New Patients Information &gt;</a>
                    </p>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- end hero section -->
    <!-- start Card -->
    <section class="px-6 py-20">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4">

         {{--   <!-- Invisalign Card -->
            <div onclick="window.location='/orthodontics/invisalign/'"
                class="cursor-pointer p-6 shadow-lg rounded-lg hover:shadow-2xl transition">
                <div id="deals"></div>
                <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/icon-clear-aligners.svg"
                    alt="icon-clear-aligners" class="w-20 h-20 mx-auto mb-4">
                <h3 class="text-xl font-bold text-center mb-2">All-In Invisalign</h3>
                <h6 class="text-center text-gray-600 mb-4">Because you want your smile to stand out, not your teeth.
                </h6>
                <div class="text-center mb-4">
                    <a href="/invisalign/"
                        class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                        Save on Invisalign →
                    </a>
                </div>
                <div class="flex justify-center space-x-4">
                    <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/Invisalign-Provider-Logo-RGB_x2.png"
                        alt="Invisalign Provider Logo" class="h-12">
                    <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/logo-itero_x2.png" alt="iTero Logo"
                        class="h-16">
                    <img src="https://ladentalclinic.com/wp-content/uploads/2021/07/AdvantageProgIcons_CMYK_Diamond-tag-top-624x1024.png"
                        alt="Advantage Diamond Tag" class="h-16">
                </div>
            </div>

            <!-- Dental Implants Card -->
             <div onclick="window.location='/restorative-dentistry/dental-implants/'"
                class="cursor-pointer p-6 shadow-lg rounded-lg hover:shadow-2xl transition">
                <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/icon-teeth.svg" alt="icon-teeth"
                    class="w-20 h-20 mx-auto mb-4">
                <h3 class="text-xl font-bold text-center mb-2">Dental Implants</h3>
                <h6 class="text-center text-gray-600 mb-4">For one tooth. Or a full smile. Go from missing teeth to
                    smiling proudly.</h6>
                <div class="text-center mb-4">
                    <a href="/restorative-dentistry/dental-implants/"
                        class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                        Save on Dental Implants →
                    </a>
                </div>
                <div class="flex justify-center">
                    <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/logo-hybridge_x2.png"
                        alt="Hybridge Logo" class="h-12">
                </div>
            </div> --}}
 @foreach ($timelines as $timeline)
            <!-- Veneers Card -->
            <div onclick="window.location='/cosmetic-dentistry/veneers/'"
                class="cursor-pointer p-6 shadow-lg rounded-lg hover:shadow-2xl transition">
                <img src="{{ $timeline->photo_url }}"
                    alt="icon-placed-veneers" class="w-20 h-20 mx-auto mb-4">
                <h3 class="text-xl font-bold text-center mb-2">{{ $timeline->{'title_' . $sign} ?? '' }}</h3>
                <h6 class="text-center text-gray-600 mb-4">{{ $timeline->{'details_' . $sign} ?? '' }}</h6>
               @if($timeline->year)
                <div class="text-center mb-4">
                    <a href="{{ $timeline->year }}"
                        class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                         {{ __('Save on') }} {{ $timeline->{'title_' . $sign} ?? '' }} →
                    </a>
                </div>
               @endif
                
            </div>
@endforeach


        </div>
    </section>
    <!-- end Card -->
    <section class="px-4 py-12">
        <div class="max-w-7xl mx-auto overflow-hidden">
            <!-- Heading -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    {{ __("When you're happy and you know it, your smile will surely show it") }}
                </h2>
            </div>

            <!-- Image Carousel -->
            <div class="mb-12">
                <!-- Swiper Container -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        @foreach ($certificates as $image)
                            
                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <figure class="p-2">
                                <img class="w-full h-auto rounded-lg"
                                    src="{{ $image->photo }}"
                                    alt="kimberly-smile" width="280" height="280">
                            </figure>
                        </div>

                        @endforeach
                         
 
                    </div>
                </div>
            </div>

            <!-- Button -->
            {{-- <div class="text-center mb-12">
                <a href="https://ladentalclinic.com/before-afters/" target="_blank"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded transition duration-300">
                    Visit Our Smile Gallery &gt;
                </a>
            </div> --}}

            <!-- Reviews Section -->
            {{-- <section class="bg-gray-50 rounded-lg p-6 mb-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Google Review -->
                    <div class="text-center">
                        <div class="mb-4">
                            <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/google-4.8-stars-89x54_x2.png"
                                alt="Google 4.8 stars" class="mx-auto h-12 w-auto" width="178" height="108">
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">4.8/5 with 200+ reviews</h3>
                    </div>

                    <!-- Yelp Review -->
                    <div class="text-center">
                        <div class="mb-4">
                            <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/4-star-review-yelp-85x54_2x.png"
                                alt="Yelp 4 stars" class="mx-auto h-12 w-auto" width="172" height="108">
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">4/5 with 148+ reviews</h3>
                    </div>

                    <!-- Zocdoc Review -->
                    <div class="text-center">
                        <div class="mb-4">
                            <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/zocdoc-5-stars-89x54_x2.png"
                                alt="Zocdoc 5 stars" class="mx-auto h-12 w-auto" width="179" height="108">
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">5/5 with 185+ reviews</h3>
                    </div>
                </div>
            </section> --}}
        </div>
    </section>


    <div class="px-4 py-12 max-w-7xl mx-auto overflow-hidden">
        <div class="text-center">
            <h2 class="text-3xl font-bold">{{ __('Your Friendly Dental Clinic') }}</h2>
            <h4 class="text-xl text-gray-600">{{ __('Experienced And Personable Dental Service') }}</h4>
        </div>

        <section class="grid grid-cols-1 md:grid-cols-4 gap-8 items-start">
            <div class="text-center space-y-4">
                <img src="{{ $ps->portfolio_photo }}" alt="Dr"
                    class="mx-auto rounded-lg shadow-md">
                {{-- <p class="text-lg font-medium">{{ __('Dr. Arezoo Nasiry') }}</p> --}}
            </div>

            <div class="text-center space-y-4">
                <img src="{{ $ps->about_photo }}" alt="Dr"
                    class="mx-auto rounded-lg shadow-md">
                {{-- <p class="text-lg font-medium">{{ __('Dr. Azy Nasiry') }}</p> --}}
            </div>

            <div class="md:col-span-2 space-y-4">
                <p class="text-gray-700">
                        {!! $ps->{'about_details_' . $sign}  ?? '' !!}
                </p>
                <p class="text-gray-700">
                    {!! $ps->{'portfolio_details_' . $sign}  ?? '' !!} 
                </p>
            </div>
        </section>

        <section class="grid grid-cols-1 md:grid-cols-4 gap-8 items-start mt-12">
          
        @foreach ($features as $k => $feature)
            <div class="space-y-4">
                <hr class="border-gray-300">
                <h4 class="text-lg font-semibold">{{ $feature->{'title_' . $sign} ?? '' }} </h4>
                <p class="text-gray-600">
                    {{ $feature->{'details_' . $sign} ?? '' }}
                </p>
            </div>
         @endforeach
             
        </section>
 
    </div>


    <section class="bg-white py-12 px-4 max-w-7xl mx-auto overflow-hidden">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">{{ __('Service Is Our #1 Priority.') }}</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                {{ __('We want to ensure that your visit to the dentist is as pleasant as possible. Innova Dental uses the most advanced and proven technology to help you maintain that beautiful smile and to ensure that your next visit is an enjoyable one!') }}
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            <!-- General Dentistry -->
          {{-- https://ladentalclinic.com/wp-content/uploads/2018/12/icon-general-dentistry-e1553197622402.png --}}
           @foreach ($home_services as $k => $home_service)
            <div class="text-center">
                <a href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}">
                    <img src="{{ $home_service->photo_url }}"
                        alt="General Dentistry" class="mx-auto mb-4 w-24 h-24 object-contain">
                </a>
                <h4 class="text-xl font-semibold mb-2">
                    <a href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}" class="hover:text-blue-500">{{ $home_service->{'title_' . $sign} }}</a>
                </h4>
                <p class="text-gray-600">
                    <a href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}">{{ $home_service->{'short_details_' . $sign} }}</a>
                </p>
            </div>
   @endforeach
            


        </div> 
    </section>
{{-- 
   <section class="px-4 py-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="w-full">
                <div class="space-y-8">
                    <div>
                        <h2 class="text-3xl font-bold text-center">Conveniently Located In Heart Of Koreatown, LA</h2>
                    </div>
                    <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-4">
                            <div class="relative  rounded-lg shadow-md w-3xs overflow-hidden">
                                <div class="aspect-3/2 object-cover w-full h-full">
                                    <iframe class="elementor-video aspect-3/2 object-cover" frameborder="0"
                                        allowfullscreen=""
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin"
                                        title="New Downtown Los Angeles Office Tour – Visit Us! | Innova Dental"
                                        width="640" height="360"
                                        src="https://www.youtube.com/embed/_6L8JMgyVLI?controls=1&amp;rel=0&amp;playsinline=0&amp;cc_load_policy=0&amp;autoplay=0&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fladentalclinic.com&amp;widgetid=1&amp;forigin=https%3A%2F%2Fladentalclinic.com%2F&amp;aoriginsup=1&amp;vf=2"
                                        id="widget2" data-gtm-yt-inspected-18="true"></iframe>
                                </div>
                            </div>
                            <p class="text-lg font-semibold text-center">Video walkthrough of the Innova Dental with
                                Dr. Arezoo Nasiry</p>
                        </div>
                        <div class="space-y-4">
                            <p class="text-base text-gray-700">
                                Innova Dental is located in the heart of Koreatown, part of central Los Angeles. We
                                are easily accessible by both transit as well as by car. Street parking is available
                                directly outside of the clinic. We also have underground parking available in the
                                building. Please note that if you are undergoing a dental procedure that requires
                                general anesthetic, we ask that you arrange a ride or take public transit.
                            </p>
                            <p class="text-base font-bold text-gray-800">We also validate parking!</p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <section class="relative bg-white">
        <div
            class="py-20 flex flex-col w-full h-full justify-center items-center bg-[url(https://ladentalclinic.com/wp-content/uploads/2017/08/bg-famliy-dentistry.png)] bg-cover bg-center">
            <!-- <img src="https://ladentalclinic.com/wp-content/uploads/2021/10/hero-bg.jpg" alt
                class="bg-[url(https://ladentalclinic.com/wp-content/uploads/2021/10/hero-bg.jpg)] bg-cover bg-center h-96 rounded-lg shadow-lg relative overflow-hidden"> -->
            <!-- Left Column (66% width) -->
            <div class="flex flex-col md:flex-row items-center px-4">
                <div class="">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Find Your Perfect Smile!
                    </h2>
                    <p class="text-lg text-gray-700 mb-6">
                        Click on the
                        <a href="https://scheduling.simplifeye.co/#key=71wwAXx1P1jjH9GtWTNfXTV5wOta7mG&amp;gaID=null"
                            target="_blank" rel="noopener"
                            class="font-bold text-blue-600 hover:text-blue-800 transition-colors">
                            Book My Appointment
                        </a>
                        button or call us at
                        <a href="tel:2133859710" class="font-bold text-blue-600 hover:text-blue-800 transition-colors">
                            213.385.9710
                        </a>
                        to book your appointment! If you have any questions about your initial appointment, call us
                        or fill in the form below and we'll be sure to help you as soon as possible. We are always
                        happy to answer your dental-related questions!
                    </p>

                    <div class="mt-8">
                        <a href="https://mychart.myoryx.com/online-schedule/index.html?realm=ladental&amp;univers=com"
                            target="_blank" rel="noopener"
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition-colors duration-300">
                            Book My Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    --}}
    <!-- Newsletter Section -->
    <section id="newsletter" class="bg-blue-600  py-20 px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <h3 class="text-5xl font-extrabold capitalize  text-white tracking-tight leading-tight drop-shadow-lg">
                {{ __('The Latest Dental Deals and Tips.') }}
            </h3>
            
                      <form class="flex gap-4 items-center w-full justify-between flex-col gap-4" action="{{ route('front.subscripe.submit') }}" name="appointment"
                                                id="subscribeform" aria-label="subscripe form" data-status="init"
                                                method="POST" autocomplete="off">
                                                {{ csrf_field() }}
                                                <div style="width: 81%;">
                                                        @include('includes.admin.form-both')
                                                   </div>
                {{-- <div class="w-full">
                    <label class="block text-sm font-medium text-white mb-1" for="input_1a">
                        First Name<span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="input_1" placeholder="First Name"
                        class="medium w-full px-3 py-2 border outline-none border-gray-300 rounded-md shadow-sm">
                </div> --}}
                <div class="w-full">
                    <label class="block text-sm font-medium text-white mb-1" for="input_2">
                        {{ __('Email') }}<span class="text-red-500">*</span>
                    </label>
                    <input type="email" placeholder="Email" name="email"
                        class="medium w-full px-3 py-2 border outline-none border-gray-300 rounded-md shadow-sm">
                </div>
                <button type="submit"
                    class="w-full text-blue-600  hover:bg-gray-200 bg-white font-bold py-2 px-3 rounded">
                    {{ __("I'm in!") }}
                </button>
            </form>
        </div>
    </section>

  
    <!-- Services & Hours Section -->
    <section class="bg-white py-12 px-4 md:px-0">
        <div class="container mx-auto flex flex-col md:flex-row gap-8">
            <!-- Services Column -->
            <div class="w-full md:w-1/2">
                <div class="prose">
                    <h4 class="text-lg font-bold mb-4"> {{ __("Our Services") }}</h4>
                </div>
                <div class="flex flex-col md:flex-row gap-8 mt-4">
                    <div class="w-full md:w-1/2">
                        <ul class="space-y-2">
 @foreach ($home_services->take(4) as $k => $home_service)
                            <li><a href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}"
                                    class="text-blue-600 hover:underline">{{ $home_service->{'title_' . $sign} }}</a>
                          

                @endforeach                
                        </ul>
                    </div>
                    <div class="w-full md:w-1/2">
                        <ul class="space-y-2">
                       @foreach ($home_services->skip(4)->take(3) as $k => $home_service)
                            <li><a href="{{ route('single-service.index', ['slug' => $home_service->{'slug_' . $sign}]) }}"
                                    class="text-blue-600 hover:underline">{{ $home_service->{'title_' . $sign} }}</a>
                          

                @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Hours Column -->
            <div class="w-full md:w-1/2">
                <div class="prose">
                    <h4 class="text-lg font-bold mb-4"> {{ __("Hours") }}</h4>
                </div>
                <div class="flex flex-col md:flex-row gap-8 mt-4">
                    <div class="w-full md:w-1/2">
                        <ul class="space-y-2">
                            <li><strong> {{ __("MON:") }}</strong> {{ __("9:00 AM – 6:00 PM") }} </li>
                            <li><strong> {{ __("TUE:") }}</strong> {{ __("9:00 AM – 6:00 PM") }} </li>
                            <li><strong> {{ __("WED:") }}</strong> {{ __("9:00 AM – 6:00 PM") }} </li>
                            <li><strong> {{ __("THU:") }}</strong> {{ __("9:00 AM – 6:00 PM") }} </li>
                        </ul>
                    </div>
                    <div class="w-full md:w-1/2">
                        <ul class="space-y-2">
                            <li><strong> {{ __("FRI:") }}</strong> {{ __("8:30 AM – 5:00 PM") }} </li>
                            <li><strong> {{ __("SAT:") }}</strong> {{ __("Closed") }} </li>
                            <li><strong> {{ __("SUN:") }}</strong> {{ __("Closed") }} </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Connect Section -->

 
 @stop
