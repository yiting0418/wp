<?php
$dbConnection = mysqli_connect("localhost", "id21649364_root", "@O978o81366", "id21649364_aa");

//檢查連線是否成功
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

//echo "成功連線";

//將文字編碼設為UTF-8以正確顯示中文
mysqli_set_charset($dbConnection, "utf8");
