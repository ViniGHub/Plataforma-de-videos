<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repo\VideoRepository;
use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CreateUserFormController implements RequestHandlerInterface
{
    use FlashMessageTrait;
    public function __construct(private VideoRepository $videoRepository, private Engine $templates)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (isset($_SESSION['email_ch']) && isset($_SESSION['pass_ch'])) {
            $email_ch = $_SESSION['email_ch'];
            $pass_ch = $_SESSION['pass_ch'];
            unset($_SESSION['email_ch']);
            unset($_SESSION['pass_ch']);
        }

        return new Response(200, body: $this->templates->render('create-user', ['email_ch' => $email_ch ?? '', 'pass_ch' => $pass_ch ?? '']));
    }
}
