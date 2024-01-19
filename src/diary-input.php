<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>

<!-- <button onclick="location.href='diary-input.php'">NEW ADDITION</button><br> -->
<div class="ff">
<form action="diary-output.php" method="post">
    <input type="text" name="name" id="" placeholder="場所名"><br>
    <input type="date" name="date" id="today"><br><br>
    <input type="text" name="address" id="" placeholder="住所"><br>
    
    <input type="radio" name="hosi" value="1">★1
    <input type="radio" name="hosi" value="2">★2
    <input type="radio" name="hosi" value="3" checked>★3
    <input type="radio" name="hosi" value="4">★4
    <input type="radio" name="hosi" value="5">★5
    <br>

    <button type="submit">登録</button>
</form>
</div>

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
