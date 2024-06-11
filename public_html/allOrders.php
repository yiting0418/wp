<?php include('header.php');
include('functions.php');

//不是職員的不可以觀看訂單
if (!isStaff()) header("Location: /memberOrders.php");
?>

<h2>收到的訂單</h2>
<h3>職員的登入信箱是:<?php echo $_SESSION['email']; ?></h3>

<?php
//拿訪客的訂單資料
$orderQ = mysqli_query($dbConnection, "SELECT * FROM `order`");

while ($order = mysqli_fetch_assoc($orderQ)) {

  $gemQ = mysqli_query($dbConnection, 'SELECT * FROM `gem` WHERE gem_id=' . $order['gem_id']);
  $gem = mysqli_fetch_assoc($gemQ);
  $memberQ = mysqli_query($dbConnection, "SELECT * FROM `member` WHERE `member_email`='" . $order['client_email'] . "'");
  $member = mysqli_fetch_assoc($memberQ);

  echo '<div class="order"><p>';
  echo '客戶稱呼 : ' . $order['client_name'] . '<br/>';
  echo '客戶電郵 : ' . $order['client_email'] . '<br/>';
  echo '想預訂 : ' . $gem['name'] . '  ' . $order['quantity'] . '件 <br/>';
  echo '地址 : ' . $member['address'] . '<br/>';
  echo '電話 : ' . $member['phone'] . '<br/>';
  echo '付款方式 : ' . $member['payment'] . '<br/>';
  echo '下單時間 : ' . $order['order_time'] . '<br/>';
  echo '</p></div>';
}
/* $orderData = file_get_contents('data.csv');
$orders = str_getcsv($orderData, "\r\n"); 

//顯示所有訂單
foreach($orders as $order)
{
    //拆解每一單的幾個資料
    $singleOrder = explode(",", $order);

    echo '<div class="order"><p>';
    echo '客戶稱呼 : '.$singleOrder[1].'<br/>';
    echo '客戶電郵 : '.$singleOrder[2].'<br/>';
    echo '想預訂 : '.$gems[$singleOrder[0]-1]['name'].' X '.$singleOrder[3].'件 <br/>';
    echo '下單時間 : '.$singleOrder[4].'<br/>';
    echo '</p></div>';
}*/
?>