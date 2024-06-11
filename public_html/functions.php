<?php
include 'dbConnect.php';

$op ='none';
if(isset($_GET['op'])) $op = $_GET['op'];

if($op=='createMember')
{
    createMember();
}
if($op=='create_do')
{
    create_do();
}
if($op=='delete_do')
{
    delete_do();
}
if($op=='createOrder')
{
    createOrder();
}
if($op=='checkLogin_staff')
{
    checkLogin($_POST['email'],$_POST['password'],2);
}
if($op=='checkLogin1_member')
{
    checkLogin($_POST['email'],$_POST['password'],1);
}

if($op=='logout')
{
    logout();
}

function isStaff()
{
    global $dbConnection;
    $staffQ1 = mysqli_query($dbConnection, "SELECT * FROM `staff` WHERE `email`='".$_SESSION['email']."'");
    $staff1 = mysqli_fetch_assoc($staffQ1);
    $staff_member= NULL;

    if($_SESSION['email'] == $staff1['email']){
        $staff_member= $_SESSION['email'];
    }

    return isset($staff_member);
}
function logout()
{
    session_start();
    session_destroy();
    header("Location: /");
}
function checkLogin($email, $password,$member)
{
    global $dbConnection;
    
    if($member==1 )
    {
        $staffQ = mysqli_query($dbConnection, "SELECT * FROM `member` WHERE `member_email`='".$email."'");
    }
    elseif($member==2 )
    {
        $staffQ = mysqli_query($dbConnection, "SELECT * FROM `staff` WHERE `email`='".$email."'");
    }
    else
    {
        $staffQ=NULL;
    }

    $staff = mysqli_fetch_assoc($staffQ);

    if($email == $staff['member_email'] && $staff['member_password'] == $password)
    {
        session_start();
        $_SESSION['email'] = $email;

        if($_SESSION['email'] == NULL)
        {
            header("Location: /member.php");
            session_destroy();           
        }
        else
        {                
            header("Location: /");
        }       
    }
    elseif($email == $staff['email'] && $staff['password'] == $password)
    {
        session_start();
        $_SESSION['email'] = $email;

        if($_SESSION['email'] == NULL)
        {
            header("Location: /login.php");
            session_destroy();           
        }
        else
        {                
            header("Location: /");
        }
    }
    else
    {
        if($member==1 )
        {
            header("Location: /about copy.php");
        }
        elseif($member==2)
        {
            header("Location: /login.php");
        }
    }
}
function createOrder(){

    global $dbConnection;
    if (empty($_POST['name'])){
        header("Location: /error.php");}
    else if (empty($_POST['address'])){
      //edit
      echo'<script language="JavaScript">;alert("請先登入!");window.location.assign("https://dooooonut.000webhostapp.com/member.php");</script>';
    }
    //儲存
    else{
        $sql = "INSERT INTO `id21649364_aa`.`order` (
        `client_name`, 
        `client_email`,
         `quantity`, 
         `order_time`, 
         `gem_id`
         ) VALUES (
         '{$_POST['name']}', 
         '{$_POST['email']}',
         {$_POST['quantity']}, 
         '".date('Y-m-d H:i:s')."',
         {$_POST['gem_id']})";
    
    if(mysqli_query($dbConnection, $sql))
    {
        header("Location: /order-completed.php");
    }
    else{
        header("Location: /login.php");
        
    }}}
    

function createMember(){

    global $dbConnection;

    //儲存
    $sql = "INSERT INTO `id21649364_aa`.`member` (
        `member_email`,`member_password`,`member_name`,`phone`,`address`,`payment`
         ) VALUES (
         '{$_POST['member_email']}',
         '{$_POST['member_password']}',
         '{$_POST['member_name']}',
         '{$_POST['phone']}',
         '{$_POST['address']}',
         '{$_POST['payment']}'
         )";

    //寫入MySQL資料庫
    if(mysqli_query($dbConnection, $sql))
    {
       
        header("Location: /member.php");
    }
    else{
        header("Location: /Create.php");
        
    }

    
}
function create_do(){

    global $dbConnection;

    //儲存
    $sql = "INSERT INTO `id21649364_aa`.`gem` (
        `gem_id`,`name`,`price`,`image`,`remaining`
         ) VALUES (
         '{$_POST['gem_id']}',
         '{$_POST['gem_name']}',
         '{$_POST['price']}',
         '{$_POST['image']}',
         '{$_POST['remaining']}'
         )";
    if(mysqli_query($dbConnection, $sql))
    {
      
        header("Location: /header.php");
    }
    else{
        header("Location: /create_do.php");
        
    }
    
}
function delete_do(){

    global $dbConnection;

    //儲存
    $sql = "DELETE FROM `gem` WHERE `gem_id`= '{$_POST['gem__id']}'";
    if(mysqli_query($dbConnection, $sql))
    {
    
        header("Location: /header.php");
    }
    else{
        header("Location: /create_do.php");
        
    }
    
}