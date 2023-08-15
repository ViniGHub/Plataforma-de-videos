<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repo\UserRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginController implements RequestHandlerInterface
{
    use FlashMessageTrait;
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $postParams = $request->getParsedBody();
        $email = $postParams['email'];
        $password = $postParams['password'];

        $user = $this->userRepository->find($email);

        if (password_verify($password, $user->password ?? '')) {
            if (password_needs_rehash($user->password, PASSWORD_ARGON2ID)) {
                $this->userRepository->updatePassword($user->id, $password);
            }
        
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['logado'] = true;
            return new Response(302, ['location' => '/']);
        } else {
           $this->addErrorMessage('Usuário ou senha inválidos.');
            return new Response(302, ['location' => '/log']);
        }
    }
}
