<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Page;
use App\Models\PageImage;
use App\Models\PageTranslation;
use Illuminate\Database\Seeder;

class BekdashPageSeeder extends Seeder
{
    /**
     * Seed the bekdash dynamic pages (home, about, goals, principles, contact).
     *
     * Idempotent — safe to re-run via:
     *   php artisan db:seed --class=BekdashPageSeeder
     */
    public function run(): void
    {
        $languages = Language::all();

        // ---- home ---------------------------------------------------------
        $homeContent = [
            'meta_title'             => 'بيون بكداش - أفضل بوظة سورية',
            'meta_description'       => 'استمتع بأفضل وألذ أنواع البوظة السورية الأصيلة مع نكهات متنوعة وطعم لا يُنسى',
            'about_title'            => 'قصة بيون بكداش',
            'products_section_title' => 'منتجاتنا المميزة',
            'product_1_title'        => 'سبريد',
            'product_2_title'        => 'سويسرول',
            'product_3_title'        => 'ايس كريم عربي',
        ];

        $homeImages = [
            'hero_image_desktop'        => 'front/byun_bekdash2/asset/Main-sate-backgrounds/SLIDER-3.png',
            'hero_image_mobile'         => 'front/byun_bekdash2/asset/Main-sate-backgrounds/Slider-mobile.png',
            'about_image'               => 'front/byun_bekdash2/asset/Main-sate-backgrounds/story.jpeg',
            'product_1_image'           => 'front/byun_bekdash2/asset/prod/prod-4.jpeg',
            'product_2_image'           => 'front/byun_bekdash2/asset/prod/pro-1 (3).png',
            'product_3_image'           => 'front/byun_bekdash2/asset/prod/pro-1 (1).png',
            'principles_image_desktop'  => 'front/byun_bekdash2/asset/Main-sate-backgrounds/principles.jpeg',
            'principles_image_mobile'   => 'front/byun_bekdash2/asset/Main-sate-backgrounds/principles-mobile.png',
            'vision_image_desktop'      => 'front/byun_bekdash2/asset/Main-sate-backgrounds/vision.jpeg',
            'vision_image_mobile'       => 'front/byun_bekdash2/asset/Main-sate-backgrounds/vison-mobile.png',
        ];

        $this->seedPage(
            slug:        'home',
            template:    'front.bekdash.pages.index',
            sortOrder:   0,
            content:     $homeContent,
            images:      $homeImages,
            languages:   $languages,
        );

        // ---- about --------------------------------------------------------
        $this->seedPage(
            slug:      'about',
            template:  'front.bekdash.pages.about',
            sortOrder: 10,
            content:   [
                'meta_title'       => 'قصة بيون بكداش',
                'meta_description' => 'تعرف على قصة وتاريخ بيون بكداش - إرث دمشقي بنكهة لا تُنسى',
                'about_hero_title' => 'قصة بيون بكداش',
                'story_title'      => 'قصة بيون بكداش',
                'story_p1'         => 'بكداش – إرث دمشقي بنكهة لا تُنسى بكداش ليست مجرد اسم، بل هي امتداد لعائلة عريقة حملت نكهة دمشق إلى العالم. تعود بداياتها إلى عام 1895 حين أسس المرحوم الحاج حمدي بكداش أول طعم للبوظة العربية (دق)،في دمشق، لتصبح علامة فارقة في العالم في صناعة الآيس كريم',
                'story_p2'         => 'الأصالة في قلب الحداثة رغم التحديثات، ما زالت بكداش تُحضّر على الطريقة اليدوية التقليدية، باستخدام مواد طبيعية مثل السحلب الاسطنبولي والمستكة، وتُدقّ يدوياً بأدوات تراثية، لتمنحها قواماً مطاطياً فريداً وطعماً لا يُضاهى.',
                'story_p3'         => 'زوّار من ذهب على مدار أكثر من قرن، استقبل بكداش ملوكاً ورؤساء ومشاهير من مختلف أنحاء العالم، لتصبح وجهة لا تُفوّت لكل من يزور دمشق أو يبحث عن نكهة الشرق الأصيلة، نكهة تجاوزت التوقعات، لأنها صُنعت بحب لتمنحك لحظة استثنائية في كل مرة، هي قصة، وتراث، وتجربة لا تُنسى.',
                'story_p4'         => 'من الجذور إلى الامتداد توسعت العلامة التجارية "بكداش" إلى "بيون بكداش" التي يملكها الأخوان عامر و محمد سائر سهيل بكداش، يُدار نشاطها حالياًمن جمهورية مصر العربية، حيث تأخذ طابعاً جديداً في تقديم منتجاتها التي تضم أنواعاً متعددة من الآيس كريم، بنكهات متنوعة، وتغليف عصري، وطريقة بيع مصممة لتلائم جميع الأذواق، مع التمسك بالنكهة الكلاسيكية التي رسخت في ذاكرة زائريها .',
                'story_p5'         => 'ذوقك يستحق الأفضل، و"بيون بكداش" هو خيارك الذكي، حيث تمتزج النكهات الأصيلة بروح الابتكار العصري في مذاق لا يُقاوم، ندعوك لتكون جزءًا منها.',
                'story_image_alt'  => 'صورة قصة بيون بكداش',
            ],
            images: [
                'about_hero_bg' => 'front/byun_bekdash2/asset/Main-sate-backgrounds/story.jpeg',
                'story_image'   => 'front/byun_bekdash2/asset/Main-sate-backgrounds/about-1-removebg-preview.png',
            ],
            languages: $languages,
        );

        // ---- goals --------------------------------------------------------
        $this->seedPage(
            slug:      'goals',
            template:  'front.bekdash.pages.goals',
            sortOrder: 20,
            content:   [
                'meta_title'              => 'أهداف بيون بكداش',
                'meta_description'        => 'أهدافنا الاستراتيجية والتسويقية والتشغيلية ورؤيتنا في بيون بكداش',
                'hierarchy_title'         => 'الهرمية المؤسسية',
                'hierarchy_subtitle'      => '(الرؤية الكبرى ← أهداف تشغيلية · تسويقية · استراتيجية · الهدف النهائي)',
                'card_vision_title'       => 'الرؤية الكبرى',
                'card_vision_desc'        => 'علامة عالمية رائدة بجودة وابتكار بطابع عربي أصيل، ضمن أقوى 12 شركة في المجال.',
                'card_strategic_title'    => 'أهداف استراتيجية',
                'card_strategic_desc'     => 'انتشار دولي، علامة تجارية دولية (مدريد)، نظام فرانشايز، فتح فرع بعاصمة سياحية.',
                'card_marketing_title'    => 'أهداف تسويقية',
                'card_marketing_desc'     => 'حصة سوقية 11-22%، انتشار محلي واسع، تصدير إقليمي أولي.',
                'card_operational_title'  => 'أهداف تشغيلية',
                'card_operational_desc'   => 'نظام جودة داخلي، شهادات عالمية، هيكل إداري، تواجد محلي رقمي وميداني.',
                'final_goal_label'        => 'الهدف النهائي:',
                'final_goal_text'         => 'الوصول إلى أهم وأقوى عشر شركات في مجالها، مع استدامة ريادة الجودة والابتكار.',
                'expansion_internal_title' => 'تجهيز وتهيئة داخلية وخارجية',
                'expansion_internal_desc'  => 'بنية تحتية متطورة، تأهيل كامل للبيئة التشغيلية والتوسع الجغرافي.',
                'expansion_network_title'  => 'الانتشار والترابط داخلي وإقليمي',
                'expansion_network_desc'   => 'شبكة مترابطة من الفروع والشركاء لضمان التواجد القوي.',
                'expansion_market_title'   => 'التواجد بالأسواق الكبيرة',
                'expansion_market_desc'    => 'دخول منافذ قوية وسلاسل كبرى محلياً ودولياً.',
                'expansion_top10_title'    => 'الوصول لأقوى 10 شركات',
                'expansion_top10_desc'     => 'التنافس عالمياً ضمن نخبة الشركات الرائدة في القطاع.',
                'short_term_title'         => 'أهداف تشغيلية قصيرة المدى',
                'short_term_subtitle'      => '(6 أشهر إلى سنة)',
                'mid_term_title'           => 'الأهداف التسويقية متوسطة المدى',
                'mid_term_subtitle'        => '(من سنة إلى 3 سنوات)',
                'mid_term_card_1_title'    => 'انتشار محلي واسع',
                'mid_term_card_1_desc'     => 'سلاسل سوبر ماركت، كافيهات، أماكن بيع استراتيجية.',
                'mid_term_card_2_title'    => 'حصة سوقية 11% إلى 22%',
                'mid_term_card_2_desc'     => 'في الأسواق المستهدفة المحلية والإقليمية الأولى.',
                'mid_term_card_3_title'    => 'التصدير الإقليمي الأولي',
                'mid_term_card_3_desc'     => 'دخول الأسواق القريبة بكميات قليلة لاختبار الطلب.',
                'long_term_title'          => 'الأهداف الاستراتيجية طويلة المدى',
                'long_term_subtitle'       => '(من 3 إلى 7 سنوات)',
                'big_vision_title'         => 'الرؤية الكبرى (بعد 7 سنوات)',
                'big_vision_tag_1'         => 'توسع عالمي',
                'big_vision_tag_2'         => 'الريادة',
                'big_vision_tag_3'         => 'هوية عربية أصيلة',
                'policy_summary_title'     => 'مرجع سياسة بيون بكداش',
                'policy_legal_label'       => 'الشق القانوني:',
                'policy_legal_text'        => 'التزام بالتراخيص والعقود الموثقة، مخابر معتمدة.',
                'policy_pricing_label'     => 'التسعير الذكي:',
                'policy_pricing_text'      => 'استدامة وجودة ضد حرق الأسعار.',
                'policy_market_label'      => 'التشغيل والسوق:',
                'policy_market_text'       => 'صيانة، تتبع، توسع جغرافي وتحالفات.',
                // ----- list items wrapped in $page->t() (added 2026-04-28) ---
                'short_term_item_1'        => 'إنشاء نظام جودة داخلي (فحص المواد الخام ومراحل الإنتاج والتخزين والنقل).',
                'short_term_item_2'        => 'الحصول على شهادات الجودة العالمية والمعايير المتعارف عليها (ISO، سلامة غذائية).',
                'short_term_item_3'        => 'تنظيم الهيكل الإداري وتحديد الأقسام (إنتاج، تسويق، مبيعات، تصدير، مالية).',
                'short_term_item_4'        => 'تواجد محلي وزيادة عليه عبر (موقع إلكتروني، منصات، إعلان طُرُقي، حملات تذوق، تطوير).',
                'short_term_item_5'        => 'زيادة الوعي بالعلامة في الأسواق المستهدفة الأولى.',
                'long_term_item_1'         => 'انتشار دولي في أسواق أوروبا، أمريكا، آسيا.',
                'long_term_item_2'         => 'تسجيل العلامة تجارياً دولياً عبر نظام مدريد (Madrid Protocol).',
                'long_term_item_3'         => 'إطلاق نظام فرانشايز وتوفير الشروط اللازمة للشركاء.',
                'long_term_item_4'         => 'فتح أول فرع للشركة في عاصمة ذات طابع سياحي قوي بتعدد المنتجات وأصولها.',
                'long_term_item_5'         => 'العمل على استدامة الشركة عبر تطوير المنتجات والتغليف مع مراعاة المواسم.',
                'long_term_item_6'         => 'تعزيز الابتكار المستدام والمرونة في سلاسل التوريد.',
                // big_vision_p* contain inline <strong> markup; rendered raw via {!! !!}.
                'big_vision_p1'            => 'أن تكون الشركة <strong class="text-amber-200">علامة عالمية رائدة</strong> في تصنيع منتجاتها.',
                'big_vision_p2'            => 'أن يعرف اسم الشركة كـ <strong class="text-amber-200">مركز للجودة والابتكار بطابع عربي أصيل</strong>.',
                'big_vision_p3'            => 'أن تكون الشركة ضمن <strong class="text-amber-200">أكبر 12 شركة في مجالها</strong> على المستوى العالمي.',
            ],
            images: [
                'vision_image_desktop' => 'front/byun_bekdash2/asset/Main-sate-backgrounds/vision.jpeg',
                'vision_image_mobile'  => 'front/byun_bekdash2/asset/Main-sate-backgrounds/vison-mobile.png',
            ],
            languages: $languages,
        );

        // ---- principles ---------------------------------------------------
        $this->seedPage(
            slug:      'principles',
            template:  'front.bekdash.pages.principles',
            sortOrder: 30,
            content:   [
                'meta_title'             => 'سياسة بيون بكداش',
                'meta_description'       => 'مبادئنا وسياستنا في بيون بكداش - القوانين، التشغيل، السوق',
                'intro_title'            => 'ثلاث محاور رئيسية متكاملة',
                'intro_text'             => 'سياسة بيون بكداس تتشكل من <strong class="text-amber-400">(القوانين / التشغيل / السوق)</strong> — مرتبطة وثابتة، مصداقية ومتجددة، متغيرة وتطوير.',
                'legal_title'            => 'الشق القانوني',
                'financial_title'        => 'الشق المالي',
                'smart_pricing_title'    => 'التسعير الذكي',
                'smart_pricing_subtitle' => 'مبني على القيمة والثبات',
                'price_burning_title'    => 'سياسة حرق الأسعار',
                'pricing_summary'        => 'الخلاصة: التسعير الذكي = استدامة + مصداقية، حرق الأسعار = ضرر طويل الأمد.',
                'operations_title'       => 'التشغيل',
                'operations_subtitle'    => '(الأنظمة الداخلية وسلسلة القيمة)',
                'market_title'           => 'استراتيجية السوق والتوسع',
                'market_summary'         => 'نهج تسويقي متكامل: توسع جغرافي ذكي، شراكات استراتيجية، تواجد رقمي وميداني، وتركيز على القيمة لا الخصومات النقدية.',
                'pillar_1_title'         => 'مرتبطة وثابتة',
                'pillar_1_desc'          => 'قوانين، تشغيل، سوق — بنية مؤسسية متماسكة.',
                'pillar_2_title'         => 'مصداقية متجددة',
                'pillar_2_desc'          => 'التزام بالجودة والعقود والشفافية المالية.',
                'pillar_3_title'         => 'متغيرة وتطوير',
                'pillar_3_desc'          => 'التكيف مع الأسواق، مراجعة مستمرة وابتكار.',
                // ----- list items wrapped in $page->t() (added 2026-04-28) ---
                'legal_item_1'           => 'التزام الشركة بجميع قوانين التشغيل والإنتاج والاستيراد والتصدير بأوراق صادرة عن هيئات حكومية (إنشاء شركة / علامة تجارية / كافة التراخيص).',
                'legal_item_2'           => 'اعتماد الشركة على عقود موثقة حكومياً بناءً على مضمون العقد.',
                'legal_item_3'           => 'منتجات من مخابر معتمدة لضمان الأمن الغذائي وملتزمة بتحاليل دورية.',
                'financial_item_1'       => 'فصل واضح بين التكاليف المباشرة والغير مباشرة.',
                'financial_item_2'       => 'اعتماد الشركة على تقارير يومية داخلية وخارجية لضبط حركة العمل كاملاً.',
                'financial_item_3'       => 'موازنة سنوية تضمن توقعات المبيعات وتكلفة الإنتاج والمصاريف.',
                'financial_item_4'       => 'استخدام استراتيجيات خصومات حجم / عروض موسمية / تسعير احترافي بالأسواق الجديدة.',
                'financial_item_5'       => 'اعتماد برنامج حسابي احترافي شامل تحركات الشركة.',
                'smart_pricing_item_1'   => 'المدى الأولي: إنتاج هادئ وبناء أساس متين.',
                'smart_pricing_item_2'   => 'المدى المتوسط والبعيد: بناء سمعة قوية وزيادة الطلب لوجود الثقة.',
                'smart_pricing_item_3'   => 'يعتمد على الجودة، طريقة التقديم، ومكان تواجد المنتج بالسوق.',
                'smart_pricing_item_4'   => 'استراتيجية مستهدفة تحافظ على نسبة الربح واستمرارية التطوير لزيادة الانتشار.',
                'price_burning_item_1'   => 'يعطي مبيعات سريعة على المدى الأولي لكن بأضرار كبيرة على المدى المتوسط والبعيد.',
                'price_burning_item_2'   => 'مبني على كسر المنافسين بأي شكل على حساب الجودة وعدم المقدرة على الاستمرارية.',
                'price_burning_item_3'   => 'يشعل حرب تنافسية وعدم التزام بالمصداقية مع الزبون → تراجع وسوء السمعة.',
                'price_burning_item_4'   => 'يضر بالقدرة على التطوير وثبات الجودة.',
                'ops_item_1'             => 'تدريب الموارد البشرية بشكل مناسب على كافة الأصعدة وعدم وجود صلة قرابة بينهم.',
                'ops_item_2'             => 'عدم التمييز بين أعضاء فريق العمل وتقبل الأخطاء في المرحلة الأولى.',
                'ops_item_3'             => 'توظيف الشخص الناجح في المكان المناسب لتوفير مناخ مناسب وتكريمه عند تقدمه.',
                'ops_item_4'             => 'دراسة السوق لضمان جودة المنتج عبر عقود محددة بعد تحديد سياسة المشتريات من شركات توريد المواد الأولية على المدى الطويل.',
                'ops_item_5'             => 'مراجعة دورية لأسعار السوق للمواد الأولية لمعرفة الجديد منها.',
                'ops_item_6'             => 'خطة صيانة دورية للمكان والآلات مع رفع تقارير بها.',
                'ops_item_7'             => 'تنطبق سياسة التتبع لمعرفة مصدر كل دفعة إنتاج.',
                'ops_item_8'             => 'تحديد خطة تشغيل فريق العمل ضمن برنامج مسبق للإنتاج.',
                'ops_item_9'             => 'التوزيع اللوجستيك للشركة لوجود نقل مجهز (تبريد وتجميد مدعم بنظام GPS).',
                'market_item_1'          => 'دراسة الأسواق المستهدفة باستمرار.',
                'market_item_2'          => 'توسيع جغرافي من خلال (فرانشايز، وكيل، وكلاء).',
                'market_item_3'          => 'سياسة البحث والتطوير.',
                'market_item_4'          => 'التحالف مع سلاسل السوبر ماركت.',
                'market_item_5'          => 'التعاون مع شركات الشحن لتقليل تكلفة الشحن.',
                'market_item_6'          => 'تطوير المنتجات بشكل موسمي.',
                'market_item_7'          => 'استخدام المنصات المناسبة للبلد المناسبة بالسوشيال ميديا مع توفير بلوجر.',
                'market_item_8'          => 'حملات تذوق ومحاولة دعم الجمعيات الخيرية إن أمكن واعلانات طرقية.',
                'market_item_9'          => 'الابتعاد عن الخصومات النقدية وتكون خصومات من المنتجات.',
                'market_item_10'         => 'تواجد بالمعارض الغذائية لزيادة الانتشار وتعريف المجتمع على المنتجات.',
            ],
            images: [
                'principles_image_desktop' => 'front/byun_bekdash2/asset/Main-sate-backgrounds/principles.jpeg',
                'principles_image_mobile'  => 'front/byun_bekdash2/asset/Main-sate-backgrounds/principles-mobile.png',
            ],
            languages: $languages,
        );

        // ---- contact ------------------------------------------------------
        $this->seedPage(
            slug:      'contact',
            template:  'front.bekdash.pages.contact',
            sortOrder: 40,
            content:   [
                'meta_title'         => 'تواصل معنا - بيون بكداش',
                'meta_description'   => 'تواصل مع فريق بيون بكداش - الهاتف، البريد الإلكتروني، والعنوان',
                'contact_hero_title' => 'تواصل معنا',
                'form_title'         => 'أرسل لنا رسالة',
                'form_name_label'    => 'الاسم',
                'form_email_label'   => 'البريد الإلكتروني',
                'form_subject_label' => 'الموضوع',
                'form_message_label' => 'الرسالة',
                'form_submit_label'  => 'إرسال الآن',
                'info_title'         => 'معلومات الاتصال',
                'info_address_label' => 'العنوان',
                'info_address_value' => 'مصر، القاهرة، مدينة العبور',
                'info_phone_label'   => 'الهاتف',
                'info_phone_1'       => '01270297000',
                'info_phone_2'       => '01070297000',
                'info_email_label'   => 'البريد الإلكتروني',
                'info_email_value'   => 'info@byunbekdash.com',
                'info_social_label'  => 'تابعنا على',
                // Success flash text. The controller flashes a boolean only;
                // this key drives the actual rendered message.
                'form_success_message' => 'تم إرسال رسالتك بنجاح. سنتواصل معك قريباً.',
            ],
            images: [
                'contact_hero_bg' => 'front/byun_bekdash2/asset/Main-sate-backgrounds/contact-bg.jpeg',
            ],
            languages: $languages,
        );

        // ---- og_image placeholders --------------------------------------
        // Ensure an og_image row (language_id = NULL, path = NULL) exists for
        // every page so the admin form exposes the upload input. firstOrCreate
        // is idempotent and never overwrites a path that an admin has already
        // uploaded.
        foreach (['home', 'about', 'goals', 'principles', 'contact'] as $slug) {
            $p = Page::where('slug', $slug)->first();
            if (! $p) {
                continue;
            }
            $existing = PageImage::where('page_id', $p->id)
                ->where('key', 'og_image')
                ->whereNull('language_id')
                ->first();
            if (! $existing) {
                PageImage::create([
                    'page_id'     => $p->id,
                    'language_id' => null,
                    'key'         => 'og_image',
                    'path'        => null,
                ]);
            }
        }
    }

