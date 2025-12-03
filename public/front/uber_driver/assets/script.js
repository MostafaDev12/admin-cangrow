// ----------------------------
// DOM ELEMENTS
// ----------------------------
const navToggleBtn = document.getElementById("navToggleBtn");
const navbar = document.getElementById("navbar");
const header = document.querySelector("header");
const faqQuestions = document.querySelectorAll(".faq-question");
const animatedElements = document.querySelectorAll(
  ".card-hover, .benefit-card, .faq-item, .animate-fade-in-up"
);
const contactForm = document.getElementById("contactForm");

// Mobile menu
const headerToggle = document.getElementById("header-toggle");
const mobileMenu = document.getElementById("mobile-menu");

// ----------------------------
// NAVIGATION TOGGLE (Optional)
// ----------------------------
navToggleBtn?.addEventListener("click", () => {
  navbar?.classList.toggle("active");
  navToggleBtn.classList.toggle("active");
});

// ----------------------------
// HEADER SCROLL EFFECT
// ----------------------------
const handleHeaderScroll = () => {
  if (!header) return;

  if (window.scrollY > 50) {
    header.classList.add("bg-primary", "shadow-md");
    header.classList.remove("bg-transparent");
  } else {
    header.classList.remove("bg-primary", "shadow-md");
    header.classList.add("bg-transparent");
  }
};
window.addEventListener("scroll", handleHeaderScroll);
window.addEventListener("load", handleHeaderScroll);

// ----------------------------
// MOBILE MENU TOGGLE
// ----------------------------
headerToggle?.addEventListener("click", () => {
  mobileMenu?.classList.toggle("hidden");
});

// ----------------------------
// FAQ TOGGLE FUNCTIONALITY
// ----------------------------
faqQuestions.forEach((question) => {
  question.addEventListener("click", () => {
    const item = question.parentElement;
    item?.classList.toggle("active");

    const icon = question.querySelector("i");
    if (icon && item) {
      icon.style.transform = item.classList.contains("active")
        ? "rotate(180deg)"
        : "rotate(0deg)";
    }
  });
});

// ----------------------------
// ANIMATION ON SCROLL
// ----------------------------
const initAnimationElements = () => {
  animatedElements.forEach((el) => {
    el.style.opacity = 0;
    el.style.transform = "translateY(50px)";
    el.style.transition = "opacity 0.5s ease, transform 0.5s ease";
  });
};

const animateOnScroll = () => {
  animatedElements.forEach((el) => {
    const elementPosition = el.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 1.3;

    if (elementPosition < screenPosition) {
      el.style.opacity = 1;
      el.style.transform = "translateY(0)";
    }
  });
};

// Intersection Observer for smooth fade-in
const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("fade-in");
      }
    });
  },
  { threshold: 0.1 }
);

document.addEventListener("DOMContentLoaded", () => {
  initAnimationElements();
  animatedElements.forEach((el) => observer.observe(el));
  animateOnScroll(); // trigger initial animation
});
window.addEventListener("scroll", animateOnScroll);

// ----------------------------
// CONTACT FORM SUBMISSION
// ----------------------------
contactForm?.addEventListener("submit", (e) => {
  e.preventDefault();
  alert("شكراً لتواصلكم! سنرد على استفساركم في أقرب وقت ممكن.");
  contactForm.reset();
});
