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
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Data Nascimento</th>
                <th scope="col">Telefone</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($patients)) { ?>
                <?php foreach ($patients as $patientIndex => $patient) { ?>
                    <tr>
                        <td data-label="Matrícula">
                            <a class="text-decoration-none cursor-pointer link2modal" data-id="<?= $patient->id ?>"><?= $patient->name ?></a>
                        </td>
                        <td data-label="Nome"><?= $patient->cpf ?></td>
                        <td data-label="Nome"><?= date('d/m/Y', strtotime($patient->dath_birth)) ?></td>
                        <td data-label="Nome"><?= $patient->telephone ?></td>
                        <?php $badgeClass = $patient->deleted_at ? "danger" : "success" ?>
                        <td data-label="Status" class="badge-cell"><span class="badge bg-<?= $badgeClass ?>" data-id="<?= $patient->id ?>"><?= ($badgeClass === "danger") ? "Inativo" : "Ativo"; ?></span>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="5">Nenhum registro encontrado</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php if (!empty($pagination)) echo $pagination;  ?>
</div>