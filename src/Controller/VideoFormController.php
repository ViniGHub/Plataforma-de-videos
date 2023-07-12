<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\HtmlRendererTrait;
use Alura\Mvc\Repo\VideoRepository;

class VideoFormController implements Controller
{
    use HtmlRendererTrait;
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $videoRepository = $this->videoRepository;
        
        echo $this->renderTemplate('video-form', ['id' => $id, 'videoRepository' => $videoRepository]);
    }
}
