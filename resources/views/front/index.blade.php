
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
    <!-- style="background-image: url('./assets/imgs/testimonials-bg-2-1.jpg')" -->
    <section class="relative w-full h-screen bg-[#040720] overflow-hidden">
        <div id="slider" class="w-full h-full">

            <!-- Grid Container -->
            <div class="w-full h-full grid grid-rows-2 md:grid-rows-1 md:grid-cols-2">

                <!-- المحتوى النصي على اليمين (أعلى في الموبايل، يمين في الديسكتوب) -->
                <div
                    class="slider-content my-24 md:my-auto order-2 md:order-1 flex items-center justify-center p-6 md:p-12 z-20">
                    <div id="slider-text" class="max-w-lg w-full text-center md:text-right">
                        <div
                            class="meta text-white font-cairo text-xs md:text-sm tracking-[20px] md:tracking-[30px] text-brand-meta uppercase relative mb-3 md:mb-4">
                                {{ __('اوبر درايفر') }}
                        </div>

                        <h2 id="slide-title"
                            class="font-cairo font-bold text-2xl sm:text-3xl md:text-4xl lg:text-5xl tracking-tight text-white leading-[35px] md:leading-[50px] lg:leading-[80px] mb-4 md:mb-6">
                          {!! $single_slider->{'title_' . $sign} ?? '' !!}
                        </h2>

                        <!-- مخفي للاستخدام في JS -->
                         @foreach ($sliders as $k=>$slider)
                        <span data-slide-title="{{ $k }}" class="hidden">    {!! $slider->{'title_' . $sign} ?? '' !!} </span>
                       @endforeach
                        <div
                            class="meta !text-white font-cairo text-xs md:text-sm tracking-[2px] md:tracking-[3px] text-brand-meta uppercase relative mb-3 md:mb-4">
                             {{ __('الميزة') }}
                        </div>

                        <div id="slide-status"
                            class="font-cairo font-normal text-base md:text-lg lg:text-xl xl:text-[28px] text-white leading-relaxed">
                           {!! $single_slider->{'details_' . $sign} ?? '' !!}
                        </div>

                        <!-- مخفي للاستخدام في JS -->
                           @foreach ($sliders as $k=>$slider)
                           <span data-slide-status="{{ $k }}" class="hidden">  {!! $slider->{'details_' . $sign} ?? '' !!}     </span>
                          @endforeach
                    </div>
                </div>

                <!-- حاوية Three.js للصورة على اليسار (أسفل في الموبايل، يسار في الديسكتوب) -->
                <div id="threejs-container"
                    class="order-1 md:order-2 flex items-center justify-center p-4 md:p-8 z-10 relative">
                    <!-- Pagination في الموبايل أسفل الصورة، في الديسكتوب على اليمين -->
                    <div id="pagination"
                        class="absolute bottom-4 md:bottom-auto md:right-8 md:top-1/2 md:-translate-y-1/2 flex flex-row md:flex-col gap-3 md:gap-4 z-30">
                        @foreach ($sliders as $k=>$slider)
                       
                        <button
                            class="{{ $k == 0 ? 'active' : 'block' }} appearance-none border-0 w-3 h-3 md:w-4 md:h-4 bg-white rounded-full p-0 cursor-pointer relative opacity-100 transition-opacity duration-200 ease-in-out outline-none hover:opacity-50"
                            data-slide="{{ $k }}"></button>

                        @endforeach
 
                    </div>
                </div>
            </div>

            <!-- الصور المخفية -->
            <div class="hidden">
                 @foreach ($sliders as $k=>$slider)
                <img src="{{ $slider->{'photo'} ?? '' }}" alt="{!! $slider->{'title_' . $sign} ?? '' !!}" />
               @endforeach
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="section py-20 bg-white">
        <div class="container mx-auto px-5 max-w-6xl">
            <h2
                class="text-3xl md:text-4xl font-bold text-center mb-16 relative pb-4 after:absolute after:bottom-0 after:right-1/2 after:translate-x-1/2 after:w-16 after:h-1 after:bg-gradient after:rounded">
                 {{ __('اكسب دخلًا في الأوقات التي تختارها، وبالطريقة التي تناسب نمط حياتك.') }}
                </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Benefit Card 1 -->
                <a href="{{ route('contact.index',$sign) }}"
                    class="relative z-10 bg-white rounded-[15px] p-[30px] shadow-lg text-center overflow-hidden transition-all duration-300 hover:-translate-y-[10px] group">
                    <div
                        class="w-[70px] h-[70px] bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-full flex items-center justify-center mx-auto mb-5 text-[24px] transition-all duration-300 group-hover:bg-white group-hover:text-indigo-600">
                        <i class="fas fa-calendar-days"></i>
                    </div>
                    <h3 class="text-[1.5rem] font-bold mb-[15px] transition-all duration-300 group-hover:text-white">
                     {{ __('كن المتحكم في وقتك... اختر ساعات عملك بما يناسبك') }}     
                    </h3>
                    <p class="mb-5 text-gray-600 transition-all duration-300 group-hover:text-white">
                        
                         {{ __('كن مدير نفسك. قد مع أوبر في أي وقت تشاء، ليلًا أو نهارًا، وحدّد جدولك بما يتماشى مع نمط حياتك، وليس العكس.') }}
                    </p>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-500 h-0 opacity-0 transition-all duration-300 group-hover:h-full group-hover:opacity-100 -z-10">
                    </div>
                </a>

                <!-- Benefit Card 2 -->
                <a href="{{ route('contact.index',$sign) }}"
                    class="relative z-10 bg-white rounded-[15px] p-[30px] shadow-lg text-center overflow-hidden transition-all duration-300 hover:-translate-y-[10px] group">
                    <div
                        class="w-[70px] h-[70px] bg-gradient-to-r from-green-500 to-emerald-500 text-white rounded-full flex items-center justify-center mx-auto mb-5 text-[24px] transition-all duration-300 group-hover:bg-white group-hover:text-green-600">
                        <i class="fas fa-car"></i>
                    </div>
                    <h3 class="text-[1.5rem] font-bold mb-[15px] transition-all duration-300 group-hover:text-white">
                            {{ __('حرية التنقل') }}
                    </h3>
                    <p class="mb-5 text-gray-600 transition-all duration-300 group-hover:text-white">
              
                         {{ __('استمتع بالمرونة الكاملة واختر متى وأين تقود، حسب راحتك وظروفك الشخصية.') }}
                    </p>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-green-500 to-emerald-500 h-0 opacity-0 transition-all duration-300 group-hover:h-full group-hover:opacity-100 -z-10">
                    </div>
                </a>

                <!-- Benefit Card 3 -->
                <a href="{{ route('contact.index',$sign) }}"
                    class="relative z-10 bg-white rounded-[15px] p-[30px] shadow-lg text-center overflow-hidden transition-all duration-300 hover:-translate-y-[10px] group">
                    <div
                        class="w-[70px] h-[70px] bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-full flex items-center justify-center mx-auto mb-5 text-[24px] transition-all duration-300 group-hover:bg-white group-hover:text-pink-600">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h3 class="text-[1.5rem] font-bold mb-[15px] transition-all duration-300 group-hover:text-white">
                      
                         {{ __('اربح المزيد') }}
                    </h3>
                    <p class="mb-5 text-gray-600 transition-all duration-300 group-hover:text-white">
                  
                         {{ __('احصل على دخل إضافي من خلال القيادة مع أوبر وقتما تريد وزوّد أرباحك بسهولة.') }}
                    </p>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-pink-500 to-rose-500 h-0 opacity-0 transition-all duration-300 group-hover:h-full group-hover:opacity-100 -z-10">
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Start With Us Section -->
    <section class="section py-20 bg-light">
        <div class="container mx-auto px-5 max-w-6xl">
            <h2
                class="text-3xl md:text-4xl font-bold text-center mb-16 relative pb-4 after:absolute after:bottom-0 after:right-1/2 after:translate-x-1/2 after:w-16 after:h-1 after:bg-gradient after:rounded">
                    {{ __('ابدأ الآن واستفد من الفرص المتاحة أمامك') }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <a href="{{ route('contact.index',$sign) }}"
                    class="benefit-card bg-white rounded-xl p-8 shadow-custom transition-all duration-300 hover:-translate-y-3 text-center relative overflow-hidden group">
                    <div
                        class="benefit-icon w-16 h-16 bg-gradient text-white rounded-full flex items-center justify-center mx-auto mb-6 text-xl transition-all duration-300 group-hover:bg-white group-hover:text-primary">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h3 class="card-title text-xl font-bold mb-4 transition-all duration-300 group-hover:text-white">
                          {{ __('سجّل من خلال الإنترنت') }}</h3>
                    <p class="card-text text-gray transition-all duration-300 group-hover:text-white"> {{ __('كل ما عليك هو تحديد المدينة التي ترغب في القيادة بها ونوع الرخصة التي تمتلكها، وسنرسل لك التعليمات عبر البريد الإلكتروني') }}</p>
                    <div
                        class="absolute inset-0 bg-gradient opacity-0 transition-all duration-300 group-hover:opacity-100 -z-10">
                    </div>
                </a>

                <a href="{{ route('contact.index',$sign) }}"
                    class="benefit-card bg-white rounded-xl p-8 shadow-custom transition-all duration-300 hover:-translate-y-3 text-center relative overflow-hidden group">
                    <div
                        class="benefit-icon w-16 h-16 bg-gradient text-white rounded-full flex items-center justify-center mx-auto mb-6 text-xl transition-all duration-300 group-hover:bg-white group-hover:text-primary">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <h3 class="card-title text-xl font-bold mb-4 transition-all duration-300 group-hover:text-white">
                              {{ __('تحقّق من الشروط المطلوبة') }}</h3>
                    <p class="card-text text-gray transitionall duration-300 group-hover:text-white">      {{ __('جميع الأشخاص مؤهلون للقيادة مع اوبر درايفر. إليك كل ما يجب أن تعرفه إذا كنت تقود في القاهرة أو الإسكندرية أو المنصورة أو الزقازيق أو طنطا أو دمنهور أو الغردقة.') }}</p>
                    <div
                        class="absolute inset-0 bg-gradient opacity-0 transition-all duration-300 group-hover:opacity-100 -z-10">
                    </div>
                </a>

                <a href="{{ route('contact.index',$sign) }}"
                    class="benefit-card bg-white rounded-xl p-8 shadow-custom transition-all duration-300 hover:-translate-y-3 text-center relative overflow-hidden group">
                    <div
                        class="benefit-icon w-16 h-16 bg-gradient text-white rounded-full flex items-center justify-center mx-auto mb-6 text-xl transition-all duration-300 group-hover:bg-white group-hover:text-primary">
                        <i class="fas fa-car"></i>
                    </div>
                    <h3 class="card-title text-xl font-bold mb-4 transition-all duration-300 group-hover:text-white">
                          {{ __('احصل على سيارتك بسهولة') }}</h3>
                    <p class="card-text text-gray transition-all duration-300 group-hover:text-white">      
                             {{ __('يمكنك التسجيل الآن حتى وإن لم تكن تمتلك سيارة تفي بمتطلبات السيارات في مصر في الوقت الحالي.') }}</p>
                    <div
                        class="absolute inset-0 bg-gradient opacity-0 transition-all duration-300 group-hover:opacity-100 -z-10">
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- With You Section -->
    <section class="section py-20 bg-white">
        <div class="container mx-auto px-5 max-w-6xl">
            <h2
                class="text-3xl md:text-4xl font-bold text-center mb-16 relative pb-4 after:absolute after:bottom-0 after:right-1/2 after:translate-x-1/2 after:w-16 after:h-1 after:bg-gradient after:rounded">
                          {{ __('نحن معك حتى تصل') }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <a href="{{ route('contact.index',$sign) }}"
                    class="bg-white rounded-xl p-8 shadow-lg transition-all duration-500 hover:-translate-y-3 text-center relative overflow-hidden group">

                    <div
                        class="w-16 h-16 bg-gradient-to-r from-primary to-pink-500 text-white rounded-full flex items-center justify-center mx-auto mb-6 text-xl transition-transform duration-500 group-hover:scale-110 group-hover:bg-white group-hover:text-primary relative z-10">
                        <i class="fas fa-hands-helping"></i>
                    </div>

                    <h3
                        class="text-xl font-bold mb-4 transition-all duration-500 transform group-hover:-translate-y-1 group-hover:text-white relative z-10">
                                  {{ __('ندعمك في كل رحلة') }}
                    </h3>

                    <p
                        class="text-gray-600 transition-all duration-500 transform group-hover:-translate-y-1 group-hover:text-white relative z-10">
                         {{ __('نحن نريد لكل رحلة مع اوبر درايفر أن تكون ممتعة وسهلة. من خلال التطبيق، نحن هنا لتوفير المساعدة لك في كل خطوة.') }}
                    </p>

                    <div
                        class="absolute inset-0 bg-gradient-to-tr from-primary via-purple-500 to-pink-500 opacity-0 transition-opacity duration-500 group-hover:opacity-100 bg-[length:200%_200%] animate-[bg-move_6s_ease_infinite] -z-10">
                    </div>

                    <div
                        class="absolute top-0 left-0 w-full h-full -translate-x-full bg-white/20 rotate-12 group-hover:animate-[shine_1.5s_ease-in-out_forwards]">
                    </div>
                </a>

                <!-- الكارت الثاني -->
                <a href="{{ route('contact.index',$sign) }}"
                    class="bg-white rounded-xl p-8 shadow-lg transition-all duration-500 hover:-translate-y-3 text-center relative overflow-hidden group">

                    <!-- الأيقونة -->
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-primary to-pink-500 text-white rounded-full flex items-center justify-center mx-auto mb-6 text-xl transition-transform duration-500 group-hover:scale-110 group-hover:bg-white group-hover:text-primary relative z-10">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>

                    <!-- العنوان -->
                    <h3
                        class="text-xl font-bold mb-4 transition-all duration-500 transform group-hover:-translate-y-1 group-hover:text-white relative z-10">
                                {{ __('اتصل بنا الآن') }}
                    </h3>

                    <!-- النص -->
                    <p
                        class="text-gray-600 transition-all duration-500 transform group-hover:-translate-y-1 group-hover:text-white relative z-10">
                        
                      {{ __('إذا كان لديك أي أسئلة أو تحتاج إلى مساعدة، يمكنك زيارة مركز دعم الشريك في القاهرة أو الإسكندرية.') }}
                    </p>

                    <!-- خلفية متحركة -->
                    <div
                        class="absolute inset-0 bg-gradient-to-tr from-primary via-purple-500 to-pink-500 opacity-0 transition-opacity duration-500 group-hover:opacity-100 bg-[length:200%_200%] animate-[bg-move_6s_ease_infinite] -z-10">
                    </div>

                    <!-- لمعة متحركة -->
                    <div
                        class="absolute top-0 left-0 w-full h-full -translate-x-full bg-white/20 rotate-12 group-hover:animate-[shine_1.5s_ease-in-out_forwards]">
                    </div>
                </a>

                <!-- الكارت الثالث -->
                <a href="{{ route('contact.index',$sign) }}"
                    class="bg-white rounded-xl p-8 shadow-lg transition-all duration-500 hover:-translate-y-3 text-center relative overflow-hidden group">

                    <!-- الأيقونة -->
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-primary to-pink-500 text-white rounded-full flex items-center justify-center mx-auto mb-6 text-xl transition-transform duration-500 group-hover:scale-110 group-hover:bg-white group-hover:text-primary relative z-10">
                        <i class="fas fa-shield-alt"></i>
                    </div>

                    <!-- العنوان -->
                    <h3
                        class="text-xl font-bold mb-4 transition-all duration-500 transform group-hover:-translate-y-1 group-hover:text-white relative z-10">
                              {{ __('قيادة بأمان') }}
                    </h3>

                    <!-- النص -->
                    <p
                        class="text-gray-600 transition-all duration-500 transform group-hover:-translate-y-1 group-hover:text-white relative z-10">
                       
                           {{ __('التطبيق فيه مزايا بتساعدك تسوق بأمان، وإن احتجت أي مساعدة، اوبر درايفر بتوفرلك دعم على مدار ٢٤ ساعة.') }}
                    </p>

                    <!-- خلفية متحركة -->
                    <div
                        class="absolute inset-0 bg-gradient-to-tr from-primary via-purple-500 to-pink-500 opacity-0 transition-opacity duration-500 group-hover:opacity-100 bg-[length:200%_200%] animate-[bg-move_6s_ease_infinite] -z-10">
                    </div>

                    <!-- لمعة متحركة -->
                    <div
                        class="absolute top-0 left-0 w-full h-full -translate-x-full bg-white/20 rotate-12 group-hover:animate-[shine_1.5s_ease-in-out_forwards]">
                    </div>
                </a>

            </div>
        </div>
    </section>
    <!-- Banner Section -->
    <!-- Banner Section -->
    <section class="gradient-bg text-white py-16 px-4 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 translate-y-1/2">
            </div>
        </div>

        <!-- Animated Elements -->
        <div
            class="absolute top-10 left-10 w-20 h-20 border-4 border-white border-opacity-30 rounded-full animate-ping">
        </div>
        <div
            class="absolute bottom-10 right-10 w-16 h-16 border-4 border-white border-opacity-30 rounded-full animate-pulse">
        </div>

        <div class="max-w-6xl mx-auto relative z-4">
            <!-- Main Content -->
            <div class="flex flex-col md:flex-row items-center justify-between">
                <!-- Text Content -->
                <div class="md:w-1/2 mb-10 md:mb-0 text-center md:text-right">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fadeInUp"> {{ __('Uber Drive') }}</h1>
                    <p class="text-xl md:text-2xl mb-6 opacity-90 animate-fadeInUp" style="animation-delay: 0.2s;">
                        
                        {{ __('اكسب دخلًا في الوقت والمكان الذي تختاره، مع الحرية التامة لإدارة جدولك.') }}
                    </p>
                    <p class="text-lg mb-8 max-w-lg mx-auto md:mr-0 opacity-80 animate-fadeInUp"
                        style="animation-delay: 0.4s;">
                        
                        {{ __('كن مدير نفسك، واختر ساعات عملك بما يناسب نمط حياتك. قُد ليلًا أو نهارًا، وحدد جدولك بما يتماشى مع راحتك.') }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start animate-fadeInUp"
                        style="animation-delay: 0.6s;">
                        <a  href="{{ route('about.index',$sign) }}"
                            class="text-white bg-custom-blue font-semibold py-3 px-6 rounded-lg shadow-lg hover:bg-gray-100 transition duration-300 transform hover:-translate-y-1 animate-pulse-slow">
                            <i class="fas fa-info-circle ml-2"></i>
                           
                            {{ __( 'تعرف على Uber Drive') }}
                        </a>
                        <a href="{{ route('contact.index',$sign) }}"
                            class="bg-transparent border-2 border-white font-semibold py-3 px-6 rounded-lg transition duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-phone ml-2"></i>
                           
                            {{ __('تواصل معنا') }}
                        </a>
                    </div>
                </div>

                <!-- Visual Element -->
                <div class="md:w-2/5 flex justify-center">
                    <div class="relative">
                        <div
                            class="w-64 h-64 bg-white bg-opacity-20 rounded-full flex items-center justify-center shadow-2xl transform rotate-6 transition duration-1000 hover:rotate-0">
                            <div class="w-56 h-56 bg-white bg-opacity-30 rounded-full flex items-center justify-center">
                                <div
                                    class="w-48 h-48 bg-white rounded-full flex items-center justify-center shadow-inner">
                                    <i class="fas fa-car text-custom-blue text-6xl"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Icons -->
                        <div
                            class="absolute -top-4 -right-4 w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg animate-bounce">
                            <i class="fas fa-star text-white text-xl"></i>
                        </div>
                        <div class="absolute -bottom-4 -left-4 w-14 h-14 bg-green-500 rounded-full flex items-center justify-center shadow-lg animate-bounce"
                            style="animation-delay: 0.5s;">
                            <i class="fas fa-check text-white text-lg"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div
                    class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center transform transition duration-500 hover:scale-105">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-custom-blue text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2"> {{ __('مرونة الوقت') }}</h3>
                    <p class="opacity-90">   {{ __('اختر أوقات العمل التي تناسبك وكن مدير نفسك في كل رحلة.') }}</p>
                </div>

                <div
                    class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center transform transition duration-500 hover:scale-105">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-money-bill text-custom-blue text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2"> {{ __('دخل ممتاز') }}</h3>
                    <p class="opacity-90">    {{ __('احصل على دخل إضافي بسهولة مع كل رحلة تقدمها عبر التطبيق.') }}</p>
                </div>

                <div
                    class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center transform transition duration-500 hover:scale-105">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-car-side text-custom-blue text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">   {{ __('سهولة القيادة') }}</h3>
                    <p class="opacity-90">  
                   {{ __('انضم الآن حتى لو لم تمتلك سيارة، واستفد من خيارات الدعم المتاحة لكل السائقين.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section py-20 bg-light">
        <div class="container mx-auto px-5 max-w-4xl">
            <h2
                class="text-3xl md:text-4xl font-bold text-center mb-16 relative pb-4 after:absolute after:bottom-0 after:right-1/2 after:translate-x-1/2 after:w-16 after:h-1 after:bg-gradient after:rounded">
                   {{ __('الأسئلة الشائعة') }}</h2>

            <div class="faq-container">
                @foreach ($models as $model)
                
                <div
                    class="faq-item bg-white rounded-lg mb-4 overflow-hidden shadow-custom transition-all duration-300 hover:-translate-y-1">
                    <div
                        class="faq-question p-5 text-lg font-semibold cursor-pointer flex justify-between items-center bg-gradient text-white">
                        <span>   {{ $model->{'title_' . $sign} }}   </span>
                        <i class="fas fa-chevron-down transition-transform duration-300"></i>
                    </div>
                    <div class="faq-answer p-5 text-gray">   {{ $model->{'details_' . $sign} }} </div>
                </div>

                @endforeach
                
            </div>
        </div>
    </section>

    <!-- Requirements -->
    <section id="requirements" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-dark mb-12">   {{ __('متطلبات التسجيل كدرايفر في أوبر') }}</h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md card-hover">
                    <i class="fas fa-birthday-cake text-4xl text-primary mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">{{ __('العمر') }}</h3>
                    <p class="text-gray-600">     {{ __('يجب أن يكون عمر المتقدم فوق 21 عامًا') }}</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md card-hover">
                    <i class="fas fa-id-card text-4xl text-primary mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">   {{ __('رخصة القيادة') }}</h3>
                    <p class="text-gray-600">  {{ __('يجب أن تكون رخصة القيادة سارية المفعول') }}</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md card-hover">
                    <i class="fas fa-car text-4xl text-primary mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">{{ __('السيارة') }}</h3>
                    <p class="text-gray-600">   {{ __('يجب أن تكون السيارة بحالة جيدة ومؤمن عليها') }}</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md card-hover">
                    <i class="fas fa-file-contract text-4xl text-primary mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">{{ __('المستندات') }}</h3>
                    <p class="text-gray-600">   {{ __('بطاقة هوية شخصية ومستندات تسجيل السيارة') }}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-primary text-white py-16">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0 fade-in">
                <h2 class="text-4xl font-bold mb-4">   {{ __('انضم إلى أسطول أوبر في مصر وابدأ رحلتك towards النجاح') }}</h2>
                <p class="text-xl mb-6">   
                {{ __('سجل الآن كسائق مع أوبر وتمتع بمرونة العمل وزيادة دخلك مع منصة المواصلات الرائدة في مصر.') }}      </p>
                <div class="flex items-center bg-white text-primary p-4 rounded-lg shadow-lg">
                    <i class="fas fa-phone-alt text-2xl ml-3"></i>
                    <div>
                        <p class="font-medium"> {{ __('التسجيل المباشر عبر الهاتف') }}</p>
                        <a href="tel:+2{{ $randomPhone }}"
                            class="text-2xl font-bold hover:text-secondary transition">{{ $randomPhone }}</a>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="{{ asset('front/uber_driver/') }}/assets/imgs/img-1.png" alt="سيارة أوبر" class="w-4/5 floating">
            </div>
        </div>
    </section>

    <!-- Benefits -->
    <section id="benefits" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-dark mb-12">       {{ __('مزايا العمل مع أوبر') }}</h2>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-primary to-secondary text-white p-6 rounded-xl card-hover">
                    <i class="fas fa-user-clock text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">   {{ __('مرونة الوقت') }}</h3>
                    <p>     {{ __('اختر أوقات العمل التي تناسبك وكن مديرًا لنفسك') }}</p>
                </div>

                <div class="bg-gradient-to-br from-primary to-secondary text-white p-6 rounded-xl card-hover">
                    <i class="fas fa-money-bill-wave text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">   {{ __('دخل ممتاز') }}</h3>
                    <p>   {{ __('احصل على دخل مجزٍ يزيد مع زيادة عدد الرحلات') }}</p>
                </div>

                <div class="bg-gradient-to-br from-primary to-secondary text-white p-6 rounded-xl card-hover">
                    <i class="fas fa-utensils text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">   {{ __('دخل إضافي') }}</h3>
                    <p>    {{ __('احصل على فرص دخل إضافية من خلال أوبر إيتس') }}</p>
                </div>
            </div>

            <div class="mt-12 bg-gray-100 p-8 rounded-xl">
                <h3 class="text-2xl font-semibold text-center text-dark mb-6">   {{ __('نصائح لزيادة دخلك مع أوبر') }}</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex items-start">
                        <i class="fas fa-clock text-accent text-2xl ml-3 mt-1"></i>
                        <div>
                            <h4 class="font-semibold">   {{ __('العمل في أوقات الذروة') }}</h4>
                            <p class="text-gray-600">    {{ __('احصل على عوائد أعلى خلال ساعات الذروة عندما يزداد الطلب') }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-map-marker-alt text-accent text-2xl ml-3 mt-1"></i>
                        <div>
                            <h4 class="font-semibold">   {{ __('الوجود في المناطق المزدحمة') }}</h4>
                            <p class="text-gray-600">        
                                 {{ __('انتقل إلى المناطق ذات الكثافة السكانية العالية للعثور على ركاب بسرعة') }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-star text-accent text-2xl ml-3 mt-1"></i>
                        <div>
                            <h4 class="font-semibold">   {{ __('تقييمات عالية') }}</h4>
                            <p class="text-gray-600">   {{ __('حافظ على تقييمات عالية لتحصل على مكافآت ومزايا إضافية') }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-gift text-accent text-2xl ml-3 mt-1"></i>
                        <div>
                            <h4 class="font-semibold">     {{ __('استفد من العروض') }}</h4>
                            <p class="text-gray-600">     {{ __('استفد من العروض والمكافآت التي تقدمها أوبر بشكل منتظم') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hero min-h-screen flex items-center relative overflow-hidden pt-[100px]"
        style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('front/uber_driver/') }}/assets/imgs/driver.jpg') no-repeat center center/cover;">
        <div class="container mx-auto px-5 max-w-6xl">
            <div class="flex flex-col md:flex-row items-center relative z-10">
                <div class="hero-content md:w-1/2 text-white">
                    <p class="text-sky-300 text-lg font-medium mb-4 animate-fade-in-up">  {{ __('أوبر مصر | تسجيل سائق أوبر') }}</p>
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-up" style="animation-delay: 0.2s;">
                            {{ __('انضم الآن لأسطول أوبر في مصر وابدأ في تحقيق الربح') }}
                    </h1>
                    <p class="text-white/80 mb-8 text-lg animate-fade-in-up" style="animation-delay: 0.4s;">
                       
                          {{ __('استثمر وقتك أثناء القيادة بأقصى كفاءة من خلال تقديم الرحلات عبر التطبيق الذي يضم أكبر عدد من الركاب الباحثين عن رحلات باستمرار.') }}
                    </p>
                    <a href="tel:+2{{ $randomPhone }}"
                        class="btn bg-gradient-to-r from-blue-500 to-sky-400 text-white px-8 py-4 rounded-full font-semibold inline-flex items-center shadow-lg hover:shadow-xl transition-all duration-300 mb-4 animate-fade-in-up"
                        style="animation-delay: 0.6s;">📞  {{ __('سجّل الآن') }}    : {{ $randomPhone }}</a>
                    <p class="mt-4 text-sm text-white/70">    {{ __('تعرف أكثر عن القيادة والتوصيل') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="news" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-dark mb-12">       {{ __('آخر أخبار أوبر') }}</h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
              
               @foreach($blogs as $blogg) 
                <div class="bg-white rounded-xl overflow-hidden shadow-md card-hover">
                    <div class="h-40 bg-gradient-to-r from-primary to-secondary flex items-center justify-center">
                        <i class="fas fa-money-bill-wave text-5xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <span class="text-sm text-accent font-semibold"> {{ optional($blogg->category)->{'title_' . $sign} }}   </span>
                        <h3 class="text-xl font-semibold my-2">   {{ $blogg->{'title_' . $sign} }}    </h3>
                        <p class="text-gray-600">  {{ $blogg->{'short_details_' . $sign} }}</p>
                        <a href="{{ route('single-blog.index',['lang'=> $sign , 'blog' =>$blogg->{'slug_' . $sign} ]) }}" class="block mt-4 text-primary font-semibold hover:text-secondary transition"> 
                               
                            {{ __('قراءة المزيد') }} 
                            <i class="fas fa-arrow-left ml-1"></i></a>
                    </div>
                </div>
                @endforeach
               
 
            </div>
            
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