<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>

<div class="text"><h3><b>持ち物をチェックしよう！</b></h3></div>
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
        echo '<div class="text2">';
        echo '<input type="checkbox" name="list" value="', $listItem['list_name'], '" id="">', $listItem['list_name'];
        echo '</div>';
    }

    echo '</td>';
    echo '</tr>';
    echo "\n";
}
?>
</table>

<?php require 'footer.php'; ?>
