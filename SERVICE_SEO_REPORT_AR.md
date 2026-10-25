تم تنفيذ تحسينات SEO للخدمات داخل المشروع واختبارها محلياً. لم تُنفذ migrations على قاعدة التطبيق أو الإنتاج، ولم يُستورد ملف SQL أو تُعدَّل بياناته. الفهرسة لدى Google ليست مضمونة.

1. **الفحص والمشكلات المكتشفة**

   المشروع Laravel 10.48.14، ومتطلب Composer هو PHP ‎^8.1. استُخدم PHP 8.1.10 في الاختبارات. فُحص جدول `services` في ملف `abdelrhmanshams_laravel_db.sql` المرفق، والنماذج والمتحكمات والمسارات والقوالب والصلاحيات وملفات الزحف والاختبارات. ترتبط الخدمات بالتصنيفات ومعرض الصور، ولها حقول محتوى وروابط عربية وإنجليزية وفرنسية. المسارات العامة الحالية تدعم العربية دون بادئة والإنجليزية تحت `/en`؛ لم يُضف مسار فرنسي جديد.

   كانت حقول SEO محفوظة لكنها لا تُستخدم في رأس صفحة الخدمة؛ وكانت بيانات المشاركة عامة، وOG URL يشير للرئيسية، والوصف غير موجود للخدمات. وُجد أيضاً OG image إضافي في قسم `gsearch`، وخريطة ثابتة بتواريخ قديمة، وتحويلات روابط مؤقتة، وعدم وجود حالة نشر أو سجل للروابط السابقة، وغياب التحقق المناسب من مدخلات SEO.

2. **ما أُعيد استخدامه وما كان مفقوداً**

   أُعيد استخدام `meta_title_ar/en/fr` و`meta_details_ar/en/fr` بوصفها حقول الوصف، و`slug_ar/en/fr` دون إنشاء `meta_description` أو `seo_slug` مكررين. أُبقيت تبويبات اللغات ورفع الصور وتصميم لوحة الإدارة والمصادقة و`permissions:services`. لم توجد حزمة SEO أو آلية sitemap ديناميكية تستدعي إضافة حزمة. لم تُضف تبعية جديدة.

3. **قاعدة البيانات**

   migration جديد: `database/migrations/2026_10_25_000001_add_service_social_metadata.php`.

   يضيف `og_title_*` و`og_description_*` للغات الثلاث، و`og_image` nullable، و`is_published` بقيمة افتراضية true للحفاظ على ظهور الخدمات الموجودة. ويضيف جدول `service_slug_redirects` لتسجيل الروابط السابقة حسب اللغة والخدمة. توجد عملية rollback تعكس هذه الإضافات؛ rollback يفقد بيانات الحقول الجديدة وسجل التحويلات، ولذلك تُؤخذ نسخة احتياطية قبل أي تراجع.

   الاختبارات طبقت migration على SQLite في الذاكرة فقط. يلزم تطبيقه على قاعدة النشر قبل تشغيل النسخة الجديدة. لا توجد إعادة إنشاء لجدول الخدمات أو إعادة توليد جماعية للروابط أو حذف للسجلات الحالية.

4. **لوحة الإدارة**

   أُضيف قسم عربي لإعدادات المشاركة وحالة النشر إلى الإنشاء والتعديل. تُحمّل القيم المحفوظة، وتبقى حقول العنوان والوصف والرابط في تبويباتها الحالية. تُرسل أخطاء التحقق بصيغة JSON المستخدمة أصلاً في النموذج. تُقبل صور JPG/PNG/GIF/WebP حتى 5 MB، وتُحفظ صورة OG باسم UUID داخل مجلد صور الخدمات. عدم رفع صورة جديدة يحافظ على الصورة السابقة، وعدم إرسال حقل SEO أو slug أثناء تحديث جزئي يحافظ على قيمته.

   تُرفض أنواع المدخلات غير الصحيحة والروابط غير الصالحة والتكرارات والروابط المحجوزة لتحويلات خدمة أخرى. توصيات 60 حرفاً للعنوان و160 للوصف مكتوبة كإرشادات، وليست حدود حفظ إلزامية. العدادات والمعاينة التفاعلية الاختيارية لم تُضف.

