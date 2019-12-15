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
    img.payment_type_icon{
        width: 50px;
    }
    </style>
</head>
<body>
<?php require_once('./templates/title.php'); ?>
<hr />
<h3>商品列表</h3>
<form name="myForm" enctype="multipart/form-data" method="POST" action="updatePaymentType.php">
    <table class="border">
        <thead>
            <tr>
                <th class="border">付款方式名稱</th>
                <th class="border">付款方式圖片</th>
                <th class="border">新增時間</th>
                <th class="border">更新時間</th>
            </tr>
        </thead>
        <tbody>
        <?php
        //SQL 敘述
        $sql = "SELECT `paymentTypeName`, `paymentTypeImg`, `created_at`, `updated_at`
                FROM `payment_types`
                WHERE `paymentTypeId` = ?";
        $stmt = $pdo->prepare($sql);
        $arrParam = [
            (int)$_GET['paymentTypeId']
        ];
        $stmt->execute($arrParam);
        if($stmt->rowCount() > 0) {
            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
            <tr>
                <td class="border">
                    <input type="text" name="paymentTypeName" value="<?php echo $arr[0]['paymentTypeName']; ?>" maxlength="100" />
                </td>
                <td class="border">
                    <img class="payment_type_icon" src="../images/payment_types/<?php echo $arr[0]['paymentTypeImg']; ?>" /><br />
                    <input type="file" name="paymentTypeImg" value="" />
                </td>
                <td class="border"><?php echo $arr[0]['created_at']; ?></td>
                <td class="border"><?php echo $arr[0]['updated_at']; ?></td>
            </tr>
        <?php
        } else {
        ?>
            <tr>
                <td colspan="4">沒有資料</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="border" colspan="4"><input type="submit" name="smb" value="更新"></td>
            </tr>
        </tfoo>
    </table>
    <input type="hidden" name="paymentTypeId" value="<?php echo (int)$_GET['paymentTypeId']; ?>">
</form>
</body>
</html>