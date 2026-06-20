  @extends('layouts.front')

  @section('title')

      {{ __('تواصل معنا') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop


  @section('content')
      @php
          $phones = explode(',', $gs->phones);
          $emails = explode(',', $gs->emails);
          $addresses = json_decode($gs->{'addresses_' . $sign});
          $randomPhone = Arr::random($phones);
      @endphp

      <section>
          <!-- Contact Hero Banner -->
<section class="relative w-full overflow-hidden text-white
                aspect-[750/500] md:aspect-auto md:h-[550px]">

    <!-- Mobile Background -->
    <img
        src="{{ asset('assets/images/about/about-slider-mobile.webp') }}"
        alt="{{ __('تواصل معنا') }}"
        class="absolute inset-0 block md:hidden
               h-full w-full object-cover object-center"
        fetchpriority="high"
        decoding="async">

    <!-- Desktop Background -->
    <img
        src="{{ asset('assets/images/about/about-slider.webp') }}"
        alt="{{ __('تواصل معنا') }}"
        class="absolute inset-0 hidden md:block
               h-full w-full object-cover object-center"
        fetchpriority="high"
        decoding="async">

    <!-- Unified Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r
                from-[#1558e8]/70
                via-[#168db5]/60
                to-[#0ca85f]/70">
    </div>

    <!-- Content -->
    <div class="relative z-10 flex h-full items-center justify-center px-4 md:px-16">
        <div class="max-w-3xl text-center">

            <h1 class="text-2xl sm:text-4xl lg:text-5xl
                       font-bold leading-tight drop-shadow-lg">
                {{ __('تواصل معنا') }}
            </h1>

            <p class="mx-auto mt-5 max-w-2xl
                      text-sm sm:text-lg
                      leading-7 sm:leading-8
                      text-white/95 drop-shadow-md">
                {{ __('فريق Tooth Guard Clinics جاهز للإجابة على استفساراتك ومساعدتك في تحقيق ابتسامة صحية ومشرقة.') }}
            </p>

        </div>
    </div>

</section>
          <!-- Header -->
          <!--<div class="bg-gradient-to-r from-blue-500 to-green-600 text-white py-16 px-4 md:px-16">-->
          <!--    <div class="text-center px-4">-->
          <!--        <h1 class="text-xl sm:text-4xl font-bold mb-4"> {{ __('تواصل معنا') }}</h1>-->
          <!--        <p class="text-sm sm:text-lg mb-8 max-w-2xl mx-auto">-->

          <!--            {{ __('فريق Tooth Guard Clinics جاهز للإجابة على استفساراتك ومساعدتك في تحقيق ابتسامة صحية ومشرقة.') }}-->
          <!--        </p>-->
          <!--    </div>-->
          <!--</div>-->

          <!-- Contact Section -->
          <section class="bg-gray-100 py-10 sm:py-20 px-5 sm:px-16">
              <div class="lg:flex max-w-7xl mx-auto gap-8">
                  <!-- Contact Information -->
                  <div class="lg:w-1/2 mb-8 lg:mb-0">
                      <h3 class="text-2xl sm:text-4xl font-bold text-blue-800"> {{ __('تواصل مع Tooth Guard Clinics') }}</h3>
                      <div class="border-blue-400 my-4 w-[20%] sm:w-[13%] border-t-8 rounded-lg"></div>
                      <p class="text-sm sm:text-base text-slate-600 max-w-md py-4">

                          {{ __('نحن هنا لمساعدتك في جميع احتياجات الأسنان الخاصة بك. سواء كنت تحدد موعدًا أو لديك سؤال، فإن فريقنا جاهز للمساعدة.') }}

                      </p>
                      <div class="space-y-4 mt-6">
                          @foreach ($addresses as $address)
                              <!-- Address -->
                              <div class="flex items-start gap-4">
                                  <svg class="fill-blue-500 w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                      viewBox="0 0 576 512">
                                      <path
                                          d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                                  </svg>
                                  <p class="text-gray-600 font-semibold text-sm sm:text-base">
                                      {{ $address }}
                                  </p>
                              </div>
                          @endforeach
                          @foreach ($emails as $email)
                              <!-- Email -->
                              <div class="flex items-start gap-4">
                                  <svg class="fill-blue-500 w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                      viewBox="0 0 512 512">
                                      <path
                                          d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                                  </svg>
                                  <a href="mailto:{{ $email }}"
                                      class="text-gray-600 font-semibold text-sm sm:text-base hover:text-blue-500 transition duration-300">
                                      {{ $email }}
                                  </a>
                              </div>
                          @endforeach

                          @foreach ($phones as $phone)
                              <!-- Phone -->
                              <div class="flex items-start gap-4">
                                  <svg class="fill-blue-500 w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                      viewBox="0 0 512 512">
                                      <path
                                          d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                  </svg>
                                  <a href="tel:{{ $phone }}"
                                      class="text-gray-600 font-semibold text-sm sm:text-base hover:text-blue-500 transition duration-300">
                                      {{ $phone }}
                                  </a>
                              </div>
                          @endforeach
                      </div>
                  </div>
                  <!-- Contact Form -->
                  <div class="lg:w-1/2">
                      <section class="bg-white rounded-3xl p-6 sm:p-10 shadow-lg">
                          <h3 class="text-xl sm:text-3xl font-bold text-blue-800 mb-2">   {{ __('تواصل معنا عن طريق الرسائل') }} </h3>
                          <p class="text-sm text-slate-500 mb-6">   {{ __('إذا كان لديك سؤال، املأ هذا النموذج') }}</p>
                          <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form"
                              method="POST" autocomplete="off" class="cons-contact-form">
                              {{ csrf_field() }}
                              <div class="form-group w-100">
                                  <div class="response w-100"></div>
                              </div>
                              <input id="name" name="name" type="text" placeholder="{{ __('الاسم') }}"
                                  class="fname block w-full py-3 px-4 mb-4 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                  required>
                              <input id="email" name="email" type="email" placeholder="{{ __('البريد الإلكتروني') }}"
                                  class="block w-full py-3 px-4 mb-4 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                  required>
                              <input id="phone" name="phone" type="tel" placeholder="{{ __('رقم الهاتف') }}"
                                  class="block w-full py-3 px-4 mb-4 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                              <textarea id="message" name="text" placeholder="{{ __('الرسالة') }}"
                                  class="block w-full py-3 px-4 mb-4 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y"
                                  rows="5" required></textarea>
                              <div class="flex justify-end">
                                  <button type="submit"
                                      class="bg-blue-700 text-white font-semibold py-2 px-6 rounded-md hover:bg-blue-800 transition duration-300">
                                      {{ __('إرسال') }}
                                  </button>
                              </div>
                          </form>
                      </section>
                  </div>
              </div>
          </section>

          <!-- Contact Call-to-Action -->
        
      </section>

    @include('includes.book')
  @stop
