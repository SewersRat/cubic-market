<?php

class UserRepository {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function create(string $pseudo, string $email, string $password): void {
        $sql = "INSERT INTO users (pseudo, email, password, role)
                VALUES (:pseudo, :email, :password, 'ROLE_USER')";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    public function findByEmail(string $email): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}

