import Swiper from "https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.mjs";
import DepthSlider from "./depthSlider.js";

const edgeSwiper = new Swiper(".edge-items", {
  speed: 9000,
  spaceBetween: 20,
  autoHeight: false,
  slidesPerView: 1,
  loop: true,
  initialSlide: 2,
  lazyPreloadPrevNext: 3,
  loopAdditionalSlides: 6,
  loopPreventsSliding: true,
  freemode: {
    enabled: true,
    momentum: false,
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    1088: {
      slidesPerView: 3,
    },
  },
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
    pauseOnMouseEnter: false,
    reverseDirection: false,
  },
});

const swiperServices = new Swiper(".swiper-tt", {
  direction: "vertical",
  effect: "fade",
  speed: 500,
  spaceBetween: 0,
  breakpoints: {
    1088: {
      direction: "horizontal",
      allowTouchMove: false,
    },
  },
  navigation: {
    nextEl: "#serv-next",
    prevEl: "#serv-prev",
  },
  pagination: {
    el: "#serv-dots",
    clickable: true,
    bulletClass: "serv-dot",
    bulletActiveClass: "bg-brand-100",
    renderBullet: function (index, className) {
      return `<li tabindex="0" role="button" aria-label="Got to slide ${
        index + 1
      }" class="h-3 w-4 xs:w-8 transition-colors ${className}"></li>`;
    },
  },
});

const servicesFirstButton = document.getElementById("serv-int-button");
if (swiperServices && servicesFirstButton) {
  servicesFirstButton.addEventListener("click", () => {
    swiperServices.slideNext();
  });
}

const mySwiper = new Swiper(".my-swiper", {
  effect: "cards",
  grabCursor: true,
  pagination: {
    el: "#my-swiper-pagination",
    clickable: true,
    bulletClass: "flex-center",
    bulletActiveClass: "active",
    renderBullet: function (index, className) {
      return `<li tabindex="0" role="button" aria-label="Go to process ${
        index + 1
      }" class="size-9 lg:size-12 text-lg lg:text-xl font-bold text-white leading-none rounded-full bg-brand-100 hover:bg-brand-200 active:bg-brand-200 [&.active]:bg-brand-200 [&.active]:ring-2 [&.active]:ring-white transition-colors cursor-pointer ${className}">${
        index + 1
      }</li>`;
    },
  },
});

const faqSliderEl = document.getElementById("faq-slider");
if (faqSliderEl) {
  const faqSlider = new DepthSlider("#faq-slider");
}
