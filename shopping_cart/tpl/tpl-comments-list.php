<?php
require_once('./db.inc.php'); 

if(isset($_GET['itemId'])){

    //SQL 敘述
    $sql = "SELECT `id`, `name`,`content`, `ranking`, `itemId`, `created_at`, `updated_at`
            FROM `comments`
            WHERE `itemId` = ?
            ORDER BY `created_at` DESC ";

    //查詢分頁後的商品資料
    $stmt = $pdo->prepare($sql);
    $arrParam = [ $_GET['itemId'] ];
    $stmt->execute($arrParam); //

    //若商品項目個數大於 0，則列出商品
    if($stmt->rowCount() > 0) {
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for($i = 0; $i < count($arr); $i++) {
    ?>
            <div class="media">
                <img src="http://www.likoda.com.tw/style/images/frontpage/default_user_icon.png" class="mr-3" alt="...">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $arr[$i]["name"]; ?></h5>
                    <p><?php echo nl2br($arr[$i]["content"]); ?></p>
                    <p>評分: <?php echo $arr[$i]["ranking"]; ?></p>
                    <p>新增時間: <?php echo $arr[$i]["created_at"]; ?></p>
                    <p>更新時間: <?php echo $arr[$i]["updated_at"]; ?></p>
                </div>
            </div>

    <?php
        }
    }
} 
?>