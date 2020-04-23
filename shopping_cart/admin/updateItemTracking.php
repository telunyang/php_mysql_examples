<?php
//引入判斷是否登入機制
require_once('./checkAdmin.php');

//引用資料庫連線
require_once('../db.inc.php');

//預設訊息 (錯誤先行)
$objResponse['success'] = false;
$objResponse['code'] = 400;
$objResponse['info'] = "並未更新商品追蹤訊息";

if( !isset($_POST['pk']) ){
    $objResponse['info'] = "沒有商品追蹤編號";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

//切割 primary key 的字串成陣列
$arrPk = explode(",", $_POST['pk']);

//SQL 語法
$sql = "UPDATE `item_tracking` SET `msg` = ? WHERE `id` = ? ";

//更新筆數
$count = 0;

for($i = 0; $i < count($arrPk); $i++) {
    $arrParam = [
        $_POST['msg_' . $arrPk[$i]],
        $arrPk[$i],
    ];

    $pdo_stmt = $pdo->prepare($sql);
    $pdo_stmt->execute($arrParam);
    $count += $pdo_stmt->rowCount();
}


header("Refresh: 3; url={$_SERVER['HTTP_REFERER']}");
if( $count > 0 ){
    $objResponse['success'] = true;
    $objResponse['code'] = 204;
    $objResponse['info'] = "更新商品追蹤訊息成功";
}

echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);