<?php
require_once('./checkAdmin.php'); //引入登入判斷
require_once('../db.inc.php'); //引用資料庫連線

//建立種類列表
function buildTree($pdo, $parentId = 0){
    $sql = "SELECT `categoryId`, `categoryName`, `categoryParentId`
            FROM `categories` 
            WHERE `categoryParentId` = ?";
    $stmt = $pdo->prepare($sql);
    $arrParam = [$parentId];
    $stmt->execute($arrParam);
    if($stmt->rowCount() > 0) {
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for($i = 0; $i < count($arr); $i++) {
            echo "<option value='".$arr[$i]['categoryId']."'>";
            echo $arr[$i]['categoryName'];
            echo "</option>";
            buildTree($pdo, $arr[$i]['categoryId']); 
        }
    }
}
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
<h3>商品列表</h3>
<form name="myForm" enctype="multipart/form-data" method="POST" action="update.php">
    <table class="border">
        <thead>
            <tr>
                <th class="border">商品名稱</th>
                <th class="border">商品照片路徑</th>
                <th class="border">商品價格</th>
                <th class="border">商品數量</th>
                <th class="border">商品種類</th>
                <th class="border">新增時間</th>
                <th class="border">更新時間</th>
            </tr>
        </thead>
        <tbody>
        <?php
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

        //資料數量大於 0，則列出相關資料
        if($stmt->rowCount() > 0) {
            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
            <tr>
                <td class="border">
                    <input type="text" name="itemName" value="<?php echo $arr[0]['itemName']; ?>" maxlength="100" />
                </td>
                <td class="border">
                    <img class="itemImg" src="../images/items/<?php echo $arr[0]['itemImg']; ?>" /><br />
                    <input type="file" name="itemImg" value="" />
                </td>
                <td class="border">
                    <input type="text" name="itemPrice" value="<?php echo $arr[0]['itemPrice']; ?>" maxlength="11" />
                </td>
                <td class="border">
                    <input type="text" name="itemQty" value="<?php echo $arr[0]['itemQty']; ?>" maxlength="3" />
                </td>
                <td class="border">
                    <select name="itemCategoryId">
                    <option value="<?php echo $arr[0]['categoryId']; ?>"><?php echo $arr[0]['categoryName']; ?></option>
                    <?php buildTree($pdo, 0); ?>
                    </select>
                </td>
                <td class="border"><?php echo $arr[0]['created_at']; ?></td>
                <td class="border"><?php echo $arr[0]['updated_at']; ?></td>
            </tr>
        <?php
        } else {
        ?>
            <tr>
                <td colspan="7">沒有資料</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="border" colspan="7"><input type="submit" name="smb" value="更新"></td>
            </tr>
        </tfoo>
    </table>
    <input type="hidden" name="itemId" value="<?php echo (int)$_GET['itemId']; ?>">
</form>
</body>
</html>