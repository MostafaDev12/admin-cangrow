@extends('layouts.front')

@section('title')
    {{ __('السياحة العلاجية') }} - {{ $gs->{'title_' . $sign} }}
@stop

@section('gsearch')
    <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}" />
@stop

@section('content')
    @php
        $phones = !empty($gs->phones) ? array_filter(array_map('trim', explode(',', $gs->phones))) : [];
        $randomPhone = count($phones) ? Arr::random($phones) : '201555004694';
        $whatsappPhone = preg_replace('/\D+/', '', $randomPhone);
    @endphp

<section class="py-8 bg-[#f6f8fb]">
    <div class="container mx-auto px-4">

<!-- HERO -->
<div class="bg-white rounded-[28px] shadow-sm border border-gray-100 overflow-hidden">
    <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-8 p-5 md:p-8 lg:p-10">

        <!-- Image -->
        <div class="relative order-1 lg:order-1">
            <div class="relative overflow-hidden rounded-[24px] shadow-md">
                <img 
                    src="{{ asset('assets/images/medical-tourism/hero.jpg') }}"
                    alt="{{ __('السياحة العلاجية للأسنان في مصر') }}"
                    class="w-full h-[210px] sm:h-[260px] md:h-[380px] lg:h-[430px] object-cover object-[35%_center] lg:object-center"
                >

                <div class="absolute inset-0 bg-gradient-to-t from-black/25 via-transparent to-transparent"></div>
            </div>
        </div>

        <!-- Content -->
        <div class="text-center lg:text-right order-2 lg:order-2">
            <span class="inline-flex mb-4 rounded-full bg-blue-50 px-4 py-2 text-sm font-bold text-[#1670d8]">
                {{ __('السياحة العلاجية للأسنان في مصر') }}
            </span>

            <h1 class="text-3xl md:text-5xl font-extrabold text-[#1670d8] leading-tight mb-4">
                {{ __('السياحة العلاجية') }}<br>
                <span class="text-[#12a86b]">{{ __('للأسنان في مصر') }}</span>
            </h1>

            <p class="text-gray-600 text-base md:text-lg leading-8 mb-6 max-w-xl mx-auto lg:mx-0">
                {{ __('ابتسامتك المثالية تبدأ الآن مع خطة علاج متكاملة تشمل العلاج، الراحة، والمتابعة داخل مصر.') }}
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm text-gray-700 mb-7">
                <div class="flex items-center justify-center lg:justify-start gap-2 bg-gray-50 rounded-xl px-4 py-3">
                    <span class="text-green-500 text-lg">✔</span>
                    <span>{{ __('خطة علاجية مناسبة لحالتك') }}</span>
                </div>

                <div class="flex items-center justify-center lg:justify-start gap-2 bg-gray-50 rounded-xl px-4 py-3">
                    <span class="text-green-500 text-lg">✔</span>
                    <span>{{ __('أسعار مناسبة وشفافة') }}</span>
                </div>

                <div class="flex items-center justify-center lg:justify-start gap-2 bg-gray-50 rounded-xl px-4 py-3">
                    <span class="text-green-500 text-lg">✔</span>
                    <span>{{ __('إقامة مريحة ومتابعة مستمرة') }}</span>
                </div>

                <div class="flex items-center justify-center lg:justify-start gap-2 bg-gray-50 rounded-xl px-4 py-3">
                    <span class="text-green-500 text-lg">✔</span>
                    <span>{{ __('توفير يصل إلى 70%') }}</span>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 justify-center lg:justify-start">
                <a href="https://wa.me/{{ $whatsappPhone }}" target="_blank"
                   class="bg-[#12a86b] hover:bg-[#12a86b] text-white px-7 py-3.5 rounded-xl font-bold text-sm transition shadow-sm">
                    {{ __('احجز الآن عبر واتساب') }}
                </a>
   
<button type="button"
        onclick="document.getElementById('globalBookingModal').classList.remove('hidden'); document.body.style.overflow = 'hidden';"
        class="inline-flex items-center justify-center border border-[#1670d8] text-[#1670d8] hover:bg-[#1670d8] hover:text-white px-7 py-3.5 rounded-xl font-bold text-sm transition w-full sm:w-auto min-w-[220px]">
    {{ __('احجز استشارتك الان') }}
</button>
            </div>
        </div>

    </div>
