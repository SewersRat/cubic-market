<?php

class User {
    protected int $id;
    protected string $pseudo;
    protected string $email;
    protected string $role;

    public function __construct($id, $pseudo, $email, $role = 'ROLE_USER') {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->role = $role;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getPseudo(): string {
        return $this->pseudo;
    }

    public function getRole(): string {
        return $this->role;
    }
}
