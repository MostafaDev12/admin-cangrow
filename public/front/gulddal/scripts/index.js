// Toggle mobile menu
document
  .getElementById("mobile-menu-button")
  .addEventListener("click", function () {
    const menu = document.getElementById("mobile-menu");
    menu.classList.toggle("open");
    const icon = this.querySelector("i");
    icon.classList.toggle("fa-bars");
    icon.classList.toggle("fa-times");
  });

// Toggle submenus for mobile
function toggleSubmenu(button) {
  const submenu = button.parentElement.querySelector(".submenu");
  const icon = button.querySelector("i.fa-chevron-down");
  submenu.classList.toggle("hidden");
  if (icon) {
    icon.classList.toggle("rotate-180");
  }
}

// Desktop dropdown functionality
document.querySelectorAll(".group").forEach((group) => {
  group.addEventListener("mouseenter", () => {
    const dropdown = group.querySelector(".dropdown");
    if (dropdown) dropdown.classList.add("active");
  });
  group.addEventListener("mouseleave", () => {
    const dropdown = group.querySelector(".dropdown");
    if (dropdown) dropdown.classList.remove("active");
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const carousel = document.querySelector("#homeSlider");
  const items = carousel.querySelectorAll("[data-carousel-item]");
  const prevBtn = carousel.querySelector("[data-carousel-prev]");
  const nextBtn = carousel.querySelector("[data-carousel-next]");
  const indicators = carousel.querySelectorAll("[data-carousel-indicator]");

  let currentIndex = 0;
  let intervalId;
  const slideInterval = 5000; // 5 seconds

  // Initialize carousel
  function initCarousel() {
    updateCarousel();
    startAutoSlide();

    // Pause on hover
    carousel.addEventListener("mouseenter", pauseAutoSlide);
    carousel.addEventListener("mouseleave", startAutoSlide);

    // Navigation events
    prevBtn.addEventListener("click", goToPrevSlide);
    nextBtn.addEventListener("click", goToNextSlide);

    // Indicator events
    indicators.forEach((indicator) => {
      indicator.addEventListener("click", function () {
        goToSlide(parseInt(this.getAttribute("data-carousel-indicator")));
      });
    });
  }

  // Update carousel display
  function updateCarousel() {
    items.forEach((item, index) => {
      item.classList.toggle("opacity-0", index !== currentIndex);
      item.classList.toggle("opacity-100", index === currentIndex);
    });

    indicators.forEach((indicator, index) => {
      indicator.classList.toggle("bg-opacity-30", index !== currentIndex);
      indicator.classList.toggle("bg-opacity-100", index === currentIndex);
    });
  }

  // Go to specific slide
  function goToSlide(index) {
    currentIndex = index;
    updateCarousel();
    resetAutoSlide();
  }

  // Go to next slide
  function goToNextSlide() {
    currentIndex = (currentIndex + 1) % items.length;
    updateCarousel();
    resetAutoSlide();
  }

  // Go to previous slide
  function goToPrevSlide() {
    currentIndex = (currentIndex - 1 + items.length) % items.length;
    updateCarousel();
    resetAutoSlide();
  }

  // Auto slide functions
  function startAutoSlide() {
    intervalId = setInterval(goToNextSlide, slideInterval);
  }

  function pauseAutoSlide() {
    clearInterval(intervalId);
  }

  function resetAutoSlide() {
    pauseAutoSlide();
    startAutoSlide();
  }

  // Keyboard navigation
  document.addEventListener("keydown", function (e) {
    if (e.key === "ArrowRight") {
      goToNextSlide();
    } else if (e.key === "ArrowLeft") {
      goToPrevSlide();
    }
  });

  // Initialize
  initCarousel();
});
// window.addEventListener("scroll", () => {
//   const logo = document.querySelector(".logo");
//   const header = document.querySelector("header");
//   const menuMain = document.querySelector("#menu-main");
//   const menuMainLi = document.querySelectorAll("#menu-main li a");
//   if (window.scrollY > 50) {
//     logo.classList.replace("scale-150", "scale-75");
//     // header.classList.replace("h-40", "h-20");
//     menuMain.classList.replace("mt-10", "mt-5");
//     menuMainLi.forEach((item) => {
//       item.classList.replace("p-4", "p-2");
//     });
//   } else {
//     logo.classList.replace("scale-75", "scale-150");
//     // header.classList.replace("h-40", "h-20");
//     menuMain.classList.replace("mt-5", "mt-10");
//     menuMainLi.forEach((item) => {
//       item.classList.replace("p-2", "p-4");
//     });
//   }
// });