5. **مخرجات الواجهة**

   تُولد Blade عنواناً ووصفاً وcanonical وOG وTwitter لكل خدمة، مع escaping لقيم HTML. عند غياب عنوان SEO يُستخدم عنوان الخدمة واسم الموقع، وعند غياب الوصف يُستخرج نص نظيف من المحتوى المختصر ثم الكامل مع إزالة HTML وتوحيد المسافات والاختصار. المشاركة ترث هذه القيم عند غياب تخصيصها، والصورة تتدرج من OG إلى صورة الخدمة إلى شعار الموقع المتاح. الروابط المطلقة تعتمد `config('app.url')`.

   أُزيل OG image المكرر من قالب الخدمة، وعُزل فرع الخدمة داخل layout باستخدام اسم المسار حتى لا يؤثر متغير حلقة باسم `$service` في رؤوس المقالات أو الصفحات الأخرى. أُضيف alt لصورة الخدمة وروابط مباشرة لجميع الخدمات العامة في صفحة القائمة باستخدام نمط البطاقات الحالي. الاختبار الكامل يثبت وجود H1 رئيسي واحد؛ لم تظهر H1 داخل محتوى الخدمات في SQL المرفق.

6. **النشر والزحف والخريطة**

   scope في نموذج Service يستبعد غير المنشور من الاستعلامات خارج مسارات الإدارة، ويشمل ذلك قوائم الواجهة وعلاقات التصنيفات واستعلامات API الحالية. الإدارة تظل قادرة على إدارة المسودات. الخدمة غير المنشورة تعيد 404 عند طلب رابطها العام.

   نُقلت الخريطة الثابتة من `public/sitemap.xml` إلى `resources/seo/sitemap-base.xml`. المسار نفسه `/sitemap.xml` أصبح ديناميكياً: يحتفظ بالمدخلات السابقة للصفحات والمقالات والتصنيفات، ويزيل مدخلات تفاصيل الخدمات القديمة، ثم يضيف الخدمات المنشورة ذات slug للغات العامة المفعلة. تُقرأ البيانات عند كل طلب، ويأتي `lastmod` من `updated_at` الفعلي عند توفره، ويُعاد `application/xml; charset=UTF-8`. لا توجد طبقة cache جديدة لبيانات SEO.

   نُقلت نسخة robots الأصلية إلى `resources/seo/robots-original.txt`، وأصبح `/robots.txt` يعيد نصاً ديناميكياً يحافظ على قواعد الاستعلامات وcgi-bin، ويضيف منع زحف `/admin/` و`/api/` وإعلان خريطة على النطاق المضبوط. robots لا يحل محل المصادقة، والخدمات العامة غير محظورة. لا تُضاف noindex للخدمات المنشورة، ولذلك لم تُضف خانة meta_robots غير لازمة.

7. **Canonical والتحويلات والبيانات المنظمة**

   canonical يستخدم نطاق التطبيق وslug اللغة دون query parameters أو شرطة مائلة نهائية. اختلاف النطاق أو المسار أو slug السابق يحول إلى العنوان المعتمد بـ301. تحويل HTTP إلى HTTPS أصبح 301 لصفحات تفاصيل الخدمات فقط، مع إبقاء سلوك بقية المسارات. تحويل www الموجود في إعدادات Apache لم يُعدل. تُحفظ تغييرات slug المستقبلية وتُحل إلى الخدمة الحالية؛ لم تُختلق روابط تاريخية غير معروفة. حفظ التحديث وسجل التحويل داخل معاملة واحدة في متحكم الإدارة.

   أُضيف JSON-LD من النوع Service بالاسم والوصف والرابط واسم المؤسسة ورابطها الموجودين فعلياً، دون تقييمات أو أسعار أو عناوين مخترعة. ترميز JSON_HEX يحمي سياق script. لا يُكرر فرع المؤسسة العام على صفحة الخدمة.

