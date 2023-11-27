<?php $this->layout("medical/template", [
    "styles" => [
        css_directory("/global/table-responsive.css"),
        css_directory("/administrative/patient/index.css"),
    ],
    "scripts" => [
        js_directory("/administrative/patient/index.js")
    ]
]); ?>



<nav class="breadcrumb mt-3">
    <a class="breadcrumb-item" href="">Início</a>
    <span class="breadcrumb-item active" aria-current="page">Pacientes</span>
</nav>



<div class="card shadow-light mb-4" id="cardForm">
    <div class="card-header">
        Cadastro de paciente
        <p class="text-muted mb-0 d-none d-md-flex">
            Todos os pacientes cadastrados automaticamente estarão ativos e terão acesso ao sistema.
        </p>
    </div>
    <div class="card-body">

        <?php // O conteúdo do formulário de criação se encontra no arquivo create.php no diretório especificado abaixo em views. 
        ?>
        <?= $this->insert("medical/patient/partials/create") ?>


        <?php // O conteúdo que gera a tabela se encontra no arquivo list.php no diretório especificado abaixo em views. 
        ?>
        <div class="row mb-3">
            <?= $this->insert("medical/patient/partials/list", [
                "patients" => $patients,
                "pagination" => $pagination,
                "searchArgument" => $searchArgument
            ]) ?>
        </div>
    </div>
</div>



<?= $this->insert("medical/patient/partials/modal_edit"); ?>