<?php
require_once('./checkAdmin.php'); //引入登入判斷
require_once('../db.inc.php'); //引用資料庫連線

$count = 0;

for($i = 0; $i < count($_POST['chk']); $i++){
    //加入繫結陣列
    $arrParam = [
        $_POST['chk'][$i]
    ];

    //找出特定 multipleImageId 的資料
    $sqlImg = "SELECT `multipleImageImg` FROM `multiple_images` WHERE `multipleImageId` = ? ";
    $stmt_img = $pdo->prepare($sqlImg);
    $stmt_img->execute($arrParam);

    //有資料，則進行檔案刪除
    if($stmt_img->rowCount() > 0) {
        //取得檔案資料 (單筆)
        $arr = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
        
        //刪除檔案
        $bool = unlink("../images/multiple_images/".$arr[0]['multipleImageImg']);

        //若檔案刪除成功，則刪除資料
        if($bool === true){
            //SQL 語法
            $sql = "DELETE FROM `multiple_images` WHERE `multipleImageId` = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($arrParam);

            //累計每次刪除的次數
            $count += $stmt->rowCount();
        };
    }
}

if($count > 0) {
    header("Refresh: 3; url=./multipleImages.php?itemId={$_POST["itemId"]}");
    $objResponse['success'] = true;
    $objResponse['code'] = 204;
    $objResponse['info'] = "刪除成功";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
} else {
    header("Refresh: 3; url=./multipleImages.php?itemId={$_POST["itemId"]}");
    $objResponse['success'] = false;
    $objResponse['code'] = 500;
    $objResponse['info'] = "刪除失敗";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}