<?php
session_start();

$objResponse['success'] = false;
$objResponse['code'] = 400;
$objResponse['info'] = "查無購物車編號";

header("Refresh: 3; url=./myCart.php");

if( !isset($_GET["idx"]) ){
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

//刪除指定的索引位置
unset($_SESSION['cart'][$_GET["idx"]]);

//重建索引
$_SESSION['cart'] = array_values($_SESSION['cart']);

$objResponse['success'] = true;
$objResponse['code'] = 204;
$objResponse['info'] = "已刪除特定購物車商品項目";
echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
exit();