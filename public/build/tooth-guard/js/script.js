// Initialize Lucide icons
document.addEventListener("DOMContentLoaded", function () {
  lucide.createIcons();

  // Mobile menu toggle
  const mobileMenuButton = document.getElementById("mobile-menu-button");
  const mobileMenu = document.getElementById("mobile-menu");
  let menuOpen = false;

  mobileMenuButton.addEventListener("click", function () {
    menuOpen = !menuOpen;

    if (menuOpen) {
      mobileMenu.classList.remove("hidden");
      // Change icon to X when menu is open
      mobileMenuButton.innerHTML = '<i data-lucide="x" class="w-8 h-8"></i>';
    } else {
      mobileMenu.classList.add("hidden");
      // Change icon back to menu when closed
      mobileMenuButton.innerHTML = '<i data-lucide="menu" class="w-8 h-8"></i>';
    }

    // Refresh Lucide icons after changing them
    lucide.createIcons();
  });

  // Close menu when clicking on a link
  const mobileMenuLinks = mobileMenu.querySelectorAll("a");
  mobileMenuLinks.forEach((link) => {
    link.addEventListener("click", () => {
      mobileMenu.classList.add("hidden");
      menuOpen = false;
      mobileMenuButton.innerHTML = '<i data-lucide="menu" class="w-8 h-8"></i>';
      lucide.createIcons();
    });
  });

  // Close menu when clicking outside
  document.addEventListener("click", function (event) {
    if (
      !mobileMenu.contains(event.target) &&
      !mobileMenuButton.contains(event.target) &&
      menuOpen
    ) {
      mobileMenu.classList.add("hidden");
      menuOpen = false;
      mobileMenuButton.innerHTML = '<i data-lucide="menu" class="w-8 h-8"></i>';
      lucide.createIcons();
    }
  });

  // Smooth scrolling for anchor links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      document.querySelector(this.getAttribute("href")).scrollIntoView({
        behavior: "smooth",
      });
    });
  });
});
