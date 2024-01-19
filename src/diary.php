<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>

<a href="diary-input.php" class="btn_26">NEW ADDITION</a>

<?php
   $pdo = new PDO($connect, USER, PASS);
   foreach($pdo->query('select * from Diary') as $row){
    echo '<div class="diary-entry">';
    echo '<span>';
    echo '<b>',$row['di_name'],'</b>　　　　';
    echo '<span class="date">日付：',$row['date'],'</span><br>';
    echo '<div class="star-ratings">';
    for($i=1 ; $i<=5 ; $i++){
        if($i<=$row['hosi']){
            echo '★';
        }else if($i>$row['hosi']){
            echo '☆';
        }
    }
    echo '</div>';
    echo '<p class="address">',$row['address'],'</p>';
    echo "\n";

    echo '<form action="diary-edit.php" method="post" style="display: inline;">';
    echo '<input type="hidden" name="id" value="',$row['di_id'],'">';
    echo '<button class="action-button" type="submit">更新</button>';
    echo '</form>';

    echo '<form action="diary-delete.php" method="post" style="display: inline;">';
    echo '<input type="hidden" name="id" value="',$row['di_id'],'">';
    echo '<button class="action-button" type="submit">削除</button>';
    echo '</form>';
    echo '</span>';
    echo '</div>';

    echo '<hr>';
}

?>

<?php require 'footer.php'; ?>

<!-- <style>
    .form-inline {
        display: inline-block; /* 横に並べるためのスタイル */
        margin-right: 10px; /* フォーム間の余白 */
    }
</style> -->
