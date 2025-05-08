// Function to create the loading container dynamically
function createLoadingContainer() {
  //   <div class="loading-container">
  //   <div class="d-flex flex-column align-items-center gap-5">
  //     <figure class="about-box-image" style="width:100px;height:100px">
  //       <img src="./images/drhebametwally/logo.jpg" class="about-animate" alt="logo">
  //     </figure>
  //     <div class="spinner"></div>
  //   </div>
  // </div>

  // Create the main loading-container div
  const loadingContainer = document.createElement("div");
  loadingContainer.className = "loading-container";

  // Create the inner flex container
  const flexContainer = document.createElement("div");
  flexContainer.className = "d-flex flex-column align-items-center gap-5";

  // Create the figure element
  const figure = document.createElement("figure");
  figure.className = "about-box-image";
  figure.style.width = "100px";
  figure.style.height = "100px";

  // Create the image inside the figure
  const img = document.createElement("img");
  img.src = logo_src; // Replace with your image path
  img.className = "about-animate";
  img.alt = "logo";

  // Append the image to the figure
  figure.appendChild(img);

  // Create the spinner div
  const spinner = document.createElement("div");
  spinner.className = "spinner";

  // Append the figure and spinner to the flex container
  flexContainer.appendChild(figure);
  flexContainer.appendChild(spinner);

  // Append the flex container to the loading container
  loadingContainer.appendChild(flexContainer);

  // Append the loading container to the body (or any other parent element)
  document.body.appendChild(loadingContainer);
}

// Call the function to create the loading container
createLoadingContainer();

// onLoadingPage
function onLoadingPage() {
  let loadingContainer = document.querySelector(".loading-container");
  let header = document.querySelector("header");
  let main = document.querySelector("main");
  let footer = document.querySelector("footer");

  if (header) {
    header.style.display = "none";
  }
  if (main) {
    main.style.display = "none";
  }
  if (footer) {
    footer.style.display = "none";
  }

  setTimeout(() => {
    if (header) {
      header.style.display = "block";
    }
    if (main) {
      main.style.display = "block";
    }
    if (footer) {
      footer.style.display = "block";
    }
    if (loadingContainer) {
      loadingContainer.style.display = "none";
    }
  }, 1000);
}

window.addEventListener("load", (e) => {
  onLoadingPage();
});

// Header scroll

let nav = document.querySelector(".header-desktop.nav-scroll"),
  logoScroll = document.querySelector(".logo-scroll"),
  searchButton = document.getElementById("searchButton"),
  searchInput = document.getElementById("searchInput");

window.onscroll = function () {
  if (document.documentElement.scrollTop > 100) {
    nav.classList.add("header-scrolled");
    logoScroll.style.display = "block";

    if (searchInput.classList.contains("active")) {
      searchInput.classList.remove("active");
    }
  } else {
    nav.classList.remove("header-scrolled");
    logoScroll.style.display = "none";
  }
};
// Navbar hide

let navLinks = document.querySelectorAll(".nav-link");
let navCollapse = document.querySelector(".navbar-collapse.collapse");

navLinks.forEach(function (link) {
  link.addEventListener("click", function () {
    navCollapse.classList.remove("show");
  });
});

// searchButton
searchButton.addEventListener("click", function () {
  searchInput.classList.toggle("active");
  if (searchInput.classList.contains("active")) {
    searchInput.focus(); // Focus on the input when it becomes visible
  }
});
