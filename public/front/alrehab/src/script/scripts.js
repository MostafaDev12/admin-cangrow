document.addEventListener("DOMContentLoaded", function () {
  const menuButton = document.getElementById("menuButton");
  const closeMenuButton = document.getElementById("closeMenuButton");
  const mobileMenu = document.getElementById("mobileMenu");
  const body = document.querySelector("body");

  if (menuButton && closeMenuButton && mobileMenu) {
    menuButton.addEventListener("click", function () {
      mobileMenu.classList.remove("-right-full");
      mobileMenu.classList.add("right-0");
      body.classList.add("overflow-hidden"); // Prevent scrolling when mobile menu is open
    });

    closeMenuButton.addEventListener("click", function () {
      mobileMenu.classList.remove("right-0");
      mobileMenu.classList.add("-right-full");
      body.classList.remove("overflow-hidden"); // Re-enable scrolling when mobile menu is closed
    });

    // Close mobile menu when clicking outside
    document.addEventListener("click", function (event) {
      if (
        !mobileMenu.contains(event.target) &&
        !menuButton.contains(event.target) &&
        mobileMenu.classList.contains("right-0")
      ) {
        mobileMenu.classList.remove("right-0");
        mobileMenu.classList.add("-right-full");
        body.classList.remove("overflow-hidden");
      }
    });
  }

  const servicesDropdown = document.querySelector("#mobileMenu .group");
  const servicesButton = servicesDropdown
    ? servicesDropdown.querySelector("button")
    : null;
  const servicesMenu = servicesDropdown
    ? servicesDropdown.querySelector("ul")
    : null;

  if (servicesDropdown && servicesButton && servicesMenu) {
    servicesButton.addEventListener("click", function (event) {
      if (window.innerWidth < 1024) {
        event.preventDefault(); // Prevent default navigation on mobile
        servicesMenu.classList.toggle("hidden");
      }
    });
  }

  window.addEventListener("resize", function () {
    // Ensure dropdown is hidden on desktop
    if (servicesMenu && window.innerWidth >= 1024) {
      servicesMenu.classList.add("hidden");
    } else if (
      servicesButton &&
      servicesMenu &&
      window.innerWidth < 1024 &&
      !servicesMenu.classList.contains("hidden")
    ) {
      // Keep it toggled if it was open on mobile and screen resizes down
    }
  });
});
