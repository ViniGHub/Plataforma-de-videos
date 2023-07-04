<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\VideoRepository;

class DeleteVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === null || $id === false) {
            header('location: /?sucesso=0');
            return;
        }
        
        $result = $this->videoRepository->remove($id);

        if ($result) {
            header('location: /?sucesso=1');
        } else {
            header('location: /?sucesso=0');
        }
    }
}
