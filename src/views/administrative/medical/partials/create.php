<form class="row mb-2" method="POST" action="<?= route(ADMINISTRATIVE . ADMINISTRATIVE_MEDICAL_STORE) ?>" id="formMedicalCreate">
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
            Departamento
            <span class="text-danger">*</span>
        </label>
        <select name="departments_id" id="departmentsId" class="form-select form-select-sm <?= applyWrong("departments_id") ?>" required>
            <option value="">Selecione</option>

            <?php if (!empty($departments)) { ?>
                <?php foreach ($departments as $departmentsIndex => $department) { ?>
                    <option value="<?= $department->id ?>" <?= applyOldSelectSimple($department->name, "departments_id") ?>><?= $department->name ?></option>
                <?php } ?>
            <?php } ?>

        </select>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Especialidade
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("specialty") ?>" name="specialty"
            id="specialty" placeholder="Informe a descrição" maxlength="50" required
            value="<?= applyOldInput("specialty") ?>">
        <small class="text-danger"><?= applyWrongText("specialty") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Telefone
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("telephone") ?>" name="telephone"
            id="telephone" placeholder="Informe o telefone" maxlength="50" required
            value="<?= applyOldInput("telephone") ?>">
        <small class="text-danger"><?= applyWrongText("telephone") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Email
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("email") ?>" name="email"
            id="email" placeholder="Informe o telefone" maxlength="50" required
            value="<?= applyOldInput("email") ?>">
        <small class="text-danger"><?= applyWrongText("email") ?></small>
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