<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\VideoRepository;
use PDO;

class LoginController implements Controller
{
    private PDO $pdo;
    public function __construct(private VideoRepository $videoRepository)
    {
        $dbPath = "../banco.sqlite";
        $this->pdo = new PDO("sqlite:$dbPath");
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $sqlSel = 'SELECT * FROM users WHERE email = ?';

        $statement = $this->pdo->prepare($sqlSel);
        $statement->bindValue(1, $email);
        $statement->execute();
        $userData = $statement->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $userData['password'] ?? '') ) {
            header('location: /?sucesso=1');
        } else {
            header('location: /log?sucesso=0');
        }
    }
}
