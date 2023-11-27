<button class="btn btn-sm btn-primary d-none" data-bs-toggle="modal" data-bs-target="#modalUpdate"
    id="buttonTrigger">Trigger modal</button>

<!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" method="POST"
            action="<?= route(ADMINISTRATIVE . ADMINISTRATIVE_ROOMS_UPDATE) ?>">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalUpdateLabel">Alterar dados</h1>
            </div>
            <div class="modal-body">
                <input type="text" id="idUpdate" name="id" hidden>
                <div class="row g-3">
                    <div class="col-12 col-md-4 mb-3">
                        <label for="" class="form-label fw-bold">
                            Código
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control form-control-sm <?= applyWrong("code") ?>" name="code"
                            id="codeUpdate" placeholder="Informe o código" maxlength="10" required
                            value="<?= applyOldInput("code") ?>">
                        <small class="text-danger"><?= applyWrongText("code") ?></small>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <label for="" class="form-label fw-bold">
                            Descrição
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control form-control-sm <?= applyWrong("description") ?>" name="description"
                            id="descriptionUpdate" placeholder="Informe a descrição" maxlength="50" required
                            value="<?= applyOldInput("description") ?>">
                        <small class="text-danger"><?= applyWrongText("description") ?></small>
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