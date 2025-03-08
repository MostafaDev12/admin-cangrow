// Function to handle intersection changes
function handleIntersection(entries, observer) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("box-visible"); // Add the 'visible' class when the element is in view
      observer.unobserve(entry.target); // Stop observing once the animation is triggered
    }
  });
}

// Initialize Intersection Observer
const options = {
  root: null, // Use the viewport as the root
  rootMargin: "0px", // No margin around the root
  threshold: 0.5, // Trigger when 50% of the element is visible
};

const observer = new IntersectionObserver(handleIntersection, options);

// Select all boxes and observe them
document.querySelectorAll(".box-invisible").forEach((box) => {
  observer.observe(box);
});
