<?php
//啟動 session
session_start();

//引入登入判斷
require_once('./checkAdmin.php');

//引用資料庫連線
require_once('../db.inc.php');
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
這裡是後端管理頁面 | <a href="./adminConsole.php">商品列表</a> | <a href="./newItems.php">新增商品</a> | <a href="../logout.php?logout=1">登出</a>
<hr />
<h3>商品列表</h3>
<form name="myForm" enctype="multipart/form-data" method="POST" action="updateItems.php">
    <table class="border">
        <thead>
            <tr>
                <th class="border">商品名稱</th>
                <th class="border">商品照片路徑</th>
                <th class="border">商品價格</th>
                <th class="border">商品數量</th>
                <th class="border">新增時間</th>
                <th class="border">更新時間</th>
            </tr>
        </thead>
        <tbody>
        <?php
        //SQL 敘述
        $sql = "SELECT `itemId`, `itemName`, `itemImg`, `itemPrice`, `itemQty`, `created_at`, `updated_at` ";
        $sql.= "FROM `items` ";
        $sql.= "WHERE `itemID` = ? ";

        $arrParam = [
            (int)$_GET['editId']
        ];

        //查詢
        $pdo_stmt = $pdo->prepare($sql);
        $pdo_stmt->execute($arrParam);

        if($pdo_stmt->rowCount() > 0) {
            $row = $pdo_stmt->fetch();
        ?>
            <tr>
                <td class="border">
                    <input type="text" name="itemName" value="<?php echo $row['itemName']; ?>" maxlength="100" />
                </td>
                <td class="border">
                    <img class="itemImg" src="../<?php echo $row['itemImg']; ?>" /><br />
                    <input type="file" name="itemImg" value="" />
                </td>
                <td class="border">
                    <input type="text" name="itemPrice" value="<?php echo $row['itemPrice']; ?>" maxlength="11" />
                </td>
                <td class="border">
                    <input type="text" name="itemQty" value="<?php echo $row['itemQty']; ?>" maxlength="3" />
                </td>
                <td class="border"><?php echo $row['created_at']; ?></td>
                <td class="border"><?php echo $row['updated_at']; ?></td>
            </tr>
        <?php
        } else {
        ?>
            <tr>
                <td colspan="6">沒有資料</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="border" colspan="6"><input type="submit" name="smb" value="修改"></td>
            </tr>
        </tfoo>
    </table>
    <input type="hidden" name="pk" value="<?php echo (int)$_GET['editId']; ?>">
</form>
</body>
</html>