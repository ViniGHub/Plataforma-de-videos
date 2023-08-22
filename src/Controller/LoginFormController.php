<?php

namespace Alura\Mvc\Controller;

use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginFormController implements RequestHandlerInterface
{
    public function __construct(private Engine $templates)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (array_key_exists('logado', $_SESSION)) {
            if ($_SESSION['logado']) {
                return new Response(302, ['location' => '/']);
            }
        }

        if (isset($_SESSION['email_ch']) && isset($_SESSION['pass_ch'])) {
            $email_ch = $_SESSION['email_ch'];
            $pass_ch = $_SESSION['pass_ch'];
            unset($_SESSION['email_ch']);
            unset($_SESSION['pass_ch']);
        }


        return new Response(200, body: $this->templates->render('login', ['email_ch' => $email_ch ?? '', 'pass_ch' => $pass_ch ?? '']));
    } 
}
