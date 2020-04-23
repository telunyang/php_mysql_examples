<?php
require_once('./checkAdmin.php'); //引入登入判斷
require_once('../db.inc.php'); //引用資料庫連線
?>
<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
    <style>
    .border {
        border: 1px solid;
    }
    img.itemImg {
        width: 250px;
    }
    </style>
</head>
<body>
<?php require_once('./templates/title.php'); ?>
<hr />
<h3>商品追蹤管理</h3>
<form name="myForm" method="POST" action="updateItemTracking.php">
    <table class="border">
        <thead>
            <tr>
                <th scope="col" class="border">設定日期</th>
                <th scope="col" class="border">買家帳號</th>
                <th scope="col" class="border">商品圖片</th>
                <th scope="col" class="border">單價</th>
                <th scope="col" class="border">數量</th>
                <th scope="col" class="border">最新訊息</th>
            </tr>
        </thead>
        <tbody>
        <?php
        //SQL 敘述
        $sql = "SELECT `items`.`itemId`, `items`.`itemName`, `items`.`itemImg`, `items`.`itemPrice`, 
                    `items`.`itemQty`, `items`.`itemCategoryId`, `items`.`created_at`, `items`.`updated_at`,
                    `categories`.`categoryId`, `categories`.`categoryName`,
                    `item_tracking`.`id` AS `itemTrackingId`,
                    `item_tracking`.`username`, `item_tracking`.`msg`,
                    `item_tracking`.`created_at`, `item_tracking`.`updated_at`
                FROM `items` INNER JOIN `categories`
                ON `items`.`itemCategoryId` = `categories`.`categoryId`
                INNER JOIN `item_tracking`
                ON `items`.`itemId` = `item_tracking`.`itemId`
                ORDER BY `item_tracking`.`created_at` DESC";

        //查詢 SQL
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //整理 primary key
        $strPk = '';

        //若商品項目個數大於 0，則列出商品
        if($stmt->rowCount() > 0) {
            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
            for($i = 0; $i < count($arr); $i++){ 
                if($strPk === '') 
                    $strPk = $arr[$i]['itemTrackingId']; 
                else 
                    $strPk.= ",".$arr[$i]['itemTrackingId'];
        ?>
            <tr>
                <td class="border"><?= $arr[$i]['created_at'] ?></td>
                <td class="border"><?= $arr[$i]['username'] ?></td>
                <td class="border">
                    <img class="itemImg" src="../images/items/<?= $arr[$i]["itemImg"] ?>" 
                        title="<?= $arr[$i]["itemName"] ?>" 
                        alt="<?= $arr[$i]["itemName"] ?>">
                </td>
                <td class="border"><?= $arr[$i]['itemPrice'] ?></td>
                <td class="border"><?= $arr[$i]['itemQty'] ?></td>
                <td class="border">
                    <textarea name="msg_<?= $arr[$i]['itemTrackingId'] ?>" 
                        cols="50" 
                        rows="20" 
                        data-item-tracking-id="<?= $arr[$i]['itemTrackingId'] ?>"><?= $arr[$i]['msg'] ?></textarea>
                </td>
            </tr>             
        <?php
            }
        }
        ?>
        </tbody>
    </table>
    <input type="hidden" name="pk" value="<?php echo $strPk; ?>">
    <input type="submit" name="smb" value="更新">
</form>
</body>
</html>