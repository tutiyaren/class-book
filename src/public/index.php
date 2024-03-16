<?php
use App\Book;
require '../app/books.php';

$pdo = new PDO(
    'mysql:host=mysql;dbname=bss',
    'root',
    'password'
);

$send = new Book($pdo);
$books = $send->getBooks();

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
        <h2>新規投稿</h2>
        <form action="send.php" method="post">
            タイトル: <input type="text" name="title" value=""><br>
            著者: <input type="text" name="author" value=""><br>
            金額: <input type="text" name="price" value=""><br>
            <button type="submit">投稿</button>
        </form>
    </section>
    <section>
        <h2>投稿内容一覧</h2>
        <?php foreach($books as $book): ?>
            <div>No: <?php echo $book['id']?></div>
            <div>タイトル：<?php echo $book['title']?></div>
            <div>著者：<?php echo $book['author']?></div>
            <div>金額：<?php echo $book['price']?>円</div>
            <div>------------------------------------------</div>
        <?php endforeach?>
    </section>

</body>
</html>