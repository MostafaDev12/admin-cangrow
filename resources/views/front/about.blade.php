 
  @extends('layouts.front')

@section('title')
   
{{ __('عن أوبر درايفر') }} -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')

 @stop
@section('content')

    <!-- style="background-image: url('./assets/imgs/testimonials-bg-2-1.jpg')" -->
    <section class="pt-32 pb-20 bg-gradient-to-r from-[#040720] to-blue-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">   {{ __('عن أوبر درايفر') }} </h1>
            
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
                <div
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
                </div>

                <!-- Benefit Card 2 -->
                <div
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
                </div>

                <!-- Benefit Card 3 -->
                <div
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
                </div>
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
                <div
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
                </div>

                <div
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
                </div>

                <div
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
                </div>
            </div>
        </div>
    </section>
@stop