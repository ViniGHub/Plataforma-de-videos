<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\entity\Video;
use Alura\Mvc\Repo\VideoRepository;

class VideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        $titulo = filter_input(INPUT_POST, 'titulo');
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$url || !$titulo) {
            header('location: /?sucesso=0');
            exit();
        }
        $video = new Video($url, $titulo);

        if ($id == null) {
            $result = $this->videoRepository->addVideo($video);
        } else {
            $video->setId($id);
            $result = $this->videoRepository->updateVideo($video);
        }

        if ($result) {
            header('location: /?sucesso=1');
        } else {
            header('location: /?sucesso=0');
        }
    }
}
