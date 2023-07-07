<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\UserRepository;

class LoginController implements Controller
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $user = $this->userRepository->find($email);

        if (password_verify($password, $user->password ?? '')) {
            $_SESSION['logado'] = true;
            header('location: /?sucesso=1');
        } else {
            header('location: /log?sucesso=0');
        }
    }
}
