@extends('front.bekdash.layout')

@section('content')
    <main class="group  relative w-full overflow-hidden h-screen  o">
        <div class="absolute inset-0">
            <img src="{{ $page->image('hero_image_desktop', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/SLIDER-3.png')) }}" class="w-full h-full hidden md:block object-fill"
                data-speed="0.5">

            <img src="{{ $page->image('hero_image_mobile', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/Slider-mobile.png')) }}"
                class="w-full h-full md:hidden object- transition-transform duration-700 group-hover:scale-110 parallax-img"
                data-speed="0.5">

        </div>
        <div class="absolute inset-0 bg-black/30"></div>
    </main>
  @php($navLang = session('sign'))
    <section id="about"
        class="group relative w-full overflow-hidden h-[60vh] flex items-center justify-center bg-stone-900 z-10 gsap-item story-bg"
        data-animation="up">
        <a href="{{ route('front.bekdash.page', ['lang' => $navLang, 'slug' => 'about']) }}">

            <div class="absolute inset-0">
                <img src="{{ $page->image('about_image', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/story.jpeg')) }}"
                    class="w-full h-full object-cover opacity-40 transition-transform duration-700 group-hover:scale-110 parallax-img"
                    data-speed="0.2">
            </div>
            <h3
                class="absolute text-center font-bold two-line reveal-text top-28 left-1/2 -translate-x-1/2 text-xl tracking-[0.2em] uppercase font-light text-white/90 two-line reveal-text w-full px-4">
                {{ $page->t('about_title', 'قصة بيون بكداش') }} </h3>
        </a>

    </section>

    <section id="products" class="relative overflow-hidden w-full bg-stone-950">
        <div class="text-center py-12 border-b border-white/10">
            <h2 class="two-line reveal-text text-3xl text-white font-light tracking-widest reveal-text">{{ $page->t('products_section_title', 'منتجاتنا المميزة') }}
            </h2>
        </div>
        <div class="flex flex-col md:flex-row items-center justify-between gap-0 w-full">

            <div class="group relative w-full overflow-hidden border-r border-b border-white/10 cursor-pointer gsap-item"
                data-animation="right">

                <img src="{{ $page->image('product_1_image', asset('front/byun_bekdash2/asset/prod/prod-4.jpeg')) }}"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">



                <h3
                    class="absolute text-center font-bold two-line reveal-text bottom-24 left-1/2 -translate-x-1/2 text-xl tracking-[0.2em] uppercase font-light text-white/90 two-line reveal-text w-full px-4">
                    {{ $page->t('product_1_title', 'سبريد') }} </h3>
            </div>

            <div class="group relative w-full overflow-hidden border-r border-b border-white/10 cursor-pointer gsap-item"
                data-animation="up">

                <img src="{{ $page->image('product_2_image', asset('front/byun_bekdash2/asset/prod/pro-1 (3).png')) }}"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">



                <h3
                    class="absolute text-center font-bold two-line reveal-text bottom-24 left-1/2 -translate-x-1/2 text-xl tracking-[0.2em] uppercase font-light text-white/90 two-line reveal-text w-full px-4">
                    {{ $page->t('product_2_title', 'سويسرول') }} </h3>
            </div>

            <div class="group relative w-full overflow-hidden border-r border-b border-white/10 cursor-pointer gsap-item"
                data-animation="left">

                <img src="{{ $page->image('product_3_image', asset('front/byun_bekdash2/asset/prod/pro-1 (1).png')) }}"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">



                <h3
                    class="absolute text-center font-bold two-line reveal-text bottom-24 left-1/2 -translate-x-1/2 text-xl tracking-[0.2em] uppercase font-light text-white/90 two-line reveal-text w-full px-4">
                    {{ $page->t('product_3_title', 'ايس كريم عربي') }} </h3>
            </div>

        </div>
    </section>

    <!-- Principles Section -->
    <section
        class="group relative w-full overflow-hidden w-full group flex items-center justify-center bg-black overflow-hidden border-y border-white/10 gsap-item"
        data-animation="right" style="animation-delay: 0.4s;">
        <a href="{{ route('front.bekdash.page', ['lang' => $navLang, 'slug' => 'principles']) }}">

            <!-- <div class="absolute inset-0 border border-gold/30 rounded-sm z-0"></div> -->

            <img src="{{ $page->image('principles_image_desktop', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/principles.jpeg')) }}"
                class="w-full h-[60vh] hidden md:block object-cover  transition-all duration-700   transition-transform duration-700 group-hover:scale-110"
                data-speed="0.5" alt="Principles">

            <img src="{{ $page->image('principles_image_mobile', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/principles-mobile.png')) }}"
                class="w-full h-[60vh] md:hidden object-cover  transition-all duration-700   transition-transform duration-700 group-hover:scale-110"
                data-speed="0.5" alt="Principles">
        </a>
    </section>

    <!-- Vision Section -->
    <section
        class="group relative w-full overflow-hidden w-full group flex items-center justify-center bg-black overflow-hidden border-y border-white/10 gsap-item"
        data-animation="up" style="animation-delay: 0.4s;">
        <a href="{{ route('front.bekdash.page', ['lang' => $navLang, 'slug' => 'goals']) }}">

            <!-- <div class="absolute inset-0 border border-gold/30 rounded-sm z-0"></div> -->

            <img src="{{ $page->image('vision_image_desktop', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/vision.jpeg')) }}"
                class="w-full h-[60vh] hidden md:block object-cover  transition-all duration-700   transition-transform duration-700 group-hover:scale-110"
                data-speed="0.5" alt="Principles">
            <img src="{{ $page->image('vision_image_mobile', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/vison-mobile.png')) }}"
                class="w-full h-[60vh] md:hidden object-cover  transition-all duration-700   transition-transform duration-700 group-hover:scale-110"
                data-speed="0.5" alt="Principles">
        </a>
    </section>
@endsection
