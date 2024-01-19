<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>

<!-- <button onclick="location.href='diary-input.php'">NEW ADDITION</button><br> -->
<?php
$pdo = new PDO($connect, USER, PASS);
$sql=$pdo->prepare('insert into Diary(di_name,address,date,hosi) values (?,?,?,?)');
echo '<div class="list">';
if(empty($_POST['name'])){
    echo '場所名を入力してください。';
    echo '<a href="diary-input.php" class="btn">戻る</a>';
}else if(empty($_POST['address'])){
    echo '住所を入力してください。';
    echo '<a href="diary-input.php" class="btn">戻る</a>';
}else if(empty($_POST['hosi'])){
    echo '★を選択してください。';
    echo '<a href="diary-input.php" class="btn">戻る</a>';
}else if($sql->execute([$_POST['name'],$_POST['address'],$_POST['date'],$_POST['hosi']])){
    echo '<font color="green">追加に成功しました。</font><br>';
    echo '<a href="diary.php" class="btn">一覧</a>';
}else{
    echo '<font color="green">追加に失敗しました。</font>';
    echo '<a href="diary-input.php" class="btn">戻る</a>';
}
echo '</div>';
?>
<?php require 'footer.php'; ?>