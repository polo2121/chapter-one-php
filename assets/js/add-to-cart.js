const openCartBtn = document.getElementById("open-cart-btn");
const cart = document.getElementById("cart");
const closeBtn = document.getElementById("close-cart-btn");

const desktopWidth = window.matchMedia("(min-width: 1200px)");
const laptopWidth = window.matchMedia("(min-width: 1024px)");
const tabletWidth = window.matchMedia("(min-width: 768px)");
const phoneWidth = window.matchMedia("(min-width: 480px)");
const smallPhoneWidth = window.matchMedia("(min-width: 200px)");

function checkMediaQuery() {
  console.log(desktopWidth, laptopWidth);
  if (desktopWidth.matches) {
    cart.style.setProperty("--cartWidth", "30%");
    return;
  }
  if (laptopWidth.matches) {
    cart.style.setProperty("--cartWidth", "40%");
    return;
  }
  if (tabletWidth.matches) {
    cart.style.setProperty("--cartWidth", "60%");
    return;
  }
  if (phoneWidth.matches) {
    cart.style.setProperty("--cartWidth", "80%");
    return;
  }
  if (smallPhoneWidth.matches) {
    cart.style.setProperty("--cartWidth", "100%");
    return;
  }
}

checkMediaQuery();

openCartBtn.addEventListener("click", () => {
  console.log("hello");
  cart.classList.add("sw-scale");
});

closeBtn.addEventListener("click", () => {
  cart.classList.remove("sw-scale");
});

window.addEventListener("resize", checkMediaQuery);
