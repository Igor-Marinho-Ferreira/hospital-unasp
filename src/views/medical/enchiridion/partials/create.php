<form class="row mb-2" method="POST" action="<?= route(MEDICAL . ENCHIRIDION_STORE) ?>" id="formMedicalCreate">
    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Paciente
            <span class="text-danger">*</span>
        </label>
        <select name="id_patient" id="patientId" class="form-select form-select-sm <?= applyWrong("id_patient") ?>" required>
            <option value="">Selecione</option>

            <?php if (!empty($patients)) { ?>
                <?php foreach ($patients as $patientsIndex => $patient) { ?>
                    <option value="<?= $patient->id ?>" <?= applyOldSelectSimple($patient->name, "id_patient") ?>><?= $patient->name ?></option>
                <?php } ?>
            <?php } ?>

        </select>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Enfermeiro
            <span class="text-danger">*</span>
        </label>
        <select name="id_nurse" id="nurseId" class="form-select form-select-sm <?= applyWrong("id_nurse") ?>" required>
            <option value="">Selecione</option>

            <?php if (!empty($nurses)) { ?>
                <?php foreach ($nurses as $nursesIndex => $nurse) { ?>
                    <option value="<?= $nurse->id ?>" <?= applyOldSelectSimple($nurse->name, "id_nurse") ?>><?= $nurse->name ?></option>
                <?php } ?>
            <?php } ?>

        </select>
    </div>
    
    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Médico
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-sm <?= applyWrong("id_doctor") ?>" name="id_doctor"
            id="id_doctor" placeholder="Informe o nome completo" maxlength="25" required
            value="<?= $_SESSION['authentication']['id'] ?>" readonly>
        <small class="text-danger"><?= applyWrongText("id_doctor") ?></small>
    </div>

    <div class="col-12 col-md-4 mb-3">
        <label for="" class="form-label fw-bold">
            Data
            <span class="text-danger">*</span>
        </label>
        <input type="date" class="form-control form-control-sm <?= applyWrong("open_date") ?>" name="open_date"
            id="open_date" placeholder="Informe a data" maxlength="6" required
            value="<?= applyOldInput("open_date") ?>">
        <small class="text-danger"><?= applyWrongText("open_date") ?></small>
    </div>

    <!-- comments -->
    <div class="col-md-12">
        <label for="" class="form-label fw-bold">
            Comentarios
            <span class="text-danger">*</span>
        </label>
        <textarea name="comments" id="comments" class="form-control"></textarea>
    </div>

    <div class="col-12 d-flex align-items-center justify-content-end">
        <button type="submit" class="btn btn-sm btn-company">Salvar dados</button>
    </div>

    <div class="col-12">
        <hr class="mb-0">
    </div>
</form>

<script>
    tinymce.init({
        selector: '#comments',
        plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
            'media', 'table', 'emoticons', 'template', 'help'
        ],
    });
</script>