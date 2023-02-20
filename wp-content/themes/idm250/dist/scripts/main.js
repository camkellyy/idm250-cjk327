const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".menu-primary-menu-container .menu-item");
const links = document.querySelectorAll(".menu-primary-menu-container .menu-item a");

hamburger.addEventListener('click', ()=>{
   //Animate Links
    navLinks.classList.toggle("open");

    // //Hamburger Animation
    hamburger.classList.toggle("toggle");
});