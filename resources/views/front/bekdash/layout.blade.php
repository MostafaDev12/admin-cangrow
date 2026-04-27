<!DOCTYPE html>
<html lang="ar" dir="{{ session('front_language_duraction', 'rtl') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $siteTitle       = $globals->t('site_title', 'بيون بكداش');
        $siteDescription = $globals->t('site_description', 'بيون بكداش - أفضل بوظة سورية');
        $trans           = $page->currentTranslation();
        // ?: (truthiness) so empty strings also fall through to the site default
        $metaTitle       = $trans?->meta_title       ?: $siteTitle;
        $metaDescription = $trans?->meta_description ?: $siteDescription;
        $ogImage         = $page->image(
            'og_image',
            $page->image('hero_image_desktop', asset('front/byun_bekdash2/asset/logo/logo.png'))
        );
        $canonicalUrl = url()->current();
    @endphp

    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    {{-- hreflang alternates --}}
    @php
        $hreflangPath = $page->slug === 'home' ? '' : '/' . $page->slug;
        $defaultLanguage = $languages->firstWhere('is_default', 1) ?? $languages->first();
    @endphp
    @foreach($languages as $altLang)
        <link rel="alternate" hreflang="{{ $altLang->sign }}" href="{{ url($altLang->sign . $hreflangPath) }}">
    @endforeach
    @if($defaultLanguage)
        <link rel="alternate" hreflang="x-default" href="{{ url($defaultLanguage->sign . $hreflangPath) }}">
    @endif

    {{-- Open Graph --}}
    <meta property="og:type"        content="website">
    <meta property="og:title"       content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:image"       content="{{ $ogImage }}">
    <meta property="og:url"         content="{{ $canonicalUrl }}">
    <meta property="og:site_name"   content="{{ $siteTitle }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image"       content="{{ $ogImage }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200..800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/gsap@3/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/gsap@3/dist/CSSRulePlugin.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('front/byun_bekdash2/asset/style/index.css') }}" />
</head>

