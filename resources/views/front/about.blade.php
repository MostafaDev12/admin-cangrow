 
   @extends('layouts.front')

@section('title')
   
{{ __('عن الشركه') }} -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')

 @stop

@section('content')
<!-- ABOUT HERO -->
<section class="relative min-h-[420px] flex items-center justify-center overflow-hidden pt-24">

    <!-- Background -->
    <div class="absolute inset-0">
      <img
    src="{{ asset('assets/images/about/about-hero.webp') }}"
    alt="{{ __('من نحن') }}"
    width="1600"
    height="900"
    fetchpriority="high"
    decoding="async"
    class="w-full h-full object-cover"
>
    </div>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/65 via-black/45 to-black/60"></div>

    <!-- Content -->
    <div class="relative z-10 text-center px-4">
        <span class="inline-block mb-4 px-5 py-2 rounded-full bg-white/10 text-white/90 text-sm backdrop-blur-sm border border-white/20">
            {{ __('شركة النور لخزانات المياه') }}
        </span>

        <h1 class="text-4xl md:text-6xl font-extrabold text-white drop-shadow-lg">
            {{ __('من نحن') }}
        </h1>

        <p class="mt-5 max-w-2xl mx-auto text-white/85 text-lg leading-8">
            {{ __('خبرة وجودة وثقة في صناعة خزانات المياه بأعلى معايير الأمان.') }}
        </p>
    </div>
</section>


