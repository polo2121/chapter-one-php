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

let itemsInCart = {};

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
    console.log(type);

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

    res = await res.json();
  } catch (err) {
    console.log(err);
  } finally {
    return res.data;
  }
}
async function createCart() {
  let data = await sendRequest("get");
  updateCart(data);
}
function updateCart(data) {
  storeOnLocalStorage(data);
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
  // if there is item in the cart, remove the empty illustration and shows checkout button
  cartItemContainer.innerHTML = "";
  console.log(cart);
  if (cart.items !== 0) {
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
                  <button class="minus">
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

  let response = await sendRequest("add", bookId, 1);

  let isReuqestHasError = response.error;

  // if the item is added to the cart successfully...
  if (!isReuqestHasError) {
    updateCart(response);
    addBtn.remove();
    addedSuccessText.innerHTML = `<p class="added-state">Added</p>`;
  } else {
    console.log(response.message);
    addBtn.disabled = true;
  }
}
function increaseQuantity(id) {
  const cart = getFromLocalStorage("cart");
  // renderCartItems(cartItems);
  if (cart.items.hasOwnProperty(id)) {
    cart.items[id].quantity = ++cart.items[id].quantity;
    sendRequest("increase", id, cart.items[id].quantity);
    console.log(cart);
    updateCart(cart);
    console.log(cart.items[id]);
  }
}
function showCheckout() {
  const emptyCartMessage = document.getElementById("empty-cart-message");
  const totalSubPrice = document.getElementById("sub-total-price");
  const checkOut = document.getElementById("check-out");

  if (emptyCartMessage) {
    emptyCartMessage.remove();
  }
  checkOut.innerHTML = `
  <div class="subtotal">
    <span>Subtotal</span>
    <span>0</span>
  </div>
   <a class="checkout" href="./review-order.html">
    <button class="btn-style-1">
      Checkout Now
    </button>
  </a>`;
}
function showCartIsEmpty() {
  return `
    <div class="empty-cart">
      <img src="../assets/images/empty_cart_icon.svg" alt="empty-cart-icon">
      <p>The cart is empty.</p>
    </div>`;
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
createCart();