</div>

 
<!-- TREATMENTS -->
<div class="mt-12" id="treatments">
    <div class="text-center mb-8">
        <h2 class="text-2xl md:text-4xl font-extrabold text-[#1670d8] mb-3">
            {{ __('علاجات الأسنان في زيارات قصيرة') }}
        </h2>

        <p class="text-gray-500 text-sm md:text-base">
            {{ __('حلول علاجية وتجميلية متقدمة خلال فترة مناسبة لرحلتك') }}
        </p>
    </div>

    @php
        $treatments = [
            [
                'img' => 'تقويم الأسنان.png',
                'title' => __('تقويم الأسنان'),
                'text' => __('حلول متطورة للحصول على ابتسامة متناسقة'),
            ],
            [
                'img' => 'هوليود سمايل.png',
                'title' => __('هوليوود سمايل'),
                'text' => __('تصميم ابتسامة مثالية بمظهر جذاب'),
               'slug' => 'هوليود-سمايل',
            ],
            [
                'img' => 'تبيض الاسنان.png',
                'title' => __('تبييض الأسنان'),
                'text' => __('ابتسامة أكثر إشراقًا ولونًا أنقى'),
               'slug' => 'تبيض-الاسنان',
            ],
            [
                'img' => 'زراعة الأسنان.png',
                'title' => __('زراعة الأسنان'),
                'text' => __('حلول دائمة لتعويض الأسنان المفقودة'),
            ],
            [
                'img' => 'علاج الجذور.png',
                'title' => __('علاج الجذور'),
                'text' => __('علاج دقيق للحفاظ على الأسنان الطبيعية'),
            ],
            [
                'img' => 'علاج اللثه.png',
                'title' => __('علاج اللثة'),
                'text' => __('رعاية متخصصة لصحة اللثة والأسنان'),
               'slug' => 'علاج-اللثه',
            ],
          [
             'img' => 'حشو الاسنان.png',
                'title' => __('حشو الأسنان'),
               'text' => __('حشوات آمنة لعلاج التسوس واستعادة شكل السن'),
                'slug' => 'حشو-الاسنان',
            ],
            [
                'img' => 'الحشوات التجميلية.png',
                'title' => __('الحشوات التجميلية'),
                'text' => __('حشوات بلون طبيعي لتحسين شكل الابتسامة'),
            ],
            [
                'img' => 'طب أسنان الأطفال.png',
                'title' => __('طب أسنان الأطفال'),
                'text' => __('رعاية لطيفة وآمنة لصحة أسنان الأطفال'),
            ],
        ];
    @endphp

    <div class="relative px-10 md:px-14">

        <!-- Left Button -->
        <button 
            type="button"
            onclick="scrollTreatments('left')"
            class="absolute left-0 top-1/2 z-20 -translate-y-1/2 w-10 h-10 rounded-full bg-white shadow-lg border border-gray-100 text-[#1670d8] flex items-center justify-center hover:bg-[#1670d8] hover:text-white transition">
            <i class="fa-solid fa-chevron-left text-sm"></i>
        </button>

        <!-- Right Button -->
        <button 
            type="button"
            onclick="scrollTreatments('right')"
            class="absolute right-0 top-1/2 z-20 -translate-y-1/2 w-10 h-10 rounded-full bg-white shadow-lg border border-gray-100 text-[#1670d8] flex items-center justify-center hover:bg-[#1670d8] hover:text-white transition">
            <i class="fa-solid fa-chevron-right text-sm"></i>
        </button>

        <!-- Slider -->
        <div 
            id="treatmentsSlider"
            dir="ltr"
            class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory py-3 no-scrollbar"
        >
            @foreach($services as $item)

           @php
    if (!empty( $item->{'slug_' . $sign} )) {
        $serviceUrl = route('single-service.index'.$lang, [
            'slug' => $item->{'slug_' . $sign},
            'lang' => $lang
        ]);
    } else {
        $linkedService = $services->first(function ($servic) use ($item, $sign) {
            return trim($servic->{'title_' . $sign}) === trim($item['title']);
        });

        $serviceUrl = $linkedService
            ? route('single-service.index'.$lang, [
                'slug' => $linkedService->{'slug_' . $sign},
                'lang' => $lang
            ])
            : '#';
    }
