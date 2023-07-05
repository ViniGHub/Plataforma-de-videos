<?php

namespace Alura\Mvc\Controller;

class LogController implements Controller
{
    public function processaRequisicao(): void
    {
        $nome = filter_input(INPUT_POST, 'user');
        $senha = filter_input(INPUT_POST, 'senha');

        header("location: /?sucesso=1&nome={$nome}&senha={$senha}");
    }
}
