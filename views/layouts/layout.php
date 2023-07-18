<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/estilos.css">
    <link rel="stylesheet" href="/css/estilos-form.css">
    <link rel="stylesheet" href="/css/flexbox.css">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">


    <title>VideoGallery</title>
</head>

<body>
    <div class="load__page" id="load__page"></div>
    <!-- Cabecalho -->
    <header>

        <nav class="cabecalho">
            <a class="logo" href="./"></a>

            <?php if (isset($_SESSION['email'])) { ?>
                <h1 class="email__user" style="margin-top: 10px;"><?= $_SESSION['email'] ?></h1>
            <?php } ?>

            <div class="cabecalho__icones">
                <a href="../enviar-video?id=<?= null; ?>" class="cabecalho__videos"></a>
                <a href="../logout" class="cabecalho__sair">Sair</a>
            </div>
        </nav>

    </header>
    <?php if (isset($_SESSION['error_message'])) { ?>
        <h2 class="formulario__titulo Erro__titulo"><?php echo $_SESSION['error_message'];
                                                    unset($_SESSION['error_message']) ?></h2>
    <?php } ?>

    <?php
    /** @var \League\Plates\Template\Template $this */
    echo $this->section('content'); ?>

    <script>
        let load = document.querySelector('#load__page');
        let body = document.querySelector('body');

        window.addEventListener('load', function() {
            load.style.display = 'none';
            body.style.overflow = 'visible';

        });
    </script>
</body>

</html>