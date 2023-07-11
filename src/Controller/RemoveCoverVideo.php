<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\VideoRepository;

class RemoveCoverVideo implements Controller
{
    public function __construct(private VideoRepository $videoRepository) 
    {
        
    }
    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $result = $this->videoRepository->removeCover($id);

        if ($result) {
            header('location: /');
            exit();
        }
        $_SESSION['error_message'] = 'Não foi possivel remover a capa do vídeo.';
        header('location: /');

    }
}
