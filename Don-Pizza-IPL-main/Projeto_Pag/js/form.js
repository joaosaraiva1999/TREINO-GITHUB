const formOpenBtn = document.querySelector("#form-open"),
    home = document.querySelector(".home"),
    formContainer = document.querySelector(".form_container"),
    formCloseBtn = document.querySelector(".form_close"),
    signupBtn = document.querySelector("#signup"),
    loginBtn = document.querySelector("#login"),
    pwShowHide = document.querySelectorAll(".pw_hide");

formOpenBtn.addEventListener("click", () => {
    home.classList.add("show");
    home.classList.add("fixed");
});
formCloseBtn.addEventListener("click", () => {
    home.classList.remove("show");
    home.classList.remove("fixed");
});

signupBtn.addEventListener("click", (e) => {
    e.preventDefault();
    formContainer.classList.add("active");
});

loginBtn.addEventListener("click", (e) => {
    e.preventDefault();
    formContainer.classList.remove("active");
});


pwShowHide.forEach((icon) => {
    icon.addEventListener("click", () => {
        let getPwInput = icon.parentElement.querySelector("input");
        if (getPwInput.type === "password") {
            getPwInput.type = "text";
            icon.classList.toggle("uil-eye-slash");
            icon.classList.toggle("uil-eye");
        } else {
            getPwInput.type = "password";
            icon.classList.toggle("uil-eye-slash");
            icon.classList.toggle("uil-eye");
        }
    });
});




