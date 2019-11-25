<?php
//啟動 session
session_start();

//引入判斷是否登入機制
require_once('./checkAdmin.php');

//引用資料庫連線
require_once('../db.inc.php');

//回傳狀態
$objResponse = [];

//用在繫結 SQL 用的陣列
$arrParam = [];


//SQL 語法
$sql = "UPDATE `items` SET ";

//itemName SQL 語句和資料繫結
$sql.= "`itemName` = ? ,";
$arrParam[] = $_POST['itemName'];


if( $_FILES["itemImg"]["error"] === 0 ) {
    //若上傳成功，則將上傳檔案從暫存資料夾，移動到指定的資料夾或路徑
    if( move_uploaded_file($_FILES["itemImg"]["tmp_name"], "../files/".$_FILES["itemImg"]["name"]) ) {
        //itemImg SQL 語句和資料繫結
        $sql.= "`itemImg` = ? ,";
        $arrParam[] = "files/".$_FILES["itemImg"]["name"];
    }
}

//itemPric SQL 語句和資料繫結
$sql.= "`itemPrice` = ? ,";
$arrParam[] = $_POST['itemPrice'];

//itemQty SQL 語句和資料繫結
$sql.= "`itemQty` = ? ";
$arrParam[] = $_POST['itemQty'];


$sql.= "WHERE `itemId` = ? ";
$arrParam[] = $_POST['pk'];


$pdo_stmt = $pdo->prepare($sql);
$pdo_stmt->execute($arrParam);


if( $pdo_stmt->rowCount()> 0 ){
    header("Refresh: 3; url={$_SERVER['HTTP_REFERER']}");
    $objResponse['success'] = true;
    $objResponse['code'] = 200;
    $objResponse['info'] = "ok";
    echo json_encode($objResponse, true);
    exit();
} else {
    header("Refresh: 3; url={$_SERVER['HTTP_REFERER']}");
    $objResponse['success'] = false;
    $objResponse['code'] = 410;
    $objResponse['info'] = "Updating action failed.";
    echo json_encode($objResponse, true);
    exit();
}