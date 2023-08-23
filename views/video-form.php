<?php

/** @var VideoRepository $videoRepository */
/** @var \League\Plates\Template\Template $this */

use Alura\Mvc\Repo\VideoRepository; ?>

<?= $this->layout('/layouts/layout') ?>
<main class="container">

    <form action="/enviar-video?id=<?= $id ?>" method="post" class="container__formulario" enctype="multipart/form-data">
        <?php
        if (!$id == null) {
            $video = $videoRepository->find($id);
            $url = $video->url;
            $titulo = $video->title;
            $image = $video->getFilePath();
        } else {
            $url = null;
            $titulo = null;
        }
        ?>

        <h2 class="formulario__titulo">Envie um vídeo!</h2>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="url">Link embed</label>
            <?php
            if ($videoId) { ?>
                <input name="url" class="campo__escrita" required placeholder="Por exemplo: https://www.youtube.com/embed/dQw4w9WgXcQ" id='url' value="https://www.youtube.com/embed/<?= $videoId ?>" />
            <?php
            } else { ?>
                <input name="url" class="campo__escrita" required placeholder="Por exemplo: https://www.youtube.com/embed/dQw4w9WgXcQ" id='url' value="<?= $url ?>" />
            <?php
            }
            ?>

        </div>


        <div class="formulario__campo">
            <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
            <?php
            if ($videoTitle) { ?>
                <input name="titulo" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo" id='titulo' value="<?= $videoTitle ?>" />
            <?php
            } else { ?>
                <input name="titulo" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo" id='titulo' value="<?= $titulo ?>" />
            <?php
            }
            ?>

            
        </div>

        <div class="formulario__campo">
            <label class="campo__etiqueta" for="image">Capa do vídeo</label>
            <input type="file" name="image" class="campo__escrita" accept="image/*" id='image' value="<?= $image ?>" />
        </div>

        <input class="formulario__botao" type="submit" value="Enviar" />
    </form>

</main>