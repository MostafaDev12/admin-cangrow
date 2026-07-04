<!DOCTYPE html>
<html lang="{{ $sign }}"  dir="{{ session::get('front_language_duraction') }}"  >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp


<meta name="google-site-verification" content="{{ $gs->google_verification ?: 'ZcfPDEqhHasKzuMSstRL9kFRO_WINOX_n3xaSjXTMWk' }}" />



<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $gs->analytics_id ?: 'G-CFB5B13HTJ' }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '{{ $gs->analytics_id ?: 'G-CFB5B13HTJ' }}');
</script>

    <meta property="og:title" content="{{ $gs->{'title_' . $sign} }}">
    <meta property="og:description" content="{{ $gs->{'title_' . $sign} }}">
    <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">


    <meta name="google-site-verification" content="IdWOrbHM6JKC0_evYH8uNuHf2MuPTGcup45QC7eNyzU" />
    @if (isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
        <title>@yield('title') -

            {{ $gs->{'title_' . $sign} }}

        </title>
    @elseif(isset($blog->{'meta_details_' . $sign}))
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->{'meta_details_' . $sign} }}">
        <meta property="og:description" content="{{ $blog->{'meta_details_' . $sign} }}">
    @else
        <meta name="+author" content=" {{ $gs->{'title_' . $sign} }}">

        <title>
            @yield('title')
        </title>
    @endif



    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "{{url('/')}}",
      "logo": "{{ $gs->{'logo_' . $sign} }}"
    }
    </script>
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "{{ $gs->{'title_' . $sign} }}",
    "url": "{{url('/')}}",
    "description": "",
    "image": "{{ $gs->{'logo_' . $sign} }}",
      "logo": "{{ $gs->{'logo_' . $sign} }}",
      "sameAs": ["{{ App\Models\Socialsetting::find(1)->facebook }}", "{{ App\Models\Socialsetting::find(1)->twitter }}", "{{ App\Models\Socialsetting::find(1)->instagram }}"],
    "telephone": "",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "",
      "addressLocality": "",
      "addressRegion": "Cairo",
      "postalCode": "11341",
      "addressCountry": "Egypt"
    }
  }
</script>


    @yield('gsearch')
    <!-- Google Font -->

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $gs->favicon }}" />
    <!-- bootstrap -->




    <link rel="stylesheet" href="{{ asset('build/css/toastr.css') }}">


    @include('includes.style')


    @yield(section: 'css')





</head>

@php
    $phones = explode(',', $gs->phones);
    $emails = explode(',', $gs->emails);
    $addresses = json_decode($gs->{'addresses_' . $sign});

    $randomPhone = Arr::random($phones);
@endphp

 
 
 
<body class="bg-gray-50 text-gray-800 font-tajawal" dir="{{ session::get('front_language_duraction') }}" lang="{{ $sign }}">
<header
    class="desktopHeader fixed top-0 w-full z-50 text-white hidden lg:block transition-all duration-300 overflow-visible bg-[#020817]/95 backdrop-blur-xl shadow-[0_15px_45px_rgba(0,0,0,.45)]">

    <div class="container mx-auto px-6 overflow-visible">
