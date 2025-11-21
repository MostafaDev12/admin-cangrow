 

 @extends('layouts.front')

 @section('title')

     {{ $gs->{'title_' . $sign} }}

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
         $randomEmail = Arr::random($emails);
     @endphp
    <section id="home"
        class="pt-24 bg-gradient-to-br from-white via-gray-50 to-gray-100 text-gray-700 relative overflow-hidden">

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8 py-20 lg:py-32">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <div class="space-y-8">
                    <div class="space-y-4">
                        <h1 class="text-4xl lg:text-6xl font-extrabold leading-tight text-gray-900">
                          {{ __('خزانات مياه النور') }}
                            <span class="block text-primary"> {{ __('جودة - قوة - ضمان') }} </span>
                        </h1>
                        <p class="text-lg text-gray-600 leading-relaxed max-w-xl">
                            {!! $ps->{'portfolio_details_' . $sign}  ?? '' !!} 
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href=" {{ route('contact.index', ['lang' => $sign]) }}"
                            class="bg-primary hover:bg-secondary text-white px-8 py-4 rounded-2xl font-semibold flex items-center justify-center shadow-lg transition duration-300">
                               {{ __('اطلب الآن') }}
                            <i class="fas fa-arrow-right mr-3"></i>
                    </a>
                        
                    </div>

                    <div class="grid grid-cols-3 gap-8 pt-8 border-t border-gray-200">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary">{{ __('+10') }}</div>
                            <div class="text-sm text-gray-500">   {{ __('سنوات خبرة') }}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary">{{ __('+5000') }}</div>
                            <div class="text-sm text-gray-500">   {{ __('عميل راضٍ') }}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary">{{ __('100%') }}</div>
                            <div class="text-sm text-gray-500">   {{ __('جودة مضمونة') }}</div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-xl">
                        <div class="space-y-6">
                            <div class="h-64 bg-gray-100 rounded-xl flex items-center justify-center">
                                <img src="{{ $slider->{'photo'} ?? '' }}" alt="خزان مياه" class="h-full object-contain">
                            </div>
                            <div class="space-y-3">
                                <h3 class="text-xl font-semibold text-gray-900">   {!! $slider->{'title_' . $sign} ?? '' !!}    </h3>
                                <p class="text-gray-600">
                                   {!! $slider->{'details_' . $sign} ?? '' !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="services" class="py-20 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-primary mb-4">{{ __('خدماتنا') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ __('نقدم حلول متكاملة لتخزين المياه والمنتجات المصنوعة من أجود الخامات وبأعلى معايير الجودة.') }}
                </p>
            </div>

            <div id="services-grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">


 @foreach ($servicess as $service)
                <div
                    class="bg-gray-50 rounded-xl shadow-md border border-gray-200 hover:shadow-lg group transition-all hover:-translate-y-2 duration-300">

                    <div class="h-48 w-full overflow-hidden rounded-t-xl bg-white">
                        <img src="{!! $service->photo !!}" alt="     {!! $service->{'title_' . $sign} ?? '' !!} "
                            class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
                    </div>

                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="bg-primary/10 p-3 rounded-lg">
                                <i data-lucide="droplet" class="h-6 w-6 text-primary"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">    {!! $service->{'title_' . $sign} ?? '' !!} </h3>
                        </div>

                        <p class="text-gray-600 text-sm leading-relaxed">
                           {!! $service->{'short_details_' . $sign} ?? '' !!}
                        </p>

                        <a href="{{ route('single-service-service.index', ['lang' => $sign, 'slug' => $service->{'slug_' . $sign}]) }}" class="inline-block text-sm font-semibold text-accent hover:underline">
                                {{ __('المزيد عن المنتج') }}     →
                        </a>
                    </div>
                </div>
                @endforeach
 
            </div>
        </div>
    </section>


    <section id="about" class="py-20 bg-gray-50 text-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <div class="space-y-8">
                    <div>
                        <h2 class="text-4xl font-bold text-primary mb-6">
                        {{ $ps->{'about_title_' . $sign} ?? '' }}
                        </h2>
                        <div class="space-y-4 text-gray-600 leading-relaxed">
                           {!! $ps->{'about_details_' . $sign} ?? '' !!}
                        </div>


                    </div>

                    <div class="grid grid-cols-2 gap-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-2">{{ __('20+') }}</div>
                            <div class="text-gray-600">   {{ __('عام خبرة') }}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-2">{{ __('99.7%') }}</div>
                            <div class="text-gray-600"> {{ __('رضا العملاء') }}  </div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-2">{{ __('45+') }}</div>
                            <div class="text-gray-600">    {{ __('منتج متنوع') }}  </div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-2">{{ __('24/7') }}</div>
                            <div class="text-gray-600">    {{ __('خدمة الدعم') }}  </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg border border-gray-200">
                        <h3 class="text-lg font-semibold text-primary mb-4">
                                 {{ __('ما يميز منتجاتنا') }}  
                        </h3>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="flex items-center text-sm gap-2 text-gray-700">
                                <div class="w-2 h-2 bg-accent rounded-full"></div>
                                     {{ __('خامات عالية الجودة') }}  
                            </div>
                            <div class="flex items-center text-sm gap-2 text-gray-700">
                                <div class="w-2 h-2 bg-accent rounded-full"></div>
                                     {{ __('مقاومة للصدأ والتآكل') }}  
                            </div>
                            <div class="flex items-center text-sm gap-2 text-gray-700">
                                <div class="w-2 h-2 bg-accent rounded-full"></div>
                                     {{ __('تصميم آمن وصحي') }}  
                            </div>
                            <div class="flex items-center text-sm gap-2 text-gray-700">
                                <div class="w-2 h-2 bg-accent rounded-full"></div>
                                     {{ __('سهولة النقل والتركيب') }}  
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg border border-gray-200">
                        <h3 class="text-2xl font-bold text-primary mb-4 flex items-center">
                       {{ __('رسالتنا') }}     
                        </h3>
                        <p class="text-gray-600 leading-relaxed">
                          {{ __('أن نكون الرواد في مجال صناعة خزانات المياه والحلول المتكاملة لتخزين المياه والمواد، مع توفير منتجات آمنة، صحية، وبأسعار في متناول الجميع.') }}      
                        </p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div
                        class="flex items-start gap-4 p-6 rounded-lg bg-white hover:bg-gray-100 transition-colors border border-gray-200">
                        <div class="bg-accent p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="award" class="h-6 w-6"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-secondary mb-2">     {{ __('جودة مضمونة') }}</h3>
                            <p class="text-gray-600">
                              {{ __('جميع الخزانات مصنوعة من خامات معتمدة ومعالجة غذائيًا لتخزين مياه الشرب بشكل آمن.') }}
                            </p>
                        </div>
                    </div>

                    <div
                        class="flex items-start gap-4 p-6 rounded-lg bg-white hover:bg-gray-100 transition-colors border border-gray-200">
                        <div class="bg-accent p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="target" class="h-6 w-6"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-secondary mb-2">   {{ __('التزام وموثوقية') }}</h3>
                            <p class="text-gray-600">
                             {{ __('نحرص على تسليم منتجاتنا في المواعيد المحددة مع متابعة مستمرة لما بعد البيع.') }}
                            </p>
                        </div>
                    </div>

                    <div
                        class="flex items-start gap-4 p-6 rounded-lg bg-white hover:bg-gray-100 transition-colors border border-gray-200">
                        <div class="bg-accent p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="users" class="h-6 w-6"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-secondary mb-2">   {{ __('عملاء سعداء') }}</h3>
                            <p class="text-gray-600">
                                  {{ __('نفتخر بوجود آلاف العملاء الراضين عن منتجاتنا داخل مصر وخارجها.') }}
                            </p>
                        </div>
                    </div>

                    <div
                        class="flex items-start gap-4 p-6 rounded-lg bg-white hover:bg-gray-100 transition-colors border border-gray-200">
                        <div class="bg-accent p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="lightbulb" class="h-6 w-6"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-secondary mb-2">   {{ __('ابتكار وتطوير') }}</h3>
                            <p class="text-gray-600">
                                   {{ __('نواكب أحدث التقنيات العالمية في صناعة الخزانات ونطور منتجاتنا باستمرار.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="contact" class="py-16 md:py-20 bg-white text-gray-800">
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