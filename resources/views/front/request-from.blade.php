 
  
   @extends('layouts.front')

@section('title')
   
{{ $service->{'title_' . $sign} }} -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')

 @stop

@section('content')
 
  


    <main>
        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4 max-w-5xl">

                <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-12">
                    <div class="text-center md:text-right">
                        <h2 class="text-6xl md:text-7xl font-extrabold text-gray-100 select-none">
                        {{__('استمارة الطلب')}}       
                        </h2>
                        <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 -mt-8 md:-mt-10">
                         {{__('دار التوفيق')}}       
                        </h1>
                       
                    </div>

                    <div class="flex-shrink-0">
                        <div 
                            class="inline-flex items-center justify-center text-primary text-3xl font-bold py-3 px-6 rounded-full transition-all duration-300 hover:text-white hover:bg-accent hover:shadow-lg">
                            <span>  {{__('قدم طلبك الأن')}}     </span>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-2 md:gap-4 md:grid-cols-2">
                    <div class="content-section">
                      

                        <div class="main-image-container">
                            <img src="{{ $service->photo }}"
                                alt="{{ $service->{'title_' . $sign} }}" class="main-image">
                        </div>





                        <div class="description">
                            <p> 
                            
                            {!! $service->{'details_' . $sign} !!}
                                  </p>
                        </div>


                    </div>
                   
   <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form" method="POST"
                      autocomplete="off" class="bg-white p-8 md:p-12">
                      {{ csrf_field() }}
                      <div class="form-group w-100">
                          <div class="response w-100"></div>
                      </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-8">

                            <div>
                                <label for="full-name" class="block text-sm font-semibold text-gray-700 mb-2"> 
                                    * {{__('الاسم بالكامل')}} </label>
                                <input required type="text" name="name" id="full-name" placeholder="اكتب اسمك"
                                    class="fname w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>

                            <div>
                                <label for="national-id" class="block text-sm font-semibold text-gray-700 mb-2"> 
                                     {{__('رقم بطاقتك')}} </label>
                                <input type="text" name="national_id" id="national-id" placeholder="اكتب رقم بطاقتك"
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2"> {{__('البريد الالكتروني')}} 
                                     </label>
                                <input type="email" name="email" id="email" placeholder="support@example.com"
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>

                            <div>
                                <label for="mobile" class="block text-sm font-semibold text-gray-700 mb-2"> 
                                     {{__('رقم الموبايل')}} </label>
                                <input type="tel" name="phone" id="mobile" placeholder="01234567899"
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    dir="ltr">
                            </div>

                            <div>
                                <label for="governorate" class="block text-sm font-semibold text-gray-700 mb-2"> 
                                     {{__('اختر المحافظة ')}} 
                                    </Labe>
                                    <select id="governorate" name="governorate"
                                        class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                        <option> {{__('اختر المحافظة ')}}   </option>
                                        <option value="القاهرة">القاهرة</option>
                                        <option value="الجيزة">الجيزة</option>
                                        <option value="الإسكندرية">الإسكندرية</option>
                                    </select>
                            </div>

                            <div>
                                <label for="city" class="block text-sm font-semibold text-gray-700 mb-2"> 
                                    {{__('المدينة')}} </label>
                                <input type="text" name="city" id="city" placeholder="     {{__('المدينة')}}  "
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>

                            <div class="md:col-span-2">
                                <label for="experience" class="block text-sm font-semibold text-gray-700 mb-2">

                        {{__('أكتب طلبك')}}                
                                </label>
                                <textarea name="text" id="experience" rows="5" placeholder="  {{__('أكتب طلبك')}}      "
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
                            </div>
    <input type="hidden" value="{{ $service->{'title_' . $sign} }}" name="service_name" >
    <input type="hidden" name="form_type" value="services">

                            <div class="md:col-span-2">
                                <button type="submit"
                                    class="bg-primary text-white font-bold py-3 px-10 rounded-full transition-all duration-300 hover:bg-accent hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                       {{__('إرسال الطلب')}} 
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </section>
     
 
        @include('includes.share')
    </main>
@stop
 