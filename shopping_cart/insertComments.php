<?php
require_once('./db.inc.php'); //引用資料庫連線

$sql = "INSERT INTO `comments` (`name`, `content`, `rating`, `itemId`) VALUES (?,?,?,?)";
$stmt = $pdo->prepare($sql);
$arrParam = [
    $_POST['name'], 
    $_POST['content'],
    $_POST['rating'], 
    $_POST['itemId']
];
$stmt->execute($arrParam);
if($stmt->rowCount() > 0) {
    header("Refresh: 3; url=./itemDetail.php?itemId={$_POST['itemId']}");
    $objResponse['success'] = true;
    $objResponse['code'] = 200;
    $objResponse['info'] = "新增成功";

    //取得最後新增的流水號
    $newId = $pdo->lastInsertId();

    try{
        $pdo->beginTransaction();

        //取得最後一次新增的資料
        $sqlComments = "SELECT `id`, `name`,`content`, `rating`, `itemId`, `created_at`, `updated_at`
                        FROM `comments`
                        WHERE `id` = ?
                        ORDER BY `created_at` ASC ";
        $stmtComments = $pdo->prepare($sqlComments);
        $arrCommentsParam = [$newId];
        $stmtComments->execute($arrCommentsParam);
        if($stmtComments->rowCount() > 0){
            $objResponse['data'] = $stmtComments->fetchAll(PDO::FETCH_ASSOC)[0];
        }

        $pdo->commit();

        echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
        exit();
    } catch(PDOException $e){
        $pdo->rollBack();
        echo "Failed: " . $e->getMessage();
    }
} else {
    header("Refresh: 3; url=./itemDetail.php?itemId={$_POST['itemId']}");
    $objResponse['success'] = false;
    $objResponse['code'] = 400;
    $objResponse['info'] = "新增失敗";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}