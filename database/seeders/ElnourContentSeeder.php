<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Certificate;
use App\Models\Feature;
use App\Models\Generalsetting;
use App\Models\Pagesetting;
use App\Models\Partner;
use App\Models\Service;
use App\Models\SiteStat;
use App\Models\Slider;
use Illuminate\Database\Seeder;

class ElnourContentSeeder extends Seeder
{
    /**
     * Move the hardcoded Elnour Tank frontend content (commit "asd") into the database
     * so it can be managed from the dashboard. Idempotent: safe to re-run, never
     * overwrites admin edits, never deletes rows (stale rows are deactivated once).
     */
    public function run(): void
    {
        $this->copyAssets();
        $this->seedCategories();
        $this->seedServices();
        $this->seedSliders();
        $this->seedPartners();
        $this->seedCertificates();
        $this->seedStats();
        $this->seedFeatures();
        $this->seedPagesettings();
        $this->seedGeneralsettings();
    }

    private function copyAssets(): void
    {
        $map = [
            // Category card images -> categories accessor dir (also fixes the extensionless portable-booths-webp)
            ['assets/images/services/water-tanks.webp', 'assets/images/categories/water-tanks.webp'],
            ['assets/images/services/portable-booths-webp', 'assets/images/categories/portable-booths.webp'],
            ['assets/images/services/traffic-supplies.webp', 'assets/images/categories/traffic-supplies.webp'],
            ['assets/images/services/clubs-kids-area.webp', 'assets/images/categories/clubs-kids-area.webp'],
            ['assets/images/services/plastic-products.webp', 'assets/images/categories/plastic-products.webp'],
            // Product images -> services accessor dir with ASCII names
            ['assets/images/categories/خزان افقي.png', 'assets/images/services/horizontal-tank.png'],
            ['assets/images/categories/راسي.png', 'assets/images/services/vertical-tank.png'],
            ['assets/images/categories/polyethylene-tanks.png', 'assets/images/services/polyethylene-tanks.png'],
            ['assets/images/categories/fiberglass-tanks.png', 'assets/images/services/fiberglass-tanks.png'],
            ['assets/images/categories/خزان ستيل.png', 'assets/images/services/stainless-tank.png'],
            ['assets/images/categories/كشك حراسه.png', 'assets/images/services/guard-booth.png'],
            ['assets/images/categories/حمامات.png', 'assets/images/services/mobile-toilets.png'],
            ['assets/images/services/portable-booths-webp', 'assets/images/services/caravans.webp'],
            ['assets/images/categories/حواجز مرور.png', 'assets/images/services/traffic-barriers.png'],
            ['assets/images/categories/قمع مرور.png', 'assets/images/services/traffic-cones.png'],
            ['assets/images/categories/احواض زرع.png', 'assets/images/services/planters.png'],
            ['assets/images/categories/شازلونج.png', 'assets/images/services/chaise-lounge.png'],
            ['assets/images/categories/ممر عائم.png', 'assets/images/services/floating-walkway.png'],
            ['assets/images/categories/مقاعد بلاستيك.png', 'assets/images/services/plastic-seats.png'],
            ['assets/images/categories/هزاز اطفالي.png', 'assets/images/services/kids-rocking-chair.png'],
            ['assets/images/categories/ترابيزات.png', 'assets/images/services/tables.png'],
            ['assets/images/categories/كراسي.png', 'assets/images/services/chairs-stool.png'],
            ['assets/images/categories/بالته.png', 'assets/images/services/pallets.png'],
            ['assets/images/categories/ايس كريم.png', 'assets/images/services/ice-box.png'],
            ['assets/images/categories/سلة قمامة.png', 'assets/images/services/trash-bins.png'],
            // Home products slider -> slider accessor dir
            ['assets/images/about/منتجاتنا1.webp', 'assets/images/slider/products-slide-1.webp'],
            ['assets/images/about/منتجاتنا2.webp', 'assets/images/slider/products-slide-2.webp'],
            ['assets/images/about/منتجاتنا3.webp', 'assets/images/slider/products-slide-3.webp'],
            // Clients logos -> partners accessor dir
            ['assets/images/about/steel.webp', 'assets/images/partners/steel.webp'],
            ['assets/images/about/ennpi.webp', 'assets/images/partners/ennpi.webp'],
            ['assets/images/about/misr-elkhair.webp', 'assets/images/partners/misr-elkhair.webp'],
            ['assets/images/about/tmg.webp', 'assets/images/partners/tmg.webp'],
            ['assets/images/about/damac.webp', 'assets/images/partners/damac.webp'],
            ['assets/images/about/besix.webp', 'assets/images/partners/besix.webp'],
            ['assets/images/about/m-f.webp', 'assets/images/partners/m-f.webp'],
            // Certificates -> certificates accessor dir
            ['assets/images/home/cert-1.png', 'assets/images/certificates/cert-1.png'],
            ['assets/images/home/cert-2.png', 'assets/images/certificates/cert-2.png'],
            ['assets/images/home/cert-3.png', 'assets/images/certificates/cert-3.png'],
            ['assets/images/home/cert-4.png', 'assets/images/certificates/cert-4.png'],
            ['assets/images/home/cert-5.png', 'assets/images/certificates/cert-5.png'],
            ['assets/images/home/cert-6.png', 'assets/images/certificates/cert-6.png'],
            ['assets/images/home/cert-7.png', 'assets/images/certificates/cert-7.png'],
            ['assets/images/home/cert-8.png', 'assets/images/certificates/cert-8.png'],
            // Flip card images -> features accessor dir
            ['assets/images/about/الشركة.webp', 'assets/images/features/company.webp'],
            ['assets/images/about/team.webp', 'assets/images/features/team.webp'],
            ['assets/images/about/تقنيات حديثة.webp', 'assets/images/features/technology.webp'],
            // Page-settings images -> assets/images root (Pagesetting upload dir)
            ['assets/images/about/hero-des.png', 'assets/images/hero-des.png'],
            ['assets/images/about/hero-mob.png', 'assets/images/hero-mob.png'],
            ['assets/images/about/about-nour.webp', 'assets/images/about-nour.webp'],
            ['assets/images/about/about-hero.webp', 'assets/images/about-hero.webp'],
            ['assets/images/about/about1.png', 'assets/images/about1.png'],
        ];

        foreach (['assets/images/features', 'assets/images/service_sections', 'assets/images/slider', 'assets/images/partners', 'assets/images/certificates'] as $dir) {
            if (!is_dir(public_path($dir))) {
                @mkdir(public_path($dir), 0755, true);
            }
        }

        foreach ($map as [$from, $to]) {
            $source = public_path($from);
            $target = public_path($to);
            if (file_exists($source) && !file_exists($target)) {
                @copy($source, $target);
            }
        }
    }

