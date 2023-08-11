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

    public function updatePassword(int $id, string $password): void {
        $sqlupdate = 'UPDATE users SET password = ? where id = ?;';

        $statement = $this->pdo->prepare($sqlupdate);
        $statement->bindValue(1, password_hash($password, PASSWORD_ARGON2ID));
        $statement->bindValue(2, $id);
        $statement->execute();
    }

    public function updateLogin() {
        $sqlupdate = 'UPDATE users SET email = ?, password = ? WHERE email = ?, password = ?;';

        $statement = $this->pdo->prepare($sqlupdate);
    }

    public function addUser(User $user): bool {
        $hash = password_hash($user->password, PASSWORD_ARGON2ID);

        $sqlInsert = ('INSERT INTO users (email, password) values (?, ?);');
        $statement = $this->pdo->prepare($sqlInsert);
        $statement->bindValue(1, $user->getEmail());
        $statement->bindValue(2, $hash);

        return $statement->execute();
    }
}
