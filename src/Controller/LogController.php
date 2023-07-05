<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\VideoRepository;

class LogController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }


    public function processaRequisicao(): void
    {
        $nome = filter_input(INPUT_POST, 'user');
        $senha = filter_input(INPUT_POST, 'senha');

        header("location: /?sucesso=1&nome={$nome}&senha={$senha}");
    }
}
