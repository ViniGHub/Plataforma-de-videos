<?php

namespace Alura\Mvc\Repo;

use Alura\Mvc\entity\User;
use PDO;

class UserRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function find(string $email): ?User
    {
        $sqlSel = 'SELECT * FROM users WHERE email = ?';

        $statement = $this->pdo->prepare($sqlSel);
        $statement->bindValue(1, $email);
        $statement->execute();
        $userData = $statement->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            $user = new User($userData['email'], $userData['password']);
            return $user;
        }

        return null;
    }
}
