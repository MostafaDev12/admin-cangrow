class MobileNavigation {
  constructor() {
    this.header = document.getElementById("mainHeader");
    this.navbarToggler = document.querySelector(".navbar-toggler");
    this.navbarCollapse = document.querySelector(".navbar-collapse");
    this.dropdownItems = document.querySelectorAll(".nav-item.dropdown");
    this.dropdownSubmenuItems = document.querySelectorAll(".dropdown-submenu");
    this.navLinks = document.querySelectorAll(".nav-link");
    this.scrollThreshold = 50;
    this.breakpoint = 992;
    this.debounceTimeout = null;

    this.init();
  }

  init() {
    this.setupEventListeners();
    this.handleScroll();
  }

  setupEventListeners() {
    // Scroll effect with debouncing
    window.addEventListener("scroll", () =>
      this.debounce(this.handleScroll.bind(this), 10)
    );

    // Mobile menu toggle
    this.navbarToggler.addEventListener(
      "click",
      this.toggleMobileMenu.bind(this)
    );

    // Dropdown menus
    this.dropdownItems.forEach((item) => {
      const toggle = item.querySelector(".dropdown-toggle");
      if (toggle) {
        toggle.addEventListener("click", this.handleDropdownClick.bind(this));
        toggle.addEventListener(
          "keydown",
          this.handleDropdownKeydown.bind(this)
        );
      }
    });

    // Submenus
    this.dropdownSubmenuItems.forEach((item) => {
      const toggle = item.querySelector(".dropdown-toggle");
      if (toggle) {
        toggle.addEventListener("click", this.handleSubmenuClick.bind(this));
        toggle.addEventListener(
          "keydown",
          this.handleSubmenuKeydown.bind(this)
        );
      }
    });

    // Close menu on outside click
    document.addEventListener("click", this.handleOutsideClick.bind(this));

    // Close menu on link click (mobile)
    this.navLinks.forEach((link) => {
      link.addEventListener("click", this.closeOnLinkClick.bind(this));
    });

    // Handle window resize with debouncing
    window.addEventListener("resize", () =>
      this.debounce(this.handleResize.bind(this), 100)
    );

    // Keyboard navigation for menu
    document.addEventListener("keydown", this.handleEscapeKey.bind(this));
  }

  debounce(func, wait) {
    clearTimeout(this.debounceTimeout);
    this.debounceTimeout = setTimeout(func, wait);
  }

  handleScroll() {
    this.header.classList.toggle(
      "scrolled",
      window.scrollY > this.scrollThreshold
    );
  }

  toggleMobileMenu() {
    const isOpen = this.navbarCollapse.classList.toggle("show");
    this.navbarToggler.classList.toggle("active");
    this.navbarToggler.setAttribute("aria-expanded", isOpen);
    document.body.classList.toggle("menu-open");
    if (isOpen) {
      this.navbarCollapse.querySelector(".nav-link").focus();
    }
  }

  handleDropdownClick(e) {
    if (window.innerWidth < this.breakpoint) {
      e.preventDefault();
      e.stopPropagation();
      const parent = e.currentTarget.closest(".nav-item.dropdown");
      const isActive = parent.classList.toggle("active");
      e.currentTarget.setAttribute("aria-expanded", isActive);
    }
  }

  handleSubmenuClick(e) {
    if (window.innerWidth < this.breakpoint) {
      e.preventDefault();
      e.stopPropagation();
      const parent = e.currentTarget.closest(".dropdown-submenu");
      const isActive = parent.classList.toggle("active");
      e.currentTarget.setAttribute("aria-expanded", isActive);
    }
  }

  handleDropdownKeydown(e) {
    if (e.key === "Enter" || e.key === " ") {
      e.preventDefault();
      this.handleDropdownClick(e);
    }
  }

  handleSubmenuKeydown(e) {
    if (e.key === "Enter" || e.key === " ") {
      e.preventDefault();
      this.handleSubmenuClick(e);
    }
  }

  handleOutsideClick(e) {
    if (
      !this.navbarCollapse.contains(e.target) &&
      !this.navbarToggler.contains(e.target)
    ) {
      this.closeAllMenus();
    }
  }

  handleEscapeKey(e) {
    if (e.key === "Escape" && this.navbarCollapse.classList.contains("show")) {
      this.closeAllMenus();
      this.navbarToggler.focus();
    }
  }

  closeOnLinkClick(e) {
    if (
      window.innerWidth < this.breakpoint &&
      !e.currentTarget.classList.contains("dropdown-toggle")
    ) {
      this.closeAllMenus();
    }
  }

  handleResize() {
    if (window.innerWidth >= this.breakpoint) {
      this.closeAllMenus();
    }
  }

  closeAllMenus() {
    this.navbarCollapse.classList.remove("show");
    this.navbarToggler.classList.remove("active");
    this.navbarToggler.setAttribute("aria-expanded", "false");
    document.body.classList.remove("menu-open");

    this.dropdownItems.forEach((item) => {
      item.classList.remove("active");
      const toggle = item.querySelector(".dropdown-toggle");
      if (toggle) toggle.setAttribute("aria-expanded", "false");
    });

    this.dropdownSubmenuItems.forEach((item) => {
      item.classList.remove("active");
      const toggle = item.querySelector(".dropdown-toggle");
      if (toggle) toggle.setAttribute("aria-expanded", "false");
    });
  }
}

// Initialize when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  new MobileNavigation();
});
