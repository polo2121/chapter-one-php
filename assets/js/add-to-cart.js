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

async function sendRequest(bookId) {
  let data;
  try {
    let res = await fetch(
      "http://localhost/chapter-one/controllers/addToCartController.php",
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify({ bookId }),
      }
    );

    data = await res.json();
    console.log(data);
  } catch (err) {
    console.log(err);
  } finally {
    return data;
  }
}

async function addItem(e) {
  const bookId = e.currentTarget.previousElementSibling.value;
  const addBtn = e.currentTarget;
  const addedSuccessText = e.currentTarget.nextElementSibling;

  let response = await sendRequest(bookId);

  let isReuqestSuccess = response.error;
  if (!isReuqestSuccess) {
    addBtn.remove();
    addedSuccessText.innerHTML = `<p class="added-state">Added</p>`;
  } else {
    console.log(response.message);
    addBtn.disabled = true;
  }
}

window.addEventListener("resize", checkMediaQuery);

let clickedCount = 0;
const stackSequence = [
  { transform: "scale(1)", bottom: "0px" },
  { transform: "scale(0.9)", bottom: "30px" },
  { transform: "scale(0.8)", bottom: "60px" },
];
checkMediaQuery();

const addItemBtns = document.querySelectorAll(".add-item");

addItemBtns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    addItem(e);
  });
});

console.log(addItemBtns);

openCartBtn.addEventListener("click", () => {
  console.log("hello");
  cart.classList.add("sw-scale");
});

closeBtn.addEventListener("click", () => {
  cart.classList.remove("sw-scale");
});
