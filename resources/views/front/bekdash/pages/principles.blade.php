@extends('front.bekdash.layout')

@section('content')
    <section
        class="group relative w-full overflow-hidden w-full group flex items-center justify-center bg-black overflow-hidden border-y border-white/10 gsap-item"
        data-animation="right" style="animation-delay: 0.4s;">
        <!-- <div class="absolute inset-0 border border-gold/30 rounded-sm z-0"></div> -->

        <img src="{{ $page->image('principles_image_desktop', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/principles.jpeg')) }}"
            class="w-full h-[60vh] hidden md:block object-cover  transition-all duration-700   transition-transform duration-700 group-hover:scale-110"
            data-speed="0.5" alt="Principles">

        <img src="{{ $page->image('principles_image_mobile', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/principles-mobile.png')) }}"
            class="w-full h-[60vh] md:hidden object-cover  transition-all duration-700   transition-transform duration-700 group-hover:scale-110"
            data-speed="0.5" alt="Principles">
    </section>


    <main class="container mx-auto px-4 md:px-8 py-12 max-w-7xl">

        <!-- intro message: three pillars (fixed / credibility / evolving) -->
        <div class="mb-16 text-center md:text-right">
            <div class="bg-stone-900/60 rounded-2xl p-6 shadow-md border-r-8 border-amber-600">
                <div class="flex flex-col md:flex-row justify-between items-start gap-4">
                    <div>
                        <h2 class="text-2xl font-bold text-amber-400 flex items-center gap-2"><i
                                class="fas fa-cubes"></i> {{ $page->t('intro_title', 'ثلاث محاور رئيسية متكاملة') }}</h2>
                        <p class="text-lg mt-2 leading-relaxed">{!! $page->t('intro_text', 'سياسة بيون بكداس تتشكل من <strong class="text-amber-400">(القوانين / التشغيل / السوق)</strong> — مرتبطة وثابتة، مصداقية ومتجددة، متغيرة وتطوير.') !!}</p>
                    </div>
                    <div class="flex gap-2 text-4xl text-amber-500">
                        <i class="fas fa-balance-scale"></i>
                        <i class="fas fa-cogs"></i>
                        <i class="fas fa-chart-simple"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========== 1. الشق القانوني + الشق المالي (First row) ========== -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- Legal Section -->
            <div id="legal"
                class="policy-card gsap-item bg-stone-900 rounded-2xl shadow-lg overflow-hidden border border-amber-900/50"
                data-animation="right">
                <div class="bg-gradient-to-r from-stone-800 to-amber-800 px-6 py-4">
                    <h2 class="text-xl font-bold text-white flex items-center gap-2"><i class="fas fa-gavel"></i> {{ $page->t('legal_title', 'الشق القانوني') }}</h2>
                </div>
                <div class="p-6">
                    <ul class="space-y-3 custom-list">
                        <li class="reveal-text"><i class="fas fa-check-circle text-amber-400 text-lg"></i> <span>التزام
                                الشركة بجميع قوانين التشغيل والإنتاج والاستيراد والتصدير بأوراق صادرة عن هيئات حكومية
                                (إنشاء شركة / علامة تجارية / كافة التراخيص).</span></li>
                        <li class="reveal-text"><i class="fas fa-file-signature text-amber-400 text-lg"></i>
                            <span>اعتماد الشركة على عقود موثقة حكومياً بناءً على مضمون العقد.</span></li>
                        <li class="reveal-text"><i class="fas fa-flask text-amber-400 text-lg"></i> <span>منتجات من
                                مخابر معتمدة لضمان الأمن الغذائي وملتزمة بتحاليل دورية.</span></li>
                    </ul>
                </div>
            </div>
            <!-- Financial Section -->
            <div id="financial"
                class="policy-card gsap-item bg-stone-900 rounded-2xl shadow-lg overflow-hidden border border-amber-900/50"
                data-animation="left">
                <div class="bg-gradient-to-r from-stone-800 to-amber-800 px-6 py-4">
                    <h2 class="text-xl font-bold text-white flex items-center gap-2"><i class="fas fa-chart-line"></i>
                        {{ $page->t('financial_title', 'الشق المالي') }}</h2>
                </div>
                <div class="p-6">
                    <ul class="space-y-3 custom-list">
                        <li class="reveal-text"><i class="fas fa-chart-pie"></i> <span>فصل واضح بين التكاليف المباشرة
                                والغير مباشرة.</span></li>
                        <li class="reveal-text"><i class="fas fa-chart-simple"></i> <span>اعتماد الشركة على تقارير يومية
                                داخلية وخارجية لضبط حركة العمل كاملاً.</span></li>
                        <li class="reveal-text"><i class="fas fa-coins"></i> <span>موازنة سنوية تضمن توقعات المبيعات
                                وتكلفة الإنتاج والمصاريف.</span></li>
                        <li class="reveal-text"><i class="fas fa-tags"></i> <span>استخدام استراتيجيات خصومات حجم / عروض
                                موسمية / تسعير احترافي بالأسواق الجديدة.</span></li>
                        <li class="reveal-text"><i class="fas fa-laptop-code"></i> <span>اعتماد برنامج حسابي احترافي
                                شامل تحركات الشركة.</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- ========== التسعير الذكي / سياسة حرق الأسعار (detailed) ========== -->
        <div class="mb-12 policy-card gsap-item bg-gradient-to-br from-stone-800 to-stone-900 rounded-2xl shadow-xl border border-amber-800/60 overflow-hidden"
            data-animation="up">
            <div class="grid md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-amber-800/40">
                <!-- smart pricing column -->
                <div class="p-6 md:p-8 reveal-text">
                    <div class="flex items-center gap-3 mb-4">
                        <i class="fas fa-brain text-3xl text-amber-500"></i>
                        <h2 class="text-2xl font-bold text-white">{{ $page->t('smart_pricing_title', 'التسعير الذكي') }}</h2>
                    </div>
                    <p class="font-semibold text-amber-400 mb-3">{{ $page->t('smart_pricing_subtitle', 'مبني على القيمة والثبات') }}</p>
                    <ul class="space-y-2 custom-list">
                        <li class="reveal-text"><i class="fas fa-chart-line"></i> المدى الأولي: إنتاج هادئ وبناء أساس
                            متين.</li>
                        <li class="reveal-text"><i class="fas fa-trophy"></i> المدى المتوسط والبعيد: بناء سمعة قوية
                            وزيادة الطلب لوجود الثقة.</li>
                        <li class="reveal-text"><i class="fas fa-gem"></i> يعتمد على الجودة، طريقة التقديم، ومكان تواجد
                            المنتج بالسوق.</li>
                        <li class="reveal-text"><i class="fas fa-chart-simple"></i> استراتيجية مستهدفة تحافظ على نسبة
                            الربح واستمرارية التطوير لزيادة الانتشار.</li>
                    </ul>
                </div>
                <!-- price burning policy -->
                <div class="p-6 md:p-8 reveal-text">
                    <div class="flex items-center gap-3 mb-4">
                        <i class="fas fa-fire-flame-curved text-3xl text-red-500"></i>
                        <h2 class="text-2xl font-bold text-white">{{ $page->t('price_burning_title', 'سياسة حرق الأسعار') }}</h2>
                    </div>
                    <ul class="space-y-2 custom-list">
                        <li class="reveal-text"><i class="fas fa-chart-line"></i> يعطي مبيعات سريعة على المدى الأولي لكن
                            بأضرار كبيرة على المدى المتوسط والبعيد.</li>
                        <li class="reveal-text"><i class="fas fa-hand-holding-usd"></i> مبني على كسر المنافسين بأي شكل
                            على حساب الجودة وعدم المقدرة على الاستمرارية.</li>
                        <li class="reveal-text"><i class="fas fa-battle"></i> يشعل حرب تنافسية وعدم التزام بالمصداقية مع
                            الزبون → تراجع وسوء السمعة.</li>
                        <li class="reveal-text"><i class="fas fa-thumbs-down"></i> يضر بالقدرة على التطوير وثبات الجودة.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bg-amber-950/50 px-6 py-3 text-center text-sm reveal-text">
                <i class="fas fa-balance-scale ml-1"></i> {{ $page->t('pricing_summary', 'الخلاصة: التسعير الذكي = استدامة + مصداقية، حرق الأسعار = ضرر طويل الأمد.') }}
            </div>
        </div>

        <!-- ========== 2. التشغيل (Operations) extensive section ========== -->
        <div class="mb-12 policy-card gsap-item bg-stone-900 rounded-2xl shadow-xl overflow-hidden border-t-4 border-amber-700"
            data-animation="right">
            <div class="bg-stone-900 px-6 py-5 flex items-center gap-3">
                <i class="fas fa-gears text-2xl text-amber-400"></i>
                <h2 class="text-2xl font-bold text-white">{{ $page->t('operations_title', 'التشغيل') }} <span class="text-amber-300 text-base mr-2">{{ $page->t('operations_subtitle', '(الأنظمة الداخلية وسلسلة القيمة)') }}</span></h2>
            </div>
            <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">
                <ul class="space-y-3 custom-list">
                    <li class="reveal-text"><i class="fas fa-chalkboard-user"></i> تدريب الموارد البشرية بشكل مناسب على
                        كافة الأصعدة وعدم وجود صلة قرابة بينهم.</li>
                    <li class="reveal-text"><i class="fas fa-users"></i> عدم التمييز بين أعضاء فريق العمل وتقبل الأخطاء
                        في المرحلة الأولى.</li>
                    <li class="reveal-text"><i class="fas fa-user-check"></i> توظيف الشخص الناجح في المكان المناسب
                        لتوفير مناخ مناسب وتكريمه عند تقدمه.</li>
                    <li class="reveal-text"><i class="fas fa-chart-line"></i> دراسة السوق لضمان جودة المنتج عبر عقود
                        محددة بعد تحديد سياسة المشتريات من شركات توريد المواد الأولية على المدى الطويل.</li>
                    <li class="reveal-text"><i class="fas fa-dollar-sign"></i> مراجعة دورية لأسعار السوق للمواد الأولية
                        لمعرفة الجديد منها.</li>
                </ul>
                <ul class="space-y-3 custom-list">
                    <li class="reveal-text"><i class="fas fa-tools"></i> خطة صيانة دورية للمكان والآلات مع رفع تقارير
                        بها.</li>
                    <li class="reveal-text"><i class="fas fa-qrcode"></i> تنطبق سياسة التتبع لمعرفة مصدر كل دفعة إنتاج.
                    </li>
                    <li class="reveal-text"><i class="fas fa-calendar-alt"></i> تحديد خطة تشغيل فريق العمل ضمن برنامج
                        مسبق للإنتاج.</li>
                    <li class="reveal-text"><i class="fas fa-truck-fast"></i> التوزيع اللوجستيك للشركة لوجود نقل مجهز
                        (تبريد وتجميد مدعم بنظام GPS).</li>
                </ul>
            </div>
        </div>

        <!-- ========== 3. السوق (Market) full section ========== -->
        <div class="mb-12 policy-card gsap-item bg-stone-900 rounded-2xl shadow-xl overflow-hidden border border-amber-900/50"
            data-animation="left">
            <div class="bg-gradient-to-l from-amber-800 to-stone-700 px-6 py-5">
                <h2 class="text-2xl font-bold text-white flex items-center gap-2"><i class="fas fa-chart-line"></i>
                    {{ $page->t('market_title', 'استراتيجية السوق والتوسع') }}</h2>
            </div>
            <div class="p-6 md:p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="reveal-text"><i class="fas fa-chart-line text-amber-400 text-xl ml-2"></i> دراسة الأسواق
                        المستهدفة باستمرار.</div>
                    <div class="reveal-text"><i class="fas fa-globe"></i> توسيع جغرافي من خلال (فرانشايز، وكيل، وكلاء).
                    </div>
                    <div class="reveal-text"><i class="fas fa-flask"></i> سياسة البحث والتطوير.</div>
                    <div class="reveal-text"><i class="fas fa-store"></i> التحالف مع سلاسل السوبر ماركت.</div>
                    <div class="reveal-text"><i class="fas fa-shipping-fast"></i> التعاون مع شركات الشحن لتقليل تكلفة
                        الشحن.</div>
                    <div class="reveal-text"><i class="fas fa-calendar-week"></i> تطوير المنتجات بشكل موسمي.</div>
                    <div class="reveal-text"><i class="fab fa-instagram"></i> استخدام المنصات المناسبة للبلد المناسبة
                        بالسوشيال ميديا مع توفير بلوجر.</div>
                    <div class="reveal-text"><i class="fas fa-hand-sparkles"></i> حملات تذوق ومحاولة دعم الجمعيات
                        الخيرية إن أمكن واعلانات طرقية.</div>
                    <div class="reveal-text"><i class="fas fa-percent"></i> الابتعاد عن الخصومات النقدية وتكون خصومات من
                        المنتجات.</div>
                    <div class="reveal-text"><i class="fas fa-utensils"></i> تواجد بالمعارض الغذائية لزيادة الانتشار
                        وتعريف المجتمع على المنتجات.</div>
                </div>
                <div class="mt-8 p-4 bg-amber-950/40 rounded-xl flex items-start gap-3 reveal-text">
                    <i class="fas fa-bullhorn text-2xl text-amber-700"></i>
                    <span class="text-sm md:text-base">{{ $page->t('market_summary', 'نهج تسويقي متكامل: توسع جغرافي ذكي، شراكات استراتيجية، تواجد رقمي وميداني، وتركيز على القيمة لا الخصومات النقدية.') }}</span>
                </div>
            </div>
        </div>

        <!-- additional: تكامل السياسات (summary) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-8 text-center">
            <div class="bg-stone-800 p-5 rounded-2xl shadow-md gsap-item" data-animation="up">
                <i class="fas fa-link text-3xl text-amber-700 mb-2 block"></i>
                <h3 class="font-bold text-lg text-white">{{ $page->t('pillar_1_title', 'مرتبطة وثابتة') }}</h3>
                <p class="text-sm text-stone-300">{{ $page->t('pillar_1_desc', 'قوانين، تشغيل، سوق — بنية مؤسسية متماسكة.') }}</p>
            </div>
            <div class="bg-stone-800 p-5 rounded-2xl shadow-md gsap-item" data-animation="up"
                style="animation-delay: 0.2s;">
                <i class="fas fa-shield-alt text-3xl text-amber-700 mb-2 block"></i>
                <h3 class="font-bold text-lg text-white">{{ $page->t('pillar_2_title', 'مصداقية متجددة') }}</h3>
                <p class="text-sm text-stone-300">{{ $page->t('pillar_2_desc', 'التزام بالجودة والعقود والشفافية المالية.') }}</p>
            </div>
            <div class="bg-stone-800 p-5 rounded-2xl shadow-md gsap-item" data-animation="up"
                style="animation-delay: 0.4s;">
                <i class="fas fa-chart-line text-3xl text-amber-700 mb-2 block"></i>
                <h3 class="font-bold text-lg text-white">{{ $page->t('pillar_3_title', 'متغيرة وتطوير') }}</h3>
                <p class="text-sm text-stone-300">{{ $page->t('pillar_3_desc', 'التكيف مع الأسواق، مراجعة مستمرة وابتكار.') }}</p>
            </div>
        </div>


    </main>
@endsection
