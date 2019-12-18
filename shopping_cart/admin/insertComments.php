<?php
require_once('./checkAdmin.php'); //引入登入判斷
require_once('../db.inc.php'); //引用資料庫連線

$sql = "INSERT INTO `comments` (`name`, `content`, `rating`, `parentId`, `itemId`) VALUES (?,?,?,?,?)";
$stmt = $pdo->prepare($sql);
$arrParam = [
    $_POST['name'], 
    $_POST['content'],
    0,
    $_POST['parentId'],
    $_POST['itemId']
];
$stmt->execute($arrParam);
if($stmt->rowCount() > 0) {
    header("Refresh: 3; url=./comments.php?itemId={$_POST['itemId']}");
    $objResponse['success'] = true;
    $objResponse['code'] = 200;
    $objResponse['info'] = "新增成功";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
} else {
    header("Refresh: 3; url=./comments.php?itemId={$_POST['itemId']}");
    $objResponse['success'] = false;
    $objResponse['code'] = 400;
    $objResponse['info'] = "新增失敗";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}