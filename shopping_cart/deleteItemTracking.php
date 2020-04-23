<?php
//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');

$objResponse['success'] = false;
$objResponse['code'] = 400;
$objResponse['info'] = "查無商品追蹤編號";

header("Refresh: 3; url=./itemTracking.php");

//沒有商品追蹤編號就擋掉
if(!isset($_GET['deleteItemTrackingId'])){
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

//SQL 語法
$sql = "DELETE FROM `item_tracking` WHERE `id` = ? ";
$stmt = $pdo->prepare($sql);
$arrParam = [(int)$_GET['deleteItemTrackingId']];
$stmt->execute($arrParam);
if($stmt->rowCount() > 0){
    $objResponse['success'] = true;
    $objResponse['code'] = 204;
    $objResponse['info'] = "已刪除商品追蹤";
}

echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);