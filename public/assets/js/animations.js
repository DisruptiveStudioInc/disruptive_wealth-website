// GSAP Animations
gsap.registerPlugin(ScrollTrigger, SplitText);

// toggles animations
const playNone = "play none none none";
const playReverse = "play none none reverse";

// Lateral sections
const sections = gsap.utils.toArray(".lateral-sections .l-section");

const scrollTween = gsap.to(sections, {
  xPercent: -100 * (sections.length - 1),
  ease: "none", // <-- IMPORTANT!
  scrollTrigger: {
    trigger: ".lateral-sections",
    pin: true,
    scrub: 0.1,
    end: "+=3000",
  },
});

const builderContent = document.querySelector(".builder-content");
gsap.from(builderContent.children, {
  y: 40,
  opacity: 0,
  stagger: 0.4,
  scrollTrigger: {
    trigger: builderContent,
    start: "top 85%",
    end: "top 40%",
    scrub: 0.1,
    toggleActions: playReverse,
  },
});

const aboutText = document.querySelector(".about-content");
gsap.from(aboutText.children, {
  x: 40,
  opacity: 0,
  stagger: 0.2,
  scrollTrigger: {
    trigger: aboutText,
    start: "left 40%",
    end: "left 20%",
    scrub: true,
    toggleActions: playReverse,
    containerAnimation: scrollTween,
  },
});

const aboutImage = document.querySelector(".about-image");
gsap.fromTo(
  aboutImage,
  {
    yPercent: 100,
  },
  {
    yPercent: -20,
    scrollTrigger: {
      trigger: ".section-about",
      start: "left 50%",
      end: "left left",
      scrub: true,
      toggleActions: playReverse,
      containerAnimation: scrollTween,
    },
  }
);

// Slide in animations
const slideUp = gsap.utils.toArray(".slide-up");
console.log(slideUp);
gsap.utils.toArray(".slide-up").forEach((element) => {
  gsap.from(element, {
    scrollTrigger: {
      trigger: element,
      start: "top 80%",
      end: "top 50%",
      scrub: true,
      toggleActions: playReverse,
    },
    opacity: 0,
    y: 30,
    // duration: 0.8,
    // ease: "power2.out",
  });
});

document.fonts.ready.then(() => {
  gsap.utils.toArray(".slide-up-words").forEach((element) => {
    SplitText.create(element, {
      type: "words",
      autoSplit: true,
      smartWrap: true,
      onSplit: (self) => {
        return gsap.from(self.words, {
          yPercent: 20,
          autoAlpha: 0,
          stagger: 0.3,
          scrollTrigger: {
            trigger: element,
            start: "top 80%",
            end: "top 50%",
            scrub: true,
            toggleActions: playReverse,
          },
        });
      },
    });
  });
});

gsap.utils.toArray(".stagger-parent").forEach((container) => {
  const elements = container.querySelectorAll(".slide-up-stagger");
  gsap.from(elements, {
    scrollTrigger: {
      trigger: container,
      start: "top 80%",
      end: "top 50%",
      scrub: true,
      toggleActions: playReverse,
    },
    opacity: 0,
    y: 30,
    stagger: 0.2,
    // duration: 0.8,
    // ease: "power2.out",
  });
});
