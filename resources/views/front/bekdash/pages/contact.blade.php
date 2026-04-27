@extends('front.bekdash.layout')

@section('content')
    <section class="relative w-full h-[50vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ $page->image('contact_hero_bg', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/contact-bg.jpeg')) }}" class="w-full h-full object-cover opacity-50 parallax-img" data-speed="0.3">
        </div>
        <div class="relative z-10 text-center">
            <h1 class="text-4xl md:text-6xl font-bold tracking-[0.2em] uppercase two-line reveal-text">{{ $page->t('contact_hero_title', 'تواصل معنا') }}</h1>
        </div>
    </section>

    <main class="container mx-auto px-4 md:px-8 py-16 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Contact Form -->
            <div class="reveal-text" data-animation="right">
                <h2 class="text-3xl font-bold mb-8 border-r-4 border-amber-600 pr-4">{{ $page->t('form_title', 'أرسل لنا رسالة') }}</h2>

                @if (session('contact_success'))
                    <div class="mb-6 px-4 py-3 border border-green-600/40 bg-green-900/20 text-green-200 text-sm">
                        {{ $page->t('form_success_message', 'تم إرسال رسالتك بنجاح. سنتواصل معك قريباً.') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 px-4 py-3 border border-red-600/40 bg-red-900/20 text-red-200 text-sm">
                        <ul class="list-disc pr-4 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="space-y-6" method="POST" action="{{ route('front.bekdash.contact.submit', ['lang' => session('sign')]) }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-stone-400 mb-2">{{ $page->t('form_name_label', 'الاسم') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="w-full bg-stone-900 border border-white/10 px-4 py-3 text-white focus:border-amber-600 outline-none transition-colors">
                        </div>
                        <div>
                            <label class="block text-stone-400 mb-2">{{ $page->t('form_email_label', 'البريد الإلكتروني') }}</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-stone-900 border border-white/10 px-4 py-3 text-white focus:border-amber-600 outline-none transition-colors">
                        </div>
                    </div>
                    <div>
                        <label class="block text-stone-400 mb-2">{{ $page->t('form_subject_label', 'الموضوع') }}</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" class="w-full bg-stone-900 border border-white/10 px-4 py-3 text-white focus:border-amber-600 outline-none transition-colors">
                    </div>
                    <div>
                        <label class="block text-stone-400 mb-2">{{ $page->t('form_phone_label', 'الهاتف') }}</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" dir="ltr" class="w-full bg-stone-900 border border-white/10 px-4 py-3 text-white focus:border-amber-600 outline-none transition-colors">
                    </div>
                    <div>
                        <label class="block text-stone-400 mb-2">{{ $page->t('form_message_label', 'الرسالة') }}</label>
                        <textarea name="message" rows="5" class="w-full bg-stone-900 border border-white/10 px-4 py-3 text-white focus:border-amber-600 outline-none transition-colors">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="px-12 py-4 border border-white text-white hover:bg-white hover:text-black transition-all duration-300 font-bold uppercase tracking-widest">
                        {{ $page->t('form_submit_label', 'إرسال الآن') }}
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="reveal-text" data-animation="left">
                <h2 class="text-3xl font-bold mb-8 border-r-4 border-amber-600 pr-4">{{ $page->t('info_title', 'معلومات الاتصال') }}</h2>
                <div class="space-y-10">
                    <div class="flex items-start gap-6">
                        <div class="w-14 h-14 bg-amber-600/10 border border-amber-600/30 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-location-dot text-2xl text-amber-500"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">{{ $page->t('info_address_label', 'العنوان') }}</h3>
                            <p class="text-stone-400 text-lg">{{ $page->t('info_address_value', 'مصر، القاهرة، مدينة العبور') }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-6">
                        <div class="w-14 h-14 bg-amber-600/10 border border-amber-600/30 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-phone text-2xl text-amber-500"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">{{ $page->t('info_phone_label', 'الهاتف') }}</h3>
                            <div class="space-y-1">
                                <p class="text-stone-400 text-lg" dir="ltr">{{ $page->t('info_phone_1', '01270297000') }}</p>
                                <p class="text-stone-400 text-lg" dir="ltr">{{ $page->t('info_phone_2', '01070297000') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start gap-6">
                        <div class="w-14 h-14 bg-amber-600/10 border border-amber-600/30 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-envelope text-2xl text-amber-500"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">{{ $page->t('info_email_label', 'البريد الإلكتروني') }}</h3>
                            <p class="text-stone-400 text-lg">{{ $page->t('info_email_value', 'info@byunbekdash.com') }}</p>
                        </div>
                    </div>

                    <div class="pt-8">
                        <h3 class="text-xl font-bold mb-6">{{ $page->t('info_social_label', 'تابعنا على') }}</h3>
                        @php
                            $contactFb = $globals->t('social_facebook_url');
                            $contactIg = $globals->t('social_instagram_url');
                            $contactX  = $globals->t('social_x_url');
                        @endphp
                        <div class="flex gap-4">
                            @if($contactFb)
                                <a href="{{ $contactFb }}" target="_blank" class="w-12 h-12 border border-white/20 flex items-center justify-center hover:bg-white hover:text-black transition-all">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            @endif
                            @if($contactIg)
                                <a href="{{ $contactIg }}" target="_blank" class="w-12 h-12 border border-white/20 flex items-center justify-center hover:bg-white hover:text-black transition-all">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            @endif
                            @if($contactX)
                                <a href="{{ $contactX }}" target="_blank" class="w-12 h-12 border border-white/20 flex items-center justify-center hover:bg-white hover:text-black transition-all">
                                    <i class="fa-brands fa-x-twitter"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
