<?php

/** @var \League\Plates\Template\Template $this */
echo $this->layout('/layouts/layout') ?>

<!-- <h2 style="font-size: 50px; width: 100vw; font-family: 'Caprasimo', cursive; margin-bottom: 20px; padding: 0;">Fy page</h2> -->
<div class="search__result" id="search__result" onblur="boxBlur(this)">
    <i class="fa-solid fa-xmark" style="position: absolute; left: 97.5%; font-size:25px; cursor: pointer; color: rgb(255, 0, 0);" onclick="closeSearch()"></i>
</div>

<div class="search__box" id="YTSearch__box">
    <i class="fa-solid fa-magnifying-glass icon__lupa" onclick="ToggleSearch()"></i>
    <input class="inpYT" type="text" value="" placeholder="Pesquisa de videos" name="YTSearch" id="YTSearch" onfocus="selectText(this)">
</div>


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
                        <a href="/enviar-video?id=<?= $video->id; ?>" class="btn__acVideos" onclick="animCard(this)">Editar</a>
                        <?php if ($video->getFilePath() !== null) { ?>
                            <a href="/remover-capa?id=<?= $video->id; ?>" class="btn__acVideos" onclick="animCard(this)">Tirar capa</a>
                        <?php } ?>
                        <a href="/remover-video?id=<?= $video->id; ?>" class="btn__acVideos" onclick="animCard(this)">Excluir</a>
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

<script src="/js/anim-ViAction.js"></script>