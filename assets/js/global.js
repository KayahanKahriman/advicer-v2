window.onload = function () {
  // Accordion
  const accordionItems = document.querySelectorAll(".accordion-item");
  accordionItems.forEach((item) => {
    item.addEventListener("click", () => {
      accordionItems.forEach((i) => {
        if (i !== item) {
          const content = i.querySelector(".accordion-content");
          content.classList.remove("active");
        }
      });
      const content = item.querySelector(".accordion-content");
      content.classList.add("active");
    });
  });

  // Swiper
  new Swiper("#features-carousel", {
    slidesPerView: 3,
    speed: 400,
    spaceBetween: 30,
    navigation: {
      prevEl: ".carousel-prev",
      nextEl: ".carousel-next",
    },
    breakpoints: {
      390: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      728: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1170: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });

  // Revealing cards
  const revealingCardButtons = document.querySelectorAll(
    ".revealing-card button"
  );
  Array.from(revealingCardButtons).map((button) => {
    const text = button.previousElementSibling;
    const textOverlay = text.lastElementChild;

    button.addEventListener("click", () => {
      text.style.height = text.scrollHeight + "px";
      textOverlay.style.display = "none";
      button.style.display = "none";
    });
  });
};