@endphp

                <a 
                    href="{{ $serviceUrl }}"
                    dir="rtl"
                    class="treatment-card shrink-0 snap-start w-full lg:w-[calc((100%_-_48px)/3)] group bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-xl"
                >

                    <!-- Image -->
                    <div class="relative h-[185px] md:h-[200px] overflow-hidden bg-gray-100">
                        <img
                            src="{{ $item->photo }}"
                            alt="{{ $item->{'title_' . $sign} }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
                    </div>

                    <!-- Content -->
                    <div class="p-5 text-center">
                        <h3 class="font-extrabold text-[#1670d8] text-lg md:text-xl mb-3">
                            {{ $item->{'title_' . $sign} }}
                        </h3>

                        <p class="text-gray-600 text-sm leading-7 min-h-[56px]">
                           {{ $item->{'short_details_' . $sign} }}
                        </p>

                        <div class="mt-4 flex justify-center">
                            <span class="w-9 h-9 rounded-full border border-[#1670d8]/25 text-[#1670d8] flex items-center justify-center group-hover:bg-[#1670d8] group-hover:text-white transition-all">
                                <i class="fa-solid fa-arrow-left text-sm"></i>
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>

<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<script>
    function scrollTreatments(direction) {
        const slider = document.getElementById('treatmentsSlider');
        if (!slider) return;

        const card = slider.querySelector('.treatment-card');
        if (!card) return;

        const gap = 24;
        const cardWidth = card.offsetWidth + gap;

        // على اللاب يقلب 3 كروت
        // على الموبايل يقلب كارد واحدة
        const cardsPerClick = window.innerWidth >= 1024 ? 3 : 1;
        const scrollAmount = cardWidth * cardsPerClick;

        slider.scrollBy({
            left: direction === 'left' ? -scrollAmount : scrollAmount,
            behavior: 'smooth'
        });
    }
</script>
<!-- TREATMENTS -->



<!-- FEATURES -->
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mt-6">
    @php
        $features = [
            ['icon' => '🛡️', 'title' => __('جودة عالية'), 'text' => __('رعاية طبية بمعايير عالمية')],
            ['icon' => '💰', 'title' => __('أسعار أقل'), 'text' => __('توفير يصل إلى 70%')],
            ['icon' => '📅', 'title' => __('تنسيق رحلة علاجية'), 'text' => __('تنظيم كامل لمواعيدك')],
            ['icon' => '👨‍⚕️', 'title' => __('رعاية شخصية'), 'text' => __('فريق طبي وخطة علاج')],
            ['icon' => '🏨', 'title' => __('إقامة مريحة'), 'text' => __('خيارات إقامة مناسبة')],
            ['icon' => '✈️', 'title' => __('تنقلات سهلة'), 'text' => __('مساعدة في التنقل والوصول')],
        ];
    @endphp

    @foreach($features as $feature)
        <div class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-5 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            <div class="w-12 h-12 mx-auto mb-3 rounded-2xl bg-blue-50 flex items-center justify-center text-2xl group-hover:bg-[#1670d8]/10 transition">
                {{ $feature['icon'] }}
            </div>

            <h3 class="text-[#1670d8] font-extrabold text-sm mb-2">
                {{ $feature['title'] }}
            </h3>

            <p class="text-xs text-gray-500 leading-6">
                {{ $feature['text'] }}
            </p>
        </div>
    @endforeach
</div>

<!-- WHY EGYPT -->
<div class="mt-8 bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden p-5 md:p-7">
    <div class="grid grid-cols-1 lg:grid-cols-[1fr_1fr] gap-8 items-center min-h-[360px]">

 <!-- Image Side -->
<div class="order-1 lg:order-1 h-[280px] md:h-[360px] lg:h-[390px] flex items-center justify-center">
    <div class="w-full h-full overflow-hidden rounded-[28px] border border-gray-100 shadow-sm bg-white flex items-center justify-center">
        <img 
            src="{{ asset('assets/images/medical-tourism/doctor3.png') }}"
            alt="{{ __('طبيب أسنان') }}"
            class="w-full h-full object-cover object-[center_35%] lg:object-[center_28%] rounded-[24px]"
        >
    </div>
