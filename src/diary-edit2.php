<?php
session_start();
require 'header.php';
require 'db-connect.php';


    $pdo=new PDO($connect, USER, PASS);
    // SQL発行準備 prepareメソッド　作成２
    $sql=$pdo->prepare('update Diary set di_name=?, address=?, date=?, hosi=? where di_id=?');
    echo '<div class="list">';
    if (empty($_POST['name'])) {
        echo '場所名を入力してください。';
    } else if (empty($_POST['address'])) {
        echo '住所を入力してください。';
    } else if (empty($_POST['date'])) {
        echo '日付を入力してください。';
    } else if($sql->execute([htmlspecialchars($_POST['name']),$_POST['address'],$_POST['date'],$_POST['hosi'],$_POST['id']])){
        echo '更新に成功しました。';
    }else{
        echo '更新に失敗しました。';
    }  
    echo '</div>';
    echo '<a href="diary.php" class="btn">一覧</a>';
 
require 'footer.php'; ?>
