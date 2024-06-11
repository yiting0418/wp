<?php include 'header.php'; ?>

<h2>刪除商品</h2>

<form action="/functions.php?op=delete_do" method="post">


  <label>商品編號:</label>
  <input type="text" name="gem__id"><br />

  <br>
  <input class="buyBtn" type="submit" value="確定">

</form>