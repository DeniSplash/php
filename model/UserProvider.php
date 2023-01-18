<?php

require_once 'User.php';

class UserProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function registerUser(User $user, string $plainPassword): bool
    {
        $isExistedStatement = $this->pdo->prepare('SELECT id FROM users WHERE username = ?');
        $isExistedStatement->execute([$user->getUsername()]);
        if ($isExistedStatement->fetch()) {
            throw new UserExistsException("Пользователь существует");
        }

        $statement = $this->pdo->prepare(
            'INSERT INTO users (username, password) VALUES (:username, :password)'
        );

        $statement->execute([
            'username' => $user->getUsername(),
            'password' => md5($plainPassword)
        ]);
        return $this->pdo->lastInsertId();
    }

    public function getByUsernameAndPassword(string $username, string $password): ?User
    {
        $statement = $this->pdo->prepare(
            'SELECT id, username FROM users WHERE username = :username AND password = :password LIMIT 1'
        );
        $statement->execute([
            'username' => $username,
            'password' => md5($password)
        ]);
        return $statement->fetchObject(User::class, [$username]) ?: null;
        
    }
}