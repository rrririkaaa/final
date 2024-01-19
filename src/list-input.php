<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>


   <?php
   $pdo = new PDO($connect, USER, PASS);

   echo '<div class="ff">';
   echo '<form action="list-output.php" method="post">';
   echo '<input type="text" name="name" id="" placeholder="追加する持ち物">';
   echo '<select name="category">';
   foreach ($pdo->query(' select * from Categor ') as $row) {
   echo '<option value="',$row['cate_id'], '">',$row['cate_name'],'</option>';
   }
   echo '</select>';
   echo '<button type="submit">追加</button>';
   echo '</form>';
   echo '</div>';
   ?>

<hr>
<table border="1">
    <tr>
        <th> CATEGORY </th>
        <th> LIST </th>
    </tr>

<?php
$pdo = new PDO($connect, USER, PASS);
foreach ($pdo->query('select * from Categor') as $row) {
    echo '<tr>';
    echo '<th>', $row['cate_name'], '</th>';
    echo '<td>';

    // Fetch items for each category
    $listSql = $pdo->prepare('select * from List where cate_id = ?');
    $listSql->execute([$row['cate_id']]);
    foreach ($listSql as $listItem) {
        
        echo '・', $listItem['list_name'];
        echo '<div class="text1">';
        echo '<form action="list-delete.php" method="post" style="display: inline;">';
        echo '<input type="hidden" name="id" value="',$listItem['list_id'],'">';
        echo '<button type="submit" class="button2">削除</button>';
        echo '</form>';
        echo '<br>';
        echo '</div>';
    }

    echo '</td>';
    echo '</tr>';
    echo "\n";
}
?>



<?php require 'footer.php'; ?>
