<!DOCTYPE html>
<html lang="{{ $sign }}" dir="{{ session::get('front_language_duraction') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp




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
        <meta property="og:title" content="{{ $blog->{'meta_title_' . $sign} ?? $blog->{'title_' . $sign} }}">

        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->{'meta_details_' . $sign} }}">
        <meta property="og:description" content="{{ $blog->{'meta_details_' . $sign} }}">
    @else
        <meta property="og:title" content="{{ $gs->{'title_' . $sign} }}">
        <meta property="og:description" content="{{ $gs->{'title_' . $sign} }}">
        </title>
        <meta name="+author" content=" {{ $gs->{'title_' . $sign} }}">
    @endif


    <title>
        @yield('title')
    </title>

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

    $randomAddress = Arr::random($addresses);
    $randomPhone = Arr::random($phones);
    $randomEmail = Arr::random($emails);
@endphp


<body class="bg-white">

    <header class="shadow-md">
        <!-- Top bar -->
        <div class="bg-custom-blue text-gray-300 text-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-center py-2">
                    <div
                        class="flex flex-wrap justify-center md:justify-start items-center space-x-4 space-x-reverse mb-2 md:mb-0">
                        <div class="flex items-center space-x-2 space-x-reverse my-1 break-words">
                            <i class="fas fa-envelope text-white"></i>
                            <a href="mailto:{{ $randomEmail }}"
                                class="hover:text-white transition-colors  break-all">{{ $randomEmail }}
                            </a>
                        </div>
                        <div class="hidden lg:flex items-center space-x-2 space-x-reverse my-1">
                            <i class="fas fa-map-marker-alt text-white"></i>
                            <span>
                              {{ $randomAddress }}


                            </span>
                        </div>
                        <div class="flex items-center space-x-2 space-x-reverse my-1">
                            <i class="fas fa-phone-alt text-white"></i>
                            <a href="tel:{{ $randomPhone }}" class="hover:text-white transition-colors">{{ $randomPhone }}</a>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                         @if(App\Models\Socialsetting::find(1)->t_status == 1) 
                        <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" aria-label="Twitter" class="hover:text-white transition-colors"><i
                                class="fab fa-twitter"></i></a>
 @endif
 @if(App\Models\Socialsetting::find(1)->f_status == 1)
                        <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" aria-label="Facebook"
                            class="hover:text-white transition-colors"><i class="fab fa-facebook-f"></i></a>
 @endif
  @if(App\Models\Socialsetting::find(1)->ystatus == 1)
                        <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" aria-label="YouTube" class="hover:text-white transition-colors"><i
                                class="fab fa-youtube"></i></a>
 @endif
 @if(App\Models\Socialsetting::find(1)->i_status == 1)
                        <a href="{{ App\Models\Socialsetting::find(1)->instagram }}" aria-label="Instagram" class="hover:text-white transition-colors"><i
                                class="fab fa-instagram"></i></a>
 @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-24">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="">
                            <img class="h-24 w-auto p-0 m-0" src="{{ $gs->{'logo_' . $sign} }}"
                                alt="Life Makers Logo">
                        </a>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex justify-center flex-grow">
                        <div class="flex items-center space-x-5 space-x-reverse">
                            <!-- Home -->
                            <a href="{{ route('front.index',$sign) }}"
                                class="font-semibold text-gray-700 hover:text-custom-orange transition-colors">{{ __('الرئيسية') }}</a>

                            <!-- Life Makers Dropdown -->
                            <div class="relative  dropdown">
                                <button
                                    class="dropdown-btn font-semibold text-gray-700 hover:text-custom-orange transition-colors flex items-center">
                                       {{ __('دار التوفيق') }}
                                    <i class="fas fa-chevron-down mr-1 text-xs"></i>
                                </button>
                                <div
                                    class="dropdown-menu absolute hidden bg-white shadow-lg rounded-md mt-2 w-64 z-10 border border-gray-200">
                                    <div class="py-2">
                                        <a href="./about.html"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-custom-orange">من
                                            نحن</a>
                                        <a href="./our-impact.html"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-custom-orange">انتشارنا</a>
                                        <a href="./associations.html"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-custom-orange">الجمعيات</a>
                                        <a href="./board-trustees.html"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-custom-orange">مجلس
                                            الأمناء</a>
                                        <a href="./achievements.html"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-custom-orange">الإنجازات</a>
                                        <a href="./certificate.html"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-custom-orange">


                                            إنجازاتنا وشهادات التقدير

                                        </a>
                                        <a href="./gallery.html"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-custom-orange">الجاليري</a>
                                        <a href="./stories-success-volunteers.html"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-custom-orange">شركاء
                                            النجاح</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Services -->
                            <a href="./projectjs.html"
                                class="font-semibold text-gray-700 hover:text-custom-orange transition-colors">خدماتنا
                                و
                                مشروعاتنا
                            </a>
                            <li class="relative group">
                                <a href="./agenda.html"
                                    class="font-semibold text-gray-700 hover:text-custom-orange transition-colors">
                                    الأجندة الشهرية
                                </a>
                            </li>
                            <!-- Donation Dropdown -->
                            <!-- Dropdown Wrapper -->
                            <div class="relative dropdown">
                                <button
                                    class="dropdown-btn font-semibold text-gray-700 hover:text-custom-orange transition-colors flex items-center">
                                    التبرع
                                    <i class="fas fa-chevron-down mr-1 text-xs"></i>
                                </button>
                                <div
                                    class="dropdown-menu absolute hidden bg-white shadow-lg rounded-md mt-2 w-64 z-10 border border-gray-200">
                                    <div class="py-2">
                                        <a href="https://donate.lifemakers.org/"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-custom-orange">
                                            التبرع عبر الموقع الإلكتروني
                                        </a>

                                        <a href="#تبرع-عبر-البنوك/"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-custom-orange">
                                            التبرع عبر البنوك
                                        </a>

                                        <a href="#التبرعات-العينية/"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-custom-orange">
                                            التبرعات العينية
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <!-- Humanitarian Cases -->
                            <a href="./donate.html"
                                class="font-semibold text-gray-700 hover:text-custom-orange transition-colors">حالات
                                انسانية</a>

                            <!-- Volunteering Dropdown -->
                            <div class="relative dropdown">
                                <button
                                    class="dropdown-btn font-semibold text-gray-700 hover:text-custom-orange transition-colors flex items-center">
                                    التطوع
                                    <i class="fas fa-chevron-down mr-1 text-xs"></i>
                                </button>
                                <div
                                    class="dropdown-menu absolute hidden bg-white shadow-lg rounded-md mt-2 w-48 z-10 border border-gray-200">
                                    <div class="py-2">
                                        <a href="./donate.html"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-custom-orange">عن
                                            التطوع</a>
                                        <a href="./be-volunteer.html"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-custom-orange">كن
                                            متطوع</a>
                                        <a href="./stories-success-volunteers.html"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-custom-orange">قصص
                                            نجاح المتطوعيين</a>
                                    </div>
                                </div>
                            </div>
                            <!-- News -->
                            <a href="./news.html"
                                class="font-semibold text-gray-700 hover:text-custom-orange transition-colors">الأخبار</a>

                            <!-- Privacy Policy -->
                            <a href="./privacy.html"
                                class="hidden lg:block font-semibold text-gray-700 hover:text-custom-orange transition-colors">سياسة
                                الخصوصية</a>

                            <!-- Contact Us -->
                            <a href="./contact.html"
                                class="font-semibold text-gray-700 hover:text-custom-orange transition-colors">اتصل
                                بنا</a>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center space-x-4 space-x-reverse">
                        <!-- Search -->
                        <div class="hidden md:flex items-center">
                            <button id="search-btn"
                                class="flex items-center justify-center w-10 h-10 bg-custom-orange rounded-full text-white hover:bg-accent transition-colors">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                        <!-- Language -->
                        <a href="#"
                            class="hidden md:block text-gray-700 hover:text-custom-orange ml-3">English</a>

                        <!-- Mobile Menu Button -->
                        <button id="mobile-menu-button"
                            class="md:hidden text-gray-700 hover:text-custom-orange focus:outline-none">
                            <i class="fas fa-bars fa-lg"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden border-t border-gray-200 bg-white">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="#"
                        class="block px-3 py-2 rounded-md font-medium text-gray-700 hover:text-custom-orange hover:bg-gray-50">الرئيسية</a>

                    <!-- Life Makers Mobile Dropdown -->
                    <div class="relative">
                        <button
                            class="mobile-dropdown-toggle w-full text-left px-3 py-2 rounded-md font-medium text-gray-700 hover:text-custom-orange hover:bg-gray-50 flex justify-between items-center">
                            دار التوفيق
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div class="mobile-dropdown-content hidden pl-4">
                            <a href="#%d9%85%d9%86-%d9%86%d8%ad%d9%86/"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">من
                                نحن</a>
                            <a href="#%d8%a7%d9%86%d8%aa%d8%b4%d8%a7%d8%b1%d9%86%d8%a7/"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">انتشارنا</a>
                            <a href="#%d8%a7%d9%84%d8%ac%d9%85%d8%b9%d9%8a%d8%a7%d8%aa/"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">الجمعيات</a>
                            <a href="#%d9%85%d8%ac%d9%84%d8%b3-%d8%a7%d9%84%d8%a3%d9%85%d9%86%d8%a7%d8%a1/"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">مجلس
                                الأمناء</a>
                            <a href="#%d8%a7%d9%84%d8%a5%d9%86%d8%ac%d8%a7%d8%b2%d8%a7%d8%aa/"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">الإنجازات</a>
                            <a href="#%d8%ac%d8%a7%d8%a6%d8%b2%d8%a9-%d8%af%d9%88%d9%82-%d8%a7%d8%af%d9%86%d8%a8%d8%b1%d8%a9/"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">جائزة
                                دوق ادنبرة</a>
                            <a href="#%d8%a7%d9%84%d8%ac%d8%a7%d9%84%d9%8a%d8%b1%d9%8a/"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">الجاليري</a>
                            <a href="#%d8%b4%d8%b1%d9%83%d8%a7%d8%a1-%d8%a7%d9%84%d9%86%d8%ac%d8%a7%d8%ad/"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">شركاء
                                النجاح</a>
                        </div>
                    </div>

                    <a href="#%d8%ae%d8%af%d9%85%d8%aa%d9%86%d8%a7-%d9%88%d9%85%d8%b4%d8%b1%d9%88%d8%b9%d8%aa%d9%86%d8%a7/"
                        class="block px-3 py-2 rounded-md font-medium text-gray-700 hover:text-custom-orange hover:bg-gray-50">خدمتنا
                        ومشروعتنا</a>

                    <!-- Donation Mobile Dropdown -->
                    <div class="relative">
                        <button
                            class="mobile-dropdown-toggle w-full text-left px-3 py-2 rounded-md font-bold text-custom-orange hover:text-accent hover:bg-gray-50 flex justify-between items-center">
                            التبرع
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div class="mobile-dropdown-content hidden pl-4">
                            <a href="#booths-location/"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">أماكن
                                منافذ التبرع</a>
                            <a href="https://donate.lifemakers.org/"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">التبرع
                                عبر الموقع الإلكتروني</a>
                            <a href="#%d8%aa%d8%a8%d8%b1%d8%b9-%d8%b9%d8%a8%d8%b1-%d8%a7%d9%84%d8%a8%d9%86%d9%88%d9%83/"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">تبرع
                                عبر البنوك</a>
                            <a href="#%d9%88%d8%b3%d8%a7%d8%a6%d9%84-%d9%88%d9%85%d9%86%d8%a7%d9%81%d8%b0-%d8%a3%d8%ae%d8%b1%d9%89-%d9%84%d9%84%d8%aa%d8%a8%d8%b1%d8%b9/"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">وسائل
                                ومنافذ أخرى للتبرع</a>
                            <a href="#%d8%a7%d9%84%d8%aa%d8%a8%d8%b1%d8%b9%d8%a7%d8%aa-%d8%a7%d9%84%d8%b9%d9%8a%d9%86%d9%8a%d8%a9/"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">التبرعات
                                العينية</a>
                        </div>
                    </div>

                    <a href="https://donate.lifemakers.org/CaseDetails/indexAr"
                        class="block px-3 py-2 rounded-md font-medium text-gray-700 hover:text-custom-orange hover:bg-gray-50">حالات
                        انسانية</a>

                    <!-- Volunteering Mobile Dropdown -->
                    <div class="relative">
                        <button
                            class="mobile-dropdown-toggle w-full text-left px-3 py-2 rounded-md font-medium text-gray-700 hover:text-custom-orange hover:bg-gray-50 flex justify-between items-center">
                            التطوع
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div class="mobile-dropdown-content hidden pl-4">
                            <a href="#"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">عن
                                التطوع</a>
                            <a href="#%d9%83%d9%86-%d9%85%d8%aa%d8%b7%d9%88%d8%b9/"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">كن
                                متطوع</a>
                            <a href="#%d9%82%d8%b5%d8%b5-%d9%86%d8%ac%d8%a7%d8%ad-%d8%a7%d9%84%d9%85%d8%aa%d8%b7%d9%88%d8%b9%d9%8a%d9%8a%d9%86/"
                                class="block px-3 py-2 text-sm text-gray-600 hover:text-custom-orange hover:bg-gray-50">قصص
                                نجاح المتطوعيين</a>
                        </div>
                    </div>

                    <a href="#%d8%a7%d9%84%d8%a3%d8%ae%d8%a8%d8%a7%d8%b1/"
                        class="block px-3 py-2 rounded-md font-medium text-gray-700 hover:text-custom-orange hover:bg-gray-50">الأخبار</a>
                    <a href="#privacy/"
                        class="block px-3 py-2 rounded-md font-medium text-gray-700 hover:text-custom-orange hover:bg-gray-50">سياسة
                        الخصوصية</a>
                    <a href="#%d8%a7%d8%aa%d8%b5%d9%84-%d8%a8%d9%86%d8%a7/"
                        class="block px-3 py-2 rounded-md font-medium text-gray-700 hover:text-custom-orange hover:bg-gray-50">اتصل
                        بنا</a>
                </div>

                <!-- Mobile Search and Language -->
                <div class="px-4 py-3 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <button class="flex items-center text-gray-700 hover:text-custom-orange">
                            <i class="fas fa-search ml-2"></i>
                            <span>بحث</span>
                        </button>
                        <a href="#" class="text-gray-700 hover:text-custom-orange">English</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Search Modal -->
    <div id="search-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden transition-opacity">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg w-full max-w-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">بحث</h3>
                    <button id="close-search" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <form method="get" action="#" class="flex">
                    <input name="s"
                        class="flex-grow border border-gray-300 rounded-r-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-custom-orange focus:border-transparent"
                        type="text" placeholder="بحث...">
                    <button type="submit"
                        class="bg-custom-orange text-white rounded-l-lg px-4 hover:bg-accent transition-colors">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>




    @yield('content')


    <footer class="bg-slate-900 bg-no-repeat bg-cover bg-center text-white"
        style=" background-image:
            url('./assets/imgs/home/bg-1-3.png')">
        <div class="container mx-auto px-4 py-16">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 ">

                <div class="space-y-6">
                    <h5 class="text-xl font-bold text-white mb-6">بيانات التواصل</h5>

                    <div class="flex items-start gap-3">
                        <div
                            class="flex-shrink-0 bg-primary rounded-full w-10 h-10 flex items-center justify-center text-white text-lg">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="text-sm">
                            <strong class="block ">رقم الهاتف:</strong>
                            <span class="text-white" dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}">+20 10 13532333</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div
                            class="flex-shrink-0 bg-primary rounded-full w-10 h-10 flex items-center justify-center text-white text-lg">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="text-sm break-words">
                            <strong class="block ">البريد الإلكتروني:</strong>
                            <a class="text-white break-all"
                                href="mailto:dareltadareltawfikcharityfoundation@gmail.com" dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}">
                                dareltadareltawfikcharityfoundation@gmail.com
                            </a>
                        </div>

                    </div>

                    <div class="flex items-start gap-3">
                        <div
                            class="flex-shrink-0 bg-primary rounded-full w-10 h-10 flex items-center justify-center text-white text-lg">
                            <i class="fa-solid fa-map-marker-alt"></i>
                        </div>
                        <div class="text-sm">
                            <strong class="block ">العنوان:</strong>
                            <span class="text-white">شارع الشهيد (المخيم الدائم) داخل نادي أعضاء هيئة التدريس جامعة
                                الأزهر أمام بوابة الأمن الوطني مدينة نصر , Nasr City
                                مصر</span>
                        </div>
                    </div>

                </div>

                <div>
                    <h5 class="text-xl font-bold text-white mb-6">روابط سريعة</h5>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="hover:text-primary transition-colors">الرئيسية</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">عن نحن</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">الانجازات</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">جائزة دويق للفترة</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">خدمتنا ومجتمعاتنا</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">مجلس الأمناء</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">سياسة الخصوصية</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="text-xl font-bold text-white mb-6">التبرع</h5>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="hover:text-primary transition-colors">التبرع عبر الموقع
                                الالكتروني</a>
                        </li>
                        <li><a href="#" class="hover:text-primary transition-colors">التبرع عبر البنوك</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">وسائل تبرع آخري</a></li>
                    </ul>
                </div>

                <div>
                    <img src="{{ $gs->{'logo_' . $sign} }}" alt="Life Makers Logo" class="w-32 mb-4">
                    <p class="text-sm mb-6">
                        اشترك في النشرة البريدية لمؤسسة دار التوفيق ليصلك كل جديد.
                    </p>

                    <h5 class="text-xl font-bold text-white mb-4">تابع نشرتنا البريدية</h5>
                    <form>
                        <label for="email-subscribe" class="sr-only">البريد الالكتروني</label>
                        <div
                            class="relative flex items-center border border-green-700 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-primary">
                            <input id="email-subscribe" type="email" placeholder="البريد الالكتروني"
                                class="w-full bg-transparent py-3 px-4 text-white focus:outline-none placeholder-white">

                            <button type="submit" aria-label="Subscribe"
                                class="absolute left-1.5 top-1/2 -translate-y-1/2 bg-primary rounded-full w-10 h-10 flex items-center justify-center text-white text-lg hover:bg-accent transition-colors focus:outline-none">
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="bg-primary text-white">
            <div
                class="container mx-auto px-4 py-4 flex flex-col-reverse md:flex-row justify-between items-center text-center md:text-right text-xs gap-4">

                <p>2025
                    © جميع الحقوق محفوظة
                    <span class="mx-2" dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}">|</span>
                    <a href="https://www.cangrowonline.com/en" class="font-bold hover:underline"
                        dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}">Cangrow</a>
                </p>

                <div class="flex items-center gap-4">
                    <a href="#" aria-label="YouTube" class="hover:text-slate-900 transition-colors"><i
                            class="fa-brands fa-youtube text-lg"></i></a>
                    <a href="#" aria-label="Twitter" class="hover:text-slate-900 transition-colors"><i
                            class="fa-brands fa-twitter text-lg"></i></a>
                    <a href="facebook.com/100069528862442" aria-label="Facebook"
                        class="hover:text-slate-900 transition-colors"><i
                            class="fa-brands fa-facebook-f text-lg"></i></a>
                    <a href="instagram.com/%3Futm_source%3Dig_web_copy_link" aria-label="Instagram"
                        class="hover:text-slate-900 transition-colors"><i
                            class="fa-brands fa-instagram text-lg"></i></a>
                    <a href="#" aria-label="LinkedIn" class="hover:text-slate-900 transition-colors"><i
                            class="fa-brands fa-linkedin-in text-lg"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <div id="visitors-popup"
        class="fixed bottom-6 left-6 bg-white rounded-xl shadow-lg border border-gray-200 p-4 w-64 z-50 flex gap-3 animate__animated animate__fadeInUp hidden">
        <div class="flex-shrink-0">
            <i class="fa-solid fa-users text-custom-orange text-2xl"></i>
        </div>
        <div class="flex-1">
            <h4 class="text-base font-semibold text-gray-800 mb-1">عدد الزائرين</h4>
            <p id="visitor-count" class="text-sm text-gray-600">جارِ التحميل...</p>
        </div>
        <button id="close-popup" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>


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
        var gs = {!! json_encode($gs) !!};
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


</body>

</html>