<!-- ABOUT CONTENT -->
<section id="about" class="py-20 bg-gray-50 text-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Breadcrumb -->
        <div class="mb-12 text-sm text-gray-500 flex items-center gap-2 justify-center md:justify-start">
            <a href="{{ route('front.index',$sign) }}" class="text-primary hover:underline">
                {{ __('الرئيسية') }}
            </a>
            <span>»</span>
            <span>{{ __('من نحن') }}</span>
        </div>

        <div class="grid lg:grid-cols-2 gap-14 items-center">

            <!-- Image -->
            <div class="relative order-2 lg:order-1">
                <div class="absolute -inset-4 bg-primary/10 rounded-[2rem] blur-xl"></div>

                <div class="relative rounded-[2rem] overflow-hidden shadow-2xl border border-white bg-white p-3">
                    <img
                        src="{{ asset('assets/images/about/about1.png') }}"
                        alt="{{ __('عن الشركة') }}"
                        class="w-full h-[360px] md:h-[520px] object-cover rounded-[1.5rem]">
                </div>

            
            </div>

            <!-- Text -->
            <div class="space-y-8 order-1 lg:order-2">

                <div>
                    <span class="inline-block mb-4 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-bold">
                        {{ __('نبذة عن الشركة') }}
                    </span>

                    <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                        {{ $ps->{'about_title_' . $sign} ?? __('شركة النور لخزانات المياه') }}
                    </h2>

                    <div class="text-gray-600 leading-9 text-lg space-y-4">
                        {!! $ps->{'about_details_' . $sign} ?? '' !!}
                    </div>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-white rounded-2xl p-5 text-center shadow-sm border border-gray-100">
                        <div class="text-3xl font-extrabold text-primary mb-1">{{ __('10+') }}</div>
                        <div class="text-sm text-gray-500">{{ __('عام خبرة') }}</div>
                    </div>

                    <div class="bg-white rounded-2xl p-5 text-center shadow-sm border border-gray-100">
                        <div class="text-3xl font-extrabold text-primary mb-1">{{ __('99.7%') }}</div>
                        <div class="text-sm text-gray-500">{{ __('رضا العملاء') }}</div>
                    </div>

                    <div class="bg-white rounded-2xl p-5 text-center shadow-sm border border-gray-100">
                        <div class="text-3xl font-extrabold text-primary mb-1">{{ __('45+') }}</div>
                        <div class="text-sm text-gray-500">{{ __('منتج متنوع') }}</div>
                    </div>

                    <div class="bg-white rounded-2xl p-5 text-center shadow-sm border border-gray-100">
                        <div class="text-3xl font-extrabold text-primary mb-1">{{ __('24/7') }}</div>
                        <div class="text-sm text-gray-500">{{ __('خدمة الدعم') }}</div>
                    </div>
                </div>

                <!-- Product Features -->
                <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
                    <h3 class="text-xl font-extrabold text-primary mb-5">
                        {{ __('ما يميز منتجاتنا') }}
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex items-center gap-3 text-gray-700">
                            <span class="w-9 h-9 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                <i class="fas fa-check"></i>
                            </span>
                            {{ __('خامات عالية الجودة') }}
                        </div>

                        <div class="flex items-center gap-3 text-gray-700">
                            <span class="w-9 h-9 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                <i class="fas fa-check"></i>
                            </span>
                            {{ __('مقاومة للصدأ والتآكل') }}
                        </div>

                        <div class="flex items-center gap-3 text-gray-700">
                            <span class="w-9 h-9 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                <i class="fas fa-check"></i>
                            </span>
                            {{ __('تصميم آمن وصحي') }}
                        </div>

                        <div class="flex items-center gap-3 text-gray-700">
                            <span class="w-9 h-9 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                <i class="fas fa-check"></i>
                            </span>
                            {{ __('سهولة النقل والتركيب') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Mission + Values -->
        <div class="mt-20 grid md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:-translate-y-1 transition">
                <div class="w-12 h-12 rounded-2xl bg-primary text-white flex items-center justify-center mb-5">
                    <i data-lucide="award" class="h-6 w-6"></i>
                </div>
                <h3 class="text-lg font-extrabold text-gray-900 mb-3">
                    {{ __('جودة مضمونة') }}
                </h3>
                <p class="text-gray-600 leading-7">
                    {{ __('جميع الخزانات مصنوعة من خامات معتمدة ومعالجة غذائيًا لتخزين مياه الشرب بشكل آمن.') }}
                </p>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:-translate-y-1 transition">
                <div class="w-12 h-12 rounded-2xl bg-primary text-white flex items-center justify-center mb-5">
                    <i data-lucide="target" class="h-6 w-6"></i>
                </div>
                <h3 class="text-lg font-extrabold text-gray-900 mb-3">
                    {{ __('التزام وموثوقية') }}
                </h3>
                <p class="text-gray-600 leading-7">
                    {{ __('نحرص على تسليم منتجاتنا في المواعيد المحددة مع متابعة مستمرة لما بعد البيع.') }}
                </p>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:-translate-y-1 transition">
                <div class="w-12 h-12 rounded-2xl bg-primary text-white flex items-center justify-center mb-5">
                    <i data-lucide="users" class="h-6 w-6"></i>
                </div>
                <h3 class="text-lg font-extrabold text-gray-900 mb-3">
                    {{ __('عملاء سعداء') }}
                </h3>
                <p class="text-gray-600 leading-7">
                    {{ __('نفتخر بوجود آلاف العملاء الراضين عن منتجاتنا داخل مصر وخارجها.') }}
                </p>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:-translate-y-1 transition">
                <div class="w-12 h-12 rounded-2xl bg-primary text-white flex items-center justify-center mb-5">
                    <i data-lucide="lightbulb" class="h-6 w-6"></i>
                </div>
                <h3 class="text-lg font-extrabold text-gray-900 mb-3">
                    {{ __('ابتكار وتطوير') }}
                </h3>
                <p class="text-gray-600 leading-7">
                    {{ __('نواكب أحدث التقنيات العالمية في صناعة الخزانات ونطور منتجاتنا باستمرار.') }}
                </p>
            </div>

        </div>


        <!-- Mission Text -->
        <div class="mt-16 bg-gradient-to-l from-primary to-secondary rounded-[2rem] p-8 md:p-12 text-white shadow-xl">
            <div class="max-w-4xl mx-auto text-center">
                <h3 class="text-2xl md:text-4xl font-extrabold mb-5">
                    {{ __('رسالتنا') }}
                </h3>
                <p class="text-white/90 leading-9 text-lg">
                    {{ __('أن نكون الرواد في مجال صناعة خزانات المياه والحلول المتكاملة لتخزين المياه والمواد، مع توفير منتجات آمنة، صحية، وبأسعار في متناول الجميع.') }}
                </p>
            </div>
        </div>

    </div>
</section>
@stop