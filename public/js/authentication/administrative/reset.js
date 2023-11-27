/**
 * Code executed when the page loads.
 */
 window.onload = () => {
    applyEvents();
}


/**
 * Checks if the password is equal and if the password is strong.
 */
function handleForm() {
    var password = document.getElementById('password');
    var passwordVerify = document.getElementById('passwordVerify');
    let messagePasswordWrong = document.getElementById("messagePasswordWrong");
    let messagePasswordWeak = document.getElementById("messagePasswordWeak");

    if (password.value === passwordVerify.value) {
        handleInputs(true);

        if (!isPasswordStrong(password.value)) {
            notiflixNotify("Escolha uma senha mais forte. Ela deve conter número, letra minúscula, letra maiúscula e um caracter especial.", "error");
            handleInputs(false);
            handleMessages(messagePasswordWeak, messagePasswordWrong);
        } else {
            messagePasswordWrong.classList.add("d-none");
            messagePasswordWeak.classList.add("d-none");
            handleButton("enable");
        }
    } else {
        handleInputs(false);
        handleMessages(messagePasswordWrong, messagePasswordWeak);
        handleButton("disable");
    }
}

/**
 * Manipulates the incompatible or weak password messages.
 * @param {HTMLElement} show message that will be displayed
 * @param {HTMLElement} hidden message that will be hidden
 */
function handleMessages(show, hidden) {
    show.classList.remove("d-none");
    hidden.classList.add("d-none");
}

/**
 * Configures class for inputs with errors or hits.
 * @param {boolean} ok 
 */
function handleInputs(ok) {
    if (ok) {
        password.classList.add("is-valid");
        passwordVerify.classList.add("is-valid");

        password.classList.remove("is-invalid");
        passwordVerify.classList.remove("is-invalid");
    } else {
        password.classList.add("is-invalid");
        passwordVerify.classList.add("is-invalid");

        password.classList.remove("is-valid");
        passwordVerify.classList.remove("is-valid");
    }
}

/**
 * Check if the password meets the minimum safety requirements
 * @param {string} password 
 * @returns {boolean}
 */
function isPasswordStrong(password) {
    return password.length >= 8 &&
        /[A-Z]/.test(password) &&
        /[a-z]/.test(password) &&
        /\d/.test(password) &&
        /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password);
}


/**
 * Centralizes the execution of event settings
 */
function applyEvents() {
    setEventInputInPassword();
    setEventInputInPasswordVerify();
    setEventSubmitInButton();
}


/**
 * Configures Click on the Submit button
 */
function setEventSubmitInButton() {
    document.getElementById("buttonSubmit").addEventListener("click", ({
        target
    }) => {
        if (!target.classList.contains("btn-disabled")) {
            Notiflix.Block.standard('.order-md-1', 'Por favor, aguarde um instante');
            setTimeout(() => {
                document.querySelector("form").submit();
            }, 2000);
        }
    });
}

/**
 * Responsible for setting up the submit button.Whether it will be blocked or not.
 * @param {string} action 
 */
function handleButton(action) {
    let button = document.getElementById("buttonSubmit");
    if (action === 'enable') button.classList.remove("btn-disabled");
    else if (action === 'disable') button.classList.add("btn-disabled");
}

/**
 * Configure data entry event in the "password" field
 */
function setEventInputInPassword() {
    document.getElementById("password").addEventListener("input", ({
        target
    }) => {
        handleForm();
    });
}


/**
 * Configure data entry event in the "passwordVerify" field
 */
function setEventInputInPasswordVerify() {
    document.getElementById("passwordVerify").addEventListener("input", ({
        target
    }) => {
        handleForm();
    });
}