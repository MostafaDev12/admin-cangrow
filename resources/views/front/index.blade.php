 
  
     
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
    <!-- About Section -->
    <section class="container mx-auto px-4 md:px-8 lg:px-16 xl:px-32">
        <!-- Section Container -->
        <div class="py-12">
            <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
                <div id="rightToLeft" class="md:py-12">
                    <h1 class="text-4xl font-semibold  hover:text-primary transition-all duration-700">     
                        {{ $sliders->{'title_' . $sign}  ?? ''}} </h1>
                    <p class="text-accent my-4 hover:text-primary transition-all duration-700">  {!! $sliders->{'details_' . $sign}  ?? '' !!}</p>
                    <div class="flex flex-wrap items-center gap-4">
                        <div>
                            <a class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground shadow hover:bg-primary/90 h-10 rounded-md px-8 space-x-2 !px-4 !rounded-full uppercase"
                                href="{{ route('contact.index') }}">  {{ __('اطلب استشارتك التسويقيه') }}<span class="rotate-180"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="lucide lucide-circle-arrow-right !w-5 !h-5 animate-bounce">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M8 12h8"></path>
                                        <path d="m12 16 4-4-4-4"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div>
                            <a class="flex gap-2 items-center text-black hover:text-primary duration-200 transition-colors font-semibold"
                                href="{{ route('about.index') }}"> {{ __('اعرف المزيد') }}
                                <span class="rotate-180"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-circle-arrow-right !w-5 !h-5 animate-bounce">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M8 12h8"></path>
                                        <path d="m12 16 4-4-4-4"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="leftToRight" class="relative hidden md:block">
                    <img src="{{ $sliders->{'photo'}  ?? ''}}" alt="About us illustration"
                        class="object-contain w-full h-full animate-hero-img">
                </div>
            </div>
        </div>

        <div class="text-center mb-8">
            <!-- Main Heading -->
            <div class="mb-4">
                <p class="text-lg text-gray-600 mt-2">         {{ __('هدفنا ايجاد الحلول المناسبة لك وتلبيه طلبك في اسرع وقت') }}</p>
                <h1 class="text-4xl font-semibold  hover:text-primary transition-all duration-700"> {{ __('من نحن') }}  
                </h1>
            </div>
        </div>
        <!-- Section Container -->
        <div class="py-12">
            <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
                <div id="rightToLeft" class="md:py-12">
                    <h1 class="text-4xl font-semibold hover:text-primary transition-all duration-700">
                        {{ $ps->{'about_title_' . $sign}  ?? ''}}
                    </h1>
                    <p class="text-gray-600 my-6 hover:text-primary transition-all duration-700">
                        {!! $ps->{'about_details_' . $sign}  ?? ''!!}

                    </p>
                    <div class="flex flex-wrap items-center gap-4">
                        <div>
                            <a href="{{ route('about.index') }}"
                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 bg-primary text-primary-foreground shadow hover:bg-primary/90 h-10 rounded-md px-8 space-x-2 !px-4 !rounded-full uppercase">
                                {{ __('اعرف المزيد') }}  
                                <span class="transform rotate-180">
                                    <i data-lucide="arrow-right-circle" class="w-5 h-5 animate-bounce"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="leftToRight" class="relative hidden md:block">
                    <img src="{{ $ps->about_photo }}" alt="About us illustration"
                        class="object-contain w-full h-full animate-hero-img">
                </div>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <!-- services -->
    <section class="py-10" style="background-color:#2cb676">
        <div class="text-center mb-4">
            <div><span class="uppercase text-accent font-semibold leading-4"></span>
                <h2 class="text-white font-bold text-4xl italic">خدماتنا</h2>
            </div>
        </div>
        <!-- <div id="servicesSlider" class="w-full h-[600px]">
    </div> -->
        <div class="swiper mySwiper hover:h-screen">
            <div class="swiper-wrapper">

                @foreach ($services as $service)
                <div class="swiper-slide">
                    <a href="{{ route('single-service.index',['slug' => $service->{'slug_' . $sign} ]) }}" class="card">
                        <div class="imgbox overflow-hidden">
                            <img src="{{ $service->photo }}"
                                alt="" />
                        </div>
                        <div class="content">
                            <div class="flex justify-center">
                                <span> {{ $service->{'title_' . $sign} }}   </span>
                            </div>
                            <p >{{ $service->{'short_details_' . $sign} }} </p>
                        </div>
                        <h2>   {{ $service->{'title_' . $sign} }} </h2>
                    </a>
                </div>
                @endforeach
                 
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- services -->

    <!-- blogs -->
    <section class="container mt-10 mx-auto px-4 md:px-8 lg:px-16 xl:px-32">
        <div class="text-center">
            <div><span class="uppercase text-accent font-semibold leading-4"></span>
                <h2 class="text-primary font-bold text-4xl italic">{{ __('المقالات') }}</h2>
            </div>
        </div>
        <div class="flex justify-between my-4">
            <div><span class="uppercase text-accent font-semibold leading-4">{{ __('المقالات') }}</span>
                <h2 class="text-primary font-bold text-4xl italic"></h2>
            </div><a
                class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground shadow hover:bg-primary/90 h-9 px-4 py-2 "
                href="{{ route('blogs.index') }}"> {{ __('اعرف المزيد') }}  </a>
        </div>
        <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
           
            @foreach($blogs as $blog)
            <div class="rounded shadow hover:shadow-lg p-4 transition-all duration-500">
                <a class="flex flex-col justify-start" href="{{ route('single-blog.index',$blog->{'slug_' . $sign}) }}">
                    <img class="rounded max-w-full h-auto object-cover aspect-video mb-4"
                        src="{{ $blog->photo }}"
                        srcset="{{ $blog->photo }} 1x, {{ $blog->photo }} 2x"
                        alt="Free Ai Generated Employee illustration and picture"
                        title="Download free HD stock image of Ai Generated Employee">
                    <h2 class="text-xl mt-2 font-bold text-gray-800 mb-2 line-clamp-2">  {{ $blog->{'title_' . $sign} }}     </h2>
                    <p class="text-gray-600 text-ellipsis overflow-hidden whitespace-nowrap max-w-full ">
                        {{ $blog->{'short_details_' . $sign} }}
                    </p>
                </a>
            </div>
            @endforeach
            
            
        </div>
    </section>
    <!-- blogs -->
    <!-- contact-us -->
 
    @php
