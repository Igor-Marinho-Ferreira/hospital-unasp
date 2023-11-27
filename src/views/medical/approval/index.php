<?php $this->layout("medical/template", [
    "styles" => [
        css_directory("/global/table-responsive.css"),
        css_directory("/administrative/patient/index.css"),
    ],
    "scripts" => [
        js_directory("/medical/approval/index.js")
    ]
]); ?>



<nav class="breadcrumb mt-3">
    <a class="breadcrumb-item" href="">Início</a>
    <span class="breadcrumb-item active" aria-current="page">Consultas</span>
</nav>



<div class="card shadow-light mb-4" id="cardForm">
    <div class="card-header">
        Aprovação de consultas
        <p class="text-muted mb-0 d-none d-md-flex">
            Todas as consultas podem ser aprovadas ou rejeitadas aqui
        </p>
    </div>
    <div class="card-body">

        <?php // O conteúdo do formulário de criação se encontra no arquivo create.php no diretório especificado abaixo em views. 
        ?>

        <?php // O conteúdo que gera a tabela se encontra no arquivo list.php no diretório especificado abaixo em views. 
        ?>
        <div class="row mb-3">
            <?= $this->insert("medical/approval/partials/list",[
                "appointments" => $appointments
            ]) ?>
        </div>
    </div>
</div>