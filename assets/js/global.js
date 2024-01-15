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

  // Mobile nav

  const mobileNav = document.querySelector("#mobile-nav");
  const navToggler = document.querySelector("#nav-toggler");
  const closeMobileNav = document.querySelector("#close-mobile-nav");
  const navItems = document.querySelectorAll("#mobile-nav ul");

  function closeAllSubNavs() {
    navItems.forEach((ul) => {
      const items = ul.querySelectorAll("li a");
      items.forEach((item) => {
        item.classList.remove("sub-nav-open");
      });
    });
  }

  function createNav() {
    navItems.forEach((ul) => {
      console.log(typeof ul);
      ul.parentElement.tagName !== "DIV" || "null"
        ? ul.classList.add("sub-nav")
        : null;
      ul.previousElementSibling.classList.add("has-sub-nav");

      if (ul.previousElementSibling.classList.contains("has-sub-nav")) {
        ul.previousElementSibling.addEventListener("click", (event) => {
          event.target.classList.toggle("sub-nav-open");
        });
      }
    });
  }

  function closeNav() {
    document.body.style.overflowY = "scroll";
    document.body.classList.remove("nav-opened");
    closeAllSubNavs();
  }

  function openNav() {
    document.body.style.overflowY = "hidden";
    document.body.classList.add("nav-opened");
  }

  navToggler.addEventListener("click", () => {
    openNav();
  });

  closeMobileNav.addEventListener("click", () => {
    closeNav();
  });

  document.addEventListener("click", (event) => {
    if (navToggler.contains(event.target) || mobileNav.contains(event.target)) {
    } else {
      closeNav();
    }
  });

  createNav();
};
