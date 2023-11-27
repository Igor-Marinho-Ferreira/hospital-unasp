<?php $this->layout("user/template", [
    "styles" => [
        css_directory("/global/table-responsive.css"),
        css_directory("/user/appointment/index.css"),
    ],
    "scripts" => [
        js_directory("/user/appointment/index.js")
    ]
]); ?>



<nav class="breadcrumb mt-3">
    <a class="breadcrumb-item" href="">Início</a>
    <span class="breadcrumb-item active" aria-current="page">Salas</span>
</nav>



<div class="card shadow-light mb-4" id="cardForm">
    <div class="card-header">
        Agenda sua consulta
        <p class="text-muted mb-0 d-none d-md-flex">
            Todos as consultas irão passar por aprovação, caso for aprovada será enviado um email para você.
        </p>
    </div>
    <div class="card-body">

        <?php // O conteúdo do formulário de criação se encontra no arquivo create.php no diretório especificado abaixo em views. 
        ?>
        <?= $this->insert("user/appointment/partials/create", [
            "medicals" => $medical
        ]) ?>


        <?php // O conteúdo que gera a tabela se encontra no arquivo list.php no diretório especificado abaixo em views. 
        ?>
        <div class="row mb-3">
            <?= $this->insert("user/appointment/partials/list",[
                "appointments" => $appointments,
                "pagination" => $pagination,
                "searchArgument" => $searchArgument
            ]) ?>
        </div>
    </div>
</div>



<?= $this->insert("user/appointment/partials/modal_edit"); ?>