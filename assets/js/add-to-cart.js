const openCartBtn = document.getElementById("open-cart-btn");
const cart = document.getElementById("the-cart");
const cartItemContainer = document.getElementById("cart-books-container");
const closeBtn = document.getElementById("close-cart-btn");

const addItemBtns = document.querySelectorAll(".add-item");

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
async function getCartItems() {
  let response = await sendRequest(
    "http://localhost/chapter-one/controllers/addToCartController.php",
    "cart",
    null
  );
  console.log(response);
  if (response.items === 0) {
    cartItemContainer.innerHTML = `
      <div class="empty-cart" id="empty-cart-message">
        <img src="../assets/images/empty_cart_icon.svg" alt="empty-cart-icon">
        <p>The cart is empty.</p>
      </div>`;
  } else {
    renderCartItems(response.items);
  }
}

async function sendRequest(url, type, bookId) {
  let data;
  try {
    let res = await fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json; charset=utf-8",
      },
      body: JSON.stringify({ bookId, type }),
    });

    console.log(type);
    data = await res.json();
  } catch (err) {
    console.log(err);
  } finally {
    return data;
  }
}

function renderCartItems(items) {
  const emptyCartMessage = document.getElementById("empty-cart-message");
  console.log(emptyCartMessage);
  if (emptyCartMessage) {
    emptyCartMessage.remove();
  }
  cartItemContainer.innerHTML = "";
  let itemKey = Object.keys(items);
  itemKey.forEach((key) => {
    cartItemContainer.innerHTML += `
    <div class="cart-book">
      <div class="image">
        <img width="80px" src="../assets/images/${items[key].book_cover}" alt="book-cover-image">
      </div>
      <div class="info">
        <div class="rating">
            <img src="../assets/images/4-review.svg" alt="4-review image">
            <a class="remove">Remove</a>
        </div>
        <span class="title">
           ${items[key].book_title}
        </span>
        <div class="price_amount">
            <span class="price">£${items[key].book_price}</span>
            <div class="amount">
                <button class="minus">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 12H4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <span>1</span>
                <button class="plus">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 4V20M20 12H4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
      </div>
    </div>`;
  });
}

async function addItem(e) {
  const bookId = e.currentTarget.previousElementSibling.value;
  const addBtn = e.currentTarget;
  const addedSuccessText = e.currentTarget.nextElementSibling;

  let response = await sendRequest(
    "http://localhost/chapter-one/controllers/addToCartController.php",
    "add",
    bookId
  );

  let isReuqestHasError = response.error;
  if (!isReuqestHasError) {
    console.log(response.data);
    renderCartItems(response.data);
    addBtn.remove();
    addedSuccessText.innerHTML = `<p class="added-state">Added</p>`;
  } else {
    console.log(response.message);
    addBtn.disabled = true;
  }
}

window.addEventListener("resize", checkMediaQuery);

openCartBtn.addEventListener("click", () => {
  console.log("hello");
  cart.classList.add("sw-scale");
});
closeBtn.addEventListener("click", () => {
  cart.classList.remove("sw-scale");
});
addItemBtns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    addItem(e);
  });
});
checkMediaQuery();
getCartItems();
