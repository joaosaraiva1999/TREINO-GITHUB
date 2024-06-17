document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter');
    const speed = 200; // Velocidade da animação

    const updateCount = (counter) => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const increment = target / speed;

        if (count < target) {
            counter.innerText = Math.ceil(count + increment);
            setTimeout(() => updateCount(counter), 1);
        } else {
            counter.innerText = target;
        }
    };

    const options = {
        root: null, // Use the viewport as the container
        threshold: 0.1 // 10% of the counter element is visible
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                updateCount(entry.target);
                observer.unobserve(entry.target); // Stop observing after the animation starts
            }
        });
    }, options);

    counters.forEach(counter => {
        observer.observe(counter);
    });
});