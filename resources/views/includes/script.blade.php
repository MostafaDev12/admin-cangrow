


  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
    integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="{{ asset('front/highline/') }}/js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
    integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
    integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    new WOW().init();
    document.addEventListener("DOMContentLoaded", function () {
      Fancybox.bind("[data-fancybox]", {
        Thumbs: {
          autoStart: true, // تشغيل الصور المصغرة تلقائيًا
        },
        Toolbar: {
          display: ["zoom", "download", "close"], // تخصيص أزرار التحكم
        }
      });
    });

  </script>

  <script>
    let lastScrollTop = 0;
    const header = document.querySelector('.header');

    window.addEventListener('scroll', () => {
      const currentScroll = window.pageYOffset;

      if (currentScroll > lastScrollTop) {
        // Scroll Down
        header.classList.add('hidden');
      } else {
        // Scroll Up
        header.classList.remove('hidden');
      }

      lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
    });
    const headerSocial = document.querySelector('.header-social');

    window.addEventListener('scroll', () => {
      if (window.scrollY > headerSocial.offsetHeight) {

        document.body.classList.add('scrolled');
      } else {

        document.body.classList.remove('scrolled');
      }
    });
    const buttons = document.querySelectorAll('button');

    buttons.forEach(button => {
      if (button.classList.contains('btn-glitch')) {
        button.addEventListener('mouseenter', () => {
          button.textContent = '';
        });

        button.addEventListener('mouseleave', () => {
          button.textContent = '11. GLITCH';
        });
      }

      if (button.classList.contains('btn-morph')) {
        button.addEventListener('mouseenter', () => {
          setTimeout(() => {
            button.textContent = 'WOW!';
          }, 250);
        });

        button.addEventListener('mouseleave', () => {
          setTimeout(() => {
            button.textContent = '12. MORPH';
          }, 250);
        });
      }
    });

  </script>
  <script>
    function typeWriter(element, speed = 50) {
      const text = element.textContent;
      element.textContent = '';
      let i = 0;

      function type() {
        if (i < text.length) {
          element.textContent += text.charAt(i);
          i++;
          setTimeout(type, speed);
        }
      }

      type();
    }

    window.addEventListener("DOMContentLoaded", () => {
      const title = document.querySelector(".type-title");
      const paragraph = document.querySelector(".type-text");

      typeWriter(title, 100);
      setTimeout(() => {
        typeWriter(paragraph, 35);
      }, 1000);
    });
  </script>
  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 0, // Smaller space on mobile
      loop: true,
      grabCursor: true, // Shows grab cursor on desktop
      touchRatio: 0.8, // Better touch sensitivity
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
        dynamicBullets: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        // when window width is >= 480px
        480: {
          slidesPerView: 1.2, // Partial view of next slide
          spaceBetween: 0,
          centeredSlides: true // Center the active slide
        },
        // when window width is >= 640px
        640: {
          slidesPerView: 1.5,
          spaceBetween: 0
        },
        // when window width is >= 768px
        768: {
          slidesPerView: 2,
          spaceBetween: 0,
          centeredSlides: false
        },
        // when window width is >= 992px
        992: {
          slidesPerView: 3,
          spaceBetween: 0
        }
      }
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"
    integrity="sha512-vKtlh10whXT2NhAshnxhceCdwq/bMyMrfeZ3p2IaF89qGCwbC94ATb7Qyg8cFs8EL3Hgz9bJBF++ZWfKn4ligg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/3.0.0-rc3/lazysizes.min.js"
    integrity="sha512-HMnm5Dp1stoEycrUKuMyGDHIudidstU6uRwRgRxPbl2jNxU9xS2B0XLon7xowk3ZitrjNw7WIbQwXroIwY33sw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
    integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    var swiper = new Swiper(".slider .mySwiper", {
      autoplay: {
        delay: 10000,
      },
      loop: true,
      effect: "fade",
      grabCursor: true,
      keyboard: {
        enabled: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        // when window width is >= 320px
        320: {
          slidesPerView: 1,
          spaceBetween: 20
        },
        // when window width is >= 480px
        480: {
          slidesPerView: 1,
          spaceBetween: 30
        },
        // when window width is >= 640px
        640: {
          slidesPerView: 1,
          spaceBetween: 40
        }
      }
    });

  </script>
  <script src="{{ asset('front/highline/') }}/js/main.js"></script>
