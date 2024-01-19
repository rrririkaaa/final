<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>

<?php
  $pdo = new PDO($connect, USER, PASS);
  echo '<div class="ff">';
  echo '<form action="category-output.php" method="post">';
  echo '<input type="text" name="name" placeholder="ADD CATEGORY">';
  echo '<button type="submit">追加</button>';
  echo '</form>';
  echo '</div>';
  echo '<hr>';
  echo '<div class="category-list">';
  echo '<b>CATEGORY</b>';
  foreach($pdo->query('select * from Categor') as $row){
    echo '<br>・',$row['cate_name'];
    echo "\n";
}
  echo '</div>';
?>


<?php require 'footer.php'; ?>