$phones =  explode(',', $gs->phones);
$emails =   explode(',', $gs->emails);
$addresses =  json_decode($gs->{'addresses_' . $sign});
$randomPhone = Arr::random($phones);
$email = Arr::random($emails);
@endphp

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
                                    <i class="fas fa-phone-volume text-white text-xl"></i>
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
                        <form action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST" autocomplete="off" class="cons-contact-form">
                            {{csrf_field()}}
                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-semibold text-gray-700">{{ __('الاسم') }}</label>
                                <input type="text" id="name" placeholder="{{ __(key: 'أدخل اسمك') }}"
                                    class="fname mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary"
                                    required="" name="name">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-semibold text-gray-700">البريد
                                    الإلكتروني</label>
                                <input type="email" id="email" placeholder="أدخل بريدك الإلكتروني"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary"
                                    required="" name="email">
                            </div>
                            <div class="mb-4">
                                <label for="subject" class="block text-sm font-semibold text-gray-700">الموضوع</label>
                                <input type="text" id="subject" placeholder="أدخل الموضوع"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary"
                                    required="" name="subject">
                            </div>
                            <div class="mb-4">
                                <label for="text"
                                    class="block text-sm font-semibold text-gray-700">الرسالة</label><textarea
                                    id="text" name="text" rows="4" placeholder="أدخل رسالتك"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary"
                                    required="">
                                </textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="w-full px-4 py-2 bg-primary text-white font-semibold rounded-md hover:bg-primary focus:outline-none focus:ring-2 focus:ring-primary">ارسل</button>
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
                                style="background-color:#000; width:3rem; height:3rem; border-radius:9999px; box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); display:flex; justify-content:center; align-items:center;">
                                <a target="_blank" class="flex justify-center items-center"
                                    href="{{ App\Models\Socialsetting::find(1)->twitter }}">
                                    <i class="fab fa-x-twitter text-white text-xl"></i>
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
                        </ul>
                    </div>
                    <div id="leftToRight"
                        class="overflow-hidden rounded transition duration-500 shadow hover:shadow-lg">
                        {{-- <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2819.130995559972!2d31.329487997527696!3d30.106386821254173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458159301bad8c5%3A0x82da1efc0d58130b!2z2YbYp9iv2Yog2KfZhNmG2LXYsSDYp9mE2LHZitin2LbZig!5e1!3m2!1sar!2seg!4v1741073226589!5m2!1sar!2seg"
                            class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                          

                            <iframe
                            src="  {!! $gs->map !!}"
                            class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-us -->
  
 @stop