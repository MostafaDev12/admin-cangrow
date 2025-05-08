const swiperWrapper = document.querySelectorAll(
  ".swiper-wrapper .swiper-slide"
);
console.log(swiperWrapper.length);
const middleIndex = Math.floor(swiperWrapper.length / 2);

var swiper = new Swiper(".mySwiper", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  initialSlide: 2,

  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: false,
  },
  pagination: {
    el: ".swiper-pagination",
  },
});

const swiperSide = (img, title, subTitle) => `
                <div class="swiper-slide">
                    <a href="" class="card">
                        <div class="imgbox overflow-hidden">
                            <img src=${img} alt="" />
                        </div>
                        <div class="content">
                            <div class="flex justify-center">
                                <span>${title}</span>
                            </div>
                            <p>${subTitle}</p>
                        </div>
                        <h2>${title}</h2>
                    </a>
                </div>
`;
