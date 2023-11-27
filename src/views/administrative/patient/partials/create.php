<form class="row mb-2" method="POST" action="<?= route(ADMINISTRATIVE . ADMINISTRATIVE_PATIENT_STORE) ?>" id="formPatientCreate">
    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Nome
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("name") ?>" name="name"
            id="name" placeholder="Informe o nome" maxlength="25" required
            value="<?= applyOldInput("name") ?>">
        <small class="text-danger"><?= applyWrongText("name") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Sobrenome
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("lastname") ?>" name="lastname"
            id="lastname" placeholder="Informe o nome" maxlength="25" required
            value="<?= applyOldInput("lastname") ?>">
        <small class="text-danger"><?= applyWrongText("lastname") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            CPF
            <span class="text-danger">*</span>,

            
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("cpf") ?>" name="cpf"
            id="cpf" placeholder="XXX.XXX.XXX-XX" maxlength="12" required
            value="<?= applyOldInput("cpf") ?>">
        <small class="text-danger"><?= applyWrongText("cpf") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Data de nascimento
            <span class="text-danger">*</span>
        </label>
        <input type="date" class="form-control form-control-sm <?= applyWrong("dath_birth") ?>" name="dath_birth"
            id="dath_birth" placeholder="Informe a data" maxlength="6" required
            value="<?= applyOldInput("dath_birth") ?>">
        <small class="text-danger"><?= applyWrongText("dath_birth") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Telefone
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("telephone") ?>" name="telephone"
            id="telephone" placeholder="(XX) XXXXX-XXXX" maxlength="20" required
            value="<?= applyOldInput("telephone") ?>">
        <small class="text-danger"><?= applyWrongText("telephone") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Email
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("email") ?>" name="email"
            id="email" placeholder="Informe o Email" maxlength="50" required
            value="<?= applyOldInput("email") ?>">
        <small class="text-danger"><?= applyWrongText("email") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            CEP
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("cep") ?>" name="cep"
            id="cep" placeholder="Informe o cep" maxlength="25" required
            value="<?= applyOldInput("cep") ?>">
        <small class="text-danger"><?= applyWrongText("cep") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Rua
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("street") ?>" name="street"
            id="street" placeholder="Informe a rua" maxlength="100" required
            value="<?= applyOldInput("street") ?>">
        <small class="text-danger"><?= applyWrongText("street") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Numero da casa
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("number_home") ?>" name="number_home"
            id="number_home" placeholder="Informe o numero da casa" maxlength="10" required
            value="<?= applyOldInput("number_home") ?>">
        <small class="text-danger"><?= applyWrongText("number_home") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Cidade
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("city") ?>" name="city"
            id="city" placeholder="Informe a cidade" maxlength="35" required
            value="<?= applyOldInput("city") ?>">
        <small class="text-danger"><?= applyWrongText("city") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Estado
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("state") ?>" name="state"
            id="state" placeholder="Informe o estado" maxlength="35" required
            value="<?= applyOldInput("state") ?>">
        <small class="text-danger"><?= applyWrongText("state") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Status
            <span class="text-danger">*</span>
        </label>
        <select id="status" name="status" class="form-select form-select-sm">
            <option value="Y">Ativo</option>
            <option value="N">Inativo</option>
        </select>
    </div>

    <div class="col-12 d-flex align-items-center justify-content-end">
        <button type="submit" class="btn btn-sm btn-company">Salvar dados</button>
    </div>

    <div class="col-12">
        <hr class="mb-0">
    </div>
</form>