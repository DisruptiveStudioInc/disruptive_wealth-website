import Swiper from "https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.mjs";

const heroSwiper = new Swiper("#hero-swiper", {
  speed: 1000,
  spaceBetween: 10,
  slidesPerView: "auto",
  centeredSlides: true,
  loopAdditionalSlides: true,
  loop: true,
  initialSlide: 4,
  autoplay: true,
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
