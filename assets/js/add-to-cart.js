const openCartBtns = document.querySelectorAll(".open-cart-btn");
const cart = document.getElementById("the-cart");
const cartItemContainer = document.getElementById("cart-books-container");
const closeBtn = document.getElementById("close-cart-btn");
const addItemBtns = document.querySelectorAll(".add-item");
const addItemBtns2 = document.querySelectorAll(".add-item-2");
const totalCartItem = document.getElementById("total-cart-item");
const itemInfo = document.getElementById("item-info");

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
async function sendRequest(type, bookId = null, quantity = null) {
  let res;
  try {
    res = await fetch(
      "http://localhost/chapter-one/controllers/addToCartController.php",
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify({ bookId, quantity, type }),
      }
    );
    return (res = await res.json());
  } catch (err) {
    console.log(err);
  }
}
async function createCart() {
  let data = await sendRequest("get");
  if (data.error) return console.log(data.error.message);
  updateCart(data);
}
function updateCart({ cart }) {
  storeOnLocalStorage(cart);
  const cartItems = getFromLocalStorage("cart");
  renderCartItems(cartItems);
}
function storeOnLocalStorage(data) {
  return localStorage.setItem("cart", JSON.stringify(data));
}
function getFromLocalStorage(name) {
  return JSON.parse(localStorage.getItem(name));
}
function renderCartItems(cart) {
  console.log(cart);
  // if there is item in the cart, remove the empty illustration and shows checkout button
  cartItemContainer.innerHTML = "";

  if (cart.total_items !== 0) {
    let totalQuantity = 0,
      totalSubPrice = 0;
    showCheckout();
    let itemKey = Object.keys(cart.items);
    itemKey.forEach((key) => {
      let {
        book_cover: bookCover,
        book_title: bookTitle,
        book_price: bookPrice,
        book_id: bookId,
        quantity,
      } = cart.items[key];

      console.log(totalQuantity);

      totalQuantity = showTotalQuantity(totalQuantity, quantity);
      totalSubPrice = calculateTotalSubPrice(
        totalSubPrice,
        quantity,
        bookPrice
      );

      cartItemContainer.innerHTML += `
      <div class="cart-book">
        <div class="image">
          <img width="80px" src="../assets/images/${bookCover}" alt="book-cover-image">
        </div>
        <div class="info">
          <div class="rating">
              <img src="../assets/images/4-review.svg" alt="4-review image">
              <a class="remove">Remove</a>
          </div>
          <span class="title">
             ${bookTitle}
          </span>
          <div class="price_amount">
              <span class="price">£${bookPrice}</span>
              <div class="amount">
                  <button class="minus" onclick="decreaseQuantity('${bookId}')">
                      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M20 12H4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                  </button>
                  <span>${quantity}</span>
                  <button class="plus" onclick="increaseQuantity('${bookId}')">
                      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12 4V20M20 12H4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                  </button>
              </div>
          </div>
        </div>
      </div>`;
    });
  } else {
    cartItemContainer.innerHTML = showCartIsEmpty();
  }
}
async function addItem(e) {
  const bookId = e.currentTarget.previousElementSibling.value;
  const addBtn = e.currentTarget;
  const addedSuccessText = e.currentTarget.nextElementSibling;

  let isItemInCart = checkItemIsInCart(bookId);
  if (isItemInCart) {
    return (itemInfo.innerHTML = getItemInfoHTML(
      "The item is already in the cart."
    ));
  }

  let response = await sendRequest("add", bookId, 1);
  let isReuqestHasError = response.error;
  // if the item is added to the cart successfully...
  if (!isReuqestHasError) {
    updateCart(response);
    addBtn.classList.add("hidden");
    addedSuccessText.innerHTML = `<p class="added-state">Added</p>`;
  } else {
    console.log(response.message);
    return (itemInfo.innerHTML = getItemInfoHTML(
      "The item is already in the cart."
    ));
  }
}

// this function for add-to-cart buttons in the landing page
function checkItemIsInCart(bookId) {
  let isItemInCart = false;
  const cart = getFromLocalStorage("cart");

  // check the cart is stored on the localStorage
  if (!cart) {
    return location.reload();
  }
  // null or undefined means the book id is no in the cart.
  if (cart.items === undefined || cart.items === null) {
    return (isItemInCart = false);
  }
  let itemKey = Object.keys(cart.items);
  itemKey.forEach((key) => {
    if (key === bookId) {
      isItemInCart = true;
    }
  });
  return isItemInCart;
}
async function increaseQuantity(id) {
  const cart = getFromLocalStorage("cart");
  console.log("increase");
  if (cart.items.hasOwnProperty(id)) {
    const res = await sendRequest("increase", id);
    if (res.error) {
      console.log("Cannot increase the amount. Please try again.");
      itemInfo.innerHTML = getItemInfoHTML(
        "Cannot add the item to the cart. Please try again."
      );
      return;
    }
    updateCart(res);
  }
}
async function decreaseQuantity(id) {
  const cart = getFromLocalStorage("cart");
  if (cart.items.hasOwnProperty(id)) {
    const res = await sendRequest("decrease", id);
    if (res.error) {
      console.log("Cannot decrease the amount. Please try again.");
      return (itemInfo.innerHTML = getItemInfoHTML(
        "Cannot reduce the item's amount in the cart. Please try again."
      ));
    }
    updateCart(res);
    if (!res.cart.items.hasOwnProperty(id)) {
      const addItemBtns = document.querySelector(
        `input[name="book"][value="${id}"]`
      );
      const addBtn = addItemBtns.nextElementSibling;
      const addedText = addItemBtns.nextElementSibling.nextElementSibling;

      addBtn.classList.remove("hidden");
      addedText.innerHTML = ``;
    }
  }
}
function showCheckout() {
  const checkOut = document.getElementById("check-out");

  return (checkOut.innerHTML = `
  <div class="subtotal">
    <span>Subtotal</span>
    <span id="total-sub-price">0</span>
  </div>
   <a class="checkout" href="./review-order.php">
    <button class="btn-style-1">
      Checkout Now
    </button>
  </a>`);
}
function showCartIsEmpty() {
  return `
    <div class="empty-cart">
      <img src="../assets/images/empty_cart_icon.svg" alt="empty-cart-icon">
      <p>The cart is empty.</p>
    </div>`;
}
function showTotalQuantity(totalQuantity, quantity) {
  if (totalCartItem.classList.contains("hidden")) {
    totalCartItem.classList.remove("hidden");
  }
  totalQuantity += parseInt(quantity);
  totalCartItem.innerText = totalQuantity;
  return totalQuantity;
}
function calculateTotalSubPrice(totalSub, quantity, price) {
  const totalSubPrice = document.getElementById("total-sub-price");
  totalSub += parseInt(quantity) * price;
  totalSubPrice.innerText = `£${totalSub.toFixed(2)}`;
  return totalSub;
}

//  Purpose - to provide html code with dynamic message about when users' action is not successful/incorrect.
function getItemInfoHTML(message) {
  return `
  <p class="alert-box fade-away">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#7f3939" fill="none">
      <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    ${message}
  </p>`;
}
window.addEventListener("resize", checkMediaQuery);
openCartBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    console.log("hello");
    cart.classList.add("sw-scale");
  });
});

closeBtn.addEventListener("click", () => {
  cart.classList.remove("sw-scale");
});
addItemBtns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    addItem(e);
  });
});
addItemBtns2.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    addItem(e);
  });
});
checkMediaQuery();
createCart();