    private function seedCategories(): void
    {
        $categories = [
            [
                'slug'         => 'خزانات-المياه',
                'title'        => 'خزانات المياه',
                'icon'         => 'fa-solid fa-water',
                'photo'        => 'water-tanks.webp',
                'short'        => 'خزانات مياه عالية الجودة بمختلف الأنواع والمقاسات، تشمل الخزانات الرأسية والأفقية والبولي إيثيلين والفيبر جلاس والاستانلس ستيل.',
                'details'      => 'اكتشف أنواع خزانات المياه المتنوعة من النور تانك بمقاسات وخامات مختلفة.',
                'sort'         => 1,
                'home_sort'    => 3,
            ],
            [
                'slug'         => 'أكشاك-وحمامات-متنقلة',
                'title'        => 'أكشاك وحمامات متنقلة',
                'icon'         => 'fa-solid fa-house',
                'photo'        => 'portable-booths.webp',
                'short'        => 'حلول عملية للمواقع والشركات والنوادي، تشمل أكشاك الحراسة والحمامات المتنقلة والكرفانات بمقاسات متعددة.',
                'details'      => 'حلول متنقلة عملية للمواقع والشركات والنوادي بمقاسات وتصميمات متعددة.',
                'sort'         => 2,
                'home_sort'    => 1,
            ],
            [
                'slug'         => 'مستلزمات-المرور',
                'title'        => 'مستلزمات المرور',
                'icon'         => 'fa-solid fa-road-barrier',
                'photo'        => 'traffic-supplies.webp',
                'short'        => 'منتجات مخصصة لتنظيم المرور وتعزيز السلامة، مثل الحواجز المرورية وأقماع المرور والمنتجات التحذيرية.',
                'details'      => 'منتجات لتنظيم المرور وتعزيز السلامة في الطرق والمواقع المختلفة.',
                'sort'         => 3,
                'home_sort'    => 2,
            ],
            [
                'slug'         => 'تجهيز-النوادي-والكيدز-اريا',
                'title'        => 'تجهيز النوادي والكيدز اريا',
                'icon'         => 'fa-solid fa-umbrella-beach',
                'photo'        => 'clubs-kids-area.webp',
                'short'        => 'تجهيزات عملية للنوادي ومناطق الأطفال، تشمل أحواض الزرع والشازلونج والمقاعد والترابيزات والمنتجات المتنوعة.',
                'details'      => 'تجهيزات متنوعة للنوادي ومناطق الأطفال والمساحات الخارجية.',
                'sort'         => 4,
                'home_sort'    => 4,
            ],
            [
                'slug'         => 'منتجات-بلاستيكية-متنوعة',
                'title'        => 'منتجات بلاستيكية متنوعة',
                'icon'         => 'fa-solid fa-boxes-stacked',
                'photo'        => 'plastic-products.webp',
                'short'        => 'منتجات بلاستيكية متعددة الاستخدامات، مثل البالتات والآيس بوكس وحاويات وسلات القمامة والمنتجات الصناعية.',
                'details'      => 'منتجات بلاستيكية متعددة الاستخدامات للاستخدامات المنزلية والتجارية والصناعية.',
                'sort'         => 5,
                'home_sort'    => 5,
            ],
        ];

        // First run only: hide legacy rows (previous client site) so the menus show only Elnour content.
        if (!Category::where('slug_ar', 'خزانات-المياه')->exists()) {
            Category::query()->update(['is_active' => 0]);
        }

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug_ar' => $category['slug']],
                [
                    'title_ar'         => $category['title'],
                    'title_en'         => $category['title'],
                    'slug_en'          => $category['slug'],
                    'icon'             => $category['icon'],
                    'photo'            => $category['photo'],
                    'short_details_ar' => $category['short'],
                    'short_details_en' => $category['short'],
                    'details_ar'       => $category['details'],
                    'details_en'       => $category['details'],
                    'sort_order'       => $category['sort'],
                    'home_sort_order'  => $category['home_sort'],
                    'is_active'        => 1,
                ]
            );
        }
    }

    private function seedServices(): void
    {
        $products = [
            'خزانات-المياه' => [
                ['خزانات مياه أفقية', 'خزانات-مياه-أفقية', 'horizontal-tank.png'],
                ['خزانات مياه رأسية', 'خزانات-مياه-رأسية', 'vertical-tank.png'],
                ['خزانات بولي إيثيلين', 'خزانات-البولي-إيثيلين', 'polyethylene-tanks.png'],
                ['خزانات فيبر جلاس', 'خزانات-الفيبر-جلاس', 'fiberglass-tanks.png'],
                ['خزانات استانلس ستيل', 'خزانات-الاستانلس-ستيل', 'stainless-tank.png'],
            ],
            'أكشاك-وحمامات-متنقلة' => [
                ['أكشاك حراسة', 'أكشاك-حراسة', 'guard-booth.png'],
                ['حمامات متنقلة', 'حمامات-متنقلة', 'mobile-toilets.png'],
                ['كرفانات', 'كرفانات', 'caravans.webp'],
            ],
            'مستلزمات-المرور' => [
                ['حواجز مرورية', 'حواجز-مرورية', 'traffic-barriers.png'],
                ['أقماع مرور', 'أقماع-مرور', 'traffic-cones.png'],
            ],
            'تجهيز-النوادي-والكيدز-اريا' => [
                ['أحواض الزرع', 'أحواض-الزرع', 'planters.png'],
                ['شازلونج', 'شازلونج', 'chaise-lounge.png'],
                ['ممر عائم', 'ممر-عائم', 'floating-walkway.png'],
                ['مقاعد بلاستيك', 'مقاعد-بلاستيك', 'plastic-seats.png'],
                ['كراسي هزاز أطفالي', 'كراسي-هزاز-أطفالي', 'kids-rocking-chair.png'],
                ['ترابيزات قهوة وسفرة', 'ترابيزات-قهوة-وسفرة', 'tables.png'],
                ['كراسي و طقطوقة', 'طقطوقة', 'chairs-stool.png'],
            ],
            'منتجات-بلاستيكية-متنوعة' => [
                ['بالتات', 'بالتات', 'pallets.png'],
                ['آيس بوكس', 'آيس-بوكس', 'ice-box.png'],
                ['حاويات وسلات قمامة', 'حاويات-وسلات-قمامة', 'trash-bins.png'],
            ],
        ];

        // First run only: hide legacy services that are not part of the new taxonomy.
        if (!Service::where('slug_ar', 'خزانات-مياه-أفقية')->exists()) {
            $newSlugs = collect($products)->flatten(1)->pluck(1)->all();
            Service::whereNotIn('slug_ar', $newSlugs)->update(['is_active' => 0]);
        }

        foreach ($products as $categorySlug => $items) {
            $category = Category::where('slug_ar', $categorySlug)->first();
            foreach ($items as $index => [$title, $slug, $photo]) {
                Service::updateOrCreate(
                    ['slug_ar' => $slug],
                    [
                        'title_ar'    => $title,
                        'title_en'    => $title,
                        'slug_en'     => $slug,
                        'photo'       => $photo,
                        'category_id' => $category?->id,
                        'parent_id'   => 0,
                        'sort_order'  => $index + 1,
                        'is_active'   => 1,
                    ]
                );
            }
        }
    }

    private function seedSliders(): void
    {
        if (!Slider::where('photo', 'products-slide-1.webp')->exists()) {
            Slider::query()->update(['is_active' => 0]);
        }

        foreach (['products-slide-1.webp', 'products-slide-2.webp', 'products-slide-3.webp'] as $index => $photo) {
            Slider::firstOrCreate(
                ['photo' => $photo],
                [
                    'title_ar'   => 'منتجاتنا',
                    'title_en'   => 'منتجاتنا',
                    'sort_order' => $index + 1,
                    'is_active'  => 1,
                ]
            );
        }
    }

    private function seedPartners(): void
    {
        $clients = [
            ['steel.webp', 'Egyptian Steel'],
            ['ennpi.webp', 'Enppi'],
            ['misr-elkhair.webp', 'Misr El Kheir'],
            ['tmg.webp', 'TMG'],
            ['damac.webp', 'Damac'],
            ['besix.webp', 'Besix'],
            ['m-f.webp', 'Madaar'],
        ];

        if (!Partner::where('photo', 'steel.webp')->exists()) {
            Partner::query()->update(['is_active' => 0]);
        }

        foreach ($clients as $index => [$photo, $name]) {
            Partner::firstOrCreate(
                ['photo' => $photo],
                [
                    'title_ar'   => $name,
                    'title_en'   => $name,
                    'sort_order' => $index + 1,
                    'is_active'  => 1,
                ]
            );
        }
    }

    private function seedCertificates(): void
    {
        if (!Certificate::where('photo', 'cert-1.png')->exists()) {
            Certificate::query()->update(['is_active' => 0]);
        }

        for ($i = 1; $i <= 8; $i++) {
            Certificate::firstOrCreate(
                ['photo' => "cert-{$i}.png"],
                [
                    'title_ar'   => "شهادة {$i}",
                    'title_en'   => "Certificate {$i}",
                    'sort_order' => $i,
                    'is_active'  => 1,
                ]
            );
        }
    }

    private function seedStats(): void
    {
        $stats = [
            // Homepage hero bottom cards
            ['home_hero', 'fas fa-shield-alt', '100%', 'جودة مضمونة', 1],
            ['home_hero', 'fas fa-users', '5000+', 'عميل راضٍ', 2],
            ['home_hero', 'fas fa-award', '10+', 'سنوات خبرة', 3],
            ['home_hero', 'fas fa-tint', '100%', 'مواد آمنة', 4],
            // Homepage about-preview mini tiles
            ['home_about', null, '10+', 'سنوات خبرة', 1],
            ['home_about', null, '5000+', 'عميل', 2],
            ['home_about', null, '100%', 'جودة', 3],
            // About page stats strip
            ['about_page', null, '10+', 'عام خبرة', 1],
            ['about_page', null, '99.7%', 'رضا العملاء', 2],
            ['about_page', null, '45+', 'منتج متنوع', 3],
            ['about_page', null, '24/7', 'خدمة الدعم', 4],
        ];

        foreach ($stats as [$section, $icon, $value, $label, $sort]) {
            SiteStat::firstOrCreate(
                ['section' => $section, 'title_ar' => $label],
                [
                    'icon'       => $icon,
                    'value'      => $value,
                    'title_en'   => $label,
                    'sort_order' => $sort,
                    'is_active'  => 1,
                ]
            );
        }
    }

    private function seedFeatures(): void
    {
        $features = [
            // Homepage flip cards (details = one bullet per line)
            ['home_flip', 'company.webp', 'fas fa-handshake', 'الشركة', "شركة نور تانك للصناعات البلاستيكية من الشركات الرائدة في تصنيع خزانات المياه.\nنلتزم بتقديم منتجات موثوقة وآمنة تلبي احتياجات العملاء.\nرؤيتنا أن نكون الاختيار الأول في حلول تخزين المياه.", 1],
            ['home_flip', 'team.webp', 'fas fa-users', 'فريق العمل', "لدينا فريق من المهندسين والفنيين ذوي الخبرة والكفاءة العالية.\nنعمل بروح واحدة لتحقيق الجودة والدقة في كل مرحلة من مراحل التصنيع.\nنؤمن أن العنصر البشري هو أساس النجاح والابتكار.", 2],
            ['home_flip', 'technology.webp', 'fas fa-industry', 'تقنيات حديثة', "نستخدم أحدث التقنيات والمعدات في عمليات التصنيع.\nنحرص على التطوير المستمر لمواكبة أعلى معايير الجودة.\nمنتجاتنا مصممة لتدوم طويلاً وتتحمل مختلف الظروف.", 3],
            // About page values cards (icon = lucide icon name)
            ['about_values', null, 'award', 'جودة مضمونة', 'جميع الخزانات مصنوعة من خامات معتمدة ومعالجة غذائيًا لتخزين مياه الشرب بشكل آمن.', 1],
            ['about_values', null, 'target', 'التزام وموثوقية', 'نحرص على تسليم منتجاتنا في المواعيد المحددة مع متابعة مستمرة لما بعد البيع.', 2],
            ['about_values', null, 'users', 'عملاء سعداء', 'نفتخر بوجود آلاف العملاء الراضين عن منتجاتنا داخل مصر وخارجها.', 3],
            ['about_values', null, 'lightbulb', 'ابتكار وتطوير', 'نواكب أحدث التقنيات العالمية في صناعة الخزانات ونطور منتجاتنا باستمرار.', 4],
            // About page product-features checklist
            ['about_checklist', null, null, 'خامات عالية الجودة', null, 1],
            ['about_checklist', null, null, 'مقاومة للصدأ والتآكل', null, 2],
            ['about_checklist', null, null, 'تصميم آمن وصحي', null, 3],
            ['about_checklist', null, null, 'سهولة النقل والتركيب', null, 4],
        ];

        foreach ($features as [$section, $photo, $icon, $title, $details, $sort]) {
            Feature::firstOrCreate(
                ['section' => $section, 'title_ar' => $title],
                [
                    'photo'      => $photo,
                    'icon'       => $icon,
                    'title_en'   => $title,
                    'details_ar' => $details,
                    'details_en' => $details,
                    'sort_order' => $sort,
                    'is_active'  => 1,
                ]
            );
        }
    }

    private function seedPagesettings(): void
    {
        $ps = Pagesetting::find(1);
        if (!$ps) {
            return;
        }

        $values = [
            'home_hero_title'          => ' أفضل شركة خزانات مياه في مصر',
            'home_hero_cta_text'       => 'تواصل معنا',
            'home_about_badge'         => 'من نحن',
            'home_about_cta_text'      => 'اقرأ المزيد',
            'home_cards_title'         => 'استثمار يدوم... وجودة تثق بها',
            'home_cards_details'       => 'منتجات مصممة لتتحمل أقسى الظروف، وتوفر أعلى مستويات الأمان والكفاءة.',
            'home_cards_cta_text'      => 'المزيد عن نور تانك',
            'home_clients_badge'       => 'شركاء النجاح',
            'home_clients_title'       => 'عملاؤنا',
            'home_clients_details'     => 'نفخر بثقة كبرى الشركات والمؤسسات في منتجات النور تانك وخدماتها.',
            'home_products_badge'      => 'خدماتنا ومنتجاتنا',
            'home_products_title'      => 'منتجاتنا',
            'home_products_details'    => 'نقدم حلول متكاملة لتخزين المياه والمنتجات المصنوعة من أجود الخامات وبأعلى معايير الجودة.',
            'home_products_cta_text'   => 'عرض جميع المنتجات',
            'certificates_title'       => 'شهادات الجودة والاعتمادات',
            'certificates_subtitle'    => 'نفتخر بحصولنا على شهادات معتمدة تثبت جودة منتجاتنا وفقًا لأعلى المعايير العالمية.',
            'certificates_description' => 'اكتشف الشهادات التي حصلنا عليها من جهات موثوقة مثل وزارة الصحة والسكان، الهيئة العامة للتنمية الصناعية، والمركز القومي للبحوث. هذه الشهادات تؤكد التزامنا بالجودة والاعتمادية في كل منتج نقدمه.',
            'home_contact_badge'       => 'تواصل معنا',
            'home_contact_title'       => 'جاهزون للرد على استفسارك',
            'home_contact_details'     => 'فريق النور تانك هنا لمساعدتك في اختيار المنتج المناسب والإجابة على جميع أسئلتك.',
            'about_hero_badge'         => 'شركة النور لخزانات المياه',
            'about_hero_title'         => 'من نحن',
            'about_hero_details'       => 'خبرة وجودة وثقة في صناعة خزانات المياه بأعلى معايير الأمان.',
            'about_badge'              => 'نبذة عن الشركة',
            'about_features_title'     => 'ما يميز منتجاتنا',
            'mission_title'            => 'رسالتنا',
            'mission_details'          => 'أن نكون الرواد في مجال صناعة خزانات المياه والحلول المتكاملة لتخزين المياه والمواد، مع توفير منتجات آمنة، صحية، وبأسعار في متناول الجميع.',
        ];

        $images = [
            'home_hero_image'        => 'hero-des.png',
            'home_hero_image_mobile' => 'hero-mob.png',
            'home_about_image'       => 'about-nour.webp',
            'about_hero_image'       => 'about-hero.webp',
            'about_side_image'       => 'about1.png',
        ];

        $raw = $ps->getAttributes();

        foreach ($values as $key => $value) {
            foreach (['_ar', '_en'] as $suffix) {
                $column = $key . $suffix;
                if (array_key_exists($column, $raw) ? empty($raw[$column]) : true) {
                    $ps->{$column} = $value;
                }
            }
        }

        foreach ($images as $column => $filename) {
            if (empty($raw[$column] ?? null)) {
                $ps->{$column} = $filename;
            }
        }

        $ps->save();
    }

    private function seedGeneralsettings(): void
    {
        $gs = Generalsetting::find(1);
        if (!$gs) {
            return;
        }

        $values = [
            'catalog_file'           => 'catalog1.pdf',
            'catalog_file_mobile'    => 'catalog1_mobile_.pdf',
            'catalog_label_ar'       => 'تحميل كتالوج PDF',
            'catalog_label_en'       => 'تحميل كتالوج PDF',
            'catalog_label_short_ar' => 'كتالوج PDF',
            'catalog_label_short_en' => 'كتالوج PDF',
            'analytics_id'           => 'G-CFB5B13HTJ',
            'google_verification'    => 'ZcfPDEqhHasKzuMSstRL9kFRO_WINOX_n3xaSjXTMWk',
            'working_days_ar'        => 'طوال أيام الأسبوع',
            'working_days_en'        => 'طوال أيام الأسبوع',
            'working_hours_ar'       => 'من 9 صباحاً حتى 10 مساءً',
            'working_hours_en'       => 'من 9 صباحاً حتى 10 مساءً',
            'map_link'               => 'https://maps.app.goo.gl/rq4VFn4fLJr2vsKf8',
            'copyright_ar'           => 'شركة النور لخزانات المياه. جميع الحقوق محفوظة.',
            'copyright_en'           => 'شركة النور لخزانات المياه. جميع الحقوق محفوظة.',
        ];

        $raw = $gs->getAttributes();

        foreach ($values as $column => $value) {
            if (empty($raw[$column] ?? null)) {
                $gs->{$column} = $value;
            }
        }

        $gs->save();
    }
}
