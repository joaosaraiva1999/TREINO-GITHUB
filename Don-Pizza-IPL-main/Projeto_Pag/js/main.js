document.getElementById("button").addEventListener("onmouseover", function () {
    this.classList.add("no-hover");
    setTimeout(() => {
        this.classList.remove("no-hover");
    }, 300);
});

let menu = document.querySelector("#menu-bar");
let navbar = document.querySelector(".nav-bar");

menu.onclick = () => {
    menu.classList.toogle("fa-times");
    navbar.classList.toogle("active");
}


window.onscroll = () => {
    menu.classList.remove("fa-times");
    navbar.classList.remove("active");

    if (window.scrollY > 40) {
        document.querySelector("#scroll-top").classList.add("active");
    } else {
        document.querySelector("#scroll-top").classList.remove("active");
    }
}



