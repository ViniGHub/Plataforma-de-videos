<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\entity\Video;
use Alura\Mvc\Repo\VideoRepository;


class NewJsonVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }
    public function processaRequisicao(): void
    {
        $request = file_get_contents('php://input');
        $videoData = json_decode($request, true);
        $video = new Video($videoData['url'], $videoData['title']);
        $this->videoRepository->addVideo($video);

        http_response_code(201);
    }
}
