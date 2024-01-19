<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>


<?php
$pdo = new PDO($connect, USER, PASS);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['name'])) {
        echo '<div class="list">';
        echo '名前を入力してください。';
        echo '<a href="list-input.php" class="btn">戻る</a>';
        echo '</div>';
    } else {
        echo '<div class="list">';
        $sql = $pdo->prepare('INSERT INTO List (list_name, cate_id) VALUES (?, ?)');
        if ($sql->execute([$_POST['name'], $_POST['category']])) {
            echo '<font color="green" >追加しました。</font>';
            echo '<a href="list-input.php" class="btn">一覧</a>';
        } else {
            echo '<font color="red" >追加に失敗しました。</font>';
            echo '<a href="list-input.php" class="btn">一覧</a>';
        }
        echo '</div>';
    }
}
?>


<?php require 'footer.php'; ?>
