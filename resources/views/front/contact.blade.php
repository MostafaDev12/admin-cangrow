   @extends('layouts.front')

  @section('title')

      {{ __('Contact') }} - {{ $gs->{'title_' . $sign} }}

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

   
    <section id="contact" class="py-16 md:py-20 bg-white text-gray-800  my-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-primary">
                 {{ __('لا تتردد في مراسلتنا') }}             
                </h2>
                <p class="text-base md:text-xl text-gray-600 max-w-3xl mx-auto">
                  {{ __('نحن هنا لمساعدتك والإجابة على جميع استفساراتك') }}           
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-10 md:gap-16">

                <div class="space-y-10 md:space-y-12">

                    <div>
                        <h3 class="text-2xl font-bold mb-6 text-primary">     {{ __('معلومات التواصل') }}  </h3>
                        <div class="space-y-6">

                            <div class="flex items-start gap-4">
                                <div class="bg-primary/10 p-3 rounded-lg text-primary">
                                    <i data-lucide="phone" class="h-6 w-6"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg mb-1 text-gray-900"> {{ __('الهاتف') }}  </h4>
                                    @foreach ($phones as $phone)
                                        <p class="text-gray-600">{{ $phone }}</p>
                                    @endforeach
                                   
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="bg-primary/10 p-3 rounded-lg text-primary">
                                    <i data-lucide="mail" class="h-6 w-6"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg mb-1 text-gray-900">    {{ __('البريد الإلكتروني') }}  </h4>
                                    
                                    @foreach ($emails as $email)
                                        <p class="text-gray-600">{{ $email }}</p>
                                    @endforeach

                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="bg-primary/10 p-3 rounded-lg text-primary">
                                    <i data-lucide="map-pin" class="h-6 w-6"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg mb-1 text-gray-900"> {{ __('العنوان') }}  </h4>
                                    @foreach ($addresses as $address)
                                        <p class="text-gray-600">{{ $address }}</p>
                                    @endforeach
                                 
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="bg-primary/10 p-3 rounded-lg text-primary">
                                    <i data-lucide="clock" class="h-6 w-6"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg mb-1 text-gray-900">    {{ __('ساعات العمل') }}  </h4>
                                    <p class="text-gray-600">      {{ __('طوال أيام الأسبوع') }}  </p>
                                    <p class="text-gray-600">        {{ __('من 9 صباحاً حتى 10 مساءً') }}  </p>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>

                <div class="bg-gray-50 p-6 md:p-8 rounded-xl shadow-md border border-gray-200">
                    <h3 class="text-2xl font-bold mb-6 text-primary">   {{ __('تواصل معنا') }}  </h3>
                  
                            <form enctype="multipart/form-data" action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST" autocomplete="off" class="space-y-6">
                            {{csrf_field()}}
                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>
                        <div>
                            <label for="name" class="block text-gray-700 text-sm font-medium mb-1"> {{ __('الإسم') }}  <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name"  required placeholder="أدخل اسمك الكامل"
                                class="w-full px-4 py-3 bg-white border fname border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none text-gray-800" />
                        </div>

                        <div>
                            <label for="phone" class="block text-gray-700 text-sm font-medium mb-1">    {{ __('رقم الهاتف') }}  <span
                                    class="text-red-500">*</span></label>
                            <input type="tel" id="phone" name="phone" required placeholder="+20 123 456 7890"
                                class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none text-gray-800" />
                        </div>

                        <div>
                            <label for="message" class="block text-gray-700 text-sm font-medium mb-1">{{ __('الرسالة') }}  
                                ({{ __('اختياري') }}  )</label>
                            <textarea id="message" name="text" rows="5" placeholder="أخبرنا بما تحتاج..."
                                class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none text-gray-800"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-primary hover:bg-secondary text-white py-3 px-6 rounded-lg font-semibold transition-colors shadow-md">
                            {{ __('إرسال') }}  
                        </button>

                        <p class="text-xs text-gray-500 text-center mt-2">
                           {{ __('جميع الحقول مطلوبة ما عدا الرسالة.') }} * 
                        </p>
                    </form>
                </div>
            </div>
{{-- https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d55229.20869695798!2d31.31520908275522!3d30.09918230663322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x14583f62407ca2cb%3A0xde7c59d1f0c0c878!2zV2F0ZXIgVGFuayBwb2x5ZXRoeWxlbmUgdGFuayAtINi02LHZg9ipINmI2YjYqtixINiq2KfZhtmDINiu2LLYp9mG2KfYqiDYp9mE2YXZitin2KksINi02KfYsdi5IE1vc3RhZmEgRWwtTmFoYWFzLCBOYXNyIENpdHksIENhaXJvIEdvdmVybm9yYXRl4oCt!3m2!1d30.0541067!2d31.342114199999997!5e0!3m2!1sen!2seg!4v1644645450580!5m2!1sen!2seg --}}
            <div class="mt-16 md:mt-20">
                <h3 class="text-2xl font-bold mb-6 text-primary text-center">   {{ __('موقعنا على الخريطة') }}    </h3>
                <div class="bg-gray-100 rounded-xl overflow-hidden shadow-md border border-gray-200"
                    style="height: 400px;">
                    <iframe
                        src="{!! $gs->map !!}"
                        width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" title="El Nour Water Tank Cairo Office Map">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
@stop