<?php
session_start();

if( !isset($_GET["idx"]) ){
    header("Refresh: 3; url=./myCart.php");
    $objResponse['success'] = false;
    $objResponse['code'] = 400;
    $objResponse['info'] = "查無購物車編號";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

unset($_SESSION['cart'][$_GET["idx"]]);

array_values($_SESSION['cart']);

header("Refresh: 3; url=./myCart.php");
$objResponse['success'] = true;
$objResponse['code'] = 204;
$objResponse['info'] = "已刪除特定購物車商品項目";
echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
exit();