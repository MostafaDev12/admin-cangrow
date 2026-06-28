@extends('layouts.front')

@section('title')
    {{ __('السياحة العلاجية') }} - {{ $gs->{'title_' . $sign} }}
@stop

@section('gsearch')
    <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}" />
@stop

@section('content')
  @php
    $phones = !empty($gs->phones) ? array_filter(array_map('trim', explode(',', $gs->phones))) : [];
    $randomPhone = count($phones) ? \Illuminate\Support\Arr::random($phones) : '201555004694';
    $whatsappPhone = preg_replace('/\D+/', '', $randomPhone);

$treatments = [
    [
        'img' => 'تقويم الاسنان.png',
        'title' => __('تقويم الأسنان'),
        'text' => __('حلول متطورة للحصول على ابتسامة متناسقة'),
        'details' => __('شفاف ومعدني للأطفال والكبار'),
        'duration' => __('6 - 18 شهر'),
        'slug' => 'تقويم-الأسنان',
        'icon' => 'fa-shield-heart',
    ],
    [
        'img' => 'هوليود اسمايل.png',
        'title' => __('هوليوود سمايل'),
        'text' => __('تصميم ابتسامة مثالية بمظهر جذاب'),
        'details' => __('عدسات، تصميم، تجميل تصميم الابتسامة الرقمي'),
        'duration' => __('4 - 4 أيام'),
        'slug' => 'هوليود-سمايل',
        'icon' => 'fa-wand-magic-sparkles',
    ],
    [
        'img' => 'تبيض الاسنان.png',
        'title' => __('تبييض الأسنان'),
        'text' => __('ابتسامة أكثر إشراقًا ولونًا أنقى'),
        'details' => __('تبييض بالليزر وتبييض منزلي بنتائج سريعة وآمنة'),
        'duration' => __('جلسة واحدة'),
        'slug' => 'تبييض-الأسنان',
        'icon' => 'fa-briefcase-medical',
    ],
    [
        'img' => 'زراعة الاسنان.png',
        'title' => __('زراعة الأسنان'),
        'text' => __('حلول دائمة لتعويض الأسنان المفقودة'),
        'details' => __('استعادة جذور الأسنان المفقودة بأمانة دائمة'),
        'duration' => __('3 - 5 أيام'),
        'slug' => 'زراعة-الأسنان',
        'icon' => 'fa-tooth',
    ],
    [
        'img' => 'علاج الجذور.png',
        'title' => __('علاج الجذور'),
        'text' => __('علاج دقيق للحفاظ على الأسنان الطبيعية'),
        'details' => __('علاج دقيق للحفاظ على الأسنان الطبيعية وتقليل الألم'),
        'duration' => __('1 - 3 جلسات'),
        'slug' => 'علاج-الجذور',
        'icon' => 'fa-stethoscope',
    ],
    [
        'img' => 'علاج اللثة.png',
        'title' => __('علاج اللثة'),
        'text' => __('رعاية متخصصة لصحة اللثة والأسنان'),
        'details' => __('تنظيف عميق وعلاج التهابات اللثة ومتابعة مستمرة'),
        'duration' => __('1 - 2 جلسة'),
        'slug' => 'علاج-اللثة',
        'icon' => 'fa-shield-heart',
    ],
    [
        'img' => 'حشو الاسنان.png',
        'title' => __('حشو الأسنان'),
        'text' => __('حشوات آمنة لعلاج التسوس واستعادة شكل السن'),
        'details' => __('حشوات تجميلية بلون السن لعلاج التسوس بشكل طبيعي'),
        'duration' => __('جلسة واحدة'),
        'slug' => 'حشو-الاسنان',
        'icon' => 'fa-circle-plus',
    ],
    [
        'img' => 'الحشوات التجملية.png',
        'title' => __('الحشوات التجميلية'),
        'text' => __('حشوات بلون طبيعي لتحسين شكل الابتسامة'),
        'details' => __('حشوات تجميلية عالية الجودة بلون طبيعي ومظهر متناسق'),
        'duration' => __('جلسة واحدة'),
        'slug' => 'الحشوات-التجميلية',
        'icon' => 'fa-atom',
    ],
    [
        'img' => 'اسنان الاطفال.png',
        'title' => __('طب أسنان الأطفال'),
        'text' => __('رعاية لطيفة وآمنة لصحة أسنان الأطفال'),
        'details' => __('كشف وعلاج وقائي للأطفال بطريقة مريحة وآمنة'),
        'duration' => __('حسب الحالة'),
        'slug' => 'طب-اسنان-الاطفال',
        'icon' => 'fa-child',
    ],
];
    @endphp

<main class="medical-tourism-page">
<!-- HERO -->
<section class="bg-[#f4f7fb] py-6 md:py-9">
    <div class="container mx-auto px-3 md:px-4">

        <div class="rounded-[28px] border border-black/5 bg-white p-4 shadow-[0_15px_45px_rgba(15,23,42,0.06)] md:p-6 lg:p-8">

            <div class="grid items-stretch gap-6 lg:grid-cols-[1.05fr_0.95fr] lg:gap-9">

     <!-- LEFT SIDE -->
