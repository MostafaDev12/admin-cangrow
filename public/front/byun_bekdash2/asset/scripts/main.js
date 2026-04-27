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

// Navbar Blur
ScrollTrigger.create({
  start: 100,
  onUpdate: (self) => {
    const nav = document.querySelector("nav");
    if (self.progress > 0) {
      gsap.to(nav, {
        backgroundColor: "rgba(0, 0, 0, 0.9)",
        backdropFilter: "blur(10px)",
        duration: 0.3,
      });
    } else {
      gsap.to(nav, {
        backgroundColor: "transparent",
        backdropFilter: "blur(0px)",
        duration: 0.3,
      });
    }
  },
});
