<?php

/** @var \League\Plates\Template\Template $this */
echo $this->layout('/layouts/layout') ?>

<!-- <h2 style="font-size: 50px; width: 100vw; font-family: 'Caprasimo', cursive; margin-bottom: 20px; padding: 0;">Fy page</h2> -->
<div class="search__result" id="search__result"></div>

<?php
if (!empty($videoList)) { ?>
    <ul class="videos__container" alt="videos alura">
        <?php
        foreach ($videoList as $video) {
        ?>

            <li class="videos__item">
                <?php if ($video->getFilePath() !== null) { ?>
                    <a target="_blank" href="<?= $video->url; ?>">
                        <img width="100%" height="72%" src="/img/uploads/<?= $video->getFilePath(); ?>" alt="" style="object-fit: cover;">
                    </a>
                <?php } else { ?>
                    <iframe width="100%" height="72%" src="<?php echo $video->url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
                <?php } ?>

                <div class="descricao-video">
                    <div class="cabec-video">
                        <img class="icon-desc" src="./img/cabecalho/Logo.png" alt="logo canal Vtube">
                        <h3><?php echo $video->title; ?></h3>
                    </div>

                    <div class="acoes-video">
                        <a href="/enviar-video?id=<?= $video->id; ?>">Editar</a>
                        <?php if ($video->getFilePath() !== null) { ?>
                            <a href="/remover-capa?id=<?= $video->id; ?>">Tirar <br /> capa</a>
                        <?php } ?>
                        <a href="/remover-video?id=<?= $video->id; ?>">Excluir</a>
                    </div>
                </div>
            </li>

        <?php
        } ?>
    </ul>
<?php
} else { ?>
    <div class="container-video">
        <a href="/enviar-video?id<?= null ?>" class="botao__adicionar">Adicionar Video</a>
    </div>

<?php
} ?>

<script src="/js/youtubeCon.js"></script>
