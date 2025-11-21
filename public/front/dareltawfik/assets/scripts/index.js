tailwind.config = {
  theme: {
    extend: {
      colors: {
        primary: "#0a8f4e",
        accent: "#041f12ff",
        "custom-blue": "#041f12ff",
        "custom-orange": "#0a8f4e",
      },
      fontFamily: {
        sans: ["Cairo", "sans-serif"],
        "aref-ruqaa": ["'Aref Ruqaa'", "serif"],
      },
    },
  },
};

document.addEventListener("DOMContentLoaded", function () {
  const swiper = new Swiper(".hero-slider", {
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
    a11y: {
      prevSlideMessage: "الشريحة السابقة",
      nextSlideMessage: "الشريحة التالية",
    },
  });
});

const swiper = new Swiper(".partners-swiper", {
  loop: true,
  spaceBetween: 20,
  grid: {
    rows: 2,
    fill: "row",
  },
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    640: { slidesPerView: 3 },
    1024: { slidesPerView: 4 },
  },
});

document
  .getElementById("mobile-menu-button")
  .addEventListener("click", function () {
    const mobileMenu = document.getElementById("mobile-menu");
    mobileMenu.classList.toggle("hidden");
  });

document.querySelectorAll(".mobile-dropdown-toggle").forEach((button) => {
  button.addEventListener("click", function () {
    const content = this.nextElementSibling;
    content.classList.toggle("hidden");
    const icon = this.querySelector("i");
    icon.classList.toggle("fa-chevron-down");
    icon.classList.toggle("fa-chevron-up");
  });
});

document.querySelectorAll(".dropdown").forEach((dropdown) => {
  const btn = dropdown.querySelector(".dropdown-btn");
  const menu = dropdown.querySelector(".dropdown-menu");

  btn.addEventListener("click", (e) => {
    e.stopPropagation();
    menu.classList.toggle("hidden");
    const icon = btn.querySelector("i");
    icon.classList.toggle("fa-chevron-down");
    icon.classList.toggle("fa-chevron-up");
  });
});

document.addEventListener("click", () => {
  document.querySelectorAll(".dropdown-menu").forEach((menu) => {
    if (!menu.classList.contains("hidden")) menu.classList.add("hidden");
  });
  document.querySelectorAll(".dropdown-btn i").forEach((icon) => {
    icon.classList.add("fa-chevron-down");
    icon.classList.remove("fa-chevron-up");
  });
});

document.getElementById("search-btn").addEventListener("click", function () {
  document.getElementById("search-modal").classList.remove("hidden");
});

document.getElementById("close-search").addEventListener("click", function () {
  document.getElementById("search-modal").classList.add("hidden");
});

document.getElementById("search-modal").addEventListener("click", function (e) {
  if (e.target === this) {
    this.classList.add("hidden");
  }
});

document.addEventListener("DOMContentLoaded", function () {
  new Swiper(".blogSwiper", {
    slidesPerView: 1,
    spaceBetween: 24,
    loop: false,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 32,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 32,
      },
    },
  });
});
