const mobileBurgerBtn = document.getElementById("mobile-navi-trigger");
const mobileNav = document.getElementById("mobile-nav");
const openNavBtn = document.getElementById("open-nav-btn");
const closeNavBtn = document.getElementById("close-nav-btn");
let isMobileNavOpen = false;

mobileBurgerBtn.addEventListener("click", () => {
  if (!isMobileNavOpen) {
    mobileNav.classList.remove("hidden");
    openNavBtn.classList.add("hidden");
    closeNavBtn.classList.remove("hidden");

    isMobileNavOpen = true;
  } else {
    mobileNav.classList.add("hidden");
    openNavBtn.classList.remove("hidden");
    closeNavBtn.classList.add("hidden");

    isMobileNavOpen = false;
  }
});
