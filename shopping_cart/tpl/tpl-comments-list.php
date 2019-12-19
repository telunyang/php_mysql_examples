<div class="container" id="comments">

<?php
require_once('./db.inc.php'); 

if(isset($_GET['itemId'])){

    //SQL 敘述
    $sql = "SELECT `id`, `name`,`content`, `rating`, `itemId`, `created_at`, `updated_at`
            FROM `comments`
            WHERE `itemId` = ? AND `parentId` = 0
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
        <div class="row">
            <div class="media">
                <img src="http://www.likoda.com.tw/style/images/frontpage/default_user_icon.png" class="mr-3" alt="...">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $arr[$i]["name"]; ?></h5>
                    <p><?php echo nl2br($arr[$i]["content"]); ?></p>
                    <p>評分: <?php echo $arr[$i]["rating"]; ?></p>
                    <p>新增時間: <?php echo $arr[$i]["created_at"]; ?></p>
                    <p>更新時間: <?php echo $arr[$i]["updated_at"]; ?></p>
                </div>
            </div>
        </div>

        <?php
         $sqlReply = "SELECT `id`, `name`,`content`, `rating`, `itemId`, `created_at`, `updated_at`
                    FROM `comments`
                    WHERE `itemId` = ? AND `parentId` = ?
                    ORDER BY `created_at` ASC ";
        //查詢分頁後的商品資料
        $stmtReply = $pdo->prepare($sqlReply);
        $arrReplyParam = [ 
            $_GET['itemId'],
            $arr[$i]["id"]
        ];
        $stmtReply->execute($arrReplyParam); //

        //若商品項目個數大於 0，則列出商品
        if($stmtReply->rowCount() > 0) {
            $arrReply = $stmtReply->fetchAll(PDO::FETCH_ASSOC);
            for($j = 0; $j < count($arrReply); $j++) {
        ?>
            <div class="row">
                <div class="col-md-3"><?php echo $arrReply[$j]['name'] ?>表示</div>
                <div class="col-md-9"><?php echo nl2br($arrReply[$j]['content']) ?></div>
            </div>
        <?php
            }
        } else {
        ?>
            <div class="row">管理員尚未回覆</div>
        <?php
        }
        ?>

    <?php
        }
    }
} 
?>

</div>