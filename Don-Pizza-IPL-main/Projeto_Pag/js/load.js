window.addEventListener("load", () => {
    const loader = document.querySelector(".loader-container");

    setInterval(() => {
        loader.classList.add("loader-hidden");

        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });

    }, 50);
});
