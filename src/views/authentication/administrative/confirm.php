<?php $this->layout("globals/authentication/global", [
    "subheaderMessage" => "Certifique-se de que as senhas informadas são iguais e que contenha pelo menos uma letra minúscula, uma letra maiúscula, um número e um caracter especial.",
    "js" => [
        js_directory("/authentication/administrative/reset.js")
    ]
]); ?>



<!-- form -->
<form action="<?= route(AUTH . AUTH_RESET_ADMINISTRATIVE_CONFIRM_STORE) ?>" method="POST">

    <div class="form-group">
        <label for="userKey">NOVA SENHA <span>*</span></label>
        <input type="password" class="form-control <?= applyWrong("password") ?>" placeholder="**********" id="password" name="password" autocomplete="off" value="<?= applyOldInput("password") ?>">
        <small class="text-danger"><?= applyWrongText("password") ?></small>
        <small class="text-danger d-none" id="messagePasswordWrong">Whoops, as senhas não coincidem</small>
        <small class="text-danger d-none" id="messagePasswordWeak">Whoops, escolha uma senha mais forte</small>
    </div>
    <div class="form-group mb-3">
        <label for="passwordVerify">CONFIRMAÇÃO <span>*</span></label>
        <input type="password" class="form-control <?= applyWrong("password_verify") ?>" placeholder="**********" id="passwordVerify" name="password_verify" autocomplete="off" value="<?= applyOldInput("password_verify") ?>">
        <small class="text-danger"><?= applyWrongText("password_verify") ?></small>
    </div>


    <div class="d-flex mb-3 align-items-center">
        <span class="ml-auto"> <a href="<?= route(AUTH . AUTH_LOGIN_ADMINISTRATIVE) ?>" class="forgot-pass">Voltar para login</a></span>
    </div>

    <button type="button" class="btn btn-company btn-disabled w-100" id="buttonSubmit">SALVAR NOVA SENHA</button>
</form>
