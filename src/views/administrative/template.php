<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


    <link rel="stylesheet" href="<?= css_directory("/administrative/global.css") ?>">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>


    <?php if (!empty($styles)) { ?>
        <?php foreach ($styles as $styleIndex => $style) { ?>
            <link rel="stylesheet" href="<?= $style ?>">
        <?php } ?>
    <?php } ?>
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="<?= image_directory("Logo.png") ?>" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">PAINEL <br> ADMINISTRATIVO</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">


                <ul class="menu-links">
                    <li class="nav-link <?= routerIs("/dashboard"); ?>">
                        <a href="<?= route(ADMINISTRATIVE_DASHBOARD) ?>">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Início</span>
                        </a>
                    </li>

                    <li class="nav-link <?= routerIs("/departments"); ?>">
                        <a href="<?= route(ADMINISTRATIVE . ADMINISTRATIVE_DEPARTMENTS) ?>">
                            <i class='bx bx-buildings icon'></i>
                            <span class="text nav-text">Departamentos</span>
                        </a>
                    </li>

                    <li class="nav-link <?= routerIs("/rooms"); ?>">
                        <a href="<?= route(ADMINISTRATIVE . ADMINISTRATIVE_ROOMS) ?>">
                            <i class='bx bx-chalkboard icon'></i>
                            <span class="text nav-text">Salas</span>
                        </a>
                    </li>
                    
                    <li class="nav-link <?= routerIs("/medical"); ?>">
                        <a href="<?= route(ADMINISTRATIVE . ADMINISTRATIVE_MEDICAL) ?>">
                            <i class='bx bx-plus-medical icon'></i>
                            <span class="text nav-text">Médicos</span>
                        </a>
                    </li>

                    <li class="nav-link <?= routerIs("/nurse"); ?>">
                        <a href="<?= route(ADMINISTRATIVE . ADMINISTRATIVE_NURSE) ?>">
                            <i class='bx bx-capsule icon'></i>
                            <span class="text nav-text">Enfermeiros</span>
                        </a>
                    </li>

                    <li class="nav-link <?= routerIs("/patient"); ?>">
                        <a href="<?= route(ADMINISTRATIVE . ADMINISTRATIVE_PATIENT) ?>">
                            <i class='bx bx-face icon'></i>
                            <span class="text nav-text">Pacientes</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="<?= route(ADMINISTRATIVE . AUTH_LOGOUT_ADMINISTRATIVE . user("id")); ?>">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Sair</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Modo Escuro</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>

    </nav>

    <section class="home">
        <?= $this->section("content"); ?>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


    <script src="<?= js_directory("/notiflix.js") ?>"></script>
    <script src="<?= js_directory("/init.js") ?>"></script>
    <script src="<?= js_directory("/administrative/global.js"); ?>"></script>

    <?php if (!empty($scripts)) { ?>
        <?php foreach ($scripts as $scriptIndex => $script) { ?>
            <script src="<?= $script ?>"></script>
        <?php } ?>
    <?php } ?>

    <?= getNotiflix(); ?>
    <?php forgetSessions(["old", "isWrong", "notiflix"]); ?>
</body>

</html>