<?php
namespace Alura\Mvc\Controller;

class LogoutController implements Controller
{
    public function processaRequisicao(): void 
    {
        unset($_SESSION['logado']);
        header('location: /log');   
        return;
    }
}