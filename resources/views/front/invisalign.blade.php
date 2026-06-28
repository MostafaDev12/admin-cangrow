    @extends('layouts.front')

   @section('title')

       {{ __('Invisalign') }} - {{ $gs->{'title_' . $sign} }}

   @stop

   @section('gsearch')
       <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
   @stop

   @section('css')
<style>
        /* Optional custom styles for Swiper navigation and pagination */
        .swiper-button-prev,
        .swiper-button-next {
            color: #3b82f6;
            /* Tailwind blue-500 */
        }

        .swiper-pagination-bullet-active {
            background: #3b82f6;
            /* Tailwind blue-500 */
        }

        /* Styles for the image modal */
        .image-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .image-modal img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        .image-modal .close-button {
            position: absolute;
            top: 20px;
            right: 30px;
            color: #fff;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
     
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    
   @stop
   @section('content')

@php
    $phones = explode(',', $gs->phones);
    $emails = explode(',', $gs->emails);
    $addresses = json_decode($gs->{'addresses_' . $sign});

    $randomPhone = Arr::random($phones);
@endphp
    <!-- end header -->
    <section class="container mx-auto px-4 my-4 md:my-10">
        <div class="mx-auto">
            <!-- Grid container -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                <!-- Left image column -->
                <div class="">
                    <picture>
                        <source
                            srcset="{{ asset('front/innova/assets/14.jpg') }}"
                            type="image/avif">
                        <source
                            srcset="{{ asset('front/innova/assets/14.jpg') }}"
                            type="image/webp">
                        <img src="{{ asset('front/innova/assets/14.jpg') }}"
                            class="w-full h-[240px] object-content  rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-1" alt="Smiling patient" loading="lazy">
                    </picture>
                </div>

                <!-- Middle content column -->
                <div class="p-6">
                    <div class="">
                        <p class="text-lg font-medium text-gray-700">{{ __('Unmatched Quality.') }}</p>
                        <h2 class="text-4xl font-bold text-gray-900">{{ __('Invisalign in LA') }}</h2>
                        <p class="text-gray-600 md:text-lg">
                            {{ __('Book your FREE virtual consultation and receive your coupon') }}<br>
                            {{ __('Hurry! Your coupon is good for two weeks') }}
                        </p>

                    </div>
                </div>

                <!-- Right image column (hidden on mobile) -->
                <div class="">
                    <picture>
                        <source
                            srcset="{{ asset('front/innova/assets/15.jpg') }}"
                            type="image/avif">
                        <source
                            srcset="{{ asset('front/innova/assets/15.jpg') }}"
                            type="image/webp">
                        <img src="{{ asset('front/innova/assets/15.jpg') }}"
                            class="w-full h-[240px] object-cover  rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-1" alt="Smiling patient" loading="lazy">
                    </picture>
                </div>
            </div>
        </div>
    </section>
    <section class="">
        <div class="container mx-auto px-4">
            <!-- Grid container -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

                <!-- Left column - Images -->
                <div class="space-y-6">
                    <!-- Main image -->
                    <div class="w-full">
                        <picture>
                            <source
                                srcset="{{ asset('front/innova/assets/8.jpg') }}"
                                type="image/avif">
                            <source
                                srcset="{{ asset('front/innova/assets/8.jpg') }}"
                                type="image/webp">
                            <img src="{{ asset('front/innova/assets/8.jpg') }}"
                                class="w-full h-auto rounded-lg shadow-md" alt="Smiling patients" loading="lazy">
                        </picture>
                    </div>

                    <!-- Logo grid -->
                {{--
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 d-none">
                        <!-- Invisalign Provider Logo -->
                        <div class="flex items-center justify-center">
                            <picture>
                                <source
                                    srcset="{{ asset('front/innova/assets/4.webp') }}"
                                    type="image/webp">
                                <img src="{{ asset('front/innova/assets/4.webp') }}"
                                    class="max-h-20 w-auto" alt="Invisalign Provider" loading="lazy">
                            </picture>
                        </div>

                        <!-- Itero Logo -->
                        <div class="flex items-center justify-center">
                            <picture>
                                <source srcset="{{ asset('front/innova/assets/5.webp') }}"
                                    type="image/webp">
                                <img src="{{ asset('front/innova/assets/5.webp') }}"
                                    class="max-h-20 w-auto" alt="Itero" loading="lazy">
                            </picture>
                        </div>

                        <!-- Platinum Tag -->
                        <div class="flex items-center justify-center">
                            <picture>
                                <source
                                    srcset="{{ asset('front/innova/assets/6.webp') }}"
                                    type="image/avif">
                                <source
                                    srcset="{{ asset('front/innova/assets/6.webp') }}"
                                    type="image/webp">
                                <img src="{{ asset('front/innova/assets/6.webp') }}"
                                    class="max-h-20 w-auto" alt="Platinum Provider" loading="lazy">
                            </picture>
                        </div>
                    </div>
                    --}}
                    
                </div>

                <!-- Right column - Content -->
                <div class="space-y-6">
                    <h5 class="text-lg font-semibold text-blue-600">{{ __('What Makes This The Best Deal You Can Find?') }}</h5>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800">{{ __('Our deal is all inclusive.') }}</h2>
                    <p class="text-gray-600">
                        {{ __("Unlike other offices that advertise a low price to get you in the door, we don't exclude complex cases or nickel-and-dime you with upcharges. You get everything you need to correct your smile for one unbeatably low price.") }}
                    </p>

                    <h5 class="text-lg font-semibold text-gray-800"><b>{{ __('Your Treatment Includes') }}</b></h5>

                    <ul class="grid grid-cols-2 gap-2 text-gray-600">
                       
                       @foreach ($points as $point)
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            {{ $point->{'title_' . $sign} ?? '' }}
                        </li>
                        @endforeach
 
                    </ul>

                    <h5 class="text-lg font-semibold text-blue-600">
                        <strong>{{ __('We are Diamond Invisalign Providers. This means we are in the top 1% of Invisalign Providers') }}</strong>
                    </h5>
                </div>
            </div>
        </div>
    </section>
    <!-- Stretched Section -->
    <section class="">
        <div class="container mx-auto px-4">
            <!-- Full width column -->
            <div class="w-full text-center">
                <!-- Heading -->
                <h4 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-6">
                    {{ __('Book your FREE virtual or in-person consultation') }}
                </h4>

                <!-- Button - Visible on desktop/tablet -->
                 
 
            </div>
        </div>
    </section>
    <section class=" py-8">
        <div class="container mx-auto px-4">
            <!-- Centered content column -->
            <div class="flex flex-col items-center text-center">
                <!-- Phone number text -->
                <h4 class="text-xl md:text-2xl font-medium text-gray-800 mb-4">
                    {{ __('Call us at') }} <a href="tel:{{ $randomPhone }}"
                        class="text-blue-600 hover:text-blue-800 transition-colors">{{ $randomPhone }}</a>
                </h4>

                <!-- Call button -->
                <a href="tel:{{ $randomPhone }}"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition-colors duration-300 shadow-sm">
                    {{ __('CALL US TODAY') }}
                </a>
            </div>
        </div>
    </section>
    <!-- Section Container -->
    <section class="">
        <div class="container mx-auto px-4">
            <!-- Full-width column -->
            <div class="w-full text-center">
                <!-- Heading -->
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                    {{ __('Our Invisalign Patients Love Smiling') }}
                </h2>
            </div>
        </div>
    </section>
<section class="bg-white py-10">
    <div class="container mx-auto">
        <div class="swiper image-swiper">
            <div class="swiper-wrapper">
                @foreach($after_befores as $image)
                    <div class="swiper-slide">
                        {{-- Each slide now focuses on a single "before" and "after" card --}}
                        <!--<div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 items-start">-->
                            {{-- "Before" Card --}}
                            <div class="bg-gray-100 rounded-lg shadow-lg p-4 flex flex-col items-center"> {{-- Added padding and center alignment --}}
                                <img src="{{ $image->photo }}" data-src="{{ $image->photo }}"
                                    alt="Before Image - {{ $image->{'title_' . $sign} ?? '' }}"
                                    class="lazyload rounded-md w-full object-cover cursor-zoom-in" {{-- Key changes here: w-full and removed max-height --}}
                                    style="height: 250px;" /> {{-- Set a fixed height for consistency if desired, or remove for auto height --}}
                                <p class="text-center mt-2 text-gray-700 font-semibold text-lg">Before: {{ $image->{'title_' . $sign} ?? '' }}</p>
                            </div>

                            <!--{{-- "After" Card (assuming you have an 'after_photo' and 'after_title' in your $image object) --}}-->
                            <!--@if(isset($image->after_photo))-->
                            <!--    <div class="bg-gray-100 rounded-lg shadow-lg p-4 flex flex-col items-center"> {{-- Added padding and center alignment --}}-->
                            <!--        <img src="{{ $image->after_photo }}" data-src="{{ $image->after_photo }}"-->
                            <!--            alt="After Image - {{ $image->{'after_title_' . $sign} ?? '' }}"-->
                            <!--            class="lazyload rounded-md w-full object-cover cursor-zoom-in" {{-- Key changes here: w-full and removed max-height --}}-->
                            <!--            style="height: 250px;" /> {{-- Set a fixed height for consistency if desired, or remove for auto height --}}-->
                            <!--        <p class="text-center mt-2 text-gray-700 font-semibold text-lg">After: {{ $image->{'after_title_' . $sign} ?? '' }}</p>-->
                            <!--    </div>-->
                            <!--@endif-->
                        <!--</div>-->
                    </div>
                @endforeach
            </div>

            <div class="swiper-pagination mt-4 flex justify-center"></div>

            <div class="swiper-button-prev absolute top-1/2 -translate-y-1/2 left-2 z-10"></div>
            <div class="swiper-button-next absolute top-1/2 -translate-y-1/2 right-2 z-10"></div>
        </div>
    </div>
</section>

<script>
    // Initialize Swiper (make sure you've included Swiper's CSS and JS files)
    const imageSwiper = new Swiper('.image-swiper', {
        loop: true, // Optional: Enables continuous loop mode
        spaceBetween: 30, // Space between slides

        // Responsive breakpoints
        breakpoints: {
            // When window width is <= 640px (typical mobile breakpoint)
            0: {
                slidesPerView: 1,
            },
            // When window width is >= 768px (typical tablet/desktop breakpoint)
            768: {
                slidesPerView: 3,
            }
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
 
    @stop

  @section('js')   
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.image-swiper', {
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 1,
                    spaceBetween: 50,
                },
                1280: {
                    slidesPerView: 1,
                    spaceBetween: 60,
                },
            },
        });

        const lazyLoadImages = document.querySelectorAll('.lazyload');
        lazyLoadImages.forEach((img) => {
            img.src = img.dataset.src;
            img.addEventListener('click', openModal);
        });

        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const closeButton = document.querySelector('.close-button');
        let allImages = document.querySelectorAll('.lazyload');

        function openModal(event) {
            modal.style.display = 'flex';
            modalImage.src = event.target.src;
        }

        function closeModal() {
            modal.style.display = 'none';
            modalImage.src = '';
        }

        closeButton.addEventListener('click', closeModal);
        modal.addEventListener('click', function (event) {
            if (event.target === modal) {
                closeModal();
            }
        });
    </script>
   @stop