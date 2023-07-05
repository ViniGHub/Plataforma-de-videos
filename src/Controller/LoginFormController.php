<?php
namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\VideoRepository;

class LoginFormController implements Controller {
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void {
        require_once '../views/login.php';
    }
}