<?php include('header.php');
include('functions.php');
if (isStaff()) header("Location: /allOrders.php");
?>


<h3>所有訂單</h3>
<h3>登入信箱:<?php echo $_SESSION['email']; ?></h3>

<?php
//拿訪客的訂單資料
$email = $_SESSION['email'];

$orderQ = mysqli_query($dbConnection, "SELECT * FROM `order`WHERE client_email='" . $_SESSION['email'] . "'");
//$orderQ = mysqli_query($dbConnection, 'SELECT * FROM `order`WHERE client_email="sdsd@gmail.com"' );

while ($order = mysqli_fetch_assoc($orderQ)) {

  $gemQ = mysqli_query($dbConnection, 'SELECT * FROM `gem` WHERE gem_id=' . $order['gem_id']);
  $gem = mysqli_fetch_assoc($gemQ);

  echo '<div class="order"><p>';
  echo '姓名 : ' . $order['client_name'] . '<br/>';
  echo 'Email : ' . $order['client_email'] . '<br/>';
  echo '訂購商品 : ' . $gem['name'] . ' ' . $order['quantity'] . '個 <br/>';
  echo '下單時間 : ' . $order['order_time'] . '<br/>';
  echo '</p></div>';
}
