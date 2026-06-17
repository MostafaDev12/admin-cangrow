  @extends('layouts.front')

  @section('title')

      {{ $service->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop


  @section('content')
      @php
          $phones = explode(',', $gs->phones);
          $emails = explode(',', $gs->emails);

          $randomPhone = Arr::random($phones);
      @endphp
      <!-- Service Hero Banner -->
<section class="relative w-full overflow-hidden text-white
                aspect-[750/500] md:aspect-auto md:h-[550px]">

    <!-- Mobile Background -->
    <img
        src="{{ asset('assets/images/about/about-slider-mobile.webp') }}"
        alt="{{ trim(html_entity_decode(strip_tags($service->{'title_' . $sign}))) }}"
        class="absolute inset-0 block md:hidden
               h-full w-full object-cover object-center"
        fetchpriority="high"
        decoding="async">

    <!-- Desktop Background -->
    <img
        src="{{ asset('assets/images/about/about-slider.webp') }}"
        alt="{{ trim(html_entity_decode(strip_tags($service->{'title_' . $sign}))) }}"
        class="absolute inset-0 hidden md:block
               h-full w-full object-cover object-center"
        fetchpriority="high"
        decoding="async">

    <!-- Unified Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r
                from-[#1558e8]/70
                via-[#168db5]/60
                to-[#0ca85f]/70">
    </div>

    <!-- Content -->
    <div class="relative z-10 flex h-full items-center justify-center px-4 md:px-16">
        <div class="max-w-4xl text-center">

            <h1 class="text-2xl sm:text-4xl lg:text-5xl
                       font-bold leading-tight drop-shadow-lg">
                {{ trim(html_entity_decode(strip_tags($service->{'title_' . $sign}))) }}
            </h1>

            @if(!empty($service->{'short_details_' . $sign}))
                <p class="mx-auto mt-5 max-w-2xl
                          text-sm sm:text-lg
                          leading-7 sm:leading-8
                          text-white/95 drop-shadow-md">
                    {{ trim(html_entity_decode(strip_tags($service->{'short_details_' . $sign}))) }}
                </p>
            @endif

        </div>
    </div>

</section>
      <!--<div class="bg-gradient-to-r from-blue-500 to-green-600 text-white py-16 px-4 md:px-16">-->
      <!--    <div class="text-center px-4">-->
      <!--        <h1 class="text-xl sm:text-4xl font-bold mb-4"> {{ $service->{'title_' . $sign} }} </h1>-->
      <!--        <p class="text-sm sm:text-lg max-w-2xl mx-auto">-->

      <!--        </p>-->
      <!--    </div>-->
      <!--</div>-->


      <section class="container mx-auto px-4 py-8 lg:px-8 xl:max-w-7xl">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
              <section class="lg:col-span-8">
                  <div class="prose prose-lg max-w-none text-gray-700">
                      {{-- <p class="text-base sm:text-lg leading-relaxed">
                        نسعى في مركز <strong>Tooth Guard</strong>، بقيادة <strong>الدكتور محمد حجاب</strong>، إلى تقديم
                        أفضل حلول العناية بالأسنان، مع التركيز على أحدث التقنيات وأعلى معايير الجودة لضمان رضاكم
                        وراحتكم. تتضمن خدماتنا مجموعة واسعة من العلاجات التي تغطي جميع احتياجات أسنانك.
                    </p> --}}
                      <img src="{{ $service->photo }}" alt="خدمات Tooth Guard للأسنان"
                          class="w-full max-w-[602px] h-auto rounded-lg shadow-md mx-auto my-6">
                          
                          
                          
                          <!-- ACTION BUTTONS -->
<div class="mt-6 mb-8 flex flex-col sm:flex-row items-center justify-center gap-4 not-prose">

    <!-- WhatsApp Button -->
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $randomPhone) }}" target="_blank"
       class="inline-flex items-center justify-center gap-2 bg-[#12a86b] hover:bg-[#0e8f5b] text-white px-8 py-3 rounded-xl font-bold transition w-full sm:w-auto min-w-[220px] shadow-md">
        <i class="fa-brands fa-whatsapp text-xl"></i>
        تواصل عبر واتساب
    </a>

    <!-- Booking Button -->
   <button
    type="button"
    onclick="document.getElementById('bottomBookingForm').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    })"
    class="inline-flex items-center justify-center gap-2 bg-[#1670d8] hover:bg-[#115db5] text-white px-8 py-3 rounded-xl font-bold transition w-full sm:w-auto min-w-[220px] shadow-md">

    <i class="fa-regular fa-calendar"></i>
    احجز معنا
</button>

</div>
            
                      {{-- <h2 class="text-2xl sm:text-3xl font-bold text-blue-800 mt-8 mb-4">خدماتنا الرئيسية</h2> --}}
                      {{-- <p class="text-base sm:text-lg leading-relaxed">
                        نقدم في Tooth Guard حلولًا شاملة لمختلف مشاكل الأسنان، تشمل:
                    </p>
                    
                    <ul class="space-y-4">
                        <li>
                            <h3 class="font-semibold text-xl text-blue-700">زراعة الأسنان</h3>
                            <ul class="pr-6 list-disc">
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>زراعة الأسنان التقليدية:</strong> حل دائم لاستعادة الأسنان المفقودة باستخدام
                                    غرسات معدنية تُزرع داخل عظم الفك، مناسبة لمن لديهم كمية كافية من العظم.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>زراعة الأسنان الفورية:</strong> تتيح لك الحصول على أسنان جديدة في وقت قياسي
                                    بعد خلع السن مباشرة، مما يقلل فترة الشفاء ويعزز الثقة بالنفس.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>زراعة الأسنان بالليزر:</strong> تقنية متقدمة تقلل الألم والنزيف، وتساعد في
                                    معالجة مشاكل اللثة ونقص عظم الفك، مما يضمن نتائج دقيقة وسريعة.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>الزرع الزائد (Overdentures):</strong> بديلاً فعالاً لأطقم الأسنان التقليدية،
                                    حيث توضع الأطقم فوق الغرسات لتعزيز الاستقرار والثبات، وتحسين المضغ والتحدث.
                                </li>
                            </ul>
                        </li>
                        <li>
                            <h3 class="font-semibold text-xl text-blue-700">بدائل زراعة الأسنان</h3>
                            <ul class="pr-6 list-disc">
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>أطقم الأسنان:</strong> حلول مرنة لتعويض الأسنان المفقودة، متوفرة كأطقم جزئية
                                    أو كاملة، وتوفر راحة وفعالية دون الحاجة للجراحة.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>جسور الأسنان:</strong> تركيبات صناعية ثابتة تعوض سنًا واحدًا أو أكثر، وتوفر
                                    مظهرًا طبيعيًا وتعد من الخيارات الاقتصادية الفعالة.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>تيجان الأسنان:</strong> تُستخدم لتغطية وحماية الأسنان المتضررة من التسوس أو
                                    الكسر، وتعزز مظهرها وقوتها.
                                </li>
                            </ul>
                        </li>
                        <li>
                            <h3 class="font-semibold text-xl text-blue-700">خدمات تجميل الأسنان</h3>
                            <ul class="pr-6 list-disc">
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>هوليود سمايل:</strong> تصميم ابتسامة أحلامك من خلال مجموعة من الإجراءات
                                    التجميلية لتحقيق المظهر الجمالي المثالي لأسنانك.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>تبييض الأسنان:</strong> إجراءات متقدمة لإزالة التصبغات وتفتيح لون الأسنان،
                                    لمنحك ابتسامة أكثر إشراقًا وجاذبية.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>فينير الأسنان:</strong> قشور رقيقة تُصنع خصيصًا لتغطية السطح الخارجي
                                    للأسنان، لتحسين شكلها ولونها وحجمها.
                                </li>
                            </ul>
                        </li>
                        <li>
                            <h3 class="font-semibold text-xl text-blue-700">خدمات العناية بالأسنان العامة</h3>
                            <ul class="pr-6 list-disc">
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>تركيب تقويم الأسنان:</strong> حلول فعالة لتصحيح وضع الأسنان غير المنتظم
                                    ومشاكل الإطباق، لتحقيق تناسق وظيفي وجمالي.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>تنظيف الأسنان من الجير:</strong> إزالة الترسبات الكلسية والبلاك لضمان صحة
                                    اللثة والوقاية من أمراض الفم.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>حشو الأسنان الأمامية:</strong> استخدام مواد تجميلية مطابقة للون الأسنان
                                    لإصلاح التسوس أو التلف في الأسنان الأمامية بشكل غير ظاهر.
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <p class="text-base sm:text-lg leading-relaxed mt-8">
                        لمعرفة المزيد عن أي من خدماتنا أو لحجز موعد مع <strong>الدكتور محمد حجاب</strong>، يرجى التواصل
                        معنا عبر الأرقام التالية: <strong><a href="tel:+201555004694"
                                class="text-blue-500 hover:underline">01555004694</a></strong> أو زيارة صفحة <strong><a
                                href="/contact-us" class="text-blue-500 hover:underline">اتصل بنا</a></strong> على
                        موقعنا الإلكتروني.
                    </p>
                    <img src="https://lh7-rt.googleusercontent.com/docsz/AD_4nXed0VMQVa78LPAOVobwdQKWKAqi5p3AqYKAJ4yvN4Y2ixOkrtayD80sNDjf-UK60JcoKj0ykfSaS_18wYR4LKfhFeMDC6sVWHqonqgp3phg8aIYCAwT0KwAdN7CfL-zuKHAD1DRuw?key=djlwP8pSwsamfzcrnW3LUqNO"
                        alt="مركز Tooth Guard لخدمات الأسنان"
                        class="w-full max-w-[602px] h-auto rounded-lg shadow-md mx-auto my-6"> --}}
             <div class="service-details">
    {!! $service->{'details_' . $sign} !!}
</div>

<!-- SERVICE VIDEO DYNAMIC SECTION -->
@php
    $youtubeValue = trim($service->youtube_video_url ?? '');
    $youtubeId = '';

    if ($youtubeValue !== '') {
        if (str_contains($youtubeValue, 'youtube.com') || str_contains($youtubeValue, 'youtu.be')) {
            preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([^\&\?\/]+)/', $youtubeValue, $matches);
            $youtubeId = $matches[1] ?? '';
        } else {
            $youtubeId = $youtubeValue;
        }
    }
@endphp

@if($youtubeId !== '')
<section class="block w-full py-8 bg-[#f8fbff]">
    <div class="container mx-auto px-4 lg:px-8 xl:max-w-6xl">

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden p-4 md:p-8">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8 items-center">

                <!-- Video -->
                <div class="w-full order-1 lg:order-1">
                    <div class="relative w-full overflow-hidden rounded-2xl bg-black shadow-sm h-[220px] sm:h-[280px] md:h-[340px]">
                        <iframe
                            class="block w-full h-full"
                            src="https://www.youtube.com/embed/{{ $youtubeId }}"
                            title="فيديو {{ $service->{'title_' . $sign} ?? 'الخدمة' }}"
                            frameborder="0"
                            loading="lazy"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <!-- Text -->
                <div class="text-center lg:text-right order-2 lg:order-2">

                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-blue-50 text-[#1670d8] text-sm font-bold mb-4">
                        فيديو توضيحي
                    </span>

                    <h3 class="text-xl md:text-3xl font-extrabold text-[#1670d8] mb-4 leading-tight">
                        شاهد فيديو عن {{ $service->{'title_' . $sign} }}
                    </h3>

                    <p class="text-gray-600 leading-8 mb-6">
                        تعرف على أهم التفاصيل بطريقة بسيطة قبل حجز استشارتك.
                    </p>

                    <button type="button"
                            onclick="document.getElementById('globalBookingModal').classList.remove('hidden'); document.body.style.overflow = 'hidden';"
                            class="inline-flex items-center justify-center gap-2 border border-[#1670d8] text-[#1670d8] hover:bg-[#1670d8] hover:text-white px-7 py-3 rounded-xl font-bold transition">
                        احجز الآن
                        <i class="fa-regular fa-calendar"></i>
                    </button>

                </div>

            </div>

        </div>

    </div>
</section>
@endif

<!-- BEFORE / AFTER DYNAMIC SECTION -->
@if(!empty($service->beforeAfters) && $service->beforeAfters->count())

<section class="not-prose my-12">

    <!-- Section Heading -->
    <div dir="rtl" class="mb-10 text-center">

        <span
            class="mb-4 inline-flex items-center gap-2
                   rounded-full bg-blue-50
                   px-4 py-2
                   text-sm font-bold text-[#1670d8]"
        >
            <i class="fa-solid fa-wand-magic-sparkles text-xs"></i>

            {{ __('قبل وبعد') }}
        </span>

        <h2
            class="text-2xl font-extrabold
                   leading-tight text-[#1670d8]
                   md:text-4xl"
        >
            {{ __('نتائج') }}
            {{ $service->{'title_' . $sign} }}
        </h2>

        <p
            class="mx-auto mt-3 max-w-2xl
                   text-sm leading-8 text-gray-600
                   md:text-base"
        >
            {{ __('شاهد الفرق قبل وبعد العلاج من خلال صور توضيحية للحالات.') }}
        </p>

    </div>

    <!-- Main Board -->
    <div
        class="relative overflow-hidden
               rounded-[28px] border border-[#cdeedd]
               bg-gradient-to-br
               from-[#eefaf3] via-white to-[#edf7ff]
               p-4 shadow-[0_25px_80px_rgba(15,39,64,0.08)]
               sm:p-6 md:rounded-[40px] md:p-10"
    >

        <!-- Background Decorations -->
        <div
            class="pointer-events-none absolute
                   -left-20 -top-20
                   h-72 w-72 rounded-full
                   bg-[#1670d8]/10 blur-3xl"
        ></div>

        <div
            class="pointer-events-none absolute
                   -bottom-24 -right-20
                   h-80 w-80 rounded-full
                   bg-[#12a86b]/10 blur-3xl"
        ></div>

        <!-- Cases -->
        <div class="relative z-10 space-y-8 md:space-y-12">

            @foreach($service->beforeAfters as $case)

                @php
                    /*
                     * لو الباك بيرجع لينك الصورة جاهز،
                     * استخدم $case->before_photo مباشرة.
                     *
                     * لو بيخزن المسار داخل storage،
                     * استخدم Storage::url().
                     */

                    $beforePhoto = \Illuminate\Support\Facades\Storage::url(
                        $case->before_photo
                    );

                    $afterPhoto = \Illuminate\Support\Facades\Storage::url(
                        $case->after_photo
                    );
                @endphp

                <div
                    class="grid grid-cols-1
                           items-stretch gap-4
                           md:grid-cols-2 md:gap-7"
                >

                    <!-- Before Card -->
                    <article
                        @class([
                            'group overflow-hidden rounded-[22px] border-4 border-white bg-white',
                            'shadow-[0_18px_55px_rgba(15,39,64,0.13)]',
                            'transition-all duration-300 hover:-translate-y-1',
                            'md:order-1' => $loop->odd,
                            'md:order-2' => $loop->even,
                        ])
                    >

                        <div class="relative overflow-hidden">

                            <img
                                src="{{ $beforePhoto }}"
                                alt="{{ __('قبل') }} {{ $service->{'title_' . $sign} }}"
                                loading="lazy"
                                decoding="async"
                                width="1000"
                                height="830"
                                class="h-[230px] w-full object-cover
                                       transition-transform duration-500
                                       group-hover:scale-[1.03]
                                       sm:h-[300px] md:h-[360px]"
                            >

                            <span
                                class="absolute left-3 top-3
                                       rounded-full bg-[#1670d8]
                                       px-4 py-2
                                       text-xs font-extrabold
                                       text-white shadow-md
                                       md:left-5 md:top-5 md:text-sm"
                            >
                                {{ __('قبل') }}
                            </span>

                            <div
                                class="pointer-events-none absolute inset-0
                                       bg-gradient-to-t
                                       from-black/20 via-transparent to-transparent"
                            ></div>

                        </div>

                        @if(!empty($case->{'title_' . $sign}))
                            <div dir="rtl" class="p-5 text-right">

                                <h3
                                    class="text-lg font-extrabold
                                           text-[#1670d8] md:text-xl"
                                >
                                    {{ $case->{'title_' . $sign} }}
                                </h3>

                            </div>
                        @endif

                    </article>

                    <!-- After Card -->
                    <article
                        @class([
                            'group overflow-hidden rounded-[22px] border-4 border-white bg-white',
                            'shadow-[0_18px_55px_rgba(15,39,64,0.13)]',
                            'transition-all duration-300 hover:-translate-y-1',
                            'md:order-2' => $loop->odd,
                            'md:order-1' => $loop->even,
                        ])
                    >

                        <div class="relative overflow-hidden">

                            <img
                                src="{{ $afterPhoto }}"
                                alt="{{ __('بعد') }} {{ $service->{'title_' . $sign} }}"
                                loading="lazy"
                                decoding="async"
                                width="1000"
                                height="830"
                                class="h-[230px] w-full object-cover
                                       transition-transform duration-500
                                       group-hover:scale-[1.03]
                                       sm:h-[300px] md:h-[360px]"
                            >

                            <span
                                class="absolute right-3 top-3
                                       rounded-full bg-[#12a86b]
                                       px-4 py-2
                                       text-xs font-extrabold
                                       text-white shadow-md
                                       md:right-5 md:top-5 md:text-sm"
                            >
                                {{ __('بعد') }}
                            </span>

                            <div
                                class="pointer-events-none absolute inset-0
                                       bg-gradient-to-t
                                       from-black/20 via-transparent to-transparent"
                            ></div>

                        </div>

                        @if(!empty($case->{'description_' . $sign}))
                            <div dir="rtl" class="p-5 text-right">

                                <p
                                    class="text-sm leading-7
                                           text-gray-600 md:text-base"
                                >
                                    {{ $case->{'description_' . $sign} }}
                                </p>

                            </div>
                        @endif

                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>

@endif
<!-- END BEFORE / AFTER DYNAMIC SECTION -->
<!-- SERVICE VIDEO DYNAMIC SECTION -->
            </div>
              </section>

              <aside class="lg:col-span-4 mt-8 lg:mt-0">
                  <div class="bg-white shadow-xl rounded-xl p-6 md:p-8 border border-gray-100">
                      <div class="mb-10">
                          <h3 class="text-2xl font-extrabold text-blue-900 border-b-2 border-blue-300 pb-3 mb-5">
                              <i class="fas fa-tooth text-blue-600 ml-2"></i> {{ __('خدماتنا المميزة') }}
                          </h3>
                          <ul class="space-y-3">
                              @foreach ($services as $servic)
                                  <li>
                                      <a href="{{ route('single-service.index'.$lang, ['slug' => $servic->{'slug_' . $sign} ,'lang'=> $lang]) }}"
                                          class="flex items-center text-gray-700 hover:text-blue-700 transition-all duration-300 transform hover:translate-x-1">
                                          <i class="fas fa-angle-left text-blue-500 text-sm ml-2"></i>
                                          {{ $servic->{'title_' . $sign} }}
                                      </a>
                                  </li>
                              @endforeach

                          </ul>
                      </div>
                      @if (count($faqs) > 0)
                          <div class="mb-10">
                              <h3 class="text-2xl font-extrabold text-blue-900 border-b-2 border-blue-300 pb-3 mb-5">
                                  <i class="fas fa-question-circle text-blue-600 ml-2"></i>
                                  {{ __('الأسئلة الشائعة حول خدماتنا') }}
                              </h3>
                              @foreach ($faqs as $faq)
                                  <div class="faq-item">
                                      <div class="faq-question">
                                          <h4
                                              class="text-lg font-semibold text-blue-800 hover:text-blue-900 transition-colors duration-200">
                                              {{ $faq->{'title_' . $sign} }}
                                          </h4>
                                          <i class="fas fa-chevron-down text-blue-500"></i>
                                      </div>
                                      <div class="faq-answer">
                                          <p class="text-gray-600 pt-2 pb-3 text-base leading-relaxed">
                                              {{ $faq->{'details_' . $sign} }}
                                          </p>
                                      </div>
                                  </div>
                              @endforeach

                          </div>

                      @endif
                      <div>
                          <h3 class="text-2xl font-extrabold text-blue-900 border-b-2 border-blue-300 pb-3 mb-5">
                              <i class="fas fa-newspaper text-blue-600 ml-2"></i> {{ __('مقالات مفيدة') }}
                          </h3>
                          <ul class="space-y-5">

                              @foreach (App\Models\Blog::orderBy('blog_date', 'desc')->limit(3)->get() as $k => $blogg)
                                  @php
                                      $k++;
                                  @endphp
                                  <li class="flex items-start">
                                      <img src="{{ $blogg->photo }}" alt="صورة مقالة"
                                          class="w-24 h-24 object-cover rounded-lg shadow-sm ml-4 flex-shrink-0" />
                                      <div>
                                          <a href="{{ route('single-blog.index'.$lang, ['blog' =>$blogg->{'slug_' . $sign} ,'lang'=> $lang ]) }}"
                                              class="font-bold text-gray-800 hover:text-blue-700 text-lg leading-snug">
                                              {{ strip_tags($blogg->{'title_' . $sign} ) }}
                                          </a>
                                          <p class="text-sm text-gray-500 mt-1">
                                              {{ $blogg->blog_date }}
                                          </p>
                                      </div>
                                  </li>
                              @endforeach

                          </ul>
                      </div>
        @include('components.booking-form', [
    'variant' => 'sidebar',
    'formId' => 'bookingFormBox',
    'wrapperClass' => 'mt-6'
])
                  </div>
              </aside>
          </div>
      </section>
      
<div id="bottomBookingForm" class="scroll-mt-24">
    @include('components.booking-form', [
        'variant' => 'wide',
        'formId' => 'bottomBookingFormFields'
    ])
</div>
<style>
    .service-details {
        color: #374151;
        font-size: 17px;
        line-height: 2;
    }

    .service-details h1,
    .service-details h2,
    .service-details h3,
    .service-details h4 {
        color: #10233f;
        font-weight: 800;
        line-height: 1.5;
        margin-top: 28px;
        margin-bottom: 12px;
    }

    .service-details h2 {
        font-size: 26px;
    }

    .service-details h3 {
        font-size: 22px;
    }

    .service-details h4 {
        font-size: 19px;
    }

    .service-details p {
        margin-top: 0;
        margin-bottom: 18px;
        line-height: 2;
    }

    .service-details ul,
    .service-details ol {
        margin-top: 12px;
        margin-bottom: 20px;
        padding-right: 24px;
    }

    .service-details ul {
        list-style: disc;
    }

    .service-details ol {
        list-style: decimal;
    }

    .service-details li {
        margin-bottom: 8px;
    }

    .service-details strong {
        font-weight: 800;
        color: #10233f;
    }

    @media (max-width: 640px) {
        .service-details {
            font-size: 15px;
            line-height: 1.9;
        }

        .service-details h2 {
            font-size: 22px;
        }

        .service-details h3 {
            font-size: 19px;
        }
    }
</style>

  @stop
