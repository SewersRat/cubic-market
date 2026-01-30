<?php

abstract class Product {
    protected int $id;
    protected string $name;
    protected float $price;
    protected string $description;

    public function __construct($id, $name, $price, $description) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function getName(): string {
        return $this->name;
    }

    abstract public function getCategory(): string;
}

