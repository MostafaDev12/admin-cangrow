@extends('front.bekdash.layout')

@section('content')
    <!-- Vision Section -->
    <section
        class="group relative w-full overflow-hidden w-full group flex items-center justify-center bg-black overflow-hidden border-y border-white/10 gsap-item"
        data-animation="up" style="animation-delay: 0.4s;">
        <!-- <div class="absolute inset-0 border border-gold/30 rounded-sm z-0"></div> -->

        <img src="{{ $page->image('vision_image_desktop', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/vision.jpeg')) }}"
            class="w-full h-[60vh] hidden md:block object-cover  transition-all duration-700   transition-transform duration-700 group-hover:scale-110"
            data-speed="0.5" alt="Principles">
        <img src="{{ $page->image('vision_image_mobile', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/vison-mobile.png')) }}"
            class="w-full h-[60vh] md:hidden object-cover transition-all duration-700 group-hover:scale-110"
            data-speed="0.5" alt="Vision Mobile">
    </section>

    <main class="container mx-auto px-4 md:px-8 py-12 max-w-7xl">

        <!-- HIERARCHICAL STRUCTURE (الهرمية) -->
        <div class="mb-16">
            <div class="flex items-center gap-3 mb-6 border-b-2 border-amber-600 pb-3">
                <i class="fas fa-sitemap text-3xl text-amber-500"></i>
                <h2 class="text-3xl font-bold text-white">{{ $page->t('hierarchy_title', 'الهرمية المؤسسية') }} <span
                        class="text-amber-500 text-lg mr-2">{{ $page->t('hierarchy_subtitle', '(الرؤية الكبرى ← أهداف تشغيلية · تسويقية · استراتيجية · الهدف النهائي)') }}</span></h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="goal-card gsap-item bg-stone-900 rounded-2xl shadow-lg p-5 border-t-8 border-amber-700"
                    data-animation="up">
                    <i class="fas fa-eye text-4xl text-amber-600 mb-3 block"></i>
                    <h3 class="text-xl font-bold text-white">{{ $page->t('card_vision_title', 'الرؤية الكبرى') }}</h3>
                    <p class="text-sm mt-2 leading-relaxed text-stone-300">{{ $page->t('card_vision_desc', 'علامة عالمية رائدة بجودة وابتكار بطابع عربي أصيل، ضمن أقوى 12 شركة في المجال.') }}</p>
                </div>
                <div class="goal-card gsap-item bg-stone-900 rounded-2xl shadow-lg p-5 border-t-8 border-amber-600"
                    data-animation="up" style="animation-delay: 0.1s;">
                    <i class="fas fa-chart-simple text-4xl text-amber-600 mb-3 block"></i>
                    <h3 class="text-xl font-bold text-white">{{ $page->t('card_strategic_title', 'أهداف استراتيجية') }}</h3>
                    <p class="text-sm mt-2 text-stone-300">{{ $page->t('card_strategic_desc', 'انتشار دولي، علامة تجارية دولية (مدريد)، نظام فرانشايز، فتح فرع بعاصمة سياحية.') }}</p>
                </div>
                <div class="goal-card gsap-item bg-stone-900 rounded-2xl shadow-lg p-5 border-t-8 border-amber-500"
                    data-animation="up" style="animation-delay: 0.2s;">
                    <i class="fas fa-chart-line text-4xl text-amber-600 mb-3 block"></i>
                    <h3 class="text-xl font-bold text-white">{{ $page->t('card_marketing_title', 'أهداف تسويقية') }}</h3>
                    <p class="text-sm mt-2 text-stone-300">{{ $page->t('card_marketing_desc', 'حصة سوقية 11-22%، انتشار محلي واسع، تصدير إقليمي أولي.') }}</p>
                </div>
                <div class="goal-card gsap-item bg-stone-900 rounded-2xl shadow-lg p-5 border-t-8 border-amber-400"
                    data-animation="up" style="animation-delay: 0.3s;">
                    <i class="fas fa-cogs text-4xl text-amber-600 mb-3 block"></i>
                    <h3 class="text-xl font-bold text-white">{{ $page->t('card_operational_title', 'أهداف تشغيلية') }}</h3>
                    <p class="text-sm mt-2 text-stone-300">{{ $page->t('card_operational_desc', 'نظام جودة داخلي، شهادات عالمية، هيكل إداري، تواجد محلي رقمي وميداني.') }}</p>
                </div>
            </div>
            <!-- الهدف النهائي -->
            <div class="mt-8 gsap-item bg-gradient-to-r from-amber-800 to-stone-800 text-white p-5 rounded-2xl shadow-xl text-center"
                data-animation="up">
                <i class="fas fa-bullseye text-3xl ml-2"></i>
                <span class="font-bold text-xl">{{ $page->t('final_goal_label', 'الهدف النهائي:') }}</span> {{ $page->t('final_goal_text', 'الوصول إلى أهم وأقوى عشر شركات في مجالها، مع استدامة ريادة الجودة والابتكار.') }}
            </div>
        </div>

        <!-- التجهيز والانتشار (internal & external) -->
        <div class="mb-12 grid md:grid-cols-2 gap-6">
            <div class="gsap-item bg-stone-900 rounded-xl p-6 shadow-md border-r-4 border-amber-600"
                data-animation="right">
                <i class="fas fa-building text-2xl text-amber-700 mb-2"></i>
                <h3 class="text-lg font-bold text-white">{{ $page->t('expansion_internal_title', 'تجهيز وتهيئة داخلية وخارجية') }}</h3>
                <p class="text-stone-300 mt-1">{{ $page->t('expansion_internal_desc', 'بنية تحتية متطورة، تأهيل كامل للبيئة التشغيلية والتوسع الجغرافي.') }}</p>
            </div>
            <div class="gsap-item bg-stone-900 rounded-xl p-6 shadow-md border-r-4 border-amber-600"
                data-animation="left">
                <i class="fas fa-share-alt text-2xl text-amber-700 mb-2"></i>
                <h3 class="text-lg font-bold text-white">{{ $page->t('expansion_network_title', 'الانتشار والترابط داخلي وإقليمي') }}</h3>
                <p class="text-stone-300 mt-1">{{ $page->t('expansion_network_desc', 'شبكة مترابطة من الفروع والشركاء لضمان التواجد القوي.') }}</p>
            </div>
            <div class="gsap-item bg-stone-900 rounded-xl p-6 shadow-md border-r-4 border-amber-600"
                data-animation="right" style="animation-delay: 0.1s;">
                <i class="fas fa-store text-2xl text-amber-700 mb-2"></i>
                <h3 class="text-lg font-bold text-white">{{ $page->t('expansion_market_title', 'التواجد بالأسواق الكبيرة') }}</h3>
                <p class="text-stone-300 mt-1">{{ $page->t('expansion_market_desc', 'دخول منافذ قوية وسلاسل كبرى محلياً ودولياً.') }}</p>
            </div>
            <div class="gsap-item bg-stone-900 rounded-xl p-6 shadow-md border-r-4 border-amber-600"
                data-animation="left" style="animation-delay: 0.1s;">
                <i class="fas fa-trophy text-2xl text-amber-700 mb-2"></i>
                <h3 class="text-lg font-bold text-white">{{ $page->t('expansion_top10_title', 'الوصول لأقوى 10 شركات') }}</h3>
                <p class="text-stone-300 mt-1">{{ $page->t('expansion_top10_desc', 'التنافس عالمياً ضمن نخبة الشركات الرائدة في القطاع.') }}</p>
            </div>
        </div>

        <!-- ========== أهداف تشغيلية قصيرة المدى ========== -->
        <div class="mb-12 policy-card gsap-item bg-stone-900 rounded-2xl shadow-xl overflow-hidden border-t-4 border-amber-700"
            data-animation="up">
            <div class="bg-stone-900 px-6 py-4 flex items-center gap-3 border-b border-amber-900/30">
                <i class="fas fa-stopwatch text-2xl text-amber-400"></i>
                <h2 class="text-2xl font-bold text-white">{{ $page->t('short_term_title', 'أهداف تشغيلية قصيرة المدى') }} <span
                        class="text-amber-300 text-base mr-2">{{ $page->t('short_term_subtitle', '(6 أشهر إلى سنة)') }}</span></h2>
            </div>
            <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">
                <ul class="space-y-3 custom-list">
                    <li class="reveal-text"><i class="fas fa-clipboard-list"></i> {{ $page->t('short_term_item_1', 'إنشاء نظام جودة داخلي (فحص المواد الخام ومراحل الإنتاج والتخزين والنقل).') }}</li>
                    <li class="reveal-text"><i class="fas fa-certificate"></i> {{ $page->t('short_term_item_2', 'الحصول على شهادات الجودة العالمية والمعايير المتعارف عليها (ISO، سلامة غذائية).') }}</li>
                    <li class="reveal-text"><i class="fas fa-building-user"></i> {{ $page->t('short_term_item_3', 'تنظيم الهيكل الإداري وتحديد الأقسام (إنتاج، تسويق، مبيعات، تصدير، مالية).') }}</li>
                </ul>
                <ul class="space-y-3 custom-list">
                    <li class="reveal-text"><i class="fas fa-map-marker-alt"></i> {{ $page->t('short_term_item_4', 'تواجد محلي وزيادة عليه عبر (موقع إلكتروني، منصات، إعلان طُرُقي، حملات تذوق، تطوير).') }}</li>
                    <li class="reveal-text"><i class="fas fa-chart-line"></i> {{ $page->t('short_term_item_5', 'زيادة الوعي بالعلامة في الأسواق المستهدفة الأولى.') }}</li>
                </ul>
            </div>
        </div>

        <!-- ========== الأهداف التسويقية متوسطة المدى ========== -->
        <div class="mb-12 policy-card gsap-item bg-stone-900 rounded-2xl shadow-xl overflow-hidden border-t-4 border-amber-600"
            data-animation="up">
            <div class="bg-gradient-to-r from-amber-800 to-stone-700 px-6 py-4 flex items-center gap-3">
                <i class="fas fa-chart-line text-2xl text-amber-200"></i>
                <h2 class="text-2xl font-bold text-white">{{ $page->t('mid_term_title', 'الأهداف التسويقية متوسطة المدى') }} <span
                        class="text-amber-200 text-base mr-2">{{ $page->t('mid_term_subtitle', '(من سنة إلى 3 سنوات)') }}</span></h2>
            </div>
            <div class="p-6 md:p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="flex items-start gap-3 bg-stone-800 p-4 rounded-xl reveal-text">
                        <i class="fas fa-shopping-cart text-2xl text-amber-500"></i>
                        <div class="text-white"><strong>{{ $page->t('mid_term_card_1_title', 'انتشار محلي واسع') }}</strong><br><span class="text-stone-300">{{ $page->t('mid_term_card_1_desc', 'سلاسل سوبر ماركت، كافيهات، أماكن بيع استراتيجية.') }}</span></div>
                    </div>
                    <div class="flex items-start gap-3 bg-stone-800 p-4 rounded-xl reveal-text">
                        <i class="fas fa-chart-pie text-2xl text-amber-500"></i>
                        <div class="text-white"><strong>{{ $page->t('mid_term_card_2_title', 'حصة سوقية 11% إلى 22%') }}</strong><br><span
                                class="text-stone-300">{{ $page->t('mid_term_card_2_desc', 'في الأسواق المستهدفة المحلية والإقليمية الأولى.') }}</span>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 bg-stone-800 p-4 rounded-xl reveal-text">
                        <i class="fas fa-plane text-2xl text-amber-500"></i>
                        <div class="text-white"><strong>{{ $page->t('mid_term_card_3_title', 'التصدير الإقليمي الأولي') }}</strong><br><span
                                class="text-stone-300">{{ $page->t('mid_term_card_3_desc', 'دخول الأسواق القريبة بكميات قليلة لاختبار الطلب.') }}</span></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========== الأهداف الاستراتيجية طويلة المدى ========== -->
        <div class="mb-12 policy-card gsap-item bg-stone-900 rounded-2xl shadow-xl overflow-hidden border-t-4 border-amber-500"
            data-animation="up">
            <div class="bg-stone-900 px-6 py-4 flex items-center gap-3 border-b border-amber-900/30">
                <i class="fas fa-chart-line text-2xl text-amber-400"></i>
                <h2 class="text-2xl font-bold text-white">{{ $page->t('long_term_title', 'الأهداف الاستراتيجية طويلة المدى') }} <span
                        class="text-amber-300 text-base mr-2">{{ $page->t('long_term_subtitle', '(من 3 إلى 7 سنوات)') }}</span></h2>
            </div>
            <div class="p-6 md:p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <ul class="space-y-3 custom-list">
                        <li class="reveal-text"><i class="fas fa-globe-americas"></i> {{ $page->t('long_term_item_1', 'انتشار دولي في أسواق أوروبا، أمريكا، آسيا.') }}</li>
                        <li class="reveal-text"><i class="fas fa-trademark"></i> {{ $page->t('long_term_item_2', 'تسجيل العلامة تجارياً دولياً عبر نظام مدريد (Madrid Protocol).') }}</li>
                        <li class="reveal-text"><i class="fas fa-handshake"></i> {{ $page->t('long_term_item_3', 'إطلاق نظام فرانشايز وتوفير الشروط اللازمة للشركاء.') }}</li>
                    </ul>
                    <ul class="space-y-3 custom-list">
                        <li class="reveal-text"><i class="fas fa-city"></i> {{ $page->t('long_term_item_4', 'فتح أول فرع للشركة في عاصمة ذات طابع سياحي قوي بتعدد المنتجات وأصولها.') }}</li>
                        <li class="reveal-text"><i class="fas fa-leaf"></i> {{ $page->t('long_term_item_5', 'العمل على استدامة الشركة عبر تطوير المنتجات والتغليف مع مراعاة المواسم.') }}</li>
                        <li class="reveal-text"><i class="fas fa-chart-line"></i> {{ $page->t('long_term_item_6', 'تعزيز الابتكار المستدام والمرونة في سلاسل التوريد.') }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- ========== الرؤية الكبرى (بعد 7 سنوات) ========== -->
        <div class="mb-12 relative overflow-hidden rounded-2xl shadow-2xl gsap-item" data-animation="up">
            <div class="absolute inset-0 bg-gradient-to-r from-amber-900/90 to-stone-900/90">
            </div>
            <div class="relative p-8 md:p-12 text-white text-center">
                <i class="fas fa-rocket text-5xl text-amber-300 mb-4 block reveal-text"></i>
                <h2 class="text-3xl md:text-4xl font-extrabold mb-4 reveal-text">{{ $page->t('big_vision_title', 'الرؤية الكبرى (بعد 7 سنوات)') }}</h2>
                <div class="max-w-3xl mx-auto space-y-4 text-lg">
                    {{-- These three contain inline <strong> markup, so editable text is rendered raw with {!! !!} --}}
                    <p class="reveal-text"><i class="fas fa-check-circle text-amber-300 ml-2"></i> {!! $page->t('big_vision_p1', 'أن تكون الشركة <strong class="text-amber-200">علامة عالمية رائدة</strong> في تصنيع منتجاتها.') !!}</p>
                    <p class="reveal-text"><i class="fas fa-check-circle text-amber-300 ml-2"></i> {!! $page->t('big_vision_p2', 'أن يعرف اسم الشركة كـ <strong class="text-amber-200">مركز للجودة والابتكار بطابع عربي أصيل</strong>.') !!}</p>
                    <p class="reveal-text"><i class="fas fa-check-circle text-amber-300 ml-2"></i> {!! $page->t('big_vision_p3', 'أن تكون الشركة ضمن <strong class="text-amber-200">أكبر 12 شركة في مجالها</strong> على المستوى العالمي.') !!}</p>
                </div>
                <div class="mt-8 flex flex-wrap justify-center gap-4 text-amber-200 text-sm reveal-text">
                    <span class="bg-black/30 px-4 py-2 rounded-full"><i class="fas fa-chart-line"></i> {{ $page->t('big_vision_tag_1', 'توسع عالمي') }}</span>
                    <span class="bg-black/30 px-4 py-2 rounded-full"><i class="fas fa-crown"></i> {{ $page->t('big_vision_tag_2', 'الريادة') }}</span>
                    <span class="bg-black/30 px-4 py-2 rounded-full"><i class="fas fa-heart"></i> {{ $page->t('big_vision_tag_3', 'هوية عربية أصيلة') }}</span>
                </div>
            </div>
        </div>

        <!-- Previous Principles Summary (quick recap) to keep consistency with existing page but adding goal integration -->
        <div class="mt-10 border-t border-amber-800 pt-8">
            <div class="flex items-center gap-2 mb-4">
                <i class="fas fa-scroll text-amber-700 text-xl"></i>
                <h3 class="text-xl font-bold text-white">{{ $page->t('policy_summary_title', 'مرجع سياسة بيون بكداش') }}</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                <div class="bg-stone-900 p-4 rounded-xl shadow-sm text-stone-200"><i
                        class="fas fa-gavel text-amber-600 ml-1"></i> <strong>{{ $page->t('policy_legal_label', 'الشق القانوني:') }}</strong> {{ $page->t('policy_legal_text', 'التزام بالتراخيص والعقود الموثقة، مخابر معتمدة.') }}</div>
                <div class="bg-stone-900 p-4 rounded-xl shadow-sm text-stone-200"><i
                        class="fas fa-chart-line text-amber-600 ml-1"></i> <strong>{{ $page->t('policy_pricing_label', 'التسعير الذكي:') }}</strong> {{ $page->t('policy_pricing_text', 'استدامة وجودة ضد حرق الأسعار.') }}</div>
                <div class="bg-stone-900 p-4 rounded-xl shadow-sm text-stone-200"><i
                        class="fas fa-truck-fast text-amber-600 ml-1"></i> <strong>{{ $page->t('policy_market_label', 'التشغيل والسوق:') }}</strong> {{ $page->t('policy_market_text', 'صيانة، تتبع، توسع جغرافي وتحالفات.') }}</div>
            </div>
        </div>


    </main>
@endsection
