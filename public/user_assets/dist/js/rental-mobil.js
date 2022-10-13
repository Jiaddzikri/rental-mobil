const homeCard = document.querySelectorAll(".home-card");
const map = document.querySelector(".map");
const cardDescription = document.querySelectorAll(".home-card-description");
const aboutImage = document.querySelector(".about-hero");
const aboutTitle = document.querySelector(".about-title");
const aboutText = document.querySelector(".about-text");
const homeHeaderText = document.querySelector(".text-header");
const homeMainImage = document.querySelector(".main-image-container");
const servicesBtn = document.querySelectorAll(".services-btn");
const listCardDataCard = document.querySelectorAll(".list-card-wrapper");
const body = document.querySelector("body");

function homeHeaderEffect() {
  let scrollY = window.scrollY;

  if(scrollY >= 0) {
    if (homeHeaderText != null && homeMainImage != null) {
      homeHeaderText.style.transform = `translateX(${0})`;
      homeHeaderText.style.opacity = 1;
      homeMainImage.style.transform = `translateX(${0})`;
      homeMainImage.style.opacity = 1;
    }
  }
}
homeHeaderEffect();

function homeCardEffect() {
  window.addEventListener("scroll", () => {
    let scrollY = window.scrollY;
    let counter = 150;

    if(body.clientWidth >= 768 && body.clientWidth <= 990) {
      counter = 0;
    }
    if (scrollY >= counter) {
      homeCard.forEach(y => {
        y.style.transform = `translateY(${0})`;
        y.style.opacity = 1;
      });
    }
  });
}

homeCardEffect();

function homeMap() {
  window.addEventListener("scroll", () => {
    let scrollY = window.scrollY;
    if (scrollY >= 800) {
      map.style.transform = `translateY(${0})`;
      map.style.opacity = 1;
    }
  });
}

homeMap();

function about() {
  let scrollY = window.scrollY;

  if (scrollY >= 0) {
    if (aboutImage != null && aboutTitle != null && aboutText != null) {
      aboutImage.style.transform = `translateX(${0})`;
      aboutImage.style.opacity = 1;
      aboutTitle.style.transform = `translateX(${0})`;
      aboutTitle.style.opacity = 1;
      aboutText.style.transform = `translateX(${0})`;
      aboutText.style.opacity = 1;
    }
  }
}
about();

function listDataCarEffect() {
  let scrollY = window.scrollY;
  listCardDataCard.forEach(y => {
    if(scrollY >= 0) {
      if (y != null) {
        y.style.transform = `translateY(${0})`;
        y.style.opacity = 1;
      }
    }
  });
}
listDataCarEffect();