<body class="text-white overflow-x-hidden bg-stone-950">

    @include('front.bekdash.partials.nav')

    @yield('content')

    @include('front.bekdash.partials.footer')

    <!-- Container للأيقونات -->
    <div class="fixed bottom-4 right-4 md:bottom-6 md:right-6 flex flex-col items-end gap-3 z-50 gsap-item"
        data-animation="up" style="animation-delay: 0.4s;">

        <!-- أيقونات السوشيال (hidden by default) -->
        <div id="social-icons"
            class="flex flex-col items-end gap-3 opacity-0 translate-y-6 transition-all duration-300">

            @php
                // Each social value comes from FrontPagesController::siteGlobals(),
                // which already turns a bare WhatsApp number into a wa.me URL.
                // Empty string → @if skips the icon.
                $phone     = $globals->t('social_phone_url');
                $whatsapp  = $globals->t('social_whatsapp_url');
                $facebook  = $globals->t('social_facebook_url');
                $xUrl      = $globals->t('social_x_url');
                $instagram = $globals->t('social_instagram_url');
                $snapchat  = $globals->t('social_snapchat_url');
                $linkedin  = $globals->t('social_linkedin_url');
            @endphp

            @if($phone)
                <!-- Phone -->
                <a href="tel:{{ $phone }}"
                    class="w-12 h-12 bg-white text-black rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                    <i class="fa-solid fa-phone"></i>
                </a>
            @endif

            @if($whatsapp)
                <!-- WhatsApp -->
                <a href="{{ $whatsapp }}" target="_blank"
                    class="w-12 h-12 bg-green-500 text-white rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
            @endif

            @if($facebook)
                <!-- Facebook -->
                <a href="{{ $facebook }}" target="_blank"
                    class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
            @endif

            @if($xUrl)
                <!-- X (Twitter الجديد) -->
                <a href="{{ $xUrl }}" target="_blank"
                    class="w-12 h-12 bg-black text-white rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
            @endif

            @if($instagram)
                <!-- Instagram -->
                <a href="{{ $instagram }}" target="_blank"
                    class="w-12 h-12 bg-gradient-to-tr from-pink-500 via-purple-500 to-yellow-500 text-white rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            @endif

            @if($snapchat)
                <!-- Snapchat -->
                <a href="{{ $snapchat }}" target="_blank"
                    class="w-12 h-12 bg-yellow-400 text-black rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                    <i class="fa-brands fa-snapchat"></i>
                </a>
            @endif

            @if($linkedin)
                <!-- LinkedIn -->
                <a href="{{ $linkedin }}" target="_blank"
                    class="w-12 h-12 bg-[#0A66C2] text-white rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
            @endif

        </div>


        <button id="toggle-button"
            class="w-12 h-12 md:w-14 md:h-14 bg-black text-white rounded-full flex items-center justify-center text-xl md:text-2xl hover:scale-110 transition-transform shadow-lg">
            <i class="fa-solid fa-share-alt"></i>
        </button>

    </div>

    <script>
        const toggleBtn = document.getElementById('toggle-button');
        const icons = document.getElementById('social-icons');

        toggleBtn.addEventListener('click', () => {
            if (icons.classList.contains('opacity-0')) {
                icons.classList.remove('opacity-0', 'translate-y-6');
                icons.classList.add('opacity-100', 'translate-y-0');
            } else {
                icons.classList.add('opacity-0', 'translate-y-6');
                icons.classList.remove('opacity-100', 'translate-y-0');
            }
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script>
        gsap.registerPlugin(ScrollTrigger);

        // Menu Logic
        const menuBtn = document.getElementById("menu-btn");
        const closeBtn = document.getElementById("close-btn");
        const menuOverlay = document.querySelector(".menu-overlay");
        const menuLinks = document.querySelectorAll(".menu-link");

        menuBtn.addEventListener("click", () => {
            menuOverlay.classList.add("active");
            gsap.fromTo(
                menuLinks,
                { y: 50, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.5,
                    stagger: 0.1,
                    delay: 0.3,
                    ease: "power2.out",
                }
            );
        });

        closeBtn.addEventListener("click", () => {
            menuOverlay.classList.remove("active");
        });

        menuLinks.forEach((link) => {
            link.addEventListener("click", () => {
                menuOverlay.classList.remove("active");
            });
        });

        // Animations Setup
        document.addEventListener("DOMContentLoaded", () => {
            // Hero Animation
            gsap.from(".section-hero img", {
                scale: 1.2,
                duration: 2,
                ease: "power2.out",
            });
            gsap.to("nav", { opacity: 1, duration: 1, delay: 0.5 });
        });

        // Scroll Reveal Animations
        function setupScrollAnimations() {
            gsap.utils.toArray(".reveal-text, .gsap-item").forEach((element) => {
                const direction = element.getAttribute("data-animation") || "up";
                let xValue = 0,
                    yValue = 0;

                if (direction === "left") xValue = -50;
                else if (direction === "right") xValue = 50;
                else if (direction === "up") yValue = 50;

                gsap.fromTo(
                    element,
                    { opacity: 0, x: xValue, y: yValue },
                    {
                        opacity: 1,
                        x: 0,
                        y: 0,
                        duration: 1,
                        ease: "power3.out",
                        scrollTrigger: {
                            trigger: element,
                            start: "top 85%",
                            toggleActions: "play none none reverse",
                        },
                    }
                );
            });
        }
        setupScrollAnimations();

        // Parallax
        gsap.utils.toArray(".parallax-img").forEach((img) => {
            gsap.to(img, {
                yPercent: 15 * (img.getAttribute("data-speed") || 0.5),
                ease: "none",
                scrollTrigger: {
                    trigger: img.parentElement,
                    start: "top bottom",
                    end: "bottom top",
                    scrub: true,
                },
            });
        });
        gsap.utils.toArray(".two-line").forEach((line) => {
            const before = line.querySelector("::before");
            const after = line.querySelector("::after");

            // بدل استخدام pseudo directly، نستخدم CSS variables أو نعمل elements داخل الـ HTML
            const lineBefore = document.createElement("div");
            lineBefore.classList.add("line-before");
            lineBefore.style.position = "absolute";
            lineBefore.style.top = "-6px";
            lineBefore.style.left = "50%";
            lineBefore.style.transform = "translateX(-50%)";
            lineBefore.style.height = "2px";
            lineBefore.style.width = "0";
            lineBefore.style.backgroundColor = "#fff";

            const lineAfter = document.createElement("div");
            lineAfter.classList.add("line-after");
            lineAfter.style.position = "absolute";
            lineAfter.style.bottom = "-6px";
            lineAfter.style.left = "50%";
            lineAfter.style.transform = "translateX(-50%)";
            lineAfter.style.height = "2px";
            lineAfter.style.width = "0";
            lineAfter.style.backgroundColor = "#fff";

            line.appendChild(lineBefore);
            line.appendChild(lineAfter);

            gsap.to([lineBefore, lineAfter], {
                width: 100,
                scrollTrigger: {
                    trigger: line,
                    start: "top 80%",
                    end: "top 50%",
                    scrub: true,
                },
                ease: "power2.out",
            });
        });
        // Navbar Blur on Scroll
        ScrollTrigger.create({
            start: 80,
            onUpdate: (self) => {
                const nav = document.querySelector("nav");
                const navContainer = nav.querySelector("div.mix-blend-difference, div.mix-blend-normal");

                if (self.progress > 0) {
                    if (navContainer) {
                        navContainer.classList.remove('mix-blend-difference');
                        navContainer.classList.add('mix-blend-normal');
                    }
                    gsap.to(nav, {
                        backgroundColor: "rgba(12, 10, 9, 0.4)", // stone-950 with more transparency
                        backdropFilter: "blur(12px)",
                        borderBottom: "1px solid rgba(255, 255, 255, 0.1)",
                        duration: 0.3,
                    });
                } else {
                    if (navContainer) {
                        navContainer.classList.remove('mix-blend-normal');
                        navContainer.classList.add('mix-blend-difference');
                    }
                    gsap.to(nav, {
                        backgroundColor: "transparent",
                        backdropFilter: "blur(0px)",
                        borderBottom: "1px solid rgba(255, 255, 255, 0)",
                        duration: 0.3,
                    });
                }
            },
        });

    </script>
</body>

</html>
