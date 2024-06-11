<?php

   echo "這是 AppServ 主網站 <br>";

   $db_link= mysqli_connect("localhost", "id21649364_root", "@O978o81366", "id21649364_aa")

              or die("MySQL 伺服器連結失敗 <br>");

       echo "id21649364_aa 資料庫開啟成功 <br>";

       mysqli_close($db_link);

?>