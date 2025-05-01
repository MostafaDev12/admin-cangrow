      
@extends('layouts.front')

@section('title')
   
        {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

@php
$phones =  explode(',', $gs->phones);
$emails =   explode(',', $gs->emails);
 
$randomPhone = Arr::random($phones);
@endphp
    <section class="pt-32 pb-20 px-6 md:px-12 bg-black text-white">
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-12 md:mb-0">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                    {{ $sliders->{'title_' . $sign}  ?? ''}}
                
                </h1>
                <p class="text-xl mb-8 text-gray-300">

                    {!! $sliders->{'details_' . $sign}  ?? '' !!}
                
                </p>
                <button class="bg-white text-black px-6 py-3 rounded-lg text-lg font-semibold"  onclick="window.location.href='{{ route('contact.index') }}'">
                    {{ __('سجل للقيادة') }}   
                </button>

                <p class="mt-6 text-sm text-gray-400">
                    {{ __('تعرف أكثر عن القيادة والتوصيل') }}
                </p>
            </div>
            <div class="md:w-1/2">
                <img src="{{ $sliders->{'photo'}  ?? 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80'}}"
                    alt="سائق مع سيارة" class="rounded-lg shadow-2xl" />
            </div>
        </div>
    </section>

    <!-- <section class="bg-white">
        <div class="container my-10 mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center">
                المزيد من الطرق للربح
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="flex flex-col items-center text-center">
                    <div class="bg-gray-100 p-6 rounded mb-6">
                        <div class="w-full h-full">
                        </div>
                        <div class="bg-gray-100 p-6 rounded mb-6">
                        </div>
                    </div>

                </div>
            </div>


    </section> -->
    <!-- Benefits Section -->
    <section id="benefits" class="py-20 px-6 md:px-12 bg-white">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center">
                {{ __('حقِّق الدخل في الوقت الذي يناسبك') }}
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

                @foreach ($points as $point)
                <div class="flex flex-col items-center text-center">
                    <div class="bg-gray-100 p-6 rounded-full mb-6">
                        <i class="fa-solid fa-calendar-days text-3xl text-black"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3"> {{ $point->{'title_' . $sign}  ?? ''}}        </h3>
                    <p class="text-gray-600">
                        {{ $point->{'details_' . $sign}  ?? ''}}
                    </p>
                </div>
                @endforeach
 
            </div>
        </div>
    </section>
    <!-- Start with Us -->
    <section id="start-with-us" class="py-20 px-6 md:px-12 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center">
                 {{ __('ابدأ الأن') }}   
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

                @foreach ($models as $model)
                    <div class="flex flex-col items-center text-center">
                    <div class="bg-white p-6 rounded-full mb-6">
                        <i class="fa-solid fa-star text-3xl text-black"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3"> {{ $model->{'title_' . $sign}  ?? ''}}     </h3>
                    <p class="text-gray-600">
                        {{ $model->{'details_' . $sign}  ?? ''}}
                    </p>
                </div>


                @endforeach
                
              

            </div>
        </div>
    </section>
    <!-- Start with Us -->
    <!-- With Your -->
    <section id="with-you" class="py-20 px-6 md:px-12 bg-white">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center">
                  {{ __('معاك لحد ما توصل') }}   
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                @foreach ($conects as $conect)
                <div class="flex flex-col items-center text-center">
                    <div class="bg-gray-100 p-6 rounded-full mb-6">
                        <i class="fa-solid fa-headphones text-3xl text-black"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">   {{ $conect->{'title_' . $sign}  ?? ''}}    
                    </h3>
                    <p class="text-gray-600">
                        {{ $conect->{'details_' . $sign}  ?? ''}}
                    </p>
                </div>
             
                @endforeach
            </div>
        </div>
    </section>
    <!-- Start with Us -->
    <!-- FAQ Section -->
    <section id="faq" class="py-20 px-6 md:px-12 bg-white">
        <div class="container mx-auto max-w-4xl">
            <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center">
                  {{ __('الأسئلة الشائعة') }}   
            </h2>

            <div class="space-y-4">
                @foreach ($faqs as $faq)
                    
                <details class="rounded-lg p-2">
                    <summary class="text-lg font-medium px-4 cursor-pointer">
                        {{ $faq->{'title_' . $sign}  ?? ''}}  </summary>
                    <div class="px-4 text-gray-700 mt-2">
                        {{ $faq->{'details_' . $sign}  ?? ''}}
                    </div>
                </details>
 

                @endforeach


            </div>
        </div>
    </section>
    <section class="bg-white flex items-center justify-center">
        <div class="container mx-auto max-w-4xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="flex flex-col justify-center">
                    <h2 class="text-2xl font-bold">       {{ __('تطبيق شريك أوبر') }}   
                    </h2>
                    <p class="text-gray-600 mt-6">
                      {{ __('تم تصميم التطبيق بالتعاون مع الشركاء السائقين لتلبية احتياجاتهم، ويتميز بسهولة الاستخدام والموثوقية. سيقدِّم لك التطبيق كل ما تحتاج إلى معرفته لتصبح شريكاً سائقاً مع أوبر.') }}
                    </p>
                </div>
                <div class="max-w-2xl">
                    <img src="{{ $ps->portfolio_photo }}" alt="app" class="w-full h-full object-cover">

                </div>
            </div>

        </div>

    </section>
    <!-- Requirements Section -->
    <!-- <section id="requirements" class="py-20 px-6 md:px-12 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center">
                المتطلبات
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold mb-6">متطلبات السائق</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <span class="bg-black text-white p-1 rounded-full ml-4 mt-1">✓</span>
                            <div>
                                <h4 class="font-medium">الحد الأدنى للعمر</h4>
                                <p class="text-gray-600">يجب أن يكون عمرك 21 عامًا على الأقل</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-black text-white p-1 rounded-full ml-4 mt-1">✓</span>
                            <div>
                                <h4 class="font-medium">رخصة قيادة سارية</h4>
                                <p class="text-gray-600">يجب أن تكون لديك رخصة قيادة سارية صادرة في بلدك</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-black text-white p-1 rounded-full ml-4 mt-1">✓</span>
                            <div>
                                <h4 class="font-medium">خبرة في القيادة</h4>
                                <p class="text-gray-600">سنة واحدة على الأقل من خبرة القيادة المرخصة</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-black text-white p-1 rounded-full ml-4 mt-1">✓</span>
                            <div>
                                <h4 class="font-medium">التحقق من الخلفية</h4>
                                <p class="text-gray-600">يجب اجتياز فحص الخلفية</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold mb-6">متطلبات السيارة</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <span class="bg-black text-white p-1 rounded-full ml-4 mt-1">✓</span>
                            <div>
                                <h4 class="font-medium">موديل السيارة</h4>
                                <p class="text-gray-600">2008 أو أحدث (يختلف حسب المدينة)</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-black text-white p-1 rounded-full ml-4 mt-1">✓</span>
                            <div>
                                <h4 class="font-medium">سيارة بأربعة أبواب</h4>
                                <p class="text-gray-600">يجب أن تكون بأربعة أبواب وتتسع لـ 4 ركاب على الأقل</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-black text-white p-1 rounded-full ml-4 mt-1">✓</span>
                            <div>
                                <h4 class="font-medium">حالة جيدة</h4>
                                <p class="text-gray-600">لا أضرار خارجية، لا علامات تجارية</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-black text-white p-1 rounded-full ml-4 mt-1">✓</span>
                            <div>
                                <h4 class="font-medium">التأمين</h4>
                                <p class="text-gray-600">تأمين ساري مع وجود اسمك على البوليصة</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section> -->

    <!-- How It Works -->
    <!-- <section id="how-it-works" class="py-20 px-6 md:px-12 bg-white">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center">
                كيف يعمل
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex flex-col items-center text-center">
                    <div class="bg-gray-100 w-16 h-16 flex items-center justify-center rounded-full mb-6">
                        <span class="text-2xl font-bold">١</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">التسجيل</h3>
                    <p class="text-gray-600">
                        أخبرنا عن نفسك وعن سيارتك. التأمين مطلوب وستحتاج إلى رخصة قيادة سارية.
                    </p>
                </div>

                <div class="flex flex-col items-center text-center">
                    <div class="bg-gray-100 w-16 h-16 flex items-center justify-center rounded-full mb-6">
                        <span class="text-2xl font-bold">٢</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">الموافقة</h3>
                    <p class="text-gray-600">
                        شارك بعض المستندات المطلوبة وقدم معلومات للتحقق من الخلفية.
                    </p>
                </div>

                <div class="flex flex-col items-center text-center">
                    <div class="bg-gray-100 w-16 h-16 flex items-center justify-center rounded-full mb-6">
                        <span class="text-2xl font-bold">٣</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">ابدأ القيادة</h3>
                    <p class="text-gray-600">
                        بمجرد الموافقة، قم بتنزيل التطبيق وابدأ في تلقي طلبات الرحلات في منطقتك.
                    </p>
                </div>
            </div>

            <div class="text-center mt-16">
                <button class="bg-black text-white px-6 py-3 rounded-lg text-lg font-semibold">
                    ابدأ الآن <i class="fas fa-arrow-left ml-2"></i>
                </button>
            </div>
        </div>
    </section> -->

    <!-- App Features -->
    <!-- <section class="py-20 px-6 md:px-12 bg-gray-100">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <img src="https://images.unsplash.com/photo-1512149074996-e923ac45a221?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                        alt="تطبيق السائق" class="rounded-lg shadow-xl" />
                </div>
                <div class="md:w-1/2 md:pr-16">
                    <h2 class="text-3xl md:text-4xl font-bold mb-8">
                        مصمم مع مراعاة السائقين
                    </h2>

                    <div class="space-y-8">
                        <div class="flex items-start">
                            <div class="bg-black p-3 rounded-full ml-4">
                                <i class="fas fa-map text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">التنقل داخل التطبيق</h3>
                                <p class="text-gray-600">احصل على توجيهات خطوة بخطوة وبيانات حركة المرور في
                                    الوقت الحقيقي مباشرة في التطبيق.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-black p-3 rounded-full ml-4">
                                <i class="fas fa-mobile-alt text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">استرداد نقود سهل</h3>
                                <p class="text-gray-600">قم بتحويل أرباحك إلى حسابك المصرفي متى أردت.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-black p-3 rounded-full ml-4">
                                <i class="fas fa-car text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">حلول المركبات</h3>
                                <p class="text-gray-600">ليس لديك سيارة؟ احصل على خيارات تأجير مصممة لسائقي
                                    المشاركة في الرحلات.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="container mx-auto">
        <h2 class="text-2xl font-bold border-b-2 border-black pb-2">  {{ $ps->{'portfolio_title_' . $sign}  ?? ''}}  </h2>
        <p >     
            {!! $ps->{'portfolio_details_' . $sign}  ?? '' !!}
        </p>
     
    </section>
    <!-- Sign Up CTA -->
   

    
  @stop