
@php
$phones =  explode(',', $gs->phones);
$emails =   explode(',', $gs->emails);
 
$randomPhone = Arr::random($phones);
@endphp

<section
        class="bg-gradient-to-r from-blue-500 to-green-400 text-white h-[350px] flex flex-col items-center justify-center sm:mt-0 mt-10">
        <div class="text-center px-4">
            <h1 class="sm:text-4xl text-xl font-bold mb-4">
             
                  {{ __('تواصل معنا اليوم لبدء رحلتك إلى ابتسامة أكثر صحة') }} 
            </h1>
            <p class="text-sm lg:text-lg mb-8 max-w-2xl mx-auto">
           
                {{ __('فريقنا جاهز للمساعدة في المواعيد والإجابة على أسئلتك وإرشادك نحو تحقيق ابتسامتك المثالية') }}
            </p>
            <div class="flex space-x-4 space-x-reverse justify-center items-center">
                <a href="{{ route('contact.index') }}"
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold lg:font-bold text-sm lg:text-lg py-2 px-4 sm:px-6 rounded-full transition duration-300">
                       {{ __('تواصل معنا') }}
                </a>
                <span class="text-white text-xl lg:mt-2 pr-3">{{ __('أو') }}</span>
                <a href="https://wa.me/{{ $randomPhone }}" target="_blank"
                    class="text-white font-semibold text-sm lg:text-lg py-2 px-4 sm:px-6 rounded-full border-2 border-white hover:bg-white hover:text-blue-500 transition duration-300">
                    {{ __('احجز موعدك') }}
                </a>
            </div>
        </div>
    </section>