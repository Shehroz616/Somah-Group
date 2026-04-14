const hamburgerBtn = document.getElementById('hamburger-btn');
const mobileMenu = document.getElementById('mobile-menu');
const menuOverlay = document.getElementById('menu-overlay');
const closeMenuBtn = document.getElementById('close-menu-btn');
const menuLinks = mobileMenu.querySelectorAll('a');

function openMenu() {
    mobileMenu.classList.add('active');
    menuOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeMenu() {
    mobileMenu.classList.remove('active');
    menuOverlay.classList.remove('active');
    document.body.style.overflow = 'auto';
}

hamburgerBtn.addEventListener('click', openMenu);
closeMenuBtn.addEventListener('click', closeMenu);
menuOverlay.addEventListener('click', closeMenu);

// Close menu when a link is clicked
menuLinks.forEach(link => {
    link.addEventListener('click', closeMenu);
});
