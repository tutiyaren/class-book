<?php
use App\Book;
require '../app/books.php';

$title = $_POST['title'];
$author = $_POST['author'];
$price = $_POST['price'];

$pdo = new PDO(
    'mysql:host=mysql;dbname=bss',
    'root',
    'password'
);

$send = new Book($pdo);
$sent = $send->addBooks($title, $author, $price);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>書籍管理アプリ（class/実践課題）</title>
</head>
<body>
    <h1>書籍管理サンプル</h1>
    <section>
        <h2>投稿完了</h2>
        <button onclick="location.href='index.php'">戻る</button>
    </section>
</body>
</html>