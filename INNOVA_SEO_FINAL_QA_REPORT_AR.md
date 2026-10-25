# تقرير الفحص النهائي لاعتماد الترجمة وSEO الخدمات

التاريخ: 25 أكتوبر 2026. الفرع: `innova`. المشروع: `C:\laragon\www\admin-cangrows`.

## 1. السبب الجذري

كان `config/app.php` يسجل `Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider` وواجهة `LaravelLocalization`، ويسجل `app/Http/Kernel.php` خمسة middleware aliases للحزمة. يوجد أيضاً `config/laravellocalization.php`.

لكن `mcamara/laravel-localization` لم تكن ضمن composer.json أو composer.lock أو vendor. لذلك لم يكن تنفيذ composer install من القفل القديم كافياً لاستعادتها: الإعلان عن الاعتماد نفسه كان مفقوداً. لا توجد أدلة تسمح بتحديد من حذف الإعلان أو متى؛ لم يُفترض سبب تاريخي غير مثبت.

المسارات الحالية لا تستدعي facade الحزمة ولا تستخدم aliases الخاصة بها في مجموعات المسارات. ترجمة الموقع الفعلية تعتمد `FrontLanguages` وجدول languages والجلسة، بينما تحدد صفحة الخدمة لغتها من Slug. التسجيل القائم للحزمة ظل مع ذلك اعتماداً إلزامياً أثناء bootstrap. إزالة التسجيل وكل aliases كانت ستغيّر عقد إعداد الترجمة؛ اختيرت استعادة الحزمة للحفاظ على الوظائف المسجلة دون تنشيط تحويلات أو prefixes جديدة.

## 2. الإصلاح المحدد

- إضافة `mcamara/laravel-localization: ~1.8.0` إلى require، وتثبيت `V1.8.0` في القفل وvendor.
- أكد dry run: **حزمة واحدة مثبتة، صفر تحديثات، صفر حذف**. لم يتغير إصدار Laravel أو أي حزمة موجودة.
- تفعيل autoload وpackage discovery الاعتياديين؛ لم يُحذف provider أو facade أو alias أو ملف ترجمة أو مسار.
- حذف استثناء provider من اختبار ServiceSeoTest؛ الاختبارات تستخدم الآن التسجيل الحقيقي للحزمة.
- تثبيت بيئة PHPUnit على SQLite في الذاكرة ومفتاح اختبار مستقل، دون تعديل .env.
- استبدال جدول services المصطنع في اختبارات SEO بتطبيق migrations الخدمات الفعلية الموجودة في المستودع.
- إضافة اختبارات bootstrap والهجرة والتطبيق العام. تهيئة اختبار الصفحة الرئيسية القائم بقاعدة اختبار وطلب HTTPS بدلاً من الاعتماد على بيانات محلية أو قاعدة غير معزولة.

لم تُعدّل ملفات التشغيل الإنتاجية خارج composer.json/composer.lock وملفات vendor اللازمة لاستعادة الاعتماد. التغييرات الإضافية في هذه المرحلة تخص الاختبارات وهذا التقرير؛ تغييرات SEO السابقة محفوظة.

## 3. توافق الاعتمادات وأدوات التنفيذ

وثائق الحزمة تذكر توافق 1.8.x مع Laravel 10، ويؤكد composer.json للحزمة المثبتة دعم PHP >=7.1 وLaravel ^10.0. لذلك لا تستلزم استعادة هذه الحزمة ترقية Laravel أو PHP بذاتها.

