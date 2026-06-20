  @extends('layouts.front')

@section('title')
   
{{ __('معلومات عنا') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

<!-- Hero Banner -->
<section class="relative w-full overflow-hidden text-white
                aspect-[750/500] md:aspect-auto md:h-[550px]">

    <!-- Mobile Background -->
    <img
        src="{{ asset('assets/images/about/about-slider-mobile.webp') }}"
        alt="{{ __('معلومات عنا') }}"
        class="absolute inset-0 block md:hidden
               w-full h-full object-cover object-center"
        fetchpriority="high"
        decoding="async">

    <!-- Desktop Background -->
    <img
        src="{{ asset('assets/images/about/about-slider.webp') }}"
        alt="{{ __('معلومات عنا') }}"
        class="absolute inset-0 hidden md:block
               w-full h-full object-cover object-center"
        fetchpriority="high"
        decoding="async">

    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r
                from-[#1558e8]/70
                via-[#168db5]/60
                to-[#0ca85f]/70">
    </div>

    <!-- Title -->
    <div class="relative z-10 flex h-full items-center justify-center px-4">
        <h1 class="text-2xl sm:text-5xl font-bold text-center drop-shadow-lg">
            {{ __('معلومات عنا') }}
        </h1>
    </div>

</section>

    <!-- About Tooth Guard -->
    <!--<section class="sm:py-10 py-5 flex flex-col items-center justify-center text-center">-->
    <!--    <h2 class="sm:text-5xl text-2xl text-blue-700 font-bold mb-2">  {{ __('اكثر من 20 عاماً من الخبرة والتمييز') }}</h2>-->
    <!--    <p class="sm:text-2xl text-lg text-green-500 font-bold mb-4">   {{ __('شركائك في صحة الأسنان') }}    </p>-->
    <!--    <p class="w-11/12 sm:w-3/4 text-gray-500 text-sm sm:text-base">-->
        

    <!--        {{ __('في عيادات Tooth Guard، نؤمن بأن العناية بالأسنان يجب أن تكون تجربة شخصية ومتميزة. يضم فريقنا نخبة من الخبراء البارزين وقادة المجال، بما في ذلك أعضاء هيئة التدريس من أرقى الجامعات المصرية. نحن ملتزمون بالابتكار المستمر في طب الأسنان، لضمان تقديم أعلى مستوى من الرعاية لابتسامتك.') }}-->
    <!--    </p>-->
    <!--</section>-->
    
<!-- ABOUT TOOTH GUARD -->
@php
    $currentLanguage = request()->route('lang')
        ?? request()->route('locale')
        ?? request()->segment(1)
        ?? app()->getLocale();

    $isArabic = str_starts_with(
        strtolower((string) $currentLanguage),
        'ar'
    );
@endphp


<section
    id="about"
    dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
    class="relative overflow-hidden bg-[#f7faf8] py-10 md:py-16"
>

    <div class="container mx-auto px-4 lg:px-8 xl:max-w-7xl">

        <div
            class="overflow-hidden rounded-[28px]
                   border border-[#dcebe3]
                   bg-white
                   shadow-[0_24px_70px_rgba(15,39,64,0.12)]"
        >

            <!-- Top Brand Line -->
            <div
                class="h-2 w-full
                       bg-gradient-to-r
                       from-[#2457ff]
                       via-[#168db5]
                       to-[#16bf62]"
            >
            </div>


            <!--
                English:
                Text left / Image right

                Arabic:
                Text right / Image left
            -->
            <div
                dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
                class="grid grid-cols-1 lg:grid-cols-2"
            >

                <!-- Part 1: Text -->
                <div
                    dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
                    class="relative flex min-h-[480px]
                           items-center overflow-hidden
                           bg-gradient-to-br
                           from-[#2457ff]
                           via-[#164c96]
                           to-[#07366f]
                           px-6 py-12
                           md:px-12 md:py-16
                           lg:min-h-[620px] lg:px-14
                           {{ $isArabic ? 'text-right' : 'text-left' }}"
                >

                    <!-- Background Decorations -->
                    <div
                        class="absolute -right-32 -top-32
                               h-96 w-96 rounded-full
                               bg-[#16bf62]/10 blur-3xl"
                    >
                    </div>

                    <div
                        class="absolute -bottom-40 -left-28
                               h-96 w-96 rounded-full
                               bg-[#4d8eff]/15 blur-3xl"
                    >
                    </div>

                    <div
                        class="absolute left-0 top-0
                               h-full w-full
                               bg-[radial-gradient(circle_at_top_left,rgba(255,255,255,0.08),transparent_45%)]"
                    >
                    </div>


                    <div class="relative z-10 w-full">

                        <!-- Title -->
                        <h2
                            dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
                            class="text-center text-3xl
                                   font-extrabold leading-tight
                                   text-white
                                   md:text-4xl lg:text-5xl"
                        >
                            {{ $aboutSection->title
                                ?? __('اكثر من 20 عاماً من الخبرة والتمييز') }}
                        </h2>


                        <!-- Subtitle -->
                        <p
                            dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
                            class="mt-4 text-center
                                   text-xl font-extrabold
                                   text-[#45d36c]
                                   md:text-2xl lg:text-3xl"
                        >
                            {{ $aboutSection->subtitle
                                ?? __('شركائك في صحة الأسنان') }}
                        </p>


                        <!-- Divider -->
                        <div
                            class="mx-auto mt-7 flex
                                   max-w-sm items-center gap-4"
                        >

                            <span class="h-px flex-1 bg-white/30"></span>

                            <span
                                class="flex h-11 w-11
                                       items-center justify-center
                                       rounded-full
                                       border border-[#45d36c]/50
                                       bg-white/5
                                       text-[#45d36c]"
                            >
                                <i class="fa-solid fa-tooth text-lg"></i>
                            </span>

                            <span class="h-px flex-1 bg-white/30"></span>

                        </div>


                        <!-- Description -->
                        <div
                            dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
                            class="mx-auto mt-7 max-w-2xl
                                   text-base leading-9
                                   text-white/90
                                   md:text-lg md:leading-10
                                   {{ $isArabic ? 'text-right' : 'text-left' }}"
                        >
                            {!! nl2br(e(
                                $aboutSection->description
                                ?? __('في عيادات توث جارد، نؤمن بأن العناية بالأسنان يجب أن تكون تجربة شخصية ومتميزة. يضم فريقنا نخبة من الخبراء البارزين وقادة المجال، بما في ذلك أعضاء هيئة التدريس من أرقى الجامعات المصرية. نحن ملتزمون بالابتكار المستمر في طب الأسنان، لضمان تقديم أعلى مستوى من الرعاية لابتسامتك.')
                            )) !!}
                        </div>


                        <!-- Features -->
                        <div
                            class="mt-10 grid grid-cols-2
                                   border-t border-white/15
                                   pt-9 md:grid-cols-4"
                        >

                            <!-- Item 1 -->
                            <div
                                class="px-3 py-3 text-center
                                       md:border-l md:border-white/20"
                            >

                                <div
                                    class="mx-auto flex h-12 w-12
                                           items-center justify-center
                                           text-[#65e780]"
                                >
                                    <i class="fa-solid fa-users text-3xl"></i>
                                </div>

                                <p
                                    class="mt-3 text-sm font-bold
                                           leading-6 text-white"
                                >
                                    {{ $aboutSection->feature_one
                                        ?? __('فريق من الخبراء') }}
                                </p>

                            </div>


                            <!-- Item 2 -->
                            <div
                                class="px-3 py-3 text-center
                                       md:border-l md:border-white/20"
                            >

                                <div
                                    class="mx-auto flex h-12 w-12
                                           items-center justify-center
                                           text-[#65e780]"
                                >
                                    <i class="fa-solid fa-graduation-cap text-3xl"></i>
                                </div>

                                <p
                                    class="mt-3 text-sm font-bold
                                           leading-6 text-white"
                                >
                                    {{ $aboutSection->feature_two
                                        ?? __('أعضاء هيئة تدريس') }}
                                </p>

                            </div>


                            <!-- Item 3 -->
                            <div
                                class="px-3 py-3 text-center
                                       md:border-l md:border-white/20"
                            >

                                <div
                                    class="mx-auto flex h-12 w-12
                                           items-center justify-center
                                           text-[#65e780]"
                                >
                                    <i class="fa-solid fa-shield-heart text-3xl"></i>
                                </div>

                                <p
                                    class="mt-3 text-sm font-bold
                                           leading-6 text-white"
                                >
                                    {{ $aboutSection->feature_three
                                        ?? __('رعاية متكاملة') }}
                                </p>

                            </div>


                            <!-- Item 4 -->
                            <div class="px-3 py-3 text-center">

                                <div
                                    class="mx-auto flex h-12 w-12
                                           items-center justify-center
                                           text-[#65e780]"
                                >
                                    <i class="fa-solid fa-tooth text-3xl"></i>
                                </div>

                                <p
                                    class="mt-3 text-sm font-bold
                                           leading-6 text-white"
                                >
                                    {{ $aboutSection->feature_four
                                        ?? __('ابتسامتك أولويتنا') }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- Part 2: Image -->
                <div
                    class="relative min-h-[420px]
                           md:min-h-[540px]
                           lg:min-h-[620px]"
                >

                    <img
                        src="{{ !empty($aboutSection->image)
                            ? asset('assets/images/about/' . $aboutSection->image)
                            : asset('assets/images/about/Reception.webp') }}"
                        alt="{{ $aboutSection->title ?? __('توث جارد') }}"
                        class="absolute inset-0
                               h-full w-full object-cover"
                        loading="lazy"
                        decoding="async"
                    >


                    <!-- Soft Image Overlay -->
                    <div
                        class="absolute inset-0
                               bg-gradient-to-t
                               from-[#071e35]/20
                               via-transparent
                               to-transparent"
                    >
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
    
<!-- TEAM SECTION -->

@php
    /*
    |--------------------------------------------------------------------------
    | Current Language
    |--------------------------------------------------------------------------
    | يدعم اللغة القادمة من:
    | $sign
    | route: lang
    | route: locale
    | أول جزء من الرابط
    | app locale
    */

    $languageCandidate = $sign
        ?? request()->route('lang')
        ?? request()->route('locale')
        ?? request()->segment(1)
        ?? app()->getLocale();

    $languageCandidate = strtolower(
        str_replace('_', '-', trim((string) $languageCandidate))
    );

    if (
        !str_starts_with($languageCandidate, 'ar')
        && !str_starts_with($languageCandidate, 'en')
    ) {
        $languageCandidate = strtolower(
            str_replace('_', '-', (string) app()->getLocale())
        );
    }

    $isArabic = str_starts_with($languageCandidate, 'ar');


    /*
    |--------------------------------------------------------------------------
    | Doctors Data
    |--------------------------------------------------------------------------
    | كل النصوص داخل __() حتى تظهر في ملف الترجمة بالداشبورد.
    */

    $doctors = [
        [
            'name' => __('دكتور محمد حجاب'),

            'title' => __('أخصائي تجميل وزراعة الأسنان'),

            'academic_title' => __('تجميل وجراحة الأسنان جامعة عين شمس'),

            'description' => __('متخصص في تجميل الأسنان وزراعة الأسنان وتصميم الابتسامة.'),

            'image' => asset('assets/images/doctors /D-mohamed-h.webp'),

            'featured' => true,
        ],

        [
            'name' => __('دكتور علي وهبة'),

            'title' => __('أخصائي جراحات اللثة وزراعة الأسنان'),

            'academic_title' => __('أستاذ مساعد في الجامعة الروسية'),

            'description' => __('متخصص في جراحات اللثة وزراعة الأسنان باستخدام أحدث التقنيات.'),

            'image' => asset('assets/images/doctors /D-ali.webp'),

            'featured' => false,
        ],

        [
            'name' => __('دكتور محمد زايد'),

            'title' => __('أستاذ طب أسنان الأطفال'),

            'academic_title' => '',

            'description' => __('متخصص في طب أسنان الأطفال وتقديم الرعاية المناسبة لمختلف الأعمار.'),

            'image' => asset('assets/images/doctors /D-mohmed-z.webp'),

            'featured' => false,
        ],

        [
            'name' => __('دكتورة ولاء جاد'),

            'title' => __('أخصائية تقويم الأسنان'),

            'academic_title' => __('أستاذ مساعد في جامعة القاهرة'),

            'description' => __('متخصصة في تقويم الأسنان وتحسين انتظام الأسنان والابتسامة.'),

            'image' => asset('assets/images/doctors /ولاء جاد.webp'),

            'featured' => false,
        ],

        [
            'name' => __('دكتورة خلود'),

            'title' => __('أخصائية طب الأسنان'),

            'academic_title' => '',

            'description' => __('تقديم خطط علاج متكاملة ومناسبة لكل حالة باهتمام واحترافية.'),

            'image' => asset('assets/images/doctors /D-Kholoud.webp'),

            'featured' => false,
        ],

        [
            'name' => __('دكتور أحمد عصمت'),

            'title' => __('أخصائي علاج الجذور'),

            'academic_title' => '',

            'description' => __('متخصص في علاج جذور الأسنان والحفاظ على الأسنان بأحدث التقنيات.'),

            'image' => asset('assets/images/doctors /D-ahmed-a.webp'),

            'featured' => false,
        ],

        [
            'name' => __('دكتور أحمد ممدوح'),

            'title' => __('أخصائي تركيبات الأسنان'),

            'academic_title' => __('أستاذ مساعد في جامعة عين شمس'),

            'description' => __('متخصص في تركيبات الأسنان الثابتة والمتحركة واستعادة جمال الابتسامة.'),

            'image' => asset('assets/images/doctors /D-ahmed-m.webp'),

            'featured' => false,
        ],
    ];


    $featuredDoctor = collect($doctors)
        ->firstWhere('featured', true);


    $otherDoctors = collect($doctors)
        ->where('featured', '!=', true)
        ->values();
@endphp


<section
    id="team"
    lang="{{ $isArabic ? 'ar' : 'en' }}"
    dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
    class="relative overflow-hidden bg-[#f7faf8] py-16 md:py-24"
>

    <!-- Decorative Background -->
    <div
        class="absolute left-0 top-0
               h-72 w-72
               rounded-full bg-[#16bf62]/5 blur-3xl"
    >
    </div>

    <div
        class="absolute right-0 top-0
               h-72 w-72
               rounded-full bg-[#2457ff]/5 blur-3xl"
    >
    </div>

    <div
        class="absolute bottom-0 left-0
               h-96 w-96
               rounded-full bg-[#16bf62]/[0.07] blur-3xl"
    >
    </div>


    <div
        class="container relative z-10
               mx-auto px-4
               lg:px-8 xl:max-w-7xl"
    >

        <!-- Section Heading -->
        <div
            class="mx-auto mb-12
                   max-w-4xl text-center
                   md:mb-16"
        >

            <h2
                class="text-4xl font-extrabold
                       leading-tight text-[#2457ff]
                       md:text-6xl"
            >
                {{ __('فريقنا') }}
            </h2>


            <p
                class="mt-3 text-xl font-extrabold
                       text-[#16bf62]
                       md:text-3xl"
            >
                {{ __('خبراء شغوفون ملتزمون بابتسامتك') }}
            </p>


            <p
                class="mt-5 text-sm leading-8
                       text-[#3f4a56]
                       md:text-base"
            >
                {{ __('يتكون فريقنا في Tooth Guard Clinics من متخصصين ذوي مهارات عالية لتقديم رعاية أسنان متطورة، يجلب كل عضو في الفريق خبرة فريدة والتزامًا بالتميز.') }}
            </p>

        </div>



        <!-- Cards Area -->
        <div
            class="relative overflow-hidden
                   rounded-[32px]
                   border border-[#cdeedd]
                   bg-gradient-to-br
                   from-[#eefaf3]
                   via-white
                   to-[#eaf8f1]
                   p-5
                   shadow-[0_30px_100px_rgba(15,39,64,0.08)]
                   md:rounded-[42px]
                   md:p-8
                   lg:p-10"
        >

            <!-- Decorative Dots -->
            <div
                class="absolute left-8 top-8
                       hidden opacity-30
                       md:block"
            >

                <div class="grid grid-cols-6 gap-3">

                    @for($i = 0; $i < 24; $i++)

                        <span
                            class="block h-1.5 w-1.5
                                   rounded-full bg-[#16bf62]"
                        >
                        </span>

                    @endfor

                </div>

            </div>


            <div
                class="absolute bottom-10 right-10
                       h-72 w-72
                       rounded-full
                       bg-[#16bf62]/[0.08]
                       blur-2xl"
            >
            </div>


            <div
                class="absolute -bottom-20 -left-20
                       h-80 w-80
                       rounded-full
                       border border-[#16bf62]/20"
            >
            </div>



            <!-- Featured Doctor -->
            @if($featuredDoctor)

                <div
                    class="relative z-10
                           mx-auto mb-8
                           max-w-5xl"
                >

                    <div
                        class="group overflow-hidden
                               rounded-[28px]
                               border border-[#e2f3ea]
                               bg-white
                               shadow-[0_22px_70px_rgba(15,39,64,0.10)]
                               transition-all duration-300
                               hover:-translate-y-2
                               hover:shadow-[0_28px_90px_rgba(15,39,64,0.14)]
                               md:rounded-[32px]"
                    >

                        <!--
                            English:
                            Image left / Text right

                            Arabic:
                            Image right / Text left
                        -->
                        <div
                            dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
                            class="grid min-h-[330px]
                                   grid-cols-1
                                   md:grid-cols-[300px_minmax(0,1fr)]"
                        >

                            <!-- Featured Doctor Image -->
                            <div
                                class="relative flex
                                       min-h-[280px]
                                       items-end justify-center
                                       overflow-hidden
                                       bg-[#f4fbf7]"
                            >

                                <div
                                    class="absolute bottom-0 left-0
                                           h-[85%] w-full
                                           bg-[#e9f8ef]
                                           {{ $isArabic
                                                ? 'rounded-tl-[150px]'
                                                : 'rounded-tr-[150px]'
                                           }}"
                                >
                                </div>


                                <!-- Small Logo -->
                                <div
                                    class="absolute top-5 z-20
                                           flex h-14 w-14
                                           items-center justify-center
                                           rounded-2xl
                                           bg-white shadow-md
                                           {{ $isArabic ? 'right-5' : 'left-5' }}"
                                >

                                    <img
                                        src="{{ asset('assets/images/doctors /اللوجو.png') }}"
                                        alt="Tooth Guard Logo"
                                        class="h-9 w-9 object-contain"
                                    >

                                </div>


                                <!-- Doctor Image -->
                                <img
                                    src="{{ $featuredDoctor['image'] }}"
                                    alt="{{ $featuredDoctor['name'] }}"
                                    loading="lazy"
                                    decoding="async"
                                    class="relative z-10
                                           h-[270px]
                                           max-w-full
                                           rounded-[28px]
                                           object-contain
                                           transition-transform duration-500
                                           group-hover:scale-105
                                           md:h-[310px]
                                           md:rounded-[36px]"
                                >

                            </div>



                            <!-- Featured Doctor Text -->
                            <div
                                dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
                                class="flex min-w-0
                                       flex-col justify-center
                                       p-6
                                       md:p-10
                                       {{ $isArabic ? 'text-right' : 'text-left' }}"
                            >

                                <!-- Featured Badge -->
                                <div
                                    class="mb-5 flex
                                           {{ $isArabic ? 'justify-start' : 'justify-start' }}"
                                >

                                    <span
                                        class="inline-flex items-center gap-2
                                               rounded-full
                                               bg-[#dff5e8]
                                               px-4 py-1.5
                                               text-xs font-extrabold
                                               text-[#129d50]
                                               md:text-sm"
                                    >

                                        <i
                                            class="fa-solid fa-star
                                                   text-[11px]"
                                        >
                                        </i>

                                        {{ __('عضو رئيسي في الفريق') }}

                                    </span>

                                </div>


                                <h3
                                    class="text-3xl font-extrabold
                                           leading-tight
                                           text-[#2457ff]
                                           md:text-5xl"
                                >
                                    {{ $featuredDoctor['name'] }}
                                </h3>


                                <p
                                    class="mt-3
                                           text-lg font-extrabold
                                           text-[#16bf62]
                                           md:text-2xl"
                                >
                                    {{ $featuredDoctor['title'] }}
                                </p>


                                @if(!empty($featuredDoctor['academic_title']))

                                    <div
                                        dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
                                        class="mt-3 flex
                                               items-start gap-2
                                               text-sm font-bold
                                               leading-7
                                               text-[#287258]
                                               md:text-base"
                                    >

                                        <i
                                            class="fa-solid
                                                   fa-graduation-cap
                                                   mt-1.5 shrink-0
                                                   text-[#16bf62]"
                                        >
                                        </i>

                                        <span>
                                            {{ $featuredDoctor['academic_title'] }}
                                        </span>

                                    </div>

                                @endif


                                @if(!empty($featuredDoctor['description']))

                                    <p
                                        dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
                                        class="mt-5
                                               text-sm leading-8
                                               text-[#4b5563]
                                               md:text-base
                                               {{ $isArabic ? 'text-right' : 'text-left' }}"
                                    >
                                        {{ $featuredDoctor['description'] }}
                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            @endif



            <!-- Other Doctors -->
            <div
                dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
                class="relative z-10
                       grid grid-cols-1
                       gap-6
                       md:grid-cols-2
                       xl:grid-cols-3"
            >

                @foreach($otherDoctors as $doctor)

                    <div
                        class="group h-full
                               min-h-[215px]
                               rounded-[24px]
                               border border-[#e2f3ea]
                               bg-white
                               p-5
                               shadow-[0_18px_55px_rgba(15,39,64,0.09)]
                               transition-all duration-300
                               hover:-translate-y-2
                               hover:shadow-[0_24px_75px_rgba(15,39,64,0.13)]
                               md:rounded-[28px]
                               md:p-6"
                    >

                        <!--
                            English:
                            Image left / Text right

                            Arabic:
                            Image right / Text left
                        -->
                        <div
                            dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
                            class="grid h-full
                                   grid-cols-1
                                   items-center gap-5
                                   sm:grid-cols-[130px_minmax(0,1fr)]"
                        >

                            <!-- Doctor Image -->
                            <div class="relative">

                                <!-- Small Logo -->
                                <div
                                    class="absolute -top-3 z-20
                                           flex h-12 w-12
                                           items-center justify-center
                                           rounded-2xl
                                           bg-white shadow-md
                                           {{ $isArabic ? '-right-3' : '-left-3' }}"
                                >

                                    <img
                                        src="{{ asset('assets/images/doctors /اللوجو.png') }}"
                                        alt="Tooth Guard Logo"
                                        class="h-8 w-8 object-contain"
                                    >

                                </div>


                                <div
                                    class="mx-auto
                                           h-32 w-32
                                           rounded-full
                                           bg-[#eef8f2]
                                           p-2
                                           md:h-36 md:w-36"
                                >

                                    <img
                                        src="{{ $doctor['image'] }}"
                                        alt="{{ $doctor['name'] }}"
                                        loading="lazy"
                                        decoding="async"
                                        width="144"
                                        height="144"
                                        class="h-full w-full
                                               rounded-full
                                               object-cover object-top
                                               transition-transform duration-500
                                               group-hover:scale-105"
                                    >

                                </div>

                            </div>



                            <!-- Doctor Text -->
                            <div
                                dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
                                class="flex w-full min-w-0
                                       flex-col justify-center
                                       {{ $isArabic ? 'text-right' : 'text-left' }}"
                            >

                                <h3
                                    class="break-words
                                           text-xl font-extrabold
                                           leading-tight
                                           text-[#2457ff]
                                           md:text-2xl"
                                >
                                    {{ $doctor['name'] }}
                                </h3>


                                <p
                                    class="mt-2 break-words
                                           text-sm font-extrabold
                                           leading-6
                                           text-[#16bf62]
                                           md:text-lg"
                                >
                                    {{ $doctor['title'] }}
                                </p>


                                @if(!empty($doctor['academic_title']))

                                    <div
                                        dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
                                        class="mt-2 flex
                                               items-start gap-2
                                               text-xs font-bold
                                               leading-6
                                               text-[#287258]
                                               md:text-sm"
                                    >

                                        <i
                                            class="fa-solid
                                                   fa-graduation-cap
                                                   mt-1 shrink-0
                                                   text-[#16bf62]"
                                        >
                                        </i>

                                        <span class="break-words">
                                            {{ $doctor['academic_title'] }}
                                        </span>

                                    </div>

                                @endif


                                @if(!empty($doctor['description']))

                                    <p
                                        dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
                                        class="mt-3 break-words
                                               text-sm leading-7
                                               text-[#4b5563]
                                               md:text-base
                                               {{ $isArabic ? 'text-right' : 'text-left' }}"
                                    >
                                        {{ $doctor['description'] }}
                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</section>
```

  <!-- Key Features -->
@php
    $currentLanguage = strtolower((string) (
        $sign
        ?? request()->route('lang')
        ?? request()->segment(1)
        ?? app()->getLocale()
    ));

    $isArabic = str_starts_with($currentLanguage, 'ar');

    $titleField = 'title_' . $sign;
    $detailsField = 'details_' . $sign;
@endphp


<section
    dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
    class="bg-gradient-to-r from-blue-600 to-green-400 py-12"
>
    <div
        class="mx-auto grid max-w-7xl
               grid-cols-1 gap-8 px-6
               text-white md:grid-cols-3"
    >

        @foreach ($models as $model)

            <div
                dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
                @class([
                    'flex w-full flex-col items-center text-center',

                    'md:items-end md:text-right' => $isArabic,

                    'md:items-start md:text-left' => !$isArabic,
                ])
            >

                <h3
                    class="mb-2 text-xl font-bold
                           leading-normal sm:text-2xl"
                >
                    {{ $model->{$titleField} ?? '' }}
                </h3>


                <p
                    class="text-sm leading-7
                           sm:text-base sm:leading-8"
                >
                    {{ $model->{$detailsField} ?? '' }}
                </p>

            </div>

        @endforeach

    </div>
</section>

    <!-- Before and After Slider -->
    <section class="py-10 sm:py-20 bg-blue-100 px-5 lg:px-28">
        <div class="text-center">
            <h3 class="text-xl sm:text-4xl font-bold text-blue-800 mb-4"> {{ __('التحولات في طب الأسنان') }} </h3>
            <p class="text-blue-800 sm:text-lg lg:w-3/4 mx-auto mb-8">
 
                {{ __('شاهد النتائج المذهلة التي حققها فريقنا الماهر في عيادات توث جارد. يعرض معرضنا قبل وبعد القوة التحويلية لعلاجات الأسنان لدينا، من التحسينات التجميلية إلى الحلول الترميمية.') }}
            </p>
        </div>
        <div class="w-full relative py-10">
            <div class="relative w-full max-w-[700px] aspect-[70/45] mx-auto overflow-hidden select-none">
                <img class="w-full h-full object-cover" alt="Before" draggable="false"
                    src="{{ $ps->before_photo }}">
                <div class="absolute top-0 left-0 right-0 w-full max-w-[700px] aspect-[70/45] mx-auto overflow-hidden select-none"
                    style="clip-path: inset(0 50% 0 0);">
                    <img class="w-full h-full object-cover" draggable="false" alt="After"
                        src="{{ $ps->after_photo }}">
                </div>
                <div id="slider" class="absolute top-0 bottom-0 w-1 bg-white cursor-ew-resize"
                    style="left: calc(50% - 1px);">
                    <div class="bg-white absolute rounded-full h-3 w-3 -left-1 top-[calc(50%-6px)]"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Call-to-Action -->
 
  @include('includes.book')


     

@stop


  @section( 'js')
    <script>
        // Before and After Slider Functionality
        const slider = document.getElementById('slider');
        const afterImage = slider.parentElement;
        let isDragging = false;

        slider.addEventListener('mousedown', (e) => {
            isDragging = true;
            document.body.style.userSelect = 'none';
        });

        document.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            const container = afterImage.parentElement;
            const rect = container.getBoundingClientRect();
            let newX = e.clientX - rect.left;
            if (newX < 0) newX = 0;
            if (newX > rect.width) newX = rect.width;
            afterImage.style.clipPath = `inset(0 ${rect.width - newX}px 0 0)`;
            slider.style.left = `${newX - 1}px`;
        });

        document.addEventListener('mouseup', () => {
            isDragging = false;
            document.body.style.userSelect = '';
        });

        // Touch Support for Mobile
        slider.addEventListener('touchstart', (e) => {
            isDragging = true;
            document.body.style.userSelect = 'none';
        });

        document.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            const container = afterImage.parentElement;
            const rect = container.getBoundingClientRect();
            let newX = e.touches[0].clientX - rect.left;
            if (newX < 0) newX = 0;
            if (newX > rect.width) newX = rect.width;
            afterImage.style.clipPath = `inset(0 ${rect.width - newX}px 0 0)`;
            slider.style.left = `${newX - 1}px`;
        });

        document.addEventListener('touchend', () => {
            isDragging = false;
            document.body.style.userSelect = '';
        });
    </script>
    <!-- Footer -->
     

@stop

