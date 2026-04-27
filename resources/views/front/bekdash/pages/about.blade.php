@extends('front.bekdash.layout')

@section('content')
    <section id="about"
        class="group relative w-full overflow-hidden h-[60vh] flex items-center justify-center bg-stone-900 z-10 gsap-item story-bg"
        data-animation="up">
        <div class="absolute inset-0">
            <img src="{{ $page->image('about_hero_bg', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/story.jpeg')) }}"
                class="w-full h-full object-cover opacity-40 transition-transform duration-700 group-hover:scale-110 parallax-img"
                data-speed="0.2">
        </div>
        <h3
            class="absolute text-center font-bold two-line reveal-text top-28 left-1/2 -translate-x-1/2 text-xl tracking-[0.2em] uppercase font-light text-white/90 two-line reveal-text w-full px-4">
            {{ $page->t('about_hero_title', 'قصة بيون بكداش') }} </h3>
    </section>

    <section class="text-stone-200 relative z-10 max-w-7xl mx-auto py-16 px-4 sm:px-10" id="story">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div class="reveal-text" data-animation="right">

                <h3 class="text-2xl font-bold mb-6">{{ $page->t('story_title', 'قصة بيون بكداش') }}</h3>
                <p class="mt-6 text-lg leading-relaxed reveal-text">
                    {{ $page->t('story_p1', 'بكداش – إرث دمشقي بنكهة لا تُنسى بكداش ليست مجرد اسم، بل هي امتداد لعائلة عريقة حملت نكهة دمشق إلى العالم. تعود بداياتها إلى عام 1895 حين أسس المرحوم الحاج حمدي بكداش أول طعم للبوظة العربية (دق)،في دمشق، لتصبح علامة فارقة في العالم في صناعة الآيس كريم') }}
                </p>
                <p class="mt-6 text-lg leading-relaxed reveal-text">
                    {{ $page->t('story_p2', 'الأصالة في قلب الحداثة رغم التحديثات، ما زالت بكداش تُحضّر على الطريقة اليدوية التقليدية، باستخدام مواد طبيعية مثل السحلب الاسطنبولي والمستكة، وتُدقّ يدوياً بأدوات تراثية، لتمنحها قواماً مطاطياً فريداً وطعماً لا يُضاهى.') }}
                </p>
                <p class="mt-6 text-lg leading-relaxed reveal-text">
                    {{ $page->t('story_p3', 'زوّار من ذهب على مدار أكثر من قرن، استقبل بكداش ملوكاً ورؤساء ومشاهير من مختلف أنحاء العالم، لتصبح وجهة لا تُفوّت لكل من يزور دمشق أو يبحث عن نكهة الشرق الأصيلة، نكهة تجاوزت التوقعات، لأنها صُنعت بحب لتمنحك لحظة استثنائية في كل مرة، هي قصة، وتراث، وتجربة لا تُنسى.') }}
                </p>

                <p class="mt-6 text-lg leading-relaxed reveal-text">
                    {{ $page->t('story_p4', 'من الجذور إلى الامتداد توسعت العلامة التجارية "بكداش" إلى "بيون بكداش" التي يملكها الأخوان عامر و محمد سائر سهيل بكداش، يُدار نشاطها حالياًمن جمهورية مصر العربية، حيث تأخذ طابعاً جديداً في تقديم منتجاتها التي تضم أنواعاً متعددة من الآيس كريم، بنكهات متنوعة، وتغليف عصري، وطريقة بيع مصممة لتلائم جميع الأذواق، مع التمسك بالنكهة الكلاسيكية التي رسخت في ذاكرة زائريها .') }}
                </p>

                <p class="mt-6 text-lg leading-relaxed reveal-text">
                    {{ $page->t('story_p5', 'ذوقك يستحق الأفضل، و"بيون بكداش" هو خيارك الذكي، حيث تمتزج النكهات الأصيلة بروح الابتكار العصري في مذاق لا يُقاوم، ندعوك لتكون جزءًا منها.') }}
                </p>
            </div>
            <div class="flex items-center justify-center" data-animation="left">
                <picture>
                    <source srcset="{{ $page->image('story_image', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/about-1-removebg-preview.png')) }}" type="image/png">
                    <img src="{{ $page->image('story_image', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/about-1-removebg-preview.png')) }}" alt="{{ $page->t('story_image_alt', 'صورة قصة بيون بكداش') }}"
                        class=" rounded-lg mt-10">
                </picture>
            </div>
        </div>

    </section>
@endsection