</div>

        <!-- Content Side -->
        <div class="order-2 lg:order-2 text-center lg:text-right px-2">
            <h2 class="text-2xl md:text-3xl font-extrabold text-[#1670d8] mb-4 leading-tight">
                {{ __('لماذا أصبحت توث جارد وجهتك المميزة للسياحة العلاجية في مصر') }}<br>
            </h2>

            <p class="text-gray-600 text-sm md:text-base leading-8 mb-6 max-w-2xl mx-auto lg:mx-0">
                {{ __('تجمع مصر بين الكفاءة الطبية العالية، الأسعار المناسبة، والخبرة الواسعة في علاجات الأسنان المختلفة،
                مع تجربة سفر مريحة وخدمات مساندة تجعل رحلتك العلاجية أسهل وأكثر أمانًا.') }}
            </p>

            <div class="grid grid-cols-3 gap-3">
                <div class="bg-[#f6f8fb] rounded-2xl p-4 text-center border border-gray-100 shadow-sm">
                    <div class="text-xl mb-2">🕒</div>
                    <h4 class="font-bold text-[#12a86b] text-xs md:text-sm mb-1">{{ __('خطة علاج مرنة') }}</h4>
                    <p class="text-[11px] text-gray-600 leading-5">{{ __('تنظيم مناسب لرحلتك العلاجية') }}</p>
                </div>

                <div class="bg-[#f6f8fb] rounded-2xl p-4 text-center border border-gray-100 shadow-sm">
                    <div class="text-xl mb-2">🌍</div>
                    <h4 class="font-bold text-[#12a86b] text-xs md:text-sm mb-1">{{ __('جودة عالمية') }}</h4>
                    <p class="text-[11px] text-gray-600 leading-5">{{ __('خدمات حديثة ومعايير عالية') }}</p>
                </div>

                <div class="bg-[#f6f8fb] rounded-2xl p-4 text-center border border-gray-100 shadow-sm">
                    <div class="text-xl mb-2">💸</div>
                    <h4 class="font-bold text-[#12a86b] text-xs md:text-sm mb-1">{{ __('أسعار أقل') }}</h4>
                    <p class="text-[11px] text-gray-600 leading-5">{{ __('توفير قد يصل إلى 70%') }}</p>
                </div>
            </div>
        </div>

    </div>
</div>






 <!-- JOURNEY + STATS BAND -->
<div class="mt-10 rounded-3xl overflow-hidden shadow-sm border border-gray-100">

    <!-- What Journey Includes -->
 <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-center max-w-3xl mx-auto">

    <div class="flex flex-col items-center gap-2">
        <div class="w-11 h-11 rounded-2xl bg-white text-[#1670d8] flex items-center justify-center shadow-sm">
            <i class="fa-solid fa-headset text-lg"></i>
        </div>
        <h3 class="text-sm font-extrabold text-[#0b4f8f]">{{ __('مترجم طبي') }}</h3>
        <p class="text-xs text-gray-500">{{ __('عند الحاجة') }}</p>
    </div>

    <div class="flex flex-col items-center gap-2">
        <div class="w-11 h-11 rounded-2xl bg-white text-[#1670d8] flex items-center justify-center shadow-sm">
            <i class="fa-solid fa-calendar-check text-lg"></i>
        </div>
        <h3 class="text-sm font-extrabold text-[#0b4f8f]">{{ __('جدول مواعيد منظم') }}</h3>
        <p class="text-xs text-gray-500">{{ __('بدون انتظار') }}</p>
    </div>

    <div class="flex flex-col items-center gap-2">
        <div class="w-11 h-11 rounded-2xl bg-white text-[#1670d8] flex items-center justify-center shadow-sm">
            <i class="fa-solid fa-seedling text-lg"></i>
        </div>
        <h3 class="text-sm font-extrabold text-[#0b4f8f]">{{ __('متابعة بعد العودة') }}</h3>
        <p class="text-xs text-gray-500">{{ __('وأنت في بلدك') }}</p>
    </div>

</div>
    <!-- Stats Band -->
    <div class="relative overflow-hidden bg-[#06416f] px-5 py-6 text-white">

        <!-- Decorative Tooth Icon -->
        <div class="hidden md:flex absolute right-6 top-1/2 -translate-y-1/2 w-28 h-28 rounded-full bg-white/10 items-center justify-center">
            <i class="fa-solid fa-tooth text-6xl text-white/80"></i>
        </div>

        <h2 class="text-center text-xl md:text-2xl font-extrabold mb-6">
            {{ __('لماذا تختار Tooth Guard Clinic؟') }}
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 text-center md:pr-28">

            <div class="border-l border-white/15 last:border-l-0 px-3">
                <div class="mb-2 text-white/70">
                    <i class="fa-solid fa-award text-xl"></i>
                </div>
                <div class="text-2xl md:text-3xl font-extrabold text-white">20+</div>
                <div class="text-xs md:text-sm mt-1 text-white/80">{{ __('عامًا من الخبرة') }}</div>
            </div>

            <div class="border-l border-white/15 px-3">
                <div class="mb-2 text-white/70">
                    <i class="fa-solid fa-heart-pulse text-xl"></i>
                </div>
                <div class="text-2xl md:text-3xl font-extrabold text-white">15K+</div>
                <div class="text-xs md:text-sm mt-1 text-white/80">{{ __('مريض من مختلف الدول') }}</div>
            </div>

            <div class="border-l border-white/15 px-3">
                <div class="mb-2 text-white/70">
                    <i class="fa-solid fa-paper-plane text-xl"></i>
                </div>
                <div class="text-2xl md:text-3xl font-extrabold text-white">98%</div>
                <div class="text-xs md:text-sm mt-1 text-white/80">{{ __('نسبة رضا المرضى') }}</div>
            </div>

            <div class="border-l border-white/15 px-3">
                <div class="mb-2 text-white/70">
                    <i class="fa-solid fa-star text-xl"></i>
                </div>
                <div class="text-2xl md:text-3xl font-extrabold text-white">5★</div>
                <div class="text-xs md:text-sm mt-1 text-white/80">{{ __('تقييمات ممتازة') }}</div>
            </div>

            <div class="px-3 col-span-2 md:col-span-1">
                <div class="mb-2 text-white/70">
                    <i class="fa-solid fa-shield-heart text-xl"></i>
                </div>
                <div class="text-2xl md:text-3xl font-extrabold text-white">{{ __('أحدث') }}</div>
                <div class="text-xs md:text-sm mt-1 text-white/80">{{ __('الأجهزة والتقنيات') }}</div>
            </div>

        </div>
    </div>

</div>
     






<!-- TRAVEL GOAL -->
<div class="mt-8 bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden p-5 md:p-7">
    <div class="grid grid-cols-1 lg:grid-cols-[1.15fr_0.85fr] gap-8 items-center min-h-[430px]">

        <!-- Content Side -->
        <div class="order-2 lg:order-1 text-center lg:text-right px-2">
            <h2 class="text-2xl md:text-3xl font-extrabold text-[#1670d8] mb-4 leading-tight">
                {{ __('علاج متكامل يناسب احتياجاتك في توث جارد') }}  
            </h2>

            <p class="text-gray-600 text-sm md:text-base leading-8 mb-6 max-w-2xl mx-auto lg:mx-0">
                {{ __('نقدم لك برنامجًا متكاملًا يشمل التشخيص، خطة العلاج، المتابعة، والمساعدة في ترتيبات الرحلة،
                لتستفيد من أفضل تجربة علاجية وسياحية في نفس الوقت.') }}
            </p>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div class="bg-[#f6f8fb] rounded-2xl p-4 text-center border border-gray-100 shadow-sm">
                    <div class="text-2xl mb-2">🦷</div>
                    <p class="text-sm font-bold text-[#1670d8]">{{ __('أسعار مرنة') }}</p>
                </div>

                <div class="bg-[#f6f8fb] rounded-2xl p-4 text-center border border-gray-100 shadow-sm">
                    <div class="text-2xl mb-2">📋</div>
                    <p class="text-sm font-bold text-[#1670d8]">{{ __('متابعة دقيقة') }}</p>
                </div>

                <div class="bg-[#f6f8fb] rounded-2xl p-4 text-center border border-gray-100 shadow-sm">
                    <div class="text-2xl mb-2">🏥</div>
                    <p class="text-sm font-bold text-[#1670d8]">{{ __('خدمات علاجية شاملة') }}</p>
                </div>

               
            </div>
        </div>

        <!-- Image Side -->
        <div class="order-1 lg:order-2 rounded-2xl bg-white h-[280px] sm:h-[320px] md:h-[380px] lg:h-[420px] flex items-center justify-center overflow-hidden">
            <img
                src="{{ asset('assets/images/medical-tourism/travel.png') }}"
                alt="{{ __('السفر والعلاج') }}"
                class="w-full sm:w-[92%] md:w-[82%] lg:w-[85%] h-auto max-h-full object-contain object-center rounded-2xl">
        </div>

    </div>
</div>


     
<!-- TESTIMONIALS -->
<div class="mt-10" id="testimonials">
    <h2 class="text-2xl md:text-3xl font-extrabold text-center text-[#1670d8] mb-6">
        {{ __('تجارب مرضانا') }}
    </h2>

    @php
        $patients = [
            [
                'name' => 'hazem khaled',
                'country' => __('مصر'),
                'review' =>__('افضل عيادة اسنان فى مدينة نصر تقريبا متخصصين فى كل ما يخص الاسنان من تقويم اسنان زراعة اسنان.')
            ],
            [
                'name' => 'Sama Emad',
                'country' => __('مصر'),
                'review' => __('تجربه ممتازه ودكاتره ممتازين واكتر حاجه مريحه بنسبالي هيا التعقيم والمواعيد ودي اكتر حاجه بيهتمو بيه حقيقي علي غير مراكز تانيه كتير شكرا توث جارد علي تجربتي معاكو 🌸')
            ],
            [
                'name' => 'Mohamed Abdelkader',
                'country' => __('مصر'),
                'review' => __('من افضل الاماكن والتعامل ويقدم افضل خدمة وخامة محترمة جدااا جداا.')
            ],
            [
                'name' => 'Nour',
                'country' => __('مصر'),
                'review' => __('أفضل تجربة لي، احترافية عالية. أنصح بها بشدة.')
            ],
            [
                'name' => 'Ahmed Fouad',
                'country' => __('مصر'),
                'review' => __('عيادة ممتازة مع أطباء ممتازين.')
            ],
            [
                'name' => 'Ahmed Ghaly',
                'country' => __('مصر'),
                'review' => __('تجربة رائعة.')
            ],
            [
                'name' => 'Wafaa Hegab',
                'country' => __('مصر'),
                'review' => __('أفضل الأطباء وأفضل عيادة.')
            ],
            [
                'name' => 'Mohamed Hegab',
                'country' => __('مصر'),
                'review' => __('عيادة أسنان رائعة حقًا.')
            ],
        ];
    @endphp

    <div class="relative px-10 md:px-14">

        <!-- Left Button -->
        <button 
            type="button"
            onclick="scrollPatients('left')"
            class="absolute left-0 top-1/2 z-20 -translate-y-1/2 w-10 h-10 rounded-full bg-white shadow-lg border border-gray-100 text-[#1670d8] flex items-center justify-center hover:bg-[#1670d8] hover:text-white transition">
            <i class="fa-solid fa-chevron-left text-sm"></i>
        </button>

        <!-- Right Button -->
        <button 
            type="button"
            onclick="scrollPatients('right')"
            class="absolute right-0 top-1/2 z-20 -translate-y-1/2 w-10 h-10 rounded-full bg-white shadow-lg border border-gray-100 text-[#1670d8] flex items-center justify-center hover:bg-[#1670d8] hover:text-white transition">
            <i class="fa-solid fa-chevron-right text-sm"></i>
        </button>

        <!-- Slider -->
        <div 
            id="patientsSlider"
            dir="ltr"
            class="flex gap-5 overflow-x-auto scroll-smooth snap-x snap-mandatory py-3 no-scrollbar"
        >
            @foreach($patients as $patient)
                @php
                    $name = trim($patient['name']);
                    $initial = mb_substr($name, 0, 1, 'UTF-8');
                @endphp

                <div class="patient-card shrink-0 snap-start w-full lg:w-[calc((100%-40px)/3)] bg-white rounded-3xl shadow-sm border border-gray-100 p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                    <div dir="rtl" class="flex items-start gap-4">

                        <!-- Initial Avatar -->
                        <div class="shrink-0 w-16 h-16 rounded-full border-4 border-[#f6f8fb] bg-gradient-to-br from-[#1670d8] to-[#12a86b] text-white flex items-center justify-center font-extrabold text-2xl uppercase">
                            {{ $initial }}
                        </div>

                        <div class="text-right flex-1">
                            <h3 class="font-extrabold text-[#1670d8] text-base leading-6">
                                {{ $patient['name'] }} - {{ $patient['country'] }}
                            </h3>

                            <p class="text-gray-600 text-sm leading-7 mt-2 min-h-[96px] lg:min-h-[110px]">
                                {{ $patient['review'] }}
                            </p>

                            <div class="text-yellow-400 text-sm mt-2">
                                ★★★★★
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function scrollPatients(direction) {
        const slider = document.getElementById('patientsSlider');
        if (!slider) return;

        const card = slider.querySelector('.patient-card');
        if (!card) return;

        const gap = 20;
        const cardWidth = card.offsetWidth + gap;

        const cardsPerClick = window.innerWidth >= 1024 ? 3 : 1;
        const scrollAmount = cardWidth * cardsPerClick;

        slider.scrollBy({
            left: direction === 'left' ? -scrollAmount : scrollAmount,
            behavior: 'smooth'
        });
    }
</script>
         <!-- TESTIMONIALS -->
         
         <!-- CTA BANNER -->
<div class="mt-10 rounded-3xl overflow-hidden shadow-sm relative bg-[#0b4f8f]">

    <!-- Background Image -->
    <img
        src="{{ asset('assets/images/medical-tourism/النيل.png') }}"
        alt="{{ __('ابدأ رحلتك نحو ابتسامة جديدة') }}"
        class="w-full h-[520px] md:h-[390px] object-cover object-center"
    >

    <!-- Dark Blue Overlay -->
    <div class="absolute inset-0 bg-[#052f55]/45"></div>

    <!-- Soft Gradient -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#06365f]/25 via-[#06365f]/20 to-[#06365f]/60"></div>

    <!-- Content -->
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pb-40 md:pb-20">

        <h2 class="text-white text-2xl md:text-4xl font-extrabold mb-3 leading-tight drop-shadow">
            {{ __('ابدأ رحلتك نحو ابتسامة جديدة') }}
        </h2>

        <p class="text-white/95 mb-6 max-w-3xl mx-auto leading-8 text-sm md:text-base drop-shadow">
            {{ __('تواصل معنا الآن واحصل على استشارتك المجانية وخطة علاجية مخصصة لك') }}
        </p>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center w-full max-w-md sm:max-w-none">

            <!-- WhatsApp Button -->
            <a href="https://wa.me/{{ $whatsappPhone }}"
               target="_blank"
               class="inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white hover:text-[#1670d8] text-white border border-white/45 px-8 py-3 rounded-xl font-bold transition w-full sm:w-auto min-w-[220px] backdrop-blur-sm">
                {{ __('تواصل عبر واتساب') }}
                <i class="fa-brands fa-whatsapp text-xl"></i>
            </a>

            <!-- Booking Button -->
         <button type="button"
        onclick="document.getElementById('globalBookingModal').classList.remove('hidden'); document.body.style.overflow = 'hidden';"
        class="inline-flex items-center justify-center border border-[#12a86b] text-[#12a86b] hover:bg-[#12a86b] hover:text-white px-7 py-3.5 rounded-xl font-bold text-sm transition w-full sm:w-auto min-w-[220px]">
    {{ __('احجز استشارتك الان') }}
</button>
        </div>
    </div>

    <!-- Bottom Services Strip -->
    <div class="absolute bottom-0 left-0 right-0 bg-[#052f55]/85 backdrop-blur-sm border-t border-white/15">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-3 px-4 py-4 text-white text-center">

            <div class="flex items-center justify-center gap-2 text-xs md:text-sm">
                <i class="fa-solid fa-plane-arrival text-lg text-white/85"></i>
                <span>{{ __('استقبال من المطار') }}</span>
            </div>

            <div class="flex items-center justify-center gap-2 text-xs md:text-sm">
                <i class="fa-solid fa-building text-lg text-white/85"></i>
                <span>{{ __('خدمة VIP') }}</span>
            </div>

            <div class="flex items-center justify-center gap-2 text-xs md:text-sm">
                <i class="fa-solid fa-car text-lg text-white/85"></i>
                <span>{{ __('إقامة فندقية مميزة') }}</span>
            </div>

            <div class="flex items-center justify-center gap-2 text-xs md:text-sm">
                <i class="fa-solid fa-bolt text-lg text-white/85"></i>
                <span>{{ __('دعم فوري وسريع') }}</span>
            </div>

            <div class="flex items-center justify-center gap-2 text-xs md:text-sm col-span-2 md:col-span-1">
                <i class="fa-solid fa-headset text-lg text-white/85"></i>
                <span>{{ __('دعم على مدار الساعة') }}</span>
            </div>

        </div>
    </div>
</div>

    </div>
</section>


@stop