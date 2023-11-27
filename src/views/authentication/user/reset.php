<?php $this->layout("globals/authentication/global", [
    "subheaderMessage" => "Esqueceu sua senha? Sem problemas, vamos resolver isso. Preencha os dados no formulário abaixo."
]); ?>



<!-- form -->
<form action="<?= route(AUTH . AUTH_RESET_ADMINISTRATIVE_STORE) ?>" method="POST">

    <div class="form-group">
        <label for="userKey">MATRÍCULA <span>*</span></label>
        <input type="text" class="form-control <?= applyWrong("user_key") ?>" placeholder="Informe a matrícula" id="userKey" name="user_key" autocomplete="off" value="<?= applyOldInput("user_key") ?>">
        <small class="text-danger"><?= applyWrongText("user_key") ?></small>
    </div>
    <div class="form-group mb-3">
        <label for="email">E-MAIL <span>*</span></label>
        <input type="email" class="form-control <?= applyWrong("email") ?>" placeholder="**********" id="email" name="email" autocomplete="off" value="<?= applyOldInput("email") ?>">
        <small class="text-danger"><?= applyWrongText("email") ?></small>
    </div>

    <div class="d-flex mb-5 align-items-center">
        <span class="ml-auto"> <a href="<?= route(AUTH . AUTH_LOGIN_ADMINISTRATIVE) ?>" class="forgot-pass">Voltar para login</a></span>
    </div>

    <button type="button" class="btn btn-company w-100" id="buttonSubmit">RECUPERAR SENHA</button>
</form>

<script>
    setEventSubmitInButton();

    function setEventSubmitInButton() {
        document.getElementById("buttonSubmit").addEventListener("click", ({
            target
        }) => {
            Notiflix.Block.standard('.order-md-1', 'Por favor, aguarde um instante');
            setTimeout(() => {
                document.querySelector("form").submit();
            }, 2000);
        });
    }
</script>