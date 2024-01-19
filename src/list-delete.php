<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>


<?php
   $pdo=new PDO($connect, USER, PASS);
   $sql=$pdo->prepare('delete from List where list_id=?');
   echo '<div class="list">';
   if($sql->execute([$_POST['id']])){
       echo '削除に成功しました。';
   }else{
       echo '削除に失敗しました。';
   }
   echo '</div>';
   echo '<a href="list-input.php" class="btn">一覧</a>';
   ?>

<?php require 'footer.php'; ?>