8. **الملفات المعدلة والمضافة**

   - `app/Models/Service.php`
   - `app/Support/ServiceSeo.php`
   - `app/Support/ServiceSeoValidation.php`
   - `app/Http/Controllers/Admin/ServiceController.php`
   - `app/Http/Controllers/HomeController.php` — تعديلات محدودة في مساري تفاصيل الخدمة فقط؛ حالة الدمج السابقة في Git لم تُحل أو تُسجل.
   - `app/Http/Controllers/SeoController.php`
   - `app/Http/Middleware/HTTPSConnection.php`
   - `database/migrations/2026_10_25_000001_add_service_social_metadata.php`
   - `resources/views/admin/services/create.blade.php`
   - `resources/views/admin/services/edit.blade.php`
   - `resources/views/admin/services/seo-settings.blade.php`
   - `resources/views/front/details-service.blade.php`
   - `resources/views/front/services.blade.php`
   - `resources/views/front/partials/service-seo.blade.php`
   - `resources/views/layouts/front.blade.php`
   - `routes/front.php`
   - نقل `public/sitemap.xml` و`public/robots.txt` إلى ملفات المصدر المذكورة أعلاه لتصل الطلبات إلى Laravel.
   - `tests/Feature/ServiceSeoTest.php`
   - هذا التقرير.

9. **الاختبارات والنتائج**

   نجح 14 اختباراً بإجمالي 85 assertion: 13 اختبار خدمات جديداً والاختبار الوحدوي الموجود. تشمل الإنشاء والتعديل والحفظ وعدم مسح القيم غير المرسلة، الخدمة دون SEO، اللغات، fallback، العنوان والوصف وcanonical، OG/Twitter وJSON-LD، escaping وعدم تكرار الوسوم في HTML الكامل، HTTP 200 للخدمة العامة و404 للمسودة، تحديث الخريطة واستبعاد المسودات والمدخلات القديمة وحفظ صفحاتها الأخرى، robots، الروابط الحالية والتاريخية و301 والنطاق وtrailing slash، رفض الضيف ومن لا يملك صلاحية الخدمات والسماح للمسؤول، التحقق من المدخلات ورفع صورة OG، وعدم تغير فرع رأس المقالة.

   أمر التشغيل في هذه البيئة من PowerShell:

   ```powershell
   & 'C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe' -d extension=pdo_sqlite vendor/phpunit/phpunit/phpunit tests/Feature/ServiceSeoTest.php tests/Unit --no-coverage
   ```

   بيانات الاختبار داخل SQLite `:memory:`؛ ملفات Blade المترجمة للاختبار داخل مجلد مؤقت مستقل. لم يُشغل اختبار الصفحة الرئيسية القديم المعتمد على قاعدة التطبيق. نجح PHP syntax lint للملفات البرمجية المتغيرة، وLaravel Pint للملفات الجديدة، و`git diff --check`. لا يوجد إعداد تحليل ساكن إضافي في المشروع. توجد ملاحظة PHPUnit سابقة عن XML schema قديم، وملاحظات PHP سابقة عن ترتيب معاملات اختيارية في دوال أخرى داخل HomeController؛ لم تُوسع التعديلات إلى تلك الدوال غير المتعلقة بالخدمات.

10. **الحدود وما لم يُتحقق منه على الإنتاج**

    لا يوجد وصول إلى Search Console أو بيئة الإنتاج ضمن العمل. لا يُعد نجاح SQLite إثباتاً لتطبيق migration على MySQL الإنتاج، ولا لاختبار Apache/TLS/CDN أو cache خارجي. لم يُنفذ فحص متصفح بصري أو نشر فعلي. يجب التأكد من `APP_URL` الموجود وإعدادات proxy وHTTPS في بيئة النشر؛ لم يُعدل ملف `.env`. بقي `HomeController.php` في حالة Git `UU` التي كانت موجودة قبل العمل، رغم خلو النسخة العاملة من علامات conflict ونجاح اختبارها. تُراجع حالة الدمج قبل إعداد commit للنشر.

