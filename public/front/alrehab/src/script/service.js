// Initialize the slider
async function initializeSlider() {
  try {
    // Fetch data from JSON file
    const response = await fetch("./src/data-service.json");
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    const data = await response.json();

    const middleIndex = Math.floor(data.length / 2);

    // Create Swiper container
    const swiperContainer = document.createElement("div");
    swiperContainer.className = "swiper mySwiper";

    // Create Swiper wrapper
    const swiperWrapper = document.createElement("div");
    swiperWrapper.className =
      "swiper-wrapper hover:h-[90vh] transition-all duration-700";

    // Create slides
    data.forEach((item, i) => {
      const slide = document.createElement("div");
      slide.className = "swiper-slide flex justify-center items-center p-4";

      // Create service card
      const card = document.createElement("div");
      // Card content
      card.innerHTML = `
    <a href=${i} class="card">
      <div class="imgbox overflow-hidden">
        <img src=${item.img} alt="" />
      </div>
      <div class="content">
        <div class="flex justify-center">
          <span>${item.title}</span>
        </div>
        <p>${item.subTitle}</p>
      </div>
      <h2>${item.title}</h2>
    </a>
        `;

      slide.appendChild(card);
      swiperWrapper.appendChild(slide);
    });

    swiperContainer.appendChild(swiperWrapper);

    // Add pagination
    const pagination = document.createElement("div");
    pagination.className = "swiper-pagination";
    swiperContainer.appendChild(pagination);

    document.getElementById("servicesSlider").appendChild(swiperContainer);

    // Initialize Swiper
    new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      initialSlide: middleIndex,
      keyboard: true,
      coverflowEffect: {
        rotate: 0,
        stretch: 20,
        depth: 150,
        modifier: 2,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        640: {
          coverflowEffect: {
            rotate: 5,
            stretch: 10,
            depth: 100,
            modifier: 1,
          },
        },
      },
    });
  } catch (error) {
    console.error("Error loading the slider:", error);
    document.getElementById("servicesSlider").innerHTML = `
        <div class="text-center py-8 text-red-500">
          حدث خطأ في تحميل البيانات. يرجى المحاولة مرة أخرى لاحقًا.
        </div>
      `;
  }
}

// Initialize when DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
  // Initialize Lucide icons if needed
  if (window.lucide) {
    lucide.createIcons();
  }

  // Initialize the slider
  initializeSlider();
});
