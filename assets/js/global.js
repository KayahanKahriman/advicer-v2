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

  // Hero svg
  let shapes = [
    {
      d: "M791.5 457C791.5 569.114 700.613 660 588.5 660C476.386 660 385.5 569.114 385.5 457C385.5 344.886 580.386 181.5 692.5 181.5C804.614 181.5 791.5 344.886 791.5 457Z",
      d: "M710.5 650.648C710.5 762.762 619.613 853.648 507.5 853.648C171 894.648 304.5 762.762 304.5 650.648C304.5 538.534 395.386 447.648 507.5 447.648C619.613 447.648 710.5 538.534 710.5 650.648Z",
      d: "M604.999 397C604.999 532.862 494.861 643 358.999 643C223.137 643 112.999 397 112.999 397C112.999 397 54.138 100.5 190 100.5C325.862 100.5 604.999 261.138 604.999 397Z",
    },
    {
      d: "M637 368.5C637 480.614 693.614 579 581.5 579C469.387 579 456 486.614 456 374.5C456 262.386 573.387 100.5 685.5 100.5C920 317 637 256.386 637 368.5Z",
      d: "M755.001 588.5C755.001 700.614 594.516 518 486.5 661.5C150.001 702.5 52.5 584.5 197.5 535C226.5 410.5 189.887 267.852 302.001 267.852C414.115 267.852 755.001 476.386 755.001 588.5Z",
      d: "M594.516 289C594.516 424.862 484.378 535 348.516 535C212.654 535 102.516 289 102.516 289C102.516 289 76.6379 145.5 212.5 145.5C348.362 145.5 594.516 153.138 594.516 289Z",
    },
  ];

  anime({
    targets: ".stage",
    d: [{ value: shapes[0].d }],
    duration: 5000,
    direction: "alternate",
    autoplay: true,
    easing: "linear",
    elasticity: 500,
    loop: true,
  });
};
