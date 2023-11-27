<form class="row mb-2" method="POST" action="<?= route(ADMINISTRATIVE . ADMINISTRATIVE_DEPARTMENTS_STORE) ?>" id="formDeparmentsCreate">
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
            Descrição
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("description") ?>" name="description"
            id="description" placeholder="Informe a descrição" maxlength="50" required
            value="<?= applyOldInput("description") ?>">
        <small class="text-danger"><?= applyWrongText("description") ?></small>
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