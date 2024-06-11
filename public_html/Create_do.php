<?php include 'header.php'; ?>

<h2>新增商品</h2>

<form action="/functions.php?op=create_do" method="post">


  <label >商品編號:</label>
  <input type="text" name="gem_id"><br/>

  <label >商品名稱: </label>
  <input type="text" name="gem_name" require><br/>

  <label >價格: </label>
  <input type="text"  name="price"><br/>

  <label >圖片名稱: </label>
  <input type="text"  name="image"><br/>

  <label >庫存: </label>
  <input type="text"  name="remaining"><br/>

  <br>
  <input class="buyBtn" type="submit" value="確定">

</form> 

