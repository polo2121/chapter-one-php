const dialog = document.querySelector("dialog");
const showBtns = document.querySelectorAll(".delete");
const closeBtns = document.querySelectorAll(".close");
const deleteBtns = document.querySelectorAll(".delete");

showBtns.forEach((btn) => {
  // "Show the dialog" button opens the dialog modally
  btn.addEventListener("click", () => {
    dialog.showModal();
  });
});

closeBtns.forEach((btn) => {
  // "Show the dialog" button opens the dialog modally
  btn.addEventListener("click", () => {
    dialog.close();
  });
});

function confirm(id) {
  const bookId = document.querySelector("input[name='book-id']");
  bookId.value = id;
  console.log(bookId.value);
}
