<?php
//啟動 session
session_start();

//引入登入判斷
require_once('./checkUsers.php');

$_SESSION['cart'][ $_POST['itemId'] ] = $_POST['checkQty'];

header("Refresh: 3; url=purchaseItems.php");
$objResponse['success'] = true;
$objResponse['code'] = 200;
$objResponse['info'] = "已加入購物車";
echo json_encode($objResponse, true);
exit();