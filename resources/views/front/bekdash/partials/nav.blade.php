    <header class="">
        <nav class="fixed top-0 w-full z-40">
            <div class="flex items-center justify-between w-full mix-blend-difference text-white px-4 sm:px-10">
                <!-- Left side: Menu + Language -->
                <div class="flex items-center gap-4 sm:gap-10 md:gap-16 lg:gap-40 rounded" data-animation="right">
                    <!-- Menu button -->
                    <div class="cursor-pointer" id="menu-btn">
                        <i
                            class="fa-solid fa-bars text-3xl sm:text-4xl gsap-item hover:text-stone-300 transition-colors"></i>
                    </div>
                    <!-- Language button -->
                    <div class="cursor-pointer relative z-50">
                        <button id="lang-btn" type="button"
                            class="gsap-item text-sm sm:text-base hover:text-stone-300 transition-colors relative z-50">{{ $globals->t('nav_lang_label', 'اللغة') }}</button>

                        @isset($languages)
                            @if($languages->count())
                                <ul id="lang-menu"
                                    class="hidden absolute top-full mt-2 right-0 bg-stone-950/95 border border-white/10 rounded text-white text-sm min-w-[140px] shadow-lg overflow-hidden">
                                    @foreach($languages as $language)
                                        <li>
                                            <a href="{{ route('change-lang.index', $language->id) }}"
                                                class="block px-4 py-2 hover:bg-white/10 whitespace-nowrap">
                                                {{ $language->language }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        @endisset
                    </div>
                </div>

                <!-- Right side: Logo -->
                <div class="flex justify-end">
                    <a href="{{ route('front.index', ['lang' => session('sign')]) }}">
                        <img src="{{ $globals->image('logo', asset('front/byun_bekdash2/asset/logo/logo.png')) }}" alt="{{ $globals->t('logo_alt', 'شعار بابل') }}" class="h-16 sm:h-24 cursor-pointer gsap-item"
                            data-animation="left">
                    </a>
                </div>
            </div>
        </nav>


        <div class="menu-overlay fixed inset-0 bg-stone-950 z-50 flex flex-col justify-center items-center text-center">
            <div class="absolute top-8 left-8 cursor-pointer p-4" id="close-btn">
                <i class="fa-solid fa-times text-4xl text-white hover:text-yellow-500 transition-colors"></i>
            </div>
            @php($navLang = session('sign'))
            <ul class="space-y-6 text-2xl md:text-4xl font-light">
                <li class="overflow-hidden"><a href="{{ route('front.index', ['lang' => $navLang]) }}" class="menu-link block hover:opacity-70">{{ $globals->t('menu_home', 'الرئيسية') }}</a>
                </li>
                <li class="overflow-hidden"><a href="{{ route('front.bekdash.page', ['lang' => $navLang, 'slug' => 'about']) }}" class="menu-link block hover:opacity-70">{{ $globals->t('menu_story', 'قصة بيون بكداش') }}</a></li>
                <li class="overflow-hidden"><a href="{{ route('front.bekdash.page', ['lang' => $navLang, 'slug' => 'goals']) }}" class="menu-link block hover:opacity-70">{{ $globals->t('menu_goals', 'أهداف بيون بكداش') }}</a></li>
                <li class="overflow-hidden"><a href="{{ route('front.bekdash.page', ['lang' => $navLang, 'slug' => 'principles']) }}" class="menu-link block hover:opacity-70">{{ $globals->t('menu_policy', 'سياسة بيون بكداش') }}</a></li>
                <li class="overflow-hidden"><a href="#products" class="menu-link block hover:opacity-70">{{ $globals->t('menu_express', 'اكسبرس بيون بكداش') }}</a></li>
                <li class="overflow-hidden"><a href="#vip" class="menu-link block hover:opacity-70">{{ $globals->t('menu_luxury', 'لاكشري بيون بكداش') }}</a></li>
                <li class="overflow-hidden mt-8">
                    <a href="{{ route('front.bekdash.page', ['lang' => $navLang, 'slug' => 'contact']) }}" class="menu-link block hover:opacity-70">
                        {{ $globals->t('menu_contact', 'تواصل معنا') }}
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <script>
        (function () {
            var btn = document.getElementById('lang-btn');
            var menu = document.getElementById('lang-menu');
            if (!btn || !menu) return;

            btn.addEventListener('click', function (e) {
                e.stopPropagation();
                menu.classList.toggle('hidden');
            });

            document.addEventListener('click', function (e) {
                if (!menu.contains(e.target) && e.target !== btn) {
                    menu.classList.add('hidden');
                }
            });
        })();
    </script>
