const hamburgerBtn = document.getElementById("hamburger-btn");
const mobileMenu = document.getElementById("mobile-menu");
const menuOverlay = document.getElementById("menu-overlay");
const closeMenuBtn = document.getElementById("close-menu-btn");
const menuLinks = mobileMenu.querySelectorAll("a");

function openMenu() {
  mobileMenu.classList.add("active");
  menuOverlay.classList.add("active");
  document.body.style.overflow = "hidden";
}

function closeMenu() {
  mobileMenu.classList.remove("active");
  menuOverlay.classList.remove("active");
  document.body.style.overflow = "auto";
}

hamburgerBtn.addEventListener("click", openMenu);
closeMenuBtn.addEventListener("click", closeMenu);
menuOverlay.addEventListener("click", closeMenu);

// Close menu when a link is clicked
menuLinks.forEach((link) => {
  link.addEventListener("click", closeMenu);
});

//Accordian functionality

document.querySelectorAll(".accordion-header").forEach((header) => {
  header.addEventListener("click", () => {
    const content = header.nextElementSibling;
    const arrow = header.querySelector(".arrow");

    document.querySelectorAll(".accordion-content").forEach((item) => {
      if (item !== content) {
        item.classList.add("hidden");
      }
    });

    document.querySelectorAll(".arrow").forEach((a) => {
      if (a !== arrow) {
        a.style.transform = "rotate(0deg)";
      }
    });

    content.classList.toggle("hidden");

    if (!content.classList.contains("hidden")) {
      arrow.style.transform = "rotate(180deg)";
    } else {
      arrow.style.transform = "rotate(0deg)";
    }
  });
});
