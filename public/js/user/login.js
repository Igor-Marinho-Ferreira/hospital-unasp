let form = document.querySelector("form");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    let captchaFilled = form.elements[2].value;
    if (!captchaFilled) {
        notiflixNotify("Por favor, preencha o captcha para prosseguir", "error");
        return 0;
    }
    form.submit();
});