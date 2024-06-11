<?php
session_start();
include 'stock.php';
include 'dbConnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donut</title>
  <link rel="stylesheet" href="/css/css.css">
</head>

<body>
  <div class="container">
    <ul class="title">
      <h1>甜甜圈訂購系統</h1>
    </ul>
    <nav>
      <ul class="clientMenu">
        <li><a href="/">首頁</a></li>
        <li><a href="/about.php">關於</a></li>

        <?php
        if ($_SESSION['email'] == "aa@gmail.com") {
          echo ' 
            <li><a href="/delete_do.php">刪除商品</a></li> 
            <li><a href="/Create_do.php">新增商品</a></li> 
            <li><a href="/allOrders.php">所有訂單</a></li> 
            <li><a href="/functions.php?op=logout">登出</a></li>';
        } elseif ($_SESSION['email']) {
          echo ' 
            <li><a href="/memberOrders.php">所有訂單</a></li> 
            <li><a href="/functions.php?op=logout">登出</a></li>';
        } else {
          echo ' <li><a href="/login.php">職員登入</a></li>';
          echo ' <li><a href="/member.php">會員登入</a></li>';
          echo ' <li><a href="/Create.php">創建會員</a></li>';
        }
        ?>
      </ul>
    </nav>