<div class="grid grid-cols-[220px_1fr_220px] items-center gap-6 h-[100px] overflow-visible">
            <!-- CTA - Left -->
            <div class="flex justify-start">
                <a href="{{ asset('assets/images/files/' . ($gs->catalog_file ?: 'catalog1.pdf')) }}"
                   download="{{ $gs->catalog_file ?: 'catalog1.pdf' }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#00c8ff] to-[#0877ff] px-6 py-3 text-sm font-bold text-white shadow-[0_0_25px_rgba(0,174,255,.45)] hover:scale-[1.03] transition">
                    <span>{{ $gs->{'catalog_label_' . $sign} ?? __('تحميل كتالوج PDF') }}</span>
                    <i class="fas fa-download text-xs"></i>
                </a>
            </div>

         <!-- Menu - Center -->
            <nav class="flex justify-center">
             <ul class="flex items-center gap-10 font-extrabold [&>li>a]:text-[19px]"><li>
                        <a href="{{ route('front.index',$sign) }}"
                           class="relative text-[#00c8ff] pb-4 after:absolute after:bottom-0 after:right-0 after:h-[2px] after:w-full after:bg-[#00c8ff] after:rounded-full">
                            {{ __('الرئيسية') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('about.index',$sign) }}"
                           class="text-white/90 hover:text-[#00c8ff] transition">
                            {{ __('من نحن') }}
                        </a>
                    </li>

                    <!-- منتجاتنا -->
                    <li class="relative group">
                        <a href="{{ route('services.index', $sign) }}"
                           class="text-white/90 hover:text-[#00c8ff] transition flex items-center gap-2">
                            {{ __('المنتجات') }}
                            <i class="fas fa-chevron-down text-[11px] transition-transform group-hover:rotate-180"></i>
                        </a>

                        <ul class="absolute right-0 top-full mt-7 w-80 bg-white text-gray-700 rounded-xl shadow-2xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 overflow-visible">

                            <li>
                                <a href="{{ route('services.index', $sign) }}"
                                   class="block px-4 py-3 font-bold text-[#00a8e8] bg-[#eefaff]">
                                    {{ __('عرض كل المنتجات') }}
                                </a>
                            </li>

                            @php
                                $menuGroups = ['tanks', 'booths', 'traffic', 'clubs', 'plastic'];
                            @endphp
                            @foreach ($navCategories as $navCategory)
                            @php
                                $menuGroup = $menuGroups[$loop->index % count($menuGroups)];
                            @endphp
                            <li class="relative group/{{ $menuGroup }}">
                                <a href="{{ route('single-category-service.index', ['lang' => $sign, 'slug' => $navCategory->{'slug_' . $sign}]) }}"
                                   class="flex items-center justify-between px-4 py-3 font-bold hover:text-[#00a8e8] hover:bg-[#eefaff]">
                                    <span>{{ $navCategory->{'title_' . $sign} }}</span>
                                    <i class="fas fa-chevron-left text-xs"></i>
                                </a>

                                @if ($navCategory->activeServices->count())
                                <ul class="absolute right-full top-0 w-72 bg-white text-gray-700 rounded-xl shadow-2xl border border-gray-100 opacity-0 invisible group-hover/{{ $menuGroup }}:opacity-100 group-hover/{{ $menuGroup }}:visible transition-all duration-300 z-50 overflow-hidden">
                                    @foreach ($navCategory->activeServices as $navService)
                                    <li><a href="{{ route('single-service-service.index', ['lang' => $sign, 'slug' => $navService->{'slug_' . $sign}]) }}" class="block px-4 py-3 hover:text-[#00a8e8] hover:bg-[#eefaff]">{{ $navService->{'title_' . $sign} }}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach

                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('gallery.index',$sign) }}" class="text-white/90 hover:text-[#00c8ff] transition">
                            {{ __('المعرض') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('blogs.index',$sign) }}" class="text-white/90 hover:text-[#00c8ff] transition">
                            {{ __('المقالات') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contact.index',$sign) }}" class="text-white/90 hover:text-[#00c8ff] transition">
                            {{ __('اتصل بنا') }}
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Logo - Right -->
            <div class="flex justify-end overflow-visible">
                <a href="{{ route('front.index',$sign) }}" class="block overflow-visible">
                    <img src="{{ $gs->{'logo_' . $sign} }}"
                         alt="{{ __('شعار الشركة') }}"
                         width="220"
                         height="120"
                         class="h-[105px] w-auto object-contain scale-[1.35] origin-center">
                </a>
            </div>

        </div>
    </div>
</header>

<header
    class="mobileHeader fixed top-0 w-full bg-[#020817]/95 backdrop-blur-xl z-[99999] text-white lg:hidden transition-all duration-300 shadow-[0_10px_35px_rgba(0,0,0,.45)]">

    @php
        $catalogUrl = asset('assets/images/files/catalog1.pdf');
    @endphp

    <div class="container mx-auto px-4 h-[86px] flex justify-between items-center">

        <a href="{{ route('front.index',$sign) }}" class="block overflow-visible">
            <img src="{{ $gs->{'logo_' . $sign} }}"
                 alt="{{ __('شعار الشركة') }}"
                 width="150"
                 height="90"
                 class="h-[74px] w-auto object-contain">
        </a>

        <div class="flex items-center gap-2">

            <a href="{{ asset('assets/images/files/' . ($gs->catalog_file_mobile ?: 'catalog1_mobile_.pdf')) }}"
               target="_blank"
               rel="noopener noreferrer"
               class="inline-flex items-center justify-center gap-1.5 rounded-xl bg-gradient-to-r from-[#00c8ff] to-[#0877ff] px-3.5 py-2.5 text-xs font-bold text-white shadow-[0_0_20px_rgba(0,174,255,.4)] whitespace-nowrap transition">
                <span>{{ $gs->{'catalog_label_short_' . $sign} ?? __('كتالوج PDF') }}</span>
                <i class="fas fa-download text-[11px]"></i>
            </a>

            <button id="menu-btn" type="button"
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 text-white text-xl hover:bg-white/15 transition">
                <i class="fas fa-bars"></i>
            </button>
        </div>

    </div>

    <!-- القائمة الجانبية -->
    <div id="mobile-menu"
         class="fixed inset-0 h-screen w-full bg-[#020817] text-white shadow-2xl
                transform translate-x-full transition-transform duration-300 z-[999999]
                overflow-y-auto overscroll-contain pb-32">

        <div class="sticky top-0 z-10 flex justify-between items-center p-4 border-b border-white/10 bg-[#020817]">
            <span class="font-bold text-lg text-[#00c8ff]">{{ __('القائمة') }}</span>

            <button id="close-btn" type="button"
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 text-white text-xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <ul class="flex flex-col gap-3 p-4 pb-36 text-lg font-bold">

            <li>
                <a href="{{ route('front.index',$sign) }}" class="block rounded-xl px-4 py-3 text-[#00c8ff] bg-white/5">
                    {{ __('الرئيسية') }}
                </a>
            </li>

            <li>
                <a href="{{ route('about.index',$sign) }}" class="block rounded-xl px-4 py-3 hover:bg-white/5 hover:text-[#00c8ff] transition">
                    {{ __('من نحن') }}
                </a>
            </li>

         
            <li>
                <details class="group">
                    <summary class="flex cursor-pointer list-none items-center justify-between w-full">
                        <span>{{ __('منتجاتنا') }}</span>
                        <i class="fas fa-chevron-down transition-transform duration-300 group-open:rotate-180"></i>
                    </summary>

                    <div class="mt-3 flex flex-col gap-3 pr-4 text-base text-gray-700">

                        <a href="{{ route('services.index', $sign) }}"
                           class="block rounded-lg bg-[#e8f8ff] px-4 py-3 font-bold text-[#00a8e8]">
                            {{ __('عرض كل المنتجات') }}
                        </a>

                        @php
                            $mobileMenuGroups = ['tanks', 'booths', 'traffic', 'clubs', 'plastic'];
                        @endphp
                        @foreach ($navCategories as $navCategory)
                        @php
                            $mobileMenuGroup = $mobileMenuGroups[$loop->index % count($mobileMenuGroups)];
                        @endphp
                        <details class="group/{{ $mobileMenuGroup }} rounded-lg bg-gray-50 px-4 py-3">
                            <summary class="flex cursor-pointer list-none items-center justify-between font-bold text-gray-800">
                                <span>{{ $navCategory->{'title_' . $sign} }}</span>
                                <i class="fas fa-chevron-down text-xs transition-transform duration-300 group-open/{{ $mobileMenuGroup }}:rotate-180"></i>
                            </summary>

                            <div class="mt-3 flex flex-col gap-2 pr-3 text-sm text-gray-600">
                                <a href="{{ route('single-category-service.index', ['lang' => $sign, 'slug' => $navCategory->{'slug_' . $sign}]) }}"
                                   class="block py-2 font-bold text-[#00a8e8]">
                                    {{ __('عرض القسم') }}
                                </a>

                                @foreach ($navCategory->activeServices as $navService)
                                <a href="{{ route('single-service-service.index', ['lang' => $sign, 'slug' => $navService->{'slug_' . $sign}]) }}" class="block py-2 hover:text-primary">
                                    {{ $navService->{'title_' . $sign} }}
                                </a>
                                @endforeach
                            </div>
                        </details>
                        @endforeach

                    </div>
                </details>
            </li>


            <li>
                <a href="{{ route('blogs.index',$sign) }}" class="block rounded-xl px-4 py-3 hover:bg-white/5 hover:text-[#00c8ff] transition">
                    {{ __('المقالات') }}
                </a>
            </li>

            <li>
                <a href="{{ route('gallery.index',$sign) }}" class="block rounded-xl px-4 py-3 hover:bg-white/5 hover:text-[#00c8ff] transition">
                    {{ __('المعرض') }}
                </a>
            </li>

            <li>
                <a href="{{ route('contact.index',$sign) }}" class="block rounded-xl px-4 py-3 hover:bg-white/5 hover:text-[#00c8ff] transition">
                    {{ __('اتصل بنا') }}
                </a>
            </li>

            <li class="pt-4 border-t border-white/10">
                <a href="{{ asset('assets/images/files/' . ($gs->catalog_file_mobile ?: 'catalog1_mobile_.pdf')) }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#00c8ff] to-[#0877ff] px-4 py-3 text-sm font-bold text-white shadow-[0_0_20px_rgba(0,174,255,.35)]">
                    <span>{{ $gs->{'catalog_label_' . $sign} ?? __('تحميل كتالوج PDF') }}</span>
                    <i class="fas fa-download text-xs"></i>
                </a>
            </li>

        </ul>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mobileMenu = document.getElementById('mobile-menu');
        const openBtn = document.getElementById('menu-btn');
        const closeBtn = document.getElementById('close-btn');
        const floatingSocial = document.getElementById('floating-social');

        if (openBtn && mobileMenu) {
            openBtn.addEventListener('click', function () {
                mobileMenu.classList.remove('translate-x-full');
                mobileMenu.classList.add('translate-x-0');
                document.body.style.overflow = 'hidden';

                if (floatingSocial) {
                    floatingSocial.classList.add('hidden');
                }
            });
        }

        if (closeBtn && mobileMenu) {
            closeBtn.addEventListener('click', function () {
                mobileMenu.classList.add('translate-x-full');
                mobileMenu.classList.remove('translate-x-0');
                document.body.style.overflow = '';

                if (floatingSocial) {
                    floatingSocial.classList.remove('hidden');
                }
            });
        }
    });
</script>
    @yield('content')
 
 
 <!--السوشيال-->
 @php
    $social = App\Models\Socialsetting::find(1);

    $phones = !empty($gs->phones) ? explode(',', $gs->phones) : [];
    $firstPhone = count($phones) ? trim($phones[0]) : '';
    $cleanPhone = preg_replace('/\D+/', '', $firstPhone);
@endphp

<div class="fixed left-2 top-1/2 -translate-y-1/2 z-[99999] flex flex-col gap-2 md:left-4 md:gap-3">

    {{-- Facebook --}}
    @if($social && $social->f_status == 1 && !empty($social->facebook))
        <a href="{{ $social->facebook }}"
           target="_blank"
           aria-label="Facebook"
           class="flex h-10 w-10 items-center justify-center rounded-full bg-[#1f4452] text-white shadow-lg transition duration-300 hover:scale-110 hover:bg-[#00a8e8] hover:shadow-[0_0_22px_rgba(0,168,232,0.65)] md:h-12 md:w-12">
            <i class="fa-brands fa-facebook-f text-lg md:text-xl"></i>
        </a>
    @endif


    {{-- WhatsApp --}}
    @if(!empty($cleanPhone))
        <a href="https://wa.me/{{ $cleanPhone }}"
           target="_blank"
           aria-label="WhatsApp"
           class="flex h-10 w-10 items-center justify-center rounded-full bg-[#25D366] text-white shadow-lg transition duration-300 hover:scale-110 hover:bg-[#18b957] hover:shadow-[0_0_22px_rgba(37,211,102,0.65)] md:h-12 md:w-12">
            <i class="fa-brands fa-whatsapp text-lg md:text-xl"></i>
        </a>
    @endif

    {{-- Phone --}}
    @if(!empty($firstPhone))
        <a href="tel:{{ $firstPhone }}"
           aria-label="Phone"
           class="flex h-10 w-10 items-center justify-center rounded-full bg-[#1f4452] text-white shadow-lg transition duration-300 hover:scale-110 hover:bg-[#00a8e8] hover:shadow-[0_0_22px_rgba(0,168,232,0.65)] md:h-12 md:w-12">
            <i class="fa-solid fa-phone text-base md:text-lg"></i>
        </a>
    @endif

 

</div>
 <!--السوشيال-->


    <footer class="bg-gray-900 text-gray-300 pt-16 pb-8 mt-12">
        <div class="container mx-auto px-6 grid md:grid-cols-4 gap-10">

            <div>
                <a href="{{ route('front.index',$sign) }}">
               <img src="{{ $gs->{'logo_' . $sign} }}" alt="شعار الشركة" class="h-19 w-auto">    
               </a>
                <p class="text-sm text-gray-400 leading-relaxed">
                    {{ $gs->{'footer_' . $sign} }}
                </p>
            </div>

             <div>
    <h3 class="text-xl font-black text-white mb-6">
        {{ __('منتجاتنا') }}
    </h3>

    <ul class="space-y-4 text-gray-300">

        @foreach ($navCategories as $navCategory)
        <li>
            <a href="{{ route('single-category-service.index', [
                    'lang' => $sign,
                    'slug' => $navCategory->{'slug_' . $sign}
                ]) }}"
               class="transition hover:text-[#00a8e8]">
                {{ $navCategory->{'title_' . $sign} }}
            </a>
        </li>
        @endforeach

    </ul>
