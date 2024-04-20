let currentBookId = 1,
  isAtLastSlide;
let currentSlideOffsetWidth = 0;

/*
    Remove animations, used to display in active state, applied on a book's title,body, buttons
*/
function removeEffects() {
  let prevBookId;

  console.log(`Remove effect - current book id ${currentBookId}`);
  prevBookId = currentBookId;

  //get previous book id inlcuding title,body,Call To Action (CTA) buttons

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
function addEffects(value) {
  console.log(
    `Add effect before current book id ${currentBookId} is plus/minus`
  );
  if (value === "next") {
    currentBookId += 1;
    console.log(`Next clicked - plus`);
    console.log(`current book id  is ${currentBookId}`);
  } else {
    currentBookId -= 1;
    console.log(`Prev clicked - minus`);
    console.log(`current book id  is ${currentBookId}`);
  }
  console.log(`-------------------------------`);

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
  console.log("sat lote");
}

/* Check the current book has reached the last index */
function checkCurrentSlideIndex() {
  if (currentBookId === 6 || currentBookId === 0) {
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

  prevBook.firstElementChild.classList.add("book-rotate");
  prevBook.firstElementChild.classList.remove("book-origin");

  nextBook.firstElementChild.classList.add("book-origin");
  nextBook.firstElementChild.classList.remove("book-rotate");
}

function nextTrendingSlide() {
  if (currentBookId !== 1) {
    removeEffects();
    addEffects("next");
    moveToNextSlide();
    isAtLastSlide = checkCurrentSlideIndex();
    if (isAtLastSlide) {
      trendingNext.style.display = "none";
      trendingPrevious.style.display = "flex";
      return;
    }
  } else {
    removeEffects();
    addEffects("next");
    moveToNextSlide();
  }
}

function previousTrendingSlide() {
  if (currentBookId > 1) {
    removeEffects();
    addEffects("previous");
    moveToPreviousSlide();
    isAtLastSlide = checkCurrentSlideIndex();
    if (!isAtLastSlide) {
      trendingNext.style.display = "flex";
      trendingPrevious.style.display = "flex";
    } else {
      trendingPrevious.style.display = "none";
    }
  }
}

function nextSlide(slider) {
  let sliderScrollLeft = slider.scrollLeft;
  let sliderVisibleWidth = slider.offsetWidth;

  slider.scrollLeft = sliderScrollLeft + sliderVisibleWidth;
  // if (
  //   Math.floor(slider.scrollLeft) ===
  //   Math.floor(slider.getBoundingClientRect().width * limit)
  // ) {
  //   btn.style.display = "none";
  //   console.log("equal");
  // } else {
  //   btn.style.display = "flex";
  // }
  // console.log(slider.scrollLeft);
}

function prevSlide(slider) {
  let sliderScrollLeft = slider.scrollLeft;
  let sliderVisibleWidth = slider.offsetWidth;
  slider.scrollLeft = sliderScrollLeft - sliderVisibleWidth;
}

// Two arrow buttons in Trending Section
const trendingNext = document.getElementById("trending-next");
const trendingPrevious = document.getElementById("trending-previous");

// Add Click event to arrow buttons
trendingNext.addEventListener("click", nextTrendingSlide);
trendingPrevious.addEventListener("click", previousTrendingSlide);

// Get all the slides across the web pages
const bestSelectionSlider = document.getElementById("bestfiction-slider");
const nextBtn = document.getElementById("next");
const prevBtn = document.getElementById("previous");

nextBtn.addEventListener("click", () => nextSlide(bestSelectionSlider));
prevBtn.addEventListener("click", () => prevSlide(bestSelectionSlider));

const reviewSlider = document.getElementById("review-slider");
const reviewNext = document.getElementById("review-next");
const reviewPrev = document.getElementById("review-prev");

// Add Click event to arrow buttons
reviewNext.addEventListener("click", () =>
  nextSlide(reviewSlider, 4, reviewNext)
);
reviewPrev.addEventListener("click", () =>
  prevSlide(reviewSlider, 4, reviewPrev)
);
