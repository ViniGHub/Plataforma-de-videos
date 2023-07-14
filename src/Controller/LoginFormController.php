<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\HtmlRendererTrait;
use Alura\Mvc\Repo\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginFormController implements RequestHandlerInterface
{
    use HtmlRendererTrait;
    // public function __construct(private VideoRepository $videoRepository)
    // {
    // }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (array_key_exists('logado', $_SESSION)) {
            if ($_SESSION['logado']) {
                return new Response(302, ['location' => '/']);
            }
        }

        return new Response(200, body: $this->renderTemplate('login', []));
    } 
}
