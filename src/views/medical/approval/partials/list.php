<!-- Filter form -->
<form class="col-12" id="containerFilter" method="GET" action="">
    <input type="text" name="q" id="search" class="form-control form-control-sm" placeholder="Filtrar dados" value="">
    <button class="btn btn-sm btn-company">
        <i class='bx bx-search-alt'></i>
    </button>
</form>



<!-- Table with departments -->
<div class="col-12">
    <table class="mb-3">
        <thead>
            <tr>
                <th scope="col">Médico</th>
                <th scope="col">Data</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($appointments)) { ?>
                <?php foreach ($appointments as $appointmentIndex => $appointment) { ?>
                    <tr>
                        <td data-label="Matrícula">
                            <a class="text-decoration-none cursor-pointer link2modal" data-id="<?= $appointment->id ?>"><?= $appointment->name ?></a>
                        </td>
                        <td data-label="Nome"><?= $appointment->appointment ?></td>
                        <?php $badgeClass = $appointment->deleted_at ? "danger" : "success" ?>
                        <td data-label="Status" class="badge-cell"><span class="badge bg-<?= $badgeClass ?>" data-id="<?= $appointment->id ?>"><?= ($badgeClass === "danger") ? "Em espera" : "Aprovada"; ?></span>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="3">Nenhum registro encontrado</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php if (!empty($pagination)) echo $pagination;  ?>
</div>