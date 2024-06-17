const formLogin = document.getElementById("form_login");
const formSignup = document.getElementById("form_signup");
let email = document.getElementById("email");
let password = document.getElementById("password");
let defemailv = document.getElementById("defemail");
let defpassword = document.getElementById("defpass");
let passwordConfirmation = document.getElementById("confirm");

$(document).ready(function () {

    $(email).on("keyup", function () {
        $(".input_box:nth-last-child(2)").hide();
        checkInputEmail();
    });

    $(password).on("keyup", function () {
        $(".input_box:nth-last-child(2)").hide();
        checkInputPassword();
    });

    $(confirmpass).on("keyup", function () {
        $(".input_box:nth-last-child(2)").hide();
        checkInputConfirmPassword();
    });

    $(defpassword).on("keyup", function () {
        $(".input_box:nth-last-child(2)").hide();
        defpass();
    });

    $(defemailv).on("keyup", function () {
        $(".input_box:nth-last-child(2)").hide();
        defemail();
    });

    // $(formSignup).on("submit", function (event) {
    //     event.preventDefault();
    // });

})


formSignup.addEventListener("submit", (event) => {
    event.preventDefault();

    checkform();

    confirm("Registo concluido com Sucesso!");
});



const PasswordValue = password.value;
const emailValue = email.value;


function checkform() {
    $(".input_box:nth-last-child(2)").hide();

    checkInputEmail();
    checkInputPassword();
    checkInputConfirmPassword();
    defpass();
    defemail();


    const formItems = formSignup.querySelectorAll(".input_box"); // Nota: Spread Operator cria uma cópia superficial dos elemmentos do formulário HTML 

    const isValid = [...formItems]; // Uma nova matriz é criada pelo spread operator é atribuida á variavel isValid portanto a mesma agora contem uma cópia dos elementos do formulário HTML que estavam presentes em formItems

    console.log(isValid);
}

function checkInputEmail() {
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (!regexEmail.test(emailValue)) {
        errorInput(email, "Prencha o email corretamente!");
        $(".input_box:nth-last-child(2)").show();
    }
    else {
        const formItem = email.parentElement;
        formItem.className = "input_box";
    }
}

function checkInputPassword() {
    if (PasswordValue === "") {
        errorInput(password, "Confirme a password novamente");
        $(".input_box:nth-last-child(2)").show();
    }

    if (PasswordValue.length <= 8) {
        errorInput(password, "Password precisa ter no minimo de 8 caracteres");
        $(".input_box:nth-last-child(2)").show();
    }

    else {
        const formItem = password.parentElement;
        formItem.className = "input_box";
    }
}


function checkInputConfirmPassword() {
    const ConfirmPasswordValue = confirmpass.value;

    if (ConfirmPasswordValue === "") {
        errorInput(confirmpass, "Confirme a password novamente");
        $(".input_box:nth-last-child(2)").show();
    }

    if (ConfirmPasswordValue.length <= 8) {
        errorInput(confirmpass, "Password precisa ter no minimo de 8 caracteres");
        $(".input_box:nth-last-child(2)").show();
    }

    if (ConfirmPasswordValue !== PasswordValue) {
        errorInput(confirmpass, "A Senha Precisa ser Igual!");
    }

    else {
        const formItem = confirmpass.parentElement;
        formItem.className = "input_box";
    }
}


function defemail() {
    const defemailValue = defemailv.value;

    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (!regexEmail.test(defemailValue)) {
        errorInput(defemailv, "Prencha o email corretamente!");
        $(".input_box:nth-last-child(2)").show();
    }

    if (defemailValue !== emailValue) {
        errorInput(defemailv, "O Email precisa ser o mesmo!");
        $(".input_box:nth-last-child(2)").show();
    }

    else {
        const formItem = email.parentElement;
        formItem.className = "input_box";
    }

}


function defpass() {
    const defpasswordValue = defpassword.value;

    if (defpasswordValue.length <= 8) {
        errorInput(defpassword, "Password precisa ter no minimo de 8 caracteres");
        $(".input_box:nth-last-child(2)").show();
    }

    if (defpasswordValue !== PasswordValue) {
        errorInput(defpassword, "A Senha Precisa ser Igual!");
    }

    else {
        const formItem = defpassword.parentElement;
        formItem.className = "input_box";
    }

}


function errorInput(input, message) {
    const formItem = input.parentElement;
    const textMessage = formItem.querySelector("a");


    textMessage.innerText = message;

    formItem.className = "input_box error";
}