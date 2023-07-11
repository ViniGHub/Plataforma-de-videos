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
            if (password_needs_rehash($user->password, PASSWORD_ARGON2ID)) {
                $this->userRepository->updatePassword($user->id, $password);
            }

            $_SESSION['logado'] = true;
            header('location: /');
        } else {
            $_SESSION['error_message'] = 'Usuário ou senha inválidos.';
            header('location: /log');
        }
    }
}
