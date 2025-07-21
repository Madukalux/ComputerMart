// la navbar responsive
const tooglebtn = document.querySelector(".toggle-menu");
const navcontainer = document.querySelector(".nav-container");

tooglebtn.addEventListener("click", () => {
  navcontainer.classList.toggle("active");
});

// LE CAROUSEL

const slides = document.querySelectorAll(".slide");
const next = document.querySelector("#next");
const prev = document.querySelector("#prev");
const auto = true;
const intervalTime = 5000;
let slideInterval;

const nextSlide = () => {
  //get current class
  const current = document.querySelector(".current");

  //Remove current class
  current.classList.remove("current");
  // check for next slide
  if (current.nextElementSibling) {
    current.nextElementSibling.classList.add("current");
  } else {
    // add current to start
    slides[0].classList.add("current");
  }
  setTimeout(() => current.classList.remove("current"));
};

const prevSlide = () => {
  //get current class
  const current = document.querySelector(".current");

  //Remove current class
  current.classList.remove("current");
  // check for previous slide
  if (current.previousElementSibling) {
    current.previousElementSibling.classList.add("current");
  } else {
    // add current to last
    slides[slides.length - 1].classList.add("current");
  }
  setTimeout(() => current.classList.remove("current"));
};

//Auto slide
if (auto) {
  //Run next slide at intervalle time
  slideInterval = setInterval(nextSlide, intervalTime);
}

// les cathegories
const articles = document.querySelectorAll(".article");

articles.forEach(function (article) {
  const btn = article.querySelector(".change-btn");
  btn.addEventListener("click", function () {
    articles.forEach(function (item) {
      if (item !== article) {
        item.classList.remove("voir-text");
      }
    });
    article.classList.toggle("voir-text");
  });
});

// LA VUE EN DETAIL DES PRODUITS

const allproduct = document.querySelector(".product-container");

const previewModalOverlay = document.getElementById("preview-modal-overlay");

const modalCloseBtn = document.getElementById("modal-close-btn");

allproduct.addEventListener("click", showMealImg);

modalCloseBtn.addEventListener("click", () => {
  previewModalOverlay.style.display = "none";
});

function showMealImg(e) {
  let mealDiv;
  if (e.target.classList.contains("fa-magnifying-glass")) {
    mealDiv = e.target.parentElement.parentElement.parentElement;
  } else {
    mealDiv = e.target;
  }

  console.log(mealDiv);

  previewModalOverlay.querySelector("img").src =
    mealDiv.querySelector("img").src;
  previewModalOverlay.querySelector("p").textContent =
    mealDiv.querySelector("h6").textContent;
  previewModalOverlay.style.display = "block";
  console.log(mealDiv);
}
