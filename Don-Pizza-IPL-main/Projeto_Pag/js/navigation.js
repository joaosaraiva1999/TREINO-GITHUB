let navbar = document.querySelector(".navbar");
let menuopen = document.querySelector(".navbar .bx-menu");
let menuclose = document.querySelector(".navlinks .bx-x");
let navlinks = document.querySelector(".navlinks");
let header = document.querySelector("header");
let navigation = document.querySelectorAll(".navlinks .links li");
let logo = document.querySelector("#logo-img");


//Lógica da sidebar
menuopen.addEventListener("click", () => {
    navlinks.style.left = "0";
})

menuclose.addEventListener("click", () => {
    navlinks.style.left = "-100%";
})


//Lógica do scroll-triggered
window.addEventListener("scroll", () => {
    if (window.scrollY >= 66) {
        header.style.backgroundColor = "#ffffff";
        logo.style.height = "50px";
        logo.style.width = "125px";
        logo.style.margin = "0 6rem 2rem 0";
        navigation.forEach(item => {
            item.style.color = "1a1a1a";
            item.style.padding = "0 15px";
        });
        header.classList.add("scrolled");
    }
    
    if (window.scrollY <= 65) {
        logo.style.height = "60px";
        logo.style.width = "150px";
        logo.style.margin = "0.4rem 6rem 2rem 0.7rem";
        menuopen.style.Color = "#000000";
        header.classList.remove("scrolled");
        header.style.backgroundColor = "transparent";
        navigation.forEach(item => {
            item.style.color = "#1a1a1a";
        });
    }

    let lastScrollPosition = 0;
    let currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScrollPosition > lastScrollPosition) {
        // Descendo
        if (currentScrollPosition >= 1300) {
            header.classList.add("scrolled");
            header.style.top = "-150px"; // ou a altura do seu cabeçalho
            menuopen.style.color = "#000000";
        } else {
            header.classList.remove("scrolled");
            header.style.top = "0";
            menuopen.style.color = "#000000";

        }
    } else {
        // Subindo
        if (currentScrollPosition >= 1400) {
            header.classList.add("scrolled");
            header.style.top = "0";
            menuopen.style.color = "#000000";

        } else {
            header.classList.remove("scrolled");
            header.style.top = "0";
            menuopen.style.color = "#000000";
        }
    }

    lastScrollPosition = currentScrollPosition;
});


