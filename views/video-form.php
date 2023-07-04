<?php
/** @var VideoRepository $videoRepository */

use Alura\Mvc\Repo\VideoRepository;

require_once '../views/cabecalho/inicio-html.php'; ?>
<main class="container">

    <form action="/enviar-video?id=<?= $id ?>" method="post" class="container__formulario">
        <?php
        if (!$id == null) {
            $video = $videoRepository->find($id);
            $url = $video->url;
            $titulo = $video->title;
        } else {
            $url = null;
            $titulo = null;
        }
        ?>

        <h2 class="formulario__titulo">Envie um vídeo!</h2>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="url">Link embed</label>
            <input name="url" class="campo__escrita" required placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url' value="<?= $url ?>" />
        </div>


        <div class="formulario__campo">
            <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
            <input name="titulo" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo" id='titulo' value="<?= $titulo ?>" />
        </div>

        <input class="formulario__botao" type="submit" value="Enviar" />
    </form>

</main>
<?php require_once '../views/cabecalho/fim-html.php';