<div class="order-1 flex h-full flex-col gap-5">

    <!-- Image Card -->
    <div class="relative h-[280px] overflow-hidden rounded-[22px] bg-black shadow-[0_18px_40px_rgba(15,23,42,0.14)] sm:h-[340px] md:h-[390px] lg:h-[420px]">
        <img
            src="{{ asset('assets/images/Medical tourism/hero.png') }}"
            alt="{{ __('السياحة العلاجية للأسنان في مصر') }}"
            class="absolute inset-0 h-full w-full object-cover object-[52%_26%]"
        >
        <div class="absolute inset-0 bg-[linear-gradient(180deg,rgba(255,255,255,0.02),rgba(0,0,0,0.12))]"></div>
    </div>

    <!-- Mobile Title هنا بعد الصورة مباشرة -->
    <div class="block text-center lg:hidden">
        <h1 class="mb-3 text-[30px] font-black leading-[1.22] sm:text-[36px]">
            <span class="text-[#111827]">
                {{ __('السياحة العلاجية') }}
            </span>
            <br>
            <span class="text-[#f39a21]">
                {{ __('للأسنان في مصر') }}
            </span>
        </h1>

        <p class="text-[14px] font-bold leading-7 text-[#374151] sm:text-[16px]">
            {{ __('علاج عالمي، ابتسامة تدوم، تجربة لا تُنسى') }}
        </p>
    </div>

    <!-- Features Box under title on mobile -->
    <div class="grid w-full grid-cols-2 gap-y-4 rounded-[18px] bg-[#0b0b0b] px-4 py-5 shadow-[0_18px_45px_rgba(0,0,0,0.14)] md:grid-cols-4 md:gap-y-0">

        <div class="px-2 text-center md:border-l md:border-white/15">
            <i class="fa-solid fa-user-doctor mb-2 block text-[24px] text-[#f39a21] md:text-[27px]"></i>
            <strong class="block text-[11px] font-black leading-5 text-white md:text-[12px]">
                {{ __('أطباء متخصصون') }}
            </strong>
            <small class="block text-[10px] font-bold leading-5 text-white/70 md:text-[11px]">
                {{ __('خبرة عالمية') }}
            </small>
        </div>

        <div class="px-2 text-center md:border-l md:border-white/15">
            <i class="fa-solid fa-people-group mb-2 block text-[24px] text-[#f39a21] md:text-[27px]"></i>
            <strong class="block text-[11px] font-black leading-5 text-white md:text-[12px]">
                {{ __('أحدث التقنيات') }}
            </strong>
            <small class="block text-[10px] font-bold leading-5 text-white/70 md:text-[11px]">
                {{ __('والمعدات') }}
            </small>
        </div>

        <div class="px-2 text-center md:border-l md:border-white/15">
            <i class="fa-solid fa-shield-heart mb-2 block text-[24px] text-[#f39a21] md:text-[27px]"></i>
            <strong class="block text-[11px] font-black leading-5 text-white md:text-[12px]">
                {{ __('توفير يصل إلى') }}
            </strong>
            <small class="block text-[22px] font-black leading-6 text-[#f39a21] md:text-[26px]">
                70%
            </small>
        </div>

        <div class="px-2 text-center">
            <i class="fa-solid fa-suitcase-rolling mb-2 block text-[24px] text-[#f39a21] md:text-[27px]"></i>
            <strong class="block text-[11px] font-black leading-5 text-white md:text-[12px]">
                {{ __('تجربة مريحة') }}
            </strong>
            <small class="block text-[10px] font-bold leading-5 text-white/70 md:text-[11px]">
                {{ __('من الوصول حتى المغادرة') }}
            </small>
        </div>

    </div>

</div>

                <!-- RIGHT SIDE -->
                <div class="order-2 flex h-full flex-col justify-center text-center">

                    <div class="mx-auto flex w-full max-w-[590px] flex-col justify-center">

                        <!-- Title centered -->
                        <div class="mb-8 text-center">
                            <h1 class="mb-3 text-[34px] font-black leading-[1.22] sm:text-[40px] md:text-[50px] lg:text-[58px]">
                                <span class="text-[#111827]">
                                    {{ __('السياحة العلاجية') }}
                                </span>
                                <br>
                                <span class="text-[#f39a21]">
                                    {{ __('للأسنان في مصر') }}
                                </span>
                            </h1>

                            <p class="text-[15px] font-bold leading-7 text-[#374151] sm:text-[17px] md:text-[19px]">
                                {{ __('علاج عالمي، ابتسامة تدوم، تجربة لا تُنسى') }}
                            </p>
                        </div>

                        <!-- Tourism Box moved here -->
                        <div class="mb-6 w-full rounded-[18px] border border-black/10 bg-[#0b0b0b] px-4 py-5 shadow-[0_18px_45px_rgba(0,0,0,0.14)] md:px-5">

                            <h3 class="mb-5 text-center text-[14px] font-black leading-7 text-white md:text-[16px]">
                                {{ __('استمتع بعلاجك واكتشف جمال مصر') }}
                            </h3>

                            <div class="grid grid-cols-2 gap-y-5 md:grid-cols-4 md:gap-y-0">

                                <div class="px-2 text-center md:border-l md:border-white/15">
                                    <i class="fa-solid fa-hotel mb-3 block text-[26px] text-[#f39a21] md:text-[29px]"></i>
                                    <strong class="block text-[11px] font-black leading-5 text-white md:text-[12px]">
                                        {{ __('فنادق فاخرة') }}
                                    </strong>
                                    <small class="block text-[10px] font-black leading-5 text-[#f39a21] md:text-[11px]">
                                        {{ __('بخصومات خاصة') }}
                                    </small>
                                </div>

                                <div class="px-2 text-center md:border-l md:border-white/15">
                                    <i class="fa-solid fa-map-location-dot mb-3 block text-[26px] text-[#f39a21] md:text-[29px]"></i>
                                    <strong class="block text-[11px] font-black leading-5 text-white md:text-[12px]">
                                        {{ __('جولات سياحية') }}
                                    </strong>
                                    <small class="block text-[10px] font-black leading-5 text-[#f39a21] md:text-[11px]">
                                        {{ __('وبرامج ترفيهية') }}
                                    </small>
                                </div>

                                <div class="px-2 text-center md:border-l md:border-white/15">
                                    <i class="fa-solid fa-car-side mb-3 block text-[26px] text-[#f39a21] md:text-[29px]"></i>
                                    <strong class="block text-[11px] font-black leading-5 text-white md:text-[12px]">
                                        {{ __('مواصلات') }}
                                    </strong>
                                    <small class="block text-[10px] font-black leading-5 text-[#f39a21] md:text-[11px]">
                                        VIP
                                    </small>
                                </div>

                                <div class="px-2 text-center">
                                    <i class="fa-solid fa-plane-arrival mb-3 block text-[26px] text-[#f39a21] md:text-[29px]"></i>
                                    <strong class="block text-[11px] font-black leading-5 text-white md:text-[12px]">
                                        {{ __('استقبال من') }}
                                    </strong>
                                    <small class="block text-[10px] font-black leading-5 text-[#f39a21] md:text-[11px]">
                                        {{ __('المطار') }}
                                    </small>
                                </div>

                            </div>

                        </div>

                        <!-- Buttons -->
                     @php
    $whatsappPhone = preg_replace('/\D+/', '', $whatsappPhone ?? '01016188222');

    if (str_starts_with($whatsappPhone, '0')) {
        $whatsappPhone = '20' . substr($whatsappPhone, 1);
    }

    if (strlen($whatsappPhone) === 11 && str_starts_with($whatsappPhone, '1')) {
        $whatsappPhone = '20' . $whatsappPhone;
    }

    $whatsappText = urlencode(__('مرحبًا، أريد الاستفسار عن السياحة العلاجية للأسنان في مصر'));
