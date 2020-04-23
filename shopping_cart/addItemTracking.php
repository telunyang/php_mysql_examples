<?php
require_once("./checkSession.php");
require_once('./db.inc.php');

//預設訊息 (錯誤先行)
$objResponse['success'] = false;
$objResponse['code'] = 400;
$objResponse['info'] = "追蹤商品失敗";

if(!isset($_POST["itemId"])){
    header("Refresh: 3; url=./myCart.php");
    $objResponse['info'] = "請先進入商品主要頁面";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

//確認商品是否已追蹤，已追蹤就不再新增資料
$sqlItemTracking = "SELECT 1 FROM `item_tracking` WHERE `username` = '{$_SESSION["username"]}' AND `itemId` = {$_POST["itemId"]}";
$countItemTracking = $pdo->query($sqlItemTracking)->fetch(PDO::FETCH_NUM)[0];
if( $countItemTracking > 0 ){
    $objResponse['info'] = "商品已追蹤";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

//新增商品追蹤
$sqlOrder = "INSERT INTO `item_tracking` (`username`,`itemId`) VALUES (?,?)";
$stmtOrder = $pdo->prepare($sqlOrder);
$arrParamOrder = [
    $_SESSION["username"],
    $_POST["itemId"]
];
$stmtOrder->execute($arrParamOrder);

header("Refresh: 3; url=./order.php");

if($stmtOrder->rowCount() > 0) {
    $objResponse['success'] = true;
    $objResponse['code'] = 200;
    $objResponse['info'] = "追蹤商品成功";
}

echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);