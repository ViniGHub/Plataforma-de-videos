<?php
namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\UserRepository;
use League\Plates\Engine as PlatesEngine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ChangeUserController implements RequestHandlerInterface {

    public function __construct(private UserRepository $userRepository, private PlatesEngine $templates)
    {
    }
    public function handle(ServerRequestInterface $request): ResponseInterface {
        $postParams = $request->getParsedBody();

        return new Response(302, ['location' => '/']);
    }
}