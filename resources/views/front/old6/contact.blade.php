  @extends('layouts.front')

  @section('title')

      {{ __('الإتصـــال بنـــا') }} - {{ $gs->{'title_' . $sign} }}

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

    <section class="relative h-screen w-full">


        <div class="relative h-screen w-full  bg-[url('{{ asset('front/gulddal/') }}/images/bannerContacts.jpg')] md:bg-cover bg-center">
            <div class="flex items-center w-full h-full justify-center" data-carousel-item>

                <div class="text-center text-white bg-black/50 w-full py-10  mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">  {{ __('الإتصـــال بنـــا') }}</h2>

                </div>
            </div>

    </section>

    <section id="contact" class="py-16 md:py-20" dir="{{ session::get('front_language_duraction')}}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-white">
                    {{ __('عن انظمة أم دابليو أم جولدال سيستمز') }}
                </h2>
                <p class="text-base md:text-xl text-gray-300 max-w-3xl mx-auto">

             
                    {{ __('في حاله وجود اي استفسار بالرجاء التواصل مع احد خبرائنا من خلال نموذج الاتصال او التواصل مع اقرب مكتب اقليمي تابع لك فنحن هنا لمساعدتك ') }}
                </p>
            </div>

            <!-- Main Content Grid -->
            <div class="grid lg:grid-cols-2 gap-10 md:gap-16">

                <!-- Contact Info & Regional Offices -->
                <div class="space-y-10 md:space-y-12">

                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-2xl font-bold mb-6 text-yellow-400"> {{ __('معلومات الاتصال') }}</h3>
                        <div class="grid grid-cols-1 gap-4 md:gap-8">
                            <!-- Phone -->
                            <a href="tel:+201222243351" class="block">
                                <div class="flex items-start space-x-reverse space-x-4">
                                    <div class="bg-primary p-3 rounded-lg flex-shrink-0 text-white">
                                        <i data-lucide="phone" class="h-6 w-6"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-lg mb-1 text-white">  {{ __('الاتصال الرئيسي') }}</h4>
                                        <span class="text-gray-200">{{ __('هاتف') }}:</span>
                                        @foreach ($phones as $phone)
                                          <span dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}" class="text-gray-200">{{ $phone }}</span>
                                          
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </a>

                            <!-- Email -->
                            <a href="mailto:info@gulddalsystems.com" class="block">
                                <div class="flex items-start space-x-reverse space-x-4">
                                    <div class="bg-primary p-3 rounded-lg flex-shrink-0 text-white">
                                        <i data-lucide="mail" class="h-6 w-6"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-lg mb-1 text-white"> {{ __('البريد الإلكتروني') }}</h4>
                                        <p class="text-gray-200 text-xs md:text-lg">info@mwmgulddalsystems.com</p>

                                        <!-- <p class="text-gray-200">sales@gulddal-systems.com</p> -->
                                    </div>
                                </div>
                            </a>


                            <!-- Address -->
                            <div class="flex items-start space-x-reverse space-x-4">
                                <div class="bg-primary p-3 rounded-lg flex-shrink-0 text-white">
                                    <i data-lucide="map-pin" class="h-6 w-6"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg mb-1 text-white"> {{ __('المكتب الرئيسي') }}</h4>
                                    <p class="text-gray-200"> {{ __('35 شارع حسن الشريف') }}</p>
                                    <p class="text-gray-200"> {{ __('مدينة نصر، القاهرة، مصر') }}</p>
                                </div>
                            </div>

                            <!-- Hours -->
                            <div class="flex items-start space-x-reverse space-x-4">
                                <div class="bg-primary p-3 rounded-lg flex-shrink-0 text-white">
                                    <i data-lucide="clock" class="h-6 w-6"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg mb-1 text-white">  {{ __('ساعات العمل') }}</h4>
                                    <p class="text-gray-200">
                                        {{ __('من الاحد إلى الخميس من الساعه 9:00 صباحاً الي 5:00 مساءً بتوقيت القاهره') }}
                                    </p>
                                    <!-- <p class="text-gray-200">الدعم الطارئ: 24/7</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Regional Offices -->
                    <div class="bg-gray-900 p-6 rounded-xl shadow-lg border border-gray-800">
                        <h3 class="text-xl font-bold mb-4 text-yellow-400"> {{ __('انتشارنا العالمي') }}</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Egypt -->
                            <div class="flex items-center space-x-reverse space-x-3 border-b border-gray-700 pb-3">
                                <img src="{{ asset('front/gulddal/') }}/images/3.png" alt="علم مصر"
                                    class="w-8 h-6 object-cover rounded-sm shadow-md" />
                                <div>
                                    <h4 class="font-semibold text-lg text-primary">{{ __('مصر') }}</h4>
                                    <!-- <p class="text-sm text-gray-300">35 شارع حسن الشريف، مدينة نصر، القاهرة، مصر</p> -->
                                </div>
                            </div>
                            <!-- Czech Republic -->
                            <div class="flex items-center space-x-reverse space-x-3 border-b border-gray-700 pb-3">
                                <img src="{{ asset('front/gulddal/') }}/images/2.jpeg" alt="علم التشيك"
                                    class="w-8 h-6 object-cover rounded-sm shadow-md" />
                                <div>
                                    <h4 class="font-semibold text-lg text-primary">  {{ __('المغرب') }}</h4>
                                </div>
                            </div>
                            <!-- Germany -->
                            <div class="flex items-center space-x-reverse space-x-3 border-b border-gray-700 pb-3">
                                <img src="{{ asset('front/gulddal/') }}/images/5.png" alt="علم ألمانيا"
                                    class="w-8 h-6 object-cover rounded-sm shadow-md" />
                                <div>
                                    <h4 class="font-semibold text-lg text-primary"> {{ __('ليبيا') }}</h4>
                                </div>
                            </div>
                            <div class="flex items-center space-x-reverse space-x-3 border-b border-gray-700 pb-3">
                                <img src="{{ asset('front/gulddal/') }}/images/4.png" alt="علم العراق"
                                    class="w-8 h-6 object-cover rounded-sm shadow-md" />
                                <div>
                                    <h4 class="font-semibold text-lg text-primary">{{ __('السعودية') }}</h4>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <a href="mailto:info@gulddalsystems.com" class="text-primary my-10">
                            <div class="flex gap-2 mt-4">
                                <div class="bg-primary p-2 rounded-lg ">
                                    <i data-lucide="mail" class="h-6 w-6 text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold md:text-lg mb-1text-yellow-400"> {{ __('البريد الإلكتروني') }}</h4>
                                    <p class="text-gray-200 text-xs md:text-lg">info@mwmgulddalsystems.com</p>

                                    <!-- <p class="text-gray-200">sales@gulddal-systems.com</p> -->
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <!-- Contact Form -->
                <div class="bg-gray-900 p-6 md:p-8 rounded-xl shadow-lg border border-gray-800">
                    <h3 class="text-2xl font-bold mb-6 text-yellow-400">  {{ __('أرسل لنا رسالة') }}</h3>
                    
                         <form action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST" autocomplete="off" class="cons-contact-form space-y-6">
                            {{csrf_field()}}
                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>
                        <!-- Name & Email -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-gray-50 text-sm font-medium mb-1"> {{ __('الاسم') }}<span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" required placeholder="{{ __('الاسم الكامل') }}"
                                    class="fname w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:outline-none text-gray-50" />
                            </div>
                            <div>
                                <label for="email" class="block text-gray-50 text-sm font-medium mb-1"> {{ __('البريد الإلكتروني') }}
                                    <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" required
                                    placeholder="your.email@example.com"
                                    class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:outline-none text-gray-50" />
                            </div>
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-gray-50 text-sm font-medium mb-1"> {{ __('رقم الهاتف') }}</label>
                            <input type="tel" id="phone" name="phone" placeholder="+20 123 456 7890"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:outline-none text-gray-50" />
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-gray-50 text-sm font-medium mb-1"> {{ __('رسالتك') }}<span
                                    class="text-red-500">*</span></label>
                            <textarea id="message" name="message" rows="5" required
                                placeholder="أخبرنا عن مشروعك أو استفسارك..."
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:outline-none text-gray-50"></textarea>
                        </div>

                        <!-- Project Type -->
                        <div>
                            <label for="project-type" class="block text-gray-50 text-sm font-medium mb-1"> 
                        {{ __('نوع الخدمه') }}         </label>
                            <select id="project-type" name="project-type"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:outline-none text-gray-50">
                                <option value="">{{ __('اختر نوع الخدمه') }} ...</option>
                                
                                @foreach ($categories as $category)
                                <option value="  {!! $category->{'title_' . $sign} ?? '' !!}">    {!! $category->{'title_' . $sign} ?? '' !!}  </option>
                              @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full bg-yellow-600 hover:bg-yellow-700 text-white py-3 px-6 rounded-lg font-semibold transition-colors shadow-md">
                            {{ __('إرسال الرسالة') }}
                        </button>

                        <p class="text-xs text-gray-400 text-center">
                            * {{ __('الحقول المطلوبة. عادةً ما نرد خلال يوم إلى يومي عمل.') }}
                        </p>
                    </form>
                </div>
            </div>

            <!-- Google Map -->
            <div class="mt-16 md:mt-20">
                <h3 class="text-2xl font-bold mb-6 text-yellow-400 text-center"> {{ __('موقعنا على الخريطة') }}</h3>
                <div class="bg-gray-900 rounded-xl overflow-hidden shadow-lg border border-gray-800"
                    style="height: 400px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2994.815219726558!2d31.356652799999996!3d30.051755199999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583d9241596e57%3A0x21e6a6986b3f35dd!2sMWM%20Gulddal%20Systems!5e1!3m2!1sar!2seg!4v1753797339360!5m2!1sar!2seg"
                        style="border:0; width: 100%;height: 100%;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    @stop