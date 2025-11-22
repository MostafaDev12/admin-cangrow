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

         $randomAddress = Arr::random($addresses);
         $randomPhone = Arr::random($phones);
         $randomEmail = Arr::random($emails);
     @endphp

     <main>

         <section class="relative w-full h-[500px] mb-28 lg:h-[600px] bg-custom-blue">
             <!-- Swiper Slider -->
             <div class="swiper hero-slider h-full">
                 <div class="swiper-wrapper">
                     <div class="swiper-slide">
                         <img src="./assets/imgs/banner/banner-1.jpg" alt="صدقة جارية - نخلة بلح"
                             class="absolute inset-0 w-full h-full object-" />
                     </div>
                     <div class="swiper-slide">
                         <img src="./assets/imgs/banner/banner-2.jpg" alt="صدقة جارية - نخلة بلح"
                             class="absolute inset-0 w-full h-full object-" />
                     </div>

                 </div>

                 <!-- Swiper Navigation -->
                 <div class="swiper-button-prev"></div>
                 <div class="swiper-button-next"></div>
             </div>

             <!-- Overlay Section -->
             <div class="absolute z-10 left-0 right-0 -bottom-40  px-4 sm:px-6 lg:px-8">
                 <div class="relative max-w-7xl mx-auto py-10 bg-custom-orange rounded-2xl overflow-hidden shadow-lg">
                     <!-- Background Pattern -->
                     <div class="absolute inset-0 opacity-20"
                         style="
          background-image: url('./assets/imgs/banner/bg-lines-transparent.png');
          background-size: cover;
          background-position: center bottom;
          background-repeat: no-repeat;
        ">
                     </div>

                     <!-- Text + Button -->
                     <div
                         class="relative flex flex-col md:flex-row justify-between items-center text-center md:text-right px-4 sm:px-6 lg:px-8 py-6 md:py-8">
                         <div class="mb-6 md:mb-0">
                             <h2 class="text-2xl md:text-3xl font-bold leading-tight text-white">
                                 شارك بصدقتك وزكاتك مع دار التوفيق
                                 <br class="hidden md:block" />
                                 وفرّح ملايين المستفيدين في كل محافظات مصر.
                             </h2>
                         </div>

                         <a href="#"
                             class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-white hover:text-custom-orange transition-all duration-300 ease-in-out flex items-center space-x-2 space-x-reverse">
                             <span>تبرع الآن</span>
                             <i class="fas fa-arrow-left text-sm"></i>
                         </a>
                     </div>
                 </div>
             </div>
         </section>

         <section class="py-16 md:py-24 overflow-hidden min-h-screen flex items-center justify-center">
             <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">

                 <div class="hidden lg:block absolute top-1/2 -translate-y-1/2 start-1/2 translate-x-3/4 w-48 h-80 z-[-1]"
                     style="background-image: radial-gradient(circle at center, #d1d5db 1px, transparent 1.5px); background-size: 1.25rem 1.25rem;">
                 </div>

                 <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 lg:gap-24 items-center">

                     <div class="lg:col-span-2 relative mt-20 lg:mt-0">
                         <img src="./assets/imgs/banner/image-1.jpg" alt="أطفال مبتسمون"
                             class="w-full h-auto rounded-lg shadow-xl object-cover">

                         <div
                             class="absolute bottom-0 start-0 w-2/3 md:w-3/4  rounded-lg shadow-2xl transform translate-y-1/3 md:translate-x-1/2">
                             <img src="./assets/imgs/banner/image-2.jpg" alt="Life Makers Logo"
                                 class="w-full h-full rounded-lg object-cover">
                         </div>
                     </div>

                     <div class="lg:col-span-3">
                         <div class="mb-8">


                             <div class="mb-12 max-w-3xl mx-auto">
                                 <div class="relative mb-10">
                                     <h1 class="text-sm font-extrabold text-custom-orange  mb-4">
                                         من نحن
                                     </h1>

                                 </div>
                                 <p class="text-lg text-gray-600 leading-relaxed">
                                     من نحن
                                 </p>
                                 <div class="w-20 h-1.5 bg-custom-orange rounded-full"></div>

                             </div>

                         </div>

                         <p class="text-lg text-gray-700 leading-relaxed mb-8">
                             هي مؤسسة أهلية وطنية غير حكومية وغير هادفة للربح (LMF). مؤسسة دار التوفيق مصر أسست عام 2011
                             ومسجلة مركزياً برقم قيد 839 لسنة 2018 وتعمل طبقاً لقانون الجمعيات والمؤسسات الأهلية المصري.
                         </p>

                         <div class="space-y-6">

                             <p class="text-base text-gray-700">
                                 منذ انطلاقتنا عام 1997، كانت رؤيتنا في دار التوفيق واضحة: أن نكون يد العون التي تُمسك
                                 بمن يحتاج الدعم، وأن نمنح كل فرد الفرصة ليحقق حياة كريمة مليئة بالأمل. وعبر سنوات من
                                 العطاء والخدمة المجتمعية، واصلنا النموّ خطوة بخطوة، حتى أصبحت دار التوفيق كيانًا خيريًا
                                 متجدّدًا يخدم مختلف فئات المجتمع باحترافية وإنسانية.
                             </p>
                             <p class="text-base text-gray-700">
                                 وفي سنة 2024، شهدت المؤسسة نقلة نوعية وتطويرًا شاملًا، مواكبةً لاحتياجات المجتمع
                                 المتزايدة، وتوسّعًا في برامجنا ومشاريعنا، لنصل لأكبر عدد ممكن من المستفيدين، ونصنع أثرًا
                                 أكثر استدامة.
                             </p>
                             <p class="text-base text-gray-700">
                                 نحن نؤمن بأن الخير ليس مجرّد مساعدة وقتية، بل تمكين حقيقي يُغيّر حياة الناس للأفضل. لذلك
                                 نقدم في دار التوفيق:
                             </p>

                             <div class="space-y-6">
                                 <div class="flex items-start">
                                     <div class="flex-shrink-0">
                                         <span
                                             class="flex items-center justify-center h-7 w-7 rounded-full bg-custom-orange shadow-md">
                                             <i class="fas fa-check text-white text-sm"></i>
                                         </span>
                                     </div>
                                     <p class="mr-4 text-base text-gray-700">
                                         برامج الدعم الإنساني والاجتماعي
                                     </p>
                                 </div>
                                 <div class="flex items-start">
                                     <div class="flex-shrink-0">
                                         <span
                                             class="flex items-center justify-center h-7 w-7 rounded-full bg-custom-orange shadow-md">
                                             <i class="fas fa-check text-white text-sm"></i>
                                         </span>
                                     </div>
                                     <p class="mr-4 text-base text-gray-700">
                                         مشروعات تمكين المرأة وتنمية المهارات
                                     </p>
                                 </div>
                                 <div class="flex items-start">
                                     <div class="flex-shrink-0">
                                         <span
                                             class="flex items-center justify-center h-7 w-7 rounded-full bg-custom-orange shadow-md">
                                             <i class="fas fa-check text-white text-sm"></i>
                                         </span>
                                     </div>
                                     <p class="mr-4 text-base text-gray-700">
                                         المبادرات التعليمية والتدريبية
                                     </p>
                                 </div>
                                 <div class="flex items-start">
                                     <div class="flex-shrink-0">
                                         <span
                                             class="flex items-center justify-center h-7 w-7 rounded-full bg-custom-orange shadow-md">
                                             <i class="fas fa-check text-white text-sm"></i>
                                         </span>
                                     </div>
                                     <p class="mr-4 text-base text-gray-700">
                                         رعاية الفئات الأكثر احتياجًا
                                     </p>
                                 </div>
                             </div>

                             <p class="text-base text-gray-700">
                                 نلتزم بالعمل بروح التكافل والشفافية، ونسعى دومًا إلى تقديم خدمات تُحافظ على كرامة
                                 الإنسان وتمنحه القدرة للانطلاق نحو مستقبل أفضل. فريقنا يعمل بإخلاص، ومتطوّعونا هم شريك
                                 النجاح الأول في كل خطوة.
                             </p>
                             <p class="text-base text-gray-700">
                                 نفتح أبوابنا وقلوبنا لكل من يرغب في أن يكون جزءًا من رسالتنا — سواء بالتطوع أو بالمساهمة
                                 أو حتى بدعم كلمة طيبة. فكل يد تمتد بالخير معنا تُحدث فرقًا حقيقيًا في حياة من يحتاج.
                             </p>
                             <p class="text-base text-gray-700">
                                 في دار التوفيق… نؤمن أن الأمل يبدأ بخطوة، وأن الخير عندما ينتشر يصنع مجتمعًا أقوى،
                                 وأجمل، وأكثر إنسانية.
                             </p>
                             <p class="text-base text-gray-700">
                                 شكرًا لكل من وضع ثقته بنا، وسنسعى دائماً لنكون عند حسن الظن… منذ 1997 وحتى الغد.
                             </p>

                         </div>
                     </div>

                 </div>
             </div>
         </section>


         <section class="container mx-auto px-4 py-16 md:py-24">


             <div class="text-center mb-12 max-w-3xl mx-auto">
                 <div class="relative mb-10">
                     <h1 class="text-sm font-extrabold text-custom-orange  mb-4">
                         المشروعات والخدمات
                     </h1>

                 </div>
                 <p class="text-lg text-gray-600 leading-relaxed">
                     المشروعات والخدمات
                 </p>
             </div>

             <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

                 <div
                     class="fade-in-card group relative bg-white rounded-xl shadow-lg p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-1 overflow-hidden flex items-start gap-4">
                     <span
                         class="absolute bottom-0 right-0 h-0 w-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:h-full"></span>

                     <span
                         class="absolute bottom-0 right-0 w-0 h-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:w-full"></span>

                     <div class="flex-shrink-0 text-accent w-12 h-12 flex items-center justify-center">
                         <i class="fa-solid fa-graduation-cap text-4xl"></i>
                     </div>
                     <div>
                         <h3 class="text-xl font-bold text-gray-900 mb-1">مجال التعليم</h3>
                         <p class="text-gray-500">التعليم وتنمية المهارات</p>
                     </div>
                 </div>

                 <div
                     class="fade-in-card group relative bg-white rounded-xl shadow-lg p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-1 overflow-hidden flex items-start gap-4">
                     <span
                         class="absolute bottom-0 right-0 h-0 w-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:h-full"></span>

                     <span
                         class="absolute bottom-0 right-0 w-0 h-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:w-full"></span>


                     <div class="flex-shrink-0 text-accent w-12 h-12 flex items-center justify-center">
                         <i class="fa-solid fa-stethoscope text-4xl"></i>
                     </div>
                     <div>
                         <h3 class="text-xl font-bold text-gray-900 mb-1">مجال الصحة</h3>
                         <p class="text-gray-500">العمليات والقوافل الطبية</p>
                     </div>
                 </div>

                 <div
                     class="fade-in-card group relative bg-white rounded-xl shadow-lg p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-1 overflow-hidden flex items-start gap-4">
                     <span
                         class="absolute bottom-0 right-0 h-0 w-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:h-full"></span>

                     <span
                         class="absolute bottom-0 right-0 w-0 h-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:w-full"></span>

                     <div class="flex-shrink-0 text-accent w-12 h-12 flex items-center justify-center">
                         <i class="fa-solid fa-briefcase text-4xl"></i>
                     </div>
                     <div>
                         <h3 class="text-xl font-bold text-gray-900 mb-1">برنامج تحسين سبل المعيشة</h3>
                         <p class="text-gray-500">المشروعات الصغيرة</p>
                     </div>
                 </div>

                 <div
                     class="fade-in-card group relative bg-white rounded-xl shadow-lg p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-1 overflow-hidden flex items-start gap-4">
                     <span
                         class="absolute bottom-0 right-0 h-0 w-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:h-full"></span>

                     <span
                         class="absolute bottom-0 right-0 w-0 h-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:w-full"></span>


                     <div class="flex-shrink-0 text-accent w-12 h-12 flex items-center justify-center">
                         <i class="fa-solid fa-hand-holding-heart text-4xl"></i>
                     </div>
                     <div>
                         <h3 class="text-xl font-bold text-gray-900 mb-1">برنامج الإغاثة والطوارئ</h3>
                         <p class="text-gray-500">توفير الدفأ وتوزيع الأغذية</p>
                     </div>
                 </div>

                 <div
                     class="fade-in-card group relative bg-white rounded-xl shadow-lg p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-1 overflow-hidden flex items-start gap-4">
                     <span
                         class="absolute bottom-0 right-0 h-0 w-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:h-full"></span>

                     <span
                         class="absolute bottom-0 right-0 w-0 h-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:w-full"></span>


                     <div class="flex-shrink-0 text-accent w-12 h-12 flex items-center justify-center">
                         <i class="fa-solid fa-seedling text-4xl"></i>
                     </div>
                     <div>
                         <h3 class="text-xl font-bold text-gray-900 mb-1">برنامج البيئة</h3>
                         <p class="text-gray-500">الزراعة والتنظيف</p>
                     </div>
                 </div>

                 <div
                     class="fade-in-card group relative bg-white rounded-xl shadow-lg p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-1 overflow-hidden flex items-start gap-4">
                     <span
                         class="absolute bottom-0 right-0 h-0 w-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:h-full"></span>

                     <span
                         class="absolute bottom-0 right-0 w-0 h-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:w-full"></span>


                     <div class="flex-shrink-0 text-accent w-12 h-12 flex items-center justify-center">
                         <i class="fa-solid fa-basket-shopping text-4xl"></i>
                     </div>
                     <div>
                         <h3 class="text-xl font-bold text-gray-900 mb-1">برنامج الاحتياجات الأساسية</h3>
                         <p class="text-gray-500">توفير الغذاء والملابس</p>
                     </div>
                 </div>

                 <div
                     class="fade-in-card group relative bg-white rounded-xl shadow-lg p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-1 overflow-hidden flex items-start gap-4">
                     <span
                         class="absolute bottom-0 right-0 h-0 w-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:h-full"></span>

                     <span
                         class="absolute bottom-0 right-0 w-0 h-[4px] bg-custom-orange transition-all duration-500 ease-out group-hover:w-full"></span>


                     <div class="flex-shrink-0 text-accent w-12 h-12 flex items-center justify-center">
                         <i class="fa-solid fa-bullseye text-4xl"></i>
                     </div>
                     <div>
                         <h3 class="text-xl font-bold text-gray-900 mb-1">مشروع سفير</h3>
                         <p class="text-gray-500">مشروع موجه لتحقيق أهداف التنمية المستدامة</p>
                     </div>
                 </div>

             </div>
         </section>

         <section class="py-16 md:py-24 bg-gray-50" dir="{{ session::get('front_language_duraction') }}">
             <div class="container mx-auto px-4">
                 <div class="text-center mb-12 max-w-3xl mx-auto">
                     <h1 class="text-2xl font-extrabold text-slate-800 mb-4">معلومات لحظية</h1>
                     <p class="text-lg text-gray-600">مواقيت الصلاة، آية/سورة من القرآن، ودرجات الحرارة حسب مدينتك</p>
                 </div>

                 <!-- اختيار المدينة العام -->
                 <div class="mb-10 text-center">
                     <label class="text-gray-700 font-semibold text-sm">اختر مدينتك</label>
                    <select id="global-city" class="px-3 py-2 border rounded-md text-sm">
                        <option value="cairo" data-value="القاهرة" data-latitude="30.0444" data-longitude="31.2357">القاهرة</option>
                        <option value="giza" data-value="الجيزة" data-latitude="29.9765" data-longitude="31.1313">الجيزة</option>
                        <option value="alex" data-value="الإسكندرية" data-latitude="31.2001" data-longitude="29.9187">الإسكندرية</option>
                        <option value="mansoura" data-value="المنصورة" data-latitude="31.0400" data-longitude="31.3785">المنصورة</option>
                        <option value="aswan" data-value="أسوان" data-latitude="24.0908" data-longitude="32.8998">أسوان</option>
                    </select>
                 </div>

                 <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                     <!-- مواقيت الصلاة -->
                     <div class="bg-white rounded-lg shadow-md p-6">
                         <div class="flex items-center justify-between mb-4">
                             <h3 class="text-lg font-semibold text-slate-800">مواقيت الصلاة</h3>
                             <button id="refreshPrayer" class="text-sm text-custom-orange hover:underline">تحديث</button>
                         </div>
                         <div class="text-sm text-gray-600 mb-3">المدينة: <span id="prayer-city"
                                 class="font-semibold">القاهرة</span></div>
                         <ul id="prayer-times" class="space-y-2 text-sm text-slate-700">
                             <li>الفجر: <span class="font-medium">--:--</span></li>
                             <li>الظهر: <span class="font-medium">--:--</span></li>
                             <li>العصر: <span class="font-medium">--:--</span></li>
                             <li>المغرب: <span class="font-medium">--:--</span></li>
                             <li>العشاء: <span class="font-medium">--:--</span></li>
                         </ul>
                         <div class="mt-4 text-xs text-gray-500">المصدر: AlAdhan API</div>
                     </div>

                     <!-- القرآن الكريم -->
                     <div class="bg-white rounded-lg shadow-md p-6">
                         <div class="flex items-center justify-between mb-4">
                             <h3 class="text-lg font-semibold text-slate-800">القرآن الكريم</h3>
                             <div class="flex items-center gap-2">
                                 <select id="quran-surah" class="text-sm px-2 py-1 border rounded-md">
                                     <option value="1">الفاتحة</option>
                                     <option value="2">البقرة</option>
                                     <option value="36">يس</option>
                                     <option value="55">الرحمن</option>
                                     <option value="112">الإخلاص</option>
                                 </select>
                                 <button id="loadQuran" class="text-sm text-custom-orange hover:underline">تحميل</button>
                             </div>
                         </div>

                         <div id="quran-content" class="text-slate-700 text-sm space-y-3" style="font-family: initial;font-size: initial;">
                             <div id="quran-title" class="font-semibold">سورة الفاتحة</div>
                             <div id="quran-ayah" class="leading-relaxed">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ …</div>

                             <!-- إضافة صوت القارئ -->
                             {{-- <label class="text-xs text-gray-600 font-semibold mt-2 block">اختر القارئ</label>
                             <select id="quran-reciter" class="text-sm px-2 py-1 border rounded-md w-full">
                                 <option value="ar.alafasy">العفاسي</option>
                                 <option value="ar.husary">الحصري</option>
                                 <option value="ar.hudhaifi">الحذيفي</option>
                                 <option value="ar.minshawi">المنشاوي</option>
                             </select> --}}

                             <audio id="quran-audio" controls class="w-full mt-3 hidden">
                                 <source id="quran-audio-src" src="" type="audio/mpeg">
                                 متصفحك لا يدعم عنصر الصوت.
                             </audio>
                         </div>

                         <div class="mt-4 text-xs text-gray-500">المصدر: Quran API</div>
                     </div>

                     <!-- درجات الحرارة -->
                     <div class="bg-white rounded-lg shadow-md p-6">
                         <div class="flex items-center justify-between mb-4">
                             <h3 class="text-lg font-semibold text-slate-800">درجة الحرارة</h3>
                             <button id="refreshWeather" class="text-sm text-custom-orange hover:underline">تحديث</button>
                         </div>

                         <div class="flex items-center gap-4">
                             <div>
                                 <div class="text-xs text-gray-600">المدينة</div>
                                 <div id="weather-city" class="text-lg font-semibold">القاهرة</div>
                             </div>
                             <div class="flex-1 text-right">
                                 <div id="weather-temp" class="text-3xl font-bold text-slate-800">--°C</div>
                                 <div id="weather-desc" class="text-sm text-gray-600">--</div>
                             </div>
                         </div>

                         <div class="mt-4 grid grid-cols-2 gap-2 text-sm text-gray-600">
                             <div>الرطوبة: <span id="weather-humidity">--%</span></div>
                             <div>الرياح: <span id="weather-wind">-- m/s</span></div>
                         </div>

                         <div class="mt-4 text-xs text-gray-500">المصدر: api.met.no</div>
                     </div>
                 </div>
             </div>
         </section>


         <section class="container mx-auto px-4 py-16">
             <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

                 <!-- كارت 1 -->
                 <article
                     class="group bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                     <div class="relative overflow-hidden">
                         <img src="./assets/imgs/home/ser-1 (1).jpg" alt="كارت الود موصول"
                             class="w-full h-64 object- transition-transform duration-500 ease-out group-hover:scale-110" />

                         <!-- الخط الصاعد -->
                         <span
                             class="absolute bottom-0 right-0 w-[2px] h-0 bg-custom-orange transition-all duration-500 ease-out group-hover:h-full group-hover:bottom-auto group-hover:top-0"></span>
                     </div>

                     <div class="p-6 flex-grow flex flex-col">
                         <h3 class="text-xl font-bold text-gray-900 mb-2">كارت الود موصول</h3>
                         <p class="text-gray-600 text-sm mb-4 flex-grow">
                             اوصل حبل الود بكل حبايبك و اصحابك بصدقة جارية تخلد اساميهم في السعادة وتدعمك بيهم طول العمر.
                         </p>
                         <div class="flex gap-2">
                             <!-- Outline Button -->
                             <a href="#"
                                 class="flex-1 text-custom-orange bg-white border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-custom-orange hover:text-white">
                                 قدّم طلبك الآن
                             </a>

                             <!-- Primary (Filled) Button -->
                             <a href="#"
                                 class="flex-1 text-white bg-custom-orange border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-white hover:text-custom-orange">
                                 تبرع الآن
                             </a>
                         </div>
                     </div>
                 </article>

                 <!-- كارت 2 -->
                 <article
                     class="group bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                     <div class="relative overflow-hidden">
                         <img src="./assets/imgs/home/ser-1 (2).jpg"
                             class="w-full h-64 object- transition-transform duration-500 ease-out group-hover:scale-110" />
                         <span
                             class="absolute bottom-0 right-0 w-[2px] h-0 bg-custom-orange transition-all duration-500 ease-out group-hover:h-full group-hover:bottom-auto group-hover:top-0"></span>
                     </div>

                     <div class="p-6 flex-grow flex flex-col">
                         <h3 class="text-xl font-bold text-gray-900 mb-2">سقف خشبي</h3>
                         <p class="text-gray-600 text-sm mb-4 flex-grow">
                             بتبرعك، سقفك خشبي هتحمي أسرة فقيرة من البرد و المطر، وتوفرلهم الستر والدفء والأمان.
                         </p>
                         <div class="flex gap-2">
                             <!-- Outline Button -->
                             <a href="#"
                                 class="flex-1 text-custom-orange bg-white border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-custom-orange hover:text-white">
                                 قدّم طلبك الآن
                             </a>

                             <!-- Primary (Filled) Button -->
                             <a href="#"
                                 class="flex-1 text-white bg-custom-orange border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-white hover:text-custom-orange">
                                 تبرع الآن
                             </a>
                         </div>
                     </div>
                 </article>

                 <!-- كارت 3 -->
                 <article
                     class="group bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                     <div class="relative overflow-hidden">
                         <img src="./assets/imgs/home/ser-1 (3).jpg"
                             class="w-full h-64 object- transition-transform duration-500 ease-out group-hover:scale-110" />
                         <span
                             class="absolute bottom-0 right-0 w-[2px] h-0 bg-custom-orange transition-all duration-500 ease-out group-hover:h-full group-hover:bottom-auto group-hover:top-0"></span>
                     </div>

                     <div class="p-6 flex-grow flex flex-col">
                         <h3 class="text-xl font-bold text-gray-900 mb-2">قافلة إغاثة فلسطين</h3>
                         <p class="text-gray-600 text-sm mb-4 flex-grow">
                             كن عوناً لأهل غزة بالدواء و الغذاء في ظل الحصار الكامل وساهم في انقاذ آلاف المصابين.
                         </p>
                         <div class="flex gap-2">
                             <!-- Outline Button -->
                             <a href="#"
                                 class="flex-1 text-custom-orange bg-white border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-custom-orange hover:text-white">
                                 قدّم طلبك الآن
                             </a>

                             <!-- Primary (Filled) Button -->
                             <a href="#"
                                 class="flex-1 text-white bg-custom-orange border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-white hover:text-custom-orange">
                                 تبرع الآن
                             </a>
                         </div>
                     </div>
                 </article>

                 <!-- كارت 4 -->
                 <article
                     class="group bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                     <div class="relative overflow-hidden">
                         <img src="./assets/imgs/home/ser-1 (6).jpg"
                             class="w-full h-64 object- transition-transform duration-500 ease-out group-hover:scale-110" />
                         <span
                             class="absolute bottom-0 right-0 w-[2px] h-0 bg-custom-orange transition-all duration-500 ease-out group-hover:h-full group-hover:bottom-auto group-hover:top-0"></span>
                     </div>

                     <div class="p-6 flex-grow flex flex-col">
                         <h3 class="text-xl font-bold text-gray-900 mb-2">مشروعات صغيرة</h3>
                         <p class="text-gray-600 text-sm mb-4 flex-grow">
                             ساعدهم مرة وأسعدهم طول العمر، تبرعك بمشروع صغير هتقدر تحول حياة أسرة فقيرة.
                         </p>
                         <div class="flex gap-2">
                             <!-- Outline Button -->
                             <a href="#"
                                 class="flex-1 text-custom-orange bg-white border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-custom-orange hover:text-white">
                                 قدّم طلبك الآن
                             </a>

                             <!-- Primary (Filled) Button -->
                             <a href="#"
                                 class="flex-1 text-white bg-custom-orange border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-white hover:text-custom-orange">
                                 تبرع الآن
                             </a>
                         </div>
                     </div>
                 </article>

                 <!-- كارت 5 -->
                 <article
                     class="group bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                     <div class="relative overflow-hidden">
                         <img src="./assets/imgs/home/ser-1 (4).jpg" alt="كرتونة فرحة العيد"
                             class="w-full h-64 object- transition-transform duration-500 ease-out group-hover:scale-110" />
                         <span
                             class="absolute bottom-0 right-0 w-[2px] h-0 bg-custom-orange transition-all duration-500 ease-out group-hover:h-full group-hover:bottom-auto group-hover:top-0"></span>
                     </div>

                     <div class="p-6 flex-grow flex flex-col">
                         <h3 class="text-xl font-bold text-gray-900 mb-2">كرتونة فرحة العيد</h3>
                         <p class="text-gray-600 text-sm mb-4 flex-grow">
                             ساهم بكرتونة فرحة العيد وفرح آلاف المستحقين في عيد الأضحى المبارك.
                         </p>
                         <div class="flex gap-2">
                             <!-- Outline Button -->
                             <a href="#"
                                 class="flex-1 text-custom-orange bg-white border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-custom-orange hover:text-white">
                                 قدّم طلبك الآن
                             </a>

                             <!-- Primary (Filled) Button -->
                             <a href="#"
                                 class="flex-1 text-white bg-custom-orange border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-white hover:text-custom-orange">
                                 تبرع الآن
                             </a>
                         </div>
                     </div>
                 </article>

                 <!-- كارت 6 -->
                 <article
                     class="group bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                     <div class="relative overflow-hidden">
                         <img src="./assets/imgs/home/ser-1 (5).jpg"
                             class="w-full h-64 object-cover transition-transform duration-500 ease-out group-hover:scale-110" />
                         <span
                             class="absolute bottom-0 right-0 w-[2px] h-0 bg-custom-orange transition-all duration-500 ease-out group-hover:h-full group-hover:bottom-auto group-hover:top-0"></span>
                     </div>

                     <div class="p-6 flex-grow flex flex-col">
                         <h3 class="text-xl font-bold text-gray-900 mb-2">وجبات إطعام</h3>
                         <p class="text-gray-600 text-sm mb-4 flex-grow">
                             تبرع بزكاتك وصدقاتك لإطعام أكثر من 100 ألف مستفيد في شتاء هو الأصعب على آلاف الأسر المستحقة.
                         </p>
                         <div class="flex gap-2">
                             <!-- Outline Button -->
                             <a href="#"
                                 class="flex-1 text-custom-orange bg-white border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-custom-orange hover:text-white">
                                 قدّم طلبك الآن
                             </a>

                             <!-- Primary (Filled) Button -->
                             <a href="#"
                                 class="flex-1 text-white bg-custom-orange border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-white hover:text-custom-orange">
                                 تبرع الآن
                             </a>
                         </div>
                     </div>
                 </article>

             </div>

             <div class="text-center mt-12">
                 <a href="#"
                     class="inline-flex items-center justify-center bg-custom-orange text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 hover:bg-white hover:text-custom-orange border-2 border-custom-orange focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-opacity-75">
                     <i class="fa-solid fa-arrow-left-long ml-2"></i>
                     <span>شاهد الكل</span>
                 </a>
             </div>
         </section>









         <section class="relative bg-no-repeat bg-cover bg-center py-20 flex items-center justify-center"
             style=" background-image:
            url('./assets/imgs/home/bg-1-3.png')">

             <!-- <div class="absolute inset-0 bg-blue-900 bg-opacity-80"></div> -->

             <div class="relative container mx-auto px-4 py-16 md:py-24 text-center">

                 <h2 class="text-white text-3xl md:text-4xl font-bold mb-10">
                     تقرير الاعمال السنوية لمؤسسة دار التوفيق
                 </h2>

                 <div class="flex flex-wrap items-center justify-center gap-4 md:gap-6">

                     <a href="#" dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}"
                         class="inline-flex items-center justify-center bg-primary text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 hover:bg-accent hover:shadow-lg hover:-translate-y-0.5">
                         <i class="fa-solid fa-arrow-left mr-2"></i>
                         <span>تقرير عام 2020</span>
                     </a>

                     <a href="#" dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}"
                         class="inline-flex items-center justify-center bg-primary text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 hover:bg-accent hover:shadow-lg hover:-translate-y-0.5">
                         <i class="fa-solid fa-arrow-left mr-2"></i>
                         <span>تقرير عام 2021</span>
                     </a>

                     <a href="#" dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}"
                         class="inline-flex items-center justify-center bg-primary text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 hover:bg-accent hover:shadow-lg hover:-translate-y-0.5">
                         <i class="fa-solid fa-arrow-left mr-2"></i>
                         <span>تقرير عام 2022</span>
                     </a>

                     <a href="#" dir="{{ session::get('front_language_duraction') == 'rtl' ? 'ltr' : 'rtl' }}"
                         class="inline-flex items-center justify-center bg-primary text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 hover:bg-accent hover:shadow-lg hover:-translate-y-0.5">
                         <i class="fa-solid fa-arrow-left mr-2"></i>
                         <span>تقرير عام 2023</span>
                     </a>

                 </div>

             </div>
         </section>
         <section class="py-16 md:py-24">
             <div class="container mx-auto px-4">

                 <div class="text-center mb-12 max-w-3xl mx-auto">
                     <div class="relative mb-10">
                         <h1 class="text-sm font-extrabold text-custom-orange  mb-4">
                             شركاء النجاح </h1>

                     </div>
                     <p class="text-lg text-gray-600 leading-relaxed">
                         شركاء نجاح مؤسسة دار التوفيق
                     </p>
                 </div>

                 <!-- Swiper -->
                 <div class="swiper partners-swiper">
                     <div class="swiper-wrapper">
                         <!-- توليد 19 شريكًا -->
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p1.png" alt="Partner 1"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p2.png" alt="Partner 2"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p3.png" alt="Partner 3"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p4.png" alt="Partner 4"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p5.png" alt="Partner 5"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p6.png" alt="Partner 6"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p7.png" alt="Partner 7"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p8.png" alt="Partner 8"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p9.png" alt="Partner 9"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p10.png" alt="Partner 10"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p11.png" alt="Partner 11"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p12.png" alt="Partner 12"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p13.png" alt="Partner 13"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p14.png" alt="Partner 14"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p15.png" alt="Partner 15"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p16.png" alt="Partner 16"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p17.png" alt="Partner 17"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p18.png" alt="Partner 18"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="./assets/imgs/home/p19.png" alt="Partner 19"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                     </div>

                     <!-- أزرار التحكم -->
                     <div class="swiper-button-next !text-primary"></div>
                     <div class="swiper-button-prev !text-primary"></div>

                     <!-- النقاط -->
                     <div class="swiper-pagination mt-6"></div>
                 </div>
             </div>
         </section>


     </main>

 @stop

 @section('js')
     <script>
         // تحميل البيانات عند تحميل الصفحة
         loadHomeData();

         function loadHomeData(city = "Cairo") {
             fetch(`/api/home-data?city=${city}&country=Egypt`)
                 .then(res => res.json())
                 .then(data => {

                     // مواقيت الصلاة
                     const p = data.prayer;
                     document.querySelector("#prayer-times").innerHTML = `
                <li>الفجر: <span>${p.Fajr}</span></li>
                <li>الظهر: <span>${p.Dhuhr}</span></li>
                <li>العصر: <span>${p.Asr}</span></li>
                <li>المغرب: <span>${p.Maghrib}</span></li>
                <li>العشاء: <span>${p.Isha}</span></li>
            `;

                     // القرآن
                     const q = data.quran;
                  //   document.querySelector("#quran-title").textContent = `سورة ${q.surah_name}`;
                     document.querySelector("#quran-ayah").innerHTML =
                         q.ayahs.map(a => a.text + '(' + a.numberInSurah + ')').join("<br>");

                     // الصوت
                     const audio = document.querySelector("#quran-audio");
                     audio.classList.remove("hidden");
                     document.querySelector("#quran-audio-src").src = q.audio;
                     audio.load();
                     // الطقس
                     const w = data.weather;
                     document.querySelector("#weather-city").textContent = 'القاهره';
                     document.querySelector("#weather-temp").textContent = w.temp + "°C";
                     document.querySelector("#weather-humidity").textContent = w.humidity + "%";
                     document.querySelector("#weather-wind").textContent = w.wind + " m/s";
                     document.querySelector("#weather-desc").textContent = w.desc;

                 });
         }

         document.querySelector("#loadQuran").addEventListener("click", function() {
             let surah = document.querySelector("#quran-surah").value;


             fetch(`/api/quran/${surah}`)
                 .then(res => res.json())
                 .then(data => {

                     document.querySelector("#quran-title").textContent =
                         ` ${data.surah_name}`;

                     document.querySelector("#quran-ayah").innerHTML =
                         data.ayahs.filter(a => a.numberInSurah <= 10).map(a => `
                    <div>
                        ${a.text} (${a.numberInSurah})
                      
                    </div>
                `).join("");
                     //   <audio controls class="w-full mt-1">
                     //                             <source src="${data.ayah_audio_base}${a.number}.mp3" type="audio/mpeg">
                     //                         </audio>
                     const audio = document.querySelector("#quran-audio");
                     audio.classList.remove("hidden");
                     document.querySelector("#quran-audio-src").src = data.audio;
                     audio.load();
                 });
         });

         document.querySelector("#refreshWeather").addEventListener("click", function() {
             let city = document.querySelector("#global-city").value;
            const select = document.querySelector("#global-city");
                const selectedOption = select.options[select.selectedIndex];

            // const city = select.value;
            const city_ar = selectedOption.dataset.value || "القاهره";
            const longitude = selectedOption.dataset.longitude || "31.2357";
            const latitude = selectedOption.dataset.latitude || "30.0444";

             fetch(`/api/weather-data?city=${city}&longitude=${longitude}&latitude=${latitude}`)
                 .then(res => res.json())
                 .then(data => {
 
                      // الطقس
                     const w = data.weather;
                     document.querySelector("#weather-city").textContent = city_ar;
                     document.querySelector("#weather-temp").textContent = w.temp + "°C";
                     document.querySelector("#weather-humidity").textContent = w.humidity + "%";
                     document.querySelector("#weather-wind").textContent = w.wind + " m/s";
                     document.querySelector("#weather-desc").textContent = w.desc;

                 });
         });


         document.querySelector("#refreshPrayer").addEventListener("click", function() {
             let city = document.querySelector("#global-city").value;
            const select = document.querySelector("#global-city");
                const selectedOption = select.options[select.selectedIndex];

            // const city = select.value;
                const city_ar = selectedOption.dataset.value || "Cairo";
             fetch(`/api/prayer-data?city=${city}&country=Egypt`)
                 .then(res => res.json())
                 .then(data => {

                     // مواقيت الصلاة
                     const p = data.prayer;
                     document.querySelector("#prayer-city").innerHTML = city_ar;

                     document.querySelector("#prayer-times").innerHTML = `
                <li>الفجر: <span>${p.Fajr}</span></li>
                <li>الظهر: <span>${p.Dhuhr}</span></li>
                <li>العصر: <span>${p.Asr}</span></li>
                <li>المغرب: <span>${p.Maghrib}</span></li>
                <li>العشاء: <span>${p.Isha}</span></li>
            `;

                 });
         });


     </script>
 @stop
