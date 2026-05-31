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
            {{ __('احجز استشارتك الآن') }}
        </h3>

        <p class="text-center text-gray-500 text-sm mb-6">
            {{ __('املأ البيانات وسيتم التواصل معك في أقرب وقت') }}
        </p>

        <form action="{{ url('/booking/store') }}" method="POST" class="{{ $formClass }}">
            @csrf

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">{{ __('الاسم') }}</label>
                <input
                    type="text"
                    name="name"
                    required
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#1670d8]"
                    placeholder="{{ __('اكتب اسمك') }}">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">{{ __('رقم الهاتف') }}</label>
                <input
                    type="text"
                    name="phone"
                    required
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#1670d8]"
                    placeholder="{{ __('رقم الهاتف') }}">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">{{ __('المدينة') }}</label>
                <input
                    type="text"
                    name="city"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#1670d8]"
                    placeholder="{{ __('اكتب المدينة') }}">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">{{ __('الخدمة المطلوبة') }}</label>

                <select
                    name="service"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#1670d8] bg-white">

                    @if(isset($service) && isset($sign))
                        <option value="{{ $service->{'title_' . $sign} ?? __('استشارة عامة') }}">
                            {{ $service->{'title_' . $sign} ?? __('استشارة عامة') }}
                        </option>
                    @else
                        <option value="{{ __('استشارة عامة') }}">{{ __('استشارة عامة') }}</option>
                    @endif

                    <option value="{{ __('زراعة الأسنان') }}">{{ __('زراعة الأسنان') }}</option>
                    <option value="{{ __('تركيبات الأسنان') }}">{{ __('تركيبات الأسنان') }}</option>
                    <option value="{{ __('ابتسامة هوليود') }}">{{ __('ابتسامة هوليود') }}</option>
                    <option value="{{ __('تبييض الأسنان') }}">{{ __('تبييض الأسنان') }}</option>
                    <option value="{{ __('تقويم الأسنان') }}">{{ __('تقويم الأسنان') }}</option>
                    <option value="{{ __('علاج اللثة') }}">{{ __('علاج اللثة') }}</option>
                    <option value="{{ __('علاج الجذور') }}">{{ __('علاج الجذور') }}</option>
                    <option value="{{ __('تنظيف الأسنان') }}">{{ __('تنظيف الأسنان') }}</option>
                    <option value="{{ __('حشو الأسنان') }}">{{ __('حشو الأسنان') }}</option>
                    <option value="{{ __('خلع الأسنان') }}">{{ __('خلع الأسنان') }}</option>
                </select>
            </div>

            <div class="{{ $fullClass }}">
                <label class="block text-sm font-bold text-gray-700 mb-2">{{ __('العنوان') }}</label>
                <input
                    type="text"
                    name="address"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#1670d8]"
                    placeholder="{{ __('اكتب العنوان') }}">
            </div>

            <div class="{{ $fullClass }}">
                <label class="block text-sm font-bold text-gray-700 mb-2">{{ __('رسالتك') }}</label>
                <textarea
                    name="message"
                    rows="4"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#1670d8]"
                    placeholder="{{ __('اكتب رسالتك هنا') }}"></textarea>
            </div>

            <div class="{{ $buttonWrapClass }}">
                <button type="submit" class="{{ $buttonClass }}">
                    {{ __('إرسال الطلب') }}
                </button>
            </div>
        </form>

    </div>
</div>
<!-- Booking Form -->




