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
        <div class="col-md-2 col-sm-3"><?php buildTree($pdo, 0); ?></div>

        <!-- 商品項目清單 -->
        <div class="col-md-10 col-sm-9">
        <?php
        if(isset($_GET['itemId'])) {
            //SQL 敘述
            $sql = "SELECT `items`.`itemId`, `items`.`itemName`, `items`.`itemImg`, `items`.`itemPrice`, 
                        `items`.`itemQty`, `items`.`itemCategoryId`, `items`.`created_at`, `items`.`updated_at`,
                        `categories`.`categoryId`, `categories`.`categoryName`
                    FROM `items` INNER JOIN `categories`
                    ON `items`.`itemCategoryId` = `categories`.`categoryId`
                    WHERE `itemId` = ? ";

            $arrParam = [
                (int)$_GET['itemId']
            ];

            //查詢
            $stmt = $pdo->prepare($sql);
            $stmt->execute($arrParam);

            //若商品項目個數大於 0，則列出商品
            if($stmt->rowCount() > 0) {
                $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="row mb-3 d-flex justify-content-center">
                        <img class="item-view border" src="./images/items/<?php echo $arr[0]["itemImg"]; ?>">
                    </div>
                    <div class="row">
                        <?php 
                        //找出預覽圖片
                        $sqlMultipleImages = "SELECT `multipleImageId`, `multipleImageImg`
                                                FROM `multiple_images` 
                                                WHERE `itemId` = ?";
                        $stmtMultipleImages = $pdo->prepare($sqlMultipleImages);
                        $stmtMultipleImages->execute($arrParam);
                        if($stmtMultipleImages->rowCount() > 0) {
                            $arrMultipleImages = $stmtMultipleImages->fetchAll(PDO::FETCH_ASSOC);
                            for($i = 0; $i < count($arrMultipleImages); $i++){
                        ?>
                            <div class="col-md-2 d-flex justify-content-center">
                                <img class="item-preview border" src="./images/multiple_images/<?php echo $arrMultipleImages[$i]['multipleImageImg']; ?>" alt="..." class="img-thumbnail">
                            </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <p>商品名稱: <?php echo $arr[0]["itemName"]; ?></p>
                    </div>
                    <div class="row">
                        <p>商品價格: <?php echo $arr[0]["itemPrice"]; ?></p>
                    </div>
                    <div class="row">
                        <p>商品數量: <?php echo $arr[0]["itemQty"]; ?></p>
                    </div>
                    <div class="row">
                        <form name="cartForm" id="cartForm" method="POST" action="./addCart.php">
                            <label>數量: </label>
                            <input type="text" name="cartQty" id="cartQty" value="1" maxlength="5">
                            <button type="submit" class="btn btn-primary btn-lg">加入購物車</button>
                            <input type="hidden" name="itemId" value="<?php echo $_GET['itemId'] ?>">
                        </form>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">商品描述</div>
            </div>
        </div>

        <?php
            }
        }
        ?>
        </div>
    </div>
</div>

<?php
require_once('./tpl/footer.php');
require_once('./tpl/tpl-html-foot.php'); 
?>