@endphp

<!-- Buttons -->
<div class="mx-auto flex w-full max-w-[470px] flex-col gap-3 sm:flex-row sm:justify-center">

  <button type="button"
    onclick="document.getElementById('globalBookingModal').classList.remove('hidden'); document.body.style.overflow = 'hidden';"
    class="inline-flex h-[54px] w-full items-center justify-center gap-3 rounded-xl border border-[#f39a21] bg-[#f39a21] px-5 text-[14px] font-black text-white shadow-[0_16px_36px_rgba(243,154,33,0.35)] transition duration-300 hover:-translate-y-0.5 hover:bg-[#d98212] hover:border-[#d98212] sm:w-auto md:h-[58px] md:px-7 md:text-[15px]">
    {{ __('احصل على خطة علاج الآن') }}
    <i class="fa-regular fa-calendar-days text-lg"></i>
</button>



    <a
        href="https://wa.me/{{ $whatsappPhone }}?text={{ $whatsappText }}"
        target="_blank"
        rel="noopener noreferrer"
        class="inline-flex h-[54px] w-full items-center justify-center gap-3 rounded-xl border border-black/20 bg-black px-5 text-[14px] font-black text-white no-underline transition duration-300 hover:-translate-y-0.5 hover:border-[#25D366] hover:bg-[#25D366] sm:w-auto md:h-[58px] md:px-7 md:text-[15px]">
        {{ __('تواصل معنا على واتساب') }}
        <i class="fa-brands fa-whatsapp text-[24px]"></i>
    </a>

