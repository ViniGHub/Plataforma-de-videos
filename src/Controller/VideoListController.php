<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\VideoRepository;


class VideoListController implements Controller
{
    
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $videoList = $this->videoRepository->all();
        shuffle($videoList);

        require_once './pages/cabecalho/inicio-html.php'; ?>
    
    <ul class="videos__container" alt="videos alura">
        <h2 style="font-size: 50px; width: 100vw; font-family: 'Caprasimo', cursive; margin-bottom: 20px; padding: 0;">Para Você</h2>    
        <?php 
        foreach ($videoList as $video) { 
            ?>
        <li class="videos__item">
            <iframe width="100%" height="72%" src="<?php echo $video->url; ?>" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <div class="descricao-video">
                <img src="./img/logo.png" alt="logo canal alura">
                <h3><?php echo $video->title; ?></h3>
                <div class="acoes-video">
                    <a href="/enviar-video?id=<?=$video->id; ?>">Editar</a>
                    <a href="/remover-video?id=<?= $video->id;?>">Excluir</a>
                </div>
            </div>
        </li>
        <?php 
        } ?>
    </ul>
    <?php require_once './pages/cabecalho/fim-html.php';
    }
}
