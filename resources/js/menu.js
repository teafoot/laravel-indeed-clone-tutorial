const hmNavMenu = document.querySelector(".hm-nav-menu");
const hmNavLink = document.querySelectorAll(".hm-nav-link");
const hmHamburger = document.querySelector(".hm-hamburger");

hmNavLink.forEach(n => n.addEventListener("click", function () {
    hmHamburger.classList.remove("active");
    hmNavMenu.classList.remove("active");
}));
hmHamburger.addEventListener("click", function () {
    hmHamburger.classList.toggle("active");
    hmNavMenu.classList.toggle("active");
});
