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
<h3>編輯付款方式</h3>

<form name="myForm" method="POST" action="./deletePaymentType.php">
<table class="border">
    <thead>
        <tr>
            <th class="border">選擇</th>
            <th class="border">付款方式名稱</th>
            <th class="border">付款方式圖片</th>
            <th class="border">功能</th>
        </tr>
    </thead>
    <tbody>
<?php
$sql = "SELECT `paymentTypeId`, `paymentTypeName`, `paymentTypeImg`
        FROM `payment_types`
        ORDER BY `paymentTypeId` ASC";
$stmt = $pdo->prepare($sql);
$arrParam = [];
$stmt->execute($arrParam);
if($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for($i = 0; $i < count($arr); $i++) {
?>
    <tr>
        <td class="border">
            <input type="checkbox" name="chk[]" value="<?php echo $arr[$i]['paymentTypeId']; ?>" />
        </td>
        <td class="border"><?php echo $arr[$i]['paymentTypeName'] ?></td>
        <td class="border">
            <img class="payment_type_icon" src="../images/payment_types/<?php echo $arr[$i]['paymentTypeImg'] ?>">
        </td>
        <td class="border">
            <a href="editPaymentType.php?paymentTypeId=<?php echo $arr[$i]['paymentTypeId']; ?>">編輯</a>
        </td>
    </tr>

<?php
    }
} else {
?>

<tr><td class="border" colspan="4">尚未建立付款方式</td></tr>

<?php
}
?>
</table>
<input type="submit" name="smb_delete" value="刪除">
</form>

<hr />

<form name="myForm" method="POST" action="./insertPaymentType.php" enctype="multipart/form-data">
<table class="border">
    <thead>
        <tr>
        <th class="border">付款方式名稱</th>
        <th class="border">付款方式圖片</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border">
                <input type="text" name="paymentTypeName" value="" maxlength="100" />
            </td>
            <td class="border">
                <input type="file" name="paymentTypeImg" value="" />
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td class="border" colspan="2"><input type="submit" name="smb_add" value="新增"></td>
        </tr>
    </tfoot>
</table>

</form>
</body>
</html>