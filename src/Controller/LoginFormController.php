<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\VideoRepository;

class LoginFormController extends ControllerHtml implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        if (array_key_exists('logado', $_SESSION)) {
            if ($_SESSION['logado']) {
                header('location: /');
                return;
            }
        }

        echo $this->renderTemplate('login', []);
    }
}