</div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>
<!-- HERO -->
<!-- Global Booking Modal -->
<div id="globalBookingModal"
     class="fixed inset-0 z-[99999] hidden overflow-y-auto bg-black/60 px-4 py-6 backdrop-blur-sm">

    <div class="relative mx-auto w-full max-w-[520px] rounded-[28px] bg-white p-6 md:p-8 shadow-[0_25px_80px_rgba(0,0,0,0.30)]"
         dir="rtl">

        <!-- Close Button -->
        <button
            type="button"
            onclick="document.getElementById('globalBookingModal').classList.add('hidden'); document.body.style.overflow = '';"
            class="absolute -top-5 -left-5 flex h-12 w-12 items-center justify-center rounded-full bg-white text-xl font-black text-gray-700 shadow-lg transition hover:bg-gray-100">
            ×
        </button>

        <!-- Header -->
        <div class="mb-7 text-center">
            <h3 class="text-2xl md:text-3xl font-black text-[#155fa8]">
                {{ __('احجز استشارتك الآن') }}
            </h3>
            <p class="mt-2 text-sm md:text-base text-gray-500">
                {{ __('املأ البيانات وسيتم التواصل معك في أقرب وقت') }}
            </p>
        </div>

        <!-- Form -->
        <form id="tourismBookingForm" class="space-y-5">

            <!-- الاسم -->
            <div>
                <label class="mb-2 block text-right text-sm font-black text-gray-700">
                    {{ __('الاسم') }}
                </label>
                <input
                    type="text"
                    name="name"
                    required
                    placeholder="{{ __('اكتب اسمك') }}"
                    class="h-[54px] w-full rounded-xl border border-gray-200 bg-white px-4 text-right text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-[#f39a21] focus:ring-4 focus:ring-[#f39a21]/10">
            </div>

            <!-- رقم الهاتف -->
            <div>
                <label class="mb-2 block text-right text-sm font-black text-gray-700">
                    {{ __('رقم الهاتف') }}
                </label>
                <input
                    type="tel"
                    name="phone"
                    required
                    placeholder="{{ __('رقم الهاتف') }}"
                    class="h-[54px] w-full rounded-xl border border-gray-200 bg-white px-4 text-right text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-[#f39a21] focus:ring-4 focus:ring-[#f39a21]/10">
            </div>

            <!-- المدينة -->
            <div>
                <label class="mb-2 block text-right text-sm font-black text-gray-700">
                    {{ __('المدينة') }}
                </label>
                <input
                    type="text"
                    name="city"
                    placeholder="{{ __('اكتب المدينة') }}"
                    class="h-[54px] w-full rounded-xl border border-gray-200 bg-white px-4 text-right text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-[#f39a21] focus:ring-4 focus:ring-[#f39a21]/10">
            </div>

            <!-- الخدمة المطلوبة -->
            <div>
                <label class="mb-2 block text-right text-sm font-black text-gray-700">
                    {{ __('الخدمة المطلوبة') }}
                </label>
                <select
                    name="service"
                    required
                    class="h-[54px] w-full rounded-xl border border-gray-200 bg-white px-4 text-right text-gray-800 outline-none transition focus:border-[#f39a21] focus:ring-4 focus:ring-[#f39a21]/10">
                    <option value="استشارة عامة">{{ __('استشارة عامة') }}</option>
                    <option value="زراعة الأسنان">{{ __('زراعة الأسنان') }}</option>
                    <option value="تركيبات الأسنان">{{ __('تركيبات الأسنان') }}</option>
                    <option value="تقويم الأسنان">{{ __('تقويم الأسنان') }}</option>
                    <option value="ابتسامة هوليود">{{ __('ابتسامة هوليود') }}</option>
                    <option value="تبييض الأسنان">{{ __('تبييض الأسنان') }}</option>
                    <option value="حشو اسنان">{{ __('حشو اسنان') }}</option>
                    <option value="علاج اللثة">{{ __('علاج اللثة') }}</option>
                    <option value="علاج الجذور">{{ __('علاج الجذور') }}</option>
                    <option value="تنظيف الاسنان">{{ __('تنظيف الاسنان') }}</option>
                </select>
            </div>

            <!-- العنوان -->
            <div>
                <label class="mb-2 block text-right text-sm font-black text-gray-700">
                    {{ __('العنوان') }}
                </label>
                <input
                    type="text"
                    name="address"
                    placeholder="{{ __('اكتب العنوان') }}"
                    class="h-[54px] w-full rounded-xl border border-gray-200 bg-white px-4 text-right text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-[#f39a21] focus:ring-4 focus:ring-[#f39a21]/10">
            </div>

            <!-- الرسالة -->
            <div>
                <label class="mb-2 block text-right text-sm font-black text-gray-700">
                    {{ __('رسالتك') }}
                </label>
                <textarea
                    name="message"
                    rows="4"
                    placeholder="{{ __('اكتب رسالتك هنا') }}"
                    class="w-full resize-none rounded-xl border border-gray-200 bg-white px-4 py-3 text-right text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-[#f39a21] focus:ring-4 focus:ring-[#f39a21]/10"></textarea>
            </div>

            <!-- Submit -->
            <button
                type="submit"
                class="flex h-[58px] w-full items-center justify-center gap-3 rounded-xl bg-[#f39a21] text-lg font-black text-white shadow-[0_14px_30px_rgba(243,154,33,0.28)] transition hover:-translate-y-0.5 hover:bg-[#d98212]">
                {{ __('إرسال الطلب') }}
                <i class="fa-solid fa-paper-plane"></i>
            </button>

        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('tourismBookingForm');

        if (!form) return;

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const name = form.querySelector('[name="name"]').value.trim();
            const phone = form.querySelector('[name="phone"]').value.trim();
            const city = form.querySelector('[name="city"]').value.trim();
            const service = form.querySelector('[name="service"]').value.trim();
            const address = form.querySelector('[name="address"]').value.trim();
            const message = form.querySelector('[name="message"]').value.trim();

            const whatsappPhone = "{{ $whatsappPhone ?? '201016188222' }}";

            const text =
                `مرحبًا، أريد حجز استشارة%0A%0A` +
                `الاسم: ${encodeURIComponent(name)}%0A` +
                `رقم الهاتف: ${encodeURIComponent(phone)}%0A` +
                `المدينة: ${encodeURIComponent(city)}%0A` +
                `الخدمة المطلوبة: ${encodeURIComponent(service)}%0A` +
                `العنوان: ${encodeURIComponent(address)}%0A` +
                `الرسالة: ${encodeURIComponent(message)}`;

            window.open(`https://wa.me/${whatsappPhone}?text=${text}`, '_blank');

            document.getElementById('globalBookingModal').classList.add('hidden');
            document.body.style.overflow = '';
            form.reset();
        });
    });
</script>
<!-- Global Booking Modal -->

<!-- FEATURES STRIP -->
<section class="bg-white py-6 md:py-8">
    <div class="container mx-auto px-4">

        <div class="rounded-[18px] bg-[#0b0b0b] px-4 py-7 shadow-[0_18px_45px_rgba(0,0,0,0.18)]">

            <div class="grid grid-cols-1 gap-y-7 md:grid-cols-2 lg:grid-cols-5 lg:gap-y-0">

                <!-- Feature 1 -->
                <div class="px-5 text-center lg:border-l lg:border-[#9b6a24]/45">
                    <i class="fa-solid fa-shield-heart mb-4 block text-[34px] text-[#c98722]"></i>

                    <h3 class="mb-3 text-[17px] font-black leading-7 text-[#c98722]">
                        {{ __('جودة عالمية') }}
                    </h3>

                    <p class="mx-auto max-w-[180px] text-[14px] font-bold leading-8 text-white/75">
                        {{ __('معايير دولية ورعاية بأعلى مستوى') }}
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="px-5 text-center lg:border-l lg:border-[#9b6a24]/45">
                    <i class="fa-solid fa-money-bill-wave mb-4 block text-[34px] text-[#c98722]"></i>

                    <h3 class="mb-3 text-[17px] font-black leading-7 text-[#c98722]">
                        {{ __('أسعار أقل') }}
                    </h3>

                    <p class="mx-auto max-w-[190px] text-[14px] font-bold leading-8 text-white/75">
                        {{ __('وفر حتى 70% من تكلفة العلاج في أوروبا وأمريكا') }}
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="px-5 text-center lg:border-l lg:border-[#9b6a24]/45">
                    <i class="fa-solid fa-teeth-open mb-4 block text-[34px] text-[#c98722]"></i>

                    <h3 class="mb-3 text-[17px] font-black leading-7 text-[#c98722]">
                        {{ __('علاج سريع') }}
                    </h3>

                    <p class="mx-auto max-w-[185px] text-[14px] font-bold leading-8 text-white/75">
                        {{ __('إنهاء معظم الإجراءات في عدد زيارات أقل') }}
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="px-5 text-center lg:border-l lg:border-[#9b6a24]/45">
                    <i class="fa-solid fa-headset mb-4 block text-[34px] text-[#c98722]"></i>

                    <h3 class="mb-3 text-[17px] font-black leading-7 text-[#c98722]">
                        {{ __('متابعة مستمرة') }}
                    </h3>

                    <p class="mx-auto max-w-[185px] text-[14px] font-bold leading-8 text-white/75">
                        {{ __('دعم على مدار الساعة طوال فترة علاجك وبعدها') }}
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="px-5 text-center">
                    <i class="fa-regular fa-calendar-check mb-4 block text-[34px] text-[#c98722]"></i>

                    <h3 class="mb-3 text-[17px] font-black leading-7 text-[#c98722]">
                        {{ __('خطة علاج متكاملة') }}
                    </h3>

                    <p class="mx-auto max-w-[190px] text-[14px] font-bold leading-8 text-white/75">
                        {{ __('تشمل الاستشارة والأشعة والمواصلات والعلاج') }}
                    </p>
                </div>

            </div>

        </div>

    </div>
