<!doctype html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">



    <!-- Style -->
    <link rel="stylesheet" href="<?= css_directory("/authentication/login.css") ?>">

    <title>UNASP - Portal administrativo</title>
</head>

<body>


    <div class="d-lg-flex half">
        <!-- background image  -->
        <div id="background" class="bg order-1 order-md-2" style="background-image: url('<?= image_directory("medical.webp") ?>');"></div>

        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">


                        <!-- title and welcome message -->

                        <div class="company-header">
                            <img src="<?= image_directory("Logo.png") ?>" alt="teste" style="width: 50px; right: 0; bottom: 10px; z-index: 100;">
                            <h2>Hospital Unasp</h2>
                        </div>

                        <p class="welcome-message mb-4"><?= $subheaderMessage ?></p>


                        <?= $this->section("content"); ?>


                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="<?= js_directory("/init.js") ?>"></script>
    <script src="<?= js_directory("/notiflix.js") ?>"></script>


    <?php if (!empty($js)) { ?>
        <?php foreach ($js as $jsIndex => $jsValue) { ?>
            <script src="<?= $jsValue ?>"></script>
        <?php } ?>
    <?php } ?>

    <?= getNotiflix(); ?>
    <?php forgetSessions([SESS_OLD, SESS_IS_WRONG, SESS_NOTIFLIX]); ?>
</body>

</html>