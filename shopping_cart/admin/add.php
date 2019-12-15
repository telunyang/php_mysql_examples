<?php
require_once('./checkAdmin.php'); //引入登入判斷
require_once('../db.inc.php'); //引用資料庫連線

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

//回傳狀態
$objResponse = [];

if( $_FILES["itemImg"]["error"] === 0 ) {
    //為上傳檔案命名
    $strDatetime = "item_".date("YmdHis");
        
    //找出副檔名
    $extension = pathinfo($_FILES["itemImg"]["name"], PATHINFO_EXTENSION);

    //建立完整名稱
    $itemImg = $strDatetime.".".$extension;

    //若上傳失敗，則回報錯誤訊息
    if( !move_uploaded_file($_FILES["itemImg"]["tmp_name"], "../images/items/{$itemImg}") ) {
        $objResponse['success'] = false;
        $objResponse['code'] = 500;
        $objResponse['info'] = "上傳圖片失敗";
        echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
        exit();
    }
}

//SQL 敘述
$sql = "INSERT INTO `items` (`itemName`, `itemImg`, `itemPrice`, `itemQty`, `itemCategoryId`) 
        VALUES (?, ?, ?, ?, ?)";

//繫結用陣列
$arrParam = [
    $_POST['itemName'],
    $itemImg,
    $_POST['itemPrice'],
    $_POST['itemQty'],
    $_POST['itemCategoryId']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if($stmt->rowCount() > 0) {
    header("Refresh: 3; url=./admin.php");
    $objResponse['success'] = true;
    $objResponse['code'] = 200;
    $objResponse['info'] = "新增成功";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
} else {
    header("Refresh: 3; url=./admin.php");
    $objResponse['success'] = false;
    $objResponse['code'] = 500;
    $objResponse['info'] = "沒有新增資料";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}