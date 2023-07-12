<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repo\VideoRepository;

class RemoveCoverVideo implements Controller
{
    use FlashMessageTrait;
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
        $this->addErrorMessage('Não foi possivel remover a capa do vídeo.');
        header('location: /');

    }
}