11. **خطوات النشر الآمن**

    خذ نسخة احتياطية من القاعدة والملفات، راجع diff وحالة الدمج، ثم اختبر على staging بقاعدة مماثلة للإنتاج. أثناء نافذة نشر مناسبة ارفع التعديلات، وطبّق migration المحدد قبل إعادة استقبال الزيارات. تأكد من إزالة نسختي `public/sitemap.xml` و`public/robots.txt` القديمتين من الخادم حتى لا تتجاوزا المسارات الديناميكية. يجب بقاء ملف الخريطة المصدر داخل `resources/seo`. تحقق من صلاحية كتابة مجلد `public/assets/images/services`.

    الأوامر التالية تعليمات للنشر ولم تُنفذ على الإنتاج؛ يتطلب تنفيذ migration الإنتاج موافقتك الصريحة:

    ```bash
    php artisan migrate --path=database/migrations/2026_10_25_000001_add_service_social_metadata.php --force
    php artisan optimize:clear
    ```

    استخدام `--path` يمنع تشغيل migrations قديمة غير مرتبطة بهذه المهمة. بعد النشر افحص إنشاء/تعديل خدمة، تبديل النشر، الرابط السابق، المصدر الخام، الخريطة وrobots. امسح cache خارجي للخدمات والخريطة إن كانت البنية التشغيلية تستخدمه. لا تستخدم migrate:fresh أو refresh أو reset.

12. **أمثلة قابلة للمراجعة**

    مثال رابط موجود في الخريطة الأصلية: `https://abdelrhmanshams.com/en/services/implantation-icl`؛ هذا مثال من ملفات المشروع وليس نتيجة فحص حي.

    مثال مبسط من بيانات الاختبارات على `https://example.test/services/eye-care-ar`:

    ```html
    <title>Individual SEO title</title>
    <meta name="description" content="Individual description">
    <link rel="canonical" href="https://example.test/services/eye-care-ar">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Individual SEO title">
    <meta property="og:description" content="Individual description">
    <meta property="og:url" content="https://example.test/services/eye-care-ar">
    <meta property="og:image" content="https://example.test/assets/images/services/eye.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Individual SEO title">
    <meta name="twitter:description" content="Individual description">
    <meta name="twitter:image" content="https://example.test/assets/images/services/eye.jpg">
    ```

    المثال يختصر عناصر charset وviewport وJSON-LD وCSS الموجودة أيضاً في الرأس الفعلي. مثال مدخل الخريطة:

    ```xml
    <url>
      <loc>https://example.test/services/eye-care-ar</loc>
      <lastmod>2026-10-25T00:00:00+00:00</lastmod>
    </url>
    ```

    تاريخ المثال توضيحي؛ الناتج الفعلي يستخدم وقت تحديث السجل. افتح View Page Source للخدمة وابحث عن title وdescription وcanonical وog: وtwitter: وapplication/ld+json. يجب ظهور البيانات دون تنفيذ JavaScript، ويجب أن تكون canonical واحدة وخالية من معاملات التتبع. قارن خدمتين للتأكد من اختلاف البيانات، وافحص 404 للمسودة وعدم وجودها في sitemap أو القائمة.

13. **Google Search Console بعد النشر**

    استخدم خاصية الموقع المثبتة ملكيتها للنطاق المعتمد، أو أثبت ملكية Domain property عبر DNS حسب تعليمات Search Console؛ وجود verification meta قديم في القالب لا يثبت صلاحية حسابك الحالي. افتح URL Inspection للرابط المعتمد، ثم Test Live URL، وافحص HTTP والوصول للزاحف والمحتوى وcanonical الذي تختاره Google مقارنة بالمعلن. اطلب Request Indexing للرابط بعد نجاح الفحص. أرسل `sitemap.xml` عبر تقرير Sitemaps وتابع الأخطاء ووقت القراءة، ثم راقب تقارير الفهرسة خلال الفترة التالية.

    المراجع الرسمية: [فحص الرابط](https://support.google.com/webmasters/answer/9012289)، [إنشاء وإرسال الخريطة](https://developers.google.com/search/docs/crawling-indexing/sitemaps/build-sitemap)، [طلب إعادة الزحف](https://developers.google.com/search/docs/crawling-indexing/ask-google-to-recrawl). إرسال الخريطة أو طلب الزحف لا يضمن الفهرسة أو ترتيباً محدداً.