</div>

            <div>
    <h3 class="text-lg font-semibold text-white mb-4">
        {{ __('الشركة') }}
    </h3>

    <ul class="space-y-2 text-gray-400">
        <li>
            <a href="{{ route('about.index',$sign) }}"
               class="transition hover:text-[#00a8e8]">
                {{ __('من نحن') }}
            </a>
        </li>

        <li>
            <a href="{{ route('blogs.index',$sign) }}"
               class="transition hover:text-[#00a8e8]">
                {{ __('المقالات') }}
            </a>
        </li>

        <li>
            <a href="{{ route('gallery.index',$sign) }}"
               class="transition hover:text-[#00a8e8]">
                {{ __('المعرض') }}
            </a>
        </li>

        <li>
            <a href="{{ route('contact.index',$sign) }}"
               class="transition hover:text-[#00a8e8]">
                {{ __('اتصل بنا') }}
            </a>
        </li>
    </ul>
</div>

<div class="text-right" dir="rtl">
    <h3 class="text-lg font-semibold text-white mb-4">
        {{ __('تواصل معنا') }}
    </h3>

    <ul class="space-y-3 text-gray-400">

        @foreach ($addresses as $address)
            <li class="flex items-start justify-start gap-2">
                <i class="fas fa-map-marker-alt text-accent mt-1"></i>
                <span>{{ $address }}</span>
            </li>
        @endforeach

        @foreach ($phones as $phone)
            <li class="flex items-center justify-start gap-2">
                <i class="fas fa-phone text-accent"></i>
               <a href="tel:+2{{ $phone }}" class="hover:text-[#00a8e8] transition">
             {{ $phone }}
             </a>
              </li>
        @endforeach

    </ul>

    @php
        $social = App\Models\Socialsetting::find(1);

        $phonesList = !empty($gs->phones) ? explode(',', $gs->phones) : [];
        $firstPhone = count($phonesList) ? trim($phonesList[0]) : '';
        $cleanPhone = preg_replace('/\D+/', '', $firstPhone);
    @endphp

    <div class="mt-6 flex items-center justify-start gap-3">

        {{-- Facebook --}}
        @if($social && $social->f_status == 1 && !empty($social->facebook))
            <a href="{{ $social->facebook }}"
               target="_blank"
               aria-label="Facebook"
               class="flex h-11 w-11 items-center justify-center rounded-full bg-[#1877F2] text-white shadow-lg transition duration-300 hover:scale-110">
                <i class="fa-brands fa-facebook-f text-lg"></i>
            </a>
        @endif

      

        {{-- WhatsApp --}}
        @if(!empty($cleanPhone))
            <a href="https://wa.me/{{ $cleanPhone }}"
               target="_blank"
               aria-label="WhatsApp"
               class="flex h-11 w-11 items-center justify-center rounded-full bg-[#25D366] text-white shadow-lg transition duration-300 hover:scale-110">
                <i class="fa-brands fa-whatsapp text-lg"></i>
            </a>
        @endif

        {{-- Phone --}}
        @if(!empty($firstPhone))
            <a href="tel:{{ $firstPhone }}"
               aria-label="Phone"
               class="flex h-11 w-11 items-center justify-center rounded-full bg-[#00a8e8] text-white shadow-lg transition duration-300 hover:scale-110">
                <i class="fa-solid fa-phone text-base"></i>
            </a>
        @endif

       

    </div>
