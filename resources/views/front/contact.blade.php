 
   
@extends('layouts.front')

@section('title')
   
{{ __('اتصل بنا') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
@php
$phones =  explode(',', $gs->phones);
$emails =   explode(',', $gs->emails);
$addresses =  json_decode($gs->{'addresses_' . $sign});
$randomPhone = Arr::random($phones);
$email = Arr::random($emails);
@endphp

   <section class="pt-32 pb-20 bg-gradient-to-r from-[#040720] to-blue-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">    {{ __('اتصل بنا') }}  </h1>
            
        </div>
    </section>
 <!-- contact-us -->
    <section class="container my-10 mx-auto px-4 md:px-8 lg:px-16 xl:px-32">
        <div class="">
            <div class="text-center mb-4">
                <div><span class="uppercase text-accent font-semibold leading-4"> 
                    {{ __('لا تتردد') }} </span>
                    <h2 class="text-primary font-bold text-4xl italic">  {{ __('اتصل بنا') }}  </h2>
                </div>
            </div>
            <div class="container">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div id="rightToLeft">
                        <h2 class="font-semibold uppercase">    {{ __('اتصل بنا') }} </h2>
                        <ul class="flex gap-4 my-4">
                            @if ($email)
                              <li
                                style="background-color:#EA4335; width:3rem; height:3rem; border-radius:9999px; box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); display:flex; justify-content:center; align-items:center;">
                                <a target="_blank" class="flex justify-center items-center"
                                    href="mailto:{{ $email }}">
                                    <i class="fas fa-envelope text-white text-xl"></i>
                                </a>
                            </li>  
                            @endif
                            @foreach ($phones as $phone)
                               
                            <li
                                style="background-color:#25D366; width:3rem; height:3rem; border-radius:9999px; box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); display:flex; justify-content:center; align-items:center;">
                                <a target="_blank" class="flex justify-center items-center"
                                    href="https://wa.me/+2{{ $phone }}">
                                    <i class="fab fa-whatsapp text-white text-xl"></i>
                                </a>
                            </li>
                         
                            @endforeach
                            @if ($randomPhone)
                            <li
                                style="background-color:#FF9900; width:3rem; height:3rem; border-radius:9999px; box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); display:flex; justify-content:center; align-items:center;">
                                <a target="_blank" class="flex justify-center items-center" href="tel:+2{{ $randomPhone }}">
                                    <i class="fas fa-phone-volume text-white text-xl"></i>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div id="leftToRight">
                        <!--<form action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST" autocomplete="off" class="cons-contact-form">-->
                        <!--    {{csrf_field()}}-->
                        <!--    <div class="form-group w-100">-->
                        <!--      <div class="response w-100"></div>-->
                        <!--    </div>-->
                        <!--    <div class="mb-4">-->
                        <!--        <label for="name" class="block text-sm font-semibold text-gray-700">{{ __('الاسم') }}</label>-->
                        <!--        <input type="text" id="name" placeholder="{{ __(key: 'أدخل اسمك') }}"-->
                        <!--            class="fname mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary"-->
                        <!--            required="" name="name">-->
                        <!--    </div>-->
                        <!--    <div class="mb-4">-->
                        <!--        <label for="email" class="block text-sm font-semibold text-gray-700">البريد-->
                        <!--            الإلكتروني</label>-->
                        <!--        <input type="email" id="email" placeholder="أدخل بريدك الإلكتروني"-->
                        <!--            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary"-->
                        <!--            required="" name="email">-->
                        <!--    </div>-->
                        <!--    <div class="mb-4">-->
                        <!--        <label for="subject" class="block text-sm font-semibold text-gray-700">الموضوع</label>-->
                        <!--        <input type="text" id="subject" placeholder="أدخل الموضوع"-->
                        <!--            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary"-->
                        <!--            required="" name="subject">-->
                        <!--    </div>-->
                        <!--    <div class="mb-4">-->
                        <!--        <label for="text"-->
                        <!--            class="block text-sm font-semibold text-gray-700">الرسالة</label><textarea-->
                        <!--            id="text" name="text" rows="4" placeholder="أدخل رسالتك"-->
                        <!--            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary"-->
                        <!--            required="">-->
                        <!--        </textarea>-->
                        <!--    </div>-->
                        <!--    <div class="text-center">-->
                        <!--        <button type="submit"-->
                        <!--            class="w-full px-4 py-2 bg-black text-white font-semibold rounded-md hover:bg-primary focus:outline-none focus:ring-2 focus:ring-primary">ارسل</button>-->
                        <!--    </div>-->
                        <!--</form>-->
                        
                         <form action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST" autocomplete="off" class="cons-contact-form space-y-4">
                            {{csrf_field()}}
                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>
            
                            <!-- الاسم -->
                            <div>
                                <label class="block text-gray-700 mb-1">الاسم</label>
                                <input type="text"  name="name"  required=""
                                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black fname"
                                    placeholder="اكتب اسمك">
                            </div>

                            <!-- رقم التليفون -->
                            <div>
                                <label class="block text-gray-700 mb-1">رقم التليفون</label>
                                <input type="tel"   name="phone"  required=""
                                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
                                    placeholder="مثال: 01012345678">
                            </div>

                            <!-- هتسجل ايه -->
                            <div>
                                <label class="block text-gray-700 mb-2">هتسجل إيه؟</label>
                                <div class="flex gap-4">
                                    <label class="flex items-center gap-2">
                                        <input type="radio" name="type" value="car" class="accent-blue-600">
                                        <i class="fa-solid fa-car text-black"></i>
                                        <span>سيارة</span>
                                    </label>
                                    <label class="flex items-center gap-2">
                                        <input type="radio" name="type" value="scooter" class="accent-blue-600">
                                        <i class="fa-solid fa-motorcycle text-black"></i>
                                        <span>سكوتر</span>
                                    </label>
                                    <label class="flex items-center gap-2">
                                        <input type="radio" name="type" value="taxi" class="accent-blue-600">
                                        <i class="fa-solid fa-taxi text-black"></i>
                                        <span>تاكسي</span>
                                    </label>
                                </div>
                            </div>

                            <!-- نوع وموديل المركبة -->
                            <div>
                                <label class="block text-gray-700 mb-1">نوع وموديل المركبة</label>
                                <input type="text"  name="car_type" 
                                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
                                    placeholder="مثال: هيونداي النترا 2020">
                            </div>

                            <!-- المحافظة -->
                            <div>
                                <label class="block text-gray-700 mb-1">المحافظة التي تريد العمل بها</label>
                                <input type="text"  name="location" 
                                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
                                    placeholder="مثال: القاهرة">
                            </div>

                            <!-- زر الإرسال -->
                            <div class="pt-4">
                                <button type="submit"
                                    class="w-full bg-black text-white py-2 rounded-lg transition">إرسال</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-20">
                    <div id="rightToLeft">
                        <h2 class="font-semibold uppercase">وسائل التواصل الاجتماعي</h2>
                        <ul class="flex gap-4 my-4">
                            @if(App\Models\Socialsetting::find(1)->t_status == 1) 
                            <li
                                style="background-color:#c56ac2; width:3rem; height:3rem; border-radius:9999px; box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); display:flex; justify-content:center; align-items:center;">
                                <a target="_blank" class="flex justify-center items-center"
                                    href="{{ App\Models\Socialsetting::find(1)->twitter }}">
                                    <i class="fab fa-instagram text-white text-xl"></i>
                                </a>
                            </li>
                            @endif 
                            @if(App\Models\Socialsetting::find(1)->ystatus == 1)
                            <li
                                style="background-color:#FF0000; width:3rem; height:3rem; border-radius:9999px; box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); display:flex; justify-content:center; align-items:center;">
                                <a target="_blank" class="flex justify-center items-center"
                                    href="{{ App\Models\Socialsetting::find(1)->youtube }}">
                                    <i class="fab fa-youtube text-white text-xl"></i>
                                </a>
                            </li>
                            @endif  
                            @if(App\Models\Socialsetting::find(1)->f_status == 1)       
                            <li
                                style="background-color:#1877F2; width:3rem; height:3rem; border-radius:9999px; box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); display:flex; justify-content:center; align-items:center;">
                                <a target="_blank" class="flex justify-center items-center"
                                    href="{{ App\Models\Socialsetting::find(1)->facebook }}">
                                    <i class="fab fa-facebook-f text-white text-xl"></i>
                                </a>
                            </li>
                            @endif  
                            @if(App\Models\Socialsetting::find(1)->d_status == 1)       
                            <li
                                style="background-color:#000; width:3rem; height:3rem; border-radius:9999px; box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); display:flex; justify-content:center; align-items:center;">
                                <a target="_blank" class="flex justify-center items-center"
                                    href="{{ App\Models\Socialsetting::find(1)->dribble }}">
                                    <i class="fab fa-tiktok text-white text-xl"></i>
                                </a>
                            </li>
                            @endif  
                        </ul>
                    </div>
                    <div id="leftToRight"
                        class="overflow-hidden rounded transition duration-500 shadow hover:shadow-lg">
                        {{-- <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2819.130995559972!2d31.329487997527696!3d30.106386821254173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458159301bad8c5%3A0x82da1efc0d58130b!2z2YbYp9iv2Yog2KfZhNmG2LXYsSDYp9mE2LHZitin2LbZig!5e1!3m2!1sar!2seg!4v1741073226589!5m2!1sar!2seg"
                            class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                            {!! $gs->map !!}
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-us -->

    @stop