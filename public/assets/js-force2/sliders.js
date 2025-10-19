import Swiper from "https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.mjs";

const heroSwiper = new Swiper("#hero-swiper", {
  speed: 800,
  spaceBetween: 10,
  slidesPerView: "auto",
  centeredSlides: true,
  loopAdditionalSlides: true,
  loop: true,
  initialSlide: 4,
  autoplay: {
    delay: 1200,
  },
});

const techSwiper = new Swiper("#tech-swiper", {
  speed: 1000,
  spaceBetween: 20,
  autoHeight: false,
  slidesPerView: 1,
  centeredSlides: true,
  loopAdditionalSlides: true,
  loop: true,
  autoplay: true,
  initialSlide: 3,
});

const subcategoriesSwiper = new Swiper("#subcategories-swiper", {
  speed: 1000,
  spaceBetween: 20,
  autoHeight: false,
  slidesPerView: 1,
  centeredSlides: true,
  navigation: {
    nextEl: ".subcategories-button-next",
    prevEl: ".subcategories-button-prev",
  },
});

const ipsSwiper = new Swiper("#ips-swiper", {
  speed: 1000,
  spaceBetween: 20,
  autoHeight: false,
  slidesPerView: 1,
  loopAdditionalSlides: true,
  loop: true,
  autoplay: true,
  pagination: {
    el: ".ips-pagination",
    type: "bullets",
    dynamicBullets: true,
  },
});

const clientsSliderOps = {
  speed: 9000,
  spaceBetween: 20,
  autoHeight: false,
  slidesPerView: 2,
  loop: true,
  initialSlide: 6,
  freemode: {
    enabled: true,
    momentum: false,
  },
  breakpoints: {
    640: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 4,
    },
    1088: {
      slidesPerView: 6,
    },
  },
};
const clients1Swiper = new Swiper(".clients-odd-swiper", {
  ...clientsSliderOps,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
    pauseOnMouseEnter: false,
    reverseDirection: false,
  },
});

const clients2Swiper = new Swiper(".clients-even-swiper", {
  ...clientsSliderOps,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
    pauseOnMouseEnter: false,
    reverseDirection: true,
  },
});

const certificatesSliderOps = {
  speed: 9000,
  spaceBetween: 20,
  autoHeight: false,
  slidesPerView: 3,
  loop: true,
  initialSlide: 6,
  freemode: {
    enabled: true,
    momentum: false,
  },
  breakpoints: {
    640: {
      slidesPerView: 4,
    },
    768: {
      slidesPerView: 6,
    },
    1088: {
      slidesPerView: 8,
    },
  },
};

const certifications1Swiper = new Swiper(".certifications1", {
  ...certificatesSliderOps,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
    pauseOnMouseEnter: false,
    reverseDirection: false,
  },
});

const certifications2Swiper = new Swiper(".certifications2", {
  ...certificatesSliderOps,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
    pauseOnMouseEnter: false,
    reverseDirection: true,
  },
});