</section>
<!-- FEATURES STRIP -->

         
<!-- WHY EGYPT -->
<section class="bg-white py-8 md:py-12">
    <div class="container mx-auto px-4">

        <div class="relative overflow-hidden rounded-[26px] border border-[#c98722]/25 bg-[#080808] shadow-[0_24px_70px_rgba(0,0,0,0.18)]">

            <!-- subtle lines background -->
            <div class="absolute inset-0 opacity-35 bg-[linear-gradient(180deg,rgba(255,255,255,0.08)_0,rgba(255,255,255,0)_1px)] bg-[length:100%_42px]"></div>

            <!-- soft glow -->
            <div class="absolute right-0 top-0 h-full w-[55%] bg-[radial-gradient(circle_at_top_right,rgba(201,135,34,0.18),transparent_55%)]"></div>

            <div class="relative z-[2] grid grid-cols-1 items-center lg:grid-cols-[0.95fr_1.05fr]">

                <!-- Doctor Image -->
                <div class="order-2 flex h-[320px] items-end justify-center overflow-hidden lg:order-1 lg:h-[430px] lg:justify-start">
                    <img
                        src="{{ asset('assets/images/Medical tourism/دكتور.png') }}"
                        alt="{{ __('طبيب أسنان') }}"
                        class="h-full w-full object-cover object-[center_20%] lg:object-[left_center]"
                    >
                </div>

                <!-- Content -->
                <div class="order-1 px-5 py-8 text-center lg:order-2 lg:px-10 lg:py-10 lg:text-right">

                    <h2 class="mb-4 text-[28px] font-black leading-[1.25] text-[#f39a21] md:text-[38px] lg:text-[44px]">
                        {{ __('لماذا مصر لعلاج الأسنان؟') }}
                    </h2>

                    <p class="mx-auto mb-7 max-w-[650px] text-[15px] font-bold leading-8 text-white/75 md:text-[17px] lg:mx-0">
                        {{ __('مصر أصبحت الوجهة الأولى للسياحة العلاجية للأسنان في الشرق الأوسط وأفريقيا، بفضل الكفاءات الطبية العالية، التقنيات الحديثة، والتكاليف التنافسية مع تجربة سياحية فريدة.') }}
                    </p>

                    <!-- Stats -->
                    <div class="grid grid-cols-2 gap-3 md:grid-cols-4">

                        <div class="rounded-xl border border-[#c98722]/45 bg-black/25 px-4 py-4 text-center">
                            <div class="mb-1 text-[28px] font-black leading-none text-[#f39a21]">
                                15K+
                            </div>
                            <p class="text-[12px] font-bold leading-5 text-white/75">
                                {{ __('مريض من مختلف دول العالم') }}
                            </p>
                        </div>

                        <div class="rounded-xl border border-[#c98722]/45 bg-black/25 px-4 py-4 text-center">
                            <div class="mb-1 text-[28px] font-black leading-none text-[#f39a21]">
                                98%
                            </div>
                            <p class="text-[12px] font-bold leading-5 text-white/75">
                                {{ __('نسبة رضا المرضى') }}
                            </p>
                        </div>

                        <div class="rounded-xl border border-[#c98722]/45 bg-black/25 px-4 py-4 text-center">
                            <div class="mb-1 text-[28px] font-black leading-none text-[#f39a21]">
                                20+
                            </div>
                            <p class="text-[12px] font-bold leading-5 text-white/75">
                                {{ __('عامًا من الخبرة') }}
                            </p>
                        </div>

                        <div class="rounded-xl border border-[#c98722]/45 bg-black/25 px-4 py-4 text-center">
                            <div class="mb-1 text-[28px] font-black leading-none text-[#f39a21]">
                                5★
                            </div>
                            <p class="text-[12px] font-bold leading-5 text-white/75">
                                {{ __('تقييمات ممتازة') }}
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>
<!-- WHY EGYPT -->
<!-- TREATMENTS -->
<section class="py-10 md:py-14 bg-white overflow-hidden">
    <div class="container mx-auto px-4">

        <div class="mb-8 text-center">
            <h2 class="text-[26px] md:text-[42px] font-black leading-tight text-[#111827]">
                {{ __('علاجات الأسنان التي نقدمها') }}
            </h2>

            <p class="mt-3 text-sm md:text-lg text-[#4b5563]">
                {{ __('حلول علاجية وتجميلية متقدمة خلال فترة مناسبة لرحلتك') }}
            </p>
        </div>

        <div class="relative">

            <!-- Left Arrow -->
            <button
                type="button"
                onclick="scrollTreatments('left')"
                class="absolute left-0 top-[42%] z-30 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full border border-[#d7b878] bg-white text-[#b9892f] shadow-[0_10px_25px_rgba(0,0,0,0.10)] transition hover:bg-[#b9892f] hover:text-white md:h-11 md:w-11"
            >
                <i class="fa-solid fa-chevron-left text-sm"></i>
            </button>

            <!-- Right Arrow -->
            <button
                type="button"
                onclick="scrollTreatments('right')"
                class="absolute right-0 top-[42%] z-30 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full border border-[#d7b878] bg-white text-[#b9892f] shadow-[0_10px_25px_rgba(0,0,0,0.10)] transition hover:bg-[#b9892f] hover:text-white md:h-11 md:w-11"
            >
                <i class="fa-solid fa-chevron-right text-sm"></i>
            </button>

            <!-- Slider -->
            <div
                id="treatmentsSlider"
                class="flex gap-6 overflow-x-auto scroll-smooth pb-4"
            >
                @foreach($treatments as $treatment)
                    @php
                        $treatmentLink = !empty($treatment['slug'])
                            ? url($sign . '/service/' . $treatment['slug'])
                            : 'javascript:void(0)';
                    @endphp

                    <div class="treatment-card shrink-0">

