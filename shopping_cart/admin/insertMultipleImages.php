<?php
require_once('./checkAdmin.php'); //引入登入判斷
require_once('../db.inc.php'); //引用資料庫連線

//回傳狀態
$objResponse = [];

$count = 0;

//使用迴圈走訪陣列元素
for($i = 0; $i < count($_FILES["multipleImageImg"]["name"]); $i++){
    //判斷上傳是否成功 (error === 0)
    if( $_FILES["multipleImageImg"]["error"][$i] === 0 ) {
        //為上傳檔案命名
        $strDatetime = "multiple_images_".date("YmdHis")."_".$i;
            
        //找出副檔名
        $extension = pathinfo($_FILES["multipleImageImg"]["name"][$i], PATHINFO_EXTENSION);

        //建立完整名稱
        $multipleImageImg = $strDatetime.".".$extension;

        //若上傳成功，則將上傳檔案從暫存資料夾，移動到指定的資料夾或路徑
        if( !move_uploaded_file($_FILES["multipleImageImg"]["tmp_name"][$i], "../images/multiple_images/{$multipleImageImg}") ) {
            header("Refresh: 3; url=./multipleImages.php?itemId={$_POST["itemId"]}");
            $objResponse['success'] = false;
            $objResponse['code'] = 500;
            $objResponse['info'] = "上傳圖片失敗";
            echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
            exit();
        }
    }

    //SQL 敘述
    $sql = "INSERT INTO `multiple_images` (`multipleImageImg`,`itemId`) VALUES (?, ?)";

    //繫結用陣列
    $arrParam = [
        $multipleImageImg,
        $_POST["itemId"]
    ];

    $stmt = $pdo->prepare($sql);
    $count += $stmt->execute($arrParam);
}

if($count > 0) {
    header("Refresh: 3; url=./multipleImages.php?itemId={$_POST["itemId"]}");
    $objResponse['success'] = true;
    $objResponse['code'] = 200;
    $objResponse['info'] = "新增成功";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
} else {
    header("Refresh: 3; url=./multipleImages.php?itemId={$_POST["itemId"]}");
    $objResponse['success'] = false;
    $objResponse['code'] = 500;
    $objResponse['info'] = "沒有新增資料";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}