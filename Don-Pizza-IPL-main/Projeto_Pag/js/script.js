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
        logo.style.margin = "0rem 6rem 20px 0";
        navigation.forEach(item => {
            item.style.color = "1a1a1a";
            item.style.padding = "0 15px";
        });
        header.classList.add("scrolled");
    }
    if (window.scrollY <= 65) {
        logo.style.height = "60px";
        logo.style.width = "150px";
        logo.style.margin = "1rem";
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
            menuopen.style.color = "#ffffff";
        } else {
            header.classList.remove("scrolled");
            header.style.top = "0";
            menuopen.style.color = "black";

        }
    } else {
        // Subindo
        if (currentScrollPosition >= 1400) {
            header.classList.add("scrolled");
            header.style.top = "0";
            menuopen.style.color = "#ffffff";

        } else {
            header.classList.remove("scrolled");
            header.style.top = "0";
            menuopen.style.color = "#ffffff";
        }
    }

    lastScrollPosition = currentScrollPosition;
});
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        }
    })
});

const hiddenElements = document.querySelectorAll('.container4');
hiddenElements.forEach((el) => observer.observe(el));

const form = document.getElementById('form_refresh')
form.addEventListener('submit', e => {
    e.preventDefault()
})

$(document).ready(function () {
    $('#form_reserva').on('submit', function (event) {
        event.preventDefault();
        let isValid = true;
        let nome = $('#utilizador').val().trim();
        let dataReserva = $('#data_reserva').val().trim();
        let pessoas = $('#pessoas').val().trim();

        $('.invalid-feedback').text('');
        $('.form-control').removeClass('is-invalid');

        if (nome.length < 3) {
            $('#utilizador').addClass('is-invalid');
            $('#utilizador').next('.invalid-feedback').text('O nome de utilizador/Reserva deve ter pelo menos 3 Caracteres');
            isValid = false;
        }
        if (dataReserva === '') {
            $('#data_reserva').addClass('is-invalid');
            $('#data_reserva').next('.invalid-feedback').text('Por favor, selecione uma data de reserva');
            isValid = false;
        }

        if (pessoas === '' || isNaN(pessoas) || parseInt(pessoas) < 1 || parseInt(pessoas) > 20) {
            $('#pessoas').addClass('is-invalid');
            $('#pessoas').next('.invalid-feedback').text('Por favor, insira um número válido de pessoas');
            isValid = false;
        }

        if (isValid) {
            $.ajax({
                type: 'POST',
                url: 'reserva.php',
                data: $('#form_reserva').serialize(),
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        $('#form_reserva')[0].reset();
                        $('#modalreserva').find('.modal-body span').text(response.idreserva);
                        $('#modalreserva').modal('show');
                    } else if (response.status === 'error') {
                        if (response.errors) {
                            response.errors.forEach(function (error) {
                                alert(error); // You can handle this more gracefully if you want
                            });
                        } else {
                            alert(response.message); // Handle generic error
                        }
                    }
                }
            });
        }
    });
});


$(document).ready(function () {
    $('#form_refresh').on('submit', function (evento) {
        evento.preventDefault();

        let searchInput = $('#pesquisar_reserva').val().trim();
        $('#search-feedback').text('').removeClass('d-block');

        if (searchInput === '') {
            $('#pesquisar_reserva').addClass('is-invalid');
            $('#search-feedback').text('Por favor, insira o ID da reserva').addClass('d-block');
            return;
        }

        $.ajax({
            type: 'POST',
            url: 'scripts/search.php',
            data: $(this).serialize(),
            success: function (response) {
                $('#php-results').html(response);
            },
        });
    });
});