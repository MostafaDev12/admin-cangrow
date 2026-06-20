
@extends('layouts.front')


@section('title')
    {{ __('تواصل معنا') }} - {{ $gs->{'title_' . $sign} }}
@stop


@section('gsearch')
    <meta
        property="og:image"
        content="{{ $gs->{'logo_' . $sign} }}"
    />
@stop


@section('content')

    @php
        $phones = array_values(
            array_filter(
                array_map(
                    'trim',
                    explode(',', (string) $gs->phones)
                )
            )
        );

        $emails = array_values(
            array_filter(
                array_map(
                    'trim',
                    explode(',', (string) $gs->emails)
                )
            )
        );

        $addresses = json_decode(
            $gs->{'addresses_' . $sign} ?? '[]',
            true
        ) ?: [];


        /*
        |--------------------------------------------------------------------------
        | Google Maps
        |--------------------------------------------------------------------------
        */

        $mapLink = 'https://maps.app.goo.gl/anJeL6VXLuoB61WK7?g_st=ac';

        $mapAddress = trim(
            $addresses[0]
            ?? '17 Makram Ebaid St. Nasr City, Cairo, Egypt'
        );

        $mapEmbedUrl = 'https://www.google.com/maps?q='
            . rawurlencode($mapAddress)
            . '&output=embed';
    @endphp


    <section>

        <!-- Contact Hero Banner -->
        <section
            class="relative w-full overflow-hidden text-white
                   aspect-[750/500] md:aspect-auto md:h-[550px]"
        >

            <!-- Mobile Background -->
            <img
                src="{{ asset('assets/images/about/about-slider-mobile.webp') }}"
                alt="{{ __('تواصل معنا') }}"
                class="absolute inset-0 block h-full w-full
                       object-cover object-center md:hidden"
                fetchpriority="high"
                decoding="async"
            >


            <!-- Desktop Background -->
            <img
                src="{{ asset('assets/images/about/about-slider.webp') }}"
                alt="{{ __('تواصل معنا') }}"
                class="absolute inset-0 hidden h-full w-full
                       object-cover object-center md:block"
                fetchpriority="high"
                decoding="async"
            >


            <!-- Unified Gradient Overlay -->
            <div
                class="absolute inset-0 bg-gradient-to-r
                       from-[#1558e8]/70
                       via-[#168db5]/60
                       to-[#0ca85f]/70"
            >
            </div>


            <!-- Content -->
            <div
                class="relative z-10 flex h-full
                       items-center justify-center
                       px-4 md:px-16"
            >

                <div class="max-w-3xl text-center">

                    <h1
                        class="text-2xl font-bold leading-tight
                               drop-shadow-lg
                               sm:text-4xl lg:text-5xl"
                    >
                        {{ __('تواصل معنا') }}
                    </h1>


                    <p
                        class="mx-auto mt-5 max-w-2xl
                               text-sm leading-7
                               text-white/95 drop-shadow-md
                               sm:text-lg sm:leading-8"
                    >
                        {{ __('فريق Tooth Guard Clinics جاهز للإجابة على استفساراتك ومساعدتك في تحقيق ابتسامة صحية ومشرقة.') }}
                    </p>

                </div>

            </div>

        </section>



        <!-- Contact Section -->
        <section
            class="bg-gray-100 px-5 py-10
                   sm:px-16 sm:py-20"
        >

            <div
                class="mx-auto max-w-7xl gap-8
                       lg:flex"
            >

                <!-- Contact Information -->
                <div class="mb-8 lg:mb-0 lg:w-1/2">

                    <h3
                        class="text-2xl font-bold text-blue-800
                               sm:text-4xl"
                    >
                        {{ __('تواصل مع Tooth Guard Clinics') }}
                    </h3>


                    <div
                        class="my-4 w-[20%]
                               rounded-lg border-t-8
                               border-blue-400
                               sm:w-[13%]"
                    >
                    </div>


                    <p
                        class="max-w-md py-4
                               text-sm text-slate-600
                               sm:text-base"
                    >
                        {{ __('نحن هنا لمساعدتك في جميع احتياجات الأسنان الخاصة بك. سواء كنت تحدد موعدًا أو لديك سؤال، فإن فريقنا جاهز للمساعدة.') }}
                    </p>


                    <div class="mt-6 space-y-5">

                        <!-- Addresses -->
                        @foreach ($addresses as $address)

                            <a
                                href="{{ $mapLink }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="group flex items-start gap-4"
                            >

                                <svg
                                    class="h-6 w-6 shrink-0
                                           fill-blue-500
                                           transition duration-300
                                           group-hover:fill-green-500"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512"
                                >
                                    <path
                                        d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"
                                    />
                                </svg>


                                <span
                                    class="text-sm font-semibold
                                           leading-7 text-gray-600
                                           transition duration-300
                                           group-hover:text-blue-500
                                           sm:text-base"
                                >
                                    {{ trim($address) }}
                                </span>

                            </a>

                        @endforeach



                        <!-- Emails -->
                        @foreach ($emails as $email)

                            <a
                                href="mailto:{{ trim($email) }}"
                                class="group flex items-start gap-4"
                            >

                                <svg
                                    class="h-6 w-6 shrink-0
                                           fill-blue-500
                                           transition duration-300
                                           group-hover:fill-green-500"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512"
                                >
                                    <path
                                        d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"
                                    />
                                </svg>


                                <span
                                    dir="ltr"
                                    class="break-all text-sm
                                           font-semibold text-gray-600
                                           transition duration-300
                                           group-hover:text-blue-500
                                           sm:text-base"
                                >
                                    {{ trim($email) }}
                                </span>

                            </a>

                        @endforeach



                        <!-- Phones -->
                        @foreach ($phones as $phone)

                            @php
                                $displayPhone = trim($phone);

                                $cleanPhone = preg_replace(
                                    '/[^0-9+]/',
                                    '',
                                    $displayPhone
                                );

                                if (str_starts_with($cleanPhone, '0')) {
                                    $cleanPhone = '+20' . substr($cleanPhone, 1);
                                } elseif (!str_starts_with($cleanPhone, '+')) {
                                    $cleanPhone = '+' . $cleanPhone;
                                }
                            @endphp


                            <a
                                href="tel:{{ $cleanPhone }}"
                                class="group flex items-start gap-4"
                            >

                                <svg
                                    class="h-6 w-6 shrink-0
                                           fill-blue-500
                                           transition duration-300
                                           group-hover:fill-green-500"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512"
                                >
                                    <path
                                        d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"
                                    />
                                </svg>


                                <span
                                    dir="ltr"
                                    class="text-sm font-semibold
                                           text-gray-600
                                           transition duration-300
                                           group-hover:text-blue-500
                                           sm:text-base"
                                >
                                    {{ $displayPhone }}
                                </span>

                            </a>

                        @endforeach

                    </div>

                </div>



                <!-- Contact Form -->
                <div class="lg:w-1/2">

                    <section
                        class="rounded-3xl bg-white
                               p-6 shadow-lg sm:p-10"
                    >

                        <h3
                            class="mb-2 text-xl font-bold
                                   text-blue-800 sm:text-3xl"
                        >
                            {{ __('تواصل معنا عن طريق الرسائل') }}
                        </h3>


                        <p class="mb-6 text-sm text-slate-500">
                            {{ __('إذا كان لديك سؤال، املأ هذا النموذج') }}
                        </p>


                        <form
                            action="{{ route('front.contact.submit') }}"
                            name="appointment"
                            id="email-form"
                            method="POST"
                            autocomplete="off"
                            class="cons-contact-form"
                        >

                            {{ csrf_field() }}


                            <div class="form-group w-full">
                                <div class="response w-full"></div>
                            </div>


                            <input
                                id="name"
                                name="name"
                                type="text"
                                placeholder="{{ __('الاسم') }}"
                                class="fname mb-4 block w-full
                                       rounded-md border border-gray-300
                                       px-4 py-3 text-sm
                                       focus:outline-none
                                       focus:ring-2 focus:ring-blue-500"
                                required
                            >


                            <input
                                id="email"
                                name="email"
                                type="email"
                                placeholder="{{ __('البريد الإلكتروني') }}"
                                class="mb-4 block w-full
                                       rounded-md border border-gray-300
                                       px-4 py-3 text-sm
                                       focus:outline-none
                                       focus:ring-2 focus:ring-blue-500"
                                required
                            >


                            <input
                                id="phone"
                                name="phone"
                                type="tel"
                                dir="ltr"
                                placeholder="{{ __('رقم الهاتف') }}"
                                class="mb-4 block w-full
                                       rounded-md border border-gray-300
                                       px-4 py-3 text-sm
                                       focus:outline-none
                                       focus:ring-2 focus:ring-blue-500"
                            >


                            <textarea
                                id="message"
                                name="text"
                                placeholder="{{ __('الرسالة') }}"
                                class="mb-4 block w-full resize-y
                                       rounded-md border border-gray-300
                                       px-4 py-3 text-sm
                                       focus:outline-none
                                       focus:ring-2 focus:ring-blue-500"
                                rows="5"
                                required
                            ></textarea>


                            <div class="flex justify-end">

                                <button
                                    type="submit"
                                    class="rounded-md bg-blue-700
                                           px-6 py-2 font-semibold
                                           text-white
                                           transition duration-300
                                           hover:bg-blue-800"
                                >
                                    {{ __('إرسال') }}
                                </button>

                            </div>

                        </form>

                    </section>

                </div>

            </div>

        </section>



        <!-- Google Map Section -->
        <section
            class="bg-gray-100 px-5 pb-10
                   sm:px-16 sm:pb-20"
        >

            <div class="mx-auto max-w-7xl">

                <!-- Map Heading -->
                <div class="mb-7 text-center">

                    <h2
                        class="text-2xl font-bold
                               text-blue-800 sm:text-4xl"
                    >
                        {{ __('موقعنا على الخريطة') }}
                    </h2>


                    <p
                        class="mx-auto mt-3 max-w-2xl
                               text-sm leading-7 text-slate-600
                               sm:text-base"
                    >
                        {{ __('اضغط على الخريطة لفتح موقع العيادة على خرائط جوجل والحصول على الاتجاهات.') }}
                    </p>

                </div>


                <!-- Clickable Map -->
                <div
                    class="relative h-[350px] overflow-hidden
                           rounded-[28px]
                           border border-gray-200
                           bg-white
                           shadow-[0_18px_55px_rgba(15,39,64,0.14)]
                           md:h-[480px]"
                >

                    <iframe
                        src="{{ $mapEmbedUrl }}"
                        title="{{ __('موقع Tooth Guard Clinics على الخريطة') }}"
                        class="pointer-events-none
                               h-full w-full border-0"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen
                    ></iframe>


                    <!-- Full Map Link -->
                    <a
                        href="{{ $mapLink }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="{{ __('افتح الموقع على خرائط جوجل') }}"
                        class="group absolute inset-0 z-10"
                    >

                        <span
                            class="absolute bottom-5
                                   left-1/2 flex
                                   -translate-x-1/2
                                   items-center gap-2
                                   whitespace-nowrap
                                   rounded-full
                                   bg-blue-700/95
                                   px-5 py-3
                                   text-sm font-bold
                                   text-white shadow-lg
                                   backdrop-blur
                                   transition duration-300
                                   group-hover:-translate-y-1
                                   group-hover:bg-green-500
                                   sm:text-base"
                        >

                            <i class="fa-solid fa-location-dot"></i>

                            {{ __('فتح الموقع على خرائط جوجل') }}

                            <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>

                        </span>

                    </a>

                </div>

            </div>

        </section>

    </section>


    @include('includes.book')

@stop

