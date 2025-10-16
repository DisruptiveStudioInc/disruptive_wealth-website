// Mobile menu toggle
const mobileMenuButton = document.getElementById("mobile-menu-button");
const mobileCloseMenuButton = document.getElementById("close-mobile-button");
const mobileMenu = document.getElementById("mobile-menu");
const mobileNavMenu = document.getElementById("mobile-nav");

if (mobileMenuButton && mobileCloseMenuButton && mobileMenu && mobileNavMenu) {
  mobileMenuButton.addEventListener("click", () => {
    mobileMenu.classList.remove("-translate-y-full");
    document.body.classList.add("overflow-y-hidden");
  });
  mobileCloseMenuButton.addEventListener("click", () => {
    mobileMenu.classList.add("-translate-y-full");
    document.body.classList.remove("overflow-y-hidden");
  });
  mobileNavMenu.addEventListener("click", (event) => {
    const link = event.target.closest("a");
    if (!link || !mobileNavMenu.contains(link)) return;
    mobileMenu.classList.add("-translate-y-full");
    document.body.classList.remove("overflow-y-hidden");
  });
}

// Language switcher for mobile
const langSwitchers = document.querySelectorAll(".language-switcher");

if (langSwitchers.length > 0) {
  langSwitchers.forEach((switcher) => {
    const trigger = switcher.querySelector(".lang-trigger");
    const options = switcher.querySelector(".lang-options");

    const handleLangClose = () => {
      trigger.classList.remove("open");
      options.classList.remove("open");
    };

    const handleLangToggle = () => {
      if (window.innerWidth >= 1088) return;
      trigger.addEventListener("click", () => {
        trigger.classList.toggle("open");
        options.classList.toggle("open");
      });
    };

    window.addEventListener("resize", () => {
      if (window.innerWidth >= 1088) {
        handleLangClose();
      } else {
        handleLangToggle();
      }
    });

    //close switcher when clicked outsite
    window.addEventListener("click", (event) => {
      const targetElement = event.target;
      if (!switcher.contains(targetElement)) {
        handleLangClose();
      }
    });

    handleLangToggle();
  });
}

// Accordion toggle
const accordionContainers = document.querySelectorAll(".accordion-container");

if (accordionContainers.length > 0) {
  accordionContainers.forEach((accContainer) => {
    accContainer.addEventListener("click", (event) => {
      const trigger = event.target.closest(".acc-trigger");
      if (!trigger) return;

      const content = document.getElementById(trigger.dataset.target);
      if (!content) return;
      content.classList.toggle("open");
      trigger.classList.toggle("open");
    });
  });
}

// Discover tabs
const discoverTabs = document.getElementById("discover-tabs");
const discoverContent = document.getElementById("discover-content");

if (discoverTabs && discoverContent) {
  discoverTabs.addEventListener("click", (event) => {
    const trigger = event.target.closest(".discover-tab");
    if (!trigger) return;

    const tabs = discoverTabs.querySelectorAll(".discover-tab");
    tabs.forEach((tab) => tab.classList.remove("active"));
    trigger.classList.add("active");

    const contentData = JSON.parse(discoverContent.dataset.content);
    if (!contentData) return;
    const index = trigger.dataset.index;

    const icon = discoverContent.querySelector("svg");
    const title = discoverContent.querySelector("h3");
    const text = discoverContent.querySelector("p");

    const setContent = () => {
      title.innerHTML = contentData[index].title;
      text.innerHTML = contentData[index].text;
    };

    setContent();
  });
}
