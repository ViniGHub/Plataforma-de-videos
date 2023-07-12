<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repo\VideoRepository;

class DeleteVideoController implements Controller
{
    use FlashMessageTrait;
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === null || $id === false) {
            $_SESSION['error_message'] = 'Não foi possível encontrar o vídeo.';
            header('location: /');
            return;
        }
        
        $result = $this->videoRepository->remove($id);

        if ($result) {
            header('location: /');
        } else {
            $this->addErrorMessage('Não foi possível remover o vídeo.');
            header('location: /');
        }
    }
}
