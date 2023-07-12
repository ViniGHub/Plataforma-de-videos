<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\HtmlRendererTrait;
use Alura\Mvc\Repo\UserRepository;
use Alura\Mvc\Repo\VideoRepository;


class VideoListController implements Controller
{
    use HtmlRendererTrait;
    public function __construct(private UserRepository $userRepository, private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $videoList = $this->videoRepository->all();
        shuffle($videoList);
        $user = $this->userRepository->find('shamanrodri');
        
        echo $this->renderTemplate('video-list', ['videoList' => $videoList, 'user' => $user]);;
    }
}