</div>
        </div>

        <div class="mt-12 pt-6 border-t border-gray-700 text-center text-gray-500 text-sm">
            © {{ date('Y') }}     {{ $gs->{'copyright_' . $sign} ?? __('شركة النور لخزانات المياه. جميع الحقوق محفوظة.') }}
        </div>
        
        
    </footer>
    
  

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <Script>
        $(document).on('submit', '#subscribeform', function(e) {
            e.preventDefault();
            console.log(12);
            $('#sub-btn').prop('disabled', true);
            console.log(13);
            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(14);
                    if ((data.errors)) {
                        console.log(15);
                        $('.alert-danger').show();
                        $('.alert-danger ul').html('');
                        for (var error in data.errors) {
                            $('.alert-danger ul').append('<li>' + data.errors[error] + '</li>');
                        }

                    } else {
                        console.log(16);
                        toastr.success(langg.subscribe_success);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.alert-success p').html(langg.subscribe_success);

                    }

                    $('#sub-btn').prop('disabled', false);


                }

            });

        });


        $(document).on('submit', '#email-form', function(e) {
            e.preventDefault();
            $('.gocover').show();
            $('.submit-btn').prop('disabled', true);
            var name = $('.fname').val();



            if (name == '') {
                $('#email-form .response').html(
                    '<div class="failed alert alert-warning">Please fill the required fields.</div>');
                $('button.submit-btn').prop('disabled', false);
                return false;
            }

            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#email-form .response').html(
                        '<div class="text-info">Loading...</div>'
                    );
                    console.log(1);
                },
                success: function(data) {
                    console.log(2);
                    if ((data.errors)) {
                        console.log(3);
                        $('.alert-success').hide();
                        $('.alert-danger').show();
                        $('#email-form .response').html('');
                        for (var error in data.errors) {
                            console.log(4);
                            $('#email-form .response').append('<li>' + data.errors[error] + '</li>')
                        }
                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .eq(0).focus();
                        $('#email-form .refresh_code').trigger('click');

                    } else {
                        console.log(5);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('#email-form .response').html(data);
                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .eq(0).focus();
                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .val('');
                        $('#email-form .refresh_code').trigger('click');

                    }
                    console.log(6);
                    $('.gocover').hide();
                    $('button.submit-btn').prop('disabled', false);
                }

            });

        });
    </script>

    
    @include('includes.script')



    <script src="{{ asset('build/js/toastr.js') }}"></script>


    <script type="text/javascript">
        var logo_src = "{{ $gs->{'logo_' . $sign} }}";
    </script>



    <script type="text/javascript">
        var mainurl = "{{ url('/' . $sign) }}";
        var mainurl2 = "{{ url('/') }}";
        {{-- Frontend-safe settings only: never serialize the full generalsettings row
             (it holds SMTP credentials and other private configuration). --}}
        var gs = {!! json_encode($gs->only([
            'favicon', 'logo_ar', 'logo_en', 'logo_fr',
            'title_ar', 'title_en', 'title_fr',
            'footer_ar', 'footer_en', 'footer_fr',
            'phones', 'emails',
            'addresses_ar', 'addresses_en', 'addresses_fr',
            'map', 'map_link',
            'working_days_ar', 'working_days_en',
            'working_hours_ar', 'working_hours_en',
            'copyright_ar', 'copyright_en',
            'catalog_file', 'catalog_file_mobile',
            'catalog_label_ar', 'catalog_label_en',
            'catalog_label_short_ar', 'catalog_label_short_en',
            'lang_arabic', 'lang_english', 'lang_france',
        ])) !!};
        var langg = {!! json_encode($sign) !!};
        var mainurl2 = "{{ url('/') }}";

        $(".selectors").on('change', function() {
            var url = $(this).val();
            window.location = url;
        });
    </script>
    @yield('js')
    <script>
        $(document).on('submit', '#appointment-form', function(e) {
            e.preventDefault();
            $('.gocover').show();
            $('.submit-btn').prop('disabled', true);
            var name = $('.fname').val();



            if (name == '') {
                $('#appointment-form .response').html(
                    '<div class="failed alert alert-warning">Please fill the required fields.</div>');
                $('button.submit-btn').prop('disabled', false);
                return false;
            }

            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#appointment-form .response').html(
                        '<div class="text-info"><img src="{{ asset('assets/images/preloader.gif') }}"> Loading...</div>'
                    );
                    console.log(1);
                },
                success: function(data) {
                    console.log(2);
                    if ((data.errors)) {
                        console.log(3);
                        $('.alert-success').hide();
                        $('.alert-danger').show();
                        $('#appointment-form .response').html('');
                        for (var error in data.errors) {
                            console.log(4);
                            $('#appointment-form .response').append('<li>' + data.errors[error] +
                                '</li>')
                        }
                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .eq(0).focus();
                        $('#appointment-form .refresh_code').trigger('click');

                    } else {
                        console.log(5);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('#appointment-form .response').html(data);
                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .eq(0).focus();
                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .val('');
                        $('#appointment-form .refresh_code').trigger('click');

                    }
                    console.log(6);
                    $('.gocover').hide();
                    $('button.submit-btn').prop('disabled', false);
                }

            });

        });

        $('.refresh_code').on("click", function() {
            $.get(mainurl2 + '/contact/refresh_code', function(data, status) {
                $('.codeimg1').attr("src", mainurl2 + "/assets/images/capcha_code.png?time=" + Math
                    .random());
            });
        })
    </script>
    
