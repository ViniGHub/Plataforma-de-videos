<?= $this->layout('/layouts/layout') ?>

<?php if (isset($_SESSION['email'])) { ?>
    <h1 class="email__user" style="margin-top: 10px;"><?= $_SESSION['email'] ?></h1>
<?php } ?>
<ul class="videos__container" alt="videos alura">
    <!-- <h2 style="font-size: 50px; width: 100vw; font-family: 'Caprasimo', cursive; margin-bottom: 20px; padding: 0;">Fy page</h2> -->
    <?php
    foreach ($videoList as $video) {
    ?>
        <li class="videos__item">
            <?php if ($video->getFilePath() !== null) { ?>
                <a target="_blank" href="<?= $video->url; ?>">
                    <img width="100%" height="72%" src="/img/uploads/<?= $video->getFilePath(); ?>" alt="" style="object-fit: cover;">
                </a>
            <?php } else { ?>
                <iframe width="100%" height="72%" src="<?php echo $video->url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php } ?>

            <div class="descricao-video">
                <img src="./img/logo.png" alt="logo canal alura">
                <h3><?php echo $video->title; ?></h3>
                <div class="acoes-video">
                    <a href="/enviar-video?id=<?= $video->id; ?>">Editar</a>
                    <?php if ($video->getFilePath() !== null) { ?>
                        <a href="/remover-capa?id=<?= $video->id; ?>">Remover capa</a>
                    <?php } ?>
                    <a href="/remover-video?id=<?= $video->id; ?>">Excluir</a>
                </div>
            </div>
        </li>
    <?php
    } ?>
</ul>