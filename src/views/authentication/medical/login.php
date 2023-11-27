<?php $this->layout("globals/authentication/global", [
    "subheaderMessage" => "Prezado(a), colaborador, <br>seja bem-vindo(a) ao menu médico",
    "js" => [
        "https://js.hcaptcha.com/1/api.js",
        js_directory("/administrative/login.js")
    ]
]); ?>



<!-- form -->
<form action="<?= route(AUTH . AUTH_LOGIN_MEDICAL_STORE) ?>" method="post">

    <div class="form-group">
        <label for="userKey">MATRÍCULA <span>*</span></label>
        <input type="text" class="form-control <?= applyWrong("user_key") ?>" placeholder="Informe a matrícula" id="userKey" name="user_key" autocomplete="off" value="<?= applyOldInput("user_key") ?>">
        <small class="text-danger"><?= applyWrongText("user_key") ?></small>
    </div>
    <div class="form-group mb-3">
        <label for="password">PALAVRA CHAVE <span>*</span></label>
        <input type="password" class="form-control <?= applyWrong("password") ?>" placeholder="**********" id="password" name="password" autocomplete="off" value="<?= applyOldInput("password") ?>">
        <small class="text-danger"><?= applyWrongText("password") ?></small>
    </div>

    <div class="d-flex mb-3 align-items-center">
        <span class="ml-auto"> <a href="<?= route(AUTH . AUTH_RESET_MEDICAL) ?>" class="forgot-pass">Esqueceu sua senha?</a></span>
    </div>

    <div class="h-captcha mb-3" data-sitekey="80032471-0452-4bfd-b7e5-1825634b19dc"></div>

    <button type="submit" class="btn btn-company w-100">
        ACESSAR
    </button>
</form>