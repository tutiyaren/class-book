<?php
namespace App;
use PDO;

interface BookInterface
{
    public function getBooks(): array;
    public function addBooks(string $title, string $author, string $price): void;
}

abstract class AbstractBook implements BookInterface
{
    protected PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}

class Book extends AbstractBook
{
    public function getBooks(): array
    {
        $smt = $this->pdo->query("SELECT * FROM books");
        return $smt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addBooks(string $title, string $author, string $price): void
    {
        date_default_timezone_set('Asia/Tokyo');
        $created_at = date("Y-m-d H:i:s");

        $smt = $this->pdo->prepare("INSERT INTO books(title, author, price, created_at) VALUES (:title, :author, :price, :created_at)");
        $smt->bindParam(":title", $title);
        $smt->bindParam(":author", $author);
        $smt->bindParam(":price", $price);
        $smt->bindParam(":created_at", $created_at);
        $smt->execute();
    }
}
