// GSAP Animations
gsap.registerPlugin(ScrollTrigger, SplitText, MotionPathPlugin);

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

// Discover tabs svgs
export const ballUpAnim = gsap.fromTo(
  "#ball-up",
  {
    opacity: 0,
  },
  {
    motionPath: {
      path: "#motion-up",
      align: "#motion-up",
      alignOrigin: [0.5, 0.5],
      autoRotate: true,
    },
    transformOrigin: "50% 50%",
    opacity: 0,
    keyframes: {
      "3%": { opacity: 1 },
      "97%": { opacity: 1 },
      "100%": { opacity: 0 },
    },
    duration: 1,
    ease: "power1.inOut",
    paused: true,
  }
);
export const ballDownAnim = gsap.fromTo(
  "#ball-down",
  {
    opacity: 0,
  },
  {
    motionPath: {
      path: "#motion-down",
      align: "#motion-down",
      alignOrigin: [0.5, 0.5],
      autoRotate: true,
    },
    transformOrigin: "50% 50%",
    opacity: 0,
    keyframes: {
      "3%": { opacity: 1 },
      "97%": { opacity: 1 },
      "100%": { opacity: 0 },
    },
    duration: 1,
    ease: "power2.inOut",
    paused: true,
  }
);
export const flipTabContent = gsap.to("#discover-content", {
  rotateY: 360,
  transformOrigin: "50% 50%",
  keyframes: {
    "50%": { scale: 1.2 },
    "100%": { scale: 1 },
  },
  duration: 0.7,
  ease: "power2.inOut",
  paused: true,
  onUpdate: function () {
    const progress = this.progress();
    const content = document.querySelector("#discover-content-wrap");
    // Hide content when card is perpendicular (between 25% and 75%)
    if (progress > 0.25 && progress < 0.75) {
      content.style.opacity = "0";
    } else {
      content.style.opacity = "1";
    }
  },
});

// Ecosystem verticals animation
const disrVerticals = document.querySelectorAll(".disr-vertical");
const ecosystemCircle = document.getElementById("ecosystem-circle");
const circleExpansions = document.querySelectorAll(".circle-expansion");

if (disrVerticals.length && ecosystemCircle) {
  gsap.fromTo(
    disrVerticals,
    {
      "--radius": "0px",
      opacity: 0,
    },
    {
      "--radius": "360px",
      opacity: 1,
      duration: 0.5,
      delay: 0.1,
      ease: "power1.in",
      scrollTrigger: {
        trigger: ecosystemCircle,
        start: "top center",
        end: "top center",
        toggleActions: playReverse,
      },
    }
  );

  // Ecosystem hover magnetic effect
  let magneticEffectActive = false;
  let magneticListeners = [];

  function initMagneticEffect() {
    const disrVerticals = document.querySelectorAll(".disr-vertical");
    const ecosystemCircle = document.getElementById("ecosystem-circle");
    const innerCircle = document.querySelector(".circle-expansion.w-3\\/10");
    const verticalsList = document.getElementById("disr-verticals");

    if (
      !disrVerticals.length ||
      !ecosystemCircle ||
      !innerCircle ||
      !verticalsList
    )
      return;

    const isDesktop = window.innerWidth >= 1088;

    if (isDesktop && !magneticEffectActive) {
      // Activate magnetic effect
      magneticEffectActive = true;

      disrVerticals.forEach((vertical) => {
        const mouseEnterHandler = () => {
          const verticalRect = vertical.getBoundingClientRect();
          const circleRect = ecosystemCircle.getBoundingClientRect();

          // Calculate center points
          const verticalCenterX = verticalRect.left + verticalRect.width / 2;
          const verticalCenterY = verticalRect.top + verticalRect.height / 2;
          const circleCenterX = circleRect.left + circleRect.width / 2;
          const circleCenterY = circleRect.top + circleRect.height / 2;

          // Calculate distance to move
          const deltaX = (verticalCenterX - circleCenterX) * 0.25;
          const deltaY = (verticalCenterY - circleCenterY) * 0.25;

          // Main circle moves more
          gsap.to(ecosystemCircle, {
            x: deltaX,
            y: deltaY,
            duration: 0.6,
            ease: "power2.out",
          });

          // Inner circle moves less (giving depth)
          gsap.to(innerCircle, {
            x: deltaX * 0.5,
            y: deltaY * 0.5,
            duration: 0.6,
            ease: "power2.out",
          });
        };

        vertical.addEventListener("mouseenter", mouseEnterHandler);
        magneticListeners.push({
          element: vertical,
          handler: mouseEnterHandler,
          type: "mouseenter",
        });
      });

      const mouseLeaveHandler = () => {
        gsap.to([ecosystemCircle, innerCircle], {
          x: 0,
          y: 0,
          duration: 0.6,
          ease: "power2.out",
        });
      };

      verticalsList.addEventListener("mouseleave", mouseLeaveHandler);
      magneticListeners.push({
        element: verticalsList,
        handler: mouseLeaveHandler,
        type: "mouseleave",
      });
    } else if (!isDesktop && magneticEffectActive) {
      // Deactivate magnetic effect
      magneticEffectActive = false;

      // Remove all listeners
      magneticListeners.forEach(({ element, handler, type }) => {
        element.removeEventListener(type, handler);
      });
      magneticListeners = [];

      // Reset positions
      gsap.set([ecosystemCircle, innerCircle], { x: 0, y: 0 });
    }
  }

  // Initialize on load
  initMagneticEffect();

  // Reinitialize on resize with debounce
  let resizeTimeout;
  window.addEventListener("resize", () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(initMagneticEffect, 150);
  });
}

if (circleExpansions.length && ecosystemCircle) {
  gsap.fromTo(
    circleExpansions,
    {
      scale: 0,
      opacity: 0,
    },
    {
      scale: 1,
      opacity: 1,
      duration: 1,
      ease: "power2.out",
      stagger: 0.1,
      scrollTrigger: {
        trigger: ecosystemCircle,
        start: "top center",
        end: "top center",
        toggleActions: playReverse,
      },
    }
  );
}
