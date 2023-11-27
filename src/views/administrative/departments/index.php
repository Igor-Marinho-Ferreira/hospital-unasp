<?php $this->layout("administrative/template", [
    "styles" => [
        css_directory("/global/table-responsive.css"),
        css_directory("/administrative/departments/index.css"),
    ],
    "scripts" => [
        js_directory("/administrative/departments/index.js")
    ]
]); ?>



<nav class="breadcrumb mt-3">
    <a class="breadcrumb-item" href="">Início</a>
    <span class="breadcrumb-item active" aria-current="page">Departamentos</span>
</nav>



<div class="card shadow-light mb-4" id="cardForm">
    <div class="card-header">
        Gerenciamento de departamentos
        <p class="text-muted mb-0 d-none d-md-flex">
            Todos os departamentos cadastrados automaticamente estarão ativos.
        </p>
    </div>
    <div class="card-body">

        <?php // O conteúdo do formulário de criação se encontra no arquivo create.php no diretório especificado abaixo em views. 
        ?>
        <?= $this->insert("administrative/departments/partials/create", []) ?>


        <?php // O conteúdo que gera a tabela se encontra no arquivo list.php no diretório especificado abaixo em views. 
        ?>
        <div class="row mb-3">
            <?= $this->insert("administrative/departments/partials/list", [
                "departments" => $departments,
                "pagination" => $pagination,
                "searchArgument" => $searchArgument
            ]) ?>
        </div>
    </div>
</div>



<?= $this->insert("administrative/departments/partials/modal_edit"); ?>