<style>
    .desktopHeader.scrolled {
        background: rgba(2, 8, 23, 0.95) !important;
        color: #ffffff !important;
    }

    .desktopHeader.scrolled a,
    .desktopHeader.scrolled nav a,
    .desktopHeader.scrolled nav ul li a,
    .desktopHeader.scrolled .group > a,
    .desktopHeader.scrolled i {
        color: #ffffff !important;
    }

    .desktopHeader.scrolled a:hover,
    .desktopHeader.scrolled nav a:hover,
    .desktopHeader.scrolled .group > a:hover {
        color: #00c8ff !important;
    }

    .desktopHeader.scrolled nav ul li:first-child a {
        color: #00c8ff !important;
    }

    .desktopHeader.scrolled .group ul a {
        color: #374151 !important;
    }

    .desktopHeader.scrolled .group ul a:hover {
        color: #00a8e8 !important;
    }
</style>
<style>
    .mobileHeader.scrolled {
        background: rgba(2, 8, 23, 0.95) !important;
        color: #ffffff !important;
        box-shadow: 0 10px 35px rgba(0,0,0,.45) !important;
    }

    .mobileHeader.scrolled a,
    .mobileHeader.scrolled i,
    .mobileHeader.scrolled button {
        color: #ffffff !important;
    }

    .mobileHeader.scrolled #menu-btn {
        background: rgba(255,255,255,.10) !important;
        color: #ffffff !important;
    }
</style>

<script>
    window.addEventListener('scroll', function () {
        const desktopHeader = document.querySelector('.desktopHeader');
        const mobileHeader = document.querySelector('.mobileHeader');

        if (window.scrollY > 40) {
            desktopHeader?.classList.add('scrolled');
            mobileHeader?.classList.add('scrolled');
        } else {
            desktopHeader?.classList.remove('scrolled');
            mobileHeader?.classList.remove('scrolled');
        }
    });
</script>
</body>

</html>
