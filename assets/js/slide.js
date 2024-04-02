let currentBookId = 1,
  isAtLastSlide;
let currentSlideOffsetWidth = 0;

/*
    Remove animations, used to display in active state, applied on a book's title,body, buttons
*/
function removeEffectsOnPrev(value) {
  let prevBookId;

  if (value === "previous") {
    prevBookId = currentBookId + 1;
  } else {
    prevBookId = currentBookId - 1;
  }

  //get previous book id inlcuding title,body,Call To Action (CTA) buttons
  console.log(prevBookId);

  let prevTitle = document.getElementById(`tb-title-${prevBookId}`);
  let prevBody = document.getElementById(`tb-body-${prevBookId}`);
  let prevCTAButtons = document.getElementById(`tb-cta-btn-${prevBookId}`);

  //remove slide-up effect on title,body, (CTA) buttons
  // add slide-down to pull down title,body,buttons since they've already displayed
  [prevTitle, prevBody, prevCTAButtons].map((prevBook) => {
    prevBook.classList.remove("slide-up");
    prevBook.classList.add("slide-down");
  });
}

/*
    Add animations for active state to titles, body, and buttons
*/
function addEffectonCurrent() {
  //add slide-up effect on title,body, (CTA) buttons
  let currentTitle = document.getElementById(`tb-title-${currentBookId}`);
  let currentBody = document.getElementById(`tb-body-${currentBookId}`);
  let currentCTAButtons = document.getElementById(
    `tb-cta-btn-${currentBookId}`
  );

  //remove slide-down effect on title,body, (CTA) buttons since they are about to be in active state
  // add slide-up effect to display a book's info
  [currentTitle, currentBody, currentCTAButtons].map((currentBook) => {
    currentBook.classList.remove("slide-down");
    currentBook.classList.add("slide-up");
  });
}

/* Check the current book has reached the last index */
function checkCurrentSlideIndex() {
  if (currentBookId > 3 || currentBookId === 0) {
    return true;
  }
  return false;
}
/* Move the trending slide to show next book */
function moveToNextSlide() {
  let trendingBookSlider = document.getElementById("trending-books-slider");
  let prevBook = document.getElementById(`trending-book-${currentBookId - 1}`);
  let nextBook = document.getElementById(`trending-book-${currentBookId}`);

  trendingBookSlider.scrollLeft =
    trendingBookSlider.scrollLeft + prevBook.offsetWidth;

  console.log(trendingBookSlider.scrollLeft);

  prevBook.firstElementChild.classList.remove("book-rotate");
  prevBook.firstElementChild.classList.add("book-origin");

  nextBook.firstElementChild.classList.remove("book-origin");
  nextBook.firstElementChild.classList.add("book-rotate");
}

/* Move the trending slide to show previous book */
function moveToPreviousSlide() {
  let trendingBookSlider = document.getElementById("trending-books-slider");
  let prevBook = document.getElementById(`trending-book-${currentBookId}`);
  let nextBook = document.getElementById(`trending-book-${currentBookId + 1}`);

  trendingBookSlider.scrollLeft =
    trendingBookSlider.scrollLeft - prevBook.offsetWidth;

  console.log(trendingBookSlider.scrollLeft);

  prevBook.firstElementChild.classList.add("book-rotate");
  prevBook.firstElementChild.classList.remove("book-origin");

  nextBook.firstElementChild.classList.add("book-origin");
  nextBook.firstElementChild.classList.remove("book-rotate");
}

function nextTrendingSlide() {
  currentBookId += 1;

  isAtLastSlide = checkCurrentSlideIndex();
  if (!isAtLastSlide) {
    removeEffectsOnPrev("next");
    addEffectonCurrent();
    moveToNextSlide();
  }
  if (isAtLastSlide) {
    trendingNext.style.display = "none";
  } else {
    trendingNext.style.display = "flex";
  }
}

function previousTrendingSlide() {
  if (currentBookId > 1) {
    currentBookId -= 1;
    isAtLastSlide = checkCurrentSlideIndex();
    console.log(isAtLastSlide);
    if (!isAtLastSlide) {
      removeEffectsOnPrev("previous");
      addEffectonCurrent();
      moveToPreviousSlide();
    }
    if (isAtLastSlide) {
      trendingPrevious.style.display = "none";
    } else {
      trendingPrevious.style.display = "flex";
    }
  }
}

function nextSlide() {
  let sliderScrollLeft = bestSelectionSlider.scrollLeft;
  let sliderVisibleWidth = bestSelectionSlider.offsetWidth;
  console.log(sliderVisibleWidth);

  bestSelectionSlider.scrollLeft += sliderScrollLeft + sliderVisibleWidth;
}

function prevSlide() {
  let sliderScrollLeft = bestSelectionSlider.scrollLeft;
  let sliderVisibleWidth = bestSelectionSlider.offsetWidth;
  bestSelectionSlider.scrollLeft = sliderScrollLeft - sliderVisibleWidth;
}

// Two arrow buttons in Trending Section
const trendingNext = document.getElementById("trending-next");
const trendingPrevious = document.getElementById("trending-previous");

// Get all the slides across the web pages
const bestSelectionSlider = document.getElementById("bestfiction-slider");

// Add Click event to arrow buttons
trendingNext.addEventListener("click", nextTrendingSlide);
trendingPrevious.addEventListener("click", previousTrendingSlide);

const nextBtn = document.getElementById("next");
const prevBtn = document.getElementById("previous");

nextBtn.addEventListener("click", nextSlide);
prevBtn.addEventListener("click", prevSlide);

console.dir(nextBtn);
