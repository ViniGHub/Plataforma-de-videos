<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\VideoRepository;
use PDO;

class VideoFormController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $videoRepository = $this->videoRepository;
        
        require_once '../views/video-form.php';
    }
}
