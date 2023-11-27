<?php $this->layout("administrative/template", [
    "styles" => [
        css_directory("/global/table-responsive.css"),
        css_directory("/administrative/medical/index.css"),
    ],
    "scripts" => [
        js_directory("/administrative/medical/index.js")
    ]
]); ?>



<nav class="breadcrumb mt-3">
    <a class="breadcrumb-item" href="">Início</a>
    <span class="breadcrumb-item active" aria-current="page">Medicos</span>
</nav>



<div class="card shadow-light mb-4" id="cardForm">
    <div class="card-header">
        Cadastro de médicos
        <p class="text-muted mb-0 d-none d-md-flex">
            Todos os médicos cadastrados automaticamente estarão ativos e terão acesso ao sistema.
        </p>
    </div>
    <div class="card-body">

        <?php // O conteúdo do formulário de criação se encontra no arquivo create.php no diretório especificado abaixo em views. 
        ?>
        <?= $this->insert("administrative/medical/partials/create", [
            "departments" => $departments
        ]) ?>


        <?php // O conteúdo que gera a tabela se encontra no arquivo list.php no diretório especificado abaixo em views. 
        ?>
        <div class="row mb-3">
            <?= $this->insert("administrative/medical/partials/list", [
                "medicals" => $medicals,
                "pagination" => $pagination,
                "searchArgument" => $searchArgument
            ]) ?>
        </div>
    </div>
</div>



<?= $this->insert("administrative/medical/partials/modal_edit",[
    "departments" => $departments
]); ?>