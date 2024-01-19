<?php
session_start();
require 'header.php';
require 'db-connect.php';

$pdo = new PDO($connect, USER, PASS);

$checkSql = $pdo->prepare('select * from Categor where cate_name = ?');
$checkSql->execute([$_POST['name']]);
echo '<div class="list">';
if(empty($_POST['name'])){
    echo 'カテゴリー名を入力してください。';
    echo '<a href="category-input.php" class="btn">戻る</a>';
}else if ($checkSql->rowCount() > 0) {
    echo '<font color="red">この値は既に存在します。</font>';
    echo '<a href="category-input.php" class="btn">戻る</a>';
} elseif ($pdo->prepare('insert into Categor (cate_name) values (?)')->execute([$_POST['name']])) {
    echo '<font color="green">追加に成功しました。</font>';
    echo '<a href="category-input.php" class="btn">一覧</a>';
}
echo '</div>';

require 'footer.php';
?>


<?php
// session_start();
// require 'header.php';
// require 'db-connect.php';

// $pdo = new PDO($connect, USER, PASS);

// $name = $_POST['name'];

// $checkSql = $pdo->prepare('SELECT * FROM Categor WHERE cate_name LIKE ?');
// $checkSql->execute(["%$name%"]);
// $rows = $checkSql->fetchAll();

// if ($rows) {
//     echo '<font color="red">類似の値が既に存在します。</font>';
// } elseif ($pdo->prepare('INSERT INTO Categor (cate_name) VALUES (?)')->execute([$name])) {
//     echo '<font color="green">追加に成功しました。</font>';
// }

// require 'footer.php';
// ?>

