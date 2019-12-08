<?php
//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');


//SQL 語法
$sql = "DELETE FROM `students` WHERE `id` in ? ";

$count = 0;

for($i = 0; $i < count($_POST['deleteIds']); $i++){
    $arrParam = [
        (int)$_POST['deleteIds'][$i]
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParam);
    $count += $stmt->rowCount();
}

if($count > 0) {
    header("Refresh: 3; url=./admin.php");
    echo "刪除成功";
} else {
    header("Refresh: 3; url=./admin.php");
    echo "刪除失敗";
}