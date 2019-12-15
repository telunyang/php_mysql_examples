<?php
require_once('./checkAdmin.php'); //引入登入判斷
require_once('../db.inc.php'); //引用資料庫連線

$objResponse = [];

//若沒填寫商品種類時的行為
if( $_POST['categoryName'] == '' ){
    header("Refresh: 3; url=./editCategory.php?editCategoryId={$_POST["editCategoryId"]}");
    $objResponse['success'] = false;
    $objResponse['code'] = 400;
    $objResponse['info'] = "請填寫商品種類";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

$sql = "UPDATE `categories` SET `categoryName` = ? WHERE `categoryId` = ?";
$stmt = $pdo->prepare($sql);
$arrParam = [
    $_POST['categoryName'], 
    $_POST["editCategoryId"]
];
$stmt->execute($arrParam);
if($stmt->rowCount() > 0) {
    header("Refresh: 3; url=./editCategory.php?editCategoryId={$_POST["editCategoryId"]}");
    $objResponse['success'] = true;
    $objResponse['code'] = 204;
    $objResponse['info'] = "更新成功";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
} else {
    header("Refresh: 3; url=./editCategory.php?editCategoryId={$_POST["editCategoryId"]}");
    $objResponse['success'] = false;
    $objResponse['code'] = 400;
    $objResponse['info'] = "沒有任何更新";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}