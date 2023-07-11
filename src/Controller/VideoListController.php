<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\VideoRepository;


class VideoListController extends ControllerHtml implements Controller
{

    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $videoList = $this->videoRepository->all();
        shuffle($videoList);
        
        echo $this->renderTemplate('video-list', ['videoList' => $videoList]);;
    }
}