<a href="{{ $treatmentLink }}"
   target="_blank"
   rel="noopener noreferrer"
   class="group block h-full no-underline">
                            <div class="relative h-full overflow-hidden rounded-[24px] border border-[#c98722]/25 bg-[#0b0b0b] shadow-[0_18px_45px_rgba(0,0,0,0.18)] transition duration-300 hover:-translate-y-1 hover:border-[#f39a21]/70">

                                <!-- Image -->
                                <div class="relative h-[150px] overflow-hidden rounded-t-[24px] bg-gray-200 sm:h-[165px] md:h-[175px]">
                                    <img
                                        src="{{ asset('assets/images/Medical tourism/' . $treatment['img']) }}"
                                        alt="{{ $treatment['title'] }}"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                    >

                                    <div class="absolute inset-0 bg-gradient-to-t from-[#0b0b0b]/55 via-transparent to-transparent"></div>
                                </div>

                                <!-- Icon Circle -->
                                <div class="relative -mt-8 flex justify-center">
                                    <div class="flex h-[62px] w-[62px] items-center justify-center rounded-full border-2 border-[#c98722]/70 bg-[#101010] text-[#f39a21] shadow-[0_0_25px_rgba(201,135,34,0.22)]">
                                        <i class="fa-solid {{ $treatment['icon'] ?? 'fa-tooth' }} text-[24px]"></i>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="px-5 pb-6 pt-3 text-center">

                                    <h3 class="mb-3 text-[19px] font-black leading-7 text-[#c98722] transition group-hover:text-[#f39a21]">
                                        {{ $treatment['title'] }}
                                    </h3>

                                    <p class="mx-auto mb-4 min-h-[72px] max-w-[240px] text-[14px] font-bold leading-7 text-white/75">
                                        {{ $treatment['details'] ?? $treatment['text'] }}
                                    </p>

                                    <div class="text-[17px] font-black leading-7 text-[#f39a21]">
                                        {{ $treatment['duration'] ?? '' }}
                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>
                @endforeach
            </div>

        </div>

    </div>
</section>

<style>
    #treatmentsSlider {
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    #treatmentsSlider::-webkit-scrollbar {
        display: none;
    }

    .treatment-card {
        flex: 0 0 100%;
        min-height: 390px;
    }

    @media (min-width: 768px) {
        .treatment-card {
            flex-basis: calc((100% - 24px) / 2);
            min-height: 410px;
        }
    }

    @media (min-width: 1024px) {
        .treatment-card {
            flex-basis: calc((100% - 48px) / 3);
            min-height: 405px;
        }
    }
</style>

<script>
    function scrollTreatments(direction) {
        const slider = document.getElementById('treatmentsSlider');
        const card = slider ? slider.querySelector('.treatment-card') : null;

        if (!slider || !card) return;

        const gap = 24;
        const scrollAmount = card.offsetWidth + gap;

        slider.scrollBy({
            left: direction === 'right' ? scrollAmount : -scrollAmount,
            behavior: 'smooth'
        });
    }
</script>
<!-- TREATMENTS -->

