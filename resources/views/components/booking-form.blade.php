@php
    $variant = $variant ?? 'sidebar';

    if ($variant === 'wide') {
        $boxClass = $wrapperClass ?? 'container mx-auto px-4 lg:px-8 xl:max-w-5xl mb-10';
        $cardClass = 'bg-white rounded-3xl shadow-xl border border-gray-100 p-6 md:p-8 relative';
        $formClass = 'grid grid-cols-1 md:grid-cols-2 gap-4';
        $buttonClass = 'px-10 py-3 rounded-xl bg-[#1670d8] text-white font-bold hover:bg-[#0b4f8f] transition';
        $buttonWrapClass = 'md:col-span-2 flex justify-center pt-2';
        $fullClass = 'md:col-span-2';
    } else {
        $boxClass = $wrapperClass ?? 'mt-6';
        $cardClass = 'bg-white rounded-3xl shadow-xl border border-gray-100 p-6 relative';
        $formClass = 'space-y-4';
        $buttonClass = 'w-full px-10 py-3 rounded-xl bg-[#1670d8] text-white font-bold hover:bg-[#0b4f8f] transition';
        $buttonWrapClass = 'flex justify-center pt-2';
        $fullClass = '';
    }
@endphp

<!-- Booking Form -->
<div id="{{ $formId ?? 'bookingFormBox' }}" class="{{ $boxClass }}">

    <div class="{{ $cardClass }}">

        <h3 class="text-center text-2xl font-extrabold text-[#0b4f8f] mb-2">
            احجز استشارتك الآن
        </h3>

        <p class="text-center text-gray-500 text-sm mb-6">
            املأ البيانات وسيتم التواصل معك في أقرب وقت
        </p>

        <form action="{{ url('/booking/store') }}" method="POST" class="{{ $formClass }}">
            @csrf

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">الاسم</label>
                <input
                    type="text"
                    name="name"
                    required
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#1670d8]"
                    placeholder="اكتب اسمك">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">رقم الهاتف</label>
                <input
                    type="text"
                    name="phone"
                    required
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#1670d8]"
                    placeholder="رقم الهاتف">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">المدينة</label>
                <input
                    type="text"
                    name="city"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#1670d8]"
                    placeholder="اكتب المدينة">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">الخدمة المطلوبة</label>

                <select
                    name="service"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#1670d8] bg-white">

                    @if(isset($service) && isset($sign))
                        <option value="{{ $service->{'title_' . $sign} ?? 'استشارة عامة' }}">
                            {{ $service->{'title_' . $sign} ?? 'استشارة عامة' }}
                        </option>
                    @else
                        <option value="استشارة عامة">استشارة عامة</option>
                    @endif

                    <option value="زراعة الأسنان">زراعة الأسنان</option>
                    <option value="تركيبات الأسنان">تركيبات الأسنان</option>
                    <option value="ابتسامة هوليود">ابتسامة هوليود</option>
                    <option value="تبييض الأسنان">تبييض الأسنان</option>
                    <option value="تقويم الأسنان">تقويم الأسنان</option>
                    <option value="علاج اللثة">علاج اللثة</option>
                    <option value="علاج الجذور">علاج الجذور</option>
                    <option value="تنظيف الأسنان">تنظيف الأسنان</option>
                    <option value="حشو الأسنان">حشو الأسنان</option>
                    <option value="خلع الأسنان">خلع الأسنان</option>
                </select>
            </div>

            <div class="{{ $fullClass }}">
                <label class="block text-sm font-bold text-gray-700 mb-2">العنوان</label>
                <input
                    type="text"
                    name="address"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#1670d8]"
                    placeholder="اكتب العنوان">
            </div>

            <div class="{{ $fullClass }}">
                <label class="block text-sm font-bold text-gray-700 mb-2">رسالتك</label>
                <textarea
                    name="message"
                    rows="4"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#1670d8]"
                    placeholder="اكتب رسالتك هنا"></textarea>
            </div>

            <div class="{{ $buttonWrapClass }}">
                <button type="submit" class="{{ $buttonClass }}">
                    إرسال الطلب
                </button>
            </div>
        </form>

    </div>
</div>
<!-- Booking Form -->




