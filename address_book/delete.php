<?php
//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');

//SQL 語法
$sql = "DELETE FROM `students` WHERE `id` = ? ";

$arrParam = [
    (int)$_GET['deleteId']
];

$pdo_stmt = $pdo->prepare($sql);
$pdo_stmt->execute($arrParam);

if($pdo_stmt->rowCount() > 0) {
    header("Refresh: 3; url=./admin.php");
    echo "刪除成功";
} else {
    header("Refresh: 3; url=./admin.php");
    echo "刪除失敗";
}