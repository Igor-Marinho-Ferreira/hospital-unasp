<form class="row mb-2" method="POST" action="<?= route(PATIENT . PATIENT_APPOINTMENT_STORE) ?>" id="formPatientCreate">
    <div class="col-12 col-md-4 mb-3" style = "display: none">
        <label for="" class="form-label fw-bold">
            Nome
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("name") ?>" name="name"
            id="name" placeholder="Informe o nome completo" maxlength="25" required
            value="<?= $_SESSION['authentication']['name'] ?>">
        <small class="text-danger"><?= applyWrongText("name") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            CPF
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("cpf") ?>" name="cpf"
            id="cpf" placeholder="Informe o cpf" maxlength="14" required
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
            id="telephone" placeholder="Informe o telefone" maxlength="25" required
            value="<?= applyOldInput("telephone") ?>">
        <small class="text-danger"><?= applyWrongText("telephone") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Médico
            <span class="text-danger">*</span>
        </label>
        <select name="id_doctor" id="doctorId" class="form-select form-select-sm <?= applyWrong("id_doctor") ?>" required>
            <option value="">Selecione</option>

            <?php if (!empty($medicals)) { ?>
                <?php foreach ($medicals as $medicalIndex => $medical) { ?>
                    <option value="<?= $medical->id ?>" <?= applyOldSelectSimple($medical->name, "id_doctor") ?>><?= $medical->name ?></option>
                <?php } ?>
            <?php } ?>

        </select>
    </div>

    <div class="col-12 col-md-2 mb-3">
        <label for="" class="form-label fw-bold">
            Data para a consulta
            <span class="text-danger">*</span>
        </label>
        <input type="date" class="form-control form-control-sm <?= applyWrong("appointment") ?>" name="appointment"
            id="appointment" maxlength="6" required
            value="<?= applyOldInput("appointment") ?>">
        <small class="text-danger"><?= applyWrongText("appointment") ?></small>
    </div>

    <div class="col-12 col-md-2 mb-3">
        <label for="" class="form-label fw-bold">
            Horário
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("hour") ?>" name="hour"
            id="hour" placeholder="Informe o horário" maxlength="6" required
            value="<?= applyOldInput("hour") ?>">
        <small class="text-danger"><?= applyWrongText("hour") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3" style="display: none">
        <label for="" class="form-label fw-bold">
            Status
            <span class="text-danger">*</span>
        </label>
        <select id="status" name="status" class="form-select form-select-sm">
            <option value="Y">Ativo</option>
            <option value="N" selected>Inativo</option>
        </select>
    </div>

    <div class="col-12 col-md-2 mb-3">
        <input type="text" class="form-control form-control-sm" name="id_patient"
            id="id_patient" maxlength="6" required
            value="<?= $_SESSION['authentication']['id'] ?>" style = "display:none">
    </div>

    <div class="col-12 d-flex align-items-center justify-content-end">
        <button type="submit" class="btn btn-sm btn-company">Salvar dados</button>
    </div>

    <div class="col-12">
        <hr class="mb-0">
    </div>
</form>