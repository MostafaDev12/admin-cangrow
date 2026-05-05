    <footer id="contact" class="relative h-[80vh] w-full overflow-hidden flex items-center justify-between">
        <div class="absolute inset-0">
            <!-- opacity-90 -->
            <img src="{{ $globals->image('contact_bg_image', asset('front/byun_bekdash2/asset/Main-sate-backgrounds/contact-bg.jpeg')) }}" class="w-full h-full object-cover  parallax-img"
                data-speed="0.3">
        </div>
        <div class="relative z-10 text-center w-full bg-black/50 h-full flex flex-col justify-center items-center">
            <!-- backdrop-blur-sm -->
            <h2 class="text-3xl two-line reveal-text font-bold tracking-[0.2em] uppercase mb-6 text-white reveal-text">
                {{ $globals->t('contact_title', 'تواصل معنا') }}
            </h2>
            <div class="mb-10 text-stone-200 text-lg max-w-md mx-auto reveal-text w-full px-4">
                <p>{{ $globals->t('contact_address', 'مصر القاهرة مدينه العبور') }}</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-8 my-4 reveal-text">

                    <!-- Phone 1 -->
                    <div class="flex items-center gap-3">
                        <a href="tel:{{ $globals->t('contact_phone_1', '01270297000') }}"
                            class="w-12 h-12 border border-white/30 rounded-full flex items-center justify-center hover:bg-white hover:text-black transition-all">
                            <i class="fa-solid fa-phone"></i>
                        </a>
                        <span class="text-white text-lg" dir="ltr">{{ $globals->t('contact_phone_1', '01270297000') }}</span>
                    </div>

                    <!-- Phone 2 -->
                    <div class="flex items-center gap-3">
                        <a href="tel:{{ $globals->t('contact_phone_2', '01070297000') }}"
                            class="w-12 h-12 border border-white/30 rounded-full flex items-center justify-center hover:bg-white hover:text-black transition-all">
                            <i class="fa-solid fa-phone"></i>
                        </a>
                        <span class="text-white text-lg" dir="ltr">{{ $globals->t('contact_phone_2', '01070297000') }}</span>
                    </div>
@php($phones = explode(',', $gs->phones))

         @foreach ($phones as $phone)
                    <div class="flex items-center gap-3">
                        <a href="tel:{{ $phone }}"
                            class="w-12 h-12 border border-white/30 rounded-full flex items-center justify-center hover:bg-white hover:text-black transition-all">
                            <i class="fa-solid fa-phone"></i>
                        </a>
                        <span class="text-white text-lg" dir="ltr">{{ $phone }}</span>
                    </div>
        @endforeach
                </div>
            </div>
 
            @php
                 $navLang = session('sign');
                $footerFb = $globals->t('social_facebook_url');
                $footerIg = $globals->t('social_instagram_url');
                $footerX  = $globals->t('social_x_url');
            @endphp
            <div class="flex gap-6 mb-10 reveal-text">
                @if($footerFb)
                    <a href="{{ $footerFb }}" target="_blank"
                        class="w-12 h-12 border border-white/30 rounded-full flex items-center justify-center hover:bg-white hover:text-black transition-all"><i
                            class="fa-brands fa-facebook-f"></i></a>
                @endif
                @if($footerIg)
                    <a href="{{ $footerIg }}" target="_blank"
                        class="w-12 h-12 border border-white/30 rounded-full flex items-center justify-center hover:bg-white hover:text-black transition-all"><i
                            class="fa-brands fa-instagram"></i></a>
                @endif
                @if($footerX)
                    <a href="{{ $footerX }}" target="_blank"
                        class="w-12 h-12 border border-white/30 rounded-full flex items-center justify-center hover:bg-white hover:text-black transition-all">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                @endif
            </div>

            <a href="{{ route('front.bekdash.page', ['lang' => $navLang, 'slug' => 'contact']) }}"
                class="px-10 py-4 border border-white text-white hover:bg-white hover:text-black transition-all duration-300 reveal-text">
                {{ $globals->t('contact_cta', 'تواصل معنا') }}
            </a>
        </div>
    </footer>
