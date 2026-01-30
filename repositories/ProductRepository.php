<?php

class ProductRepository {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function findAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM products");
        return $stmt->fetchAll();
    }

    public function create($name, $price, $description, $category): void {
        $stmt = $this->pdo->prepare(
            "INSERT INTO products (name, price, description, category)
             VALUES (:name, :price, :description, :category)"
        );
        $stmt->execute(compact('name', 'price', 'description', 'category'));
    }
}
