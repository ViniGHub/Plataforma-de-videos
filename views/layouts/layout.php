<?php

use League\Plates\Extension\Asset;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fontes utilizadas -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">

    <!-- Arquivos de estilização -->
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/estilos.css">
    <link rel="stylesheet" href="/css/estilos-form.css">
    <link rel="stylesheet" href="/css/flexbox.css">
    <link rel="stylesheet" href="/css/animation.css">

    <!-- icone da pagina -->
    <link rel="shortcut icon" href="/img/cabecalho/Logo.ico" type="image/x-icon">

    <!-- connect google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- connect fontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>VideoGallery</title>
</head>

<body>

    <!-- <div style="height:100vh; width: 4px; background: red; position:absolute; z-index:10; left:50vw;"></div> -->

    <div class="load__page" id="load__page"></div>
    <!-- Cabecalho -->
    <header>

        <nav class="cabecalho" id="cabec">
            <div style="display:flex; align-items: center; justify-content: start; position: absolute;">


                <?php
                if (isset($_SESSION['email'])) {
                ?>
                    <a href="../change-login" style="display:flex; flex-direction: row-reverse; align-items: center; justify-content: start; position: absolute;">

                        <h1 class="email__user"><?= $_SESSION['email'] ?></h1>
                    <?php
                } else { ?>
                        <a style="color: var(--azul-medio); text-decoration:none; display:flex; flex-direction: row-reverse; align-items: center; justify-content: start; position: absolute;" class="link__form" href="/create-login"><span style="width:max-content">Criar conta</span>

                        <?php
                    } ?>
                        <i onmouseover="shake(this)" onmouseout="removeShake(this)" style="color: var(--azul-medio); font-size: 30px; margin: 0 10px 0 10px;" class="fa-solid fa-circle-user" id="UserIcon"></i>

                        </a>


            </div>
            <div></div>

            <a href="./" style="margin-left:100px;"><img class="logo" src="./img/cabecalho/Logo.ico" alt="Logo canal Vtube"></a>

            <div class="cabecalho__icones">
                <a href="../enviar-video?id=<?= null; ?>" class="cabecalho__videos"></a>
                <a href="../logout" class="cabecalho__sair">Sair</a>
            </div>
        </nav>

    </header>

    <!-- Mensagem de erro flash -->
    <?php if (isset($_SESSION['error_message'])) { ?>
        <div class="container__erro">
            <h2 class="formulario__titulo Erro__titulo"><?php echo $_SESSION['error_message'];
                                                        unset($_SESSION['error_message']) ?></h2>
        </div>
    <?php } ?>


    <!-- seção onde entra o conteudo da pagina -->
    <?php
    /** @var \League\Plates\Template\Template $this */
    echo $this->section('content');
    ?>

    <script src="/js/anim-nav.js"></script>

    <script>
        let load = document.querySelector('#load__page');
        let body = document.querySelector('body');


        window.addEventListener('load', function() {
            load.style.display = 'none';
            body.style.overflow = 'visible';

        });

        function shake(obj) {
            obj.classList.add('fa-shake');
        }

        function removeShake(obj) {
            obj.classList.remove('fa-shake');
        }
    </script>

</body>

</html>