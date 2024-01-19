<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>


<?php
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from Diary where di_id=?');
$sql->execute([$_POST['id']]);
echo '<div class="ff">';
foreach ($sql as $row) {
    echo '<form action="diary-edit2.php" method="post">';
    echo '<input type="hidden" name="id" value="',$row['di_id'],'">';
    echo '<input type="text" name="name" value="', $row['di_name'], '">';
    echo '<input type="text" name="address" value="', $row['address'], '">';
    echo '<input type="date" name="date" id="today" value="', $row['date'], 'id=""><br>';
    echo '<input type="radio" name="hosi" value="1">★1',
         '<input type="radio" name="hosi" value="2">★2',
         '<input type="radio" name="hosi" value="3" checked>★3',
         '<input type="radio" name="hosi" value="4">★4',
         '<input type="radio" name="hosi" value="5">★5<br>';
    echo '<button type="submit">更新</button>';
    echo '</form>';
    echo "\n";
}
echo '</div>';
?>

<script type="text/javascript">
  window.onload = function () {
    var today = new Date();
    today.setDate(today.getDate());
    var yyyy = today.getFullYear();
    var mm = ("0" + (today.getMonth() + 1)).slice(-2);
    var dd = ("0" + today.getDate()).slice(-2);
    document.getElementById("today").value = yyyy + '-' + mm + '-' + dd;
  }
</script>


<?php require 'footer.php'; ?>