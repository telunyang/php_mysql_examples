<?php
//啟動 session
session_start();

//引入判斷是否登入機制
require_once('./checkAdmin.php');

//引用資料庫連線
require_once('../db.inc.php');

//SQL 查詢用的陣列變數
$arrParam = [
    (int)$_GET['deleteId']
];

//找出照片連結並刪除
$sqlImg = "SELECT `itemImg` FROM `items` WHERE `itemId` = ? ";
$pdo_stmt = $pdo->prepare($sqlImg);
$pdo_stmt->execute($arrParam);
if($pdo_stmt->rowCount() > 0) {
    $row = $pdo_stmt->fetch();
    @unlink("../".$row['itemImg']);
}


//SQL 語法
$sql = "DELETE FROM `items` WHERE `itemId` = ? ";

$pdo_stmt = $pdo->prepare($sql);
$pdo_stmt->execute($arrParam);

if($pdo_stmt->rowCount() > 0) {
    header("Refresh: 3; url={$_SERVER['HTTP_REFERER']}");
    $objResponse['success'] = true;
    $objResponse['code'] = 200;
    $objResponse['info'] = "OK";
    echo json_encode($objResponse, true);
    exit();
} else {
    header("Refresh: 3; url={$_SERVER['HTTP_REFERER']}");
    $objResponse['success'] = false;
    $objResponse['code'] = 500;
    $objResponse['info'] = "Deletion action failed.";
    echo json_encode($objResponse, true);
    exit();
}