<!-- JOURNEY -->
<section class="bg-white py-8 md:py-12">
    <div class="container mx-auto px-4">

        <div class="relative overflow-hidden rounded-[22px] border border-[#c98722]/25 bg-[#080808] px-4 py-7 shadow-[0_24px_70px_rgba(0,0,0,0.16)] md:px-8 md:py-8">

            <!-- subtle background lines -->
            <div class="absolute inset-0 opacity-25 bg-[linear-gradient(180deg,rgba(255,255,255,0.08)_0,rgba(255,255,255,0)_1px)] bg-[length:100%_42px]"></div>

            <div class="relative z-[2] text-center">

                <h2 class="mb-8 text-[22px] font-black leading-8 text-[#f39a21] md:text-[28px]">
                    {{ __('رحلتك العلاجية معنا') }}
                </h2>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-6 lg:gap-0">

                    <!-- Step 1 -->
                    <div class="relative px-3 text-center lg:border-l lg:border-[#c98722]/25">
                        <div class="relative mx-auto mb-3 flex h-[54px] w-[54px] items-center justify-center rounded-full border-2 border-[#c98722] bg-[#101010] text-[22px] font-black text-[#f39a21] shadow-[0_0_25px_rgba(201,135,34,0.18)]">
                            1
                        </div>

                        <h3 class="mb-2 text-[14px] font-black text-[#f39a21]">
                            {{ __('تواصل معنا') }}
                        </h3>

                        <p class="mx-auto max-w-[140px] text-[12px] font-bold leading-6 text-white/75">
                            {{ __('واتساب أو نموذج') }}
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative px-3 text-center lg:border-l lg:border-[#c98722]/25">
                        <span class="absolute right-[-28px] top-[27px] hidden w-[56px] border-t border-dashed border-[#c98722]/70 lg:block"></span>

                        <div class="relative mx-auto mb-3 flex h-[54px] w-[54px] items-center justify-center rounded-full border-2 border-[#c98722] bg-[#101010] text-[22px] font-black text-[#f39a21] shadow-[0_0_25px_rgba(201,135,34,0.18)]">
                            2
                        </div>

                        <h3 class="mb-2 text-[14px] font-black text-[#f39a21]">
                            {{ __('استشارة وتقييم') }}
                        </h3>

                        <p class="mx-auto max-w-[140px] text-[12px] font-bold leading-6 text-white/75">
                            {{ __('من أطبائنا') }}
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative px-3 text-center lg:border-l lg:border-[#c98722]/25">
                        <span class="absolute right-[-28px] top-[27px] hidden w-[56px] border-t border-dashed border-[#c98722]/70 lg:block"></span>

                        <div class="relative mx-auto mb-3 flex h-[54px] w-[54px] items-center justify-center rounded-full border-2 border-[#c98722] bg-[#101010] text-[22px] font-black text-[#f39a21] shadow-[0_0_25px_rgba(201,135,34,0.18)]">
                            3
                        </div>

                        <h3 class="mb-2 text-[14px] font-black text-[#f39a21]">
                            {{ __('خطة علاجية') }}
                        </h3>

                        <p class="mx-auto max-w-[140px] text-[12px] font-bold leading-6 text-white/75">
                            {{ __(' وبتكلفة واضحة') }}
                        </p>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative px-3 text-center lg:border-l lg:border-[#c98722]/25">
                        <span class="absolute right-[-28px] top-[27px] hidden w-[56px] border-t border-dashed border-[#c98722]/70 lg:block"></span>

                        <div class="relative mx-auto mb-3 flex h-[54px] w-[54px] items-center justify-center rounded-full border-2 border-[#c98722] bg-[#101010] text-[22px] font-black text-[#f39a21] shadow-[0_0_25px_rgba(201,135,34,0.18)]">
                            4
                        </div>

                        <h3 class="mb-2 text-[14px] font-black text-[#f39a21]">
                            {{ __('السفر والاستقبال') }}
                        </h3>

                        <p class="mx-auto max-w-[140px] text-[12px] font-bold leading-6 text-white/75">
                            {{ __('من المطار') }}
                        </p>
                    </div>

                    <!-- Step 5 -->
                    <div class="relative px-3 text-center lg:border-l lg:border-[#c98722]/25">
                        <span class="absolute right-[-28px] top-[27px] hidden w-[56px] border-t border-dashed border-[#c98722]/70 lg:block"></span>

                        <div class="relative mx-auto mb-3 flex h-[54px] w-[54px] items-center justify-center rounded-full border-2 border-[#c98722] bg-[#101010] text-[22px] font-black text-[#f39a21] shadow-[0_0_25px_rgba(201,135,34,0.18)]">
                            5
                        </div>

                        <h3 class="mb-2 text-[14px] font-black text-[#f39a21]">
                            {{ __('بدء العلاج') }}
                        </h3>

                        <p class="mx-auto max-w-[140px] text-[12px] font-bold leading-6 text-white/75">
                            {{ __('بأعلى جودة') }}
                        </p>
                    </div>

                    <!-- Step 6 -->
                    <div class="relative px-3 text-center">
                        <span class="absolute right-[-28px] top-[27px] hidden w-[56px] border-t border-dashed border-[#c98722]/70 lg:block"></span>

                        <div class="relative mx-auto mb-3 flex h-[54px] w-[54px] items-center justify-center rounded-full border-2 border-[#c98722] bg-[#101010] text-[22px] font-black text-[#f39a21] shadow-[0_0_25px_rgba(201,135,34,0.18)]">
                            6
                        </div>

                        <h3 class="mb-2 text-[14px] font-black text-[#f39a21]">
                            {{ __('متابعة بعد العلاج') }}
                        </h3>

                        <p class="mx-auto max-w-[140px] text-[12px] font-bold leading-6 text-white/75">
                            {{ __('ودعم مستمر') }}
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>
<!-- JOURNEY -->
<!-- TREATMENT + TOURISM TRUST -->
@php
    $isArabic = in_array($sign, ['ar', 'arabic']);
@endphp

<section class="bg-white py-8 md:py-12">
    <div class="container mx-auto px-4">

        <div dir="ltr" class="overflow-hidden rounded-[26px] border border-[#c98722]/25 bg-[#080808] shadow-[0_24px_70px_rgba(0,0,0,0.18)]">

            <!-- TOP ROW -->
            <div class="relative grid grid-cols-1 items-center gap-7 border-b border-white/10 p-5 md:p-7 lg:grid-cols-[0.95fr_1.05fr]">

                <!-- Background Lines -->
                <div class="absolute inset-0 opacity-25 bg-[linear-gradient(180deg,rgba(255,255,255,0.08)_0,rgba(255,255,255,0)_1px)] bg-[length:100%_42px]"></div>

                <!-- Image Shape -->
                <div class="relative z-[2] {{ $isArabic ? 'lg:order-1' : 'lg:order-2' }}">
                    <div class="relative h-[230px] overflow-hidden rounded-[22px] border border-white/10 bg-black md:h-[270px] lg:h-[255px]
                        {{ $isArabic
                            ? 'lg:[clip-path:polygon(0_0,88%_0,100%_50%,88%_100%,0_100%)]'
                            : 'lg:[clip-path:polygon(12%_0,100%_0,100%_100%,12%_100%,0_50%)]'
                        }}">
                        <img
                            src="{{ asset('assets/images/Medical tourism/النيل.png') }}"
                            alt="{{ __('علاجك وسياحتك في تجربة واحدة') }}"
                            class="h-full w-full object-cover object-center"
                        >

                        <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(0,0,0,0.05),rgba(0,0,0,0.42))]"></div>
                    </div>
                </div>

                <!-- Text -->
                <div class="relative z-[2] text-center {{ $isArabic ? 'lg:order-2 lg:text-right' : 'lg:order-1 lg:text-left' }}">

                    <h2 class="mb-3 text-[24px] font-black leading-[1.3] text-white md:text-[36px]">
                        {{ __('علاجك + سياحتك في تجربة واحدة') }}
                    </h2>

                    <p class="mx-auto mb-6 max-w-[650px] text-[14px] font-bold leading-8 text-white/70 md:text-[17px] lg:mx-0">
                        {{ __('علاج أسنانك بأعلى جودة، واستمتع بزيارة أجمل الوجهات في مصر') }}
                    </p>

                    <!-- Tourism Boxes -->
                    <div class="grid grid-cols-2 gap-3 lg:grid-cols-4">

                        <div class="flex min-h-[54px] w-full items-center justify-center gap-2 rounded-xl border border-white/20 bg-white/5 px-3 py-3 text-[13px] font-black text-white/90">
                            <i class="fa-solid fa-mountain text-[16px] text-[#c98722]"></i>
                            <span class="whitespace-nowrap">{{ __('الأهرامات') }}</span>
                        </div>

                        <div class="flex min-h-[54px] w-full items-center justify-center gap-2 rounded-xl border border-white/20 bg-white/5 px-3 py-3 text-[13px] font-black text-white/90">
                            <i class="fa-solid fa-landmark text-[16px] text-[#c98722]"></i>
                            <span class="whitespace-nowrap">{{ __('الأقصر وأسوان') }}</span>
                        </div>

                        <div class="flex min-h-[54px] w-full items-center justify-center gap-2 rounded-xl border border-white/20 bg-white/5 px-3 py-3 text-[13px] font-black text-white/90">
                            <i class="fa-solid fa-tree-city text-[16px] text-[#c98722]"></i>
                            <span class="whitespace-nowrap">{{ __('الأقصر والبروان') }}</span>
                        </div>

                        <div class="flex min-h-[54px] w-full items-center justify-center gap-2 rounded-xl border border-white/20 bg-white/5 px-3 py-3 text-[13px] font-black text-white/90">
                            <i class="fa-regular fa-calendar-days text-[16px] text-[#c98722]"></i>
                            <span class="whitespace-nowrap">{{ __('القاهرة التاريخية') }}</span>
                        </div>

                    </div>

                </div>

            </div>

            <!-- BOTTOM ROW -->
            <div class="relative grid grid-cols-1 items-center gap-7 p-5 md:p-7 lg:grid-cols-[0.85fr_1.35fr_0.8fr]">

                <div class="absolute left-0 bottom-0 h-[220px] w-[360px] bg-[radial-gradient(circle_at_bottom_left,rgba(201,135,34,0.18),transparent_60%)]"></div>

                <!-- Tooth Image -->
                <div class="relative z-[2] flex justify-center {{ $isArabic ? 'lg:order-3 lg:justify-end' : 'lg:order-1 lg:justify-start' }}">
                    <div class="relative h-[190px] w-full max-w-[280px] overflow-hidden">
                        <img
                            src="{{ asset('assets/images/Medical tourism/tooth-shield.png') }}"
                            alt="{{ __('ثقتك تهمنا') }}"
                            class="h-full w-full object-contain"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        >

                        <div class="hidden h-full w-full items-center justify-center">
                            <div class="flex h-[150px] w-[150px] items-center justify-center rounded-full border border-[#c98722]/40 bg-black/35 text-[#f39a21]">
                                <i class="fa-solid fa-tooth text-[70px]"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trust Icons -->
                <div class="relative z-[2] grid grid-cols-1 gap-y-6 sm:grid-cols-3 lg:order-2 lg:grid-cols-3 lg:gap-y-0">

                    <div class="px-5 text-center lg:border-l lg:border-[#9b6a24]/45">
                        <i class="fa-solid fa-people-group mb-3 block text-[38px] text-[#c98722]"></i>

                        <h3 class="mb-2 text-[22px] font-black leading-7 text-[#c98722]">
                            {{ __('أحدث') }}
                        </h3>

                        <p class="text-[14px] font-bold leading-7 text-white/70">
                            {{ __('الأجهزة والتقنيات') }}
                        </p>
                    </div>

                    <div class="px-5 text-center lg:border-l lg:border-[#9b6a24]/45">
                        <i class="fa-solid fa-headset mb-3 block text-[38px] text-[#c98722]"></i>

                        <h3 class="mb-2 text-[22px] font-black leading-7 text-[#c98722]">
                            {{ __('دعم') }}
                        </h3>

                        <p class="text-[14px] font-bold leading-7 text-white/70">
                            24/7
                        </p>
                    </div>

                    <div class="px-5 text-center">
                        <i class="fa-solid fa-tooth mb-3 block text-[38px] text-[#c98722]"></i>

                        <h3 class="mb-2 text-[22px] font-black leading-7 text-[#c98722]">
                            {{ __('تعقيم') }}
                        </h3>

                        <p class="text-[14px] font-bold leading-7 text-white/70">
                            {{ __('معايير عالمية') }}
                        </p>
                    </div>

                </div>

                <!-- Trust Box -->
                <div class="relative z-[2] flex justify-center {{ $isArabic ? 'lg:order-1 lg:justify-start' : 'lg:order-3 lg:justify-end' }}">
                    <div class="w-full max-w-[300px] rounded-[18px] border border-[#c98722]/45 bg-black/25 px-6 py-7 text-center shadow-[0_0_30px_rgba(201,135,34,0.08)]">
                        <h3 class="mb-3 text-[30px] font-black leading-8 text-[#f39a21] md:text-[38px]">
                            {{ __('ثقتك تهمنا') }}
                        </h3>

                        <p class="text-[15px] font-bold leading-7 text-white/75 md:text-[17px]">
                            {{ __('سلامتك وراحتك أولويتنا') }}
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
<!-- TREATMENT + TOURISM TRUST -->


</main>
@stop