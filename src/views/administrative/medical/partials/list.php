<!-- Filter form -->
<form class="col-12" id="containerFilter" method="GET" action="<?= route(ADMINISTRATIVE . ADMINISTRATIVE_MEDICAL); ?>">
    <input type="text" name="q" id="search" class="form-control form-control-sm" placeholder="Filtrar dados" value="<?= $searchArgument ?>">
    <button class="btn btn-sm btn-company">
        <i class='bx bx-search-alt'></i>
    </button>
</form>



<!-- Table with departments -->
<div class="col-12">
    <table class="mb-3">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Departamento</th>
                <th scope="col">Telefone</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($medicals)) { ?>
                <?php foreach ($medicals as $medicalIndex => $medical) { ?>
                    <tr>
                        <td data-label="Matrícula">
                            <a class="text-decoration-none cursor-pointer link2modal" data-id="<?= $medical->id ?>"><?= $medical->name ?></a>
                        </td>
                        <td data-label="Nome"><?= $medical->departments_id ?></td>
                        <td data-label="Nome"><?= $medical->telephone ?></td>
                        <?php $badgeClass = $medical->deleted_at ? "danger" : "success" ?>
                        <td data-label="Status" class="badge-cell"><span class="badge bg-<?= $badgeClass ?>" data-id="<?= $medical->id ?>"><?= ($badgeClass === "danger") ? "Inativo" : "Ativo"; ?></span>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="4">Nenhum registro encontrado</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php if (!empty($pagination)) echo $pagination;  ?>
</div>