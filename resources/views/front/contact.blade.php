 
   @extends('layouts.front')

  @section('title')

      {{ __('اتصل بنا') }} - {{ $gs->{'title_' . $sign} }}

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

    <section class="pt-32 pb-20 bg-gradient-to-r from-[#040720] to-blue-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">    {{ __('اتصل بنا') }}  </h1>
            
        </div>
    </section>

        <!-- Contact Section -->
    <section id="contact" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-dark mb-12">         {{ __('اتصل بنا للتسجيل المباشر') }}</h2>

            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <div class="bg-primary text-white p-8 rounded-xl mb-8">
                        <i class="fas fa-phone-alt text-4xl mb-4"></i>
                        <h3 class="text-2xl font-semibold mb-2">       {{ __('التسجيل عبر الهاتف') }}</h3>
                        <p class="mb-4">     :  {{ __('اتصل بنا على الرقم التالي للاستفسار أو بدء عملية التسجيل') }}</p>
                        <a href="tel:+2{{ $randomPhone }}"
                            class="text-3xl font-bold block mb-6 hover:text-secondary transition">{{ $randomPhone }}</a>
                        <p>      {{ __('خدمة العملاء متاحة من الساعة 9 صباحًا حتى 5 مساءً طوال أيام الأسبوع.') }}</p>
                    </div>

                    <div class="bg-gray-100 p-6 rounded-xl">
                        <h3 class="text-xl font-semibold mb-4">     {{ __('معلومات إضافية') }}</h3>
                        <div class="space-y-4">
                            <div class="flex">
                                <i class="fas fa-clock text-primary text-xl ml-3 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold">     {{ __('أوقات المعالجة') }}</h4>
                                    <p class="text-gray-600">   {{ __('تستغرق عملية المراجعة والموافقة من يوم إلى أسبوع') }}</p>
                                </div>
                            </div>
                            <div class="flex">
                                <i class="fas fa-question-circle text-primary text-xl ml-3 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold">  {{ __('الدعم') }}</h4>
                                    <p class="text-gray-600">    {{ __('فريق الدعم متاح للإجابة على جميع استفساراتك') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="bg-gray-100 p-8 rounded-xl">
                        <h3 class="text-2xl font-semibold mb-6">       {{ __('أرسل لنا استفسارك') }}</h3>
                        
                          <form enctype="multipart/form-data" action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST" autocomplete="off" class="cons-contact-form">
                            {{csrf_field()}}
                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 mb-2">     {{ __('الاسم بالكامل') }}</label>
                                <input type="text" id="name" name="name"
                                    class="fname w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="block text-gray-700 mb-2">     {{ __('رقم الهاتف') }}</label>
                                <input type="tel" id="phone" name="phone"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <div class="mb-4">
                                <label for="message" class="block text-gray-700 mb-2">  {{ __('الاستفسار') }}</label>
                                <textarea id="message" rows="5" name="text"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                            </div>
                            <button type="submit"
                                class="w-full bg-primary hover:bg-secondary text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                                     {{ __('إرسال الاستفسار') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @stop