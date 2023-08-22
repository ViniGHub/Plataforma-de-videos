<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\entity\User;
use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repo\UserRepository;
use Alura\Mvc\Repo\VideoRepository;
use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CreateUserController implements RequestHandlerInterface
{
    use FlashMessageTrait;
    public function __construct(private UserRepository $userRepository, private Engine $templates)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $postParams = $request->getParsedBody();
        $email = $postParams['email'];
        $password = $postParams['password'];

        if ($this->userRepository->find($email)) {
            $this->addErrorMessage('Nome de usuario já está em uso.');
            $_SESSION['email_ch'] = $email;
            $_SESSION['pass_ch'] = $password;

            return new Response(302, ['location' => '/create-login']);
        }

        $result = $this->userRepository->addUser(new User($email, $password));

        if ($result) {
            return new Response(302, ['location' => '/log']);
        }

        $this->addErrorMessage('Não foi possivel criar o usúario.');
        $_SESSION['email_ch'] = $email;
        $_SESSION['pass_ch'] = $password;

        return new Response(302, ['location' => '/create-login']);
    }
}