المصدر: [المستودع الرسمي للحزمة](https://github.com/mcamara/laravel-localization) و[تعريف الإصدار المثبت](https://github.com/mcamara/laravel-localization/blob/V1.8.0/composer.json).

كشف فحص القفل القديم قيدين موجودين مسبقاً:

- `laravel-lang/lang 15.2.2` يحتاج PHP ^8.2؛ وبالتالي متطلب المشروع الجذري ^8.1 لا يعكس الحد الأدنى الفعلي لكل الاعتمادات المقفلة.
- `ezyang/htmlpurifier 4.17.0` لا يقبل PHP 8.4 ضمن قيده المقفل.

لذلك استُخدم PHP **8.3.36** للاختبارات وComposer. نُزل CLI الرسمي إلى `storage/app/innova-qa/php83`، وهو مسار محلي متجاهل بواسطة Git داخل المشروع، وتحقق SHA-256 مقابل بيانات Windows PHP الرسمية. ملف php.ini الخاص به محلي لهذا المجلد فقط؛ لم يُعدّل إعداد Laragon العام أو إعداد الإنتاج.

استُخدم Composer المحلي أولاً للتحليل والتثبيت، ثم Composer **2.6.6** محلي موثّق بالـ SHA-256 لمواءمة API metadata الموجودة في القفل وتقليل فروق ملفات Composer المولدة. الملفات المؤقتة والأدوات داخل `storage/app/innova-qa` وليست تعديلات على مستودع آخر.

عُطلت scripts أثناء تغيير الاعتماد لتجنب post-update-cmd الموجود الذي ينفذ vendor:publish --force. نُفذ package:discover صراحةً بعد ذلك. لم يُنفذ vendor:publish، ولم تُستبدل إعدادات الترجمة الحالية.

vendor متتبع في هذا المستودع؛ لذلك تظهر الحزمة الجديدة وملفات autoload وinstalled metadata المولدة ضمن تغييرات Git، وليست تغييرات يدوية على منطق حزم أخرى.

لمنع حذف classmap المحسن المتتبع عند التوليد المحلي العادي، وبسبب بطء المسح الشامل لعشرات آلاف ملفات vendor على هذه البيئة، احتُفظت خرائط الاعتمادات الموجودة من HEAD **للفرع الحالي نفسه فقط**؛ لم تكن ملفات vendor معدلة عند بداية المهمة. استُخدم Composer ClassMapGenerator لإضافة خرائط الحزمة الجديدة وapp/tests، ثم مولد Composer نفسه لإنشاء autoload_static المتوافق. لم يُقرأ فرع آخر أو يُستخدم reset أو checkout. بقي إعداد optimize-autoloader في composer.json كما كان. هذا إجراء محلي لتقليل فروق الملفات المولدة؛ التثبيت القياسي من القفل في بيئة النشر لا يحتاجه.

## 4. نتائج Composer وLaravel bootstrap

الأوامر نُفذت باستخدام PHP 8.3 المعزول، مع اتصال SQLite في الذاكرة لعمليات التحقق التي قد تهيئ التطبيق، وبـ providers التطبيق الحقيقيين:

| الفحص | النتيجة |
| --- | --- |
| `php artisan --version` | نجاح: Laravel Framework 10.48.14 |
| `php artisan package:discover --no-interaction` | نجاح، exit 0 |
| `php artisan route:list --json` | نجاح، exit 0، عدد المسارات 250 |
| `php artisan config:clear` | نجاح؛ تنظيف كاش محلي فقط |
| `composer validate --no-check-publish` | صالح مع التحذير السابق عن `illuminate/support: *` |
| `composer check-platform-reqs` | نجاح جميع متطلبات المنصة على PHP 8.3.36 |
| provider وfacade وmiddleware للحزمة | تُحل فعلياً داخل اختبارات bootstrap دون استثناء |

نجاح route:list يعني إمكان تحميل سجل المسارات، ولا يعني وجود كل methods المشار إليها؛ اختبار مستقل كشف الاستثناءات المذكورة لاحقاً.

## 5. نتائج مجموعة الاختبارات الكاملة

أمر التنفيذ:

```powershell
& './storage/app/innova-qa/php83/php.exe' vendor/bin/phpunit --no-progress --log-junit storage/app/innova-qa/phpunit-full.xml
```

النتيجة النهائية: **24 اختباراً، 198 assertion، 18 اختباراً ناجحاً، 5 failures، وخطأ واحد**. exit code = 2. يوجد تنبيه PHPUnit سابق عن XML schema قديم.

نجحت فحوص PHP syntax لملفات الاختبار والـ fixture helper، وLaravel Pint لهذه الملفات، وفحص whitespace لتغييرات المشروع خارج vendor المولد.

لم تُخفَ الاختبارات المتعثرة ولم تتحول إلى skipped أو expected failures:

| الاختبار | النتيجة والسبب |
| --- | --- |
| الصفحة الرئيسية، ExampleTest | HTTP 500: المسار `medical-tourism.index` غير معرف، والقالب العام يستدعيه |
| قائمة الخدمات، القوالب وmiddleware الحقيقيان | HTTP 500 للسبب نفسه؛ تفاصيل الخدمة لديها fallback أضيف في المهمة السابقة |
| لوحة الإدارة بعد المصادقة | SQL خاص بـ MySQL: `TIMESTAMPDIFF(SECOND, ...)` لا يعمل على SQLite؛ هذا حد للتحقق المعزول وليس إثبات عطل على MySQL الإنتاجي |
| تغيير اللغة من العربية إلى الفرنسية | المسار `/index/fr` يكتب session.lang، بينما FrontLanguages يقرأ session.front_language؛ الطلب التالي يبقى عربياً |
| تدقيق controller actions | ثلاثة مسارات موجودة تشير إلى methods غير موجودة، موضحة أدناه |
| إعادة تشغيل سلسلة migrations الأصلية كاملة | خطأ تكرار عمود media.youtube_url في migration قديم |

المسارات ذات methods المفقودة:

```text
admin/general-settings/Adminloader -> Admin\GeneralSettingController@load2
admin/update-profile/{id} -> Admin\DashboardController@updateProfile
admin/update-password/{id} -> Admin\DashboardController@updatePassword
```

هذه العيوب موجودة في كود لم تغيّره استعادة الاعتماد. لم تُحذف المسارات أو تُستبدل assertions لإظهار نجاح زائف، ولم تُجرَ إصلاحات أعمال غير مرتبطة دون تحليل مستقل.

## 6. نتائج SEO للخدمات

اجتازت اختبارات SEO السابقة باستخدام الحزمة الحقيقية، إضافة إلى اختبارات توافق المخطط وbootstrap الجديدة. كما نجحت اختبارات تفاصيل الخدمة بالقوالب الفعلية وmiddleware الفعلية وبيانات اصطناعية باللغات الثلاث.

التشغيل المستقل لـ ServiceSeoTest وLocalizationBootstrapTest واختبار الوحدة القائم نجح: **14 اختباراً، 140 assertion، exit 0**، دون أي تجاوز لـ LaravelLocalization. ملف النتيجة المحلي: `storage/app/innova-qa/phpunit-seo.txt`.

- حفظ Meta وOG متعددة اللغات، والإنشاء والتحديث والبدائل اللغوية.
- Canonical دون tracking query، وOG وTwitter وJSON-LD الآمن.
- عنوان HTML ووصف وCanonical وOG Image وH1 مرة واحدة في كل صفحة تفاصيل عربية وإنجليزية وفرنسية ضمن البيانات المختبرة.
- HTTP 200 للخدمة المنشورة، و404 للمسودة والمفقودة.
- تحويل HTTPS إلى طلب نهائي يعمل، وCanonical domain redirect دون حلقة في الحالة المختبرة.
- Slug تاريخي وprefixed legacy URL يعيدان 301 إلى Slug الحالي، مع حجب المسودات.
- خريطة خدمات ديناميكية صحيحة XML تعرض Slugs الحالية للخدمات المنشورة فقط.
- منع الإدارة غير المصرح بها، وفرض صلاحية services، ونجاح حفظ صورة OG وإعادة تحميل إعدادات المسودة.
- نجاح واجهة API العامة للخدمات المنشورة وعدم تسريب الخدمة المسودة عبر القائمة أو استعلام التفاصيل، والتحقق من ملفات robots وXML الثابتة.
- سجل المسارات الحالي محفوظ: `/service/{slug}` ومسارات الإدارة وAPI وlegacy وsitemap.

اختبارات SEO المركزة ما زالت تعزل بعض بيانات الموقع العامة؛ تستبعد middleware الموقع واللغة وHTTPS في تلك المجموعة فقط، ولا تستبعد provider الترجمة. اختبارات ApplicationRegressionTest الإضافية تُشغّل القوالب وmiddleware الحقيقيين. تُضبط session.ip_address بقيمة اختبار لتفادي طلب تحديد موقع خارجي، ويُمنع Laravel Http من إرسال طلبات غير مصرح بها.

## 7. توافق migration مع مخطط المشروع

اختُبرت سلسلة migrations خدمات المستودع الفعلية على SQLite في الذاكرة، بما فيها الحقول القديمة والتصنيفات وparent_id وshort_details، ثم الترحيل الجديد `2026_10_25_000000_add_service_seo.php`.

أُدخل سجل قديم قبل الترحيل ثم جرى التحقق من بقاء كل قيمه كما هي، وبقاء Slugs وMeta الموجودة، وإضافة حالة نشر true افتراضياً. نجح تكرار up، وإنشاء جدول history، وفحص أعمدة OG الجديدة. لم يُطبق أي ترحيل على قاعدة المشروع أو الإنتاج.

لتشغيل اختبارات HTTP الواسعة، تُنشأ بعض الجداول الأساسية التي لا يوجد لها create migration من **تعريفات الأعمدة فقط** في database.sql الحالي، مع تكييف الأنواع لـ SQLite، ثم يعمل Migrator الحقيقي. لم تُستورد بيانات dump أو حساباته إلى بيئة الاختبار.

سلسلة migrations الكاملة تحتوي خللاً قديماً: migration فبراير 1 يضيف youtube_url إذا كان غائباً، ثم migration فبراير 24 يضيفه مرة أخرى دون شرط. اختبار MigrationReplayTest يشغّل السلسلة الأصلية ويظل يفشل بهذا الخطأ. في fixtures اختبارات HTTP فقط يُستبعد إجراء الإضافة الثاني الزائد كي يمكن متابعة فحص بقية التطبيق؛ ذُكر هذا صراحةً في الكود وفي هذا التقرير، ولم يُعدّل migration الإنتاجي أو تُخفَ نتيجة إعادة التشغيل الأصلية.

اختبارات SQLite لا تستبدل تجربة MySQL staging، خاصةً للاستعلامات الخاصة بلوحة الإدارة والاختلافات في collation والفهارس.

## 8. APP_URL وrobots والخريطة

- القيمة المحلية المقروءة دون تعديل: `APP_URL=http://localhost`.
- نطاق robots: `https://innovadentalclinics.com`، لكل من sitemap.xml وsitemap-services.xml.
- يوجد اختلاف بيئي واضح بين القيمة المحلية والنطاق المنشور. لم تُعدّل .env لحله.
- Canonical والخريطة الديناميكية يعتمدان service_seo.origin المأخوذ من APP_URL؛ يجب ضبطه على النطاق الإنتاجي النهائي قبل النشر.
- robots يسمح بزحف الخدمات، ولا يحتوي قاعدة لحجب `/service/`.
- خريطة XML الثابتة قابلة للتحليل، ولا تحتوي إدخالات الخدمات القديمة `/ar/service/...` و`/en/service/...` التي أزيلت في المهمة السابقة.
- فحص robots والخريطة الثابتة هو فحص ملفّي، لأن تقديمهما فعلياً مسؤولية إعداد document root في خادم الويب. لم يُدّعَ تحقق HTTP خارجي أو TLS حي.

## 9. مسائل متبقية ومخاطر

1. الصفحة الرئيسية وقائمة الخدمات لا تجتازان HTTP smoke بسبب route مفقود؛ يجب إصلاح المرجع أو استعادة route بعد مراجعة مقصده.
2. مسار تبديل اللغة لا يحدّث حالة اللغة التي يستخدمها FrontLanguages. لم يسبب تثبيت الحزمة هذا التعارض ولم يصلحه تلقائياً.
3. ثلاثة controller actions مفقودة في مسارات مسجلة.
4. سلسلة migrations القديمة غير قابلة للإعادة كاملة دون معالجة التكرار، إضافة إلى جداول baseline لا توجد لها create migrations.
5. يلزم اختبار لوحة الإدارة على MySQL staging لتجاوز حد SQLite وإتمام QA لها.
6. متطلبات PHP الفعلية للاعتمادات المقفلة تختلف عن المتطلب الجذري: استُخدم 8.3 بنجاح؛ لا تعتمد نتيجة الاختبار دليلاً على دعم 8.1 أو 8.4 لكل القفل.
7. `composer audit` أعاد **99 advisory في 21 حزمة موجودة مسبقاً**، منها Laravel وSymfony وحزم ملفات/HTML. الحزمة الجديدة ليست ضمن القائمة. لم تُجرَ ترقيات واسعة خارج النطاق؛ يلزم تقييم أمني مستقل قبل إقرار النشر.
8. لم يُفحص المخطط أو البيانات الإنتاجية الحية، ولا proxy/TLS ولا ملفات الصور الفعلية ولا document root. تدقيق Slugs المكررة أو الفارغة ومشاركة Slug بين لغتين، المذكور في التقرير السابق، يظل مطلوباً على نسخة staging.
9. تبقى تحذيرات Composer عن قيد * وPHPUnit عن schema قديم.

## 10. الملفات المعدلة في هذه المرحلة

```text
composer.json
composer.lock
phpunit.xml
tests/Feature/ExampleTest.php
tests/Feature/ServiceSeoTest.php
tests/Feature/ApplicationRegressionTest.php       (جديد)
tests/Feature/LocalizationBootstrapTest.php       (جديد)
tests/Feature/MigrationReplayTest.php             (جديد)
tests/Support/ProjectDatabase.php                (جديد)
INNOVA_SEO_FINAL_QA_REPORT_AR.md                  (جديد)
vendor/mcamara/laravel-localization/**           (حزمة جديدة)
vendor/autoload.php وملفات vendor/composer/* المولدة التي يظهرها Git
```

لم تُغيّر هذه المرحلة ملفات تنفيذ SEO أو routes أو config/app.php أو Kernel أو FrontLanguages أو migrations القديمة. بقي `SERVICE_SEO_CURRENT_BRANCH_REPORT_AR.md` كتقرير تاريخي للمرحلة السابقة.

## 11. Git status وحفظ التعديلات

بداية هذه المرحلة كانت على innova مع تغييرات SEO غير ملتزم بها: عشرة ملفات متتبعة معدلة، وتقرير SEO السابق والـ controllers/helpers/config/migration والترجمات وpartials واختبارات SEO وfixtures كملفات جديدة. لم تكن شجرة العمل نظيفة، خلافاً لبداية المرحلة السابقة الموثقة في تقريرها.

جميع هذه التغييرات محفوظة. أُضيف إليها اعتماد Composer واختبارات QA وهذا التقرير وملفات vendor المولدة. النتيجة هي working tree غير ملتزم بها للمراجعة؛ لم يُنشأ commit أو PR أو push.

الأدوات والنتائج المحلية في `storage/app/innova-qa` متجاهلة بواسطة Git. منها تقرير JUnit والنص الكامل للمجموعة ونتائج route:list وComposer audit. يمكن إعادة توليدها بالأوامر الواردة دون الاتصال بقاعدة الإنتاج.

## 12. متطلبات النشر والحكم النهائي

**الحكم النهائي: NO-GO للنشر بالحالة الحالية.** عطل LaravelLocalization نفسه أُصلح، وbootstrap الطبيعي يعمل، وSEO الخدمات اجتاز التحقق الموضح؛ لكن المجموعة الكاملة غير ناجحة، والعيوب والحدود أعلاه تمنع إعلان جاهزية التطبيق كله.

قبل إعادة تقييم القرار:

1. إصلاح route الصفحة الرئيسية/قائمة الخدمات وتعارض session اللغة وcontroller actions المفقودة، ثم إعادة المجموعة دون تجاهل حالات فشل.
2. مراجعة تاريخ migrations على نسخة staging ومعالجة الإضافة المكررة بأمان؛ عدم تشغيل migrate:fresh أو حذف بيانات إنتاجية.
3. تشغيل اختبارات لوحة الإدارة والخدمات والترحيل على MySQL معزول يطابق الإنتاج.
4. تثبيت القفل المعدل باستخدام إصدار PHP متوافق، وإعادة autoload/package discovery وكاش التطبيق وفق إجراء التشغيل المعتمد.
5. تقييم advisories ومعالجة المخاطر الأمنية ذات الصلة في تغيير مستقل ومختبر.
6. مطابقة APP_URL ونطاق robots وCanonical، والتحقق من proxy/TLS وdocument root وصلاحية رفع الصور على staging.
7. مراجعة البيانات القديمة، ثم أخذ نسخة احتياطية وتطبيق ترحيل SEO الإضافي بعد مراجعة pending migrations وقبل تفعيل الكود الجديد.

تأكيدات صريحة:

- لا merge، ولا rebase، ولا cherry-pick، ولا تبديل فروع.
- لا reset، ولا stash، ولا clean، ولا تخلص من تعديلات المستخدم.
- لا نسخ من فروع أو مشاريع أخرى، ولا تعديل مستودع آخر.
- لا commit ولا push.
- لا تعديل .env أو قاعدة الإنتاج أو إعداد PHP الإنتاجي.
- لا destructive migrations، ولا نشر إنتاجي.
