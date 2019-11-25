<?php
//引用資料庫連線
require_once('../28/28-1-1.php');

//SQL 語法
$sql = "DELETE FROM `students` WHERE `id` = ? ";

$arrParam = [
    (int)$_GET['deleteId']
];

$pdo_stmt = $pdo->prepare($sql);
$pdo_stmt->execute($arrParam);

if($pdo_stmt->rowCount() > 0) {
    header("Refresh: 3; url={$_SERVER['HTTP_REFERER']}");
    echo "刪除成功";
} else {
    header("Refresh: 3; url={$_SERVER['HTTP_REFERER']}");
    echo "刪除失敗";
}