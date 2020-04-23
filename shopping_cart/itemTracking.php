<?php 
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php'); 
require_once('./tpl/header.php');
require_once("./tpl/func-buildTree.php");
require_once("./tpl/func-getRecursiveCategoryIds.php"); 
?>

<div class="container-fluid">
    <div class="row">
        <!-- 樹狀商品種類連結 -->
        <div class="col-md-3"><?php buildTree($pdo, 0); ?></div>

        <!-- 商品追蹤清單 -->
        <div class="col-md-9">
            <div class="container-fluid">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">設定日期</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">商品圖片</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">單價</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">狀態</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">最新訊息</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">功能</div>
                                    </th>
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
                WHERE `username` = ? ";

        $arrParam = [
            $_SESSION['username']
        ];

        //查詢 SQL
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arrParam);

        //若商品項目個數大於 0，則列出商品
        if($stmt->rowCount() > 0) {
            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
            for($i = 0; $i < count($arr); $i++){ 
        ?>
            <tr>
                <td class="border-0 align-middle"><?= $arr[$i]['created_at'] ?></td>
                <td class="border-0 align-middle">
                    <img src="./images/items/<?= $arr[$i]["itemImg"] ?>" alt="" class="item-tracking-preview img-fluid rounded shadow-sm">
                </td>
                <td class="border-0 align-middle"><?= $arr[$i]['itemPrice'] ?></td>
                <td class="border-0 align-middle">
                <?php if($arr[$i]['itemQty'] > 0){ ?>
                    <button type="button" class="btn btn-primary" id="btn_addCartForItemTracking" data-item-id="<?= $arr[$i]['itemId'] ?>">加入購物車</button>
                <?php } else { echo "已賣完"; } ?>
                </td>
                <td class="border-0 align-middle"><?= nl2br($arr[$i]['msg']) ?></td>
                <td class="border-0 align-middle">
                <a href="./deleteItemTracking.php?deleteItemTrackingId=<?= $arr[$i]['itemTrackingId'] ?>">刪除</a>
                </td>
            </tr>             
        <?php
            }
        }
        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('./tpl/footer.php');
require_once('./tpl/tpl-html-foot.php'); 
?>