<?php
session_start();

//引入登入判斷
require_once('./checkAdmin.php');

//引用資料庫連線
require_once('../db.inc.php');

//整理取得的 http request body
$itemName = $_POST['itemName'];
$itemPrice = $_POST['itemPrice'];
$itemQty = $_POST['itemQty'];

//回傳狀態
$objResponse = [];

if( $_FILES["itemImg"]["error"] === 0 ) {
    //若上傳成功，則將上傳檔案從暫存資料夾，移動到指定的資料夾或路徑
    if( !move_uploaded_file($_FILES["itemImg"]["tmp_name"], "../files/".$_FILES["itemImg"]["name"]) ) {
        $objResponse['success'] = false;
        $objResponse['code'] = 500;
        $objResponse['info'] = "Uploding image failed.";
        echo json_encode($objResponse, true);
        exit();
    }
}

//SQL 敘述
$sql = "INSERT INTO `items` (`itemName`, `itemImg`, `itemPrice`, `itemQty`) ";
$sql.= "VALUES (?, ?, ?, ?)";

//繫結用陣列
$arr = [
    $itemName,
    "files/".$_FILES["itemImg"]["name"],
    $itemPrice,
    $itemQty
];

$pdo_stmt = $pdo->prepare($sql);
$pdo_stmt->execute($arr);
if($pdo_stmt->rowCount() === 1) {
    header("Refresh: 3; url={$_SERVER['HTTP_REFERER']}");
    $objResponse['success'] = true;
    $objResponse['code'] = 200;
    $objResponse['info'] = "ok";
    echo json_encode($objResponse, true);
    exit();
} else {
    header("Refresh: 3; url={$_SERVER['HTTP_REFERER']}");
    $objResponse['success'] = false;
    $objResponse['code'] = 500;
    $objResponse['info'] = "Insertion action failed.";
    echo json_encode($objResponse, true);
    exit();
}