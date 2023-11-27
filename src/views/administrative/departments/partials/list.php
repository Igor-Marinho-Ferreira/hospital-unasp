<!-- Filter form -->
<form class="col-12" id="containerFilter" method="GET" action="<?= route(ADMINISTRATIVE . ADMINISTRATIVE_DEPARTMENTS); ?>">
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
                <th scope="col">Descrição</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($departments)) { ?>
                <?php foreach ($departments as $departmentIndex => $department) { ?>
                    <tr>
                        <td data-label="Matrícula">
                            <a class="text-decoration-none cursor-pointer link2modal" data-id="<?= $department->id ?>"><?= $department->name ?></a>
                        </td>
                        <td data-label="Nome"><?= $department->description ?></td>
                        <?php $badgeClass = $department->deleted_at ? "danger" : "success" ?>
                        <td data-label="Status" class="badge-cell"><span class="badge bg-<?= $badgeClass ?>" data-id="<?= $department->id ?>"><?= ($badgeClass === "danger") ? "Inativo" : "Ativo"; ?></span>
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