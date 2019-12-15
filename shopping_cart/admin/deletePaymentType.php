<?php
require_once('./checkAdmin.php'); //引入登入判斷
require_once('../db.inc.php'); //引用資料庫連線


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();


$count = 0;

for($i = 0; $i < count($_POST['chk']); $i++){
    //加入繫結陣列
    $arrParam = [
        $_POST['chk'][$i]
    ];

    //找出特定 paymentTypeId 的資料
    $sqlImg = "SELECT `paymentTypeImg` FROM `payment_types` WHERE `paymentTypeId` = ? ";
    $stmt_img = $pdo->prepare($sqlImg);
    $stmt_img->execute($arrParam);

    //有資料，則進行檔案刪除
    if($stmt_img->rowCount() > 0) {
        //取得檔案資料 (單筆)
        $arr = $stmt_img->fetchAll();
        
        //刪除檔案
        $bool = unlink("../images/payment_types/".$arr[0]['paymentTypeImg']);

        //若檔案刪除成功，則刪除資料
        if($bool === true){
            //SQL 語法
            $sql = "DELETE FROM `payment_types` WHERE `paymentTypeId` = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($arrParam);

            //累計每次刪除的次數
            $count += $stmt->rowCount();
        };
    }
}

if($count > 0) {
    header("Refresh: 3; url=./paymentType.php");
    $objResponse['success'] = true;
    $objResponse['code'] = 204;
    $objResponse['info'] = "刪除成功";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
} else {
    header("Refresh: 3; url=./paymentType.php");
    $objResponse['success'] = false;
    $objResponse['code'] = 500;
    $objResponse['info'] = "刪除失敗";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}