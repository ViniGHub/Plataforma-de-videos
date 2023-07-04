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

        require_once '../views/video-list.php';
    }
}
