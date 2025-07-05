@extends('layouts.front')

@section('title')

    {{ __('Veneers') }} - {{ $gs->{'title_' . $sign} }}

@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')
    <style>
        [data-tab] {
            display: none;
        }

        [data-tab="1"] {
            display: block;
        }
    </style>

@stop
@section('content')

    @php
        $phones = explode(',', $gs->phones);
        $emails = explode(',', $gs->emails);
        $addresses = json_decode($gs->{'addresses_' . $sign});

        $randomPhone = Arr::random($phones);
    @endphp
 
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-10">{{ __('Veneers Before & After') }}</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Image Card 1 -->
                <div class="overflow-hidden rounded-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <img src="./assets/imgs/Botox and filler/b.jpg " alt="Image 1"
                        class="w-full h-auto object-cover transition-transform duration-500 hover:rotate-1">
                </div>

                <!-- Image Card 2 -->
                <div class="overflow-hidden rounded-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <img src="./assets/imgs/Dental implant - زراعة الأسنان/e2.JPG " alt="Image 2"
                        class="w-full h-auto object-cover transition-transform duration-500 hover:rotate-1">
                </div>

                <!-- Image Card 3 -->
                <div class="overflow-hidden rounded-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <img src="./assets/imgs/Dental implant - زراعة الأسنان/f14.JPG " alt="Image 3"
                        class="w-full h-auto object-cover transition-transform duration-500 hover:rotate-1">
                </div>
                <div class="overflow-hidden rounded-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <img src="./assets/imgs/Dental implant - زراعة الأسنان/Nasrah Mohamed Hassan.jpg " alt="Image 3"
                        class="w-full h-auto object-cover transition-transform duration-500 hover:rotate-1">
                </div>

            </div>
        </div>
    </section>
  
 
    <section class="bg-white py-12">
        <div class="container mx-auto px-4 flex flex-wrap items-center">
            <!-- Text Column -->
            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold mb-8">{{ __('At Innova Dental, we know veneers.') }}</h2>

                <!-- Icon Boxes -->
                <div class="flex items-start mb-6">
                    <div class="mr-4 text-primary">
                        <i class="fas fa-smile-beam fa-2x"></i> <!-- Replace with appropriate FA icon -->
                    </div>
                    <div>
                        <h5 class="text-xl font-semibold">{{ __('We’ve placed hundreds of veneers...and counting.') }}</h5>
                        <p class="text-gray-600">{{ __('Been there, done that. We’re ready for even the most challenging cases.') }}
                        </p>
                    </div>
                </div>

                <div class="flex items-start mb-6">
                    <div class="mr-4 text-primary">
                        <i class="fas fa-graduation-cap fa-2x"></i> <!-- Replace with appropriate FA icon -->
                    </div>
                    <div>
                        <h5 class="text-xl font-semibold">{{ __('There are years of cosmetic training under our belts.') }}</h5>
                        <p class="text-gray-600">{{ __('We’ve taken years of specialized, hands-on training to prepare us for any smile.') }}</p>
                    </div>
                </div>

                <div class="flex items-start mb-6">
                    <div class="mr-4 text-primary">
                        <i class="fas fa-chalkboard-teacher fa-2x"></i> <!-- Replace with appropriate FA icon -->
                    </div>
                    <div>
                        <h5 class="text-xl font-semibold">{{ __('As active dental instructors, we’re always up to date.') }}</h5>
                        <p class="text-gray-600">{{ __('When the science of veneers evolves, our tools and techniques do too.') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Image Column -->
            <div class="w-full md:w-1/2 mt-8 md:mt-0">
                <img src="{{ asset('front/innova/assets/8.jpg') }}"
                    alt="Dental Veneers" class="w-full h-auto rounded-lg shadow-lg">
            </div>
        </div>
    </section>
 
  
    <!-- Veneers Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <!-- Flex Container -->
            <div class="flex flex-wrap items-center">
                <!-- Image Column -->
                <div class="w-full md:w-1/2 mb-8 md:mb-0">
                    <img src="{{ asset('front/innova/assets/13.jpg') }}"
                        alt="3D Render of Veneers" class="w-full h-auto rounded-lg shadow-lg">
                </div>

                <!-- Text Column -->
                <div class="w-full md:w-1/2 md:pl-12">
                    <h2 class="text-3xl font-bold mb-4">{{ __('Get the feeling of flawless.') }}</h2>

                    <p class="text-gray-700 mb-4">
                        {{ __('Veneers aren’t just for Hollywood heartthrobs and Cosmo cover girls.') }}
                    </p>

                    <p class="text-gray-700 mb-6">
                        {{ __('They’re for anyone who’s tired of the little imperfections in their smile.') }}
                        {{ __('From color to size to shape, they make your smile flawless.') }}
                    </p>

                    <h4 class="text-xl font-semibold text-gray-800 mb-2">{{ __('What are veneers?') }}</h4>

                    <p class="text-gray-700 mb-4">
                        {{ __('They’re the quickest way to a better-looking smile.') }}
                    </p>

                    <p class="text-gray-700">
                        {{ __('Made from long-lasting porcelain or composite, they seamlessly integrate with your teeth to cover up imperfections in a way that looks 100% natural.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Veneers Benefits Section -->
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <!-- Heading -->
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ __('Small changes.') }} <span class="text-primary">{{ __('Big difference.') }}</span></h2>
                <h5 class="text-xl text-gray-600">{{ __('Veneers Are Great For…') }}</h5>
            </div>

            <!-- Benefits Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Benefit 1 -->
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition text-center">
                    <div class="text-primary mb-4 flex justify-center">
                        <i class="fas fa-tooth fa-2x"></i> <!-- Replace with relevant icon -->
                    </div>
                    <h5 class="font-semibold text-gray-800 mb-2">{{ __('Patching Chips or Cracks') }}</h5>
                    <p class="text-gray-600 text-sm">{{ __('Leave the distressed look to your jeans.') }}</p>
                </div>

                <!-- Benefit 2 -->
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition text-center">
                    <div class="text-primary mb-4 flex justify-center">
                        <i class="fas fa-paint-roller fa-2x"></i> <!-- Replace with relevant icon -->
                    </div>
                    <h5 class="font-semibold text-gray-800 mb-2">{{ __('Covering Up Stains') }}</h5>
                    <p class="text-gray-600 text-sm">{{ __('Stains from coffee or smoking? Gone.') }}</p>
                </div>

                <!-- Benefit 3 -->
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition text-center">
                    <div class="text-primary mb-4 flex justify-center">
                        <i class="fas fa-minus-circle fa-2x"></i> <!-- Replace with relevant icon -->
                    </div>
                    <h5 class="font-semibold text-gray-800 mb-2">{{ __('Closing Gaps') }}</h5>
                    <p class="text-gray-600 text-sm">{{ __('No more spaces between your teeth.') }}</p>
                </div>

                <!-- Benefit 4 -->
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition text-center">
                    <div class="text-primary mb-4 flex justify-center">
                        <i class="fas fa-align-center fa-2x"></i> <!-- Replace with relevant icon -->
                    </div>
                    <h5 class="font-semibold text-gray-800 mb-2">{{ __('Fixing Misalignment') }}</h5>
                    <p class="text-gray-600 text-sm">{{ __('Straighten your smile without braces.') }}</p>
                </div>
            </div>
        </div>
    </section>

     
    <!-- Connect Section -->
 @stop
 @section('js')
    <script>
        function switchTab(tabNumber) {
            // Hide all tabs
            document.querySelectorAll('[data-tab]').forEach(tab => {
                tab.classList.add('hidden');
            });

            // Deactivate all buttons
            document.querySelectorAll('[data-tab-button]').forEach(button => {
                button.classList.remove('bg-[#494949]', 'text-white');
                button.classList.add('hover:bg-gray-100');
            });

            // Show selected tab
            document.getElementById(`tab-${tabNumber}`).classList.remove('hidden');

            // Activate selected button
            document.querySelector(`[data-tab-button="${tabNumber}"]`).classList.remove('hover:bg-gray-100');
            document.querySelector(`[data-tab-button="${tabNumber}"]`).classList.add('bg-[#494949]', 'text-white');
        }
    </script>
 @stop