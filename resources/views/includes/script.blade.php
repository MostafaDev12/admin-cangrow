
    <script>
        (function () {
            const countKey = 'visitor_count';
            let count = localStorage.getItem(countKey);

            if (!count) {
                count = Math.floor(Math.random() * 900 + 100);
                localStorage.setItem(countKey, count);
            } else {
                count = parseInt(count) + Math.floor(Math.random() * 3 + 1);
                localStorage.setItem(countKey, count);
            }

            const el = document.getElementById('visitor-count');
            el.textContent = `${count.toLocaleString()} زائر حتى الآن`;

            const popup = document.getElementById('visitors-popup');
            setTimeout(() => popup.classList.remove('hidden'), 1000);

            document.getElementById('close-popup').addEventListener('click', () => {
                popup.classList.add('hidden');
            });
        })();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="{{ asset('front/dareltawfik/') }}/assets/scripts/index.js"></script>


    