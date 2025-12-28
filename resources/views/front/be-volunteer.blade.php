 
 @extends('layouts.front')

 @section('title')
         {{ __('كن متطوع') }} - {{ $gs->{'title_' . $sign} }}
 @stop

 @section('gsearch')
     <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}" />
 @stop
 @section('css')
 
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('front/dareltawfik/') }}/assets/style/service_details.css">
    
    <style>

    </style>
 @stop



 @section('content')
     @php
         $phones = explode(',', $gs->phones);
         $randomPhone = Arr::random($phones);
     @endphp
 
    <main>
        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4 max-w-5xl">

                <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-12">
                    <div class="text-center md:text-right">
                        <h2 class="text-6xl md:text-7xl font-extrabold text-gray-100 select-none">
                             {{ __('ستمارة تطوع') }}
                        </h2>
                        <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 -mt-8 md:-mt-10">
                             {{ __('دار التوفيق') }}
                        </h1>
                        <p class="text-gray-600 mt-2">
                             {{ __('يمكنك التقدم للتطوع معنا من خلال ملء النموذج أدناه') }}
                        </p>
                    </div>

                    <div class="flex-shrink-0">
                        <a href="{{ route('services.index',$sign) }}"
                            class="inline-flex items-center justify-center bg-primary text-white font-bold py-3 px-6 rounded-full transition-all duration-300 hover:bg-accent hover:shadow-lg">
                            <span> {{ __('اعرف المشروعات') }}</span>
                            <i class="fa-solid fa-arrow-left mr-2"></i>
                        </a>
                    </div>
                </div>

               
  <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form" method="POST"
                      autocomplete="off" class="bg-white p-8 md:p-12 rounded-lg shadow-xl border border-gray-100">
                      {{ csrf_field() }}
                      <div class="form-group w-100">
                          <div class="response w-100"></div>
                      </div>
                      <input type="hidden" name="form_type" value="be_volunteer">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-8">

                        <div>
                            <label for="full-name" class="block text-sm font-semibold text-gray-700 mb-2"> 
                                 {{ __('الاسم بالكامل') }}</label>
                            <input type="text" name="name" id="full-name" placeholder="   {{ __('اكتب اسمك') }}"
                                class="w-full px-4 py-3 fname bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>

                        <div>
                            <label for="national-id" class="block text-sm font-semibold text-gray-700 mb-2"> 
                                 {{ __('رقم بطاقتك') }}</label>
                            <input type="text" name="national-id" id="national-id" placeholder="     {{ __('اكتب رقم بطاقتك') }}"
                                class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2"> 
                                 {{ __('البريد الالكتروني') }}</label>
                            <input type="email" name="email" id="email" placeholder="support@example.com"
                                class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>

                        <div>
                            <label for="mobile" class="block text-sm font-semibold text-gray-700 mb-2"> 
                                 {{ __('رقم الموبايل') }}</label>
                            <input type="tel" name="mobile" id="mobile" placeholder="01234567899"
                                class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                dir="ltr">
                        </div>

                        <div>
                            <label for="governorate" class="block text-sm font-semibold text-gray-700 mb-2"> 
                                 {{ __('اختر المحافظة') }}
                                </Labe>
                                <select id="governorate" name="governorate"
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    <option> {{ __('اختر المحافظة') }} </option>
                                    <option>القاهرة</option>
                                    <option>الجيزة</option>
                                    <option>الإسكندرية</option>
                                </select>
                        </div>

                        <div>
                            <label for="city" class="block text-sm font-semibold text-gray-700 mb-2"> 
                                 {{ __('اختر المدينة') }}</label>
                            <input type="text" name="city" id="city" placeholder="   {{ __('اختر المدينة') }}"
                                class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>

                        <div>
                            <label for="job" class="block text-sm font-semibold text-gray-700 mb-2"> {{ __('اختر الوظيفة') }}</label>
                            <select id="job" name="job"
                                class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option> {{ __('اختر الوظيفة') }}  </option>
                                <option>{{ __('مهندس') }}</option>
                                <option>{{ __('طبيب') }}</option>
                                <option>{{ __('محاسب') }}</option>
                            </select>
                        </div>

                        <div>
                            <label for="education"
                                class="block text-sm font-semibold text-gray-700 mb-2">{{ __('التعليم') }}</label>
                            <input type="text" name="education" id="education" placeholder="{{ __('التعليم') }}"
                                class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>

                        <div>
                            <label for="duration" class="block text-sm font-semibold text-gray-700 mb-2">     
                                   {{ __('المدة التي ترغب بالتطوع بها') }}</label>
                            <select id="duration" name="duration"
                                class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option> {{ __('اختر المدة') }}</option>
                                <option>{{ __('شهر') }}</option>
                                <option> {{ __('3 أشهر') }}</option>
                                <option> {{ __('6 أشهر') }}</option>
                            </select>
                        </div>

                        <div>
                            <label for="field" class="block text-sm font-semibold text-gray-700 mb-2">     
                                     {{ __('المجال الذي ترغب بالتطوع به هو') }}</label>
                            <select id="field" name="field"
                                class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option>   {{ __('اختر المجال') }}</option>
                                <option>   {{ __('المجال الطبي') }}</option>
                                <option>   {{ __('المجال التعليمي') }}</option>
                                <option>   {{ __('المجال الإغاثي') }}</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label for="experience" class="block text-sm font-semibold text-gray-700 mb-2">   
                                 
                                     {{ __('وصف خبرات سابقة لك في التطوع') }}</label>
                            <textarea name="experience" id="experience" rows="5"
                                placeholder="  {{ __('اكتب وصف خبرات سابقة لك في التطوع') }}"
                                class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
                        </div>

                        <div class="md:col-span-2">
                            <button type="submit"
                                class="bg-primary text-white font-bold py-3 px-10 rounded-full transition-all duration-300 hover:bg-accent hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                   {{ __('إرسال الطلب') }}
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </section>
       
        @include('includes.share')

    </main>

 @stop