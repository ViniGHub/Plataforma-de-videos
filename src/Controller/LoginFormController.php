<?php
namespace Alura\Mvc\Controller;

class LoginFormController implements Controller {
    public function processaRequisicao(): void {
        require_once '../views/login.php';
    }
}