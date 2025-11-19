document.addEventListener("DOMContentLoaded", () => {
  // =====================
  // Header scroll effect
  // =====================
  const desktopHeader = document.querySelector(".desktopHeader");
  const mobileHeader = document.querySelector(".mobileHeader");

  window.addEventListener("scroll", () => {
    if (window.scrollY > 50) {
      desktopHeader?.classList.add("bg-transparent", "backdrop-blur-md");
      mobileHeader?.classList.add("bg-transparent", "backdrop-blur-md");
    } else {
      desktopHeader?.classList.remove("bg-transparent", "backdrop-blur-md");
      mobileHeader?.classList.remove("bg-transparent", "backdrop-blur-md");
    }
  });

  // =====================
  // Mobile menu toggle
  // =====================
  const menuBtn = document.getElementById("menu-btn");
  const closeBtn = document.getElementById("close-btn");
  const mobileMenu = document.getElementById("mobile-menu");

  menuBtn?.addEventListener("click", () => {
    mobileMenu?.classList.remove("translate-x-full");
  });

  closeBtn?.addEventListener("click", () => {
    mobileMenu?.classList.add("translate-x-full");
  });

  // =====================
  // Submenu toggle (mobile)
  // =====================
  const submenuBtn = document.querySelector(".submenu-btn");
  const submenu = document.querySelector(".submenu");
  const submenuIcon = submenuBtn?.querySelector("i");

  submenuBtn?.addEventListener("click", () => {
    submenu?.classList.toggle("hidden");
    submenuIcon?.classList.toggle("fa-chevron-down");
    submenuIcon?.classList.toggle("fa-chevron-up");
  });
});
