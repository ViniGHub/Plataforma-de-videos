<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\VideoRepository;

class RemoveCover implements Controller
{
    public function __construct(private VideoRepository $videoRepository) 
    {
        
    }
    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $result = $this->videoRepository->removeCover($id);

        if ($result) {
            header('location: /?sucesso=1');
            exit();
        }
        header('location: /?sucesso=0');

    }
}
