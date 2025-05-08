document.addEventListener("DOMContentLoaded", () => {
  const startButton = document.getElementById("startButton");
  const main = document.querySelector("main");
  const header = document.querySelector("header");
  const featureItems = document.querySelectorAll("li");

  // Initialize Framer Motion
  const { motion } = window.framerMotion;

  // Animate header
  motion(header, {
    initial: { opacity: 0, y: -20 },
    animate: { opacity: 1, y: 0 },
    transition: { duration: 0.5 },
  });

  // Animate main content
  motion(main, {
    initial: { opacity: 0, y: 20 },
    animate: { opacity: 1, y: 0 },
    transition: { duration: 0.5, delay: 0.2 },
  });

  // Animate feature items
  featureItems.forEach((item, index) => {
    motion(item, {
      initial: { opacity: 0, x: -20 },
      animate: { opacity: 1, x: 0 },
      transition: { duration: 0.3, delay: 0.3 + index * 0.1 },
    });
  });

  startButton.addEventListener("click", () => {
    // Add a simple animation effect
    motion(startButton, {
      scale: 0.95,
      transition: { duration: 0.1 },
    }).then(() => {
      motion(startButton, {
        scale: 1,
        transition: { duration: 0.1 },
      });
    });

    // Show a welcome message
    alert("Welcome to the project! 🎉");
  });

  // Add hover effect for feature items
  featureItems.forEach((item) => {
    item.addEventListener("mouseenter", () => {
      motion(item, {
        scale: 1.05,
        transition: { duration: 0.2 },
      });
      item.classList.add("text-primary");
    });
    item.addEventListener("mouseleave", () => {
      motion(item, {
        scale: 1,
        transition: { duration: 0.2 },
      });
      item.classList.remove("text-primary");
    });
  });
});
