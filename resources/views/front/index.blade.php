  

 @extends('layouts.front')

 @section('title')

     {{ $gs->{'title_' . $sign} }}

 @stop

 @section('gsearch')
     <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
 @stop


 @section('content')
     @php
         $phones = explode(',', $gs->phones);
         $emails = explode(',', $gs->emails);
         $addresses = json_decode($gs->{'addresses_' . $sign});

         $randomPhone = Arr::random($phones);
         $randomEmail = Arr::random($emails);
     @endphp
     <!--header-->
<!-- Hero -->
<section id="home"
    class="relative min-h-screen overflow-hidden bg-[#020817] text-white pt-[115px]">

    <!-- Background Image -->
    <picture class="absolute inset-0">
        <source media="(max-width:767px)"
            srcset="{{ $ps->home_hero_image_mobile ?: asset('assets/images/about/hero-mob.png') }}">

        <img src="{{ $ps->home_hero_image ?: asset('assets/images/about/hero-des.png') }}"
             alt="خزانات مياه النور"
             width="1920"
             height="5450"
             fetchpriority="high"
             decoding="async"
             class="w-full h-full object-cover object-center">
    </picture>

    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-[#020817]/45"></div>

    <!-- Blue Glow -->
    <div class="absolute top-1/3 right-0 w-[520px] h-[520px] bg-[#00c8ff]/20 blur-[120px] rounded-full"></div>
    <div class="absolute bottom-0 left-1/4 w-[420px] h-[420px] bg-[#0877ff]/20 blur-[110px] rounded-full"></div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 min-h-[calc(100vh-115px)] flex items-center">

        <div class="grid lg:grid-cols-2 gap-10 items-center w-full">

            <!-- Text -->
            <div class="max-w-xl text-right">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight">
                    {{ $ps->{'home_hero_title_' . $sign} ?? __(' أفضل شركة خزانات مياه في مصر') }}
                </h1>

                <p class="mt-6 text-base md:text-lg text-white/85 leading-8">
                    {!! $ps->{'portfolio_details_' . $sign} ?? __('نحن نوفر لك أفضل أنواع خزانات المياه بجودة عالية لتحافظ على سلامة مياه الشرب.') !!}
                </p>

                <div class="mt-8 flex justify-end">
                    <a href="{{ $ps->home_hero_cta_link ?: route('contact.index', ['lang' => $sign]) }}"
                       class="inline-flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-[#00c8ff] to-[#0877ff] px-8 py-3.5 text-sm font-bold text-white shadow-[0_0_25px_rgba(0,174,255,.45)] hover:scale-[1.03] transition">
                        {{ $ps->{'home_hero_cta_text_' . $sign} ?? __('تواصل معنا') }}
                        <i class="fas fa-arrow-left text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Empty side because tank is in image -->
            <div></div>

        </div>
    </div>

    <!-- Bottom Features -->
    <div class="absolute bottom-6 left-0 right-0 z-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

                @foreach ($heroStats as $stat)
                <div class="rounded-2xl border border-white/10 bg-white/8 backdrop-blur-md p-5 shadow-[0_15px_35px_rgba(0,0,0,.25)]">
                    <div class="flex items-center gap-4">
                        <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#00c8ff]/15 text-[#00c8ff] text-xl">
                            <i class="{{ $stat->icon }}"></i>
                        </span>
                        <div>
                            <div class="text-2xl font-extrabold text-[#00c8ff]">{{ $stat->value }}</div>
                            <div class="text-sm text-white/80">{{ $stat->{'title_' . $sign} }}</div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

</section>

<!-- ABOUT PREVIEW SECTION -->
<section class="relative py-24 bg-gradient-to-br from-[#f4fbff] via-white to-[#eefaff] overflow-hidden">
    <div class="absolute top-20 right-10 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 left-10 w-80 h-80 bg-[#00c8ff]/10 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <!-- Text -->
            <div class="order-1 lg:order-1 text-right">
                <span class="inline-flex items-center rounded-full bg-primary/10 text-primary px-5 py-2 text-sm font-bold mb-5">
                    {{ $ps->{'home_about_badge_' . $sign} ?? __('من نحن') }}
                </span>

                <h2 class="text-4xl md:text-5xl font-extrabold text-[#020817] leading-tight mb-6">
                    {{ $ps->{'about_title_' . $sign} ?? __('شركة النور تانك') }}
                </h2>

                <div class="text-gray-600 leading-9 text-base md:text-lg mb-8 max-w-xl">
                    {!! $ps->{'about_details_' . $sign} ?? '' !!}
                </div>

                <div class="grid grid-cols-3 gap-4 mb-8 max-w-xl">
                    @foreach ($aboutStats as $stat)
                    <div class="rounded-2xl bg-white shadow-md border border-gray-100 p-4 text-center">
                        <div class="text-2xl font-extrabold text-primary">{{ $stat->value }}</div>
                        <div class="text-xs text-gray-500 mt-1">{{ $stat->{'title_' . $sign} }}</div>
                    </div>
                    @endforeach
                </div>

                <a href="{{ route('about.index', $sign) }}"
                   class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-[#00c8ff] to-[#0877ff] text-white px-8 py-4 rounded-2xl font-bold shadow-[0_15px_35px_rgba(0,174,255,.25)] transition hover:scale-[1.03]">
                    {{ $ps->{'home_about_cta_text_' . $sign} ?? __('اقرأ المزيد') }}
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
         
         <!-- Image -->
<div class="relative order-2 lg:order-2">
    <div class="absolute inset-0 bg-primary/10 rounded-[3.5rem] rotate-3"></div>

    <div class="relative rounded-[3.5rem] bg-white p-10 md:p-12 shadow-2xl border border-white max-w-[620px] mx-auto">
        <picture>
            <source media="(max-width: 767px)"
                srcset="{{ $ps->home_about_image ?: asset('assets/images/about/about-nour.webp') }}">

            <source media="(min-width: 768px)"
                srcset="{{ $ps->home_about_image ?: asset('assets/images/about/about-nour.webp') }}">

            <img
                src="{{ $ps->home_about_image ?: asset('assets/images/about/about-nour.webp') }}"
                alt="{{ $ps->{'home_about_badge_' . $sign} ?? __('من نحن') }}"
                width="900"
                height="620"
                loading="lazy"
                decoding="async"
                class="w-full h-[460px] md:h-[590px] object-contain">
        </picture>
    </div>
</div>
        
        </div>
    </div>
</section>
<!-- ABOUT PREVIEW SECTION -->
<!-- منتجاتنا -->
@php
    $slideCount = max($homeSliders->count(), 1);
    $slideDuration = 4 * $slideCount;
    $slideOut = (int) round(100 / $slideCount);
    $slideIn = max($slideOut - 5, 1);
@endphp
<style>
    @keyframes productFade {
        0%, {{ $slideIn }}% { opacity: 1; }
        {{ $slideOut }}%, 100% { opacity: 0; }
    }

    .product-slide {
        animation: productFade {{ $slideDuration }}s infinite ease-in-out;
    }

    @foreach ($homeSliders as $slide)
    .product-slide:nth-child({{ $loop->iteration }}) { animation-delay: {{ $loop->index * 4 }}s; }
    @endforeach

    @keyframes dotActive {
        0%, {{ $slideIn }}% { width: 32px; opacity: 1; }
        {{ $slideOut }}%, 100% { width: 8px; opacity: .35; }
    }

    .product-dot {
        animation: dotActive {{ $slideDuration }}s infinite ease-in-out;
    }

    @foreach ($homeSliders as $slide)
    .product-dot:nth-child({{ $loop->iteration }}) { animation-delay: {{ $loop->index * 4 }}s; }
    @endforeach
</style>

<section class="w-full py-8 px-3 bg-[#f3f8fc] overflow-hidden max-md:py-5 max-md:px-2">
    <div class="relative w-[98.5vw] mx-auto h-[280px] md:h-[520px] lg:h-[620px] xl:h-[680px] rounded-[32px] md:rounded-[34px] overflow-hidden bg-white shadow-[0_20px_55px_rgba(0,105,150,0.14)]">

        <!-- Slides -->
        <div class="absolute inset-0">
            @foreach ($homeSliders as $slide)
            <img src="{{ $slide->photo }}"
                 alt="{{ $slide->{'title_' . $sign} ?? __('منتجاتنا') }}"
                 class="product-slide absolute inset-0 w-full h-full object-cover object-center{{ $loop->first ? '' : ' opacity-0' }}">
            @endforeach
        </div>

        <!-- Corner Shapes -->
        <div class="absolute top-0 left-0 w-[190px] h-[190px] bg-gradient-to-br from-[#18b7e9] to-[#0b7db6] [clip-path:polygon(0_0,100%_0,0_100%)] z-[3] max-lg:w-[125px] max-lg:h-[125px] max-md:w-[62px] max-md:h-[62px]"></div>

        <div class="absolute bottom-0 right-0 w-[190px] h-[190px] bg-gradient-to-br from-[#18b7e9] to-[#0b7db6] [clip-path:polygon(100%_0,100%_100%,0_100%)] z-[3] max-lg:w-[125px] max-lg:h-[125px] max-md:w-[58px] max-md:h-[58px]"></div>

        <!-- Logo -->
        <div class="absolute top-4 left-5 z-[4] max-md:top-2 max-md:left-2">
            <a href="{{ route('front.index', $sign) }}">
                <img src="{{ $gs->{'logo_' . $sign} }}"
                     alt="شعار الشركة"
                     class="max-h-[82px] object-contain block max-lg:max-h-14 max-md:max-h-[26px]">
            </a>
        </div>

       

        <!-- Dots -->
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 z-[5] flex items-center gap-2 max-md:bottom-2">
            @foreach ($homeSliders as $slide)
            <span class="product-dot h-2 rounded-full bg-[#12a8db]"></span>
            @endforeach
        </div>

    </div>
</section>
<!-- منتجاتنا --
<!-- من نحن - Flip Cards -->
<section class="relative py-20 bg-white overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-[#f4fbff] via-white to-white"></div>

   <style>
    .flip-card {
        perspective: 1200px;
    }

    .flip-inner {
        position: relative;
        transform-style: preserve-3d;
        transition: transform .75s ease;
    }

    .flip-card:hover .flip-inner {
        transform: rotateY(180deg);
    }

    .flip-front,
    .flip-back {
        position: absolute;
        inset: 0;
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        transform-style: preserve-3d;
    }

    .flip-front {
        transform: rotateY(0deg);
        z-index: 2;
    }

    .flip-back {
        transform: rotateY(180deg);
        z-index: 1;
    }

    .flip-card:hover .flip-front {
        opacity: 0;
        pointer-events: none;
    }
</style>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

       <div class="text-center mb-14">
    <h2 class="flex items-center justify-center gap-3 text-3xl md:text-4xl font-extrabold text-[#172033]">
        <i class="fas fa-gem text-primary text-2xl md:text-3xl"></i>
        {{ $ps->{'home_cards_title_' . $sign} ?? __('استثمار يدوم... وجودة تثق بها') }}
    </h2>

    <p class="mt-4 text-gray-600 text-lg">
        {{ $ps->{'home_cards_details_' . $sign} ?? __('منتجات مصممة لتتحمل أقسى الظروف، وتوفر أعلى مستويات الأمان والكفاءة.') }}
    </p>
</div>

        @php
            $flipStyles = [
                ['border' => 'border-[#172033]', 'text' => 'text-[#172033]', 'back' => 'bg-[#172033]'],
                ['border' => 'border-[#00a8e8]', 'text' => 'text-[#00a8e8]', 'back' => 'bg-[#00a8e8]'],
                ['border' => 'border-primary', 'text' => 'text-primary', 'back' => 'bg-[#172033]'],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            @foreach ($flipCards as $card)
            @php
                $flipStyle = $flipStyles[$loop->index % count($flipStyles)];
            @endphp
            <div class="flip-card h-[390px]">
                <div class="flip-inner relative w-full h-full">

                    <!-- Front -->
                    <div class="flip-front absolute inset-0 bg-white rounded-[22px] overflow-hidden shadow-[0_18px_45px_rgba(0,0,0,.12)] border border-gray-100 text-center">
                        <div class="relative h-full flex flex-col items-center justify-center px-6">
                            <img src="{{ $card->photo }}"
                                 alt="{{ $card->{'title_' . $sign} }}"
                                 class="absolute inset-0 w-full h-full object-cover">

                            <div class="absolute inset-0 bg-gradient-to-b from-black/15 via-white/35 to-white"></div>

                            <div class="relative z-10 mt-10 w-32 h-32 rounded-full bg-white border-2 {{ $flipStyle['border'] }} shadow-[0_12px_35px_rgba(0,0,0,.15)] flex items-center justify-center">
                                <i class="{{ $card->icon }} {{ $flipStyle['text'] }} text-5xl"></i>
                            </div>

                            <h3 class="relative z-10 mt-8 text-2xl font-extrabold {{ $flipStyle['text'] }}">
                                {{ $card->{'title_' . $sign} }}
                            </h3>
                        </div>
                    </div>

                    <!-- Back -->
                    <div class="flip-back absolute inset-0 {{ $flipStyle['back'] }} rounded-[22px] shadow-[0_18px_45px_rgba(0,0,0,.12)] text-white p-8 flex items-center">
                        <ul class="space-y-4 text-sm md:text-base leading-8 font-semibold text-start">
                            @foreach (preg_split('/\r\n|\r|\n/', (string) $card->{'details_' . $sign}) as $line)
                            @if (trim($line) !== '')
                            <li>• {{ $line }}</li>
                            @endif
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

        <div class="mt-14 text-center">
            <a href="{{ route('about.index', $sign) }}"
               class="inline-flex items-center justify-center gap-3 px-8 py-4 rounded-full border-2 border-primary text-primary font-bold hover:bg-primary hover:text-white transition">
                {{ $ps->{'home_cards_cta_text_' . $sign} ?? __('المزيد عن نور تانك') }}
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>

    </div>
</section>
<!-- من نحن - Flip Cards -->

<!-- عملاؤنا -->
<section class="relative py-16 bg-gradient-to-b from-white via-[#f7fcff] to-white overflow-hidden">

    <div class="w-full mx-auto px-0">

        <div class="text-center mb-10 md:mb-12 px-4">
            <span class="inline-flex rounded-full bg-primary/10 text-primary px-5 py-2 font-bold mb-4">
                {{ $ps->{'home_clients_badge_' . $sign} ?? 'شركاء النجاح' }}
            </span>

            <h2 class="text-4xl md:text-5xl font-extrabold mb-4 text-[#0F2740]">
                {{ $ps->{'home_clients_title_' . $sign} ?? 'عملاؤنا' }}
            </h2>

            <p class="text-gray-600 text-lg md:text-xl">
                {{ $ps->{'home_clients_details_' . $sign} ?? 'نفخر بثقة كبرى الشركات والمؤسسات في منتجات النور تانك وخدماتها.' }}
            </p>
        </div>

        <div class="relative w-full py-5 overflow-hidden">

            <div class="pointer-events-none absolute inset-y-0 left-0 z-20 w-16 md:w-40 bg-gradient-to-r from-[#f7fcff] via-[#f7fcff]/90 to-transparent"></div>
            <div class="pointer-events-none absolute inset-y-0 right-0 z-20 w-16 md:w-40 bg-gradient-to-l from-[#f7fcff] via-[#f7fcff]/90 to-transparent"></div>

            <div class="clients-marquee" dir="ltr">
                <div class="clients-track">

                    <div class="clients-set">
                        @foreach ($partners as $client)
                            <div class="client-card">
                                <img
                                    src="{{ $client->photo }}"
                                    alt="{{ $client->{'title_' . $sign} }}"
                                    loading="lazy"
                                    decoding="async"
                                    class="client-img">
                            </div>
                        @endforeach
                    </div>

                    <div class="clients-set" aria-hidden="true">
                        @foreach ($partners as $client)
                            <div class="client-card">
                                <img
                                    src="{{ $client->photo }}"
                                    alt=""
                                    loading="lazy"
                                    decoding="async"
                                    class="client-img">
                            </div>
                        @endforeach
                    </div>

                    <div class="clients-set" aria-hidden="true">
                        @foreach ($partners as $client)
                            <div class="client-card">
                                <img
                                    src="{{ $client->photo }}"
                                    alt=""
                                    loading="lazy"
                                    decoding="async"
                                    class="client-img">
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>

    </div>

</section>

<style>
    .clients-marquee {
        width: 100%;
        overflow: hidden;
        direction: ltr;
    }

    .clients-track {
        display: flex;
        align-items: center;
        width: max-content;
        animation: clientsMove 28s linear infinite;
        will-change: transform;
    }

    .clients-set {
        display: flex;
        align-items: center;
        gap: 28px;
        flex-shrink: 0;
        padding-inline-end: 28px;
    }

    .client-card {
        width: 170px;
        height: 170px;
        flex: 0 0 170px;
        border-radius: 9999px;
        background: #ffffff;
        border: 1px solid #d8eef9;
        box-shadow: 0 18px 40px rgba(0, 130, 190, 0.12);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .client-img {
        max-width: 95px;
        max-height: 70px;
        object-fit: contain;
        display: block;
    }

    @keyframes clientsMove {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-33.333%);
        }
    }

    @media (hover: hover) {
        .clients-marquee:hover .clients-track {
            animation-play-state: paused;
        }
    }

    @media (max-width: 1024px) {
        .clients-track {
            animation-duration: 24s;
        }

        .clients-set {
            gap: 22px;
            padding-inline-end: 22px;
        }

        .client-card {
            width: 145px;
            height: 145px;
            flex: 0 0 145px;
        }

        .client-img {
            max-width: 82px;
            max-height: 60px;
        }
    }

    @media (max-width: 768px) {
        .clients-track {
            animation-duration: 18s;
        }

        .clients-set {
            gap: 16px;
            padding-inline-end: 16px;
        }

        .client-card {
            width: 120px;
            height: 120px;
            flex: 0 0 120px;
        }

        .client-img {
            max-width: 70px;
            max-height: 50px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .clients-track {
            animation: none;
        }
    }
</style>
<section id="services" class="py-20 bg-gray-50 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center mb-14">

            <span class="inline-flex items-center justify-center rounded-full bg-[#e8f8ff] px-5 py-2 text-sm font-bold text-[#00a8e8] mb-4">
                {{ $ps->{'home_products_badge_' . $sign} ?? __('خدماتنا ومنتجاتنا') }}
            </span>

            <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-4">
                {{ $ps->{'home_products_title_' . $sign} ?? __('منتجاتنا') }}
            </h2>

            <p class="text-base md:text-lg text-gray-600 max-w-3xl mx-auto leading-8">
                {{ $ps->{'home_products_details_' . $sign} ?? __('نقدم حلول متكاملة لتخزين المياه والمنتجات المصنوعة من أجود الخامات وبأعلى معايير الجودة.') }}
            </p>

        </div>
{{-- Categories Grid - Creative Layout --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto items-center">

    @foreach($homeCategories as $category)

        @php
            $positionClass = match ($loop->iteration) {
                1 => 'lg:col-start-3 lg:row-start-1',
                2 => 'lg:col-start-1 lg:row-start-1',
                3 => 'lg:col-start-2 lg:row-start-1 lg:translate-y-24',
                4 => 'lg:col-start-3 lg:row-start-2',
                5 => 'lg:col-start-1 lg:row-start-2',
                default => '',
            };
        @endphp

        <a href="{{ route('single-category-service.index', [
                'lang' => $sign,
                'slug' => $category->{'slug_' . $sign}
            ]) }}"
           class="group flex flex-col overflow-hidden rounded-[22px] bg-white border border-[#e5f3fa]
                  shadow-[0_14px_40px_rgba(0,168,232,0.10)]
                  transition duration-300 hover:-translate-y-1
                  hover:shadow-[0_22px_55px_rgba(0,168,232,0.18)]
                  {{ $positionClass }}">

       {{-- Image --}}
<div class="relative h-[220px] bg-white overflow-visible">

    <div class="h-full w-full overflow-hidden">
        <img src="{{ $category->photo }}"
             alt="{{ $category->{'title_' . $sign} }}"
             width="600"
             height="420"
             loading="lazy"
             decoding="async"
             class="w-full h-full object-cover object-center transition duration-500 group-hover:scale-105">
    </div>

    {{-- Icon --}}
    <div class="absolute -bottom-6 right-5 z-20 flex h-12 w-12 items-center justify-center
                rounded-2xl bg-[#00a8e8] text-white
                shadow-[0_10px_25px_rgba(0,168,232,0.35)]">

        <i class="{{ $category->icon }} text-lg"></i>

    </div>

</div>

            {{-- Content --}}
            <div class="flex flex-col flex-1 px-5 pb-5 pt-9 text-right">

                <h3 class="text-lg md:text-xl font-black text-gray-900 mb-2 transition group-hover:text-[#00a8e8]">
                    {{ $category->{'title_' . $sign} }}
                </h3>

                <p class="text-sm text-gray-600 leading-7">
                    {{ $category->{'short_details_' . $sign} }}
                </p>

                <div class="mt-auto pt-5 inline-flex items-center gap-2 text-[#00a8e8] font-black text-sm">
                    {{ __('عرض المنتجات') }}

                    <i class="fa-solid fa-arrow-left text-xs transition duration-300 group-hover:-translate-x-1"></i>
                </div>

            </div>

        </a>

    @endforeach

</div>

        {{-- View All Button --}}
        <div class="text-center mt-12">

         <a href="{{ route('services.index', $sign) }}"
   class="inline-flex items-center justify-center gap-3 rounded-xl bg-[#00a8e8] px-8 py-4
          text-white font-black shadow-[0_14px_30px_rgba(0,168,232,0.25)]
          transition duration-300 hover:-translate-y-1 hover:bg-[#0096cf]">

    {{ $ps->{'home_products_cta_text_' . $sign} ?? __('عرض جميع المنتجات') }}

    <i class="fa-solid fa-arrow-left text-sm"></i>

</a>

        </div>

    </div>
</section>

<!-- منتجاتنا -->
<!-- شهادات الجودة والاعتمادات -->
<section class="py-16 md:py-20 bg-[#EAF6FB] overflow-hidden">
    <div class="w-full mx-auto px-0">

        <!-- العنوان -->
        <div class="text-center mb-10 md:mb-12 px-4">
            <h2 class="text-3xl md:text-5xl font-extrabold leading-tight text-[#0F2740]">
                ✨ {{ $ps->{'certificates_title_' . $sign} ?? __('شهادات الجودة والاعتمادات') }}
            </h2>

            <p class="mt-4 text-lg md:text-xl text-[#50697E] max-w-4xl mx-auto leading-relaxed">
                {{ $ps->{'certificates_subtitle_' . $sign} ?? __('نفتخر بحصولنا على شهادات معتمدة تثبت جودة منتجاتنا وفقًا لأعلى المعايير العالمية.') }}
            </p>
        </div>

        <!-- الشريط -->
        <div class="relative w-full py-5 overflow-hidden">

            <!-- Fade الأطراف -->
            <div class="pointer-events-none absolute inset-y-0 left-0 z-20 w-16 md:w-40 bg-gradient-to-r from-[#EAF6FB] via-[#EAF6FB]/90 to-transparent"></div>
            <div class="pointer-events-none absolute inset-y-0 right-0 z-20 w-16 md:w-40 bg-gradient-to-l from-[#EAF6FB] via-[#EAF6FB]/90 to-transparent"></div>

            <div class="certificates-marquee" dir="ltr">
                <div class="certificates-track">

                    {{-- النسخة الأولى --}}
                    <div class="certificates-set">
                        @foreach ($certificates as $certificate)
                            <div class="cert-card">
                                <img
                                    src="{{ $certificate->photo }}"
                                    alt="Certificate {{ $loop->iteration }}"
                                    loading="lazy"
                                    decoding="async"
                                    class="cert-img">
                            </div>
                        @endforeach
                    </div>

                    {{-- النسخة الثانية --}}
                    <div class="certificates-set" aria-hidden="true">
                        @foreach ($certificates as $certificate)
                            <div class="cert-card">
                                <img
                                    src="{{ $certificate->photo }}"
                                    alt=""
                                    loading="lazy"
                                    decoding="async"
                                    class="cert-img">
                            </div>
                        @endforeach
                    </div>

                    {{-- النسخة الثالثة عشان الموبايل ما يعملش فراغ --}}
                    <div class="certificates-set" aria-hidden="true">
                        @foreach ($certificates as $certificate)
                            <div class="cert-card">
                                <img
                                    src="{{ $certificate->photo }}"
                                    alt=""
                                    loading="lazy"
                                    decoding="async"
                                    class="cert-img">
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

        <!-- الوصف -->
        <div class="text-center mt-10 md:mt-12 px-4">
            <p class="text-base md:text-2xl font-bold text-[#23405A] max-w-6xl mx-auto leading-relaxed">
                {{ $ps->{'certificates_description_' . $sign} ?? __('اكتشف الشهادات التي حصلنا عليها من جهات موثوقة مثل وزارة الصحة والسكان، الهيئة العامة للتنمية الصناعية، والمركز القومي للبحوث. هذه الشهادات تؤكد التزامنا بالجودة والاعتمادية في كل منتج نقدمه.') }}
            </p>
        </div>

    </div>
</section>

<style>
    .certificates-marquee {
        width: 100%;
        overflow: hidden;
        direction: ltr;
    }

    .certificates-track {
        display: flex;
        align-items: center;
        width: max-content;
        animation: certificatesMove 34s linear infinite;
        will-change: transform;
    }

    .certificates-set {
        display: flex;
        align-items: center;
        gap: 22px;
        flex-shrink: 0;
        padding-inline-end: 22px;
    }

    .cert-card {
        width: 205px;
        height: 285px;
        flex: 0 0 205px;
        border-radius: 16px;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #DDEBF2;
        box-shadow: 0 12px 30px rgba(15, 39, 64, 0.12);
    }

    .cert-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
        background: #ffffff;
        padding: 10px;
    }

    @keyframes certificatesMove {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-33.333%);
        }
    }

    @media (hover: hover) {
        .certificates-marquee:hover .certificates-track {
            animation-play-state: paused;
        }
    }

    @media (max-width: 1024px) {
        .certificates-track {
            animation-duration: 28s;
        }

        .certificates-set {
            gap: 18px;
            padding-inline-end: 18px;
        }

        .cert-card {
            width: 175px;
            height: 245px;
            flex: 0 0 175px;
        }
    }

    @media (max-width: 768px) {
        .certificates-track {
            animation-duration: 20s;
        }

        .certificates-set {
            gap: 14px;
            padding-inline-end: 14px;
        }

        .cert-card {
            width: 140px;
            height: 200px;
            flex: 0 0 140px;
            border-radius: 12px;
        }

        .cert-img {
            padding: 7px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .certificates-track {
            animation: none;
        }
    }
</style>
<!-- شهادات الجودة والاعتمادات -->
<!-- تواصل معنا -->
<section id="contact" class="relative py-20 md:py-24 bg-gradient-to-b from-white via-[#F4FBFF] to-white overflow-hidden">

    <div class="absolute top-0 right-0 w-[420px] h-[420px] bg-primary/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-[420px] h-[420px] bg-secondary/10 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-14">
            <span class="inline-flex items-center gap-2 rounded-full bg-primary/10 text-primary px-5 py-2 font-bold mb-4">
                <i data-lucide="message-circle" class="w-5 h-5"></i>
                {{ $ps->{'home_contact_badge_' . $sign} ?? __('تواصل معنا') }}
            </span>

            <h2 class="text-4xl md:text-6xl font-extrabold text-[#0F2740] leading-tight">
                {{ $ps->{'home_contact_title_' . $sign} ?? __('جاهزون للرد على استفسارك') }}
            </h2>

            <p class="mt-5 text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                {{ $ps->{'home_contact_details_' . $sign} ?? __('فريق النور تانك هنا لمساعدتك في اختيار المنتج المناسب والإجابة على جميع أسئلتك.') }}
            </p>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 items-stretch">

            <!-- معلومات التواصل -->
            <div class="lg:col-span-5">
                <div class="h-full rounded-[32px] bg-[#0F2740] text-white p-7 md:p-9 shadow-2xl relative overflow-hidden">

                    <div class="absolute -top-20 -left-20 w-56 h-56 bg-primary/30 rounded-full blur-3xl"></div>

                    <div class="relative">
                        <h3 class="text-3xl font-extrabold mb-4">
                            {{ __('معلومات التواصل') }}
                        </h3>

                        <p class="text-white/70 mb-8 leading-relaxed">
                            {{ __('يمكنك التواصل معنا مباشرة عبر الهاتف أو البريد الإلكتروني أو زيارة موقعنا.') }}
                        </p>

                        <div class="space-y-5">

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-primary shrink-0">
                                    <i data-lucide="phone" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">{{ __('الهاتف') }}</h4>
                                    @foreach ($phones as $phone)
                                        <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="block text-white/75 hover:text-white transition" dir="ltr">
                                            {{ $phone }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-primary shrink-0">
                                    <i data-lucide="mail" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">{{ __('البريد الإلكتروني') }}</h4>
                                    @foreach ($emails as $email)
                                        <a href="mailto:{{ trim($email) }}" class="block text-white/75 hover:text-white transition">
                                            {{ $email }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-primary shrink-0">
                                    <i data-lucide="map-pin" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">{{ __('العنوان') }}</h4>
                                    @foreach ($addresses as $address)
                                        <p class="text-white/75 leading-relaxed">{{ $address }}</p>
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-primary shrink-0">
                                    <i data-lucide="clock" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">{{ __('ساعات العمل') }}</h4>
                                    <p class="text-white/75">{{ $gs->{'working_days_' . $sign} ?? __('طوال أيام الأسبوع') }}</p>
                                    <p class="text-white/75">{{ $gs->{'working_hours_' . $sign} ?? __('من 9 صباحاً حتى 10 مساءً') }}</p>
                                </div>
                            </div>

                        </div>

                        <a href="{{ $gs->map_link ?: 'https://maps.app.goo.gl/rq4VFn4fLJr2vsKf8' }}" target="_blank"
                           class="mt-8 inline-flex items-center justify-center gap-2 w-full rounded-2xl bg-primary hover:bg-secondary text-white font-bold py-4 transition shadow-lg">
                            <i data-lucide="navigation" class="w-5 h-5"></i>
                            {{ __('افتح الموقع على خرائط جوجل') }}
                        </a>
                    </div>

                </div>
            </div>

            <!-- الفورم -->
            <div class="lg:col-span-7">
                <div class="h-full rounded-[32px] bg-white p-7 md:p-9 shadow-xl border border-[#DDEBF2]">

                    <h3 class="text-3xl font-extrabold text-[#0F2740] mb-2">
                        {{ __('أرسل لنا رسالة') }}
                    </h3>

                    <p class="text-gray-500 mb-7">
                        {{ __('اترك بياناتك وسيقوم فريقنا بالتواصل معك في أقرب وقت.') }}
                    </p>

                    <form enctype="multipart/form-data" action="{{ route('front.contact.submit') }}" name="appointment" id="email-form" method="POST" autocomplete="off" class="space-y-5">
                        {{ csrf_field() }}

                        <div class="form-group w-100">
                            <div class="response w-100"></div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label for="name" class="block text-sm font-bold text-[#0F2740] mb-2">
                                    {{ __('الإسم') }} <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" name="name" required
                                    placeholder="{{ __('أدخل اسمك الكامل') }}"
                                    class="w-full h-14 px-4 rounded-2xl bg-[#F8FCFF] border border-[#DDEBF2] focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition">
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-bold text-[#0F2740] mb-2">
                                    {{ __('رقم الهاتف') }} <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" id="phone" name="phone" required
                                    placeholder="+20 123 456 7890"
                                    dir="ltr"
                                    class="w-full h-14 px-4 rounded-2xl bg-[#F8FCFF] border border-[#DDEBF2] focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition">
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-bold text-[#0F2740] mb-2">
                                {{ __('الرسالة') }} ({{ __('اختياري') }})
                            </label>
                            <textarea id="message" name="text" rows="6"
                                placeholder="{{ __('أخبرنا بما تحتاج...') }}"
                                class="w-full px-4 py-4 rounded-2xl bg-[#F8FCFF] border border-[#DDEBF2] focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition resize-none"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full h-14 rounded-2xl bg-primary hover:bg-secondary text-white font-extrabold transition shadow-lg shadow-primary/20">
                            {{ __('إرسال الرسالة') }}
                        </button>

                    </form>

                </div>
            </div>

        </div>

        <!-- الخريطة -->
        <div class="mt-10 rounded-[32px] overflow-hidden shadow-xl border border-[#DDEBF2] bg-white p-3">
            <iframe
                src="{!! $gs->map !!}"
                width="100%"
                height="420"
                style="border:0; border-radius:24px;"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="El Nour Tank Location">
            </iframe>
        </div>

    </div>
</section>
        
        
        
        
        
        
        
        
        
        <script>
    document.addEventListener('DOMContentLoaded', function () {
        const scroller = document.getElementById('certificatesScroller');
        if (!scroller) return;

        let speed = window.innerWidth <= 768 ? 0.6 : 0.9;
        let animationFrame;

        function getHalfWidth() {
            return scroller.scrollWidth / 2;
        }

        function animate() {
            scroller.scrollLeft += speed;

            if (scroller.scrollLeft >= getHalfWidth()) {
                scroller.scrollLeft = 0;
            }

            animationFrame = requestAnimationFrame(animate);
        }

        animate();

        window.addEventListener('resize', function () {
            speed = window.innerWidth <= 768 ? 0.6 : 0.9;
            scroller.scrollLeft = 0;
        });
    });
</script>
    </section>
 @stop