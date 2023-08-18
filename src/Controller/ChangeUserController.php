<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\EncryptingPass;
use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repo\UserRepository;
use League\Plates\Engine as PlatesEngine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ChangeUserController implements RequestHandlerInterface
{

    use FlashMessageTrait;
    public function __construct(private UserRepository $userRepository, private PlatesEngine $templates)
    {
    }
    public function handle(ServerRequestInterface $request): ResponseInterface
    {


        $postParams = $request->getParsedBody();
        $newEmail = $postParams['new_email'];
        $newPass = $postParams['new_password1'];

        $result = $this->userRepository->updateLogin($newEmail, $newPass);

        if ($result) {
            $_SESSION['email'] = $newEmail;
            $_SESSION['password'] = EncryptingPass::encrypt($newPass, 'VibePass');
            return new Response(302, ['location' => '/']);
        } else {
            $this->addErrorMessage('Erro ao mudar login.');
            return new Response(302, ['location' => '/change-login']);
        }
    }
}