    private function seedPage(
        string $slug,
        string $template,
        int $sortOrder,
        array $content,
        array $images,
        $languages
    ): void {
        $page = Page::updateOrCreate(
            ['slug' => $slug],
            [
                'template'     => $template,
                'is_published' => true,
                'sort_order'   => $sortOrder,
            ]
        );

        // Arabic defaults are reused across every language as a starting
        // point; admin will translate per-language later.
        foreach ($languages as $language) {
            PageTranslation::updateOrCreate(
                [
                    'page_id'     => $page->id,
                    'language_id' => $language->id,
                ],
                [
                    'meta_title'       => $content['meta_title']       ?? null,
                    'meta_description' => $content['meta_description'] ?? null,
                    'content_json'     => $content,
                ]
            );
        }

        // language_id = NULL means "applies to every language".
        // Manual idempotency because MySQL UNIQUE indexes don't enforce
        // uniqueness across NULLs.
        foreach ($images as $key => $path) {
            $existing = PageImage::where('page_id', $page->id)
                ->where('key', $key)
                ->whereNull('language_id')
                ->first();

            if ($existing) {
                $existing->update(['path' => $path]);
            } else {
                PageImage::create([
                    'page_id'     => $page->id,
                    'language_id' => null,
                    'key'         => $key,
                    'path'        => $path,
                ]);
            }
        }
    }
}
