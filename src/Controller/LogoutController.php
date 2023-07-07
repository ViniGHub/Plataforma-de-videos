<?php
namespace Alura\Mvc\Controller;

class LogoutController implements Controller
{
    public function processaRequisicao(): void 
    {
        $_SESSION['logado'] = false;
        header('location: /log');   
        return;
    }
}