<button class="btn btn-sm btn-primary d-none" data-bs-toggle="modal" data-bs-target="#modalUpdate"
    id="buttonTrigger">Trigger modal</button>

<!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" method="POST"
            action="<?= route(ADMINISTRATIVE . ADMINISTRATIVE_NURSE_UPDATE) ?>">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalUpdateLabel">Alterar dados</h1>
            </div>
            <div class="modal-body">
                <input type="text" id="idUpdate" name="id" hidden>
                <div class="row g-3">
                    <div class="col-12 col-md-4 mb-3">
                        <label for="" class="form-label fw-bold">
                            Nome
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control form-control-sm <?= applyWrong("name") ?>" name="name"
                            id="nameUpdate" placeholder="Informe o nome" maxlength="25" required
                            value="<?= applyOldInput("name") ?>">
                        <small class="text-danger"><?= applyWrongText("name") ?></small>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <label for="" class="form-label fw-bold">
                            Sobrenome
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control form-control-sm <?= applyWrong("lastname") ?>" name="lastname"
                            id="lastnameUpdate" placeholder="Informe o nome" maxlength="25" required
                            value="<?= applyOldInput("name") ?>">
                        <small class="text-danger"><?= applyWrongText("lastname") ?></small>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <label for="" class="form-label fw-bold">
                            CRM
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control form-control-sm <?= applyWrong("crm") ?>" name="crm"
                            id="crmUpdate" placeholder="Informe a descrição" maxlength="11" required
                            value="<?= applyOldInput("crm") ?>">
                        <small class="text-danger"><?= applyWrongText("crm") ?></small>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <label for="" class="form-label fw-bold">
                            Departamento
                            <span class="text-danger">*</span>
                        </label>
                        <select name="department_id" id="departmentsIdUpdate" class="form-select form-select-sm <?= applyWrong("department_id") ?>" required>
                            <option value="">Selecione</option>

                            <?php if (!empty($departments)) { ?>
                                <?php foreach ($departments as $departmentsIndex => $department) { ?>
                                    <option value="<?= $department->id ?>" <?= applyOldSelectSimple($department->id, "department_id") ?>><?= $department->name ?></option>
                                <?php } ?>
                            <?php } ?>

                        </select>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <label for="" class="form-label fw-bold">
                            Email
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control form-control-sm <?= applyWrong("email") ?>" name="email"
                            id="emailUpdate" placeholder="Informe o Email" maxlength="50" required
                            value="<?= applyOldInput("email") ?>">
                        <small class="text-danger"><?= applyWrongText("email") ?></small>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <label for="" class="form-label fw-bold">
                            Telefone
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control form-control-sm <?= applyWrong("telephone") ?>" name="telephone"
                            id="telephoneUpdate" placeholder="Informe o telefone" maxlength="50" required
                            value="<?= applyOldInput("telephone") ?>">
                        <small class="text-danger"><?= applyWrongText("telephone") ?></small>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <label for="" class="form-label fw-bold">
                            Status
                            <span class="text-danger">*</span>
                        </label>
                        <select id="statusUpdate" name="status" class="form-select form-select-sm">
                            <option value="Y">Ativo</option>
                            <option value="N">Inativo</option>
                        </select>
                    </div>

                    <div class="col-12 d-flex align-items-center justify-content-end">
                        <a id="deleteLink" class="btn btn-sm btn-danger float-end mx-2">Excluir</a>
                        <button type="submit" class="btn btn-sm btn-company">Salvar dados</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>