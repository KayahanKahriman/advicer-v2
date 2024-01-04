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
      320: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      640: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });
};
